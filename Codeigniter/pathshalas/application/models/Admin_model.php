<?php

Class Admin_model extends CI_Model {

    public function admin_insert($table_name, $insert_data, $groups = NULL) {

        $this->db->insert($table_name, $insert_data);
        $return = $this->db->insert_id();
        if (!empty($return) && !empty($groups)) {
            foreach ($groups as $key => $group) {
                $this->save_groups_reference($return, $group, $table_name);
            }
        }
        return $return;
    }

    public function save_groups_reference($id, $groups, $type) {
        $this->db->select('*');
        $this->db->from('group_reference');
        $this->db->where('group_id', $groups);
        $this->db->where('reference_id', $id);
        $this->db->where('reference_type', $type);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $data['group_id'] = $groups;
            $data['reference_id'] = $id;
            $data['reference_type'] = $type;
            $this->db->insert('group_reference', $data);
        }
    }

    public function delete_groups_reference($table_name, $id) {
        $result = TRUE;
        if (!empty($id)) {
            $conditions['reference_type'] = $table_name;
            $conditions['reference_id'] = $id;
            $this->db->where($conditions); //get the results
            $result = $this->db->delete('group_reference');
        }
        return $result;
    }

    public function admin_update($table_name, $update_data, $id, $groups = NULL) {
        switch ($table_name) {
            case 'groups':
                $conditions = array('gid' => $id);

                break;
            case 'blogs':
                $conditions = array('blog_id' => $id);

                break;
            case 'category':
                $conditions = array('cat_id' => $id);

                break;
            case 'programme':
                $conditions = array('prog_id' => $id);

                break;
            case 'institution':
                $conditions = array('institute_id' => $id);

                break;
            case 'library':
                $conditions = array('library_id' => $id);

                break;
            case 'permission':
                $conditions = array('per_id' => $id);

                break;
            case 'user_roles':
                $conditions = array('rid' => $id);

                break;
            case 'subjects':
                $conditions = array('subject_id' => $id);

                break;
            case 'users':
                $conditions = array('uid' => $id);

                break;
            case 'forum':
                $conditions = array('forum_id' => $id);

                break;
            case 'streams':
                $conditions = array('stream_id' => $id);

                break;
            case 'degree_type':
                $conditions = array('deg_typ_id' => $id);

                break;
            case 'institution_album':
                $conditions = array('album_id' => $id);

                break;

            default:
                break;
        }
        $query = $this->db->where($conditions); //get the results
        $result = $this->db->update($table_name, $update_data);
        if (!empty($result) && !empty($groups)) {
            $this->delete_groups_reference($table_name, $id);
            foreach ($groups as $key => $group) {
                $this->save_groups_reference($result, $group, $table_name);
            }
        }
        return $result;
    }

    public function delete_content($table_name, $id) {

        switch ($table_name) {
            case 'groups':
                $conditions = array('gid' => $id);

                break;
            case 'blogs':
                $conditions = array('blog_id' => $id);

                break;
            case 'category':
                $conditions = array('cat_id' => $id);

                break;
            case 'programme':
                $conditions = array('prog_id' => $id);

                break;
            case 'institution':
                $conditions = array('institute_id' => $id);

                break;
            case 'library':
                $conditions = array('library_id' => $id);

                break;
            case 'permission':
                $conditions = array('per_id' => $id);

                break;
            case 'user_roles':
                $conditions = array('rid' => $id);

                break;
            case 'subjects':
                $conditions = array('subject_id' => $id);

                break;
            case 'users':
                $conditions = array('uid' => $id);

                break;
            case 'forum':
                $conditions = array('forum_id' => $id);

                break;
            case 'streams':
                $conditions = array('stream_id' => $id);

                break;
            case 'degree_type':
                $conditions = array('deg_typ_id' => $id);

                break;

            default:
                break;
        }
        $result = FALSE;
        if (!empty($conditions)) {
            $this->db->where($conditions); //get the results
            $result = $this->db->delete($table_name);
        }
        return $result;
    }

    public function delete_files($table_name, $id) {
        $conditions = array(
            'reference_type' => $table_name,
            'reference_id' => $id
        );
        $result = FALSE;
        if (!empty($conditions)) {
            $this->db->where($conditions); //get the results
            $result = $this->db->delete('files');
        }
        return $result;
    }

}

?>