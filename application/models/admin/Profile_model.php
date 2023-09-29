<?php


class Profile_model extends My_model
{
	
	function getProfile()
	{
		$data['table'] = USERS;
		$data['select'] = ['*'];
		$data['where']['id'] = $this->session->userdata('user_id');
		return $this->selectRecords($data); 	
	}

	public function UpdateProfile($postData){
		$data['table'] = USERS;
		$data['select'] = ['*'];
		$data['where']['email'] = $this->session->userdata('email');
		$data['where']['id'] = $this->session->userdata('user_id');
		$re = $this->selectRecords($data);
	
		if($re[0]->password == md5($postData['password'])){
			if($postData['new_password'] == $postData['confirm_password']){
				$data['update']['password'] = md5($postData['new_password']);
				$data['updated_at'] = DATE_TIME;
				$result = $this->updateRecords($data);
					if($result){
						return ['success','Your password has been changed'];
					}else{
						return ['danger','Somthing went wrong'];
					}
			}else{
				return ['danger','Password Does not match'];	
			}
		}else{
			return ['danger','Please enter your correct previous password'];
		}
	}	
}

?>