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
        $this->db->select('id');
        $this->db->where('name', $_POST['name']); 
        $this->db->where('password', $hashPass);
        $query = $this->db->get('users');
        $row = $query->row();
                
        if ($query->num_rows() > 0) 
        {
            $sessionData['id'] = $row->id ;

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
        $this->session->set_userdata($sessionData);
        $this->user_level_check();
    }

    function user_level_check()
    {
        $this->db->select('level,name');
        $this->db->where('id', $this->session->userdata('id'));
        $query = $this->db->get('users');
        $row = $query->row();
                
        if ($query->num_rows() > 0) 
        {
            
            $sessionData['name'] = $row->name ;
            
            switch ($row->level) {
                case 0:
                    $sessionData['level'] = 'user' ;
                    $this->session->set_userdata($sessionData);
                    redirect('user');
                    break;
                case 1:
                    $sessionData['level'] = 'team' ;
                    $this->session->set_userdata($sessionData);
                    redirect('team');
                    break;
                case 2:
                    $sessionData['level'] = 'root' ;
                    $this->session->set_userdata($sessionData);
                    redirect('root');
                    break;
            }


        }
 
    }

}
?>