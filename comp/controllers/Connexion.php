<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_connexion','connexion');
		$this->load->model('generiq','generiq');
		$this->generiq->initialise('Utilisateur', array('Nom','Prenom','Adresse','Email','Etat'), array('IDUser' => 'asc'), 'IDUser');
	}

	public function index()
	{
		$this->load->view('public/v_connexion');
	}

	public function registre()
	{
		//echo "string";
		$username = trim($this->input->post('UserName'));
		$email = trim($this->input->post('Email'));
		$check_username = $this->connexion->checkUsername($username);
		if($check_username==="user_existe")
		{
				$data["status"]=FALSE;
				$data["msg"]="user";
				echo json_encode($data);
				exit();
		}
		else if($check_username==="user_not_existe")
		{
			$check_email = $this->connexion->checkEmail($email);
			if($check_email=="user_existe")
			{
				$data["status"]=FALSE;
				$data["msg"]="email";
				echo json_encode($data);
				exit();
			}
			else if($check_email==="user_not_existe")
			{
				$registre = array();
				$registre["Nom"] = trim( $this->input->post('Nom') );
				$registre["Prenom"] = trim( $this->input->post('Prenom') );
				$registre["Email"] = trim( $this->input->post('Email') );
				$registre["Username"] = trim( $this->input->post('UserName') );
				$registre["Mdp"] = md5($this->input->post('Mdp1'));
				$registre["FkVille"] = trim( $this->input->post('ville') );
				$registre["FkNiveau"] = trim( $this->input->post('niveau') );
				$registre["Specialite"] = trim( $this->input->post('filiere') );	
				$registre["DateInscription"] = date("Y.m.d");
				$insert = $this->generiq->save($registre);
				if(is_numeric($insert))
				{
					$mdp = $this->input->post('Mdp1');
					$login = $this->input->post('UserName');
					$chek = $this->connexion->getLoginUser($login,$mdp);
					$data = array(
                	'Login'=>$chek->UserName,
                	'Logged'=>true,
                	'IDUser'=>$chek->IDUser
                	);
		    		$this->session->set_userdata($data);
					echo json_encode(array("status" => "TRUE")); 
				}
			}
		}
	}

	public function login()
	{
		$login = $this->input->post('UserNameLogin');
		$mdp = $this->input->post('MdpLogin');
		if($login !='' and $mdp != '')
		{
			$login = trim($login);
			$chek = $this->connexion->getLoginUser($login,$mdp);
			if ($chek!=FALSE) 
			{
		    	$data = array(
                	'Login'=>$chek->UserName,
                	'Logged'=>true,
                	'IDUser'=>$chek->IDUser
                );
		    	$this->session->set_userdata($data);
				echo json_encode(array("status" => "TRUE"));  
		    }
		    else 
		    {
                echo json_encode(array("status" => "FALSE"));   
		    	exit(); 
			}
		} else {
			echo json_encode(array("status" => "FALSE"));
			exit();	
		}
	}
}