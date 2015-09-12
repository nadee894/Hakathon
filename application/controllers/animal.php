<?php

class Animal extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('category/category_service');

        $this->load->model('animal/animal_model');
        $this->load->model('animal/animal_service');
    }

    function index() {

        $animal_service = new Animal_service();
        $category_service = new Category_service();

        $data['heading'] = "Manage Animals";
        $data['results'] = $animal_service->get_animals();
        $data['categories'] = $category_service->get_all_categories();

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
        $category_service = new Category_service();

        $data['categories'] = $category_service->get_all_categories();
        $data['animal'] = $animal_service->get_animal($this->input->post('id', TRUE));

        echo $this->load->view('animal/animal_edit_popup', $data, TRUE);
    }

    function print_animal_report() {

        $animal_service = new Animal_service();        

        $data['heading'] = "Manage Animals";
        $data['results'] = $animal_service->get_animals();

        $print_out = $this->load->view('animal/animal_rep_print', $data, TRUE);

        $footer = $this->load->view('template/custom/pdf_footer', $data, TRUE);
        $this->load->library('MPDF56/mpdf');
        $mpdf = new Mpdf('utf-8', 'A4');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter($footer);
        $mpdf->WriteHTML($print_out);
        $mpdf->Output();
    }

}
