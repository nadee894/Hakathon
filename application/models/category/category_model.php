<?php

class Category_model extends CI_Model{
    
    var $id;
    var $name;
    var $is_deleted;
    var $added_by;
    var $added_date;
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_id() {
        return $this->id;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_is_deleted() {
        return $this->is_deleted;
    }

    public function get_added_by() {
        return $this->added_by;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function set_is_deleted($is_deleted) {
        $this->is_deleted = $is_deleted;
    }

    public function set_added_by($added_by) {
        $this->added_by = $added_by;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }


    
    
}