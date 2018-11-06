<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

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
		$this->load->model("ModRetrieve");
		$sat_list = $this->ModRetrieve->get_sat_list();
		$tsize_list = $this->ModRetrieve->get_sizes();
		$b1ginfo = $this->ModRetrieve->get_b1ginfo();
		
		if($this->session->flashdata('show_error') !== NULL)
			$data['show_error'] = $this->session->flashdata('show_error');
		else
			$data['show_error'] = $show_error;
			
		if($this->session->flashdata('last_id') !== NULL)	
			$data['last_id'] = $this->session->flashdata('last_id');
		else
			$data['last_id'] = 0;
		
		$data['satlist'] = $sat_list;
		$data['tsizelist'] = $tsize_list;
		$data['b1ginfo'] = $b1ginfo;
		$this->load->view('templates/frontend/header');
		$this->load->view('templates/frontend/sidebar');
		$this->load->view('pages/frontend/dashboard', $data);
		$this->load->view('templates/frontend/footer', $data);
	}
}
