<?php

class Experience_model extends My_model
{



	public function add($postData){
		
		foreach ($postData['experience_id'] as $key => $value) {

			$data['insert']['experience_id'] = $value;
			$data['insert']['tech_id'] = $postData['tech_id'];
			$data['insert']['type'] = $postData['type'][$key];
			$data['insert']['min'] = $postData['min'][$key];
			$data['insert']['max'] = $postData['max'][$key];
			$data['insert']['frc_min'] = $postData['frc_min'][$key];
			$data['insert']['frc_max'] = $postData['frc_max'][$key];
			$data['insert']['frc_base_salary_min'] = $postData['frc_base_salary_min'][$key];
			$data['insert']['frc_base_salary_max'] = $postData['frc_base_salary_max'][$key];
			$data['insert']['dt_created'] = DATE_TIME;
			$data['insert']['dt_updated'] = DATE_TIME; 
			$data['table'] = PAYABLE;
			$res = $this->insertRecord($data);
		}
		return $res;	

	}
	
	public function getExperience(){
		$data['table'] = EXPERIENCE;
		$data['select'] = ['*'];
		return $this->selectRecords($data);
	}

	public function stackData($id)
	{
		$data['table'] = STACK;
		$data['where']['profession_id'] = $id;
		$data['select'] = ['*'];
		return $this->selectRecords($data);
	}

	public function techData($id)
	{
		$data['table'] = TECH;
		$data['where']['stack_id'] = $id;
		$data['select'] = ['*'];
		return $this->selectRecords($data);
	}

	public function GetAllData($id='',$postData=[]){
		if($id !=''){
			$data['where']['e.id'] = $id; 
		}
		if(isset($postData['profession_id']) && $postData['profession_id'] != ''){
			$data['where']['p.id'] = $postData['profession_id'];	
		}
		if(isset($postData['stack_id']) && $postData['stack_id'] != ''){
			$data['where']['s.id'] = $postData['stack_id'];	
		}
		if(isset($postData['tech_id']) && $postData['tech_id'] != ''){
			$data['where']['t.id'] = $postData['tech_id'];	
		}
		$data['table'] = PAYABLE.' e';
		$data['join'] = [
			EXPERIENCE.' ex'=>['e.experience_id = ex.id','LEFT'],
			TECH.' t'=>['t.id=e.tech_id','LEFT'],
			STACK . ' s'=>['t.stack_id=s.id','LEFT'],
			PROFESSION . ' p'=>['p.id=s.profession_id','LEFT'],
		];
		$data['select'] = ['e.id','t.id as tech_id','e.min','e.max','e.type','e.experience_id','e.frc_min','e.frc_max','e.frc_base_salary_min','e.frc_base_salary_max','t.name as tech_name','p.name as profession_name','s.name as stack_name','s.profession_id','s.id as stack_id','ex.name as experience_name'];
		$data['order'] = 'e.id desc';
		return $this->selectFromJoin($data);
	}


	public function updateData($id,$postData){


		foreach ($postData['experience_id'] as $key => $value) {
			$data['table'] = PAYABLE;
			$data['where']['id'] = $id;
			$data['update'] = [
				'experience_id'=>$value,
				'tech_id'=>$postData['tech_id'],
				'min'=>$postData['min'][$key],
				'max'=>$postData['max'][$key],
				'frc_min'=>$postData['frc_min'][$key],
				'frc_max'=>$postData['frc_max'][$key],
				'frc_base_salary_min'=>$postData['frc_base_salary_min'][$key],
				'frc_base_salary_max'=>$postData['frc_base_salary_max'][$key],
				'type'=>$postData['type'][$key],

			];
			$this->updateRecords($data);
		}
		return true; 
	}


	public function DeleteRecord($id){
		$data['table'] = PAYABLE;
		$data['where']['id'] = $id;
		return $this->deleteRecords($data);
	}

	public function getTechByStackId($stack_id){
		$data['table'] = TECH;
		$data['select'] = ['*'];
		$data['where'] = ['stack_id'=>$stack_id];
		return $this->selectRecords($data);
	}

	public function getProfessionIdByExperienceId($id){
		$data['where']['e.id'] = $id; 
		$data['table'] = PAYABLE.' e';
		$data['join'] = [
			TECH.' t'=>['t.id=e.tech_id','LEFT'],
			STACK . ' s'=>['t.stack_id=s.id','LEFT'],
			PROFESSION . ' p'=>['p.id=s.profession_id','LEFT'],
		];
		$data['select'] = ['e.id','t.id as tech_id','e.min','e.max','e.type','e.experience_id','t.name as tech_name','p.name as profession_name','s.name as stack_name','s.profession_id','s.id as stack_id'];
		$data['order'] = 'e.id desc';
		$return = $this->selectFromJoin($data);
		return $return;
	}

	public function GetStack($id){
	
		$return = $this->getProfessionIdByExperienceId($id);
		$data['where']['profession_id'] = $return[0]->profession_id; 
		$data['table'] = STACK;
		$data['select'] = ['*'];
		return $this->selectRecords($data);	
	}

	public function GetTech($id){
		$return = $this->getProfessionIdByExperienceId($id);
		$data['where']['stack_id'] = $return[0]->stack_id; 
		$data['table'] = TECH;
		$data['select'] = ['*'];
		return $this->selectRecords($data);	
	}



}
?>