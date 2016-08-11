<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_profile','profile');
	}

	public function index($id)
	{
		$this->info($id);	
	}

	public function info($id)
	{
		if($id!=0)
		{
			$data = array();
			$id_existe = $this->profile->checkID($id);

			if($id_existe === "existe")
			{
				$data["row"] = $this->profile->get_profile($id);
				$data["row1"] = $this->profile->get_compUser($id);
				$data["row2"] = $this->profile->get_comment($id);
				$this->load->view('public/v_profil',$data);	
			}
			else
			{
				redirect(base_url() . 'recherche');	
			}
		}else{
			redirect(base_url() . 'recherche');
		}
	}
}