<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->load->model('admin/profession_model','profession_model');
		// $this->load->model('admin/stack_model','stack_model');
		// $this->load->model('admin/tech_model','tech_model');
		// $this->load->model('admin/experience_model','experience_model');
	}

	public function index()
	{	
		$data['page'] = 'admin/dashboard';
		$query = $this->db->query("SELECT * FROM ".PROFESSION);
		$query1 = $this->db->query("SELECT * FROM ".STACK);
		$query2 = $this->db->query("SELECT * FROM ".TECH);
		$query3 = $this->db->query("SELECT * FROM ".PAYABLE);
		$data['totalProfession'] = $query->num_rows();
		$data['totalStack'] = $query1->num_rows();
		$data['totalTech'] = $query2->num_rows();
		$data['totalPayable'] = $query3->num_rows();
		$this->load->view(USERS_LAYOUT,$data);
	}
}
