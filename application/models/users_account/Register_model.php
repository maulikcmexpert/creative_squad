<?php


Class Register_model extends My_model{

	public function RegisterData($postData){

		$insert = array(

				'first_name'=> $postData['first_name'],	
				'last_name'=> $postData['last_name'],
				'email'=> $postData['email'],
				'password'=> md5($postData['password']),
				'created_at' => DATE_TIME,	
				'updated_at' => DATE_TIME	
			);

		$data['table'] = USERS; // VISITOR
		$data['insert'] = $insert;
		return $this->insertRecord($data);
	}


	public function check_login($postData){
		$data['table'] = USERS;
		$data['select'] = ['*'];
		$data['where']['email'] = $postData['email'];
		$data['where']['password'] = md5($postData['password']);
		return $this->selectRecords($data);

	}

	// public function changePassword($postData){
		
	// 	$email = $this->session->userdata('email');
	// 	$data['table'] = USERS; // VISITOR
	// 	$data['select'] = ['*'];
	// 	$data['where'] = ['email' =>$email,'password' =>md5($postData['old_password'])];
	// 	$result=$this->selectRecords($data);
	// 	 $chek_record = $this->countRecords($data);
	// 	 unset($data);
	// 	 if($chek_record){
	// 			$data['table'] = USERS; // VISITOR
	// 			$data['update']['password'] = md5($postData['new_password']);
	// 			$data['where']['id'] =  $result[0]->id;
	// 			$response = $this->updateRecords($data);
	// 	 }else{

	// 		$response = false;	
	// 	 }
	// 	 return  $response;
      
 //    }	
		
	public function resetPass($PostData){
		$data['where'] = ['email'=>trim($PostData['forget_email'])];
        $data['select'] = ['*'];
        $data['table'] = USERS;
		 $chk_num = $this->countRecords($data);
		 // exit;
		
        if($chk_num > 0)
        {
           $user_details =  $this->selectRecords($data);
            $user_details = $user_details[0];
                  function generate_password($length, $complex) 
                    {
                        $min = "abcdefghijklmnopqrstuvwxyz";
                        $num = "0123456789";
                        $maj = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                        $symb = "!@#$%^&*()_-=+;:,.?";
                        $chars = $min;
                        if ($complex >= 2) { $chars .= $num; }
                        if ($complex >= 3) { $chars .= $maj; }
                        if ($complex >= 4) { $chars .= $symb; }
                        $password = substr( str_shuffle( $chars ), 0, $length );
                        return $password;
                    }
                    $password = generate_password(8,3);
                    $update = array(
                        "password" => md5($password),
                        "updated_at" => DATE_TIME
                    );
                    
                    $data['update'] = $update;
                    $data['table'] = USERS;
                    $data['where'] = ['id' => $user_details->id];
                    $response = $this->updateRecords($data);


						if($response)
						{
							
									  $message = "Congrats!!! Your new login credentials :<br/>
							  Your New password is : ".$password."<br/>
							  To change your password : You can change your password once you login.";
							
									$data['to'] = $PostData['forget_email'];
						
									$data['subject'] = 'Forgot Password';
								
									$data['message'] = $message;

									$asd = sendMail($data);

								if ($asd) {
									return true;
									  // $json_response['status'] = 'success';
									  // $json_response['message'] = 'Your login password has been sent to your registered mail address';
									  // $json_response['redirect'] = SITE_URL;
								}
							
						}
						 // return $json_response;
						   
           }else{
           	return false;
           }
	}

}

?>