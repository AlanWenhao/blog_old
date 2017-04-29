<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller{
	/**
	 * 查看文章
	 */
	public function index(){
		$this->load->model('article_model', 'art');
		$data['article'] = $this->art->check_article();
		
		$this->load->view('admin/check_article.html', $data);
	}
	/**
	 * 发表文章
	 */
	public function send_article(){
		$this->load->model('article_model', 'art');
		$data['article'] = $this->art->check();
		$this->load->helper('form');
		$this->load->view('admin/article.html');
	}

	/**
	* 发布文章
	*/
	public function send(){
		//文件上传------------------------
		//配置
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_width'] = '2400';
		// $config['max_height'] = '1920';
		// $config['max_size'] = '10000';
		
		// 载入上传类
		// $this->load->library('upload', $config);

		// $this->upload->do_upload('表单名');


		$config['file_name'] = time() . mt_rand(1000,9999);
		// 载入表单验证类
		$this->load->library('form_validation');
		// 执行
		$stutas = $this->form_validation->run('article');
		
		if($stutas){
			$this->load->model('article_model', 'art');
			
			$data = array(
				'type' => $this->input->post('type'),
				'title' => $this->input->post('title'),
				'time' => $this->input->post('time'),
				'writer' => $this->input->post('writer'),
				'info' => $this->input->post('info'),
				'content' => $this->input->post('content')
				);
			$this->art->add($data);
		}else {
			$this->load->helper('form');
			$this->load->view('admin/article.html');
		}
	}

	/**
	* 编辑文章
	*/
	public function edit_article(){
		$this->load->helper('form');
		$this->load->view('admin/edit_article.html');
	}

	/**
	* 编辑动作
	*/
	public function edit(){
		// 载入表单验证类
		$this->load->library('form_validation');
		// 执行
		$stutas = $this->form_validation->run('article');
 
		if($stutas){
			echo '数据库操作';
		}else {
			$this->load->helper('form');
			$this->load->view('admin/article.html');
		}
	}
}