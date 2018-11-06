<?php
class ModRetrieve extends CI_Model
{
	
	/* START OF FRONTEND FUNCTIONS */
		public function get_info($id)
		{
			$sql = "SELECT * FROM tbl_info WHERE Info_Id = '$id'";
			if($query=$this->db->query($sql))
			{
				$result = $query->result_array();
				return $result;
			}
		}

		public function get_all_info()
		{
			$sql = "SELECT  
						a.info_id,
						a.participant_no,
						a.full_name,
						a.gender,
						a.contact_no,
						a.address,
						a.email_address,
					    a.is_first_time,
                        a.is_part_dg,	
					    b.sat_name,
					    a.dgroup_leader,
						a.date_registered,
                        c.size_abbre,
                        c.size_name
					FROM tbl_info a
					JOIN tbl_satellites b
						ON a.sat_id = b.sat_id
					JOIN tbl_tsize c
						ON a.tshirt_size = c.id";
			if($query=$this->db->query($sql))
			{
				$result = $query->result_array();
				return $result;
			}
		}

		//Get Satellite list for registration
		public function get_sat_list()
		{
			$sql = "SELECT sat_id, sat_name FROM tbl_satellites";
			if($query = $this->db->query($sql))
			{
				$result = $query->result_array();
				return $result;
			}
		}

		public function get_sizes()
		{
			$sql = "SELECT * FROM tbl_tsize ORDER BY id"; 
			if($query = $this->db->query($sql))
			{
				$result = $query->result_array();
				return $result;
			}
		}

		public function get_b1ginfo()
		{
			$sql = "SELECT 
						complete_address as Address, 
						map_link As Map,
						email_address as EAdd,
						ig_page as IG,
						fb_page as FB, 
						telephone as Tel
					FROM tbl_b1ginfo where cinfo_id = 1"; 
			if($query = $this->db->query($sql))
			{
				$result = $query->result_array();
				return $result;
			}
		}
	/* END OF FRONTEND FUNCTIONS */


	/* START OF ADMIN FUNCTIONS */ 
		public function get_reg_count()
		{
			$sql = "SELECT COUNT(*) AS RegCtr FROM tbl_info";
			if($query = $this->db->query($sql))
			{
				$result = $query->result_array();
				return $result[0]['RegCtr'];
			}
		}

		public function get_firsttimer()
		{
			$sql = "SELECT COUNT(*) AS RegCtr FROM tbl_info
					WHERE is_first_time = 1";
			if($query = $this->db->query($sql))
			{
				$result = $query->result_array();
				return $result[0]['RegCtr'];
			}
		}

		public function get_notpart_dg()
		{
			$sql = "SELECT COUNT(*) AS RegCtr FROM tbl_info
					WHERE is_part_dg = 0";
			if($query = $this->db->query($sql))
			{
				$result = $query->result_array();
				return $result[0]['RegCtr'];
			}
		}

		public function get_partdg()
		{
			$sql = "SELECT COUNT(*) AS RegCtr FROM tbl_info
					WHERE is_part_dg = 1";
			if($query = $this->db->query($sql))
			{
				$result = $query->result_array();
				return $result[0]['RegCtr'];
			}
		}

		public function get_information($id)
		{
			$sql = "SELECT  
						a.info_id,
						a.participant_no,
						a.full_name,
						a.gender,
						a.contact_no,
						a.address,
						a.email_address,
					    a.is_first_time,
                        a.is_part_dg,	
					    b.sat_name,
					    a.dgroup_leader,
						a.date_registered,
                        c.size_abbre,
                        c.size_name
					FROM tbl_info a
					JOIN tbl_satellites b
						ON a.sat_id = b.sat_id
					JOIN tbl_tsize c
						ON a.tshirt_size = c.id
					WHERE 
						a.info_id = '$id';";
			if($query=$this->db->query($sql))
			{
				$result = $query->result_array();
				return $result;
			}
		}

		public function get_image($id)
		{
			$sql = "SELECT  
						a.info_id,
						a.deposit_slip,
						a.deposit_slip_filename
					FROM tbl_info a
					WHERE a.info_id = '$id'";
			if($query=$this->db->query($sql))
			{
				$result = $query->result_array();
				return $result;
			}
		}

