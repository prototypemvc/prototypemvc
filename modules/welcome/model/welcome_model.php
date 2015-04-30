<?php

class Welcome_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getWelcomeMessage() {
        return 'Hello, welcome from the welcome model!';
    }
}
