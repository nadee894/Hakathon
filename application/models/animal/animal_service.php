<?php

class Animal_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_animals() {

        $this->db->select('animal.*,category.name as category,places.block,places.cage');
        $this->db->from('animal');
        $this->db->join('category', 'category.id = animal.id');
        $this->db->join('places', 'places.id=animal.id');
        $this->db->where('animal.is_deleted', '0');
        $this->db->order_by("animal.id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function add_animal($animal_model) {
        return $this->db->insert('animal', $animal_model);
    }

    function delete_animal($id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $id);
        return $this->db->update('animal', $data);
    }

    function update_animal($animal_model) {

        $data = array('name' => $animal_model->get_name(),
            'manufacturer_id' => $animal_model->get_category_id(),
            'updated_date' => $animal_model->get_place_id()
        );

        $this->db->where('id', $animal_model->get_id());
        return $this->db->update('animal', $data);
    }

    public function get_animal($id) {

        $this->db->select('animal.*,category.name as category,places.block,places.cage');
        $this->db->from('animal');
        $this->db->join('category', 'category.id = animal.id');
        $this->db->join('places', 'places.id=animal.id');
        $this->db->where('animal.is_deleted', '0');
        $this->db->where('animal.id', $id);
        $this->db->order_by("animal.id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

}
