<?php

use PHPMailer\PHPMailer\PHPMailer;
require getcwd() . '/assets/phpmailer/vendor/autoload.php';
require getcwd() . '/assets/tcpdf/tcpdf.php'; 

defined('BASEPATH') OR exit('No direct script access allowed');	

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($show_error = false)
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->model("ModRetrieve");
			$regCtr = $this->ModRetrieve->get_reg_count();
			$firsttimer = $this->ModRetrieve->get_firsttimer();
			$notdgpart = $this->ModRetrieve->get_notpart_dg();
			$dgpart = $this->ModRetrieve->get_partdg();
			$lstfirsttimer = $this->ModRetrieve->get_all_firsttimer_woutdg();

			$data['regCtr'] = $regCtr;
			$data['firsttimer'] = $firsttimer;
			$data['notpartofdgroup'] = $notdgpart;
			$data['partofdgroup'] = $dgpart;
			$data['lstftimer'] = $lstfirsttimer;

			if($this->session->flashdata('show_error') !== NULL)
				$data['show_error'] = $this->session->flashdata('show_error');
			else
				$data['show_error'] = $show_error;

			$data['userdata'] = $this->session->userdata();
			$this->load->view('templates/admin/header', $data);
			$this->load->view('pages/admin/dashboard', $data);
			$this->load->view('templates/admin/footer');
		}
		else
		{
			$this->show_login();
		}
	}

	public function show_login($show_error = false)
	{
		$data['show_error'] = $show_error;
		if($this->session->flashdata('username') !== NULL)
			$data['username'] = $this->session->flashdata('username');
		else 
			$data['username'] = "";
		$this->load->view('pages/admin/login', $data);
	}

	public function reglist($show_error = false)
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->model("ModRetrieve");
			$allinfo = $this->ModRetrieve->get_all_info();
			$tsizes = $this->ModRetrieve->get_sizes();
			$satlist = $this->ModRetrieve->get_sat_list();
			if($this->session->flashdata('show_error') !== NULL)
				$data['show_error'] = $this->session->flashdata('show_error');
	
			$data['allinfo'] = $allinfo;
			$data['tsizelist'] = $tsizes;
			$data['satlist'] = $satlist;
			
			$data['userdata'] = $this->session->userdata();
			$this->load->view('templates/admin/header', $data);
			$this->load->view('pages/admin/reglist', $data);
			$this->load->view('templates/admin/footer');
		}
		else
		{
			$this->show_login();
		}
	}

	public function generalsettings($show_error = false)
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->model("ModRetrieve");
			$genset = $this->ModRetrieve->get_generalsettings();

			$data['genset'] = $genset[0];
			$data['userdata'] = $this->session->userdata();
			$this->load->view('templates/admin/header', $data);
			$this->load->view('pages/admin/generalsettings', $data);
			$this->load->view('templates/admin/footer');
		}
		else
		{
			$this->show_login();
		}
	}

	public function accountsettings($show_error = false)
	{
		if($this->session->userdata('is_logged_in'))
		{	
			//$data['genset'] = $genset[0];
			$data['userdata'] = $this->session->userdata();
			if($this->session->flashdata('show_error') !== NULL)
				$data['show_error'] = $this->session->flashdata('show_error');

			$this->load->model("ModRetrieve");
			$this->load->view('templates/admin/header',$data);
			$this->load->view('pages/admin/accountsettings', $data);
			$this->load->view('templates/admin/footer');
		}
		else
		{
			$this->show_login();
		}
	}

	public function update_password()
	{
		$txtoldpass = $this->input->post('txtoldpass');
		$txtnewpass = $this->input->post('txtnewpass');
		$txtconpass = $this->input->post('txtconpass');
		$username = $this->session->userdata('b1g_uname');

		$this->load->model("ModRetrieve");
		$this->load->model("ModUpdate");
		$confirmpass = $this->ModRetrieve->verify_password($username, $txtoldpass);
		if(is_bool($confirmpass))
		{	
			if($txtnewpass !== $txtconpass)
			{
				$this->session->set_flashdata('show_error', "PASS0002");
			}
			else
			{
				$id = $username = $this->session->userdata('b1g_user_id');
				$uptpass = $this->ModUpdate->update_password($id, $txtnewpass);
				if(is_bool($uptpass))
				{
					$this->session->set_flashdata('show_error', "PASS0001");			
				}
				else
				{
					$this->session->set_flashdata('show_error', $uptpass);			
				}	
			}
		}
		else
		{
			$this->session->set_flashdata('show_error', "LOG0002");
		}
		redirect('admin/accountsettings');


	}

	public function get_info()
	{
		$id = $this->input->post('id');
		$this->load->model("ModRetrieve");
		$info = $this->ModRetrieve->get_information($id);
		$data['info'] = $info[0];
		$this->load->view('pages/admin/showinfo', $data);
	}

	public function get_all_info()
	{
		$this->load->model("ModRetrieve");
		$data = $this->ModRetrieve->get_all_info();
		$arr['dataArr'] = $data;
		echo json_encode($arr);
	}

	public function get_image()
	{
		$id = $this->input->post('id');
		$this->load->model("ModRetrieve");
		$info = $this->ModRetrieve->get_image($id);
		$data['info'] = $info[0];
		$this->load->view('pages/admin/viewdepositslip', $data);
	}

	public function login()
	{
		$username = $this->input->post('txtusername');
		$password = $this->input->post('txtpassword');
		$this->load->model("ModRetrieve");	
		$chk_username = $this->ModRetrieve->verify_username($username);
		if($chk_username)
		{
			$chk_password = $this->ModRetrieve->verify_password($username, $password);
			if(is_bool($chk_password))
			{
				$userdata = $this->ModRetrieve->get_userdata($username, $password);
				if(is_array($userdata))
				{
					$this->set_session($userdata);
				}
				else
				{
					$show_error = "DB0001";
					$this->session->set_flashdata('username', $chk_password);
					$this->show_login($show_error);
				}
			}
			else if(is_string($chk_password))
			{
				$show_error = "LOG0002";
				$this->session->set_flashdata('username', $chk_password);
				$this->show_login($show_error);
			}
		}
		else
		{
			$show_error = "LOG0001";
			$this->show_login($show_error);
			
		}
	}

	public function set_session($data)
	{
		$userdata = array(
				'b1g_user_id'	=> $data['user_id'],
		        'b1g_uname'  	=> $data['username'],
		        'b1g_upass'     => $data['password'],
		        'b1g_fname'     => $data['full_name'],
		        'b1g_cno'		=> $data['contact_no'],
		        'b1g_email'		=> $data['email_address'],
		        'is_logged_in' 	=> TRUE,
		        'account_type'	=> $data['user_type']
		);
		$this->session->set_userdata($userdata);
		redirect('admin');
	}

	public function logout()
	{
		$this->session->sess_destroy();	
		$this->session->userdata = array();
		redirect('admin');
	}

	public function acknow_parti($id)
	{
		$this->load->model("ModUpdate");
		$this->load->model("ModRetrieve");
		$update_part_no = $this->ModUpdate->update_participant_no();
		$part_arr = $this->ModRetrieve->get_part_no();
		$emailinfo = $this->ModRetrieve->get_emailadd_name($id);
		$to = $emailinfo['eadd'];
		$name = $emailinfo['name'];

		$arr = array();
		if($update_part_no)
		{
			$part_no = $part_arr['prefix'] . sprintf('%03d', $part_arr['part_no']);
			$update = $this->ModUpdate->update_info($part_no,$id);
			if(is_bool($update))
			{
				if($this->email_pdf($to, $name, $part_no))
				{
					$this->session->set_flashdata('show_error', 'ACK0001');
				}
				else
				{
					$this->session->set_flashdata('show_error', 'MAIL0001');
				}
			}
			else if(is_string($update))
			{
				$this->session->set_flashdata('show_error', 'DB0003');	
			}
			
		}
		else
		{
			$this->session->set_flashdata('show_error', 'DB0003');	
		}
		redirect('admin/reglist');

	}
	
	public function delete_parti($id)
	{
		$this->load->model("ModUpdate");
		$delete_part = $this->ModUpdate->delete_parti($id);
		if($delete_part)
		{
			$this->session->set_flashdata('show_error', 'DEL0001');
		}
		else
		{
			$this->session->set_flashdata('show_error', $delete_part);	
		}
		redirect('admin/reglist');
	}

	public function email_pdf($to, $name, $partNo)
	{
		/* START OF ACKNOWLEDGEMENT RECEIPT */
			$filename = getcwd() . "/assets/output-pdf/" . $partNo . ".pdf";

			$height = 330;
			$width = 450;

			$pageLayout = array($height, $width);

			//$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
			$obj_pdf = new TCPDF('p', 'pt', $pageLayout, true, 'UTF-8', false);
			$obj_pdf->SetCreator(PDF_CREATOR);  
			$obj_pdf->SetTitle("Overcome acknowledgement Receipt");  
			$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
			$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
			$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
			$obj_pdf->SetDefaultMonospacedFont('helvetica');  
			$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
			$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
			$obj_pdf->setPrintHeader(false);  
			$obj_pdf->setPrintFooter(false);  
			$obj_pdf->SetAutoPageBreak(TRUE, 10);  
			$obj_pdf->SetFont('helvetica', '');  
			$obj_pdf->AddPage('L');  
			$obj_pdf->SetLineStyle( array( 'width' => 1, 'color' => array(0,0,0)));
			$obj_pdf->Rect(5,5, $obj_pdf->getPageWidth() - 10, $obj_pdf->getPageHeight() - 10);
			$logodir = getcwd() . '/assets/img/b1gsl-logo.png';

			date_default_timezone_set('Asia/Manila');
			$date = date('F d, Y');

			$content = '
				<div class="solid">
					<div align="center">
						<img src="' . $logodir .  '" style="padding-bottom:5px;"/>	
						<p style="font-size:8;">
							CCF Imus Cavite Worship Center, <br> 
							Km. 21 Aguinaldo Highway, Tanzang Luma V Imus, Cavite, 4103
						</p>
						<h1>ACKNOWLEDGEMENT RECEIPT </h1>
					</div>
					<table>
						<tr>
							<td>Date: <b><u>' . $date . '</u></b></td>
							<td>Receipt No: <b style="color:red;"><u>' . $partNo . '</u></b></td>
						</tr>
					</table>
					<p><b>Received from: </b> <i><u>' . $name . '</u></i> </p>
					<br>
					<p>
						This is to acknowledge the receipt of <b><i><u>Three Hundred (300) Pesos</u></i></b> <br>
						from <b><i><u>' . $name .  '</u></i></b> as a payment to <b>OVERCOME - Singles Event </b>
					</p>
					
					<div align="right">
					<br>
						<p><b>Received by: </b> <i><u>' . $this->session->userdata('b1g_fname') .  '</u></i></p>
					</div>
				</div>
			   ';
			$obj_pdf->writeHTML($content);  
			$obj_pdf->Output($filename, 'F');
		/* END OF ACKNOWLEDGEMENT RECEIPT */



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
						Payment has been successfully received!
						<br>
        				Please see acknowledgement receipt included in this mail. 
        				Your participant number is <b>' . $partNo . '</b>
        				<br>
        				Kindly take note of the following:
        				<ul>
        					<li>Print out this email. (hard copy or screenshot)</li>
        					<li>Show the printout or screenshot to the ushers at the
        					registration table upon entrance in the hall.
        					</li>
        					<li>Event kit will be given upon the event.</li>
        					<li>If you received this email within <b>October 15-19, 2018</b>, 
        					please expect the Event kit will not be given on the day of the event. 
        					The Event kit will be given to the B1G outreach representative after the event. 
        					</li>
        				<ul>
        				
        			</p>';
        $message .= '<p>
        				Thanks and God bless!
        				<h4><b>B1G South Luzon Servants</b></h4>
        			</p>';
        $message .= '</body></html>';

        $mail->addAttachment($filename);

		$mail->addReplyTo('b1gsouthluzon@gmail.com', 'No Reply');
		$mail->addAddress($to, $name);
		$mail->Subject = 'Overcome Registration';
		$mail->msgHTML($message);
		//$mail->AltBody = 'This is a plain-text message body';
		if (!$mail->send()) 
		{
		    return false;
		} 
		else 
		{
		    return true;
		}
		unlink($filename);
	}

	
}
