<?php

Class admin_Add extends CI_Model {

// Insert product data in database
    public function product_insert($data) {



// Query to insert product in database


        $this->db->insert('product', $data);
        if ($this->db->affected_rows() > 0) {
            $product_id = $this->db->insert_id();
            $all_files = $_FILES['productimage']['name'];
            foreach ($all_files as $file_key => $file) {
                if (!empty($file)) {
                    $file_type = pathinfo($file, PATHINFO_EXTENSION);
                    $file_temp_path = $_FILES['productimage']['tmp_name'][$file_key];
                    $file_name = $file;
                    $file_size = $_FILES['productimage']['size'][$file_key];
                    $image_path = $this->file_image_path('product', $file_name, $file_type, $file_size, $file_temp_path);
                    if (!empty($image_path['sucess'][0])) {
                        $this->files_insert($image_path['sucess'][0], 'product', $product_id, $file_key + 1);
                    }
                }
            }

            return true;
        } else {
            return false;
        }
    }

    function file_image_path($type, $file_name, $file_type, $file_size, $file_temp_path) {

        switch ($type) {
            case 'product' :
                $directory_path = FILE_DIRECTORY . PRODUCT_IMAGE_DIRECTORY;
                break;

            default:
                break;
        }

        $uploadOk = 1;
        $file_upload_info = array();
        $target_file = $directory_path . basename($file_name);

        // Check if file already exists

        if (file_exists($target_file)) {
            $file_upload_info['sucess'][] = $file_name;
            $file_upload_info['error'][] = "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($file_size > 5000000) {
            $file_upload_info['error'][] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $file_upload_info['error'][] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $file_upload_info['error'][] = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (!is_dir($directory_path)) {
                mkdir($directory_path, 0777, TRUE);
            }
            $file_result = move_uploaded_file($file_temp_path, $target_file);
            if ($file_result == true) {
                $file_upload_info['sucess'][] = $file_name;
            } else {
                $file_upload_info['error'][] = "Sorry, there was an error uploading your file.";
            }
        }
        return $file_upload_info;
    }

    // Delete product data in database
    public function product_delete($product_id) {


// Query to delete product in database
        $data = array(
            'pid' => $product_id
        );
        $this->db->delete('product', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Update product data in database
    public function product_update($product, $pid) {

// Query to update product in database
        $this->db->where('pid', $pid);
        $this->db->update('product', $product);
        if ($this->db->affected_rows() > 0) {
            $product_id = $pid;
            $all_files = $_FILES['productimage']['name'];
            foreach ($all_files as $file_key => $file) {
                if (!empty($file)) {
                    $file_type = pathinfo($file, PATHINFO_EXTENSION);
                    $file_temp_path = $_FILES['productimage']['tmp_name'][$file_key];
                    $file_name = $file;
                    $file_size = $_FILES['productimage']['size'][$file_key];
                    $image_path = $this->file_image_path('product', $file_name, $file_type, $file_size, $file_temp_path);
                    if (!empty($image_path['sucess'][0])) {
                        $result = $this->files_update($image_path['sucess'][0], 'product', $product_id, $file_key + 1);
                        if (!$result) {
                            $this->files_insert($image_path['sucess'][0], 'product', $product_id, $file_key + 1);
                        }
                    }
                } else {
                    $this->files_delete('product', $product_id, $file_key + 1);
                }
            }
            return true;
        } else {
            return false;
        }
    }

    // Insert category data in database
    public function category_insert($uid,$cat_name) {
// Query to insert data in database
        $condition = " cat_name = " . "'" . $cat_name . "'";
            $this->db->select('*');
            $this->db->from('category');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                $data = array(
                'cat_name' => $cat_name,
                'created' => time(),
                'modified' => time(),
                'cat_uid' => $uid,
                'status' => STATUS_ACTIVE,
                );
                $this->db->insert('category', $data);
                if ($this->db->affected_rows() > 0) {
                    $return = $this->db->insert_id();
                } else {
                    $return = 2; // Default product type
                }
            } else {
                $result = $query->result();
                $return = $result[0]->catid;
            }
            
        return $return;
    }

    // Delete category data in database
    public function category_delete($catid) {


// Query to delete category in database
        $data = array(
            'catid' => $catid
        );
        $this->db->delete('category', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
     // Insert product type data in database
    public function type_insert($uid,$type_name) {
// Query to insert data in database
            $condition = " type_name = " . "'" . $type_name . "'";
            $this->db->select('*');
            $this->db->from('type');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                $data = array(
                'type_name' => $type_name,
                'created' => time(),
                'modified' => time(),
                'type_uid' => $uid,
                'status' => STATUS_ACTIVE,
                );
                $this->db->insert('type', $data);
                if ($this->db->affected_rows() > 0) {
                    $return = $this->db->insert_id();
                } else {
                    $return = 2; // Default product type
                }
            } else {
                $result = $query->result();
                $return = $result[0]->typeid;
            }
            
        return $return;
        
    }

    // Delete type data in database
    public function type_delete($catid) {


// Query to delete type in database
        $data = array(
            'type' => $catid
        );
        $this->db->delete('type', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    

    // Insert category data in database
    public function location_insert($location = NULL, $loc_name = NULL) {

// Query to insert location in database
            $this->db->select('*');
            $this->db->from('location');
            if(!empty($location)){
                $this->db->where('latitude',$location['geoplugin_latitude']);
                $this->db->where('longitude',$location['geoplugin_longitude']);
                $loc_name = $location['geoplugin_city'];
            }
            if(!empty($loc_name)){
                $this->db->where('loc_name like "%'.$loc_name.'%"');
               
            }
            
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                $data = array(
                    'loc_name' => $loc_name,
                    'created' => time(),
                    'modified' => time(),
                    'status' => STATUS_ACTIVE
                );
                if(!empty($location)){
                    $data['latitude'] = $location['geoplugin_latitude'];
                    $data['longitude'] = $location['geoplugin_longitude'];
                }
                $this->db->insert('location', $data);
                if ($this->db->affected_rows() > 0) {
                    $return = $this->db->insert_id();
                } else {
                    $return = 12; // Default location id
                }
            } else {
                $result = $query->result();
                $return = $result[0]->locid;
            }
            
        return $return;
    }

    // Delete category data in database
    public function location_delete($locid) {


// Query to delete category in database
        $data = array(
            'locid' => $locid
        );
        $this->db->delete('location', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function company_insert($com_name = NULL ,$comp_location = NULL ,$uid = NULL) {

// Query to insert company in database
         $condition = " com_name = " . "'" . $com_name . "'";
            $this->db->select('*');
            $this->db->from('company');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                 $data = array(
                    'com_name' => $com_name,
                    'com_location' => $comp_location,
                    'status' => STATUS_ACTIVE,
                    'company_uid'=>$uid
                );
                $this->db->insert('company', $data);
                if ($this->db->affected_rows() > 0) {
                    $return = $this->db->insert_id();
                } else {
                    $return = 2; // Default product type
                }
            } else {
                $result = $query->result();
                $return = $result[0]->comid;
            }
            return $return;
    }

    // Delete category data in database
    public function company_delete($locid) {


// Query to delete category in database
        $data = array(
            'locid' => $locid
        );
        $this->db->delete('location', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function files_insert($path, $reference_type, $referance_id, $file_count) {

// Query to insert company in database

        $data = array(
            'file_path' => $path,
            'referance_type' => $reference_type,
            'referance_id' => $referance_id,
            'file_count' => $file_count
        );
        $this->db->insert('files', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function files_update($path, $reference_type, $referance_id, $file_count) {

// Query to insert company in database

        $data = array(
            'file_path' => $path
        );
        $this->db->where('referance_id', $referance_id);
        $this->db->where('referance_type', $reference_type);
        $this->db->where('file_count', $file_count);
        $this->db->update('files', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function files_delete($reference_type, $referance_id, $file_count) {

// Query to insert company in database

        $this->db->where('referance_id', $referance_id);
        $this->db->where('referance_type', $reference_type);
        $this->db->where('file_count', $file_count);
        $this->db->delete('files');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function contactus_insert($data){
        $this->db->insert('contactus', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>