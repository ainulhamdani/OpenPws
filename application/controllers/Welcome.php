<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();

		if(empty($this->session->userdata('id_user'))&&$this->session->userdata('admin_valid') == FALSE) {
			$this->session->set_flashdata('flash_data', 'You don\'t have access!');
			$this->session->set_flashdata('url', $this->uri->uri_string);
			redirect('login');
		}
	}

	public function index()	{
		redirect("home");
	}

	public function logout() {
		$this->session->sess_destroy();
		//$this->SiteAnalyticsModel->trackPage($this->uri->rsegment(1),$this->uri->rsegment(2),base_url().$this->uri->uri_string);
		redirect('login');
	}
}
