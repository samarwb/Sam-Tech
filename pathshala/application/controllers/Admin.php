<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pagination');
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

    public function editgroup($group_id = NULL) {
        if (!empty($group_id)) {
            $groups = $this->admin_model_get->get_all_groups($group_id);
            $this->load->view('add_group', array('groups' => $groups));
        } else {
            $this->load->view('add_group');
        }
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
        $this->form_validation->set_rules('groupname', 'Group Name', 'trim|required');
        $this->form_validation->set_rules('groupstatus', 'Product Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_message', 'Groups update failed.' . validation_errors());
            redirect('admin/showgroup');
        } else {
            $data = array(
                'group_name' => $group_name,
                'created' => time(),
                'modified' => time(),
                'parent_gid' => $group_parent,
                'status' => $group_status
            );
            if (!empty($group_id)) {
                $conditions = array('gid' => $group_id);
                $resultgroup = $this->admin_model->admin_update('groups', $data, $conditions);
            } else {
                $resultgroup = $this->admin_model->admin_insert('groups', $data);
            }
            $this->session->set_flashdata('status_message', 'Groups update successfully.');
            redirect('admin/showgroup');
        }
    }

//         for subject
    public function addsubject($subject_id = NULL) {
        $groups = $this->admin_model_get->get_all_groups();
        $data = array('groups' => $groups);
        if (!empty($subject_id)) {
            $subject = $this->admin_model_get->get_all_subjects();
            $data['single_sub'] = $subject;
        }
        $this->load->view('add_subject', $data);
    }

    public function editsubject() {
        $this->load->view('edit_subject');
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
        $this->form_validation->set_rules('subname', 'Subject Name', 'trim|required');
        $this->form_validation->set_rules('subdesc', 'Subject Description', 'trim|required');
        $this->form_validation->set_rules('substatus', 'Subject Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_message', 'Groups update failed.' . validation_errors());
            redirect('admin/addsubject');
        } else {
            $data = array(
                'subject_name' => $sub_name,
                'subject_description' => $sub_desc,
                'status' => $sub_status,
                'created' => time(),
                'modified' => time()
            );
            if (!empty($subject_id)) {
                $conditions = array('subject_id' => $subject_id);
                $sub_result = $this->admin_model->admin_update('subjects', $data, $conditions);
            } else {
                $sub_result = $this->admin_model->admin_insert('subjects', $data);
            }

            $this->session->set_flashdata('status_message', 'Subjects update successfully.');
            redirect('admin/showsubject');
        }
    }

    public function adduser($user_id = NULL) {
        $groups = $this->admin_model_get->get_all_groups();
        $roles = $this->admin_model_get->get_all_roles();
        $data = array('groups' => $groups, 'roles' => $roles);
        
         if(!empty($user_id)){
             $user = $this->admin_model_get->get_all_users();
             $data['single_user'] = $user;
         }        
        $this->load->view('add_user',$data);
    }

    public function edituser() {
        $this->load->view('edit_user');
    }

    public function showuser() {
        $users = $this->admin_model_get->get_all_users();
        $datausers = array('users' => $users);
        $this->load->view('show_user', $datausers);
    }

    public function insertuser() {
        $user_id = $this->input->post('uid');
        if (!empty($user_id)) {
            
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
        $user_status = $this->input->post('userstatus');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
//           $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile No.', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('userstatus', 'User Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_message', 'Users update failed.' . validation_errors());
            redirect('admin/adduser');
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
                'created' => time(),
                'modified' => time(),
                'status' => $user_status
            );
            if(!empty($user_id)){
                $conditions = array('uid' => $user_id ); 
                $resultuser = $this->admin_model->admin_update('users',$data,$conditions);
            }else{
                $resultuser = $this->admin_model->admin_insert('users', $data);
            }            
            $this->session->set_flashdata('status_message', 'User update successfully.');
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

    public function editrole() {
        $this->load->view('edit_role');
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

    public function editpermission() {
        $this->load->view('edit_permission');
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
            $this->session->set_flashdata('status_message', 'permission update successfully.');
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
        $this->form_validation->set_rules('blogtitle', 'Blog Title', 'trim|required');
        $this->form_validation->set_rules('blogstatus', 'Blog Status', 'trim|required');
        $this->form_validation->set_rules('blogdesc', 'Blog Description', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_message', 'Blog update failed.' . validation_errors());
            redirect('admin/addblog');
        } else {
            $data = array(
                'blog_title' => $blog_title,
                'blog_description' => $blog_desc,
                'created' => time(),
                'modified' => time(),
//                'blog_uid' => $group_parent,
                'status' => $blog_status
            );
            if (!empty($blog_id)) {
                $conditions = array('blog_id' => $blog_id);
                $resultblog = $this->admin_model->admin_update('blogs', $data, $conditions);
            } else {
                $resultblog = $this->admin_model->admin_insert('blogs', $data);
            }

            $this->session->set_flashdata('status_message', 'Blogs update successfully.');
            redirect('admin/showblog');
        }
    }

    public function adddegree($deg_id = NULL) {
        $groups = $this->admin_model_get->get_all_groups();
        $data = array('groups' => $groups);
        if (!empty($deg_id)) {
            $degree = $this->admin_model_get->get_all_degree($deg_id);
            $data['single_deg'] = $degree;
        }
        $this->load->view('add_degree', $data);
    }

    public function editdegree() {
        $this->load->view('edit_degree');
    }

    public function showdegree() {
        $degree = $this->admin_model_get->get_all_degree();
        $data = array('degree' => $degree);
        $this->load->view('show_degree', $data);
    }

    public function insertdegree() {
        $deg_id = $this->input->post('degid');

        $deg_name = $this->input->post('degname');
        $deg_desc = $this->input->post('degdesc');
        $deg_status = $this->input->post('degstatus');
        $this->form_validation->set_rules('degname', 'Degree Name', 'trim|required');
        $this->form_validation->set_rules('degdesc', 'Degree Description', 'trim|required');
        $this->form_validation->set_rules('degstatus', 'Degree Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_message', 'degree update failed.' . validation_errors());
            redirect('admin/adddegree');
        } else {
            $data = array(
                'degree_name' => $deg_name,
                'degree_description' => $deg_desc,
                'modified' => time(),
                'created' => time(),
                'status' => $deg_status
            );
            if (!empty($deg_id)) {
                $conditions = array('degree_id' => $deg_id);
                $result = $this->admin_model->admin_update('degree', $data, $conditions);
            } else {
                $result = $this->admin_model->admin_insert('degree', $data);
            }
            $this->session->set_flashdata('status_message', 'Degree update successfully.');
            redirect('admin/showdegree');
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

    public function editlibrary() {
        $this->load->view('edit_library');
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
        $this->form_validation->set_rules('libraryname', 'Library Name', 'trim|required');
        $this->form_validation->set_rules('librarydesc', 'library description', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_message', 'library update failed.' . validation_errors());
            redirect('admin/addlibrary');
        } else {
            $data = array(
                'library_name' => $library_name,
                'library_desc' => $library_desc,
                'created' => time(),
                'modified' => time(),
            );
            if (!empty($library_id)) {
                $conditions = array('library_id' => $library_id);
                $result = $this->admin_model->admin_update('library', $data, $conditions);
            } else {
                $result = $this->admin_model->admin_insert('library', $data);
            }
            $this->session->set_flashdata('status_message', 'library update successfully.');
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

    public function editcategory() {
        $this->load->view('edit_category');
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
        $institute = $this->admin_model_get->get_all_inst();
        $data = array('institute' => $institute);
        if (!empty($inst_id)) {
            $institute = $this->admin_model_get->get_all_inst($inst_id);
            $data['single_inst'] = $institute;
        }
        $this->load->view('add_institution', $data);
    }

    public function editinst() {
        $this->load->view('edit_institution');
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
            $this->session->set_flashdata('status_message', 'Institute update failed.' . validation_errors());
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
                $conditions = array('institute_id' => $inst_id);
                $result = $this->admin_model->admin_update('institution', $data, $conditions);
            } else {
                $result = $this->admin_model->admin_insert('institution', $data);
            }
            $this->session->set_flashdata('status_message', ' update successfully.');
            redirect('admin/showinst');
        }
    }

    public function addfaculty() {
        $this->load->view('add_faculty');
    }

    public function editfaculty() {
        $this->load->view('edit_faculty');
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

    public function deleteContentBlog() {
        $type = $this->input->post('type');            //type: table name
        $id = $this->input->post('id');
        if (!empty($type) && !empty($id)) {
            $result = $this->admin_model->delete_content_blog($type, $id);
            if ($result) {
                print 'true';
            } else {
                print 'false';
            }
        } else {
            print 'false';
        }
    }

    public function deleteElementCatg() {
        $type = $this->input->post('type');            //type: table name
        $id = $this->input->post('id');
        if (!empty($type) && !empty($id)) {
            $result = $this->admin_model->delete_content_catg($type, $id);
            if ($result) {
                print 'true';
            } else {
                print 'false';
            }
        } else {
            print 'false';
        }
    }

    public function deleteElementDegree() {
        $type = $this->input->post('type');            //type: table name
        $id = $this->input->post('id');
        if (!empty($type) && !empty($id)) {
            $result = $this->admin_model->delete_content_degree($type, $id);
            if ($result) {
                print 'true';
            } else {
                print 'false';
            }
        } else {
            print 'false';
        }
    }

    public function deleteElementInst() {
        $type = $this->input->post('type');            //type: table name
        $id = $this->input->post('id');
        if (!empty($type) && !empty($id)) {
            $result = $this->admin_model->delete_content_inst($type, $id);
            if ($result) {
                print 'true';
            } else {
                print 'false';
            }
        } else {
            print 'false';
        }
    }

    public function deleteElementLib() {
        $type = $this->input->post('type');            //type: table name
        $id = $this->input->post('id');
        if (!empty($type) && !empty($id)) {
            $result = $this->admin_model->delete_content_lib($type, $id);
            if ($result) {
                print 'true';
            } else {
                print 'false';
            }
        } else {
            print 'false';
        }
    }

    public function deleteElementPer() {
        $type = $this->input->post('type');            //type: table name
        $id = $this->input->post('id');
        if (!empty($type) && !empty($id)) {
            $result = $this->admin_model->delete_content_per($type, $id);
            if ($result) {
                print 'true';
            } else {
                print 'false';
            }
        } else {
            print 'false';
        }
    }

    public function deleteElementRole() {
        $type = $this->input->post('type');
        $id = $this->input->post('id');
        if (!empty($type) && !empty($id)) {
            $result = $this->admin_model->delete_content_role($type, $id);
            if ($result) {
                print 'true';
            } else {
                print 'false';
            }
        } else {
            print 'false';
        }
    }
    
    public function deleteElementSub() {
        $type = $this->input->post('type');
        $id = $this->input->post('id');
        if (!empty($type) && !empty($id)) {
            $result = $this->admin_model->delete_content_sub($type, $id);
            if ($result) {
                print 'true';
            } else {
                print 'false';
            }
        } else {
            print 'false';
        }
    }
    
    public function deleteElementUser() {
        $type = $this->input->post('type');
        $id = $this->input->post('id');
        if (!empty($type) && !empty($id)) {
            $result = $this->admin_model->delete_content_user($type, $id);
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
         if(!empty($forum_id)){
             $forum = $this->admin_model_get->get_all_forum();
             $data['single_for'] = $forum;
         }
        $this->load->view('add_forum',$data);
    }
    
    public function showforum() {
        $forums = $this->admin_model_get->get_all_forum();
        $data = array('forum'=>$forums);
        $this->load->view('show_forum',$data);
    }
    
    public function insertforum() {
        $forum_title = $this->input->post('fortitle');
        $forum_desc = $this->input->post('fordesc');
        $forum_id = $this->input->post('forid');
        $forum_status = $this->input->post('forstatus');
        $this->form_validation->set_rules('fortitle', 'Forum title', 'trim|required');
        $this->form_validation->set_rules('fordesc', 'Forum Description', 'trim|required');
        
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('status_message','forum update failed'.validation_errors());
            redirect('admin/addforum');
        }  else {
            $data = array(
                'forum_title' => $forum_title,
                'forum_desc' => $forum_desc,
                'status' => $forum_status,
                'created' => time(),
                'modified' => time()
            );
        }
        
        $query = $this->admin_model->admin_insert('forum',$data);
        $this->session->set_flashdata('status message','forum update successfully.');
        redirect('admin/showforum');
        
    }
    public function deleteElementForum() {
        $type = $this->input->post('type');
        $id = $this->input->post('id');
        if (!empty($type) && !empty($id)) {
            $result = $this->admin_model->delete_content_forum($type, $id);
            if ($result) {
                print 'true';
            } else {
                print 'false';
            }
        } else {
            print 'false';
        }
    }

}
