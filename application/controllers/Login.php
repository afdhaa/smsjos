<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}
    
	function index(){
		if($this->session->userdata('status') == "login"){
            redirect('dashboard');
        }
		$this->load->view('v_login');
	}

	function cek(){
		/* check username and password, save on session */

		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$data = array(
			'username' => $username,
			'password' => $password
			);

		$cek = $this->m_login->cek($data);

		if($cek > 0){
			$data = $this->m_login->data($data);
			$session = array(
				'id' => $data[0]->id,
				'nama' => $data[0]->username,
				'status' => 'login',
				'role' => $data[0]->role_name,
				'id_provinsi' => $data[0]->id_provinsi
				);
			$this->session->set_userdata($session);
			if ($session['role'] === "superadmin") {
				redirect(base_url().'administrator/index');
			}else{
				redirect(base_url().'dashboard/index');	
			}
			
		}else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Incorrect username or password..</div>');
			redirect(base_url().'');
        }
		
	}
    
	function logout(){
		$user_data = $this->session->all_userdata();
        
        foreach ($user_data as $key => $value) {
            if ($key != 'id' && $key != 'nama' && $key != 'status' && $key != 'role') {
                $this->session->unset_userdata($key);
            }
        }
	    $this->session->sess_destroy();
	    redirect('login');
	}
}