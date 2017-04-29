<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*文章管理模型
*/
class Article_model extends CI_Model{
	/**
	*发表文章
	*/
	public function add($data){
		$this->db->insert('article', $data);
	}

	public function check_article(){
		$data = $this->db->select('ID, title, type, time')->from('article')->get()->result_array();
		return $data;
	}

	public function check(){
		$data = $this->db->get('article')->result_array();
		return $data;
	}
}