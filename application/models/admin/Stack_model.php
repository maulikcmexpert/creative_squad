<?php

class Stack_model extends My_model
{

	public function add($postData){

		foreach ($postData['name'] as $key => $value) {			
			
			$data['insert']['profession_id'] = $postData['profession_id'];
			$data['insert']['name'] = $value;
			$data['insert']['dt_created'] = DATE_TIME;
			$data['insert']['dt_updated'] = DATE_TIME; 
			$data['table'] = STACK;
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
			$data['where']['s.id'] = $id; 
		}
		$data['table'] = STACK .' s';
		$data['join'] = [PROFESSION . ' p'=>['p.id=s.profession_id','LEFT']];
		$data['select'] = ['s.id','p.name as profession_name','s.name as stack_name','s.profession_id'];
		$data['order'] = 's.id desc';
		return $this->selectFromJoin($data);
	}


	public function updateData($id,$postData){
		$data['table'] = STACK;
		$data['where']['id'] = $id;
		$data['update'] = ['name'=>$postData['name'],'profession_id'=>$postData['profession_id']];
		return $this->updateRecords($data);
	}


	public function DeleteRecord($id){
		$data['table'] = STACK;
		$data['where']['id'] = $id;
		return $this->deleteRecords($data);
	}

}
?>