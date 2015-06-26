<?php

namespace Pmvc\Helpers;

use \Pmvc\Helpers\Session;

class Url {

    public static function current() {
		// thanks Kremchik, http://stackoverflow.com/questions/6768793/get-the-full-url-in-php
		return 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}";
	}
	public static function previous() {

		if(!empty($_SERVER['HTTP_REFERER'])) {

			return $_SERVER['HTTP_REFERER'];
		}

		return false;
	}
	public static function redirect($url = false){
		
		if($url) {

			if(strpos($url,'http') === false && strpos($url,'https') === false) {
				$url = BASE_URL . $url;
			}

			header('Location: ' . $url);
			exit;
		}

		return false;
	}

}
