<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Root extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();

    	$this->load->library('session');
    	$this->load->helper('url');

      if ($this->session->userdata('level') != 'root')
        {
            redirect('/');
        }

    }

    public function index()
    {
      $this->load->view('header');
      $this->load->view('logged');

      $this->load->database();
      $this->load->model('root_model');
      $data['usersArray']=$this->root_model->getUsers();
    
      $this->load->view('root/show_users',$data);
      $this->load->view('footer');
    }
}
?>