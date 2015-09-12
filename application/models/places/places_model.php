<?php

class Places_model extends CI_Model {

    var $id;
    var $block;
    var $cage;

    function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->id;
    }

    function getBlock() {
        return $this->block;
    }

    function getCage() {
        return $this->cage;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBlock($block) {
        $this->block = $block;
    }

    function setCage($cage) {
        $this->cage = $cage;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

