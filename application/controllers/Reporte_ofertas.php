<?php

class Reporte_ofertas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reporte_ofertas_model');
        $this->load->library('session');
    }

    function index()
    {

        $data['ofertas'] = $this->Reporte_ofertas_model->get_ofertas($this->input->post('select_categoria'), $this->input->post('fecha_1'), $this->input->post('fecha_2'), $this->input->post('txt_precio_ini'), $this->input->post('txt_precio_fin'));

        $data['_view'] = 'reporte_ofertas/index';
        $this->load->view('layouts/main', $data);
    }
}