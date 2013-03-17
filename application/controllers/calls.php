<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calls extends CI_Controller {

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
     $this->open();
    }
    public function open()
    {
      $this->load->view('header');
      $this->load->view('logged');

      $this->load->database();
      $this->load->model('calls_model');
      if ($this->session->userdata('level')=="User") 
        $data['openArray']=$this->calls_model->open("user");
      elseif ($this->session->userdata('level')=="Team") 
        $data['openArray']=$this->calls_model->open("team");
      $this->load->view('calls/open',$data);

      $this->load->view('footer');
    }
}
?>