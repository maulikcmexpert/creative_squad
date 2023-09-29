<?php

class Customer_model extends My_model
{
	
	public function insertCustomer($postData)
	{

		$data['table'] = CUSTOMER;
		$data['insert']['user_id'] = $this->session->userdata('user_id');
		$data['insert']['salutaion'] = $postData['salutaion'];
		$data['insert']['first_name'] = $postData['first_name'];
		$data['insert']['last_name'] = $postData['last_name'];
		$data['insert']['company_name'] = $postData['company_name'];
		$data['insert']['customer_email'] = $postData['email'];
		$data['insert']['currency'] = $postData['currency'];
		$data['insert']['office_number'] = $postData['office_number'];
		$data['insert']['mobile_number'] = $postData['mobile_number'];
		$data['insert']['website'] = $postData['website'];
		$data['insert']['textarea'] = $postData['remark'];
		$data['insert']['created_at'] = DATE_TIME;
		$data['insert']['updated_at'] = DATE_TIME;
		$result = $this->insertRecord($data);
		unset($data);
			if($result){
				$data['table'] = BILLING_ADDRESS;
				$data['insert']['customer_id'] = $result;
				$data['insert']['address'] = $postData['address1'];
				$data['insert']['country'] = $postData['country'];
				$data['insert']['city'] = $postData['city'];
				$data['insert']['state'] = $postData['state'];
				$data['insert']['zip_code'] = $postData['zip_code'];
				$data['insert']['fax_no'] = $postData['fax'];
				$data['insert']['created_at'] = DATE_TIME;
				$data['insert']['updated_at'] = DATE_TIME;
				$this->insertRecord($data);
			}
		return $result;
	}

	public function GetCurrency()
	{
		$data['table'] = CURRENCY;
		$data['select'] = ['*'];
		return $this->selectRecords($data);
	}

	public function GetAllCustomer(){
		$brack  = explode('/', $_SERVER['REQUEST_URI']);
		if($brack[4] == 'dashboard'){
			$data['limit'] = 1;
			$data['order'] = 'c.id DESC';
		}
		$data['table'] = CUSTOMER .' as c';
		$data['select'] = ['ba.*','ba.id as ba_id','c.*'];
		$data['join'] = [BILLING_ADDRESS.' as ba' =>['ba.customer_id = c.id','LEFT']];
		$data['where']['c.user_id'] = $this->session->userdata('user_id');
		return $this->selectFromJoin($data);
	}

	public function getCustomerDetails($id){
		$data['table'] = CUSTOMER .' as c';
		$data['select'] = ['ba.*','ba.id as ba_id','c.*'];
		$data['join'] = [BILLING_ADDRESS.' as ba' =>['ba.customer_id = c.id','LEFT']];
		$data['where'] = ['c.user_id'=>$this->session->userdata('user_id'),
						  'c.id'=>$id
						];
		return $this->selectFromJoin($data);
	}

	public function updateCustomer($postData){


			$data['table'] = CUSTOMER;
			$data['update']['salutaion'] = $postData['salutaion'];
			$data['update']['first_name'] = $postData['first_name'];
			$data['update']['last_name'] = $postData['last_name'];
			$data['update']['company_name'] = $postData['company_name'];
			$data['update']['customer_email'] = $postData['email'];
			$data['update']['currency'] = $postData['currency'];
			$data['update']['office_number'] = $postData['office_number'];
			$data['update']['mobile_number'] = $postData['mobile_number'];
			$data['update']['website'] = $postData['website'];
			$data['update']['textarea'] = $postData['remark'];
			$data['update']['updated_at'] = DATE_TIME;
			$data['where'] = ['id'=>$postData['update_id'],
							  'user_id'=>$this->session->userdata('user_id')
							];
			$result = $this->updateRecords($data);
			unset($data);
				
					$data['table'] = BILLING_ADDRESS;
					$data['update']['address'] = $postData['address1'];
					$data['update']['country'] = $postData['country'];
					$data['update']['city'] = $postData['city'];
					$data['update']['state'] = $postData['state'];
					$data['update']['zip_code'] = $postData['zip_code'];
					$data['update']['fax_no'] = $postData['fax'];
					$data['update']['updated_at'] = DATE_TIME;
					$data['where']['customer_id'] =  $postData['update_id'];
				$result	= $this->updateRecords($data);

			return $result;

	}

	public function DeleteRecord($id){
		$data['table'] = CUSTOMER;
		$data['where']['id'] = $id;
		return $this->deleteRecords($data);
	}

	public function searchFromCustomer($postData){
		$this->db->select("c.id,c.first_name,c.customer_email,c.salutaion,c.mobile_number,c.company_name");
		$this->db->from(CUSTOMER .' as c');
		$this->db->join(BILLING_ADDRESS.' as ba',"c.id = ba.customer_id","Left");
		$this->db->where('c.user_id',$this->session->userdata('user_id'));
		$this->db->like('c.first_name', $postData['search']);
		$this->db->or_like('c.customer_email',$postData['search']);
		$this->db->or_like('c.mobile_number',$postData['search']);
		$this->db->or_like('c.company_name',$postData['search']);
		$this->db->or_like('c.salutaion',$postData['search']);
		$query = $this->db->get();
		return $query->result();

	}

}
?>