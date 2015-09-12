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

    function add_new_vehicle_model() {

        $animal_model = new Animal_model();
        $animal_service = new Animal_service();

        $animal_model->set_name($name);
        $animal_model->set_category_id();
        $animal_model->set_place_id('1');
        $animal_model->set_is_deleted('0');
        $animal_model->set_added_date(date("Y-m-d H:i:s"));
        $animal_model->set_added_by('1');

        echo $animal_service->add_animal($animal_model);
    }

    /*
     * This is to delete a vehicle model     
     */

    function delete_vehicle_model() {

        $vehicle_model_service = new Vehicle_model_service();

        echo $vehicle_model_service->delete_vehicle_model(trim($this->input->post('id', TRUE)));
    }

    /*
     * This function is to change publish status of a vehicle model using 
     * publish_vehicle_model function in vehicle_model_service
     */

    function change_publish_status() {
        $vehicle_model_model = new Vehicle_model_model();
        $vehicle_model_service = new Vehicle_model_service();

        $vehicle_model_model->set_id(trim($this->input->post('id', TRUE)));
        $vehicle_model_model->set_is_published(trim($this->input->post('value', TRUE)));

        echo $vehicle_model_service->publish_vehicle_model($vehicle_model_model);
    }

    /*
     * edit_vehicle_model function using the update_vehicle_model function in the 
     * Vehicle_model_service
     */

    function edit_vehicle_model() {

        $vehicle_model_model = new Vehicle_model_model();
        $vehicle_model_service = new Vehicle_model_service();

        $vehicle_model_model->set_id($this->input->post('vehicle_model_id', TRUE));
        $vehicle_model_model->set_manufacturer_id(trim($this->input->post('manufacturer', TRUE)));
        $vehicle_model_model->set_name($this->input->post('name', TRUE));
        $vehicle_model_model->set_updated_date(date("Y-m-d H:i:s"));
        $vehicle_model_model->set_updated_by($this->session->userdata('USER_ID'));

        echo $vehicle_model_service->update_vehicle_model($vehicle_model_model);
    }

}
