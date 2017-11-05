<?php

Class search_Model extends CI_Model {

    public function get_all_categories($cat_val = NULL,$cat_name = NULL){
        if(!empty($cat_val)){
            $this->db->where('cat_name like "%'.$cat_val.'%" '); 
        }
        if(!empty($cat_name)){
            $this->db->where('cat_name = "'.$cat_name.'" '); 
            $this->db->limit(1);
        }else{
          $this->db->where('cat_name not in( "'. MAIN_PRODUCT_CATEGORY.'") ');  
        }
        $this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function get_all_locations($loc_id = NULL, $loc_name = NULL,$latitude = NULL,$longitude = NULL,$distance = NULL,$search_type = NULL){
         if(!empty($loc_id)){
            $this->db->where('locid = '.$loc_id); 
        }
        if(!empty($loc_name)){
            if($search_type == 'ajax')
               $this->db->where('loc_name like "%'.$loc_name.'%" '); 
            else
              $this->db->where('loc_name = "'.$loc_name.'" '); 
        }
        $select = '';
        if(!empty($latitude) && !empty($longitude)){
            $select = ',6371 * ACOS(SIN(RADIANS('.$latitude.' )) * SIN(RADIANS(Latitude)) +
                COS(RADIANS( '.$latitude.' )) * COS(RADIANS(Latitude)) * COS(RADIANS(Longitude) -
                RADIANS( '.$longitude.' ))) AS distance ';
            if(empty($distance)){
                $distance = 1000;
            }
            $this->db->having('distance <= '.$distance);
        }
        $this->db->select('*'.$select);
        $this->db->from('location');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function get_all_companies($com_name = NULL){
        if(!empty($com_name)){
            $this->db->where('com_name like "%'.$com_name.'%" '); 
        }
        $this->db->select('*');
        $this->db->from('company');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function get_all_product_type($type_val=NULL){
        if(!empty($type_val)){
            $this->db->where('type_name like "%'.$type_val.'%" '); 
        }
        $this->db->select('*');
        $this->db->from('type');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function get_all_industry_type($type_val=NULL){
        if(!empty($type_val)){
            $this->db->where('industry like "%'.$type_val.'%" '); 
        }
        $this->db->distinct();
        $this->db->select('industry');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function get_product_price_range(){
        $this->db->select('max(pro_price)as max_price,min(pro_price) as min_price');
        $this->db->from('product');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_product($cat_val = NULL,$loc_val = NULL,$com_val = NULL,$limit = NULL,$text = NULL,$min_price = NULL,$max_price = NULL,$uid=null){
        if(!empty($cat_val)){
            $this->db->where('pro_category', $cat_val); 
        }else{
            $this->db->where('cat_name not in( "'. MAIN_PRODUCT_CATEGORY.'") '); 
        }
        if(!empty($uid)){
            $this->db->where('pro_user', $uid); 
        }
        if(!empty($loc_val)){
            $this->db->where('pro_location in( '. $loc_val.') '); 
        }
        if(!empty($com_val)){
            $this->db->where('pro_company in ('. $com_val.') '); 
        }
        if(!empty($limit)){
            $this->db->limit($limit);
        }
        if(!empty($text)){
            $this->db->where('pro_name like "%'.$text.'%" '); 
        }
        if(strlen($min_price)>=0 && strlen($max_price)>0){
            $this->db->where('pro_price  between '.$min_price.' and '.$max_price); 
        }
        
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('company', 'company.comid = product.pro_company','inner');
        $this->db->join('category', 'category.catid = product.pro_category','inner');
        $this->db->join('location', 'location.locid = product.pro_location','inner');
        $this->db->join('type', 'type.typeid = product.pro_type','inner');
        $this->db->join('files', 'files.referance_id = product.pid and files.referance_type ="product"','left');
        $this->db->group_by('product.pid');
        $this->db->order_by('product.created', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_product_details_by_productid($product_id){
        
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('company', 'company.comid = product.pro_company','inner');
        $this->db->join('category', 'category.catid = product.pro_category','inner');
        $this->db->join('location', 'location.locid = product.pro_location','inner');
        $this->db->join('type', 'type.typeid = product.pro_type','inner');
        $this->db->where('product.pid in ('.$product_id.') ');
        $this->db->group_by('product.pid');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_all_images_by_referance_id($referance_id){
        $this->db->select('*');
        $this->db->from('files');
        $this->db->where('referance_id = '.$referance_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_all_user_ratings($product_id,$uid = NULL,$rating = NULL){
        if(!empty($uid)){
            $this->db->where('comment_uid = '.$uid);
        }
        if(!empty($rating)){
            $this->db->where('ratings = '.$rating);
        }
        $this->db->select('*');
        $this->db->from('comment');
        $this->db->join('users','comment.comment_uid=users.uid','inner');
        $this->db->where('comment.pro_id = '.$product_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    function update_my_wishlist($wish_uid,$wish_pid){
        $condition = " wish_uid = " . "'" . $wish_uid . "'";
            $this->db->select('*');
            $this->db->from('wishlist');
            $this->db->where('wish_uid',$wish_uid);
            $this->db->where('wish_pid',$wish_pid);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                 $data = array(
                    'wish_uid' => $wish_uid,
                    'wish_pid' => $wish_pid,
                    'created' => time(),
                    'modified'=>time()
                );
                $this->db->insert('wishlist', $data);
                if ($this->db->affected_rows() > 0) {
                    $return = true;
                } else {
                    $return = false; 
                }
            } else {
                $return = true;
            }
            return $return;
    }
    
     // Delete category data in database
    public function delete_from_my_wishlist($wish_uid,$wish_pid) {
        $data = array(
            'wish_uid' => $wish_uid,
            'wish_pid' => $wish_pid
        );
        $this->db->delete('wishlist', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_all_user_wishlist($wish_uid,$wish_pid = NULL) {
        $this->db->select('*');
            $this->db->from('wishlist');
            if(!empty($wish_pid)){
                $this->db->where('wish_pid',$wish_pid);
                $this->db->limit(1);
            }
            $this->db->join('product','product.pid = wishlist.wish_pid','inner');
            $this->db->join('company', 'company.comid = product.pro_company','inner');
            $this->db->join('files', 'files.referance_id = product.pid and files.referance_type ="product"','left');
            $this->db->where('wish_uid',$wish_uid);
            $query = $this->db->get();
            return $query->result();
    }
    
    public function get_all_list_in_bulk_products(){
        
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('company', 'company.comid = product.pro_company','inner');
        $this->db->join('category', 'category.catid = product.pro_category','inner');
        $this->db->join('location', 'location.locid = product.pro_location','inner');
        $this->db->join('type', 'type.typeid = product.pro_type','inner');
        $this->db->join('product_bulk_list', 'product_bulk_list.product_id = product.pid','inner');
        $this->db->join('bulk_list', 'bulk_list.list_id = product_bulk_list.list_id','inner');
        $this->db->join('users', 'users.uid = product.pro_user','inner');
        $this->db->join('files', 'files.referance_id = product.pid and files.referance_type ="product"','left');
        $this->db->group_by('product.pid');
        $this->db->order_by('bulk_list.created', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_user_bulk_list($uid,$list_id = NULL){
        if(!empty($list_id)){
            $this->db->join('product_bulk_list','product_bulk_list.list_id = bulk_list.list_id','inner');
            $this->db->where('product_bulk_list.list_id = '.$list_id);
            $this->db->join('product','product.pid = product_bulk_list.product_id','inner');
        }
        
        $this->db->select('*');
        $this->db->from('bulk_list');
        $this->db->where('bulk_list.user_id = '.$uid);
        $this->db->where('bulk_list.status = '.STATUS_ACTIVE);
        $query = $this->db->get();
        return $query->result();
    }

}

?>