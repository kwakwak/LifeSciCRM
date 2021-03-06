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
    public function open($status=0)
    {
      $this->load->view('header');
      $this->load->view('logged');

      $this->load->database();
      $this->load->model('calls_model');

      switch ($this->session->userdata('level')) {
        case 'user':
                $data['openArray']=$this->calls_model->calls_list("user",$status);
            break;
        case 'team':
               $data['openArray']=$this->calls_model->calls_list("team",$status);
            break;
        case 'root':
               $data['openArray']=$this->calls_model->calls_list("root",$status);
            break;
      }
      
      $data['status']=$status;
      $this->load->view('calls/callsList',$data);

      $this->load->view('footer');
    }
    public function closed()
    {
      $this->open(1);
    }
    public function closeCall($id)
    {
      $this->load->database();
      $this->load->model('calls_model');
      $this->calls_model->close_call($id);
      $this->closed();
    }
}
?>