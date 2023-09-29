<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgetpass extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('users_account/Register_model','this_model');
		if($this->session->userdata('user_id') != ''){
			redirect(base_url().'admin/dashboard');
		}
	}

	public function index()
	{
		$data['FormAction'] = base_url() . 'users_account/forgetpass/reset';
		$data['page'] = 'users_account/forgetpass';
		$data['js'] = array('login.js');
		$data['init'] = array('LOGIN.forget()');
		$this->load->view(USERS_LOGIN_LAYOUT,$data);
	}

	public function reset()
	{
		if($this->input->post()){
			$validation = $this->setRules();
				if($validation){
					$result =  $this->this_model->resetPass($this->input->post());
					  if($result){
					  	$this->utility->setFlashMessage('success','Your New Password send to your registered email address');
					  	redirect(base_url().'users_account/forgetpass');
					  }else{
					  $this->utility->setFlashMessage('danger','Please Enter Correct Email');
					  	redirect(base_url().'users_account/forgetpass');
					  }
				}
		}

	}

	function setRules(){
			$config = array(
				array(
						'field'=> 'forget_email',
						'lable'=> 'forget_email',
						'rules' => 'trim|required',
						'errors' => [ 
								'required' => "please enter valid email"
							]
					)  
			);

			$this->form_validation->set_rules($config);
			if($this->form_validation->run() == FALSE){
            // echo validation_errors(); exit();
            redirect(base_url().'forgetpassword');
         }
         else{
            return true;
        }
	}
}
