<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('generiq','generiq');
		$this->generiq->initialise('Activity', array('ActivityName'), array('IDActivity' => 'asc'), 'IDActivity');
	}

	public function index()
	{
		$data = array();
		if($this->session->userdata('Logged'))
		{
			$this->load->view('dashboard/v_activity');
		} else {
			redirect(base_url());	
		}	
	}

	public function ajax_list()
	{
		$list = $this->generiq->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $activity) {
			$no++;
			$row = array();
			$row[] = $activity->ActivityName;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary"  title="Modifier" onclick="edit_activity('.$activity->IDActivity.')"><i class="glyphicon glyphicon-pencil"></i>Mod</a>
				  <a class="btn btn-sm btn-danger" title="Supprimer" onclick="delete_activity('.$activity->IDActivity.')"><i class="glyphicon glyphicon-trash"></i>Supp</a>';		
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
		$this->generiq->update(array('IDActivity' => $this->input->post('id')), $data);
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