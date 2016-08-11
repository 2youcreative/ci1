<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ville extends CI_Model {

	var $table;
	var $column;
	var $order ;
	var $id_table; 

	public function __construct()
	{
		parent::__construct();
	}

	public function get_pays()
	{
		$this->db->select("IDPays,PaysName");
		$query = $this->db->get('Pays');
		return $query->result();
	}

	public function get_ville2()
	{
		$this->db->select("IDVille,VilleName");
		$this->db->order_by("VilleName", "asc");
		$query = $this->db->get('Ville');
		return $query->result();
	}

	public function get_Ville($val)
	{
		$this->db->select('IDVille,VilleName');
		$this->db->from('Ville');
		$this->db->join('Pays', 'Ville.FkPays = Pays.IDPays');
		$this->db->where("FkPays", $val);
		$query = $this->db->get();
		return $query->result();
	}
}