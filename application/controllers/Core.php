<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/base/BaseController.php'); 

class Core extends BaseController {
	function __construct(){
		parent::__construct();
		$this->load->model('M_core','core');
		$this->load->model('M_data','data');
	}

	public function index(){
		$this->load->helper('date');

		$like = array('TextDecoded' => '#',
						'TextDecoded' => ':',
					'SenderNumber' => '+62');
		$where = array('Processed' => 'false',
					'RecipientID' => 'USB0');

		$whitelist = $this->core->get('s_whitelist');

		foreach ($whitelist as $key => $wt) {
			$where_in[$wt->id] = $wt->phone;
		}

		$result = $this->core->explodeSMS($where, null, $like);

		if (!$result) {
			echo "tidak ada sms masuk";return 0;
		}

		foreach ($result as $row) {
			$id_inbox=$row->ID;
		    $tanggal=$row->ReceivingDateTime;
		    $text=$row->TextDecoded;
	
		    $check = $this->checkFormatSMS($text);
		    
		    if (!$check) {
		    	continue;
		    }
			
			$text=explode(':',$text);
		    
		    $wilayah = explode('#',$text[0]);
		    $id_prov = $wilayah[0];
		    $id_kab = $wilayah[1];
		    $id_kec = $wilayah[2];
		    $id_kel = $wilayah[3];
		    $rumah = $wilayah[4];
		    $hari = $wilayah[5];

		    $jawab = explode('#',$text[1]);

		    $tanya = $this->core->get('s_pertanyaan');
		    
		    foreach ($tanya as $key => $value) {
		    	$data = $this->core->get('s_jawaban',['huruf' => $jawab[$key], 'id_pertanyaan' => $value->id]);
		    	if (empty($data)) {
		    		$data[] = (object)['id' => null];
		    	};

		    	$data_insert[$value->id] = ['id_provinsi' => $id_prov, 'id_kabupaten' => $id_kab, 'id_kecamatan' => $id_kec, 'id_kelurahan' => $id_kel, 'id_pertanyaan' => $value->id, 'id_jawaban' => $data[0]->id, 'hari_kunjungan' =>$hari, 'no_rumah' => $rumah, 'created_at' => date('Y-m-d H:m:s')];
		    }
		    $this->core->insert('s_data',null,$data_insert);
		    $this->core->update('inbox',['ID' => $row->ID],['Processed' => "true"]);
		}
	}

	public function checkFormatSMS($isi){
		$text=explode(':',$isi);
		$wilayah = $text[0];
		$wilayah = explode('#', $wilayah);
		$jawaban = $text[1];
		$jawaban = explode('#', $jawaban);
		$jml_wil = 6;

		$pertanyaan = $this->data->get('s_pertanyaan');

		if (count($wilayah) == $jml_wil && count($jawaban) == count($pertanyaan)) {
			return true;
		}else{
			return false;
		}
	}
}