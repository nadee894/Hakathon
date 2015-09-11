<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        //$partials = array('content' => '');
        $this->template->load('home_view');
    }

}
