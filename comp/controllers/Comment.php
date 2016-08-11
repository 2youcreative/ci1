<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('generiq','generiq');
		$this->generiq->initialise('Commentaire', array('Comment,UserComment,EmailComment,DateComment,'), array('IDComment' => 'asc'), 'IDComment');
	}

	public function add_comment($iduser)
	{
		$this->_validate();
		$this->_validatemail();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  $value;
		}
		$data["DateComment"] = date("Y.m.d");
		$data["FkUser"] = $iduser;
		$insert = $this->generiq->save($data);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['status'] = TRUE;
		foreach ($this->input->post('inputs') as $key => $value) {
			if($value == '')
			{
				$data['status'] = FALSE;
				$data['type'] = "vide";
			}
			if((preg_match("/^[a-zA-Z0-9 @ èéçà.,;':]+$/", $value) != 1))
			{
				$data['inputerror'][] = $key;
				$data['error_string'][] = 'Entrer une chaine valide';
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	
	private function _validatemail()
	{
		$data['status'] = TRUE;
		$email = $this->input->post('inputs[EmailComment]');
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
		{
			$data['status'] = FALSE;
			$data['type'] = "mail";
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}