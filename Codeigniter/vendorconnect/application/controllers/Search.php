<?php

class Search extends CI_Controller {

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
        
    }

    public function index() {
       
        $this->load->view('search_home',$this->home_data);
    }
    
    public function productsearch($type = NULL,$id = NUll) {
        
        $cat_val =($type == 'category' && !empty($id))? $id : NULL;
        $header_cat = $this->input->post('headercategory');
        $cat_val = !empty($header_cat)?  $header_cat : $cat_val;
        
        $com_val = $this->input->post('companies');
        $com_val = !empty($com_val)? implode(',', $com_val):NULL;
        
        $loc_val = $this->input->post('location');
        $loc_val = !empty($loc_val)? implode(',', $loc_val):NULL;
        
        $min_price = $this->input->post('minPriceInput');
        $max_price = $this->input->post('maxPriceInput');
        $search_product = $this->input->post('search_product');
        $all_product = $this->home_data;
        $search_max_price = (strlen($max_price)>0)?$max_price:$all_product['price'][0]->max_price;
        $search_min_price = (strlen($min_price)>0)?$min_price:$all_product['price'][0]->min_price;
        $all_product['price'][0]->max_price = $search_max_price;
        $all_product['price'][0]->min_price = $search_min_price;
        $products = $this->search_model->get_all_product($cat_val,$loc_val,$com_val,null,$search_product,$min_price,$max_price);
        $all_product['products'] = $products;
        $this->load->view('search_home',$all_product);
    }
    
    public function nearbyproductsearch() {
        if (isset($this->session->userdata['logged_in'])) {
            $all_product = $this->home_data;
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
            $this->home_data['products']= $nearby_product;
            $this->load->view('all_nearby_product',$all_product);
        }else{
            $message_display = array('type'=>'warning','message'=>'Please login to check nearby products.');
            $this->session->set_flashdata('message_display',$message_display);
            redirect("user/login");
        }
        
    }
    
    public function searchautocomplete(){
        $text = $this->input->post('search_text');
        $category = $this->input->post('category');
        $products = $this->search_model->get_all_product($category,null,null,10,$text); 
        foreach ($products as $key => $value) {
            $array[] =  $value->pro_name;
        }
        echo json_encode ($array);
    }
    
    public function bulklistsearchproduct(){
        $text = $this->input->post('search_text');
        $category = $this->input->post('category');
        $products = $this->search_model->get_all_product($category,null,null,10,$text); 
        foreach ($products as $key => $value) {
            $array[] =  $value->pro_name.'|'.$value->pid;
        }
        echo json_encode ($array);
    }
    
    public function getbulklistproducts(){
        $list_id = $this->input->post('list_id');
        $uid = $this->session->userdata['logged_in']['uid'];
        $bulk_list = $this->search_model->get_all_user_bulk_list($uid,$list_id);
        $array = array();
        foreach ($bulk_list as $key => $value) {
            $array[] =  $value->pro_name.'|'.$value->product_id;
        }
        echo (empty($array)) ? '' : json_encode ($array);
         
    }
    
   
}
