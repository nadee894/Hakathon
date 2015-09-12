<?php

class Category extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('category/category_model');
        $this->load->model('category/category_service');
    }
    
    function manage_category() {

        $category_service = new Category_service();

        $data['heading'] = "Manage Categories";
        $data['results'] = $category_service->get_all_categories();

        $parials = array('content' => 'category/manage_category_view');
        $this->template->load('template/main_template', $parials, $data);
    }
    
    function add_category() {

        $category_model = new Category_model();
        $category_service = new Category_service();

        $category_model->set_name($this->input->post('name', TRUE));
        $category_model->set_added_by('1');
        $category_model->set_added_date(date("Y-m-d H:i:s"));        
        $category_model->set_is_deleted('0');

        echo $category_service->add_new_category($category_model);
    }
    
    function delete_category() {

        $category_service = new Category_service();

        echo $category_service->delete_category(trim($this->input->post('id', TRUE)));
    }
    
    function load_edit_category_content() {
        $category_model = new Category_model();
        $category_service = new Category_service();

        $category_model->set_id(trim($this->input->post('category_id', TRUE)));
        $category = $category_service->get_category_by_id($category_model);
        $data['category'] = $category;


        echo $this->load->view('category/category_edit_pop_up', $data, TRUE);
    }
    
    function edit_category() {

        $category_model = new Category_model();
        $category_service = new Category_service();

        $category_model->set_id($this->input->post('category_id', TRUE));
        $category_model->set_name($this->input->post('name', TRUE));        

        echo $category_service->update_category($category_model);
    }

}

