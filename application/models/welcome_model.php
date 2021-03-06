<?php
class Welcome_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function login()
    {
        $hashPass = do_hash($_POST['password'], 'md5');
        $this->db->select('id,name,level');
        $this->db->where('name', $_POST['name']); 
        $this->db->where('password', $hashPass);
        $query = $this->db->get('users');
        $row = $query->row();
                
        if ($query->num_rows() > 0) 
        {
            $sessionData['id'] = $row->id ;
            $sessionData['name'] = $row->name ;
            switch ($row->level) {
                case 0:
                    $sessionData['level'] = 'user' ;
                    break;
                case 1:
                    $sessionData['level'] = 'team' ;
                    break;
                case 2:
                    $sessionData['level'] = 'root' ;
                    break;
            }

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
        $sessionData['level'] = 'user';
        $sessionData['name'] =$_POST['name'];
        $this->session->set_userdata($sessionData);
    }
}
?>