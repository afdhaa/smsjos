<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_core extends CI_Model {

	private $success_status = "success";
  	private $failed_status = "failed";

	public function __construct(){
	    parent::__construct();
	}

	public function explodeSMS($where, $where_in = null, $like){
		if($where_in != null) $this->db->where_in('SenderNumber', $where_in);
		$query = $this->db->select('ID,TextDecoded,ReceivingDateTime,Processed')
			->like($like)
			->from('inbox')
			->where($where)
			->get()->result();
		return $query;
	}


  function get($table,$where = null, $order = null, $limit = null, $group = null,$select = null){
      if($where != null) $this->db->where($where);
      if($order != null) $this->db->order_by($order);
      if($group != null) $this->db->group_by($group);
      if($limit != null) $this->db->limit($limit);
      if($select != null) $this->db->select($select);
      
      $query = $this->db->get($table);
      return $query->result();
  }

    public function update($table, $where, $data){
        $this->db->where($where)
              ->update($table,$data);
        $result['status'] = $this->success_status;    
        return $result;
    }


  public function insert($table, $data = null,$datab = null){
        if($datab != null){
            return $this->db->insert_batch($table,$datab);
        }else{
            return $this->db->insert($table,$data);
        }
    }

	public function getData($select='*', $from, $where=null){	
		// $from = tabel name, $select = string select, $where = array where

		if ($where != null) {
			$this->db->where($where);
		}
		
		$this->db->select($select);
		$this->db->from($from);
		return	$this->db->get()->result_array();
	}

}