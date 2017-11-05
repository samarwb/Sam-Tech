<?php

class Portal_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this -> load -> library('form_validation');
    }
    
    public function portal_insert($table_name , $insert_data) {    
        $this->db->insert($table_name, $insert_data);
        $return = $this->db->insert_id();
        return $return;
    }
    
    public function login_valid($email,$password){
		$query = $this->db->where('email',$email)
			          ->where('password',$password)
				  ->get('users');

		if ($query->num_rows()) {			
			return $query->row()->uid;
			// return TRUE;
		}else{
			return False;
		}
	}
    
    
}

