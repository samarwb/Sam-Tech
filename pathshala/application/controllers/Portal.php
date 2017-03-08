<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller{
    
    public function index() {
        $this->load->view('portal_register');
    }
    
    public function __construct(){
        parent::__construct();
        $this -> load -> library('form_validation');
    }
    
    public function portallogin() {
        $this->load->view('portal_login');
    }
    
    public function insertclient() {
        
        $first_name = $this->input->post('fname');
        $last_name = $this->input->post('lname');
        $email = $this->input->post('uemail');
        $password = $this->input->post('upassword');
        $rpassword = $this->input->post('urpasswprd');
        $this->form_validation->set_rules('fname','First Name ','required|min_length[3]|trim');
        $this->form_validation->set_rules('lname','last Name ','required|min_length[3]|trim');
        $this->form_validation->set_rules('uemail','Email ID','required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('upassword','Password','required|min_length[6]|trim');
        $this->form_validation->set_rules('urpassword','Password Confirmation','trim|required|matches[upassword]');
        
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('reg_failed', 'Invalid User Name/Password.');
            redirect('portal');
            
        }  else {
            $data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $password,
                'mobile' => USER_UNFIELD_VALUE,
                'dob' => USER_UNFIELD_VALUE,
                'address' => USER_UNFIELD_VALUE,
                'country' => USER_UNFIELD_VALUE,
                'state' => USER_UNFIELD_VALUE,
                'city' => USER_UNFIELD_VALUE,
                'created' => time(),
                'modified' => time(),
                'status' => USER_UNFIELD_VALUE
                   );
            if(!empty($data)){
                $codition = array('first_name' => $first_name);
                $this->load->model('portal_model');     
                $query = $this->portal_model->portal_insert('users',$data);
            }else{
                echo 'no record inserted';
            }
            $this->session->set_flashdata('status_message', 'User update successfully.');
            return redirect('portal/portallogin');
        }
    
    }    
        
    public function loginvalid(){
        $this->form_validation->set_rules('uemail','Email ID','required|valid_email|trim');
        $this->form_validation->set_rules('upassword','Password','required|min_length[6]|trim');
        
        if($this->form_validation->run()){
            $email = $this->input->post('uemail');
            $password = $this->input->post('upassword');
            
            $this->load->model('portal_model');
            $user_id = $this->portal_model->login_valid($email,$password);
            if($user_id){
                return redirect('success');
            }else{
                $this->session->set_flashdata('login_failed','Invalid UserName/Password');
                return redirect('portal/portallogin');
            }
        }  else {
            $this->session->set_flashdata('login_failed','Invalid User Name/Password');
            return redirect('portal/portallogin');
        }
        
    }

        
    
       
    
    
}