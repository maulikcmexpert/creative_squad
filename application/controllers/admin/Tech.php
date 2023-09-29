<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tech extends Admin_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->load->model('admin/tech_model','this_model');
		$this->load->model('admin/profession_model','profession_model');
	}

	public function index()
	{	
		$data['page'] = 'admin/tech/list';
		$data['js'] = array('tech.js');
		$data['init'] = array('TECH.delete()');
		$data['getTech'] = $this->this_model->GetAllData();
		// dd($data['getTech']);
		$this->load->view(USERS_LAYOUT,$data);
	}

	public function add()
	{	
		$data['page'] = 'admin/tech/add';
		$data['js'] = array('tech.js');
		$data['init'] = array('TECH.add()');
		$data['FormAction'] = base_url().'admin/tech/add';
		$data['getProfession'] = $this->profession_model->GetAllProfession();
		if($this->input->post()){
			$responce = $this->this_model->add($this->input->post());
			if($responce){
				$this->utility->setFlashMessage('success','Technology Added Succesefully');
				redirect(base_url().'admin/tech');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
				redirect(base_url().'admin/tech');
			}
		}
		// $data['getCustomerData'] = $this->customer_model->GetAllCustomer();
		$this->load->view(USERS_LAYOUT,$data);
	}

	public function delete(){ 
		if($this->input->post()){
			// dd($this->input->post());
			$id = $this->utility->safe_b64decode($this->input->post('id'));
			$responce = $this->this_model->DeleteRecord($id);
			if($responce){
				$this->utility->setFlashMessage('success','Technology deleted Succesefully');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
			}
			echo $responce;
		}
	}

	public function edit($id)
	{
		$d_id = $this->utility->safe_b64decode($id);
		$data['page'] = 'admin/tech/edit';
		$data['FormAction'] = base_url().'/admin/tech/edit/'.$id;
		$data['js'] = array('tech.js');
		$data['init'] = array('TECH.edit()');
		$data['getProfession'] = $this->profession_model->GetAllProfession();
		$data['GetStack'] = $this->this_model->GetStack();
		$data['editData'] = $this->this_model->GetAllData($d_id);
		if($this->input->post()){
			// dd($this->input->post());
			$responce = $this->this_model->updateData($d_id,$this->input->post());
			if($responce){
				$this->utility->setFlashMessage('success','Technology Updated Succesefully');
				redirect(base_url().'admin/tech');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
				redirect(base_url().'admin/tech');
			}
		}
		$this->load->view(USERS_LAYOUT,$data);
	}

	public function getStackOfProfession(){
		if($this->input->post()){
			$profession_id =  $this->input->post('profession_id');
			$result =$this->this_model->getStackByProfessionId($profession_id);
			$html = '<option value="">Select Stack</option>';
			foreach ($result as $key => $value) {
				$html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
			}
			// dd($html);
			echo json_encode(['responceData'=>$html]);
		}
	}
}
