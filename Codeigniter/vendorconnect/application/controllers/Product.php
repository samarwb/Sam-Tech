<?php

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kolkata');

// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('login_database');
        $this->load->model('search_model');
        
        
        // Initialize all the values as global variable    
        $categories = $this->search_model->get_all_categories();
        $locations = $this->search_model->get_all_locations();
        $companies = $this->search_model->get_all_companies();
        $prices = $this->search_model->get_product_price_range();
        $products = $this->search_model->get_all_product(null, null, null, 4);
        $product_type =  $this->search_model->get_all_product_type();
        $this->home_data = array(
            'categories' => $categories,
            'locations' => $locations,
            'companies' => $companies,
            'price' => $prices,
            'products' => $products,
            'producttype' => $product_type
        );
        if (isset($this->session->userdata['logged_in'])) {
            $location = get_user_current_details('location');
            $location_id = $this->search_model->get_all_locations(NULL,NULL,$location['geoplugin_latitude'],$location['geoplugin_longitude']);
            if(!empty($location_id)){
                $all_location = array();
                foreach($location_id as $loc){
                    $all_location[] = $loc->locid;
                }
               $nearby_product = $this->search_model->get_all_product(null, implode(',', $all_location), null, 4); 
            }else{
                $user_details = $this->login_database->read_user_information(NULL,$this->session->userdata['logged_in']['uid']);
                $nearby_product = $this->search_model->get_all_product(null, $user_details[0]->locid, null, 4);
            }
            $this->home_data['nearby_product']= $nearby_product;
        }
        
    }

    public function index() {
        $this->load->view('home',$this->home_data);
    }
    
    public function productview($product_id=null,$type = NULL, $status = NULL) {
        $all_product = $this->home_data;
        if(!empty($product_id)){
            $product_details = $this->search_model->get_product_details_by_productid($product_id);
            $product_images = $this->search_model->get_all_images_by_referance_id($product_id);
            $product_ratings = $this->search_model->get_all_user_ratings($product_id);
            if (isset($this->session->userdata['logged_in'])) {
                $wish_list = $this->search_model->get_all_user_wishlist($this->session->userdata['logged_in']['uid'],$product_id);
                if(!empty($wish_list))
                    $all_product['user_wishlist'] = $wish_list;
            }
            
            $all_product['product'] = $product_details;
            $all_product['files'] = $product_images;
            $all_product['product_ratings'] = $product_ratings;
            if($type == 'comment'){
                $message = ($status == 'success')? 'Thank you for your valuable comment!' : 'Opps! Something went wrong. Your comment is not saved.';
                $all_product['message_display'] = $message;
            }
            $this->load->view('product_view',$all_product);
        }else{
            $all_product['message_display'] = 'Product not found.';
            $this->load->view('home',$all_product);
        }
        
    }
    
    public function producttypesearch() {
        $type_val = $this->input->post('product_type');
        if(strlen($type_val)>0){
           $type = $this->search_model->get_all_product_type($type_val); 
            foreach ($type as $key => $value) {
             $array[] =  $value->type_name;
            }
         echo json_encode ($array);
        }
    }
    
    
    public function productcompanysearch() {
        $product_company = $this->input->post('product_company');
        if(strlen($product_company)>0){
           $company = $this->search_model->get_all_companies($product_company); 
            foreach ($company as $key => $value) {
             $array[] =  $value->com_name;
            }
         echo json_encode ($array);
        }
    }
    
    public function productcetogorysearch() {
        $category_val = $this->input->post('product_category');
        if(strlen($category_val)>0){
           $category = $this->search_model->get_all_categories($category_val); 
           $array = array();
            foreach ($category as $key => $value) {
                 $array[] =  $value->cat_name;
                }
             echo json_encode ($array);
         }
    }
    
    public function userindustrytype() {
        $industry_type = $this->input->post('industry_type');
        if(strlen($industry_type)>0){
           $this->load->model('search_model');
           $industry = $this->search_model->get_all_industry_type($industry_type); 
           $array = array();
            foreach ($industry as $key => $value) {
                 $array[] =  $value->industry;
                }
             echo json_encode ($array);
         }
    }
    
    public function displayproductmap(){
        $all_product = $this->home_data;
        $location = get_user_current_details('location');
        $location_id = $this->search_model->get_all_locations(NULL,NULL,$location['geoplugin_latitude'],$location['geoplugin_longitude']);
        $all_location_details = array();
        $nearby_product = array();
        if(!empty($location_id)){
            $all_location = array();
            foreach($location_id as $loc){
                $all_location[] = $loc->locid;
            }
           $nearby_products = $this->search_model->get_all_product(null, implode(',', $all_location)); 
        }
        $nearby_product = array();
        foreach($nearby_products as $key=>$near){
            $nearby_product['pro_name'] = $near->pro_name;
            $nearby_product['pid'] = $near->pid;
            $nearby_product['file_path'] = $near->file_path;
            $nearby_product['pro_price'] = $near->pro_price;
            $nearby_product['pro_description'] = $near->pro_description;
            $nearby_product['latitude'] = $near->latitude;
            $nearby_product['longitude'] = $near->longitude;
            $all_nearby_product[] = $nearby_product;
        }
        $all_product['nearby_product'] = $all_nearby_product;
        $this->load->view('display_product_map',$all_product);
    }
    
    public function addtomywishlist(){
        $wish_uid = $this->input->post('wish_uid');
        $wish_pid = $this->input->post('wish_pid');
        $result = $this->search_model->update_my_wishlist($wish_uid,$wish_pid);
        if($result == true)
            print 'true';
        else
            print 'false';
    }
    
    public function deletefrommywishlist(){
        $wish_uid = $this->input->post('wish_uid');
        $wish_pid = $this->input->post('wish_pid');
        $result = $this->search_model->delete_from_my_wishlist($wish_uid,$wish_pid);
        if($result == true)
            print 'true';
        else
            print 'false';
    }
    public function showmainproduct(){
        $cat_id = $this->input->post('category');
        $cat_val = $this->search_model->get_all_categories(NULL,MAIN_PRODUCT_CATEGORY);
        if(empty($cat_id)){
            $cat_id = $cat_val[0]->catid;
        }
        $all_product = $this->home_data;
        $products = $this->search_model->get_all_product($cat_id);
        $all_product['categories'] = $cat_val;
        $all_product['products'] = $products;
        $all_product['main_product'] = 'true';
        $this->load->view('search_home',$all_product);
    }
}
