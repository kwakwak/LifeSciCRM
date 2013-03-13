<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();

    	$this->load->library('session');
    	$this->load->helper('url');

      if ($this->session->userdata('level') != 'Team')
        {
            redirect('welcome/team');
        }

    }
    public function index()
    {
     $this->showUsers();
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