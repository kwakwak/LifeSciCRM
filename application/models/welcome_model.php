<?php
class Welcome_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function login($level)
    {
        $hashPass = do_hash($_POST['password'], 'md5');
        $this->db->select('id,name');
        $this->db->where('name', $_POST['name']); 
        $this->db->where('password', $hashPass);
        if ($level=='Team')
            $this->db->where('level', 1);
        if ($level=='User')
            $this->db->where('level', 0);
        $query = $this->db->get('users');
        $row = $query->row();
                
        if ($query->num_rows() > 0) 
        {
            $sessionData['id'] = $row->id ;
            $sessionData['name'] = $row->name ;
            $sessionData['level'] = $level ;
            $this->session->set_userdata($sessionData);
            return TRUE;
        }
        else
            return FALSE;
    }

    function new_user()
    {

        $data = array(
                   'name' => $_POST['name'] ,
                   'password' => $_POST['password'] ,
                   'email' => $_POST['email'] ,
                   'phone' => $_POST['phone'] ,
                   'room_num' => $_POST['room_num'] ,
                   'building' => $_POST['building'] ,
                );
        $this->db->insert('users', $data); 
        $sessionData['id'] = $this->db->insert_id();
        $sessionData['name'] = $_POST['name'];
        $this->session->set_userdata($sessionData);
    
    }

}
?>