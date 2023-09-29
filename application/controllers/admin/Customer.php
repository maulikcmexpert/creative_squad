<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Customer_model','this_model');
	}
	
	public function index()
	{
		$data['page'] = 'admin/customer/list';
		$data['js'] = array('customer.js');
		$data['init'] = array('CUSTOMER.delete()');
		// $data['getCustomerData'] = $this->this_model->GetAllCustomer();
		$this->load->view(USERS_LAYOUT,$data);
	}


	public function add()
	{
		$data['page'] = 'admin/customer/add';
		$data['FormAction'] = base_url().'/admin/customer/add';
		$data['js'] = array('customer.js');
		$data['init'] = array('CUSTOMER.init()');
		$data['Currency'] = $this->this_model->GetCurrency();
		$data['getCountry'] = GetDialcodelist();
			if($this->input->post()){
					$responce = $this->this_model->insertCustomer($this->input->post());
						if($responce){
							$this->utility->setFlashMessage('success','Customer Added Succesefully');
							redirect(base_url().'admin/customer');
						}
			}
		$this->load->view(USERS_LAYOUT,$data);
	}

	// public function Rules(){
	// 	$config = array(
	// 					array(
	// 						'field' =>'email',
	// 						'label' =>'email',
	// 						'rules' => 'trim|required|is_unique[customer.customer_email]',
	// 						'errors' => [ 
	// 								'required' => "please enter valid email",
	// 								'is_unique' => "This email address is already taken",
	// 							]
	// 					),
	// 				);
	// 				$this->form_validation->set_rules($config);
	// 				if($this->form_validation->run() == false){
	// 					// echo validation_errors(); exit();
	// 				} else{
	// 					return true	;
	// 				}
	// 			}

	public function edit($id)
	{
		$id = $this->utility->safe_b64decode($id);
		$data['page'] = 'admin/customer/edit';
		$data['FormAction'] = base_url().'/admin/customer/update';
		$data['js'] = array('customer.js');
		$data['init'] = array('CUSTOMER.init()');
		$data['Currency'] = $this->this_model->GetCurrency();
		$data['getCountry'] = GetDialcodelist();
		$data['getcustomer'] = $this->this_model->getCustomerDetails($id);
		$this->load->view(USERS_LAYOUT,$data);
	}


	public function update()
	{
		if($this->input->post()){
			$responce = $this->this_model->updateCustomer($this->input->post());
				if($responce){
					$this->utility->setFlashMessage('success','Record Updated Successfully');
					redirect(base_url().'admin/customer');
				}else{
					$this->utility->setFlashMessage('danger','Something Went Wrong  ');
					redirect(base_url().'admin/customer');
				}
		}
	}

	public function delete(){ 
		if($this->input->post()){
			$id = $this->utility->safe_b64decode($this->input->post('id'));
			echo $result = $this->this_model->DeleteRecord($id);
		}
	}

	public function search(){
		if($this->input->post()){
			$result = $this->this_model->searchFromCustomer($this->input->post());
			// print_r($result);
			$html = '';
			foreach ($result as $key => $value) {
			$html .= '<tr>
                        <td class="p-0 text-center">
                        <!--   <div class="custom-checkbox custom-control">
                            <input type="checkbox" name="chk[]" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1"> 
                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                          </div> -->
                             <div class="form-check">
                              <input class="form-check-input cus_id" name="cus_id" type="checkbox" value="'.$value->id.'" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                              </label>
                            </div>
                        </td>
                        <td>' .$value->salutaion .'. '.$value->first_name.' </td>
                        <td>' .$value->customer_email. '</td>
                        <td>' .$value->mobile_number. '</td>
                        <td> '.$value->company_name.' </td><td><a  href="'.base_url().'admin/customer/edit/'.$this->utility->safe_b64encode($value->id).'" class="btn btn-danger btn-action"  data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"  style="color: white"></i></a> 
                        <button class="btn btn-danger btn-action delete" id="delete_id" data-toggle="tooltip"   data-original-title="Delete" value="'.$this->utility->safe_b64encode($value->id).'" ><i class="fas fa-trash" style="color: white"></i></button></td>
                      </tr>';	
			}
			echo $html;
		}
	}
}
