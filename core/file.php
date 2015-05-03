<?php 

class file {

	public static function clear($file = false) {

		if($file && self::isFile($file)) {

			$f = @fopen($file, "r+");
			if ($f !== false) {
			    ftruncate($f, 0);
			    fclose($f);

			    return true;
			}
		}

		return false;
	}

	public static function extension($file = false) {

		return pathinfo($file, PATHINFO_EXTENSION);
	}

	public static function get($file = false) {

		if($file && self::isFile($file)) {

			return file_get_contents($file);
		}

		return $file;
	}

	public static function isFile($file = false) {

		if($file && is_file($file)) {

			return true;
		}

		return false;
	}

	public static function size($file = false, $format = 'bytes') {

		if($file && self::isFile($file)) {
			
			$filesize = filesize($file);

			switch ($format) {
				case 'bytes':
					return $filesize;
					break;
				case 'kb':
					return number::round(($filesize / 1024),2);
					break;
				case 'mb':
					return number::round(($filesize / 1048576),2);
					break;
			}
		}

		return false;
	}
	
}
