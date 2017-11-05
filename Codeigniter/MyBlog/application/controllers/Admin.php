<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        global $map_institutes ;
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $map_institutes = $this->admin_model_get->get_all_inst();
    }

    public function index() {
        $this->load->view('admin_home');
    }

    public function addgroup($group_id = NULL) {
        $groups = $this->admin_model_get->get_all_groups();
        $data = array('groups' => $groups);
        if (!empty($group_id)) {
            $group = $this->admin_model_get->get_all_groups($group_id);
            $data['single_group'] = $group;
        }
        $this->load->view('add_group', $data);
    }

    public function showgroup() {
        $groups = $this->admin_model_get->get_all_groups();
        $data = array('groups' => $groups);
        $this->load->view('show_group', $data);
    }

    public function insertgroup() {
        $group_id = $this->input->post('groupid');

        $group_name = $this->input->post('groupname');
        $group_parent = $this->input->post('groupparent');
        $group_status = $this->input->post('groupstatus');
        $institute_id = $this->input->post('institute');
        $this->form_validation->set_rules('groupname', 'Group Name', 'trim|required');
        $this->form_validation->set_rules('groupstatus', 'Product Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $status_message = array('type'=>'warning','message'=>'Groups update failed.' . validation_errors());
            $this->session->set_flashdata('status_message',$status_message);
            redirect('admin/showgroup');
        } else {
            $data = array(
                'group_name' => $group_name,
                'created' => time(),
                'modified' => time(),
                'parent_gid' => $group_parent,
                'institute_id' => $institute_id,
                'status' => $group_status
            );
            if (!empty($group_id)) {
                $conditions = array('gid' => $group_id);
                $resultgroup = $this->admin_model->admin_update('groups', $data, $conditions);
            } else {
                $resultgroup = $this->admin_model->admin_insert('groups', $data);
            }
            $status_message = array('type'=>'success','message'=>'Groups update successfully.');
            $this->session->set_flashdata('status_message',$status_message);
            redirect('admin/showgroup');
        }
    }

