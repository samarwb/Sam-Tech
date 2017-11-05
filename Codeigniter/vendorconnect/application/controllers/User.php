<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('login_database');
        $this->load->model('search_model');
        date_default_timezone_set('Asia/Kolkata');
        // Initialize all the values as global variable    
        $categories = $this->search_model->get_all_categories();
        $locations = $this->search_model->get_all_locations();
        $companies = $this->search_model->get_all_companies();
        $prices = $this->search_model->get_product_price_range();
        $products = $this->search_model->get_all_product(null, null, null, 10);
        $product_type =  $this->search_model->get_all_product_type();
        $bulk_products = $this->search_model->get_all_list_in_bulk_products();
        $this->home_data = array(
            'categories' => $categories,
            'locations' => $locations,
            'companies' => $companies,
            'price' => $prices,
            'products' => $products,
            'producttype' => $product_type,
            'bulk_products' => $bulk_products
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
        $data = $this->home_data;
        $this->load->view('home', $data);
    }
    
    public function register(){
        $all_values = $this->home_data;
        if (isset($this->session->userdata['logged_in'])) {
                $message_display = array('type'=>'warning','message'=>'You already registered. Please logout to register new account');
                $this->session->set_flashdata('message_display',$message_display);
                redirect(base_url());
            } else {
                $this->load->view('register',$all_values);
            }
    }

