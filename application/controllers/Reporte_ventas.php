<?php

class Reporte_ventas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Reporte_ventas_model');
        $this->load->library('session');
    }

    function index()
    {
        $data['ventas'] = $this->Reporte_ventas_model->get_ventas($this->session->userdata['logged_in']['usuario_id'],$this->input->post('fecha_1'),$this->input->post('fecha_2'));
        $data['_view'] = 'reporte_ventas/index';
        $this->load->view('layouts/main', $data);
    }
}