//         for subject
    public function addsubject($subject_id = NULL) {
        $groups = $this->admin_model_get->get_all_groups();
        $data = array('groups' => $groups);
        if (!empty($subject_id)) {
            $subject = $this->admin_model_get->get_all_subjects($subject_id);
            $data['single_sub'] = $subject;
            $condition = array(
                'reference_id' => $subject_id,
                'reference_type' => 'subjects'
            );
            $data['files'] = $this->admin_model_get->get_all_files($condition);
        }
        $this->load->view('add_subject', $data);
    }

    public function showsubject() {
        $subjects = $this->admin_model_get->get_all_subjects();
        $data = array('subjects' => $subjects);
        $this->load->view('show_subject', $data);
    }

    public function insertsubject() {
        $subject_id = $this->input->post('subjectid');
        $sub_name = $this->input->post('subname');
        $sub_desc = $this->input->post('subdesc');
        $sub_status = $this->input->post('substatus');
        $institute_id = $this->input->post('institute');
        $this->form_validation->set_rules('subname', 'Subject Name', 'trim|required');
        $this->form_validation->set_rules('subdesc', 'Subject Description', 'trim|required');
        $this->form_validation->set_rules('substatus', 'Subject Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $status_message = array('type'=>'warning','message'=>'Groups update failed.' . validation_errors());
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/addsubject');
        } else {
            $data = array(
                'subject_name' => $sub_name,
                'subject_description' => $sub_desc,
                'status' => $sub_status,
                'institute_id'=>$institute_id,
                'created' => time(),
                'modified' => time()
            );
            if (!empty($subject_id)) {
                $conditions = array('subject_id' => $subject_id);
                $sub_result = $this->admin_model->admin_update('subjects', $data, $conditions);
                $reference_id = $subject_id;
            } else {
                $sub_result = $this->admin_model->admin_insert('subjects', $data);
                $reference_id = $sub_result;
            }
            upload_files('subjects', $reference_id);
            $status_message = array('type'=>'success','message'=> 'Subjects update successfully.');
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/showsubject');
        }
    }

    public function adduser($user_id = NULL) {
        $groups = $this->admin_model_get->get_all_groups();
        $roles = $this->admin_model_get->get_all_roles();
        $data = array('groups' => $groups, 'roles' => $roles);

        if (!empty($user_id)) {

            $user_groups = $this->admin_model_get->get_all_user_groups($user_id);
            if (!empty($user_groups)) {
                $user_groups_array = array();
                foreach ($user_groups as $key => $group) {
                    $user_groups_array[] = $group->group_id;
                }
                $data['saved_groups'] = $user_groups_array;
            }
            $user = $this->admin_model_get->get_all_users($user_id);
            if (!empty($user)) {
                $data['single_user'] = $user;
            }
            $condition = array(
                'reference_id' => $user_id,
                'reference_type' => 'users'
            );
            $files = $this->admin_model_get->get_all_files($condition);
            if (!empty($files)) {
                $data['files'] = $files;
            }
        }
        $this->load->view('add_user', $data);
    }

    public function showuser() {
        $users = $this->admin_model_get->get_all_users();
        $datausers = array('users' => $users);
        $this->load->view('show_user', $datausers);
    }

    public function insertuser() {
        $user_id = $this->input->post('uid');
        $redirect = '';
        if (!empty($user_id)) {
            $redirect = '/' . $user_id;
        }
        $first_name = $this->input->post('fname');
        $last_name = $this->input->post('lname');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        //          $c_password = $this->input->post('cpassword') ;
        $mobile = $this->input->post('mobile');
        $dob = $this->input->post('dob');
        $address = $this->input->post('address');
        $country = $this->input->post('country');
        $state = $this->input->post('state');
        $city = $this->input->post('city');
        $groups = $this->input->post('groups');
        $userrole = $this->input->post('userrole');
        $institute_id = $this->input->post('institute');
        $user_status = $this->input->post('userstatus');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
//           $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
        $this->form_validation->set_rules('groups[]', 'Groups', 'required');
        $this->form_validation->set_rules('userrole', 'Role', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile No.', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('userstatus', 'User Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $status_message = array('type' => 'warning', 'message' => 'Users update failed.' . validation_errors());
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/adduser' . $redirect);
        } else {
            $data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $password,
                'mobile' => $mobile,
                'dob' => $dob,
                'address' => $address,
                'country' => $country,
                'state' => $state,
                'city' => $city,
                'role' => $userrole,
                'institute_id'=>$institute_id,
                'created' => time(),
                'modified' => time(),
                'status' => $user_status
            );
            if (!empty($user_id)) {
                $resultuser = $this->admin_model->admin_update('users', $data, $user_id, $groups);
                $reference_id = $user_id;
            } else {
                $resultuser = $this->admin_model->admin_insert('users', $data, $groups);
                $reference_id = $resultuser;
            }
            upload_files('users', $reference_id);
            $status_message = array('type' => 'success', 'message' => 'User update successfully.');
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/showuser');
        }
    }

    public function addrole($role_id = NULL) {
        $groups = $this->admin_model_get->get_all_groups();
        $data = array('groups' => $groups);
        if (!empty($role_id)) {
            $role = $this->admin_model_get->get_all_roles($role_id);
            $data['single_role'] = $role;
        }
        $this->load->view('add_role', $data);
    }

    public function showrole() {
        $user_roles = $this->admin_model_get->get_all_roles();
        $data = array('userroles' => $user_roles);
        $this->load->view('show_role', $data);
    }

    public function insertrole() {
        $role_id = $this->input->post('roleid');
        if (!empty($role_id)) {
            
        }
        $role_name = $this->input->post('rolename');
        $this->form_validation->set_rules('rolename', 'Role Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_message', 'Role update failed.' . validation_errors());
            redirect('admin/addrole');
        } else {
            $data = array(
                'role_name' => $role_name,
                'created' => time(),
                'modified' => time(),
            );

            if (!empty($role_id)) {
                $conditions = array('rid' => $role_id);
                $resultrole = $this->admin_model->admin_update('user_roles', $data, $conditions);
            } else {
                $resultrole = $this->admin_model->admin_insert('user_roles', $data);
            }
            $this->session->set_flashdata('status_message', 'Role update successfully.');
            redirect('admin/showrole');
        }
