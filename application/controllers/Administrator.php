<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/base/BaseController.php'); 

class Administrator extends BaseController {
	
	var $abjad = array('a','b','c','d','e','f','g','h');

	function __construct(){
		parent::__construct();
		$this->load->model('M_admin','admin');
		$this->load->model('M_data','data');
		if(parent::is_admin() == false){
            redirect('login');
        }
	}
    
	function index(){
		parent::adminview('administrator/index');
	}

	function question(){
		$data['data'] = $this->admin->questionAndAnswer();
		parent::adminview('administrator/question',$data);
	}

	function questionsave(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pertanyaan','pertanyaan','required');

		if($this->form_validation->run()==true){
			$pertanyaan = $_POST['pertanyaan'];
	    
	    	$data = array(
	    			'pertanyaan' => $pertanyaan
	    		);
	    	//print_r($data);die();
	    	$insertPertanyaan = $this->admin->insertPertanyaan($data);
	    	if ($insertPertanyaan) {
	    		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
                    Berhasil membuat pertanyaan.
                  </div>');
				redirect('administrator/question');
	    	}
		}else{			
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Peringatan!</h4>
                    Terjadi kesalahan, silahkan check kembali input Anda.
                  </div>');
			redirect('administrator/question');
		}
	}

	public function addAnswer($id = null){
		$data['answer'] = $this->admin->getAnswer($id);
		$data['question'] = $this->admin->getQuestion($id)[0]?:null;
		parent::adminview('administrator/answer_add',$data);
	}

	public function editAnswer($id = null){
		$data['answer'] = $this->admin->getAnswer($id);
		$data['question'] = $this->admin->getQuestion($id)[0]?:null;
		parent::adminview('administrator/answer_edit',$data);
	}

