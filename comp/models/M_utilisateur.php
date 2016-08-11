<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_utilisateur extends CI_Model {

	var $table;
	var $column;
	var $order ;
	var $id_table; 

	public function __construct()
	{
		parent::__construct();
	}

	public function get_niveau()
	{
		$this->db->select("IDNiveau,NiveauName");
		$query = $this->db->get('Niveau');
		return $query->result();
	}

	public function get_users()
	{
		$this->db->select("IDUser,Nom,Prenom,Email,CinFile,AttestFile,Etat");
		$query = $this->db->get('Utilisateur');
		return $query->result();
	}

	public function getUsersFiltre($ville,$etat,$niveau)
	{
		$SQL = "SELECT IDUser, Nom, Prenom, Email, CinFile, AttestFile, Etat FROM Utilisateur u WHERE IDUser > 0";
		if($ville != 0)
			$SQL = $SQL . " AND u.FKVille = " . $ville . " ";
		if($etat != 0)
			if($etat == 1)
				$SQL = $SQL . " AND Etat=1";
			else if($etat == 2)
				$SQL = $SQL . " AND u.AttestFile != 'aucun' AND u.CinFile != 'aucun' AND Etat=0";
			else if($etat == 3)
				$SQL = $SQL . " AND Etat=0";
		if($niveau != 0)
			$SQL = $SQL . " AND u.FKNiveau = " . $niveau . " ";
		$query = $this->db->query($SQL);
		return $query->result();
	}

	public function get_ville($val)
	{
		$this->db->select("IDVille,VilleName");
		$this->db->from('Ville');
		$this->db->join('Pays', 'Ville.FkPays = Pays.IDPays');
		$this->db->where("FkPays", $val);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_villes()
	{
		$this->db->select("IDVille,VilleName");
		$query = $this->db->get('Ville');
		return $query->result();
	}

	/*public function get_Activity()
	{
		$this->db->select("IDActivity,ActivityName");
		$query = $this->db->get('Activity');
		return $query->result();
	}*/

	public function get_formateurVille($val)
	{
		$this->db->select('IDTuteur,Nom,Prenom,Email,Tel');
		$this->db->from('Tuteur');
		$this->db->join('Ville', 'Tuteur.FkVille = Ville.IDVille');
		$this->db->where("FkVille", $val);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_formateurSpecialite($val)
	{
		$this->db->select('IDTuteur,Nom,Prenom,Email,Tel');
		$this->db->from('Tuteur');
		$this->db->join('Specialite', 'Tuteur.FkSpecialite = Specialite.IDSpecialite');
		$this->db->where("FkSpecialite", $val);
		$query = $this->db->get();
		return $query->result();
	}

	public function countAll() {
        return $this->db->count_all("Tuteur");
    }
}