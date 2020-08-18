<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function check_login($username, $password) {
        $this->db->select('*')->from('users')->where('username', $username)->where('password', $password);
        $query = $this->db->get();

        if ($query->result()) {
            return $query->result();
        }
    }   
    
}