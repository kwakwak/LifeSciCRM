<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	 public function __construct()
    {
    	parent::__construct();
    	
    	$this->load->library('session');
    	
    }

	public function index()
	{
		
		$this->load->model('user_model');

		if (isset($_POST['action']) and $_POST['action']=="logout")
			$this->session->sess_destroy();

		if (isset($_POST['name']) and isset($_POST['password']))
		{
			$this->load->database();
			$this->user_model->login();
		}


		$this->load->helper('form');
		$this->load->view('welcome_message');

		if ($this->user_model->isLogged())
			$this->load->view('logged');
		else
			$this->load->view('login_form');
		
			
		$this->load->view('footer');
	}

	public function profile($id)
	{
		$this->load->database();
		$this->load->model('user_model');
		$this->user_model->profile($id);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */