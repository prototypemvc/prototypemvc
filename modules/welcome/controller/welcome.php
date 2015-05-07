<?php

class welcome extends controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$data['title'] = 'welcome';

		view::load('header.php', $data);
		view::load('welcome/view/welcome', $data);
		view::load('footer.php');
	}

	public function css(){

		$data['title'] = 'welcome';
	
		view::css('test');
		view::load('header.php', $data);
		view::load('welcome/view/welcome', $data);
		view::load('footer.php');
	}

	public function javascript(){

		$data['title'] = 'welcome';
	
		view::load('header.php', $data);
		view::load('welcome/view/welcome', $data);
		view::load('footer.php');
		view::js('test');
	}

	public function json(){

		$Welcome = model::load('welcome/model/welcome_model');

		$array = $Welcome->getArray();
	
		view::json($array);
	}

	public function load(){

		$data['title'] = 'welcome';

		$Welcome = load::model('welcome/model/welcome_model');

		data::pre($Welcome->getArray());
	
		load::css('test');
		load::view('header.php', $data);
		load::view('welcome/view/welcome', $data);
		load::view('footer.php');
		load::js('test');
	}
	
}
