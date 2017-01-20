<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct(){
	    parent::__construct();
	}

	public function checkLogin($data){
		$query = $this->db->select('*')
					->from('users as u')
					->where('username',$data['username'])
					->where('password',$data['password'])
					->join('user_role as r', 'r.id = u.role')
					->get();

		return $query->result();
	}

	function cek($data){		
		return $this->db->get_where('users',$data)->num_rows();
	}
	
	function data($data){
		$query = $this->db->select('*')
			->from('users as u')
			->where($data)
			->join('user_role as role','role.id = u.role')
			->get();
		return $query->result();
	}

}
?>