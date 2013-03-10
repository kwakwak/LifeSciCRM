<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct()
    {
    	parent::__construct();
    	
    	$this->load->library('session');
    	
    }

	public function index()
	{
		$this->load->database();
		$logged= $this->session->userdata('logged');

		$this->load->model('user');


		$data = array(
               'logged' => $logged, 
          );

		$this->load->helper('form');
		$this->load->view('welcome_message', $data);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */