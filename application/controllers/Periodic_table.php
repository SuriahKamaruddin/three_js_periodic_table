<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodic_table extends CI_Controller {

	public function index()
	{
		$post_var = $this->input->get();
		$first_name = $post_var['first_name'];
		$this->data['details'] = $first_name;
		$this->load->view('periodic_table_view',$this->data);
	}
}
