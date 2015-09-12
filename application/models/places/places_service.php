<?php

class Places_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('places/places_model');
    }

    /*
     * Load All places Details from database     
     */

    public function get_all_Places() {

        $this->db->select('places.*');
        $this->db->from('places');
//        $this->db->join('user', 'user.id =places.added_by');
        $this->db->where('places.is_deleted', '0');
//        $this->db->order_by("places.added_date", "desc");
        $query = $this->db->get();
        
        return $query->result();
    }

    /*
     * Add new place to database     
     */

    function add_new_place($places_model) {
        return $this->db->insert('places', $places_model);
    }

    /*
     * Delete body type from database     
     */

    function delete_place($places_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $places_id);
        return $this->db->update('places', $data);
    }

 

    /*
     * Update Places  
     */

    function update_Place($places_model) {
        $data = array('name' => $places_model->get_name());
      
        $this->db->where('id', $places_model->get_id());
        return $this->db->update('places', $data);
    }

    /*
     * get body types details by passing places id as a parameter
     */

    function get_places_id($places_model) {

        $data = array('id' => $places_model->getId(), 'is_deleted' => '0');
        $query = $this->db->get_where('places', $data);
        return $query->row();
    }
    
    

}


