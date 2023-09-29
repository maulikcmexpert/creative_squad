<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stack extends Admin_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->load->model('admin/stack_model','this_model');
		$this->load->model('admin/profession_model','profession_model');
	}

	public function index()
	{	
		$data['page'] = 'admin/stack/list';
		$data['js'] = array('stack.js');
		$data['init'] = array('STACK.delete()');
		$data['getStack'] = $this->this_model->GetAllData();
		// dd($data['getStack']);
		$this->load->view(USERS_LAYOUT,$data);
	}

	public function add()
	{	
		$data['page'] = 'admin/stack/add';
		$data['js'] = array('stack.js');
		$data['init'] = array('STACK.add()');
		$data['FormAction'] = base_url().'admin/stack/add';
		$data['getProfession'] = $this->profession_model->GetAllProfession();
		if($this->input->post()){
			$responce = $this->this_model->add($this->input->post());
			if($responce){
				$this->utility->setFlashMessage('success','Stack Added Succesefully');
				redirect(base_url().'admin/stack');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
				redirect(base_url().'admin/stack');
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
				$this->utility->setFlashMessage('success','Stack deleted Succesefully');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
			}
			echo '1';
		}
	}

	public function edit($id)
	{
		$d_id = $this->utility->safe_b64decode($id);
		$data['page'] = 'admin/stack/edit';
		$data['FormAction'] = base_url().'/admin/stack/edit/'.$id;
		$data['js'] = array('stack.js');
		$data['init'] = array('STACK.edit()');
		$data['getProfession'] = $this->profession_model->GetAllProfession();
		$data['editData'] = $this->this_model->GetAllData($d_id);
		// dd($data['getData']);
		if($this->input->post()){
			$responce = $this->this_model->updateData($d_id,$this->input->post());
			if($responce){
				$this->utility->setFlashMessage('success','Stack Updated Succesefully');
				redirect(base_url().'admin/stack');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
				redirect(base_url().'admin/stack');
			}
		}
		$this->load->view(USERS_LAYOUT,$data);
	}
}
