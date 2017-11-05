<?php

Class Admin_model_get extends CI_Model {
    

    public function get_all_groups($group_id = NULL) {   //article_list()  model name: article ,$group_id = NULL
        if(!empty($group_id)){
            $this->db->where('gid = '.$group_id);
        }
       $this->db->select('*');
       $this->db->from('groups');
       $this->db->where('status = '.STATUS_ACTIVE);
//       $this->db->order_by('modified');
       $query = $this->db->get();
       return $query->result();
    }  
    
    public function get_all_user_groups($user_id){
       $this->db->select('group_id');
       $this->db->from('group_reference');
       $this->db->where('reference_type = "users"');
       $this->db->where('reference_id = '.$user_id);
       $query = $this->db->get();
       return $query->result();
    }
    
    public function get_all_blogs($blog_id = NULL) {
        if(!empty($blog_id)){
            $this->db->where('blog_id = '.$blog_id);
        }
        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->join('files','blogs.blog_id = files.reference_id and files.reference_type = "blogs"','left');
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
        $this->db->join('files','subjects.subject_id = files.reference_id and files.reference_type = "subjects"','left');
        $this->db->where('status = '.STATUS_ACTIVE);
        $this->db->group_by('subjects.subject_id');
        $this->db->order_by('modified',CONTENT_ORDER_BY);
        $querysubject = $this->db->get();
        return $querysubject->result();
    }
    public function get_all_users($user_id = NULL) {
        if(!empty($user_id)){
            $this->db->where('uid = '.$user_id);
        }
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('files','users.uid = files.reference_id and files.reference_type = "users"','left');
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
        $this->db->where('status = '.STATUS_ACTIVE);
        $this->db->order_by('modified');
        $querycat = $this->db->get();
        return $querycat->result();
    }
    public function get_all_albums($album_id = NULL) {
        if(!empty($album_id)){
            $this->db->where('album_id = '.$album_id);
        }
        $this->db->select('*');
        $this->db->from('institution_album');
        $this->db->join('files','institution_album.album_id = files.reference_id and files.reference_type = "institution_album"','left');
        $this->db->where('status = '.STATUS_ACTIVE);
        $this->db->group_by('album_id');
        $this->db->order_by('modified');
        $queryinst = $this->db->get();
        return $queryinst->result();
    }
     public function get_all_inst($inst_id = NULL) {
        if(!empty($inst_id)){
            $this->db->where('institute_id = '.$inst_id);
        }
        $this->db->select('*');
        $this->db->from('institution');
        $this->db->join('files','institution.institute_id = files.reference_id and files.reference_type = "institution"','left');
        $this->db->where('status = '.STATUS_ACTIVE);
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
    public function get_all_programme($prog_id = NULL) {
        if(!empty($prog_id)){
            $this->db->where('prog_id = '.$prog_id);
        }
        $this->db->select('*');
        $this->db->from('programme');
        $this->db->where('status = '.STATUS_ACTIVE);
        $this->db->order_by('modified');
        $querydeg = $this->db->get();
        return $querydeg->result();
    }
    
     public function get_all_forum($forum_id = NULL) {
        if(!empty($forum_id)){
            $this->db->where('forum_id = '.$forum_id);
        }
        $this->db->select('*');
        $this->db->from('forum');
        $this->db->join('files','forum.forum_id = files.reference_id and files.reference_type = "forum"','left');
        $this->db->where('status = '.STATUS_ACTIVE);
        $this->db->order_by('modified');
        $queryfor = $this->db->get();
        return $queryfor->result();
    }
    
    public function get_all_stream($stream_id = NULL) {
        if(!empty($stream_id)){
            $this->db->where('stream_id = '.$stream_id);
        }
        $this->db->select('*');
        $this->db->from('streams');
        $this->db->where('status = '.STATUS_ACTIVE);
        $this->db->order_by('modified','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_degtyp($degtyp_id = NULL) {
        if(!empty($degtyp_id)){
            $this->db->where('deg_typ_id = '.$degtyp_id);
        }
        $this->db->select('*');
        $this->db->from('degree_type');
        $this->db->where('status = '.STATUS_ACTIVE);
        $this->db->order_by('modified','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_files($condition){
        
        $this->db->select('*');
        $this->db->from('files');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }
    
    
}

?>