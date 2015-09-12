<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Places extends CI_Controller {

    function __construct() {
        parent::__construct();

//        if (!$this->session->userdata('USER_LOGGED_IN')) {
//            redirect(site_url() . '/login/load_login');
//        } else {
        $this->load->model('places/places_model');
        $this->load->model('places/places_service');

//             $this->load->model('access_controll/access_controll_service');
//        }
    }

    /*
     * Function to display all the places
     */

    function manage_places() {

        $places_service = new Places_service();
        $data['heading'] = "Manage Zoo Locations";
        $data['results'] = $places_service->get_all_Places();

        $parials = array('content' => 'places/manage_places_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    /*
     * Function to Add places
     */

    function add_place() {

        $places_model = new Places_model();
        $places_service = new Places_service();

        $places_model->setBlock($this->input->post('block', TRUE));
        $places_model->setCage($this->input->post('cage', TRUE));
        $places_model->setIs_deleted('0');

        echo $places_service->add_new_place($places_model);
    }

    /*
     * Function to delete places 
     */

    function delete_place() {
        $places_service = new Places_service();

        echo $places_service->delete_place(trim($this->input->post('id', TRUE)));
    }

    /*
     * Function to load update pop up, edit and send
     */

    function load_update_places_popup() {
        $places_model = new Places_model();
        $places_service = new Places_service();

        $places_model->setId(trim($this->input->post('places_id', TRUE)));
        $places = $places_service->get_places_id($places_model);
        $data['places'] = $places;

        echo $this->load->view('places/places_edit_popup', $data, TRUE);
    }

    /*
     * Function to update places
     */

    function update_place() {

        $places_model = new Places_model();
        $places_service = new Places_service();

        $places_model->set_id($this->input->post('places_id', TRUE));
        $places_model->set_name($this->input->post('name', TRUE));
//        $places_model->set_updated_date(date("Y-m-d H:i:s"));

        echo $places_service->update_Place($places_model);
    }

}
