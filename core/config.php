<?php

class config {

	private static $config = array(
		
		'root_dir' => '',
		'core' => array(
			'title' => 'my prototype project',
		),
		'database' => array(
			'example1' => array(
				'driver' => 'mysql',
				'name' => 'example1',
				'user' => '',
				'password' => '',
				'host' => ''
			),
		),
		'meta' => array(
			'charset' => 'UTF-8',
			'language' => 'nl',
		),
	);

	public static function get($item = false) {

		if($item && !empty(self::$config[$item])) {

			return self::$config[$item];
		} else if(!empty(self::$config)) {

			return self::$config;
		}

		return false;
	}

	public static function set($item = false, $value = false) {

		if($item & $value) {

			self::$config[$item] = $value;
			return true;
		}

		return false;
	}

}
