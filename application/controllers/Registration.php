<?php

use PHPMailer\PHPMailer\PHPMailer;
require getcwd() . '/assets/phpmailer/vendor/autoload.php';

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller 
{
	public function add_participants()
	{
		if(
			(isset($_POST["txtname"]) && !empty($_POST["txtname"])) &&
			(isset($_POST["gender"]) && !empty($_POST["gender"])) &&
			(isset($_POST["txtcno"]) && !empty($_POST["txtcno"])) &&
			(isset($_POST["attend"]) && !empty($_POST["attend"])) && 
			(isset($_FILES["deposit"]))
		  )
		{
			$this->load->model("ModInsert");	

			$name = $this->input->post("txtname");
			$gender = $this->input->post("gender");
			$contact = $this->input->post("txtcno");
			$firsttime = $this->input->post("attend");
			$dgpart = $this->input->post("dpart");
			$address = $this->input->post("txtadd");
			$email = $this->input->post("txtemail");
			$invitedby = "";
			$isfirsttime = preg_match('/[Yy][Ee][Ss]/', $firsttime) ? 1 : 0;
			$isdgpart = preg_match('/[Yy][Ee][Ss]/', $dgpart) ? 1 : 0;

			if(preg_match('/[Yy][Ee][Ss]/', $dgpart))
				$satellite = $this->input->post("selSatellite");
			else
				$satellite = 1;

			if(preg_match('/[Yy][Ee][Ss]/', $firsttime) && preg_match('/[Nn][Oo]/', $dgpart))
				$invitedby = $this->input->post("txtinvitedby");

			$dgl = $this->input->post("dgroupleader");
			$size = $this->input->post("selSizes");

			$filename = $_FILES['deposit']["name"];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$show_error = "";			

			if(isset($_FILES['deposit']) && $_FILES['deposit']["error"] == 0)
			{
				$fileurl = getcwd() . '/assets/img/';
				$newfile = strtolower(str_replace(' ', '', $name)) . '.' . $ext;
			    move_uploaded_file($_FILES['deposit']["tmp_name"], $fileurl . $newfile);
				$dataArr = array(
									"full_name"         	=> $name,
									"gender"            	=> $gender,
									"contact_no"        	=> $contact,
									"email_address"			=> $email,
									"address"				=> $address,
									"deposit_slip_filename" => $newfile, 
									"tshirt_size"			=> $size,
									"deposit_slip"			=> file_get_contents($fileurl . $newfile),
									"is_first_time" 		=> $isfirsttime,
									"is_part_dg" 			=> $isdgpart,
									"sat_id"				=> $satellite,
									"dgroup_leader"			=> $dgl
								 );	

				$result = $this->ModInsert->add_participants($dataArr);
				if(is_numeric($result))
				{
					$show_error = "REG0001";
				}
				else
				{
					$show_error = $result;
				}
				unlink($fileurl . $newfile);
			}		

			$this->email($email, $name);
			$this->session->set_flashdata('show_error', $show_error);
			redirect("index.php#register");
			
			
		}
		else
		{
			redirect("index.php");
		}
	}

	public function email($to, $name)
	{

		/* 
			Email Settings 
			Comment $mail->isSMTP();
			Set $mail->SMTPDebug = 0; 

		*/
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = "b1gsouthluzon@gmail.com";
			$mail->Password = "SinglesM123";
			$mail->setFrom('b1gsouthluzon@gmail.com', 'B1G South Luzon Servants');
		/* End of Email Settings*/

		// Compose a simple HTML email message
        $message = '<html><body>';
        $message .= '<h3>Hi ' . $name .  '</h3>';
		$message .= '<p>
						Thank you for registering to <b>Overcome - Singles Event!</b>
						<br>
        				We will send you a confirmation email within 3 days with the acknowledgement 
        				receipt as proof that we received your payment successfully.
        				<br>
        				If you haven\'t received any email after the 3rd day from the date of this mail, you may contact us on this email address <br> 
        				<b><i> b1gsouthluzon@gmail.com</i></b> with email subject: <br>
        				<b><i> [FOLLOW-UP] SURNAME-FIRSTNAME </i></b>
        			</p>';
        $message .= '<p>
        				Thanks and God bless!
        				<h4><b>B1G South Luzon Servants</b></h4>
        			</p>';
        $message .= '</body></html>';

		$mail->addReplyTo('b1gsouthluzon@gmail.com', 'No Reply');
		$mail->addAddress($to, $name);
		$mail->Subject = 'Overcome Registration';
		$mail->msgHTML($message);
		//$mail->AltBody = 'This is a plain-text message body';
		if (!$mail->send()) 
		{
		    
		} 
		else 
		{
		    
		}
	}

	public function get_info()
	{
		$this->load->model("ModRetrieve");
		//$info = $this->ModRetrieve->get_all_info();

		//$arr['dataArr'] = $info;
		$arr['regctr'] = $this->ModRetrieve->get_reg_count();
		$arr['firstimer'] = $this->ModRetrieve->get_firsttimer();
		$arr['nodgroup'] = $this->ModRetrieve->get_notpart_dg();
		$arr['wdgroup'] = $this->ModRetrieve->get_partdg();
		echo json_encode($arr);
	}
}

?>