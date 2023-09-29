<?php


class Front_model extends My_model
{

	public function getExpLevel()
	{
		$data['table'] = EXPERIENCE;
		$data['select'] = ['*'];
		return $this->selectRecords($data);
	}

	public function getProfession()
	{
		$data['table'] = PROFESSION;
		$data['select'] = ['*'];
		return $this->selectRecords($data);
	}

	public function getStackById($postData)
	{

		$data['table'] = STACK;
		$data['select'] = ['*'];
		$data['where'] = ['profession_id' => $this->utility->safe_b64decode($postData['profession_id'])];
		$return =  $this->selectRecords($data);
		return $return;
	}

	public function getTechnoByStackId($postData)
	{

		$data['table'] = TECH;
		$data['select'] = ['*'];
		$data['where'] = ['stack_id' => $this->utility->safe_b64decode($postData['stack_id'])];
		$return =  $this->selectRecords($data);
		return $return;
	}

	public function getexperienceWisePay($postData)
	{
		$data['table'] = PAYABLE;
		$data['select'] = ['type', 'min', 'max', 'frc_min', 'frc_max', 'frc_base_salary_min', 'frc_base_salary_max'];
		$data['where'] = [
			'tech_id' => $this->utility->safe_b64decode($postData['tech_id']),
			'experience_id' => $this->utility->safe_b64decode($postData['experience_id'])
		];
		$return =  $this->selectRecords($data);
		foreach ($return as $key => $value) {
			$value->min = ceil($value->min);
			$value->max = ceil($value->max);
			$value->frc_min = ceil($value->frc_min);
			$value->frc_max = ceil($value->frc_max);
			$value->frc_base_salary_min = ceil($value->frc_base_salary_min);
			$value->frc_base_salary_max = ceil($value->frc_base_salary_max);
		}
		// dd($return);
		return $return;
	}


	public function getexperienceWisePayToSendMail($postData)
	{



		$data['table'] = PAYABLE;
		$data['select'] = ['type', 'min', 'max', 'frc_min', 'frc_max', 'frc_base_salary_min', 'frc_base_salary_max'];
		$data['where'] = [
			'tech_id' => $this->utility->safe_b64decode($postData['tech_id']),
			'experience_id' => $this->utility->safe_b64decode($postData['experience_id']),
			'type' => $postData['costoftime']
		];
		$return =  $this->selectRecords($data);
		foreach ($return as $key => $value) {
			$value->min = ceil($value->min);
			$value->max = ceil($value->max);
			$value->frc_min = ceil($value->frc_min);
			$value->frc_max = ceil($value->frc_max);
			$value->frc_base_salary_min = ceil($value->frc_base_salary_min);
			$value->frc_base_salary_max = ceil($value->frc_base_salary_max);
		}
		// dd($return);
		return $return;
	}


	public function getStackNameById($postData)
	{
		$data['table'] = STACK;
		$data['select'] = ['*'];
		$data['where'] = ['id' => $this->utility->safe_b64decode($postData['stack_id'])];
		$return =  $this->selectRecords($data);
		// print_r($return);
		return $return[0]->name;
	}
}
