<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodic_table extends CI_Controller {

	public function index()
	{
		$this->load->view('periodic_table_view');
	}
}
