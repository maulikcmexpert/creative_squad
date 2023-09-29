<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experience extends Admin_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->load->model('admin/profession_model','profession_model');
		$this->load->model('admin/stack_model','stack_model');
		$this->load->model('admin/tech_model','tech_model');
		$this->load->model('admin/experience_model','this_model');
	}

	public function index() {	
		$data['page'] = 'admin/experience/list';
		$data['js'] = array('experience.js');
		$data['init'] = array('EXPERIENCE.delete()');
		$data['getProfession'] = $this->profession_model->GetAllProfession();
		$data['getPayable'] = $this->this_model->GetAllData();
		$data['profession_id'] = '';
		$data['stack_id'] = '';
		$data['tech_id'] = '';
		if($this->input->post()){
			// dd($this->input->post());
			$data['getPayable'] = $this->this_model->GetAllData('',$this->input->post());
			$data['stack'] = $this->this_model->stackData($this->input->post('profession_id'));
			$data['tech'] = $this->this_model->techData($this->input->post('stack_id'));
			$data['profession_id'] = $this->input->post('profession_id');
			$data['stack_id'] = $this->input->post('stack_id');
			$data['tech_id'] = $this->input->post('tech_id');
			// echo $this->db->last_query();die;
		}
		// dd($data['getPayable']);
		$this->load->view(USERS_LAYOUT,$data);
	}

	public function add()
	{	
		$data['page'] = 'admin/experience/add';
		$data['js'] = array('experience.js');
		$data['init'] = array('EXPERIENCE.add()');
		$data['FormAction'] = base_url().'admin/experience/add';
		$data['getProfession'] = $this->profession_model->GetAllProfession();
		$data['getExperience'] = $this->this_model->getExperience();
		if($this->input->post()){
			// dd($this->input->post());
			$responce = $this->this_model->add($this->input->post());
			if($responce){
				$this->utility->setFlashMessage('success','Technology Added Succesefully');
				redirect(base_url().'admin/experience');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
				redirect(base_url().'admin/experience');
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
				$this->utility->setFlashMessage('success','Technology deleted Succesefully');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
			}
			echo '1';
		}
	}

	public function edit($id)
	{
		$d_id = $this->utility->safe_b64decode($id);
		$data['page'] = 'admin/experience/edit';
		$data['FormAction'] = base_url().'/admin/experience/edit/'.$id;
		$data['js'] = array('experience.js');
		$data['init'] = array('EXPERIENCE.edit()');
		$data['getExperience'] = $this->this_model->getExperience();
		$data['getProfession'] = $this->profession_model->GetAllProfession();

		$data['GetStack'] = $this->this_model->GetStack($d_id);
		// dd($data['GetStack']);
		$data['GetTech'] = $this->this_model->GetTech($d_id);
		// dd($data['GetTech']);
		$data['editData'] = $this->this_model->GetAllData($d_id);

		if($this->input->post()){
			// dd($this->input->post());
			$responce = $this->this_model->updateData($d_id,$this->input->post());
			if($responce){
				$this->utility->setFlashMessage('success','Technology Updated Succesefully');
				redirect(base_url().'admin/experience');
			}else{
				$this->utility->setFlashMessage('danger',DEFAULT_MESSAGE);
				redirect(base_url().'admin/experience');
			}
		}
		$this->load->view(USERS_LAYOUT,$data);
	}

	public function getTechOfStack(){
		if($this->input->post()){
			$stack_id =  $this->input->post('stack_id');
			$result =$this->this_model->getTechByStackId($stack_id);
			$html = '<option value="">Select Stack</option>';
			foreach ($result as $key => $value) {
				$html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
			}
			// dd($html);
			echo json_encode(['responceData'=>$html]);
		}
	}
}
