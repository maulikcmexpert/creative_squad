<?php

function sendMail($data)
{

    $config = array(
        'protocol' => 'smtp',
        'smtp_host' => "ssl://smtp.googlemail.com",
        'smtp_port' => 465,
        'smtp_user' =>  "maulik.cmexpertise@gmail.com",
        'smtp_pass' => "eloauqgntsjvlhoa",
        'smtp_timeout' => 20,
        'encryption' => 'tls',
        'mailtype' => 'html',
        'priority' => 1,
        'charset'   => 'iso-8859-1',
        'starttls'  => true,
        'newline'   => "\r\n"
    );


    $CI = &get_instance();

    $CI->load->library('email', $config);
    $CI->email->initialize($config);
    $CI->email->set_newline("\r\n");
    $CI->email->from($data['from'], 'Inquiry');
    $CI->email->to('contact@creativesquad.fr');
    $CI->email->subject($data['subject']);
    $CI->email->message($data['message']);

    if ($CI->email->send()) {

        echo 'true';
    } else {

        echo 'Email sending failed: ' . $CI->email->print_debugger();
    }
}
