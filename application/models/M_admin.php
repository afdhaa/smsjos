<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model {

	private $success_status = "success";
  	private $failed_status = "failed";

  	var $table = 'users';
    var $column_order = array(null, 'username','role_name'); //set column field database for datatable orderable
    var $column_search = array('username','role_name'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 

	public function __construct(){
	    parent::__construct();
	}

    public function insert($table, $data = null,$datab = null){
        if($datab != null){
            return $this->db->insert_batch($table,$datab);
        }else{
            return $this->db->insert($table,$data);
        }
    }

    public function update($table, $where, $data){
        $this->db->where('id',$where)
              ->update($table,$data);
        $result['status'] = $this->success_status;
    
        return $result;
    }

    public function update_batch($table, $data, $where){
        $query = $this->db->update_batch($table, $data, $where);       
        $result['status'] = $this->success_status;
        
        return $result;
    }

    public function getData($select='*', $from, $where=null){   
        if ($where != null) {
            $this->db->where($where);
        }   
        $this->db->select($select);
        $this->db->from($from);
        return  $this->db->get()->result_array();
    }

    public function delete($table, $where){
        $this->db->delete($table, $where);
        $result['status'] = $this->success_status;
        return $result;
    }

	public function _get_datatables_query(){

		//$this->db->from($this->table)->join();
		$this->db->select('users.id, username, role_name')->from('users')->join('user_role', 'users.role = user_role.id');
 
        $i = 0;
        foreach ($this->column_search as $item) {
        	if ($i === 0) {
        		$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                $this->db->like($item, $_POST['search']['value']);
        	}else{
               		$this->db->or_like($item, $_POST['search']['value']);
           	}
           	if (count($this->column_search) - 1 == $i) {
           		$this->db->group_end(); //close bracket
           	}
           	$i++;
        }
        if(isset($_POST['order'])){
        	$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order)){
        	$order = $this->order;
        	$this->db->order_by(key($order), $order[key($order)]);
        }
	}

    public function query_datatables($table, $select = '*', $search, $order){

        $this->db->select($select)->from($table);
        
        $i = 0;
        foreach ($search as $item) {
            if ($i === 0) {
                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                $this->db->like($item, $_POST['search']['value']);
            }else{
                    $this->db->or_like($item, $_POST['search']['value']);
            }
            if (count($search) - 1 == $i) {
                $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])){
            $this->db->order_by($order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($order)){
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

	function get_datatables($table=null, $select = '*', $search = null, $order=null){
        if($table === null) {$this->_get_datatables_query();} else{$this->query_datatables($table, $select = '*', $search, $order);}
        
        if($_POST['length'] != -1)
        	$this->db->limit($_POST['length'], $_POST['start']);
        
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($table = null){
        if ($table === null) {
            $this->db->from($this->table);
        }else{
            $this->db->from($table);
        }
        return $this->db->count_all_results();
    }

    function insertUser($data){
		return $this->db->insert('users',$data);
	}

	function deleteUser($id){
		return $this->db->where('id',$id)
			->delete('users');
	}

    function insertPertanyaan($data){
        return $this->db->insert('s_pertanyaan',$data);   
    }

    function editUser($id, $data){

    }

    function questionAndAnswer(){
        return $this->db->select('p.id, pertanyaan, GROUP_CONCAT(concat(j.huruf,".",j.jawaban)) as jawaban')  
            ->from('s_pertanyaan as p')
            ->join('s_jawaban as j','p.id = j.id_pertanyaan','left')
            ->group_by('pertanyaan')
            ->order_by('p.id', 'asc')
            ->get()->result_array();
    }

    function getAnswer($id){
        return $this->db->select('*')  
            ->from('s_jawaban as j')
            ->where('id_pertanyaan',$id)
            ->order_by('id','asc')
            ->get()->result_array();
    }

    function getQuestion($id){
        return $this->db->select('*')  
            ->from('s_pertanyaan as p')
            ->where('id',$id)
            ->order_by('id','asc')
            ->get()->result_array();
    }
    function view($table,$where = null, $order = null, $limit = null){
        if($where != null) $this->db->where($where);
        if($order != null) $this->db->order_by($order);
        if($limit != null) $this->db->limit($where);
        $query = $this->db->get($table);
        return $query->result();
    }
}