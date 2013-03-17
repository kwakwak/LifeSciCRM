<?php
class Calls_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function open()
    {
    			$this->db->where('user_id',$this->session->userdata('id'));
    			$this->db->where('status',0);
    	return  $this->db->get('calls')->result();
    }
}
?>