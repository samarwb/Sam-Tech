<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

function send_users_mail($to, $subject, $message) {
    $to = !empty($to) ? $to : EMAIL_TO_ID;
    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => EMAIL_FORM_ID,
        'smtp_pass' => 'Aces@101',
        'mailtype' => 'html',
        'charset'  => 'utf-8',
        'priority' => '1'
    );

    $CI =& get_instance();
    $CI->load->library('email');
    $CI->email->set_mailtype("html");
    $CI->email->set_newline("\r\n");
    $CI->email->from(EMAIL_FORM_ID,'Vendor Connect');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    if ($CI->email->send()) {
        return TRUE;
    } else {
        return FALSE;
    }
}
