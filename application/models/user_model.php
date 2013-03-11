<?php
class User_model extends CI_Model {

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
                
        if ($query->num_rows() > 0) 
        {
            $sessionData['name'] =  $this->name ;
            $sessionData['id'] = $row->id ;
            $this->session->set_userdata($sessionData);
        }

    }

    function profile($id)
    {
        
        $profile_arr = array();

        $this->db->select('name');
        $this->db->where('id', $id); 
        $query = $this->db->get('users');
        $row = $query->row();

        if ($query->num_rows() > 0) 
        {
           $profile_arr['name'] = $row->name;
        }

        return $profile_arr;
    }

}
?>