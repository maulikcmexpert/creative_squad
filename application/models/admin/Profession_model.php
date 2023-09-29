<?php

class Profession_model extends My_model
{

	public function addProfession($postData){
		foreach ($postData['name'] as $key => $value) {			
			$data['insert']['name'] = $value;
			$data['insert']['dt_created'] = DATE_TIME;
			$data['insert']['dt_updated'] = DATE_TIME; 
			$data['table'] = PROFESSION;
			$res = $this->insertRecord($data);
		}
		return $res;	

	}
	
	public function GetCurrency()
	{
		$data['table'] = CURRENCY;
		$data['select'] = ['*'];
		return $this->selectRecords($data);
	}

	public function GetAllProfession($id=''){
		if($id !=''){
			$data['where']['id'] = $id; 
		}
		$data['table'] = PROFESSION;
		$data['select'] = ['*'];
		$data['order'] = 'id desc';
		return $this->selectRecords($data);
	}


	public function updateData($id,$postData){
		$data['table'] = PROFESSION;
		$data['where']['id'] = $id;
		$data['update']['name'] = $postData['name'];
		return $this->updateRecords($data);
	}


	public function DeleteRecord($id){
		$data['table'] = PROFESSION;
		$data['where']['id'] = $id;
		return $this->deleteRecords($data);
	}

}
?>