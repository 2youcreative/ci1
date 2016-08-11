<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_competence extends CI_Model {

	var $table;
	var $column;
	var $order ;
	var $id_table; 

	public function __construct()
	{
		parent::__construct();
	}

	public function get_competence($val)
	{
		/*$this->db->select('IDCompetence,CompetenceName');
		$this->db->from('Competence');
		$this->db->where("FkSpecialite", $val);
		$query = $this->db->get();
		return $query->result();*/
	}
}