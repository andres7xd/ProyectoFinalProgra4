<?php

class Reporte_compras extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reporte_compras_model');
        $this->load->library('session');
    }

    function index()
    {
        $data['compras'] = $this->Reporte_compras_model->get_compras($this->session->userdata['logged_in']['usuario_id'], $this->input->post('fecha_1'), $this->input->post('fecha_2'));
        $data['_view'] = 'reporte_compras/index';
        $this->load->view('layouts/main', $data);
    }
}