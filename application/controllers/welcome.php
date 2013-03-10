<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct()
    {
    	parent::__construct();
    	
    	$this->load->library('session');
    	
    }

	public function index()
	{
		
		if (isset($_POST['action']) and $_POST['action']=="logout")
			$this->session->sess_destroy();

		if (isset($_POST['name']) and isset($_POST['password']))
		{
			$this->load->database();
			$this->load->model('user');
			$this->user->login();
		}

		$logged= $this->session->userdata('logged');

		$this->load->helper('form');
		$this->load->view('welcome_message');

		if ($logged==0)
		{
			$this->load->view('login_form');
		}
			
		$this->load->view('footer');
	}

	public function user($id)
	{
		$this->load->database();
		$this->load->model('user');
		$this->user->info($id);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */