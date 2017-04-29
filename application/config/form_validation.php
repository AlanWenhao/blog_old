<?php

$config = array(
	'article'   =>  array(
			array(
				'field' => 'type',
				'label' => '文章标题',
				'rules' => 'required|min_length[2]'
				),
			array(
				'field' => 'title',
				'label' => '标题',
				'rules' => 'required|min_length[1]'
				),
			array(
				'field' => 'info',
				'label' => '摘要',
				'rules' => 'required|max_length[140]'
				),
			array(
				'field' => 'content',
				'label' => '内容',
				'rules' => 'required|max_length[2000]'
				)
			)
	);