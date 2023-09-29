<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public $json_response = null;
    public $user_id = null;
    
    function __construct(){

        parent::__construct();
        require_once APPPATH . 'config/tablenames_constants.php';
        
        date_default_timezone_set('UTC');
        $this->json_response = array('status' => 'error', 'message' => 'something went wrong!');
        $this->title = "Silwana france";
    }

}

class Admin_Controller extends MY_Controller
{

    public $user_data = null;   
    public $user_type = null;
    public $user_id = null;

    function __construct()
    { 
        parent::__construct();

        require_once APPPATH . 'config/tablenames_constants.php';
        if($this->session->userdata('user_id') == '' AND $this->session->userdata('email') ==   '' ){
            redirect(base_url());       
        }
    }

}
    class User_Controller extends MY_Controller
    {

        function __construct()
        { 
            parent::__construct();
            require_once APPPATH . 'config/tablenames_constants.php';
        }

    }
    
?>
