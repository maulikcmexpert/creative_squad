<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends User_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('front_model', 'this_model');
	}

	public function index()
	{
		$data['js'] = array('front.js');
		$data['getProfession'] = $this->this_model->getProfession();
		$data['getLevel'] = $this->this_model->getExpLevel();
		$this->load->view('front', $data);
	}

	public function getStackOfprofession()
	{
		if ($this->input->post()) {
			$res = $this->this_model->getStackById($this->input->post());
			$stack = '';
			$status = 0;
			if (!empty($res)) {
				$status = 1;
				foreach ($res as $key => $value) {
					$stack .=  '<div class="techno-check stack" data-name=' . $value->name . ' data-stack_id=' . $this->utility->safe_b64encode($value->id) . '>
					                <input class="techno_checkbox" type="radio" value="two_value" name="radioname2" id="radio-two"/>
					                 	<div class="proffesion-sub-category">
					                 		<h4>' . $value->name . '</h4>
					                  	</div>
					           </div>';
				}
			}

			echo json_encode(['status' => $status, 'stack' => $stack]);
		}
	}

	public function getTechOfStack()
	{
		if ($this->input->post()) {
			$stack_name = $this->this_model->getStackNameById($this->input->post());
			$res = $this->this_model->getTechnoByStackId($this->input->post());
			$same_name = '0';
			$checked = '';
			if (count($res) == 1) {
				if ($stack_name == $res[0]->name) {
					$same_name = '1';
					$checked = 'checked';
				}
			}
			$tech = '';
			$status = 0;
			if (!empty($res)) {
				$status = 1;
				foreach ($res as $key => $value) {
					$tech .= '<div class="techno-check tech" data-tech_id=' . $this->utility->safe_b64encode($value->id) . '>
                                <input class="techno_checkbox" type="radio" value="three_value" name="radioname3" id="radio-three"/ ' . $checked . '>
                            <div class="proffesion-sub-category">
                                    <h4>' . $value->name . '</h4>
                            </div>
                        </div>';
				}
			}
			echo json_encode(['status' => $status, 'techNstack' => $same_name, 'tech' => $tech]);
		}
	}


	public function getexperienceWisePay()
	{
		if ($this->input->post()) {
			$res = $this->this_model->getexperienceWisePay($this->input->post());
			$status = 0;
			if (!empty($res)) {
				$status = 1;
			}
			echo json_encode(['status' => $status, 'result' => $res]);
		}
	}

	public function sendemail()
	{
		// echo "<pre>";
		$email = $this->input->post('email');
		$costoftime = $this->input->post('costoftime');
		$profession = $this->input->post('profession');
		$stack = $this->input->post('stack');
		$tech = $this->input->post('tech');
		$experience = $this->input->post('experience');

		$res = $this->this_model->getexperienceWisePayToSendMail($this->input->post());


		$message = "Email : " . $email . "<br/>
		Estimation Cost :<br/>

		Time Of Cost : " . $costoftime . "<br/>
		Profession : " . $profession . "<br/>
		Stack : " . $stack . "<br/>
		Tech : " . $tech . "<br/>
		Experience : " . $experience . "<br/>


		To change your password : You can change your password once you login.";

		$data['to'] = $email;

		$data['subject'] = 'Custom Development Cost Estimation Based on Your Selections';

		$data['message'] = $message;

		$asd = sendMail($data);
		if ($asd) {
			return true;
		} else {
			return false;
		}
		exit;
	}


	public function contactDetailSend()
	{

		echo "<pre>";
		print_r($this->input->post());
		exit;
		$email = $this->input->post('email');
		$costoftime = $this->input->post('costoftime');
		$profession = $this->input->post('profession');
		$stack = $this->input->post('stack');
		$tech = $this->input->post('tech');
		$experience = $this->input->post('experience');

		$res = $this->this_model->getexperienceWisePayToSendMail($this->input->post());


		$message = "Email : " . $email . "<br/>
		Estimation Cost :<br/>

		Time Of Cost : " . $costoftime . "<br/>
		Profession : " . $profession . "<br/>
		Stack : " . $stack . "<br/>
		Tech : " . $tech . "<br/>
		Experience : " . $experience . "<br/>


		To change your password : You can change your password once you login.";

		$data['to'] = $email;

		$data['subject'] = 'Custom Development Cost Estimation Based on Your Selections';

		$data['message'] = $message;

		$asd = sendMail($data);
		if ($asd) {
			return true;
		} else {
			return false;
		}
		exit;
	}
}
