<?php

class Places_model extends CI_Model {

    var $id;
    var $block;
    var $cage;
    var $is_deleted;
    var $added_by;
    var $added_date;

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

    function getIs_deleted() {
        return $this->is_deleted;
    }

    function getAdded_by() {
        return $this->added_by;
    }

    function getAdded_date() {
        return $this->added_date;
    }

    function setIs_deleted($is_deleted) {
        $this->is_deleted = $is_deleted;
    }

    function setAdded_by($added_by) {
        $this->added_by = $added_by;
    }

    function setAdded_date($added_date) {
        $this->added_date = $added_date;
    }


}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

