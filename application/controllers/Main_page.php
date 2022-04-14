<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_page extends CI_Controller {

	public function index()
	{
		$this->load->view('main_page_view');
	}
}
