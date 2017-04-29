<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		$this->load->library('session');
	   if (! $this->session->isUserLogin) {
	   		redirect('/admin/login');
	   }
	}
	public function index()
	{
		$this->load->view('admin/index.html');
	}

	public function welcome()
	{
		$this->load->view('admin/welcome.html');
	}
}