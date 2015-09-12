<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        
        $partials = array('content' => 'dashboard');
        $this->template->load('template/main_template', $partials);
  
    }

}
