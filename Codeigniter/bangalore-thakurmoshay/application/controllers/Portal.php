<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this -> load -> library('form_validation');
        }
	
	public function index()
	{
            $album = $this->admin_model_get->get_all_albums(NULL,3);
            $all_values['albums'] = $album;
            $this->load->view('portal_home.php',$all_values);
	}
        
        public function comming_soon(){
            $this->load->view('404.php');
        }
        
        public function about_me(){
            $this->load->view('about_me.php');
        }
        public function gallary(){
            $album = $this->admin_model_get->get_all_albums();
            $all_values['albums'] = $album;
            $this->load->view('portal_gallary.php',$all_values);
        }
        public function contact_me(){
            $album = $this->admin_model_get->get_all_albums();
            $all_values['albums'] = $album;
            $this->load->view('portal_contact_me.php',$all_values);
        }
        
        public function userContact() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $message_display = array('type'=>'warning','message'=>'Could not contact.'.  validation_errors());
            $this->session->set_flashdata('message_display',$message_display);
            redirect("portal/contact_me");
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'message' => $this->input->post('message'),
                'time'=>time()
            );
            $this->admin_model->admin_insert('contact_me',$data);
            $email = $this->input->post('email');
            $message = $this->load->view('contact_me_mail',$data,TRUE);
            $subject = 'Successfully Contacted Thakurmoshay Joydev Chatterjee';
            send_users_mail($email, $subject, $message);
            $message1 = $this->load->view('request_me_mail',$data,TRUE);
            send_users_mail(EMAIL_TO_ID, 'Request for Puja Service', $message1);
            $message_display = 'Thank you for contacting me. I will get back to you soon.';
            $message_display = array('type'=>'success','message'=>$message_display);
            $this->session->set_flashdata('message_display',$message_display);
            redirect("portal/contact_me");
        }
    }
}
