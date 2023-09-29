<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profession extends Admin_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->load->model('admin/profession_model','this_model');
	}

	public function index()
	{	
		$data['page'] = 'admin/profession/list';
		$data['js'] = array('profession.js');
		$data['init'] = array('PROFESSION.delete()');
		$data['getProfession'] = $this->this_model->GetAllProfession();
		$this->load->view(USERS_LAYOUT,$data);
	}

	public function add()
	{	
		$data['page'] = 'admin/profession/add';
		$data['js'] = array('profession.js');
		$data['init'] = array('PROFESSION.professionAdd()');
		$data['FormAction'] = base_url().'admin/profession/add';
		if($this->input->post()){
			// print_r($this->input->post());die;
			$responce = $this->this_model->addProfession($this->input->post());
			if($responce){
				$this->utility->setFlashMessage('success','Profession Added Succesefully');
				redirect(base_url().'admin/profession');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
				redirect(base_url().'admin/profession');
			}
		}
		// $data['getCustomerData'] = $this->customer_model->GetAllCustomer();
		$this->load->view(USERS_LAYOUT,$data);
	}

	public function delete(){ 
		if($this->input->post()){
			$id = $this->utility->safe_b64decode($this->input->post('id'));
			$responce = $this->this_model->DeleteRecord($id);
			if($responce){
				$this->utility->setFlashMessage('success','Profession deleted Succesefully');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
			}
			echo '1';
		}
	}

	public function edit($id)
	{
		$d_id = $this->utility->safe_b64decode($id);
		$data['page'] = 'admin/profession/edit';
		$data['FormAction'] = base_url().'/admin/profession/edit/'.$id;
		$data['js'] = array('profession.js');
		$data['init'] = array('PROFESSION.edit()');
		$data['getData'] = $this->this_model->GetAllProfession($d_id);
		if($this->input->post()){
			$responce = $this->this_model->updateData($d_id,$this->input->post());
			if($responce){
				$this->utility->setFlashMessage('success','Profession Updated Succesefully');
				redirect(base_url().'admin/profession');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
				redirect(base_url().'admin/profession');
			}
		}
		$this->load->view(USERS_LAYOUT,$data);
	}
}
