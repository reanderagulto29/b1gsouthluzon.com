<?php
class ModInsert extends CI_Model
{
	public function add_participants($data)
	{
		$this->db->insert('tbl_info', $data);
		if($this->db->affected_rows() > 0)
	    {
	    	return $this->db->insert_id(); //Success 
	    }
	    else
	    {
	    	return "DB0002"; //Error Code
	    }
	}
}
?>