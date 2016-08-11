<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model 
{

	var $table = "Utilisateur";
	/*var $column;
	var $order ;
	var $id_table; */

	public function __construct()
	{
		parent::__construct();
	}

	public function countAll()
	{
		$query = $this->db->get('Utilisateur');
		return $query->num_rows();
	}

	public function checkID($id)
	{
		$this->db->select('IDUser, Nom, Prenom');
		$this->db->from('Utilisateur');
		$this->db->where("IDUser", $id);
		$query = $this->db->get();
		$n_row = $query->num_rows();
		if($n_row >= 1)
			return "existe";
		else
			return "!existe";	
	}

	public function get_profile($iduser)
	{
		$this->db->select('IDUser,Nom,Prenom,imgFile,AttestFile,CinFile,CvFile,Adresse,Email,Tel,UserName,AboutTxt,Specialite,VilleName,NiveauName');
		$this->db->from('Utilisateur');
		$this->db->join('Ville', 'Utilisateur.FkVille = Ville.IDVille');
		$this->db->join('Niveau', 'Utilisateur.FkNiveau = Niveau.IDNiveau');
		$this->db->where("IDUser", $iduser);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_profilUser($id)
	{
		$this->db->select('IDUser,Nom,Prenom,imgFile,Adresse,Email,Tel,UserName,AboutTxt,Specialite,VilleName,NiveauName');
		$this->db->from('Utilisateur');
		$this->db->join('Ville', 'Utilisateur.FkVille = Ville.IDVille');
		$this->db->join('Niveau', 'Utilisateur.FkNiveau = Niveau.IDNiveau');
		$this->db->where("IDUser", $id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_comp($iduser)
	{
		$this->db->select('*');
		$this->db->from('Competence');
		$this->db->where("FkUser", $iduser);
		$this->db->order_by("IDComp", "desc");
		$query = $this->db->get();
		return $query->result();
	}

	public function get_comment($iduser)
	{
		$this->db->select('*');
		$this->db->from('Commentaire');
		$this->db->where("FkUser", $iduser);
		$this->db->order_by("DateComment", "ASC");
		$query = $this->db->get();
		return $query->result();
	}

	public function get_compUser($id)
	{
		$this->db->select('*');
		$this->db->from('Competence');
		$this->db->where("FkUser", $id);
		$this->db->order_by("IDComp", "desc");
		$query = $this->db->get();
		return $query->result();
	}

	public function get_activity_byid($id)
	{
		$this->db->select('ActivityName');
		$this->db->from('Activity');
		$this->db->join('Utilisateur', 'User_Activity.FkUser = Utilisateur.IDUser');
		$this->db->join('Activity', 'User_Activity.FkActivity = Activity.IDActivity');
		$this->db->where("FkUser", $id);
		$this->db->order_by("ActivityName", "desc");
		$query = $this->db->get();
		return $query->result();
	}

	public function get_pic($id)
	{
		$this->db->select('IDUser,ImgFile');
		$this->db->from('Utilisateur');
		$this->db->where("IDUser", $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function edit_compte($where, $data)
	{
		foreach ($data as $key => $value) {
			$data[$key] = $this->db->escape_str($value);
		}
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_desc_byid($id)
	{
		$this->db->select('IDUser,AboutTxt');
		$this->db->from('Utilisateur');
		$this->db->where("IDUser", $id);
		$query = $this->db->get();
		return $query->result();
	}

}