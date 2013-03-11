<?php
class User_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function profile($id)
    {
        
        $profile_arr = array();

        $this->db->select('phone,building,room_num,email');
        $this->db->where('id', $id); 
        $query = $this->db->get('users');
        $row = $query->row();

        if ($query->num_rows() > 0) 
        {
           $profile_arr['phone'] = $row->phone;
           $profile_arr['building'] = $row->building;
           $profile_arr['room_num'] = $row->room_num;
           $profile_arr['email'] = $row->email;
        }

        return $profile_arr;
    }
  }
  ?>