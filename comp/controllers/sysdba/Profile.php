<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('Logged'))
		{
			$this->load->view('dashboard/v_profile');
		} else {
			redirect(base_url());	
		}
	}
}