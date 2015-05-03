<?php

class view {

	const path_css = '/css/';
	const path_js = '/js/';
	const path_modules = '/../modules/';

	public static function css($file = false) {;

		if($file && !text::contains($file, '.css')) {
			$file .= '.css';
		}

		if($file && file::isFile(config::get('root_dir') . self::path_css . $file)) {

			echo '<style>';
			require config::get('root_dir') . self::path_css . $file;
			echo '</style>';
			return true;
		}

		return false;
	}

	public static function load($file = false, $data = false) {

		if($file && !text::contains($file, '.php')) {
			$file .= '.php';
		}

		$path = config::get('root_dir');
		if($file && text::contains($file, '/')) {

			$path .= self::path_modules;
		} else {
			$path .= '/';
		}

		if($file && file::isFile($path . $file)) {

			require $path . $file;
			return true;
		}

		return false;
	}

	public static function js($file = false) {

		if($file && !text::contains($file, '.js')) {
			$file .= '.js';
		}

		if($file && file::isFile(config::get('root_dir') . self::path_js . $file)) {

			echo '<script>';
			require config::get('root_dir') . self::path_js . $file;
			echo '</script>';
			return true;
		}

		return false;
	}

	public static function json($input = false, $exit = true) {

		if($input) {

			echo format::toJson($input);
			if($exit) {
				
				exit();
			}
		}

		return false;
	}

}
