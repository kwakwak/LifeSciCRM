<?php
class Root_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function getUsers()
    {
    	return  $this->db->get('users')->result();
    }
}
?>