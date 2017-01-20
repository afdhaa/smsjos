<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data extends CI_Model {

  private $success_status = "success";
  private $failed_status = "failed";

	public function __construct(){
	    parent::__construct();
	}
  
  public function getKota(){
    $query = $this->db->select('*')
        ->from('app_kabkota')
        ->where('id_kabkota',04)
        ->order_by('kabkota')->get();

    return $query->result_array();
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

  public function insert($table, $data = null,$datab = null){
        if($datab != null){
            return $this->db->insert_batch($table,$datab);
        }else{
            return $this->db->insert($table,$data);
        }
    }

  public function getTotalData($select = '*', $where = null){
    if($where != null) $this->db->where($where);

    $query = $this->db->select($select)
            ->from('s_data d')
            ->join('s_pertanyaan p','p.id = d.id_pertanyaan')
            ->join('s_jawaban j','j.id = d.id_jawaban')
            /*->join('s_kabupaten kab', 'kab.id_kabkota = d.id_kabupaten')
            ->join('s_kecamatan kec', 'kec.id_kec = d.id_kecamatan')
            ->join('s_kelurahan kel', 'kel.id_kel = d.id_kelurahan')*/
            ->get()->result();
    return $query;
  }

  public function questionAnswer($where = null){
    if($where != null) $this->db->where($where);
    $query = $this->db->select('*')
      ->from('s_pertanyaan p')
      ->join('s_jawaban j','j.id_pertanyaan = p.id')
      ->group_by('j.id')
      ->get()->result();
      return $query;
  }

  public function getDataKab($select = "*", $where = null, $group_by = null, $order_by = null){
      if($where != null) $this->db->where($where);
      if($group_by != null) $this->db->group_by($group_by);
      if($order_by != null) $this->db->order_by($order_by);

      $query = $this->db->select($select)
        ->from('s_data d')
        ->join('s_pertanyaan p','p.id = d.id_pertanyaan')
        ->join('s_jawaban j','j.id = d.id_jawaban')
        ->join('s_kabupaten kab','kab.id_kabkota = d.id_kabupaten')
        ->join('s_kecamatan kec','kec.id_kec = d.id_kecamatan')
        ->join('s_kelurahan kel','kel.id_kel = d.id_kelurahan')
        ->where($where)        
        ->get();

      return $query->result_array();
  }

  public function count($table, $where = null){
      if($where != null) $this->db->where($where);
      return $this->db->select('count(*) as jml')
        ->from($table)
        ->get()->result();
  }
 /* public function getLines(){
    return $this->db->select('skec.id_kec, skec.kecamatan, total.id_kabkota, total.jml, id_jawaban, jawaban, huruf, pertanyaan')
        ->from('s_kecamatan as skec')
        ->join('(select count(*) as jml, skab.id_kabkota, kabkota, id_kec, skec.kecamatan, sd.id_pertanyaan, id_jawaban, jawaban,  huruf, pertanyaan, sp.id
            FROM s_data as sd
            INNER JOIN s_kecamatan as skec ON skec.id_kec = sd.id_kecamatan
            INNER JOIN s_jawaban as sj ON sj.id = sd.id_jawaban
            INNER JOIN s_pertanyaan as sp ON sp.id = sd.id_pertanyaan
            INNER JOIN s_kabupaten as skab ON skab.id_kabkota = sd.id_kabupaten
            group by kecamatan,pertanyaan,jawaban
            order by kecamatan) as total','total.id_kec = skec.id_kec')
        ->order_by('skec.kecamatan,pertanyaan')
        ->get()->result();
        ;
        return $this->db->query("SELECT
        s_kecamatan.id_kec,
        s_kecamatan.kecamatan,
        huruf,
        IF(COUNT(*)='1','0',COUNT(*)) as jml
        
        FROM
        s_kecamatan
        LEFT JOIN  s_data on s_kecamatan.id_kec=s_data.id_kecamatan
        LEFT JOIN s_jawaban on s_data.id_jawaban=s_jawaban.id
        GROUP BY kecamatan,huruf")->result();

  }*/
}
