<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comming_soon extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    public function index() 
    { 
       $this->output->set_status_header('404'); 
       $this->load->view('comming_soon');
    } 
}

