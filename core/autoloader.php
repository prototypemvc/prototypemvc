<?php 

class autoloader {

	static $folders = array(
		'core' => '../core/',
		'helpers' => '../helpers/'
	);

	public static function load($class) {

		foreach(self::$folders as $folder => $path) {

			$file = $path . strtolower($class) . '.php';
			if(file_exists($file)) {
				require $file;
				continue;
			}	
		}
	}

}
