<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('generiq','generiq');
		$this->load->model('m_utilisateur','utilisateur');
		$this->generiq->initialise('Utilisateur', array('Nom'), array('IDUser' => 'asc'), 'IDUser');
		//rechercher par le nom
	}

	public function index()
	{
		if($this->session->userdata('Logged'))
		{
			$this->load->view('dashboard/v_utilisateur');
		} else {
			redirect(base_url());	
		}	
	}

	public function get_niveau()
	{
		$data = $this->utilisateur->get_niveau();
		echo json_encode($data);
	}

	public function ajax_list($type="tous",$val=0)
	{
		$liste;
		$list = $this->utilisateur->get_users();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Utilisateur) {
			$no++;
			$row = array();
			$row[] = $Utilisateur->Nom;
			$row[] = $Utilisateur->Prenom;
			/*$row[] = $Utilisateur->Email;*/
			if($Utilisateur->AttestFile!='aucun')
				$row[] = '<a onclick="display_dip('."'".$Utilisateur->AttestFile."'".')"><img src="'.base_url()."uploads/dip/".$Utilisateur->AttestFile.'" width="160" height="100" class="hovereffect"></a>';
			else
				$row[] = $Utilisateur->AttestFile;
			if($Utilisateur->CinFile!='aucun'){
				$path=1;
				$row[] = '<a onclick="display_cin('."'".$Utilisateur->CinFile."'".')"><img src="'.base_url()."uploads/cin/".$Utilisateur->CinFile.'" width="160"; height="100" class="hovereffect"></a>';
			}else
				$row[] = $Utilisateur->CinFile;
			$row[] = $Utilisateur->Etat;
			$row[] = '<a class="btn btn-sm btn-warning" title="Edit etat" onclick="supvalidation('.$Utilisateur->IDUser.')"><i class="glyphicon glyphicon-unchecked"></i></a>
			<a class="btn btn-sm btn-success" title="Edit etat" onclick="validation('.$Utilisateur->IDUser.')"><i class="glyphicon glyphicon-check"></i></a>';
			$row[] = '<a class="btn btn-sm btn-primary" title="Profile" onclick="profile('.$Utilisateur->IDUser.')"><i class="glyphicon glyphicon-eye-open"></i></a>		
						<a class="btn btn-sm btn-danger" title="Supprimer" onclick="delete_utilisateur('.$Utilisateur->IDUser.')"><i class="glyphicon glyphicon-trash"></i></a>';
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->generiq->count_all(),
						"recordsFiltered" => $this->generiq->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}

	public function validation($id)
	{
		$data["Etat"] =  1;
		$this->generiq->update(array('IDUser' => $id), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function supvalidation($id)
	{
		$data["Etat"] =  0;
		$this->generiq->update(array('IDUser' => $id), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function get_ville($val)
	{
		$data = $this->utilisateur->get_ville($val);
		echo json_encode($data);
	}

	public function get_villes()
	{
		$data = $this->utilisateur->get_villes();
		echo json_encode($data);
	}

/*	public function get_specialite()
	{
		$data = $this->utilisateur->get_specialite();
		echo json_encode($data);
	}*/

	public function ajax_edit($id)
	{
		$data = $this->generiq->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_delete($id)
	{
		$this->generiq->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  $value;
		}
		$insert = $this->generiq->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  $value;
		}
		$this->generiq->update(array('IDUtilisateur' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function getUsersFiltre($ville,$etat,$niveau)
	{
		$liste;
		$list = $this->utilisateur->getUsersFiltre($ville,$etat,$niveau);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Utilisateur) {
			$no++;
			$row = array();
			$row[] = $Utilisateur->Nom;
			$row[] = $Utilisateur->Prenom;
			/*$row[] = $Utilisateur->Email;*/
			if($Utilisateur->AttestFile!='aucun')
				$row[] = '<a onclick="void()"><img src="'.base_url()."uploads/dip/".$Utilisateur->AttestFile.'" id="" width="200"; height="100p" class="hovereffect"></a>';
			else
				$row[] = $Utilisateur->AttestFile;
			if($Utilisateur->CinFile!='aucun')
				$row[] = '<a onclick="display_cin('.$Utilisateur->CinFile.')"><img src="'.base_url()."uploads/cin/".$Utilisateur->CinFile.'" id="" width="200"; height="100p" class="hovereffect"></a>';
			else
				$row[] = $Utilisateur->CinFile;

			/*if($Utilisateur->Etat==1)
				$row[] = '<input type="checkbox" name="etat" value="1" checked disabled readonly>';
			else
				$row[] = '<input type="checkbox" name="etat" value="0" disabled>';*/
			$row[] = $Utilisateur->Etat;
			$row[] = '<a class="btn btn-sm btn-warning" title="Edit etat" onclick="supvalidation('.$Utilisateur->IDUser.')"><i class="glyphicon glyphicon-unchecked"></i></a>
			<a class="btn btn-sm btn-success" title="Edit etat" onclick="validation('.$Utilisateur->IDUser.')"><i class="glyphicon glyphicon-check"></i></a>';
			$row[] = '<a class="btn btn-sm btn-primary" title="Profile" onclick="profile('.$Utilisateur->IDUser.')"><i class="glyphicon glyphicon-eye-open"></i></a>		
						<a class="btn btn-sm btn-danger" title="Supprimer" onclick="delete_utilisateur('.$Utilisateur->IDUser.')"><i class="glyphicon glyphicon-trash"></i></a>';
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->generiq->count_all(),
						"recordsFiltered" => $this->generiq->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		foreach ($this->input->post('inputs') as $key => $value) {
			if($value == '')
			{
				$data['inputerror'][] = $key;
				$data['error_string'][] = 'ce champ est requis';
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}