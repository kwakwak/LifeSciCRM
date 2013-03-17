<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	 public function __construct()
    {
    	parent::__construct();
    	
    	$this->load->library('session');
    	$this->load->helper('url');

   		if (!$this->session->userdata('id'))
      	{
           	redirect('/');
      	}
      
    }

	public function index()
	{
    $id=$this->session->userdata('id');
	//	$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('logged');

		$this->load->database();
		$this->load->model('user_model');
		$profile_arr=$this->user_model->profile($id);

		$this->load->view('user/profile',$profile_arr);
		$this->load->view('footer');
	}

	public function logout()
    {
    	$this->session->sess_destroy();
    	redirect('/');
    }
  public function newCall()
  {
    $id=$this->session->userdata('id');
    $this->load->helper('form');
    $this->load->view('header');
    $this->load->view('logged');

    $this->load->database();

    $this->load->library('form_validation');


    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
    $this->form_validation->set_rules('body', 'Body', 'trim|required|xss_clean');


    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('user/call_form');
    }
    else
    {
      $this->load->model('user_model');
      $this->user_model->new_call();
      redirect('calls/open', 'refresh');
    }
    
    $this->load->view('footer');
  }
}