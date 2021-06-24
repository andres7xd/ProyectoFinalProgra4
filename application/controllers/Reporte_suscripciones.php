<?php

class Reporte_suscripciones extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reporte_suscripciones_model');
        $this->load->library('session');
    }

    function index()
    {
        $data['suscripciones'] = $this->Reporte_suscripciones_model->get_suscripciones($this->session->userdata['logged_in']['usuario_id']);
        $data['p_suscripciones'] = $this->Reporte_suscripciones_model->get_productos_suscripciones($this->session->userdata['logged_in']['usuario_id']);
        $data['_view'] = 'reporte_suscripciones/index';
        $this->load->view('layouts/main', $data);
    }
}