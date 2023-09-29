<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function __construct(){
		parent::__construct();
		redirect(base_url().'admin');
		$this->load->model('users_account/Register_model','this_model');

		 if($this->session->userdata('user_id') != ''){
			redirect(base_url().'admin/dashboard');
		}
		 
	}
	public function index()
	{

		$data['FormAction'] = base_url() . 'users_account/register';
		$data['page'] = 'users_account/register';
		$data['js'] = array('Login.js');
		$data['init'] = array('LOGIN.register()');
			if($this->input->post()){
				$validation = $this->setRules();
				if($validation){
						$result = $this->this_model->RegisterData($this->input->post());
						if($result){
							$this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Registration completed successfully. Please Login</div>');
								redirect(base_url());

						}else{
							$this->session->set_flashdata('danger','<div class="alert alert-danger" role="alert">Plese enter correct email and password</div>');
							redirect(base_url().'users_account/admin');
						}
				}
			}	
				$this->load->view(USERS_LOGIN_LAYOUT,$data);
	}


	public function setRules(){
		$config = array(

				array(
					'field'=> 'first_name',
					'lable'=> 'first_name',
					'rules' => 'trim|required',
					'errors' => [ 
							'required' => "please enter first name"
						]
				),
				array(
					'field'=> 'last_name',
					'lable'=> 'last_name',
					'rules' => 'trim|required',
					'errors' => [ 
							'required' => "please enter last name"
						]
				),
				array(
					'field'=> 'email',
					'lable'=> 'email',
					'rules' => 'trim|required|is_unique[users.email]',
					'errors' => [ 
							'required' => "please enter valid email"
						]
				),
				array(
					'field' => 'password', 
                  	'label' => 'password', 
                  	'rules' => 'trim|required',
                   	"errors" => [
                    	    'required' => "please enter your password"
                    ]
                ),
                array(
					'field' => 'confirm_password', 
                  	'label' => 'confirm_password', 
                  	'rules' => 'trim|required|matches[password]',
                   	"errors" => [
                    	    'required' => "please enter your password"
                    ]
                )
            	
		);


        $this->form_validation->set_rules($config);
         if($this->form_validation->run() == FALSE){
            // echo validation_errors(); exit();
         }
         else{
            return true;
        }
	}
}


?>