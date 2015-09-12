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
     * Only admins and super admins can be authenticate using this function
     */

    function authenticate_user_with_password($user_model) {

        $data = array('user_name' => $user_model->get_user_name(), 'password' => $user_model->get_password(), 'is_deleted' => '0');

        $this->db->select('user.*,user_type.type as user_type_name');
        $this->db->from('user');
        $this->db->join('user_type', 'user.user_type = user_type.id');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row();
    }

    /*
     * To get all active registered users
     */

    function get_all_active_registered_users() {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('user_type', 3);
        $this->db->where('is_published', '1');
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
     * update online status of the user 
     */

    function update_user_online_status($user_model) {

        $data = array('is_online' => $user_model->get_is_online());
        $this->db->where('id', $user_model->get_id());
        return $this->db->update('user', $data);
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
     * update details of an user   
     */

    function update_user($user_model) {
        $data = array('title'        => $user_model->get_title(),
            'name'         => $user_model->get_name(),
            'user_name'    => $user_model->get_user_name(),
            'user_type'    => $user_model->get_user_type(),
            'email'        => $user_model->get_email(),
            'address'      => $user_model->get_address(),
            'contact_no_1' => $user_model->get_contact_no_1(),
            'contact_no_2' => $user_model->get_contact_no_2(),
            'password'     => $user_model->get_password(),
            'profile_pic'  => $user_model->get_profile_pic(),
            'updated_by'   => $user_model->get_updated_by(),
            'updated_date' => $user_model->get_updated_date());
        $this->db->where('id', $user_model->get_id());
        return $this->db->update('user', $data);
    }

    /*
     * update password and avatar of an user   
     */

    function update_password_and_avatar($user_model) {
        $data = array('password'     => $user_model->get_password(),
            'profile_pic'  => $user_model->get_profile_pic(),
            'updated_by'   => $user_model->get_updated_by(),
            'updated_date' => $user_model->get_updated_date());
        $this->db->where('id', $user_model->get_id());
        return $this->db->update('user', $data);
    }

    /*
     * Add user to the database  
     */

    function add_user($user_model) {
        return $this->db->insert('user', $user_model);
    }

    /*
     * This function to check old password when updating an admin or super admin
     * author - nadeesha
     */

    function checkOldPass($user_model) {
        $this->db->select('user.password');
        $this->db->from('user');
        $this->db->join('user_type', 'user.user_type= user_type.id');
//        $this->db->where('id', $id);
        //$this->db->where('user.password', $user_model->get_password());
        $this->db->where('user.id', $user_model->get_id());
        return $this->db->affected_rows();
    }

    function update_password($user_model) {

        $data = array('password' => $user_model->get_password());
        $this->db->where('id', $user_model->get_id());
        return $this->db->update('user', $data);
    }

}
