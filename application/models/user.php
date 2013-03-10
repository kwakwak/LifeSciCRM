<?php
class User extends CI_Model {

    var $name   = '';
    var $password = '';
    var $sessionData = Array();

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function login()
    {
        if (isset($_POST['name']))
            $this->name   = $_POST['name']; 
        if (isset($_POST['password']))
            $this->password = $_POST['password'];

        $this->db->select('name,password');
        $this->db->where('name', $this->name); 
        $this->db->where('password', $this->password);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            //Value exists in database
            $sessionData['logged'] = 1 ;
        } else {
            //Value doesn't exist in database
            $sessionData['logged'] = 0 ;
        }

        $this->session->set_userdata($sessionData);



    }

}
?>