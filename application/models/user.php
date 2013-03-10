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
        $this->name   = $_POST['name']; 
        $this->password = $_POST['password'];

        $this->db->select('id');
        $this->db->where('name', $this->name); 
        $this->db->where('password', $this->password);
        $query = $this->db->get('users');
        $row = $query->row();
                
        if ($query->num_rows() > 0) {
            //Value exists in database
            $sessionData['logged'] = 1 ;
            $sessionData['name'] =  $this->name ;
            $sessionData['id'] = $row->id ;
        } else {
            //Value doesn't exist in database
            $sessionData['logged'] = 0 ;
        }
        $this->session->set_userdata($sessionData);
    }

    function info($id)
    {
        $this->db->select('name,password');
        $this->db->where('id', $id); 
        $query = $this->db->get('users');
        var_dump($query->result());
    }

}
?>