		public function get_all_firsttimer_woutdg()
		{
			$sql = "SELECT  
						a.info_id,
						a.participant_no,
						a.full_name,
						a.gender,
						a.contact_no,
						a.address,
						a.email_address,
					    a.is_first_time,
                        a.is_part_dg,	
					    b.sat_name,
					    a.dgroup_leader,
						a.date_registered,
                        c.size_abbre,
                        c.size_name
					FROM tbl_info a
					JOIN tbl_satellites b
						ON a.sat_id = b.sat_id
					JOIN tbl_tsize c
						ON a.tshirt_size = c.id
					WHERE a.Is_first_time = 1
						AND
					a.Is_part_dg = 0";
			if($query=$this->db->query($sql))
			{
				$result = $query->result_array();
				return $result;
			}
		}

		public function get_all_withoutdg()
		{
			$sql = "SELECT  
						a.info_id,
						a.participant_no,
						a.full_name,
						a.gender,
						a.contact_no,
						a.address,
						a.email_address,
					    a.is_first_time,
                        a.is_part_dg,	
					    b.sat_name,
					    a.dgroup_leader,
						a.date_registered,
                        c.size_abbre,
                        c.size_name
					FROM tbl_info a
					JOIN tbl_satellites b
						ON a.sat_id = b.sat_id
					JOIN tbl_tsize c
						ON a.tshirt_size = c.id
					WHERE a.Is_part_dg = 0";
			if($query=$this->db->query($sql))
			{
				$result = $query->result_array();
				return $result;
			}
		}

		public function get_generalsettings()
		{
			$sql = "SELECT * FROM tbl_b1ginfo";
			if($query=$this->db->query($sql))
			{
				$result = $query->result_array();
				return $result;
			}
		}

		public function verify_username($username)
		{
			$sql = "SELECT COUNT(*) AS myCtr FROM tbl_userlogin WHERE username = '$username'";
			if($query = $this->db->query($sql))
			{
				$result = $query->result_array();

				if($result[0]['myCtr'] > 0)
					return true;
				else if($result[0]['myCtr'] == 0)
					return false;
			}
		}

		public function verify_password($username, $password)
		{
			$sql = "SELECT COUNT(*) AS myCtr FROM tbl_userlogin 
					WHERE 
						username = '$username' 
						AND 
						password = '$password'
					";
			if($query = $this->db->query($sql))
			{
				$result = $query->result_array();
				if($result[0]['myCtr'] > 0)
					return true;
				else if($result[0]['myCtr'] == 0)
					return $username;
			}
		}

		public function get_userdata($username, $password)
		{
			$sql = "SELECT * FROM tbl_userlogin
					WHERE 
						username = '$username' 
						AND 
						password = '$password'
					";
			if($query=$this->db->query($sql))
			{
				$result = $query->result_array();
				return $result[0];
			}
			else
			{
				return false;
			}

		}

		public function get_emailadd_name($id)
		{
			$sql = "SELECT 
						email_address as eadd, 
						full_name as name
					FROM tbl_info WHERE info_id = '$id'";
			if($query=$this->db->query($sql))
			{
				$result = $query->result_array();
				return $result[0];
			}
		}

		public function get_part_no()
		{
			$sql = "SELECT 
						no_of_participants as part_no,
						participants_prefix as prefix
					FROM tbl_participatno WHERE id = 1";
			if($query=$this->db->query($sql))
			{
				$result = $query->result_array();
				return $result[0];
			}
		}

	/* END OF ADMIN FUNCTIONS */

	public function get_info_byid($id)
	{
		$sql = "SELECT  
					a.info_id,
					a.participant_no,
					a.full_name,
					a.gender,
					a.contact_no,
					a.address,
					a.email_address,
				    a.is_first_time,
                    a.is_part_dg,	
				    b.sat_name,
				    a.dgroup_leader,
					a.date_registered,
                    c.size_abbre,
                    c.size_name
				FROM tbl_info a
				JOIN tbl_satellites b
					ON a.sat_id = b.sat_id
				JOIN tbl_tsize c
					ON a.tshirt_size = c.id
				WHERE 
					a.info_id = '$id';";
		if($query=$this->db->query($sql))
		{
			$result = $query->result_array();
			return $result;
		}
	}
}
?>