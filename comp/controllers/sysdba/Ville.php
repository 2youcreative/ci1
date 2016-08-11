<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ville extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('generiq','generiq');
		$this->load->model('m_ville','ville');
		$this->generiq->initialise('Ville', array('VilleName'), array('IDVille' => 'asc'), 'IDVille');
	}

	public function index()
	{
		$data = array();
		if($this->session->userdata('Logged'))
		{
			$this->load->view('dashboard/v_ville');
		} else {
			redirect(base_url());	
		}	
	}

	public function get_ville()
	{
		$data = $this->ville->get_ville2();
		echo json_encode($data);
	}

	public function get_pays()
	{
		$data = $this->ville->get_pays();
		echo json_encode($data);
	}

	public function ajax_list($type=0,$val=0)
	{
		$list;
		if($type==0)
			$list = $this->generiq->get_data();
		else if($type==1)
			$list = $this->ville->get_ville($val);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $ville) {
			$no++;
			$row = array();
			$row[] = $ville->VilleName;
			//add html for action
			if($ville->VilleName!="ville?")
			{
				$row[] = '<a class="btn btn-sm btn-primary"  title="Modifier" onclick="edit_ville('.$ville->IDVille.')"><i class="glyphicon glyphicon-pencil"></i>Mod</a>
				<a class="btn btn-sm btn-danger" title="Supprimer" onclick="delete_ville('.$ville->IDVille.')"><i class="glyphicon glyphicon-trash"></i>Supp</a>';		
			}
			else
			{
				$row[] = '<a class="btn btn-sm btn-primary hidden"  title="Modifier" onclick=""></a>
				<a class="btn btn-sm btn-danger hidden" title="Supprimer" onclick=""></a>';
			}
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->generiq->count_all(),
						"recordsFiltered" => $this->generiq->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

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
		$this->generiq->update(array('IDVille' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
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