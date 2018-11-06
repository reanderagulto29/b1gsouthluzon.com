<?php
class ModUpdate extends CI_Model
{
	public function update_participant_no()
	{
		$sql = "UPDATE tbl_participatno SET
					no_of_participants = no_of_participants + 1
				WHERE id = 1; 
			   ";
		if($query=$this->db->query($sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function update_info($partNo, $id)
	{
		date_default_timezone_set('Asia/Manila');
		$date = date('Y-m-d H:i:s');
		$dataArr = array(
					'participant_no' => $partNo,
					'is_acknow'		 => 1,
					'date_acknow'	 => $date
				);
		$this->db->where('info_id', $id);
		$this->db->update('tbl_info', $dataArr); 

		if($this->db->affected_rows() > 0)
		{
			return true; //Error Code
		}      
		else
		{
			return "DB0002"; //Error Code
		}
	}
	
	public function delete_parti($id)
	{
		$this->db->delete('tbl_info', array('info_id' => $id));
		if($this->db->affected_rows() > 0)
		{
			return true; //Error Code
		}      
		else
		{
			return "DB0004"; //Error Code
		}
	}

	public function update_password($id, $newpass)
	{
		$dataArr = array(
					'password'   => $newpass
				);
		$this->db->where('user_id', $id);
		$this->db->update('tbl_userlogin', $dataArr); 
		if($this->db->affected_rows() > 0)
		{
			return true; //Error Code
		}      
		else
		{
			return "DB0002"; //Error Code
		}

	}
}

?>