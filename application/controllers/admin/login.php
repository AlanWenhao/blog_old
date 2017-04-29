<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
	   $is_login = $_SESSION("isUserLogin");
	   if ($is_login) {
	   		redirect('/admin');
	   }
	}
	public function index()
	{
		echo '1';
	}
}