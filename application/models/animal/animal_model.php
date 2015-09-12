<?php

class Animal_model extends CI_Model {

    var $id;
    var $category_id;
    var $place_id;
    var $name;
    var $is_deleted;
    var $added_by;
    var $added_date;

    function get_added_date() {
        return $this->added_date;
    }

    function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

    function get_id() {
        return $this->id;
    }

    function get_category_id() {
        return $this->category_id;
    }

    function get_place_id() {
        return $this->place_id;
    }

    function get_name() {
        return $this->name;
    }

    function get_is_deleted() {
        return $this->is_deleted;
    }

    function get_added_by() {
        return $this->added_by;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_category_id($category_id) {
        $this->category_id = $category_id;
    }

    function set_place_id($place_id) {
        $this->place_id = $place_id;
    }

    function set_name($name) {
        $this->name = $name;
    }

    function set_is_deleted($is_deleted) {
        $this->is_deleted = $is_deleted;
    }

    function set_added_by($added_by) {
        $this->added_by = $added_by;
    }

}
