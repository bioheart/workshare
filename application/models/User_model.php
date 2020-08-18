<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        date_default_timezone_set('Asia/Bangkok'); 
        $this->date = date('Y-m-d H:i:s');
    }

    function check_login($username, $password) {
        $this->db->select('*')->from('users')->where('username', $username)->where('password', $password);
        $query = $this->db->get();

        if ($query->result()) {
            return $query->result();
        }
    }   
    function update_password($new_password, $old_password){
        $this->db->select('user_id')
        ->from('users')
        ->where('user_id',$this->session->userdata('user_id'))
        ->where('password',$old_password);
        $qs = $this->db->get();
        if($qs->result()){
            $data = array(
                'date_modified' => $this->date,
                'password' => $new_password,
            );
            if($this->db->where('user_id',$this->session->userdata('user_id'))->update('users',$data)){
                return 1;
            }
            else{
                return 2;
            }
        }
        else{
            return 0;
        }
    }
}