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
        return $return;
    }

}

?>