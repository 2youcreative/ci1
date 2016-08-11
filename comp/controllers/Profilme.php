<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilme extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_profile','profile');

	}

	public function index()
	{
		if($this->session->userdata('Logged')==TRUE)
		{
			$data = array();
			$data["row"] = $this->profile->get_profile( $this->session->userdata('IDUser'));
			$data["row1"] = $this->profile->get_comp( $this->session->userdata('IDUser') );
			$this->load->view('public/v_profilme',$data);	
		}
		else
		{
			redirect(base_url());	
		}	
	}

	private function indexError($errorfile)
	{
		$data = array();
		$data["row"] = $this->profile->get_profile( $this->session->userdata('IDUser'));
		$data["row1"] = $this->profile->get_comp( $this->session->userdata('IDUser') );
		$data["errorfile"] = $errorfile;
		$this->load->view('public/v_profilme',$data);	
	}

	private function indexsuccess()
	{
		$data = array();
		$data["row"] = $this->profile->get_profile( $this->session->userdata('IDUser'));
		$data["row1"] = $this->profile->get_comp( $this->session->userdata('IDUser') );
		$data["success"] = "file upload";
		$this->load->view('public/v_profilme',$data);	
	}

	public function get_desc_byid()
	{
		$data = $this->profile->get_desc_byid($this->session->userdata('IDUser'));
		echo json_encode($data);
	}

	public function save_desc()
	{
		$this->_validate();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  $value;
		}
		$this->profile->edit_compte( array('IDUser' => $this->session->userdata('IDUser')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function edit_compte()
	{
		$this->_validate();
		$this->checkAdrEmail();
		$this->checkMdp();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  $value;
		}
		if( $this->input->post('niveau') != -1){
			$data["FkNiveau"] = $this->input->post('niveau');
		}
		if( $this->input->post('ville') != -1){
			$data["FkVille"] = $this->input->post('ville');
		}
		
		if($this->input->post('Mdp1') !== "")
			$data["Mdp"] = md5( $this->input->post('Mdp1') );
		$this->profile->edit_compte(array('IDUser' =>  $this->session->userdata('IDUser')), $data);
		echo json_encode(array("status" => TRUE));
	}


	public function logout()
	{

		$this->session->unset_userdata('Login');
		$this->session->unset_userdata('Logged');
		$this->session->unset_userdata('Profile');
		$this->session->unset_userdata('IDUser');
		$this->session->sess_destroy();
		redirect(base_url());
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		foreach ($this->input->post('inputs') as $key => $value) 
		{
			$value=trim($value);
			if($value == '')
			{
				$data['inputerror'][] = $key;
				$data['error_string'][] = 'ce champ est requis';
				$data['status'] = FALSE;
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

	public function checkAdrEmail()
	{
		if( filter_var($this->input->post('inputs[Email]'), FILTER_VALIDATE_EMAIL) == false ){
			$data['inputerror'][] = "Email";
			$data['error_string'][] = 'veuillez entrer un email valide';
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
	}

	public function checkMdp()
	{
		if($this->input->post('Mdp2')!=$this->input->post('Mdp1')){
			$data['inputerror'][] = "Mdp2";
			$data['error_string'][] = 'Veuillez confirmer le mot de passe';
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
	}

	function upload_pic()
	{
		$config['upload_path'] = './uploads/pic';
		$config['allowed_types'] = 'jpg|png|jpg';
		$config['max_size']	= '500';
		$config['max_width']  = '1200';
		$config['max_height']  = '1200';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload() )
		{
			$rep = array();
			$rep['status'] = "fileError";
			$rep['errors'] = $this->upload->display_errors();
			$errorfile = strip_tags($rep['errors']);
			$this->indexError($errorfile);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$datafile = array('ImgFile' => $data['upload_data']['file_name']);
			$filedit = $this->profile->edit_compte(array('IDUser' => $this->session->userdata('IDUser')), $datafile);
			$this->indexsuccess();
		}
	}

	function upload_dip()
	{
		$config['upload_path'] = './uploads/dip';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '500';
		$config['max_width']  = '1200';
		$config['max_height']  = '1200';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload() )
		{
			$rep = array();
			$rep['status'] = "fileError";
			$rep['errors'] = $this->upload->display_errors();
			$errorfile = strip_tags($rep['errors']);
			$this->indexError($errorfile);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$datafile = array('AttestFile' => $data['upload_data']['file_name']);
			$filedit = $this->profile->edit_compte(array('IDUser' => $this->session->userdata('IDUser')), $datafile);
			$this->indexsuccess();
		}
	}


	function upload_cv()
	{
		$config['upload_path'] = './uploads/cv';
		$config['allowed_types'] = 'jpg|png|pdf';
		$config['max_size']	= '500';
		$config['max_width']  = '1200';
		$config['max_height']  = '1200';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload() )
		{
			$rep = array();
			$rep['status'] = "fileError";
			$rep['errors'] = $this->upload->display_errors();
			$errorfile = strip_tags($rep['errors']);
			$this->indexError($errorfile);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$datafile = array('CvFile' => $data['upload_data']['file_name']);
			$filedit = $this->profile->edit_compte(array('IDUser' => $this->session->userdata('IDUser')), $datafile);
			$this->indexsuccess();
		}
	}

	function upload_cin()
	{
		$config['upload_path'] = './uploads/cin';
		$config['allowed_types'] = 'jpg|png|jpg';
		$config['max_size']	= '500';
		$config['max_width']  = '1200';
		$config['max_height']  = '1200';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload() )
		{
			$rep = array();
			$rep['status'] = "fileError";
			$rep['errors'] = $this->upload->display_errors();
			$errorfile = strip_tags($rep['errors']);
			$this->indexError($errorfile);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$datafile = array('CinFile' => $data['upload_data']['file_name']);
			$filedit = $this->profile->edit_compte(array('IDUser' => $this->session->userdata('IDUser')), $datafile);
			$this->indexsuccess();
		}
	}

	function download_pic()
	{
		$this->load->helper('download');
		$row = $this->profile->get_pic( $this->session->userdata('IDUser') );
		foreach ($row as $value)
			$pic = $value->ImgFile;
		$path = "http://localhost/rivoproject/uploads/pic/".$pic_name;
		$data = file_get_contents($path); // Read the file's contents
		force_download($pic, $data);
		redirect('/profilme', 'refrech');
	}
}