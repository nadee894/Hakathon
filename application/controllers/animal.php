<?php

class Animal extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('animal/animal_model');
        $this->load->model('animal/animal_service');
    }

    function index() {

        $animal_service = new Animal_service();

        $data['heading'] = "Manage Animals";
        $data['results'] = $animal_service->get_animals();

        $parials = array('content' => 'animal/animal_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    function add_animal() {

        $animal_model = new Animal_model();
        $animal_service = new Animal_service();

        $animal_model->set_name($this->input->post('name', TRUE));
        $animal_model->set_category_id($this->input->post('category_id', TRUE));
        $animal_model->set_place_id($this->input->post('place_id', TRUE));
        $animal_model->set_is_deleted('0');
        $animal_model->set_added_date(date("Y-m-d H:i:s"));
        $animal_model->set_added_by('1');

        echo $animal_service->add_animal($animal_model);
    }

    function delete_animal() {

        $animal_service = new Animal_service();

        echo $animal_service->delete_animal($this->input->post('id', TRUE));
    }

    function edit_animal() {

        $animal_model = new Animal_model();
        $animal_service = new Animal_service();

        $animal_model->set_name($this->input->post('name', TRUE));
        $animal_model->set_category_id($this->input->post('category_id', TRUE));
        $animal_model->set_place_id($this->input->post('place_id', TRUE));

        echo $animal_service->update_animal($animal_model);
    }

    function load_animal() {

        $animal_service = new Animal_service();

        $data['animal'] = $animal_service->get_animal($this->input->post('id', TRUE));

        echo $this->load->view('animal/animal_edit_popup', $data, TRUE);
    }

}
