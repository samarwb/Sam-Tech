<?php

Class Admin_model_get extends CI_Model {
    

    public function get_all_groups($group_id = NULL) {
        if(!empty($group_id)){
            $this->db->where('gid = '.$group_id);
        }
       $this->db->select('*');
       $this->db->from('groups');
       $this->db->where('status = '.STATUS_ACTIVE);
       $this->db->order_by('modified');
       $query = $this->db->get();
       return $query->result();
    }
    public function get_all_blogs($blog_id = NULL) {
        if(!empty($blog_id)){
            $this->db->where('blog_id = '.$blog_id);
        }
        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->where('status = '.STATUS_ACTIVE);
        $this->db->order_by('modified');
        $queryblog = $this->db->get();
        return $queryblog->result();
    }
    public function get_all_subjects($subject_id = NULL) {
        if(!empty($subject_id)){
            $this->db->where('subject_id = '.$subject_id);
        }
        $this->db->select('*');
        $this->db->from('subjects');
        $this->db->where('status = '.STATUS_ACTIVE);
        $this->db->order_by('modified');
        $querysubject = $this->db->get();
        return $querysubject->result();
    }
    public function get_all_users($user_id = NULL) {
        if(!empty($user_id)){
            $this->db->where('uid = '.$user_id);
        }
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('status = '.STATUS_ACTIVE);
        $this->db->order_by('modified');
        $queryusers = $this->db->get();
        return $queryusers->result();
    }
    public function get_all_roles($role_id = NULL) {
        if(!empty($role_id)){
            $this->db->where('rid = '.$role_id);
        }
        $this->db->select('*');
        $this->db->from('user_roles');
    //   $this->db->where('rid = '.$role_id);
        $this->db->where('status = '.STATUS_ACTIVE);
        $this->db->order_by('modified');
        $queryroles = $this->db->get();
        return $queryroles->result();
    }
    public function get_all_library($library_id = NULL) {
        if(!empty($library_id)){
            $this->db->where('library_id = '.$library_id);
        }
        $this->db->select('*');
        $this->db->from('library');

        $this->db->order_by('modified');
        $querylib = $this->db->get();
        return $querylib->result();
    }
    public function get_all_category($cat_id = NULL) {
        if(!empty($cat_id)){
            $this->db->where('cat_id = '.$cat_id);
        }
        $this->db->select('*');
        $this->db->from('category');

        $this->db->order_by('modified');
        $querycat = $this->db->get();
        return $querycat->result();
    }
    public function get_all_inst($inst_id = NULL) {
        if(!empty($inst_id)){
            $this->db->where('institute_id = '.$inst_id);
        }
        $this->db->select('*');
        $this->db->from('institution');

        $this->db->order_by('modified');
        $queryinst = $this->db->get();
        return $queryinst->result();
    }
    public function get_all_per($per_id = NULL) {
        if(!empty($per_id)){
            $this->db->where('per_id = '.$per_id);
        }
        $this->db->select('*');
        $this->db->from('permission');

        $this->db->order_by('modified');
        $queryinst = $this->db->get();
        return $queryinst->result();
    }
}

?>