//      permission tobe insterted pending   
    }

    public function addpermission($per_id = NULL) {
        $groups = $this->admin_model_get->get_all_groups();
        $data = array('groups' => $groups);
        if (!empty($per_id)) {
            $permission = $this->admin_model_get->get_all_per($per_id);
            $data['single_per'] = $permission;
        }
        $this->load->view('add_permission', $data);
    }

    public function showpermission() {
        $permission = $this->admin_model_get->get_all_per();
        $data = array('permission' => $permission);
        $this->load->view('show_permission', $data);
    }

    public function insertpermission() {
        $per_id = $this->input->post('perid');
        if (!empty($per_id)) {
            
        }
        $per_name = $this->input->post('pername');
        $this->form_validation->set_rules('pername', 'Permission Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_message', 'Permission update failed.' . validation_errors());
            redirect('admin/addpermission');
        } else {
            $data = array(
                'per_name' => $per_name,
                'created' => time(),
                'modified' => time()
            );
            if (!empty($per_id)) {
                $conditions = array('per_id' => $per_id);
                $resultper = $this->admin_model->admin_update('permission', $data, $conditions);
            } else {
                $resultper = $this->admin_model->admin_insert('permission', $data);
            }
            $status_message = array('type' => 'success', 'message' => 'permission update successfully.');
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/showpermission');
        }
    }

    public function addblog($blog_id = NULL) {
        $groups = $this->admin_model_get->get_all_groups();
        $data = array('groups' => $groups);
        if (!empty($blog_id)) {
            $blog = $this->admin_model_get->get_all_blogs($blog_id);
            $data['single_blog'] = $blog;
        }
        $this->load->view('add_blog', $data);
    }

    public function showblog() {
        $blogs = $this->admin_model_get->get_all_blogs();
        $data = array('blogs' => $blogs);
        $this->load->view('show_blog', $data);
    }

    public function insertblog() {
        $blog_title = $this->input->post('blogtitle');
//           $stream = $this->input->post('stream') ;
        $blog_desc = $this->input->post('blogdesc');
        $blog_status = $this->input->post('blogstatus');
        $blog_id = $this->input->post('blogid');
        $institute_id =  $this->input->post('institute');
        $this->form_validation->set_rules('blogtitle', 'Blog Title', 'trim|required');
        $this->form_validation->set_rules('blogstatus', 'Blog Status', 'trim|required');
        $this->form_validation->set_rules('blogdesc', 'Blog Description', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $status_message = array('type'=>'warning','message'=>'Blog update failed.' . validation_errors());
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/addblog');
        } else {
            $data = array(
                'blog_title' => $blog_title,
                'blog_description' => $blog_desc,
                'created' => time(),
                'modified' => time(),
//                'blog_uid' => $group_parent,
                'institute_id'=>$institute_id,
                'status' => $blog_status
            );
            if (!empty($blog_id)) {
                $resultblog = $this->admin_model->admin_update('blogs', $data, $blog_id);
                $reference_id = $blog_id;
            } else {
                $resultblog = $this->admin_model->admin_insert('blogs', $data);
                $reference_id = $resultblog;
            }
            upload_files('blogs', $reference_id);
            $status_message = array('type'=>'warning','message'=>'Blogs update successfully.');
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/showblog');
        }
    }

    public function addprogramme($prog_id = NULL) {
        $groups = $this->admin_model_get->get_all_groups();
        $data = array('groups' => $groups);
        if (!empty($prog_id)) {
            $programme = $this->admin_model_get->get_all_programme($prog_id);
            $data['single_prog'] = $programme;
        }
        $this->load->view('add_programme', $data);
    }

    public function showprogramme() {
        $programme = $this->admin_model_get->get_all_programme();
        $data = array('programme' => $programme);
        $this->load->view('show_programme', $data);
    }

    public function insertprogramme() {
        $prog_id = $this->input->post('progid');

        $prog_name = $this->input->post('progname');
        $prog_desc = $this->input->post('progdesc');
        $prog_status = $this->input->post('progstatus');
        $this->form_validation->set_rules('progname', 'Programme Name', 'trim|required');
        $this->form_validation->set_rules('progdesc', 'Programme Description', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_message', 'Programme update failed.' . validation_errors());
            redirect('admin/addprogramme');
        } else {
            $data = array(
                'prog_name' => $prog_name,
                'prog_description' => $prog_desc,
                'modified' => time(),
                'created' => time(),
                'status' => $prog_status
            );
            if (!empty($prog_id)) {
                $conditions = array('prog_id' => $prog_id);
                $result = $this->admin_model->admin_update('programme', $data, $conditions);
            } else {
                $result = $this->admin_model->admin_insert('programme', $data);
            }
            $this->session->set_flashdata('status_message', 'Programme update successfully.');
            redirect('admin/showprogramme');
        }
    }

    public function addlibrary($library_id = NULL) {
        $groups = $this->admin_model_get->get_all_groups();
        $data = array('groups' => $groups);
        if (!empty($library_id)) {
            $library = $this->admin_model_get->get_all_library($library_id);
            $data['single_lib'] = $library;
        }
        $this->load->view('add_library', $data);
    }

    public function showlibrary() {
        $library = $this->admin_model_get->get_all_library();
        $data = array('library' => $library);
        $this->load->view('show_library', $data);
    }

    public function insertlibrary() {
        $library_id = $this->input->post('libraryid');
        if (!empty($library_id)) {
            
        }
        $library_name = $this->input->post('libraryname');
        $library_desc = $this->input->post('librarydesc');
        $institute_id = $this->input->post('institute');
        $this->form_validation->set_rules('libraryname', 'Library Name', 'trim|required');
        $this->form_validation->set_rules('librarydesc', 'library description', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $status_message = array('type'=>'warning','message'=>'library update failed.' . validation_errors());
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/addlibrary');
        } else {
            $data = array(
                'library_name' => $library_name,
                'library_desc' => $library_desc,
                'institute_id'=>$institute_id,
                'created' => time(),
                'modified' => time(),
            );
            if (!empty($library_id)) {
                $conditions = array('library_id' => $library_id);
                $result = $this->admin_model->admin_update('library', $data, $conditions);
                $reference_id = $library_id;
            } else {
                $result = $this->admin_model->admin_insert('library', $data);
                $reference_id = $result;
            }
            upload_files('library', $reference_id);
            $status_message = array('type'=>'warning','message'=>'library update successfully.');
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/showlibrary');
        }
    }

    public function addcategory($cat_id = NULL) {
        $category = $this->admin_model_get->get_all_category();
        $data = array('category' => $category);
        if (!empty($cat_id)) {
            $category = $this->admin_model_get->get_all_category($cat_id);
            $data['single_cat'] = $category;
        }
        $this->load->view('add_category', $data);
    }

    public function showcategory() {
        $category = $this->admin_model_get->get_all_category();
        $data = array('category' => $category);
        $this->load->view('show_category', $data);
    }

    public function insertcategory() {
        $cat_id = $this->input->post('catid');
        if (!empty($cat_id)) {
            
        }
        $cat_name = $this->input->post('catname');
        $cat_desc = $this->input->post('catdesc');
        $cat_status = $this->input->post('catstatus');
        $this->form_validation->set_rules('catname', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('catdesc', 'Category Description', 'trim|required');
        $this->form_validation->set_rules('catstatus', 'Category status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_message', 'Category update failed.' . validation_errors());
            redirect('admin/addcategory');
        } else {
            $data = array(
                'cat_name' => $cat_name,
                'cat_desc' => $cat_desc,
                'created' => time(),
                'modified' => time(),
                'status' => $cat_status
            );
            if (!empty($cat_id)) {
                $conditions = array('cat_id' => $cat_id);
                $result = $this->admin_model->admin_update('category', $data, $conditions);
            } else {
                $result = $this->admin_model->admin_insert('category', $data);
            }
            $this->session->set_flashdata('status_message', 'Category update successfully.');
            redirect('admin/showcategory');
        }
    }

    public function addinst($inst_id = NULL) {
        $data = array();
        if (!empty($inst_id)) {
            $institute = $this->admin_model_get->get_all_inst($inst_id);
            $data['single_inst'] = $institute;
            $condition = array(
                'reference_id' => $inst_id,
                'reference_type' => 'institution'
            );
            $data['files'] = $this->admin_model_get->get_all_files($condition);
        }
        $this->load->view('add_institution', $data);
    }

    public function showinst() {
        $institute = $this->admin_model_get->get_all_inst();
        $data = array('institute' => $institute);
        $this->load->view('show_institution', $data);
    }

    public function insertinst() {
        $inst_id = $this->input->post('instid');
        if (!empty($inst_id)) {
            
        }
        $inst_name = $this->input->post('instname');
        $inst_desc = $this->input->post('instdesc');
        $inst_status = $this->input->post('inststatus');
        $this->form_validation->set_rules('instname', 'Group Name', 'trim|required');
        $this->form_validation->set_rules('instdesc', 'Institution Description', 'trim|required');
        $this->form_validation->set_rules('inststatus', 'Institution Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $status_message = array('type' => 'warning', 'message' => 'Institute update failed.' . validation_errors());
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/addinst');
        } else {
            $data = array(
                'institute_name' => $inst_name,
                'institute_description' => $inst_desc,
                'created' => time(),
                'modified' => time(),
                'status' => $inst_status
            );
            if (!empty($inst_id)) {
                $result = $this->admin_model->admin_update('institution', $data, $inst_id);
                $reference_id = $inst_id;
            } else {
                $result = $this->admin_model->admin_insert('institution', $data);
                $reference_id = $result;
            }
            upload_files('institution', $reference_id);
            $status_message = array('type' => 'warning', 'message' => 'Institute updated successfully.');
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/showinst');
        }
    }

    public function addfaculty() {
        $this->load->view('add_faculty');
    }

    public function showfaculty() {
        $faculty = $this->admin_model_get->get_all_fac();
        $data = array('institute' => $institute);
        $this->load->view('show_faculty', $data);
    }

    public function insertfaculty() {
        $inst_id = $this->input->post('instid');
        if (!empty($inst_id)) {
            
        }
        $fac_name = $this->input->post('facname');
        $fac_desc = $this->input->post('facdesc');
        $inst_status = $this->input->post('inststatus');
        $this->form_validation->set_rules('facname', 'Faculty Name', 'trim|required');
        $this->form_validation->set_rules('facdesc', 'Faculty Description', 'trim|required');
        $this->form_validation->set_rules('facstatus', 'Faculty Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_message', 'Faculty update failed.' . validation_errors());
            redirect('admin/addinst');
        } else {
            $data = array(
                'institute_name' => $inst_name,
                'institute_description' => $inst_desc,
                'created' => time(),
                'modified' => time(),
                'status' => $inst_status
            );
            $conditions = array('institute_name' => $inst_name);
            $result = $this->admin_model->admin_insert('institution', $data, $conditions);
            $this->session->set_flashdata('status_message', ' update successfully.');
            redirect('admin/showinst');
        }
    }

    public function deleteContent() {
        $type = $this->input->post('type');            //type: table name
        $id = $this->input->post('id');
        if (!empty($type) && !empty($id)) {
            $result = $this->admin_model->delete_content($type, $id);
            if ($result) {
                print 'true';
            } else {
                print 'false';
            }
        } else {
            print 'false';
        }
    }

    public function addforum($forum_id = NULL) {
        $data = array();
        if (!empty($forum_id)) {
            $forum = $this->admin_model_get->get_all_forum();
            $data['single_for'] = $forum;
            $condition = array(
                'reference_id' => $forum_id,
                'reference_type' => 'forum'
            );
            $data['files'] = $this->admin_model_get->get_all_files($condition);
        }
        $this->load->view('add_forum', $data);
    }

    public function showforum() {
        $forums = $this->admin_model_get->get_all_forum();
        $data = array('forums' => $forums);
        $this->load->view('show_forum', $data);
    }

    public function insertforum($forum_id = NULL) {
        $forum_title = $this->input->post('fortitle');
        $forum_desc = $this->input->post('fordesc');
        $forum_id = $this->input->post('forid');
        $forum_status = $this->input->post('forstatus');
        $institute_id = $this->input->post('institute');
        $this->form_validation->set_rules('fortitle', 'Forum title', 'trim|required');
        $this->form_validation->set_rules('fordesc', 'Forum Description', 'trim|required');

        if ($this->form_validation->run() == false) {
            $status_message = array('type'=>'warning','message'=>'forum update failed' . validation_errors());
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/addforum');
        } else {
            $data = array(
                'forum_title' => $forum_title,
                'forum_desc' => $forum_desc,
                'status' => $forum_status,
                'created' => time(),
                'institute_id'=>$institute_id,
                'modified' => time()
            );
        }
        if(!empty($forum_id)){
          $query = $this->admin_model->admin_update('forum', $data,$forum_id); 
          $reference_id = $forum_id;
        }else{
           $query = $this->admin_model->admin_insert('forum', $data);   
           $reference_id = $query;
        }
        upload_files('forum', $reference_id);
        $status_message = array('type'=>'success','message'=>'forum update successfully.');
        $this->session->set_flashdata('status_message', $status_message);
        redirect('admin/showforum');
    }

    public function addstream($stream_id = NULL) {
        $stream = $this->admin_model_get->get_all_stream();
        $data = array('stream' => $stream);
        if (!empty($stream_id)) {
            $stream = $this->admin_model_get->get_all_stream();
            $data['single_stream'] = $stream;
        }
        $this->load->view('add_stream', $data);
    }

    public function showstream() {
        $streams = $this->admin_model_get->get_all_stream();
        $data = array('streams' => $streams);
        $this->load->view('show_stream', $data);
    }

    public function insertstream() {
        $stream_name = $this->input->post('streamname');
        $stream_id = $this->input->post('streamid');
        $stream_desc = $this->input->post('streamdesc');
        $stream_status = $this->input->post('streamstatus');
        $this->form_validation->set_rules('streamname', 'Stream Name', 'trim|required');
        $this->form_validation->set_rules('streamdesc', 'Stream description', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('status_message', 'stream update failed' . validation_errors());
            redirect('admin/addstream');
        } else {
            $data = array(
                'stream_name' => $stream_name,
                'stream_desc' => $stream_desc,
                'status' => $stream_status,
                'created' => time(),
                'modified' => time()
            );
            if (!empty($stream_id)) {
                $conditions = array('stream_id' => $stream_id);
                $result = $this->admin_model->admin_update('streams', $data, $conditions);
            } else {
                $result = $this->admin_model->admin_insert('streams', $data);
            }
            $this->session->set_flashdata('status_message', 'Category update successfully.');
            redirect('admin/showstream');
        }
    }

    public function addalbum($album_id = NULL) {
        $institutes = $this->admin_model_get->get_all_inst();
        $data = array('institutes'=>$institutes);
        if (!empty($album_id)) {
            $albums = $this->admin_model_get->get_all_albums($album_id);
            if(!empty($albums)){
                $data['single_album'] = $albums;
                $data['single_institute'] = $albums[0]->institute_id;
            }
            
             $condition = array(
                'reference_id' => $album_id,
                'reference_type' => 'institution_album'
            );
            $data['files'] = $this->admin_model_get->get_all_files($condition);
        }
        $this->load->view('add_album', $data);
    }

    public function showalbum($degtyp_id = null) {
        $album = $this->admin_model_get->get_all_albums();
        $data = array('albums' => $album);
        $this->load->view('show_album', $data);
    }

    public function insertalbum() {
        $album_id = $this->input->post('albumid');
        $album_name = $this->input->post('albumname');
        $album_desc = $this->input->post('albumdesc');
        $status = $this->input->post('status');
        $institute = $this->input->post('institute');
        $this->form_validation->set_rules('albumname', 'Degree Type Name', 'trim|required');
        $this->form_validation->set_rules('albumdesc', 'Degree Type description', 'trim|required');

        if ($this->form_validation->run() == false) {
            $status_message = array('type'=>'warning','message'=>'Album update failed' . validation_errors());
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/addalbum');
        } else {
            $data = array(
                'album_name' => $album_name,
                'album_desc' => $album_desc,
                'institute_id' => $institute,
                'status' => $status,
                'created' => time(),
                'modified' => time()
            );
            if (!empty($album_id)) {
                $result = $this->admin_model->admin_update('institution_album', $data, $album_id);
                $reference_id = $album_id;
            } else {
                $result = $this->admin_model->admin_insert('institution_album', $data);
                $reference_id = $result;
            }
            upload_files('institution_album', $reference_id);
            $status_message = array('type'=>'warning','message'=>'Album update successfully.');
            $this->session->set_flashdata('status_message', $status_message);
            redirect('admin/showalbum');
        }
    }

    public function adddegtype($degtyp_id = NULL) {
        $degtyp = $this->admin_model_get->get_all_degtyp();
        $data = array('degtyp' => $degtyp);
        if (!empty($degtyp_id)) {
            $degtyp = $this->admin_model_get->get_all_degtyp();
            $data['single_degtyp'] = $degtyp;
        }
        $this->load->view('add_degree_type', $data);
    }

    public function showdegtype($degtyp_id = null) {
        $degtyp = $this->admin_model_get->get_all_degtyp();
        $data = array('degtypes' => $degtyp);
        $this->load->view('show_degree_type', $data);
    }

    public function insertdegtype() {
        $degtyp_name = $this->input->post('degtypname');
        $degtyp_id = $this->input->post('degtypid');
        $degtyp_desc = $this->input->post('degtypdesc');
        $degtyp_status = $this->input->post('degtypstatus');
        $this->form_validation->set_rules('degtypname', 'Degree Type Name', 'trim|required');
        $this->form_validation->set_rules('degtypdesc', 'Degree Type description', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('status_message', 'Degree type update failed' . validation_errors());
            redirect('admin/adddegtype');
        } else {
            $data = array(
                'deg_typ_name' => $degtyp_name,
                'deg_typ_desc' => $degtyp_desc,
                'status' => $degtyp_status,
                'created' => time(),
                'modified' => time()
            );
            if (!empty($degtyp_id)) {
                $conditions = array('deg_typ_id' => $degtyp_id);
                $result = $this->admin_model->admin_update('degree_type', $data, $conditions);
            } else {
                $result = $this->admin_model->admin_insert('degree_type', $data);
            }
            $this->session->set_flashdata('status_message', 'Degree type update successfully.');
            redirect('admin/showdegtype');
        }
    }

    public function mapcontent() {

        $this->load->view('map_content');
    }

}
