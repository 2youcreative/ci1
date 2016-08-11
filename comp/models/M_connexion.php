<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');
	
class M_connexion extends CI_Model
{
	public function checkUsername($user)
	{
        $user = $this->db->escape_str($user);
        $this->db->where('UserName', $user);
        $check_user = $this->db->get('Utilisateur');
    	if($check_user->num_rows() > 0)
    	{
    		$data = "user_existe";
        	return $data;
        }
        else
        {
            $data = "user_not_existe";
            return $data;
        }
    }

    public function checkEmail($email)
    {
        $email = $this->db->escape_str($email);
        $this->db->where('Email', $email);
        $check_email = $this->db->get('Utilisateur');
        if($check_email->num_rows() > 0)
        {
            $data = "user_existe";
            return $data;
        }
        else
        {
            $data = "user_not_existe";
            return $data;
        }
    }

    public function getLoginUser($user,$mdp)
    {
        $user = $this->db->escape_str($user);
        $mdp = md5($mdp);
        $this->db->where('UserName', $user);
        $this->db->where('Mdp', $mdp);
        $check_login = $this->db->get('Utilisateur');
        if($check_login->num_rows() > 0)
        {
            $data = $check_login->row();
            return $data;
        }
        else
        {
            $data = FALSE;
            return $data;
        }
    }    
}