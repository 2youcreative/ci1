<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demande extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('generiq','generiq');
		$this->load->model('m_demande','demande');
		$this->generiq->initialise('Demande', array('Objet'), array('IDDmd' => 'asc'), 'IDDmd');
	}

	public function index()
	{
		if($this->session->userdata('Logged'))
		{
			$this->load->view('dashboard/v_demande');
		} else {
			redirect(base_url());	
		}	
	}

	public function ajax_list()
	{

		$list = $this->demande->get_demandes();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $demande) {
			$no++;
			$row = array();
			$row[] = $demande->Objet;
			$row[] = $demande->Message;
			$row[] = $demande->DateDebutFr;
			$row[] = $demande->DateFinFr;
			$row[] = $demande->Prenom . " " . $demande->Nom;
			$row[] = $demande->EtatDmd;
			$row[] = '<a class="btn btn-sm btn-danger" title="Supprimer" onclick="delete_demande('.$demande->IDDmd.')"><i class="glyphicon glyphicon-trash"></i>Supp</a>		
			<a class="btn btn-sm btn-primary" title="Modifier l\'etat" onclick="edit_demande('.$demande->IDDmd.')"><i class="glyphicon glyphicon-edit"></i>Etat</a>';		
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

	public function getDmdFiltre($etat)
	{
		$list = $this->demande->getDmdFiltre($etat);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $demande) {
			$no++;
			$row = array();
			$row[] = $demande->Objet;
			$row[] = $demande->Message;
			$row[] = $demande->DateDebutFr;
			$row[] = $demande->DateFinFr;
			$row[] = $demande->Prenom . " " . $demande->Nom;
			$row[] = $demande->EtatDmd;
			$row[] = '<a class="btn btn-sm btn-danger" title="Supprimer" onclick="delete_demande('.$demande->IDDmd.')"><i class="glyphicon glyphicon-trash"></i>Supp</a>';		
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

	public function delete_dmd($id)
	{
		$this->generiq->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
}