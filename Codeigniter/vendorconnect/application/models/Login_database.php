<?php

Class Login_Database extends CI_Model {

// Insert registration data in database
    public function registration_insert($data) {

// Query to check whether username already exist or not
        $condition = "email =" . "'" . $data['email'] . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {

// Query to insert data in database
            $this->db->insert('users', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

// Read data using username and password
    public function login($data) {

        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "' and status = ".STATUS_ACTIVE;
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

// Read data from database to show data in admin page
    public function read_user_information($username=null,$uid=null) {
        if(!empty($uid)){
          $this->db->where('uid='.$uid);  
        }
        if(!empty($username)){
          $this->db->where('email="'.$username.'"');    
        }
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('location','users.location = location.locid','inner');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function guest_insert($data){
       $result = $this->db->insert('guest', $data); 
       return $result;
    }
    
    function update_user_profile($data,$uid){
        $this->db->where('uid', $uid);
        $this->db->update('users', $data); 
        if ($this->db->affected_rows() > 0) {
                return true;
        }else{
            return false;
        }
    }
    
    function update_user_comment($data,$uid){
        $this->db->where('uid', $uid);
        $this->db->update('comment', $data); 
        if ($this->db->affected_rows() > 0) {
                return true;
        }else{
            return false;
        }
    }
    
    function insert_user_comment($data,$uid = NULL,$product_id = NULL){
        $this->db->select('*');
        $this->db->from('comment');
        $this->db->where('comment_uid = '.$uid);
        $this->db->where('pro_id = '.$product_id);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $data['comment_uid'] = $uid;
            $data['pro_id'] = $product_id;
            $this->db->insert('comment', $data);
        }else{
             $this->db->where('comment_uid = '.$uid);
             $this->db->where('pro_id = '.$product_id);
             $this->db->update('comment', $data);   
        }
        if ($this->db->affected_rows() > 0) {
                return true;
        }else{
            return false;
        }
    }
    function create_user_bulk_list($data){
        $this->db->insert('bulk_list', $data);
        if ($this->db->affected_rows() > 0) {
               return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    function update_user_bulk_list($data){
        $this->db->insert('product_bulk_list', $data);
        if ($this->db->affected_rows() > 0) {
                return true;
        }else{
            return false;
        }
    }
    function deleteBulkList($data){
        $this->db->delete('bulk_list', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->delete_user_bulk_list($data);
        } else {
            return false;
        }
    }
    function delete_user_bulk_list($data){
        $this->db->delete('product_bulk_list', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}

?>