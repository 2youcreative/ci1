<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competence extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('generiq','generiq');
		/*$this->load->model('m_competence','competence');*/
		$this->generiq->initialise('Competence', array('CompName'), array('IDComp' => 'asc'), 'IDComp');
	}

	public function index()
	{
		
	}

	public function comp_add($iduser)
	{
		$this->_validate();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  $value;
		}
		$data["FkUser"] = $this->session->userdata('IDUser');
		$insert = $this->generiq->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function comp_edit($id)
	{
		$data = $this->generiq->get_by_id($id);
		echo json_encode($data);
	}

	public function comp_update()
	{
		$this->_validate();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  $value;
		}
		$this->generiq->update(array('IDComp' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function comp_delete($id)
	{
		$this->generiq->delete_by_id($id);
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
			if((preg_match("/^[a-zA-Z0-9@ èéçà.,;]+$/", $value) != 1))
			{
				$data['inputerror'][] = $key;
				$data['error_string'][] = 'Entrer des chaines/nombres valide';
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