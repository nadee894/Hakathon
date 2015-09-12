<?php

class User_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('users/user_model');
    }

    function get_admin_details() {
        $this->db->select('user.*, user_type.type');
        $this->db->from('user');
        $this->db->join('user_type', 'user.user_type= user_type.id');
        $this->db->where('user_type.id in (2,1)');
        $this->db->where('is_deleted', '0');
        $this->db->order_by("user.added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * To get admin details by passing id as a parameter
     */

    function get_admin_by_id($user_model) {

        $this->db->select('user.*, user_type.type');
        $this->db->from('user');
        $this->db->join('user_type', 'user.user_type= user_type.id');
        $this->db->where('user_type.id in (2,1)');
        $this->db->where('user.is_deleted', '0');
        $this->db->where('user.id', $user_model->get_id());
        $query = $this->db->get();

        return $query->row();
    }

    /*
     * To get user details by passing id as a parameter
     */

    function get_user_by_id($user_model) {

        $this->db->select('user.*, user_type.type');
        $this->db->from('user');
        $this->db->join('user_type', 'user.user_type= user_type.id');
        $this->db->where('user.is_deleted', '0');
        $this->db->where('user.id', $user_model->get_id());
        $query = $this->db->get();

        return $query->row();
    }

    function get_admin_by_name($letter) {

        $this->db->select('user.*, user_type.type');
        $this->db->from('user');
        $this->db->join('user_type', 'user.user_type= user_type.id');
        $this->db->where('user_type.id in (2,1)');
        $this->db->where('user.name like "' . $letter . '%"');
//        echo $letter;
        $this->db->where('user.is_deleted', '0');
        $this->db->order_by("user.added_date", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    /*
     * Delete users from database     
     */

    function delete_users($user_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $user_id);
        return $this->db->update('user', $data);
    }

    /*
     * Change disable status of a user   
     */

    public function publish_status_of_user($user_model) {
        $data = array('is_published' => $user_model->get_is_published());
        $this->db->update('user', $data, array('id' => $user_model->get_id()));
        return $this->db->affected_rows();
    }

    /*
     * Add user to the database  
     */

    function add_user($user_model) {
        return $this->db->insert('user', $user_model);
    }

}