//   User Registraation 
    public function userregistration() {
        $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('location', 'Location', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

        $all_values = $this->home_data;


        if ($this->form_validation->run() == FALSE) {
            $message_display = array('type'=>'warning','message'=>'Registration failed.'.  validation_errors());
            $this->session->set_flashdata('message_display',$message_display);
            redirect("user/register");
        } else {
            $data = array(
                'name' => $this->input->post('fullname'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'password' => $this->input->post('password'),
                'industry' => $this->input->post('industrytype'),
                'created' => time(),
                'changed' => time(),
                'status' => STATUS_BLOCK,
                'role_id' => NORMAL_USER_ROLE_ID
            );
            $this->load->model('admin_add');
            $location_id = $this->admin_add->location_insert(NULL,$this->input->post('location'));
            $data['location'] = $location_id;
            $this->load->model('login_database');
            $result = $this->login_database->registration_insert($data);
            if ($result == TRUE) {
                $email = $this->input->post('email');
                $user_details = $this->login_database->read_user_information($email);
                $success = FALSE;
                if ($user_details != false) {
                    $messade_data = array(
                    'name'=>$this->input->post('fullname'),
                    'link'=> 'user/uservalidation?uid='.$user_details[0]->uid
                );
                $message = $this->load->view('user_creation_email',$messade_data,TRUE);
                $subject = 'Email Verification Mail';
                $success = send_users_mail($email, $subject, $message);
                }
                if($success){
                    $message_display = 'Registration Successfully ! Please activate your account by clicking the mail sent to your register'
                            . ' email id.';
                }else{
                    $message_display = 'Registration Successfully, but we are not able to contact you. Please contact vendorconnect help. ';
                }
                $message_display = array('type'=>'success','message'=>$message_display);
                $this->session->set_flashdata('message_display',$message_display);
                redirect(base_url());
            } else {
                $message_display = array('type'=>'success','message'=>'Username already exist!');
                $this->session->set_flashdata('message_display',$message_display);
                redirect('user/register');
            }
        }
    }
    
    public function uservalidation(){
        $uid = $this->input->get('uid');
        $this->session->unset_userdata('logged_in');
        $user_details = $this->login_database->read_user_information(NULL,$uid);
                if ($user_details != false) {
                    
                $data = array(
                    'status' => STATUS_ACTIVE,
                    'changed' => time(),
                );
                $result = $this->login_database->update_user_profile($data,$user_details[0]->uid);
                $messade_data = array(
                    'name'=>$user_details[0]->name,
                    'username'=>$user_details[0]->email,
                    'password'=>$user_details[0]->password,
                    'link'=> DOMAIN_NAME
                );
                $message = $this->load->view('user_activation_mail',$messade_data,TRUE);
                $subject = "Account Activate Successfully.";
                $success = send_users_mail($user_details[0]->email, $subject, $message);
                }
                $all_values = $this->home_data;
                $all_values['message_display'] = 'Your account has been activated successfully. Your login credential sent to your register email id.';
                $this->load->view('home', $all_values);
    }
    
    public function login(){
        $all_values = $this->home_data;
        if (isset($this->session->userdata['logged_in'])) {
                $message_display = array('type'=>'warning','message'=>'You already logged in.');
                $this->session->set_flashdata('message_display',$message_display);
                redirect(base_url());
            } else {
                $this->load->view('login',$all_values);
            }
    }

    // Check for user login process
    public function userlogin() {
        $all_values = $this->home_data;
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                $message_display = array('type'=>'warning','message'=>'You already logged in.');
                $this->session->set_flashdata('message_display',$message_display);
                redirect("user/login");
            } else {
                $message_display = array('type'=>'warning','message'=>'Login Failed! Please tri again.');
                $this->session->set_flashdata('message_display',$message_display);
                redirect("user/login");
            }
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $result = $this->login_database->login($data);
            if ($result == TRUE) {

                $email = $this->input->post('email');
                $result = $this->login_database->read_user_information($email);
                if ($result != false) {
                    $session_data = array(
                        'uid' => $result[0]->uid,
                        'email' => $result[0]->email,
                        'name' => $result[0]->name
                    );
// Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $location = get_user_current_details('location');
                    $location_id = $this->search_model->get_all_locations(NULL,NULL,$location['geoplugin_latitude'],$location['geoplugin_longitude']);
                    if(!empty($location_id)){
                        $all_location = array();
                        foreach($location_id as $loc){
                            $all_location[] = $loc->locid;
                        }
                        $nearby_product = $this->search_model->get_all_product(null, implode(',', $all_location), null, 4); 
                    }else{
                        $nearby_product = $this->search_model->get_all_product(null, $result[0]->locid, null, 4);
                    }
                    $all_values['nearby_product'] = $nearby_product;
                    $message_display = array('type'=>'success','message'=>'You successfully logged in.');
                    $this->session->set_flashdata('message_display',$message_display);
                    redirect(base_url());
                }
            } else {
                $message_display = array('type'=>'warning','message'=>'Invalid Username or Password.');
                $this->session->set_flashdata('message_display',$message_display);
                redirect("user/login");
            }
        }
    }

    // Logout from admin page
    public function logout() {

// Removing session data
        $this->session->unset_userdata('logged_in');
        $message_display = array('type'=>'success','message'=>'Successfully Logout');
        $this->session->set_flashdata('message_display',$message_display);
        redirect(base_url());
    }

    function insertguest() {
        $data = array(
            'guest_email' => $this->input->post('email'),
            'guest_ip' => $this->input->post('guest_ip'),
            'created' => time(),
            'modified' => time(),
            'hits' => 1,
        );
        $product_user = $this->input->post('product_user');
        $this->load->model('login_database');
        $result = $this->login_database->guest_insert($data);
        if ($result == true) {
            $sellar_details = $this->login_database->read_user_information(null, $product_user);
        }
        $return_value = json_encode($sellar_details);
        print $return_value;
    }
    
    
    
    function userprofileview(){
        $all_values = $this->home_data;
        if(isset($this->session->userdata['logged_in'])){
            $uid = $this->session->userdata['logged_in']['uid'];
            $products = $this->search_model->get_all_product(null, null, null, null, null, null, null, $uid);
            $bulk_list = $this->search_model->get_all_user_bulk_list($uid);
            $user_details = $this->login_database->read_user_information(null, $uid);
            $all_values['user_details'] = $user_details;
            $all_values['products'] = $products;
            if(!empty($bulk_list)){
                $all_values['bulk_list'] = $bulk_list;
            }
            $wish_list = $this->search_model->get_all_user_wishlist($uid);
            if(!empty($wish_list)){
                $all_values['wish_list'] = $wish_list;
            }
            $this->load->view('profile_view',$all_values);
        }else{
            $this->load->view('home',$all_values);
        }
    }
    
    function userpublicprofileview($seller_id = NULL){
        if(!empty($seller_id)){
        $all_values = $this->home_data;
        $products = $this->search_model->get_all_product(null, null, null, null, null, null, null, $seller_id);
        $bulk_list = $this->search_model->get_all_user_bulk_list($seller_id);
        $user_details = $this->login_database->read_user_information(null, $seller_id);
        $all_values['user_details'] = $user_details;
        $all_values['products'] = $products;
        if(!empty($bulk_list)){
            $all_values['bulk_list'] = $bulk_list;
        }
        $this->load->view('seller_profile_view',$all_values);
        }else{
            $message_display = array('type'=>'warning','message'=>'Invalid Seller Details');
            $this->session->set_flashdata('message_display',$message_display);
            redirect(base_url());
        }
        
    }
    
    function editprofile(){
        
        $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required');

        $all_values = $this->home_data;
        $uid =  $this->session->userdata['logged_in']['uid'];
        $this->load->model('login_database');
        $user_details = $this->login_database->read_user_information(null,$uid);
        $products = $this->search_model->get_all_product(null, null, null, null, null, null, null, $uid);
        $all_values['products'] = $products;
        $all_values['user_details'] = $user_details;
        if ($this->form_validation->run() == FALSE) {
            $validation_error = validation_errors();
            $message_display = array('type'=>'warning','message'=>$validation_error);
            $this->session->set_flashdata('message_display',$message_display);
        } else {
            if ($user_details == TRUE) {
                $data = array(
                    'name' => $this->input->post('fullname'),
                    'mobile' => $this->input->post('mobile'),
                    'changed' => time(),
                );
                $this->load->model('admin_add');
                $location_id = $this->admin_add->location_insert(NULL,$this->input->post('location'));
                $data['location'] = $location_id;
                $result = $this->login_database->update_user_profile($data,$uid);
                if($result){
                    $message_display = array('type'=>'success','message'=>'Your profile updated successfully!');
                }else{
                    $message_display = array('type'=>'warning','message'=>'Your profile updation failed!');
                }
                $this->session->set_flashdata('message_display',$message_display);
                
            } else {
                $message_display = array('type'=>'warning','message'=>'Invalid User');
                $this->session->set_flashdata('message_display',$message_display);
            }
            redirect("user/userprofileview");
        }
        
        
    }
   
    function createbulklist(){
        if(isset($this->session->userdata['logged_in'])){
            $uid = $this->session->userdata['logged_in']['uid'];
            $product_id = $this->input->post('bulklistproductid');
            $list_name = $this->input->post('listname');
            $list_id = $this->input->post('bulklistid');
            if(empty($list_name) && empty($list_id)){
                $message_display = array('type'=>'warning','message'=>'List can not be created');
                $this->session->set_flashdata('message_display',$message_display);
                
            }else{
                if(empty($list_id) && !empty($list_name)){
                    $bulk_list =  array(
                        'list_name'=>$list_name,
                        'user_id'=>$uid,
                        'created'=>time(),
                        'modified'=>time(),
                        'status'=>STATUS_ACTIVE
                    );
                    $list_id = $this->login_database->create_user_bulk_list($bulk_list);
                }
                if(!empty($list_id)){
                    $product_ids = !empty($product_id) ? explode(',', $product_id): array();
                    if(!empty($product_ids))
                        $this->login_database->delete_user_bulk_list(array('list_id'=>$list_id));
                    foreach ($product_ids as $key => $value) {
                        $data = array(
                            'product_id' => $value,
                            'list_id' =>$list_id
                        );
                        $this->login_database->update_user_bulk_list($data);
                    }
                }
                $message_display = array('type'=>'success','message'=>'Your list is updated successfully');
                $this->session->set_flashdata('message_display',$message_display);
            }
            redirect('user/userprofileview');
        }else{
           $message_display = array('type'=>'warning','message'=>'Please login to continue');
           $this->session->set_flashdata('message_display',$message_display);
           redirect("user/login"); 
        }
    }
   function deletebulklist(){
       $list_id = $this->input->post('bulk_list_id');
       if(!empty($list_id)){
           $data = array('list_id'=>$list_id);
           $result = $this->login_database->deleteBulkList($data);
       }
       if($result){
           $message_display = array('type'=>'success','message'=>'List is deleted successfully');
           $this->session->set_flashdata('message_display',$message_display);
       }else{
           $message_display = array('type'=>'success','message'=>'Opps! there some error occure so your list is not deleted');
           $this->session->set_flashdata('message_display',$message_display);
       }
       redirect('user/userprofileview');
   }
    
    public function usercomment(){
        
        $this->form_validation->set_rules('productid', 'Product Id', 'trim|required');
        $all_values = $this->home_data;
        $uid =  $this->session->userdata['logged_in']['uid'];
        $this->load->model('login_database');
        if(!empty($uid)){
        if ($this->form_validation->run() == FALSE) {
            $validation_error = validation_errors();
            if(!empty($validation_error)){
               $all_values['message_display'] = $validation_error; 
            }
        } else {
            $comment_title = $this->input->post('commenttitle');
            $comment_desc = $this->input->post('commentdescription');
            $comment_product = $this->input->post('productid');
            $comment_rating = $this->input->post('commentrating');
            $comment_recomend = $this->input->post('commentrecomend');
            $comment_likes = $this->input->post('commentlikes');
                $data = array(
                    'comment_title' => $comment_title,
                    'comment_body' => $comment_desc,
                    'created' => time(),
                    'modified' => time(),
                    'ratings' => $comment_rating,
                    'likes' => $comment_likes,
                    'recommend' => $comment_recomend,
                );
                $result = $this->login_database->insert_user_comment($data,$uid,$comment_product);
                if($result){
                    $success = 'success';
                }else{
                   $success = 'failed'; 
                }
         }
       }else{
           $all_values['message_display'] = 'Please login to wright comment. '; 
       }
       if(empty($comment_product)){
           redirect($_SERVER['HTTP_REFERER']);
       }else{
         redirect('product/productview/'.$comment_product.'/comment/'.$success);  
       }
    }
    
    public function userreviewajax(){
        $product_id = $this->input->post('product_id');
        $rating = $this->input->post('rating');
        $rating = ($rating == -1) ? NULL : $rating;
        if(strlen($product_id)>0){
           $product_ratings = $this->search_model->get_all_user_ratings($product_id,NULL,$rating);
           $template = $this->load->view('review_view',array('product_ratings'=>$product_ratings),TRUE);
           print $template;
         }
    }
    
    public function updateusercurrentlocation(){
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        if(!empty($latitude) && !empty($longitude)){
    //Send request and receive json data by latitude and longitude
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false';
            $json = file_get_contents($url);
            $data = json_decode($json);
            $status = $data->status;
            if($status=="OK"){
                //Get address from json data
                $location = $data->results[0]->formatted_address;
            }else{
                $location =  '';
            }
            //Print address 
            echo $location;
        }
    }
    public function userlocationsearch() {
        $location = $this->input->post('location');
        if(strlen($location)>0){
           $this->load->model('search_model');
           $location = $this->search_model->get_all_locations(NULL,$location,NULL,NULL,NULL,'ajax'); 
           $array = array();
            foreach ($location as $key => $value) {
                 $array[] =  $value->loc_name;
                }
             echo json_encode ($array);
         }
    }
    
    public function checkout() {
        if(isset($this->session->userdata['logged_in'])){
        $data = $this->home_data;
        $this->load->view('checkout',$data);
        }else{
            $message_display = array('type'=>'warning','message'=>'Please login to get your cart page.');
            $this->session->set_flashdata('message_display',$message_display);
            redirect("user/login");
        }
    }

}
