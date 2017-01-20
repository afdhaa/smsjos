<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/base/BaseController.php'); 

class Inbox extends BaseController {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_inbox','inbox');
        $this->load->model('M_data','data');
		if(parent::is_admin() == false){
            redirect('login');
        }
	}
    
	public function index(){
		$this->load->helper('url');
		parent::adminview('inbox/index');
	}

	public function ajax_list()
    {
        $list = $this->inbox->get_datatables();
        //print_r($list);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $inbox) {
            $no++;
            $row = array();
            $row[] = $inbox->ID;
            $row[] = $inbox->SenderNumber;
            $row[] = substr($inbox->TextDecoded,0,60);
            $row[] = $inbox->ReceivingDateTime;
            $row[] = $inbox->RecipientID;
            $row[] = $inbox->Processed;
            $row[] = "<button class='btn btn-primary btn-flat btn-xs' data-toggle='modal' data-target='#modal-inbox' data-id='".$inbox->ID."' onClick='view(".$inbox->ID.")'>View</button>";
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->inbox->count_all(),
                        "recordsFiltered" => $this->inbox->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function isi($id=null){
        $data = $this->data->get('inbox',['ID' => $id]);
        echo json_encode($data);
    }

}