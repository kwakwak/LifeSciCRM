<?php
class Calls_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function calls_list($level,$status)
    {
        if ($level=="user")
    			$this->db->where('user_id',$this->session->userdata('id'));
            elseif ($level=="team")
                $this->db->where('team_id',$this->session->userdata('id'));
    	    if ($status==0)
        		$this->db->where('status',0);
            elseif ($status==1)
                $this->db->where('status',1);
    	return  $this->db->get('calls')->result();
    }
    function close_call($id)
    {
        $data['status']=1;
        $this->db->where('id', $id);
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->update('calls', $data); 
    }

}
?>