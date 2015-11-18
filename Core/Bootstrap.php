<?php

namespace Prototypemvc\Core;

use \Prototypemvc\Blocks\Session;

class Bootstrap {

    private $_url_args;
    private $_url_controller;
    private $_url_method;

    private $_controller = NULL;
    private $_defaultController;

    public function __construct() {
        //bypass namespaces?
        if(Config::get('namespaces') !== null && Config::get('namespaces') === false) {
            LazyLoad::on();
        }
        
        //start the session class
        Session::init();

        //sets the protected url
        $this->_getUrl();
    }

    public function setController($name) {
        $this->_defaultController = $name;
    }

    public function init() {

        //if no page requested set default controller
        if (!empty($this->_url_controller)) {
            $this->_loadExistingController();
            $this->_callControllerMethod();
        } else {
            $this->_loadDefaultController();
            return false;
        }
    }

    protected function _getUrl() {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : NULL;
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $parts = explode('/',$url);
        $parts = array_filter($parts);

        $this->_url_controller = ($c = array_shift($parts))? $c: false;
        $this->_url_method = ($c = array_shift($parts))? $c: 'index';
        $this->_url_args = (isset($parts[0])) ? $parts : array();
    }

    protected function _loadDefaultController() {
        require '../modules/' . $this->_defaultController . '/controller/' . $this->_defaultController . '.php';
        $this->_controller = new $this->_defaultController();
        $this->_controller->index();
    }

    protected function _loadExistingController() {

        //set url for controllers
        $file = '../modules/' . $this->_url_controller. '/controller/' . $this->_url_controller . '.php';

        if (file_exists($file)) {
            require $file;

            if(class_exists($this->_url_controller)) {
                //instatiate controller
                $this->_controller = new $this->_url_controller;
            } else {
                $this->_error("Controller does not exist: " . $this->_url_controller);
                return false;
            }
        } else {
            $this->_error("File does not exist: " . $this->_url_controller);
            return false;
        }
    }

    /**
     * If a method is passed in the GET url paremter
     */
    protected function _callControllerMethod() {

        // Make sure the controller we are calling exists
        if (!isset($this->_controller) || !is_object($this->_controller)) {
            $this->_error("Controller does not exist: " . $this->_url_controller);
            return false;
        }

        // Make sure the method we are calling exists
        if (!method_exists($this->_controller, $this->_url_method)) {
            $this->_error("Method does not exist: " . $this->_url_method);
            return false;
        }

        call_user_func_array(array($this->_controller, $this->_url_method), $this->_url_args);
    }

    /**
     * Display an error page if nothing exists
     * 
     * @return boolean
     */
    protected function _error($error) {
        die($error);
    }

}
