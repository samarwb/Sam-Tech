<?php

class Admin_Add_Controllar extends CI_Controller {

    public function __construct() {
        parent::__construct();



// Load session library
        $this->load->library('session');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kolkata');

// Load database
        $this->load->model('admin_add');
        $this->load->model('search_model');
        $this->load->model('login_database');
        // Initialize all the values as global variable    
        $categories = $this->search_model->get_all_categories();
        $locations = $this->search_model->get_all_locations();
        $companies = $this->search_model->get_all_companies();
        $prices = $this->search_model->get_product_price_range();
        $products = $this->search_model->get_all_product(null, null, null, 4);
        $product_type = $this->search_model->get_all_product_type();

        $this->home_data = array(
            'categories' => $categories,
            'locations' => $locations,
            'companies' => $companies,
            'price' => $prices,
            'products' => $products,
            'producttype' => $product_type
        );
        if (isset($this->session->userdata['logged_in']['uid'])) {
            $user_details = $this->login_database->read_user_information(null, $this->session->userdata['logged_in']['uid']);
            $this->home_data['user_details'] = $user_details;
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
        $this->load->model('home', $this->home_data);
    }

    //Start Cotrollar for Category
    public function addcategory() {
        $result = $this->admin_add->category_insert();
    }

    public function deletecategory() {
        $result = $this->admin_add->category_delete($catid);
    }

    public function getAllCategories() {
        $result = $this->search_model->get_all_categories();
        return $result;
    }

    //End Controller for Category
    //Start Cotrollar for Location
    public function addlocation($location_name = NULL) {
            $location = $this->get_all_location_value();
            if(!empty($location_name))
            $location_name = rawurldecode($location_name);
            $result = $this->admin_add->location_insert($location_name);
    }

    public function deletelocation() {
        $result = $this->admin_add->location_delete();
    }

    public function getAllLocations() {
        $result = $this->search_model->get_all_locations();
        return $result;
    }

    //End Controller for Location
    //Start Cotrollar for Product
    public function insertProduct() {
        $all_data = $this->home_data;
        $this->form_validation->set_rules('productname', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('productdescription', 'Product Description', 'trim|required');
        $this->form_validation->set_rules('producttype', 'Type', 'trim|required');
        $this->form_validation->set_rules('productcategory', 'Category', 'trim|required');
       // $this->form_validation->set_rules('productlocation', 'Location', 'trim|required');
        //$this->form_validation->set_rules('productcompany', 'Company', 'trim|required');
        $this->form_validation->set_rules('productprice', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('productmodel', 'Model', 'trim|required');
        $this->form_validation->set_rules('productmake', 'Make', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $all_data['message_display'] = 'Product Insert Failed.' . $error;
            $this->load->view('home', $all_data);
        } else {
            date_default_timezone_set('Asia/Kolkata');
            $product_year = $this->input->post('productyear');
            if(isset($product_year) && !empty($product_year)){
                $purchase_date = explode('/', $this->input->post('productyear'));
                $purchase_date = $purchase_date[1] . '/' . $purchase_date[0] . '/' . $purchase_date[2];
                $purchased_date = strtotime($purchase_date);
            }else{
                $purchased_date = time();
            }
            
            $product_user = isset($this->session->userdata['logged_in']) ? $this->session->userdata['logged_in']['uid'] : ADMIN_ID;
            $product_type_id = $this->admin_add->type_insert($product_user, $this->input->post('producttype'));
            $product_category_id = $this->admin_add->category_insert($product_user, $this->input->post('productcategory'));
            $location = get_user_current_details('location');
            $location_id = $this->admin_add->location_insert($location);
            $company_name = $this->session->userdata['logged_in']['name'];
            $product_company_id = $this->admin_add->company_insert($company_name, $location_id,$product_user);
             $data = array(
                'pro_name' => $this->input->post('productname'),
                'pro_description' => $this->input->post('productdescription'),
                'pro_category' => $product_category_id,
                'pro_location' => $location_id,
                'pro_type' => $product_type_id,
                'pro_company' => $product_company_id,
                'pro_model' => $this->input->post('productmodel'),
                'pro_make' => $this->input->post('productmake'),
                'pro_uses' => $this->input->post('productuses'),
                'pro_purchased_year' => $purchased_date,
                'pro_user' => $product_user,
                'created' => time(),
                'modified' => time(),
                'status' => STATUS_ACTIVE,
                'pro_price' => $this->input->post('productprice'),
            );
            $productusedin = $this->input->post('productusedin');
            if(isset($productusedin) && !empty($productusedin)){
               $data['used_in'] = $productusedin;
            }
            $productusedwhere = $this->input->post('productusedwhere');
            if(isset($productusedwhere) && !empty($productusedwhere)){
               $data['used_where'] = $productusedwhere;
            }
            $result = $this->admin_add->product_insert($data);
            if ($result == TRUE) {
                $all_data['message_display'] = 'Product Insert Successfully..';
                $message_display = array('type'=>'success','message'=>'Product Insert Successfully..');
                $this->session->set_flashdata('message_display',$message_display);
            } else {
                $message_display = array('type'=>'success','message'=>'Product Insert Successfully..');
                $this->session->set_flashdata('message_display',$message_display);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteproduct() {
        $product_id = $this->input->post('product_id');
        $result = false;
        $all_data = $this->home_data;
        if (!empty($product_id)) {
            $result = $this->admin_add->product_delete($product_id);
            if ($result) {
                $message_display = array('type'=>'success','message'=>'Product deleted successfully.');
                
            } else {
                $message_display = array('type'=>'warning','message'=>'Product delete failed.');
                $all_data['message_display'] = 'Product delete failed.';
            }
        } else {
            $message_display = array('type'=>'warning','message'=>'Product delete failed.');
        }
        $this->session->set_flashdata('message_display',$message_display);
        redirect('user/userprofileview');
    }

    public function updateproduct() {
        $all_data = $this->home_data;

        $product_id = $this->input->post('product_id');
        $this->form_validation->set_rules('productname', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('productdescription', 'Product Description', 'trim|required');
        $this->form_validation->set_rules('producttype', 'Type', 'trim|required');
        $this->form_validation->set_rules('productcategory', 'Category', 'trim|required');
       // $this->form_validation->set_rules('productlocation', 'Location', 'trim|required');
       // $this->form_validation->set_rules('productcompany', 'Company', 'trim|required');
        $this->form_validation->set_rules('productprice', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('productmodel', 'Model', 'trim|required');
        $this->form_validation->set_rules('productyear', 'Product Year', 'trim|required');
        $this->form_validation->set_rules('productuses', 'Uses', 'trim|required');
        $this->form_validation->set_rules('productmake', 'Make', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $message_display = array('type'=>'success','message'=>'Product update failed.' . validation_errors());
        } else {
            date_default_timezone_set('Asia/Kolkata');
            $purchase_date = explode('/', $this->input->post('productyear'));
            $purchase_date = $purchase_date[1] . '/' . $purchase_date[0] . '/' . $purchase_date[2];
            $purchased_date = strtotime($purchase_date);
            $product_user = isset($this->session->userdata['logged_in']) ? $this->session->userdata['logged_in']['uid'] : ADMIN_ID;
            $product_type_id = $this->admin_add->type_insert($product_user, $this->input->post('producttype'));
            $product_category_id = $this->admin_add->category_insert($product_user, $this->input->post('productcategory'));
            $location = get_user_current_details('location');
            $location_id = $this->admin_add->location_insert($location);
            $company_name = $this->session->userdata['logged_in']['name'];
            $product_company_id = $this->admin_add->company_insert($company_name, $location_id,$product_user);
            $data = array(
                'pro_name' => $this->input->post('productname'),
                'pro_description' => $this->input->post('productdescription'),
                'pro_category' => $product_category_id,
                'pro_location' => $location_id,
                'pro_type' => $product_type_id,
                'pro_company' => $product_company_id,
                'pro_model' => $this->input->post('productmodel'),
                'pro_make' => $this->input->post('productmake'),
                'pro_uses' => $this->input->post('productuses'),
                'pro_purchased_year' => $purchased_date,
                'pro_user' => $product_user,
                'modified' => time(),
                'status' => STATUS_ACTIVE,
                'pro_price' => $this->input->post('productprice'),
            );
            $result = $this->admin_add->product_update($data, $this->input->post('productid'));
            if ($result == TRUE) {
                $message_display = array('type'=>'success','message'=>'Product updated successfully.');
            } else {
                $message_display = array('type'=>'success','message'=>'Product update failed.');
            }
        }
        $this->session->set_flashdata('message_display',$message_display);
        redirect('user/userprofileview');
    }

    public function getProductDetails() {
        $product_id = $this->input->post('product_id');
        $products = $this->search_model->get_product_details_by_productid($product_id);
        $product_images = $this->search_model->get_all_images_by_referance_id($product_id);
        $product_details = array(
            'products' => $products,
            'images' => $product_images
        );
        print json_encode($product_details);
    }

    //End Controller for Product
    //Start Cotrollar for Company
//    public function addcompany() {
//        $result = $this->admin_add->company_insert();
//    }

    public function deletecompany() {
        $result = $this->admin_add->company_delete();
    }

    public function getAllCompanies() {
        $result = $this->search_model->get_all_companies();
        return $result;
    }

    //End Controller for Comapany

    function insertcontactus() {
        $phone = $this->input->post('comment_mobile');
        $email = $this->input->post('comment_email');
        $this->form_validation->set_rules('comment_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('comment_subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('comment_mobile', 'Mobile', 'trim|numeric|max_length[15]');
        $this->form_validation->set_rules('comment_email', 'Email', 'trim|valid_email|required');
        $this->form_validation->set_rules('comments', 'Comments', 'trim|required');
//        if(empty($email) && empty($phone)){
//            $this->form_validation->set_rules('comment_mobile', 'Mobile', 'trim|required');
//        }
        $return = array();
        if ($this->form_validation->run() == FALSE) {
            $return['error'] = validation_errors();
        } else {
            $name = $this->input->post('comment_name');
            $subject = $this->input->post('comment_subject');
            $comments = $this->input->post('comments');
            $data = array(
                'name' => $name,
                'email' => $email,
                'mobile' => $phone,
                'subject' => $subject,
                'comments' => $comments,
                'created' => time(),
                'modified' => time()
            );
            $contactus_insert = $this->admin_add->contactus_insert($data);
            if ($contactus_insert == TRUE) {
                $messade_data = array(
                    'name'=>$name,
                    'email'=>$email,
                    'mobile'=> $phone,
                    'title'=>$subject,
                    'comment'=>$comments,
                );
                $message = $this->load->view('contact_us_mail_template',$messade_data,TRUE);
                $success = $this->send_user_mail($email, $subject, $message);
                $return['success'] = 'Details are sent succesfully. We will get back to you shortly.';
            } else {
                $return['error'] = 'Opps! some error occurs. Please try again.';
            }
        }
        print json_encode($return);
    }
    

    public function send_user_mail($to, $subject, $message) {
        $to = !empty($to) ? $to : EMAIL_TO_ID;
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => EMAIL_FORM_ID,
            'smtp_pass' => 'Aces@101',
            'mailtype' => 'html',
            'charset'  => 'utf-8',
            'priority' => '1'
        );

        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from(EMAIL_FORM_ID,'Vendor Connect');
        $this->email->to(EMAIL_TO_ID);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function get_all_location_value(){
       
        $list = array(
//	'Andaman and Nicobar' => array(
//		'North and Middle Andaman', 'South Andaman', 'Nicobar'
//	),
	'Andhra Pradesh' => array(
		'Adilabad', 'Anantapur', 'Chittoor', 'East Godavari', 'Guntur', 'Hyderabad', 'Kadapa', 'Karimnagar', 'Khammam', 'Krishna', 'Kurnool', 'Mahbubnagar', 'Medak', 'Nalgonda', 'Nellore', 'Nizamabad', 'Prakasam', 'Rangareddi', 'Srikakulam', 'Vishakhapatnam', 'Vizianagaram', 'Warangal', 'West Godavari'
	),
//	'Arunachal Pradesh' => array(
//		'Anjaw', 'Changlang', 'East Kameng', 'Lohit', 'Lower Subansiri', 'Papum Pare', 'Tirap', 'Dibang Valley', 'Upper Subansiri', 'West Kameng'
//	),
//	'Assam' => array(
//		'Barpeta', 'Bongaigaon', 'Cachar', 'Darrang', 'Dhemaji', 'Dhubri', 'Dibrugarh', 'Goalpara', 'Golaghat', 'Hailakandi', 'Jorhat', 'Karbi Anglong', 'Karimganj', 'Kokrajhar', 'Lakhimpur', 'Marigaon', 'Nagaon', 'Nalbari', 'North Cachar Hills', 'Sibsagar', 'Sonitpur', 'Tinsukia'
//	),
	'Bihar' => array(
		'Araria', 'Aurangabad', 'Banka', 'Begusarai', 'Bhagalpur', 'Bhojpur', 'Buxar', 'Darbhanga', 'Purba Champaran', 'Gaya', 'Gopalganj', 'Jamui', 'Jehanabad', 'Khagaria', 'Kishanganj', 'Kaimur', 'Katihar', 'Lakhisarai', 'Madhubani', 'Munger', 'Madhepura', 'Muzaffarpur', 'Nalanda', 'Nawada', 'Patna', 'Purnia', 'Rohtas', 'Saharsa', 'Samastipur', 'Sheohar', 'Sheikhpura', 'Saran', 'Sitamarhi', 'Supaul', 'Siwan', 'Vaishali', 'Pashchim Champaran'
	),
	
//	'Chhattisgarh' => array(
//		'Bastar', 'Bilaspur', 'Dantewada', 'Dhamtari', 'Durg', 'Jashpur', 'Janjgir-Champa', 'Korba', 'Koriya', 'Kanker', 'Kawardha', 'Mahasamund', 'Raigarh', 'Rajnandgaon', 'Raipur', 'Surguja'
//	),
	
//	'Daman and Diu' => array(
//		'Diu', 'Daman'
//	),
	'Delhi' => array(
		'Central Delhi', 'East Delhi', 'New Delhi', 'North Delhi', 'North East Delhi', 'North West Delhi', 'South Delhi', 'South West Delhi', 'West Delhi'
	),
	'Goa' => array(
		'North Goa', 'South Goa'
	),
	'Gujarat' => array(
		'Ahmedabad', 'Amreli District', 'Anand', 'Banaskantha', 'Bharuch', 'Bhavnagar', 'Dahod', 'The Dangs', 'Gandhinagar', 'Jamnagar', 'Junagadh', 'Kutch', 'Kheda', 'Mehsana', 'Narmada', 'Navsari', 'Patan', 'Panchmahal', 'Porbandar', 'Rajkot', 'Sabarkantha', 'Surendranagar', 'Surat', 'Vadodara', 'Valsad'
	),
	'Haryana' => array(
		'Ambala', 'Bhiwani', 'Faridabad', 'Fatehabad', 'Gurgaon', 'Hissar', 'Jhajjar', 'Jind', 'Karnal', 'Kaithal', 'Kurukshetra', 'Mahendragarh', 'Mewat', 'Panchkula', 'Panipat', 'Rewari', 'Rohtak', 'Sirsa', 'Sonepat', 'Yamuna Nagar', 'Palwal'
	),
//	'Himachal Pradesh' => array(
//		'Bilaspur', 'Chamba', 'Hamirpur', 'Kangra', 'Kinnaur', 'Kulu', 'Lahaul and Spiti', 'Mandi', 'Shimla', 'Sirmaur', 'Solan', 'Una'
//	),
//	'Jammu and Kashmir' => array(
//		'Anantnag', 'Badgam', 'Bandipore', 'Baramula', 'Doda', 'Jammu', 'Kargil', 'Kathua', 'Kupwara', 'Leh', 'Poonch', 'Pulwama', 'Rajauri', 'Srinagar', 'Samba', 'Udhampur'
//	),
//	'Jharkhand' => array(
//		'Bokaro', 'Chatra', 'Deoghar', 'Dhanbad', 'Dumka', 'Purba Singhbhum', 'Garhwa', 'Giridih', 'Godda', 'Gumla', 'Hazaribagh', 'Koderma', 'Lohardaga', 'Pakur', 'Palamu', 'Ranchi', 'Sahibganj', 'Seraikela and Kharsawan', 'Pashchim Singhbhum', 'Ramgarh'
//	),
	'Karnataka' => array(
		'Bidar', 'Belgaum', 'Bijapur', 'Bagalkot', 'Bellary', 'Bangalore Rural District', 'Bangalore Urban District', 'Chamarajnagar', 'Chikmagalur', 'Chitradurga', 'Davanagere', 'Dharwad', 'Dakshina Kannada', 'Gadag', 'Gulbarga', 'Hassan', 'Haveri District', 'Kodagu', 'Kolar', 'Koppal', 'Mandya', 'Mysore', 'Raichur', 'Shimoga', 'Tumkur', 'Udupi', 'Uttara Kannada', 'Ramanagara', 'Chikballapur', 'Yadagiri'
	),
	'Kerala' => array(
		'Alappuzha', 'Ernakulam', 'Idukki', 'Kollam', 'Kannur', 'Kasaragod', 'Kottayam', 'Kozhikode', 'Malappuram', 'Palakkad', 'Pathanamthitta', 'Thrissur', 'Thiruvananthapuram', 'Wayanad'
	),
//	
//	'Madhya Pradesh' => array(
//		'Alirajpur', 'Anuppur', 'Ashok Nagar', 'Balaghat', 'Barwani', 'Betul', 'Bhind', 'Bhopal', 'Burhanpur', 'Chhatarpur', 'Chhindwara', 'Damoh', 'Datia', 'Dewas', 'Dhar', 'Dindori', 'Guna', 'Gwalior', 'Harda', 'Hoshangabad', 'Indore', 'Jabalpur', 'Jhabua', 'Katni', 'Khandwa', 'Khargone', 'Mandla', 'Mandsaur', 'Morena', 'Narsinghpur', 'Neemuch', 'Panna', 'Rewa', 'Rajgarh', 'Ratlam', 'Raisen', 'Sagar', 'Satna', 'Sehore', 'Seoni', 'Shahdol', 'Shajapur', 'Sheopur', 'Shivpuri', 'Sidhi', 'Singrauli', 'Tikamgarh', 'Ujjain', 'Umaria', 'Vidisha'
//	),
	'Maharashtra' => array(
		'Ahmednagar', 'Akola', 'Amrawati', 'Aurangabad', 'Bhandara', 'Beed', 'Buldhana', 'Chandrapur', 'Dhule', 'Gadchiroli', 'Gondiya', 'Hingoli', 'Jalgaon', 'Jalna', 'Kolhapur', 'Latur', 'Mumbai City', 'Mumbai suburban', 'Nandurbar', 'Nanded', 'Nagpur', 'Nashik', 'Osmanabad', 'Parbhani', 'Pune', 'Raigad', 'Ratnagiri', 'Sindhudurg', 'Sangli', 'Solapur', 'Satara', 'Thane', 'Wardha', 'Washim', 'Yavatmal'
	),
//	'Manipur' => array(
//		'Bishnupur', 'Churachandpur', 'Chandel', 'Imphal East', 'Senapati', 'Tamenglong', 'Thoubal', 'Ukhrul', 'Imphal West'
//	),
//	'Meghalaya' => array(
//		'East Garo Hills', 'East Khasi Hills', 'Jaintia Hills', 'Ri-Bhoi', 'South Garo Hills', 'West Garo Hills', 'West Khasi Hills'
//	),
//	'Mizoram' => array(
//		'Aizawl', 'Champhai', 'Kolasib', 'Lawngtlai', 'Lunglei', 'Mamit', 'Saiha', 'Serchhip'
//	),
//	'Nagaland' => array(
//		'Dimapur', 'Kohima', 'Mokokchung', 'Mon', 'Phek', 'Tuensang', 'Wokha', 'Zunheboto'
//	),
//	'Orissa' => array(
//		'Angul', 'Boudh', 'Bhadrak', 'Bolangir', 'Bargarh', 'Baleswar', 'Cuttack', 'Debagarh', 'Dhenkanal', 'Ganjam', 'Gajapati', 'Jharsuguda', 'Jajapur', 'Jagatsinghpur', 'Khordha', 'Kendujhar', 'Kalahandi', 'Kandhamal', 'Koraput', 'Kendrapara', 'Malkangiri', 'Mayurbhanj', 'Nabarangpur', 'Nuapada', 'Nayagarh', 'Puri', 'Rayagada', 'Sambalpur', 'Subarnapur', 'Sundargarh'
//	),
//	'Puducherry' => array(
//		'Karaikal', 'Mahe', 'Puducherry', 'Yanam'
//	),
	'Punjab' => array(
		'Amritsar', 'Bathinda', 'Firozpur', 'Faridkot', 'Fatehgarh Sahib', 'Gurdaspur', 'Hoshiarpur', 'Jalandhar', 'Kapurthala', 'Ludhiana', 'Mansa', 'Moga', 'Mukatsar', 'Nawan Shehar', 'Patiala', 'Rupnagar', 'Sangrur'
	),
	'Rajasthan' => array(
		'Ajmer', 'Alwar', 'Bikaner', 'Barmer', 'Banswara', 'Bharatpur', 'Baran', 'Bundi', 'Bhilwara', 'Churu', 'Chittorgarh', 'Dausa', 'Dholpur', 'Dungapur', 'Ganganagar', 'Hanumangarh', 'Juhnjhunun', 'Jalore', 'Jodhpur', 'Jaipur', 'Jaisalmer', 'Jhalawar', 'Karauli', 'Kota', 'Nagaur', 'Pali', 'Pratapgarh', 'Rajsamand', 'Sikar', 'Sawai Madhopur', 'Sirohi', 'Tonk', 'Udaipur'
	),
//	'Sikkim' => array(
//		'East Sikkim', 'North Sikkim', 'South Sikkim', 'West Sikkim'
//	),
	'Tamil Nadu' => array(
		'Ariyalur', 'Chennai', 'Coimbatore', 'Cuddalore', 'Dharmapuri', 'Dindigul', 'Erode', 'Kanchipuram', 'Kanyakumari', 'Karur', 'Madurai', 'Nagapattinam', 'The Nilgiris', 'Namakkal', 'Perambalur', 'Pudukkottai', 'Ramanathapuram', 'Salem', 'Sivagangai', 'Tiruppur', 'Tiruchirappalli', 'Theni', 'Tirunelveli', 'Thanjavur', 'Thoothukudi', 'Thiruvallur', 'Thiruvarur', 'Tiruvannamalai', 'Vellore', 'Villupuram'
	),
//	'Tripura' => array(
//		'Dhalai', 'North Tripura', 'South Tripura', 'West Tripura'
//	),
//	'Uttarakhand' => array(
//		'Almora', 'Bageshwar', 'Chamoli', 'Champawat', 'Dehradun', 'Haridwar', 'Nainital', 'Pauri Garhwal', 'Pithoragharh', 'Rudraprayag', 'Tehri Garhwal', 'Udham Singh Nagar', 'Uttarkashi'
//	),
//	'Uttar Pradesh' => array(
//		'Agra', 'Allahabad', 'Aligarh', 'Ambedkar Nagar', 'Auraiya', 'Azamgarh', 'Barabanki', 'Badaun', 'Bagpat', 'Bahraich', 'Bijnor', 'Ballia', 'Banda', 'Balrampur', 'Bareilly', 'Basti', 'Bulandshahr', 'Chandauli', 'Chitrakoot', 'Deoria', 'Etah', 'Kanshiram Nagar', 'Etawah', 'Firozabad', 'Farrukhabad', 'Fatehpur', 'Faizabad', 'Gautam Buddha Nagar', 'Gonda', 'Ghazipur', 'Gorkakhpur', 'Ghaziabad', 'Hamirpur', 'Hardoi', 'Mahamaya Nagar', 'Jhansi', 'Jalaun', 'Jyotiba Phule Nagar', 'Jaunpur District', 'Kanpur Dehat', 'Kannauj', 'Kanpur Nagar', 'Kaushambi', 'Kushinagar', 'Lalitpur', 'Lakhimpur Kheri', 'Lucknow', 'Mau', 'Meerut', 'Maharajganj', 'Mahoba', 'Mirzapur', 'Moradabad', 'Mainpuri', 'Mathura', 'Muzaffarnagar', 'Pilibhit', 'Pratapgarh', 'Rampur', 'Rae Bareli', 'Saharanpur', 'Sitapur', 'Shahjahanpur', 'Sant Kabir Nagar', 'Siddharthnagar', 'Sonbhadra', 'Sant Ravidas Nagar', 'Sultanpur', 'Shravasti', 'Unnao', 'Varanasi'
//	),
	'West Bengal' => array(
		'Birbhum', 'Bankura', 'Bardhaman', 'Darjeeling', 'Dakshin Dinajpur', 'Hooghly', 'Howrah', 'Jalpaiguri', 'Cooch Behar', 'Kolkata', 'Malda', 'Midnapore', 'Murshidabad', 'Nadia', 'North 24 Parganas', 'South 24 Parganas', 'Purulia', 'Uttar Dinajpur'
	)
    );
   return $list;

    }

}