	public function deleteQuestion($id = null){
		$deleted = $this->admin->delete('s_jawaban',['id_pertanyaan' => $id]);
		$deleted = $this->admin->delete('s_pertanyaan',['id' => $id]);	
		
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		
		$deleted['status'] = "success";
		if($deleted['status'] == "success"){
			echo json_encode($deleted);
		}

	}
	public function delalert(){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
            Berhasil menghapus pertanyaan
          </div>');
		redirect('administrator/question');
	}
	public function answersave(){
		$jawaban = isset($_POST['jawaban'])?$_POST['jawaban']:'';
		$pertanyaan = isset($_POST['pertanyaan'])?$_POST['pertanyaan']:'';
		$id_pertanyaan = isset($_POST['id_pertanyaan'])?$_POST['id_pertanyaan']:'';
		$id_jawaban = isset($_POST['id_pertanyaan'])?$_POST['id_jawaban']:'';
		$nextLet = $this->admin->view('s_jawaban',['id_pertanyaan'=>$id_pertanyaan],'huruf DESC','1')?:'A';
		if (is_array($nextLet)) $nextLet = ++$nextLet[0]->huruf;
		
		if (isset($_POST['add'])) {
			foreach($jawaban as $jwb) {
				$data[] =['jawaban' => $jwb, 'id_pertanyaan' => $id_pertanyaan,'huruf'=>$nextLet];
				++$nextLet;
			}
			
			$insert = $this->admin->insert('s_jawaban',null,$data);
			
			if ($insert) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
                    Berhasil mengupdate jawaban.
                  </div>');
				redirect('administrator/question');
			}

		}elseif (isset($_POST['edit'])) {
			$update = $this->admin->update('s_pertanyaan', $id_pertanyaan, ['pertanyaan' => $pertanyaan]);

			$nextLet = 'A';
			for ($i=0; $i < count($jawaban); $i++) { 
				$data[] = ['id'=>$id_jawaban[$i],'jawaban' => $jawaban[$i], 'id_pertanyaan' => $id_pertanyaan,'huruf'=>$nextLet];
				++$nextLet;
			}
			$update = $this->admin->update_batch('s_jawaban', $data, 'id');	
			if ($update['status'] == "success") {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
                    Berhasil mengupdate user.
                  </div>');
				redirect('administrator/question');
			}
		}
		
	}

	public function answerdel($id){
		$where = ['id' => $id];
		return $this->admin->delete('s_jawaban',$where);
	}

	public function users(){
		$this->load->helper('url');
		parent::adminview('administrator/user_list');
	}

	public function ajax_list()
    {
        $list = $this->admin->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $admin) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $admin->username;
            $row[] = $admin->role_name;
            $row[] = "<button class='btn btn-info btn-flat btn-xs'><span class='glyphicon glyphicon-edit'></span> Edit</button>  <button class='btn btn-danger btn-flat btn-xs' data-toggle='modal' data-target='#modal-delete-users' data-id='".$admin->id."' onClick='del(".$admin->id.")'><span class='glyphicon glyphicon-trash'></span> Hapus</button>";
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->admin->count_all(),
                        "recordsFiltered" => $this->admin->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function addUsers(){
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');

		if($this->form_validation->run()==true){
			$username = $_POST['username'];
	    	$password = $_POST['password'];
	    	$role = $_POST['role'];

	    	$data = array(
	    			'username' => $username,
	    			'password' => md5($password),
	    			'role' => $role
	    		);
	    	//print_r($data);die();
	    	$insertUser = $this->admin->insertUser($data);
	    	if ($insertUser) {
	    		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
                    Berhasil menambah user.
                  </div>');
				redirect('administrator/users');
	    	}
		}else{			
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Peringatan!</h4>
                    Terjadi kesalahan, silahkan check kembali input Anda.
                  </div>');
			redirect('administrator/users');
		}
    }

    public function deleteUsers(){
    	$id = $_POST['id'];
    	$delete = $this->admin->deleteUser($id);
		if ($delete) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Deleted!</h4>
                    Berhasil menghapus user.
                  </div>');
			redirect('administrator/users');
		}
    }

    public function genpdf(){
    	$pertanyaan = $this->data->get('s_pertanyaan', null, "id", null, "pertanyaan");

    	foreach ($pertanyaan as $key => $tanya) {
    		$data['pertanyaan'][$tanya->id] = ['id' => $tanya->id, 'pertanyaan' => $tanya->pertanyaan];

    		$jwb = $this->data->get('s_jawaban', ['id_pertanyaan' => $tanya->id], "id", null, "jawaban");
    		foreach ($jwb as $key => $jawab) {
    			$data['pertanyaan'][$tanya->id]['jwb'][$jawab->id] = ['id_jawaban' => $jawab->id, 'jawaban' => $jawab->jawaban, 'huruf' => $jawab->huruf];
    		}
    	}
    	//print_r($data);
    	$this->load->view('administrator/genpdf',$data);
    }

    public function whiteList($id = null){
    	if ($id != null) {
    		$whitelist = $this->data->get('s_whitelist',['id' => $id]);
    		echo json_encode($whitelist); return;
    	}

    	$data['data'] = $this->data->get('s_whitelist');
		parent::adminview('administrator/whitelist',$data);
    }

    public function whitelistadd(){
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('phone','phone','required');
		$this->form_validation->set_rules('nama','nama','required');

		if($this->form_validation->run()==true){
			$phone = $_POST['phone'];
			$nama = $_POST['nama'];
	    
	    	$data = array(
	    			'phone' => $phone,
	    			'nama' => $nama
	    		);
	    	//print_r($data);die();
	    	$insert = $this->admin->insert('s_whitelist',$data);
	    	if ($insert) {
	    		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
                    '.$phone.' Berhasil ditambahkan diwhitelist.
                  </div>');
				redirect('administrator/whitelist');
	    	}
		}else{			
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Peringatan!</h4>
                    Terjadi kesalahan, silahkan check kembali input Anda.
                  </div>');
			redirect('administrator/whitelist');
		}
    }

    public function ajax_whitelist()
    {
        $list = $this->admin->get_datatables('s_whitelist', ('id, phone'), ['id','phone'], ['id' => 'asc']);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $phone) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $phone->phone;
            $row[] = $phone->nama;
            $row[] = "<button class='btn btn-primary btn-flat btn-xs' data-toggle='modal' data-target='#modal-inbox' data-id='".$phone->id."' onClick='edit(".$phone->id.")'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='btn btn-danger btn-flat btn-xs' data-toggle='modal' data-target='#modal-delete' data-id='".$phone->id."' onClick='del(".$phone->id.")'><span class='glyphicon glyphicon-trash'></span> Hapus</button>";
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->admin->count_all('s_whitelist'),
                        "recordsFiltered" => $this->admin->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function whitelist_delete(){
    	$id = $_POST['id'];
    	$data =['id' => $id ];
    	$delete = $this->admin->delete('s_whitelist', $data);
		if ($delete) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
                    Berhasil menghapus whitelist.
                  </div>');
			redirect('administrator/whitelist');
		}
    }

        public function whitelist_update(){
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('phone','phone','required');

		if($this->form_validation->run()==true){
			$phone = $_POST['phone'];
			$id = $_POST['id'];
	    
	    	$data = array(
	    			'phone' => $phone
	    		);
	    	//print_r($data);die();
	    	$update = $this->admin->update('s_whitelist',$id, $data);
	    	if ($update) {
	    		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
                    '.$phone.' Berhasil ditambahkan diwhitelist.
                  </div>');
				redirect('administrator/whitelist');
	    	}
		}else{			
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Peringatan!</h4>
                    Terjadi kesalahan, silahkan check kembali input Anda.
                  </div>');
			redirect('administrator/whitelist');
		}
    }
}