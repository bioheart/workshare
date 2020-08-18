<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->active = 'account';
		$this->load->library('session');
		$this->load->model('User_model');
	}
	  
	public function index(){
        // $this->load->view('chage_password');
        echo "show profile";
	}
	public function change_password(){
		if(!isset($_SESSION['user_id'])){
			redirect(base_url('login'));
		}
		else{
			$this->load->view('change_password');
        }
    }
    public function update_password(){
        $new_pass = $this->input->post('new_password');
        $old_pass = $this->input->post('old_password');

        $res = $this->User_model->update_password($new_pass,$old_pass);
        echo $res;
    }

}
