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

	public function index($id)
	{
		$this->load->helper('form');
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
}