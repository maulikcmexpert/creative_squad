<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('users_account/Register_model','this_model');
		if($this->session->userdata('user_id') != ''){
			redirect(base_url().'users/dashboard');
		}
	}

	public function index()
	{
		// echo "<pre>";
		// print_r($_SERVER);die;
		$data['FormAction'] = base_url().'login/check_login';
		$data['page'] = 'users_account/login';
		$data['js'] = array('Login.js');
		$data['init'] = array('LOGIN.init()');
		$this->load->view(USERS_LOGIN_LAYOUT,$data);
	}

	public function check_login(){
		if($this->input->post()){
			$result = $this->this_model->check_login($this->input->post());
			if($result){
				$sessionData = array(
						'user_id'=>$result[0]->id,
						'email'=>$result[0]->email,
						'name' => $result[0]->first_name
					);
				$this->session->set_userdata($sessionData);
				redirect(base_url().'admin/dashboard');
			}else{
				$this->session->set_flashdata('danger','<div class="alert alert-danger" role="alert">Plese enter correct email and password</div>');
				redirect(base_url().'admin');
			}
		}

	}	
}
