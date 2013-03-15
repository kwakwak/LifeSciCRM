<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();

    	$this->load->library('session');
    	$this->load->helper('url');

   		if ($this->session->userdata('level')=='User')
        	redirect('user');
        elseif ($this->session->userdata('level')=='Team')
        	redirect('team');
    }

	public function index($level='User')
	{

		$this->load->view('header');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Full Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_db_check['. $level .']');

		if ($this->form_validation->run() == FALSE)
		{
			$data['level'] = $level;
			$this->load->view('welcome/login_form',$data);
		}
		else
		{
			if ($level=='User')
				redirect('user');
			else
				redirect('team');
		}

		$this->load->view('footer');
	}

	public function team()
	{
		$this->index('Team');
	}


	public function db_check($str,$level)
	{
		$this->load->helper('security');
		$this->load->model('welcome_model');
		$this->load->database();

		 if ($this->welcome_model->login($level)){
		 	return TRUE;
		 }
			else
		 {
			$this->form_validation->set_message('db_check', 'Name or Password incorrect.');
			return FALSE;
		 }
	}

	
    public function new_user()
    {
		$this->load->database();

  		$this->load->helper('form');
		$this->load->view('header');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Full Name', 'trim|required|xss_clean|is_unique[users.name]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|integer');
		$this->form_validation->set_rules('building', 'Building Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('room_num', 'Room Number', 'trim|required|integer');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('welcome/sign_form');
		}
		else
		{
			$this->load->model('welcome_model');
			$this->welcome_model->new_user();
			redirect('user', 'refresh');
		}
		

		$this->load->view('footer');
    }
}
