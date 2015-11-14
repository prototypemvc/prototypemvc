<?php

namespace Prototypemvc\Helpers;

use \Curl\Curl;

class Url {

	public function delete($url = false, array $params) {

		if($url) {

			$curl = new Curl();
			$curl->delete($url, $params);

			if ($curl->error) {
			    return $curl->errorCode . ': ' . $curl->errorMessage;
			}
			else {
			    return $curl->response;
			}
		}

		return false;
	}

	public function get($url = false, array $params) {

		if($url) {

			$curl = new Curl();
			$curl->get($url, $params);

			if ($curl->error) {
			    return $curl->errorCode . ': ' . $curl->errorMessage;
			}
			else {
			    return $curl->response;
			}
		}

		return false;
	}

	public function post($url = false, array $params) {

		if($url) {

			$curl = new Curl();
			$curl->post($url, $params);

			if ($curl->error) {
			    return $curl->errorCode . ': ' . $curl->errorMessage;
			}
			else {
			    return $curl->response;
			}
		}

		return false;
	}

	public function put($url = false, array $params) {

		if($url) {

			$curl = new Curl();
			$curl->put($url, $params);

			if ($curl->error) {
			    return $curl->errorCode . ': ' . $curl->errorMessage;
			}
			else {
			    return $curl->response;
			}
		}

		return false;
	}

}
