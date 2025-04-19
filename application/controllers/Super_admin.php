<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Super_admin extends CI_Controller {
	public function index()
	{
		$this->load->view('super/index');
	}
}