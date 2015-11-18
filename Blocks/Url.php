<?php

namespace Prototypemvc\Blocks;

use \Prototypemvc\Blocks\Session;

class Url {

	/** 
    * Get the current url. 
    * Thanks Kremchik - http://stackoverflow.com/questions/6768793/get-the-full-url-in-php 
    * @return string the full current url 
    */ 
    public static function current() {
		
		return 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}";
	}

	/** 
    * Get the previous url. 
    * @return string the full previous url 
    */ 
	public static function previous() {

		if(!empty($_SERVER['HTTP_REFERER'])) {

			return $_SERVER['HTTP_REFERER'];
		}

		return false;
	}

	/** 
    * Redirect to page (set headers). 
    * @param string go to url 
    */ 
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
