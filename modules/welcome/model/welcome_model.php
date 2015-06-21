<?php

class welcome_model extends model {

    public function getWelcomeMessage() {
        return 'Hello, welcome from the welcome model!';
    }

    public function getArray() {

    	return array(
    		'a' => '1',
    		'b' => '2',
    		'c' => '3'
    	);
    }
    
}
