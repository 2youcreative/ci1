<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_recherche extends CI_Model {

	/*var $table;
	var $column;
	var $order ;
	var $id_table; */

	public function __construct()
	{
		parent::__construct();
	}

	public function get_users($nb, $debut)
	{
		$this->db->select('IDUser,Nom,Prenom,ImgFile,AboutTxt,Specialite,VilleName,NiveauName');
		$this->db->from('Utilisateur');
		$this->db->join('Ville', 'Utilisateur.FkVille = Ville.IDVille');
		$this->db->join('Niveau', 'Utilisateur.FkNiveau = Niveau.IDNiveau');
		/*$this->db->where('AttestFile !=', 'aucun');
		$this->db->where('CinFile !=', 'aucun'); */
		$this->db->where('Etat', 1);
		$this->db->order_by("DateInscription", "ASC");
		$this->db->limit($nb, $debut);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_users2($nb, $debut, $ville)
	{
		if(!is_integer($nb) OR $nb < 1 OR !is_integer($debut) OR $debut <0)
			return false;
		$this->db->select('IDUser,Nom,Prenom,ImgFile,AboutTxt,Specialite,VilleName,NiveauName');
		$this->db->from('Utilisateur');
		$this->db->join('Niveau', 'Utilisateur.FkNiveau = Niveau.IDNiveau');
		$this->db->join('Ville', 'Utilisateur.FkVille = Ville.IDVille');
		$this->db->where("FkVille", $ville);
		/*$this->db->where('AttestFile !=', 'aucun');
		$this->db->where('CinFile !=', 'aucun'); */
		$this->db->where('Etat', 1);
		$this->db->order_by("DateInscription", "ASC");
		$this->db->limit($nb, $debut);
		$query = $this->db->get();
		return $query->result();
	}

	/*public function get_users3($nb, $debut, $rech_txt)
	{
		if(!is_integer($nb) OR $nb < 1 OR !is_integer($debut) OR $debut <0)
			return false;
		$sql = "SELECT IDUser,Nom,Prenom,ImgFile,AboutTxt,Specialite,VilleName,NiveauName
				FROM Utilisateur u, Niveau n, Ville v, Competence c
				WHERE u.FkNiveau=n.IDNiveau AND u.IDUser=c.FkUser AND v.IDVille=u.FkVille
				AND c.CompName LIKE '%?%' LIMIT ".$debut." ,".$nb."";
		$query = $this->db->query($sql, array($rech_txt));
		return $query->result();
	}*/

	public function get_users3($nb, $debut, $rech_txt)
	{
		if(!is_integer($nb) OR $nb < 1 OR !is_integer($debut) OR $debut <0)
			return false;
		$rech_txt = $this->db->escape_like_str($rech_txt);
		$this->db->select('IDUser,Nom,Prenom,ImgFile,AboutTxt,Specialite,VilleName,NiveauName');
		$this->db->from('Utilisateur');
		$this->db->join('Niveau', 'Utilisateur.FkNiveau = Niveau.IDNiveau');
		$this->db->join('Ville', 'Utilisateur.FkVille = Ville.IDVille');
		if($rech_txt!==''){
			$this->db->join('Competence', 'Utilisateur.IDUser = Competence.FkUser');
			$this->db->like('CompName', $rech_txt);
		}
		/*$this->db->where('AttestFile !=', 'aucun');
		$this->db->where('CinFile !=', 'aucun');*/
		$this->db->where('Etat', 1); 
		$this->db->order_by("DateInscription", "ASC");
		$this->db->limit($nb, $debut);
		$query = $this->db->get();
		return $query->result();
	}


	/*public function get_users4($nb, $debut, $ville, $rech_txt)
	{
		if(!is_integer($nb) OR $nb < 1 OR !is_integer($debut) OR $debut <0)
			return false;
		$sql = "SELECT IDUser,Nom,Prenom,ImgFile,AboutTxt,Specialite,VilleName,NiveauName
				FROM Utilisateur u, Niveau n, Competence c, ville v
				WHERE u.FkNiveau=n.IDNiveau AND u.IDUser=c.FkUser AND v.IDVille=u.FkVille
				AND CompName LIKE '%".$rech_txt."%'  AND u.FkVille=" . $ville . " LIMIT ".$debut." ,".$nb."";
		$query = $this->db->query($sql);
		return $query->result();
	}
*/
	public function get_users4($nb, $debut, $ville, $rech_txt)
	{
		if(!is_integer($nb) OR $nb < 1 OR !is_integer($debut) OR $debut <0)
			return false;
		$rech_txt = $this->db->escape_like_str($rech_txt);
		$this->db->select('IDUser,Nom,Prenom,ImgFile,AboutTxt,Specialite,VilleName,NiveauName');
		$this->db->from('Utilisateur');
		$this->db->join('Niveau', 'Utilisateur.FkNiveau = Niveau.IDNiveau');
		$this->db->join('Ville', 'Utilisateur.FkVille = Ville.IDVille');
		$this->db->where("FkVille", $ville);
		if($rech_txt!==''){
			$this->db->join('Competence', 'Utilisateur.IDUser = Competence.FkUser');	
			$this->db->like('CompName', $rech_txt);
		}
		/*$this->db->where('AttestFile !=', 'aucun');
		$this->db->where('CinFile !=', 'aucun'); */
		$this->db->where('Etat', 1);
		$this->db->order_by("DateInscription", "ASC");
		$this->db->limit($nb, $debut);
		$query = $this->db->get();
		return $query->result();
	}

	public function countAll()
	{
		$this->db->select('IDUser');
		$this->db->where('Etat', 1);
		$query = $this->db->get('Utilisateur');
		return $query->num_rows();
	}

	public function countAll2($ville)
	{
		$this->db->select('IDUser');
		$this->db->where('Etat', 1);
		$this->db->where('FkVille', $ville);
		$query = $this->db->get('Utilisateur');
		return $query->num_rows();
	}

	public function countAll3($rech_txt)
	{
		$rech_txt = $this->db->escape_like_str($rech_txt);
		$this->db->select('IDUser');
		$this->db->from('Utilisateur');
		$this->db->join('Niveau', 'Utilisateur.FkNiveau = Niveau.IDNiveau');
		$this->db->join('Ville', 'Utilisateur.FkVille = Ville.IDVille');
		if($rech_txt!==''){
			$this->db->join('Competence', 'Utilisateur.IDUser = Competence.FkUser');
			$this->db->like('CompName', $rech_txt);
		}
		$this->db->where('Etat', 1);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function countAll4($ville, $rech_txt)
	{
		$rech_txt = $this->db->escape_like_str($rech_txt);
		$this->db->select('IDUser');
		$this->db->from('Utilisateur');
		$this->db->join('Niveau', 'Utilisateur.FkNiveau = Niveau.IDNiveau');
		$this->db->join('Ville', 'Utilisateur.FkVille = Ville.IDVille');
		$this->db->where("FkVille", $ville);
		if($rech_txt!==''){
			$this->db->join('Competence', 'Utilisateur.IDUser = Competence.FkUser');
			$this->db->like('CompName', $rech_txt);
		}
		$this->db->where('Etat', 1);
		$query = $this->db->get();
		return $query->num_rows();
	}


	/*$sql = "SELECT IDUser
	FROM Utilisateur u, Niveau n, Competence c, ville v
	WHERE u.FkNiveau=n.IDNiveau and u.IDUser=c.FkUser and  v.IDVille=u.FkVille
	AND c.CompName LIKE '%" . $rech_txt . "%'";*/

	/*$sql = "SELECT IDUser
	FROM Utilisateur u, Niveau n, Competence c, ville v
	WHERE u.FkNiveau=n.IDNiveau AND u.IDUser=c.FkUser AND v.IDVille=u.FkVille
	AND CompName LIKE '%".$rech_txt."%'  AND u.FkVille=" . $ville ;*/
}