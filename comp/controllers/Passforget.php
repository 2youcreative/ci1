<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passforget extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('public/v_passforget');
	}		
}