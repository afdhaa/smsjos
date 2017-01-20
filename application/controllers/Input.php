<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/base/BaseController.php'); 

class Input extends BaseController {

	function __construct(){
		parent::__construct();
		$this->load->model('M_admin','admin');
		$this->load->model('M_data','data');
		if(parent::is_admin() == false){
            redirect('login');
        }
	}

	public function index(){
		parent::adminview('input/index');
	}

	public function add(){
		$nomor = $_POST['nomor'];
		$usb = $_POST['usb'];
		$tanggal = $_POST['tanggal'];
		$sms = $_POST['sms'];

		$jml_sms = explode(", ", $sms);
		
		if (count($jml_sms) > 1) {
			foreach ($jml_sms as $key => $value) {
				$array_insert[$key] = ['UpdatedInDB' => $tanggal, 'ReceivingDateTime' => $tanggal, 'Text' => "00310023003300230031003A0041002300420023004300230061", 'SenderNumber' => $nomor, 'Coding' => "Default_No_Compression", 'UDH' => "", 'SMSCNumber' => "+62811078801", 'Class' => -1, 'TextDecoded' => $value, 'RecipientID' => $usb, 'Processed' => 'false'];
			}
			$insert = $this->data->insert('inbox',null,$array_insert);
			if ($insert) {
	    		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
                    Berhasil input manual.
                  </div>');
				redirect('input');
	    	}else{			
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                    <h4>	<i class="icon fa fa-check"></i> Peringatan!</h4>
	                    Terjadi kesalahan, silahkan check kembali input Anda.
	                  </div>');
				redirect('input');
			}
		}else{
			$array_insert = ['UpdatedInDB' => $tanggal, 'ReceivingDateTime' => $tanggal, 'Text' => "00310023003300230031003A0041002300420023004300230061", 'SenderNumber' => $nomor, 'Coding' => "Default_No_Compression", 'UDH' => "", 'SMSCNumber' => "+62811078801", 'Class' => -1, 'TextDecoded' => $sms, 'RecipientID' => $usb, 'Processed' => 'false'];
			$insert = $this->data->insert('inbox',$array_insert);
			if ($insert) {
	    		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
                    Berhasil input manual.
                  </div>');
				redirect('input');
	    	}else{			
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                    <h4>	<i class="icon fa fa-check"></i> Peringatan!</h4>
	                    Terjadi kesalahan, silahkan check kembali input Anda.
	                  </div>');
				redirect('input');
			}
		}
	}
}