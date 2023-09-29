<?php

class Tech_model extends My_model
{

	public function add($postData){
	
		foreach ($postData['name'] as $key => $value) {			
			
			$data['insert']['stack_id'] = $postData['stack_id'];
			$data['insert']['name'] = $value;
			$data['insert']['dt_created'] = DATE_TIME;
			$data['insert']['dt_updated'] = DATE_TIME; 
			$data['table'] = TECH;
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

	public function GetAllData($id=''){
		if($id !=''){
			$data['where']['t.id'] = $id; 
		}
		$data['table'] = TECH .' t';
		$data['join'] = [
			STACK . ' s'=>['t.stack_id=s.id','LEFT'],
			PROFESSION . ' p'=>['p.id=s.profession_id','LEFT'],
		];
		$data['select'] = ['t.id','t.stack_id','t.name as tech_name','p.name as profession_name','s.name as stack_name','s.profession_id '];
		$data['order'] = 't.id desc';
		return $this->selectFromJoin($data);
	}


	public function updateData($id,$postData){
		$data['table'] = TECH;
		$data['where']['id'] = $id;
		$data['update'] = [
			'stack_id'=>$postData['stack_id'],
			'name'=>$postData['name'],
		];
		$this->updateRecords($data);
		return true; 
	}


	public function DeleteRecord($id){
		$data['table'] = TECH;
		$data['where']['id'] = $id;
		return $this->deleteRecords($data);
	}

	public function getStackByProfessionId($profession_id){
		$data['table'] = STACK;
		$data['select'] = ['*'];
		$data['where'] = ['profession_id'=>$profession_id];
		return $this->selectRecords($data);
	}

	public function GetStack(){
		$data['table'] = STACK;
		$data['select'] = ['*'];
		return $this->selectRecords($data);	
	}

}
?>