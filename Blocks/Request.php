<?php

namespace Prototypemvc\Blocks;

use \Curl\Curl;

class Request {

	public function delete($url = false, $params = false) {

		if($url) {

			if($params === false) {
				$params = array();
			}

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

	public function get($url = false, $params = false) {

		if($url) {

			if($params === false) {
				$params = array();
			}

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

	public function post($url = false, $params = false) {

		if($url) {

			if($params === false) {
				$params = array();
			}

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

	public function put($url = false, $params = false) {

		if($url) {

			if($params === false) {
				$params = array();
			}

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
