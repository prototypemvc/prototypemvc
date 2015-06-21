<?php 

class load {

	public static function css($file = false) {

		return view::css($file);
	}

	public static function file($file = false) {

		return file::get($file);
	}

	public static function js($file = false) {

		return view::js($file);
	}

	public static function model($file = false) {

		return model::load($file);
	}

	public static function view($file = false) {

		return view::load($file);
	}
	
}
