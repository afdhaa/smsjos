<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/base/BaseController.php'); 

class Dashboard extends BaseController {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_data','data');
		$this->load->model('m_admin', 'admin');
	}
    
	function index(){
		$user = $this->session->userdata();
		$id_provinsi=$user['id_provinsi'];

		if (isset($_GET['prov']) && !isset($_GET['kab']) && !isset($_GET['kec'])) {
			$data = $this->listKabupaten($_GET['prov']);
		}else if (isset($_GET['prov']) && isset($_GET['kab']) && !isset($_GET['kec'])) {
			$data = $this->listKecamatan($_GET['prov'], $_GET['kab']);
		}else if (isset($_GET['prov']) && isset($_GET['kab']) && isset($_GET['kec'])) {
			$data = $this->listKelurahan($_GET['prov'], $_GET['kab'], $_GET['kec']);
		}else{
			if ($id_provinsi != null && !empty($id_provinsi)) {
				$data = $this->listKabupaten($id_provinsi);
			}else{
				$data = $this->listProvinsi();
			}
		}
		//print_r($data);die();
		parent::dashview('dashboard/index-new',$data);
	}

	public function listProvinsi(){
		$tanya = $this->data->get('s_pertanyaan','','','','');
		$t = 1;
		$data = [];
		$data['status'] = "";
		$data['title'] = "Seluruh Provinsi";
		$data['total'] = ['ttl' => $this->data->get('s_jawaban',null,"concat('p', id_pertanyaan, huruf),jawaban",null,null,"concat('p', id_pertanyaan, huruf) AS kode,jawaban,(SELECT count(*) FROM s_data WHERE id_jawaban=s_jawaban.id) as jml"), 'jml_rumah' => $this->data->get('s_data',null,null,null,null,"count(DISTINCT CONCAT(no_rumah,id_provinsi)) as jml")]; // total jumlah jawaban

		foreach ($tanya as $key => $value) {
			$jwb = $this->data->get('s_jawaban',['id_pertanyaan'=>$value->id]);
			$jml = $this->data->get('s_data',['id_pertanyaan'=>$value->id]);
			
			$data['pertanyaan'][$value->id] = ['pertanyaan' => $value->pertanyaan,"countspan" => $this->data->count('s_jawaban',['id_pertanyaan' => $value->id])[0]]; //membuat header table
			
			foreach ($jwb as $kk => $vv) {
				$data['pertanyaan'][$value->id]['jawaban'][] = ['huruf' =>$vv->huruf, 'value' => $vv->jawaban, 'jml' => $this->data->count('s_data',['id_jawaban' => $vv->id,'id_pertanyaan' => $vv->id_pertanyaan])[0],'allcount' => $this->data->count('s_data',['id_pertanyaan' => $vv->id_pertanyaan])[0]];
			} // untuk line chart

			$kabkota = $this->data->get('s_provinsi');
			foreach ($kabkota as $key => $value) {
				$data['detail'][$value->id_provinsi] = ['id_kabkota'=>$value->id_provinsi,'kabkota'=>$value->provinsi,'data'=>$this->data->get('s_jawaban',null,"concat('p', id_pertanyaan, huruf),jawaban",null,null,"concat('p', id_pertanyaan, huruf) AS kode,jawaban,(SELECT count(*) FROM s_data WHERE id_jawaban=s_jawaban.id and id_provinsi = ".$value->id_provinsi.") as jml"), 'jml_rumah' => $this->data->get('s_data',['id_provinsi' => $value->id_provinsi],null,null,null,"count(DISTINCT no_rumah) as jml")];
			} // untuk table
		}
		//print_r($data);die();
		return $data;
	}

	public function listKabupaten($id_provinsi = null){
		$tanya = $this->data->get('s_pertanyaan',null,null,null,null);
		$dt_prov = $this->data->get('s_provinsi',['id_provinsi' => $id_provinsi]);
		$data['status'] = "provinsi";
		$data['title'] = "Provinsi ".$dt_prov[0]->provinsi;
		$data['total'] = ['ttl' => $this->data->get('s_jawaban',null,"concat('p', id_pertanyaan, huruf),jawaban",null,null,"concat('p', id_pertanyaan, huruf) AS kode,jawaban,(SELECT count(*) FROM s_data WHERE id_jawaban=s_jawaban.id and id_provinsi =".$id_provinsi.") as jml"), 'jml_rumah' => $this->data->get('s_data',['id_provinsi' => $id_provinsi],null,null,null,"count(DISTINCT no_rumah) as jml")]; // total jumlah jawaban
		
		foreach ($tanya as $key => $value) {
			$jwb = $this->data->get('s_jawaban',['id_pertanyaan'=>$value->id]);
			$jml = $this->data->get('s_data',['id_pertanyaan'=>$value->id, 'id_provinsi' => $id_provinsi]);

			$data['pertanyaan'][$value->id] = ['pertanyaan' => $value->pertanyaan,"countspan" => $this->data->count('s_jawaban',['id_pertanyaan' => $value->id])[0]]; //membuat header table

			foreach ($jwb as $kk => $vv) {
				$data['pertanyaan'][$value->id]['jawaban'][] = ['huruf' =>$vv->huruf, 'value' => $vv->jawaban, 'jml' => $this->data->count('s_data',['id_jawaban' => $vv->id,'id_pertanyaan' => $vv->id_pertanyaan, 'id_provinsi' => $id_provinsi])[0],'allcount' => $this->data->count('s_data',['id_pertanyaan' => $vv->id_pertanyaan, 'id_provinsi' => $id_provinsi])[0]];
			} // untuk line chart

			$kabkota = $this->data->get('s_kabupaten',['id_provinsi' => $id_provinsi]);
			foreach ($kabkota as $key => $value) {
				$data['detail'][$value->id_kabkota]=['id_provinsi' => $value->id_provinsi,'id_kabkota'=>$value->id_kabkota,'kabkota'=>$value->kabkota,'data'=>$this->data->get('s_jawaban',null,"concat('p', id_pertanyaan, huruf),jawaban",null,null,"concat('p', id_pertanyaan, huruf) AS kode,jawaban,(SELECT count(*) FROM s_data WHERE id_jawaban=s_jawaban.id and id_provinsi = ".$value->id_provinsi." and id_kabupaten = ".$value->id_kabkota.") as jml"),'jml_rumah' => $this->data->get('s_data',['id_provinsi' => $value->id_provinsi, 'id_kabupaten' => $value->id_kabkota],null,null,null,"count(DISTINCT no_rumah) as jml")];
			} // untuk table
		}
		return $data;
	}

	public function listKecamatan($id_provinsi, $id_kabkota){
		$tanya = $this->data->get('s_pertanyaan',null,null,null,null);
		$dt_kabkota = $this->data->get('s_kabupaten',['id_provinsi' => $id_provinsi,'id_kabkota' => $id_kabkota]);
		$data['status'] = "kabupaten";
		$data['title'] = $dt_kabkota[0]->kabkota;
		$data['total'] = ['ttl' => $this->data->get('s_jawaban',null,"concat('p', id_pertanyaan, huruf),jawaban",null,null,"concat('p', id_pertanyaan, huruf) AS kode,jawaban,(SELECT count(*) FROM s_data WHERE id_jawaban=s_jawaban.id and id_provinsi =".$id_provinsi." and id_kabupaten=".$id_kabkota.") as jml"), 'jml_rumah' => $this->data->get('s_data',['id_provinsi' => $id_provinsi, 'id_kabupaten' => $id_kabkota],null,null,null,"count(DISTINCT no_rumah) as jml")]; // total jumlah jawaban

		foreach ($tanya as $key => $value) {
			$jwb = $this->data->get('s_jawaban',['id_pertanyaan'=>$value->id]);
			$jml = $this->data->get('s_data',['id_pertanyaan'=>$value->id, 'id_provinsi' => $id_provinsi, 'id_kabupaten' => $id_kabkota]);

			$data['pertanyaan'][$value->id] = ['pertanyaan' => $value->pertanyaan,"countspan" => $this->data->count('s_jawaban',['id_pertanyaan' => $value->id])[0]]; //membuat header table

			foreach ($jwb as $kk => $vv) {
				$data['pertanyaan'][$value->id]['jawaban'][] = ['huruf' =>$vv->huruf, 'value' => $vv->jawaban, 'jml' => $this->data->count('s_data',['id_jawaban' => $vv->id,'id_pertanyaan' => $vv->id_pertanyaan, 'id_provinsi' => $id_provinsi, 'id_kabupaten' => $id_kabkota])[0],'allcount' => $this->data->count('s_data',['id_pertanyaan' => $vv->id_pertanyaan, 'id_provinsi' => $id_provinsi, 'id_kabupaten' => $id_kabkota])[0]];
			} // untuk line chart

			$kecamatan = $this->data->get('s_kecamatan',['id_provinsi' => $id_provinsi, 'id_kabkota' => $id_kabkota]);
			foreach ($kecamatan as $key => $value) {
				$data['detail'][$value->id_kec] = ['id_kecamatan' => $value->id_kec,'id_provinsi' => $value->id_provinsi,'id_kabkota'=>$value->id_kabkota,'kabkota'=>$value->kecamatan,'data'=>$this->data->get('s_jawaban',null,"concat('p', id_pertanyaan, huruf),jawaban",null,null,"concat('p', id_pertanyaan, huruf) AS kode,jawaban,(SELECT count(*) FROM s_data WHERE id_jawaban=s_jawaban.id and id_provinsi = ".$value->id_provinsi." and id_kabupaten = ".$value->id_kabkota." and id_kecamatan = ".$value->id_kec.") as jml"),'jml_rumah' => $this->data->get('s_jawaban'), 'jml_rumah' => $this->data->get('s_data',['id_provinsi' => $value->id_provinsi, 'id_kabupaten' => $value->id_kabkota, 'id_kecamatan' => $value->id_kec],null,null,null,"count(DISTINCT no_rumah) as jml")];
			} // untuk table
		}
		return $data;
	}

	public function listKelurahan($id_provinsi, $id_kabkota, $id_kecamatan){
		$tanya = $this->data->get('s_pertanyaan',null,null,null,null);
		$dt_kec = $this->data->get('s_kecamatan',['id_provinsi' => $id_provinsi,'id_kabkota' => $id_kabkota, 'id_kec' => $id_kecamatan]);
		$data['status'] = "kecamatan";
		$data['title'] = "Kec. ".$dt_kec[0]->kecamatan;
		$data['total'] = ['ttl' => $this->data->get('s_jawaban',null,"concat('p', id_pertanyaan, huruf),jawaban",null,null,"concat('p', id_pertanyaan, huruf) AS kode,jawaban,(SELECT count(*) FROM s_data WHERE id_jawaban=s_jawaban.id and id_provinsi =".$id_provinsi." and id_kabupaten=".$id_kabkota." and id_kecamatan=".$id_kecamatan.") as jml"), 'jml_rumah' => $this->data->get('s_data',['id_provinsi' => $id_provinsi, 'id_kabupaten' => $id_kabkota, 'id_kecamatan' => $id_kecamatan],null,null,null,"count(DISTINCT no_rumah) as jml")]; // total jumlah jawaban
		
		foreach ($tanya as $key => $value) {
			$jwb = $this->data->get('s_jawaban',['id_pertanyaan'=>$value->id]);
			$jml = $this->data->get('s_data',['id_pertanyaan'=>$value->id, 'id_provinsi' => $id_provinsi, 'id_kabupaten' => $id_kabkota, 'id_kecamatan' => $id_kecamatan]);

			$data['pertanyaan'][$value->id] = ['pertanyaan' => $value->pertanyaan,"countspan" => $this->data->count('s_jawaban',['id_pertanyaan' => $value->id])[0]]; //membuat header table
		
			foreach ($jwb as $kk => $vv) {
				$data['pertanyaan'][$value->id]['jawaban'][] = ['huruf' =>$vv->huruf, 'value' => $vv->jawaban, 'jml' => $this->data->count('s_data',['id_jawaban' => $vv->id,'id_pertanyaan' => $vv->id_pertanyaan, 'id_provinsi' => $id_provinsi, 'id_kabupaten' => $id_kabkota, 'id_kecamatan' => $id_kecamatan])[0],'allcount' => $this->data->count('s_data',['id_pertanyaan' => $vv->id_pertanyaan, 'id_provinsi' => $id_provinsi, 'id_kabupaten' => $id_kabkota, 'id_kecamatan' => $id_kecamatan])[0]];
			} // untuk line chart

			$kelurahan = $this->data->get('s_kelurahan',['id_provinsi' => $id_provinsi, 'id_kabkota' => $id_kabkota, 'id_kecamatan' => $id_kecamatan]);
			foreach ($kelurahan as $key => $value) {
				$data['detail'][$value->id_kel] = ['id_kelurahan'=> $value->id_kel, 'id_kecamatan' => $value->id_kecamatan,'id_provinsi' => $value->id_provinsi,'id_kabkota'=>$value->id_kabkota,'kabkota'=>$value->kelurahan,'data'=>$this->data->get('s_jawaban',null,"concat('p', id_pertanyaan, huruf),jawaban",null,null,"concat('p', id_pertanyaan, huruf) AS kode,jawaban,(SELECT count(*) FROM s_data WHERE id_jawaban=s_jawaban.id and id_provinsi = ".$value->id_provinsi." and id_kabupaten = ".$value->id_kabkota." and id_kecamatan = ".$value->id_kecamatan." and id_kelurahan = ".$value->id_kel.") as jml"),'jml_rumah' => $this->data->get('s_jawaban'), 'jml_rumah' => $this->data->get('s_data',['id_provinsi' => $value->id_provinsi, 'id_kabupaten' => $value->id_kabkota, 'id_kabupaten' => $value->id_kecamatan, 'id_kelurahan' => $value->id_kel],null,null,null,"count(DISTINCT no_rumah) as jml")];
			} // untuk table
		}
		return $data;
	}

	public function line(){

		$data['provinsi'] = $this->data->get('s_provinsi');

		$tanya = $this->data->get('s_pertanyaan');

		foreach ($tanya as $key => $value) {
			$data['tanya'][$value->id] = ['pertanyaan' => $value->pertanyaan];
			
			$jwb = $this->data->get('s_jawaban',['id_pertanyaan' => $value->id]);
			if (isset($_GET['prov'])) {
				$id_provinsi = $_GET['prov'];
				$data['status'] = "provinsi";

				$title = $this->data->get('s_provinsi',['id_provinsi' => $id_provinsi],null,null,null,'provinsi');
				$data['title'] = $title[0]->provinsi;

				foreach ($jwb as $key => $jawab) {
				$data['tanya'][$value->id]['jawab'][$jawab->id]['jancuk'] = ['jawaban' => $jawab->jawaban, 'jml' => $this->data->get('s_kabupaten', ['id_provinsi' => $id_provinsi ] , "id_kabkota",null,"kabkota", "(select count(*) from s_data WHERE s_data.id_kabupaten = s_kabupaten.id_kabkota and s_data.id_provinsi = s_kabupaten.id_provinsi and id_provinsi=".$id_provinsi." and s_data.id_jawaban = ".$jawab->id.") as jml")];
				}
				$data['kecamatan'] = $this->data->get('s_kabupaten',['id_provinsi' => $_GET['prov']], "id_kabkota", null, "kabkota","kabkota");

			}else{
				$data['title'] = "Indonesia";
				$data['status'] = null;
				foreach ($jwb as $key => $jawab) {
				$data['tanya'][$value->id]['jawab'][$jawab->id]['jancuk'] = ['jawaban' => $jawab->jawaban, 'jml' => $this->data->get('s_provinsi', null , "id_provinsi",null,"provinsi", "(select count(*) from s_data WHERE s_data.id_provinsi = s_provinsi.id_provinsi and s_data.id_jawaban = ".$jawab->id.") as jml")];
				}	
				$data['kecamatan'] = $this->data->get('s_provinsi', null, "id_provinsi", null, "provinsi","provinsi");
			}
			
		}

		//print_r($data);die();
		parent::dashview('dashboard/line-new',$data);
	}


}