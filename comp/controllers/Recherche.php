<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recherche extends CI_Controller
{
	const NB_FORMATEURS_PAR_PAGE = 3;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_recherche', 'recherche');
		$this->load->library('pagination');
	}

	public function index($nb_formateurs=0)
	{
		$this->lists($nb_formateurs);		
	}

	public function lists($nb_formateurs=0)
	{
	  	$nb_total = $this->recherche->countAll();
		if($nb_formateurs > 0){
			if($nb_formateurs <= $nb_total){
				$nb_formateurs = intval($nb_formateurs);
			}else{
				$nb_formateurs = 0;
			}
		}else{
			$nb_formateurs = 0;
		}
		$config = array();
		$config['base_url'] = base_url() .'recherche/lists/';
		$config['total_rows'] = $nb_total;
		$config['per_page'] = self::NB_FORMATEURS_PAR_PAGE;
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['nb_total_formateurs'] = $nb_total;
		//$data["row"] = $this->profile->get_users();
		$data['rows'] = $this->recherche->get_users(self::NB_FORMATEURS_PAR_PAGE, $nb_formateurs);
		$this->load->view('public/v_recherche', $data); 
    }

    public function rechville($ville='')
    {
    	$nb_formateurs=0;
    	$nb_total = $this->recherche->countAll2($ville);
    	//echo $nb_total;
		if($nb_formateurs > 0){
			if($nb_formateurs <= $nb_total){
				$nb_formateurs = intval($nb_formateurs);
			}else{
				$nb_formateurs = 0;
			}
		}else{
			$nb_formateurs = 0;
		}
		$config = array();
		$config['base_url'] = base_url() .'recherche/rechville/';
		$config['total_rows'] = $nb_total;
		$config['per_page'] = self::NB_FORMATEURS_PAR_PAGE;
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['nb_total_formateurs'] = $nb_total;
		$data['rows'] = $this->recherche->get_users2(self::NB_FORMATEURS_PAR_PAGE, $nb_formateurs, $ville);
		$this->load->view('public/v_recherche', $data); 
    }

    public function rechcomp($rech_txt='')
    {
    	$nb_formateurs=0;
    	$nb_total = $this->recherche->countAll3($rech_txt);
    	//echo $nb_total;
    	//echo $nb_total;
		if($nb_formateurs > 0){
			if($nb_formateurs <= $nb_total){
				$nb_formateurs = intval($nb_formateurs);
			}else{
				$nb_formateurs = 0;
			}
		}else{
			$nb_formateurs = 0;
		}
		$config = array();
		$config['base_url'] = base_url() .'formateurs/rechcomp/';
		$config['total_rows'] = $nb_total;
		$config['per_page'] = self::NB_FORMATEURS_PAR_PAGE;
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['nb_total_formateurs'] = $nb_total;
		$data['rows'] = $this->recherche->get_users3(self::NB_FORMATEURS_PAR_PAGE, $nb_formateurs, $rech_txt);
		$this->load->view('public/v_recherche', $data); 
    }

    public function rech($ville='', $rech_txt='')
    {
    	$nb_formateurs=0;
    	$nb_total = $this->recherche->countAll4($ville, $rech_txt);
    	//echo $nb_total;
    	//echo $nb_total;
		if($nb_formateurs > 0){
			if($nb_formateurs <= $nb_total){
				$nb_formateurs = intval($nb_formateurs);
			}else{
				$nb_formateurs = 0;
			}
		}else{
			$nb_formateurs = 0;
		}
		$config = array();
		$config['base_url'] = base_url() .'formateurs/rech/';
		$config['total_rows'] = $nb_total;
		$config['per_page'] = self::NB_FORMATEURS_PAR_PAGE;
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['nb_total_formateurs'] = $nb_total;
		$data['rows'] = $this->recherche->get_users4(self::NB_FORMATEURS_PAR_PAGE, $nb_formateurs, $ville, $rech_txt);
		$this->load->view('public/v_recherche', $data); 
    }

}