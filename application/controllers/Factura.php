<?php

class Factura extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Factura_model');
        $this->load->library('session');
    }

    function index()
    {
        $num_compra = $this->Factura_model->ultimo_numero_compra($this->session->userdata['logged_in']['usuario_id']);
        $ult_num_compra = 0;

        foreach ($num_compra as $n) {
            $ult_num_compra = $n["numero_compra"];
        }
        
        $data['compra'] = $this->Factura_model->get_factura($ult_num_compra);
        $data['_view'] = 'factura/index';
        $this->load->view('layouts/main', $data);
    }
}