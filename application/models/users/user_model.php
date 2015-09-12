<?php

class User_model extends CI_Model {

    var $id;
    var $title;
    var $name;
    var $user_name;
    var $email;
    var $address;
    var $user_type;
    var $contact_no_1;
    var $password;
    var $is_published;
    var $is_deleted;
    var $added_by;
    var $added_date;

    function __construct() {
        parent::__construct();
    }

    function get_id() {
        return $this->id;
    }

    function get_title() {
        return $this->title;
    }

    function get_name() {
        return $this->name;
    }

    function get_user_name() {
        return $this->user_name;
    }

    function get_user_type() {
        return $this->user_type;
    }

    function get_profile_pic() {
        return $this->profile_pic;
    }

    function get_password() {
        return $this->password;
    }

    function get_account_activation_code() {
        return $this->account_activation_code;
    }

    function get_is_online() {
        return $this->is_online;
    }

    function get_is_published() {
        return $this->is_published;
    }

    function get_is_deleted() {
        return $this->is_deleted;
    }

    function get_added_by() {
        return $this->added_by;
    }

    function get_added_date() {
        return $this->added_date;
    }

    function get_updated_date() {
        return $this->updated_date;
    }

    function get_updated_by() {
        return $this->updated_by;
    }

    function get_address() {
        return $this->address;
    }

    function get_contact_no_1() {
        return $this->contact_no_1;
    }

    function get_contact_no_2() {
        return $this->contact_no_2;
    }

    function set_contact_no_1($contact_no_1) {
        $this->contact_no_1 = $contact_no_1;
    }

    function set_contact_no_2($contact_no_2) {
        $this->contact_no_2 = $contact_no_2;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_title($title) {
        $this->title = $title;
    }

    function set_email($email) {
        $this->email = $email;
    }

    function set_address($address) {
        $this->address = $address;
    }

    function set_name($name) {
        $this->name = $name;
    }

    function set_user_name($user_name) {
        $this->user_name = $user_name;
    }

    function set_user_type($user_type) {
        $this->user_type = $user_type;
    }

    function set_profile_pic($profile_pic) {
        $this->profile_pic = $profile_pic;
    }

    function set_password($password) {
        $this->password = $password;
    }

    function set_account_activation_code($account_activation_code) {
        $this->account_activation_code = $account_activation_code;
    }

    function set_is_online($is_online) {
        $this->is_online = $is_online;
    }

    function set_is_published($is_published) {
        $this->is_published = $is_published;
    }

    function set_is_deleted($is_deleted) {
        $this->is_deleted = $is_deleted;
    }

    function set_added_by($added_by) {
        $this->added_by = $added_by;
    }

    function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

    function set_updated_date($updated_date) {
        $this->updated_date = $updated_date;
    }

    function set_updated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

    function get_email() {
        return $this->email;

        function set_email($email) {
            $this->email = $email;
        }

        function set_address($address) {
            $this->address = $address;
        }

    }

}
