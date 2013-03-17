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
      $data['openArray']=$this->calls_model->open();
    
      $this->load->view('calls/open',$data);
      $this->load->view('footer');
    }
}
?>