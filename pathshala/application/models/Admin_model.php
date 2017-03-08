<?php

Class Admin_model extends CI_Model {

public function admin_insert($table_name , $insert_data) {
    
        $this->db->insert($table_name, $insert_data);
        $return = $this->db->insert_id();
        return $return;
    }
public function admin_update($table_name , $update_data , $conditions) {
        $query = $this->db->where($conditions); //get the results
        $result = $this->db->update($table_name, $update_data);
        return $result;
    }
    
    public function delete_content($table_name,$id){
        if($table_name == 'groups'){
             $conditions = array('gid'=>$id);
        }
        $result = TRUE;
        if(!empty($conditions)){
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }
    
    public function delete_content_blog($table_name,$id){
        if($table_name == 'blogs'){
             $conditions = array('blog_id'=>$id);
        }
        $result = TRUE;
        if(!empty($conditions)){
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }
    
    public function delete_content_catg($table_name,$id){
        if($table_name == 'category'){
             $conditions = array('cat_id'=>$id);
        }
        $result = TRUE;
        if(!empty($conditions)){
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }
    
    public function delete_content_degree($table_name,$id){
        if($table_name == 'degree'){
             $conditions = array('degree_id'=>$id);
        }
        $result = TRUE;
        if(!empty($conditions)){
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }
    
    public function delete_content_inst($table_name,$id){
        if($table_name == 'institution'){
             $conditions = array('institute_id'=>$id);
        }
        $result = TRUE;
        if(!empty($conditions)){
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }
    
    public function delete_content_lib($table_name,$id){
        if($table_name == 'library'){
             $conditions = array('library_id'=>$id);
        }
        $result = TRUE;
        if(!empty($conditions)){
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }
    
    public function delete_content_per($table_name,$id){
        if($table_name == 'permission'){
             $conditions = array('per_id'=>$id);
        }
        $result = TRUE;
        if(!empty($conditions)){
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }
    
    public function delete_content_role($table_name,$id){
        if($table_name == 'user_roles'){
            $conditions = array('rid'=>$id);
        }
        $result = TRUE;
        if(!empty($conditions)){
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }
    
    public function delete_content_sub($table_name,$id){
        if($table_name == 'subjects'){
            $conditions = array('subject_id'=>$id);
        }
        $result = TRUE;
        if(!empty($conditions)){
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }
    
    public function delete_content_user($table_name,$id){
        if($table_name == 'users'){
            $conditions = array('uid'=>$id);
        }
        $result = TRUE;
        if(!empty($conditions)){
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }
    
    public function delete_content_forum($table_name,$id){
        if($table_name == 'forum'){
            $conditions = array('forum_id'=>$id);
        }
        $result = TRUE;
        if(!empty($conditions)){
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }
   
    
    
    
    
}

?>