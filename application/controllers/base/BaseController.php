<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class BaseController extends CI_Controller {

	public function __construct() {
        parent::__construct();     

        if($this->session->userdata('status') != "login"){
            redirect('login');
            //session flash
        }
    }

    public function dashview($view, $data = array()){

    	$this->load->view('base/header_dashboard');
    	$this->load->view($view,$data);
    	$this->load->view('base/footer_dashboard');

    }

    public function adminview($view, $data = array()){
        $this->load->view('base/header');
        $this->load->view($view,$data);
        $this->load->view('base/footer');
    }

    public function is_admin(){
    	$user = $this->session->userdata();
    	if ($user != NULL) {
    		if ($user['role'] == 'superadmin') {
    			$res = true;
    		}else{
    			$res = false;
    		}
    	}else{
    		$res = false;
    	}
    	return $res;
    }

    public function userdata(){
    	$user = $this->session->userdata('user');
    	return $user;
    }

}
?>