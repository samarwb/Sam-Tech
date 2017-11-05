<?php

class Auth extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function signup(){
        $this->load->view('portal_signup.php');
    }
    
    public function signin(){
        $this->load->view('portal_signin.php');
    }
    
    public function signout(){
        
    }
    
    public function userRegister(){
        
    }
}