<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth','auth');
	}

	public function index()
	{
		if($this->session->userdata('logged')){
			$this->load->view('dashboard/v_accueil');
		}else{
			$this->load->view('dashboard/v_login');
		}
	}

	public function connexion()
	{
		$login = $this->input->post('LoginAdmin');
		$mdp = $this->input->post('MdpAdmin');
		if($login !='' and $mdp != '')
		{
			$login = trim($login);
			$chek = $this->auth->getLogin($login,$mdp);
			if ($chek!=FALSE) {
				$nbrRow = $this->auth->countAll();
		    	$data = array(
                	'Login'=>$chek->LoginAdmin,
                	/*'Nom'=>$chek->NomAdmin,
                	'Prenom'=>$chek->PrenomAdmin,*/
                	'Logged'=>true
                );
		    	$this->session->set_userdata($data);
				echo json_encode(array("status" => "TRUE"));    
		    } else {
                echo json_encode(array("status" => "FALSE"));   
		    	exit(); 
			}
		} else {
			echo json_encode(array("status" => FALSE));
			exit();	
		}
	}

	public function logout()
	{

		$this->session->unset_userdata('Login');
		$this->session->unset_userdata('Logged');
		$this->session->unset_userdata('Nom');
		$this->session->unset_userdata('Prenom');
		$this->session->sess_destroy();
		redirect(site_url());
	}
}