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
     echo "hey root";
    }
    public function showUsers()
    {
      $this->load->view('header');
      $this->load->view('logged');

      $this->load->database();
      $this->load->model('team_model');
      $data['usersArray']=$this->team_model->getUsers();
    
      $this->load->view('team/show_users',$data);
      $this->load->view('footer');
    }
}
?>