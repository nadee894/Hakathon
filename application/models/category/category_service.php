<?php

class Category_service extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->model('category/category_model');
    }
    
    function add_new_category($category_model) {
        return $this->db->insert('category', $category_model);
    }
    
    public function get_all_categories() {

        $this->db->select('category.*');
        $this->db->from('category');
        //$this->db->join('user', 'user.id = category.added_by');
        $this->db->where('category.is_deleted', '0');
        $this->db->order_by("category.added_date", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    
     public function delete_category($category_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $category_id);
        return $this->db->update('category', $data);
    }
    
    function update_category($category_model) {
        $data = array('name' => $category_model->get_name());

        $this->db->where('id', $category_model->get_id());
        return $this->db->update('category', $data);
    }
    
    function get_category_by_id($category_model) {
        $query = $this->db->get_where('category', array('id' => $category_model->get_id(), 'is_deleted' => '0'));
        return $query->row();
    }
    
}
