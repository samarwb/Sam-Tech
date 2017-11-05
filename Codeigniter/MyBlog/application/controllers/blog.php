<?php

class Blog extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        if(isset($this->session->userdata['logged_id'])){
            
        }else{
            $this->session->set_flashdata('status_message','Please login to get access.');
            redirect(site_url());
        }
    }
}