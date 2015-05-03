<?php 

class model {

	const path_modules = '../modules/';

	public static function load($model = false) {

		if($model && file::isFile(self::path_modules . $model . '.php')) {

			$modelName = end(explode('/',$model));

			require self::path_modules . $model . '.php';
			
			return new $modelName();
		}

		return false;
	}

}
