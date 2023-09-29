<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends User_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('admin/profile_model','this_model');
  }
  
  public function index()
  {
    $data['page'] = 'admin/profile';
    $data['js'] = array('profile.js');
    $data['init'] = array('USERPROFILE.init()');
    $data['FormAction'] = base_url().'users/profile/update';
    $data['profile'] = $this->this_model->getProfile();
      $this->load->view(USERS_LAYOUT,$data);
  }

  public function update()
  {
    if($this->input->post()){
       $response = $this->this_model->UpdateProfile($this->input->post());
       $this->utility->setFlashMessage($response[0],$response[1]);
       redirect(base_url().'users/profile');
    }
  }

}
