<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');
	
class M_auth extends CI_Model
{
	public function getLogin($user,$mdp)
	{
        $user = $this->db->escape_like_str($user);
    	$mdp = md5($mdp);
        $this->db->where('LoginAdmin', $user);
        $this->db->where('MdpAdmin', $mdp);
        $check_login = $this->db->get('SysAdmin');
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

    public function countAll() {
        return $this->db->count_all("Utilisateur");
    }

}