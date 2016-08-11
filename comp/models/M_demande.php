<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_demande extends CI_Model {

	var $table;
	var $column;
	var $order ;
	var $id_table; 

	public function __construct()
	{
		parent::__construct();
	}

	public function get_demandes()
	{
		$this->db->select('IDDmd, IDUser, Email, Nom, Prenom, Objet, Message, DateDebutFr, DateFinFr, EtatDmd');
		$this->db->from('Demande');
		$this->db->join('Utilisateur', 'Demande.Client = Utilisateur.IDUser');
		/*$this->db->where("FkPays", $val);*/
		$query = $this->db->get();
		return $query->result();
	}

	public function getDmdFiltre($etat)
	{
		$this->db->select('IDDmd, IDUser, Email, Nom, Prenom, Objet, Message, DateDebutFr, DateFinFr, EtatDmd');
		$this->db->from('Demande');
		$this->db->join('Utilisateur', 'Demande.Client = Utilisateur.IDUser');
		$this->db->where("EtatDmd", $etat);
		$query = $this->db->get();
		return $query->result();
	}
}