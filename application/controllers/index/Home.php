<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('index/home.html');
	}

	public function blog()
	{
		$this->load->view('index/blog.html');
	}

	public function homePage()
	{
		$this->load->view('index/home.html');
	}

	public function article()
	{
		$this->load->view('index/article.html');
	}
}
