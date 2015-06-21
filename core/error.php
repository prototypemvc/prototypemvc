<?php 

class error extends Controller {

	private $_error = null; 

	public function __construct($error){
		parent::__construct();
		$this->_error = $error;
	}

	public function index(){
		
		$data['title'] = '404';
		$data['error'] = $this->_error;
		
		view::load('error/view/404',$data);
	}

}
