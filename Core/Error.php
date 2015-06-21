<?php

namespace Pmvc\Core;

use Pmvc\Core\Controller;
use \Pmvc\Core\view;

class Error extends Controller {

    private $_error = null;

    public function __construct($error) {
        parent::__construct();
        $this->_error = $error;
    }

    public function index() {

        $data['title'] = '404';
        $data['error'] = $this->_error;

        View::load('error/view/404', $data);
    }

}
