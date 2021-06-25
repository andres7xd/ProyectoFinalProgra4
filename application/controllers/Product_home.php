<?php

class Product_home extends CI_Controller
{
    public $mensaje = null;
    public $mensaje_error = null;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_home_model');
        $this->load->library('session');
    }

    function index($id)
    {
        $data['producto'] = $this->Product_home_model->get_producto($id);
        $data['fotos_productos'] = $this->Product_home_model->get_fotos_producto($id);
        $data['message_display'] = $this->mensaje;
        $data['error_message'] = $this->mensaje_error;
        $data['_view'] = 'product_home/index';
        $this->load->view('layouts/main', $data);
    }
}
