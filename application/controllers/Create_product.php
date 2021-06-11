<?php

class Create_product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Create_product_model');
        $this->load->library('session');
    }

    function index()
    {
        $data['categorias'] = $this->Create_product_model->get_categorias();
        $data['_view'] = 'create_product/index';
        $this->load->view('layouts/main', $data);
    }

    function add()
    {
        $params = array(
            'nombre' => $this->input->post('txt_prod_nombre'),
            'descripcion' =>  $this->input->post('txt_prod_descripcion'),
            'unidades' =>  $this->input->post('txt_prod_unidades'),
            'fecha_publicacion' => date('Y-m-d'),
            'ubicacion_actual' =>  $this->input->post('txt_prod_ubicacion'),
            'precio' =>  $this->input->post('txt_prod_precio'),
            'tiempo_envio' => $this->input->post('txt_prod_tenvio'),
            'costo_envio' =>  $this->input->post('txt_prod_cenvio'),
            'categoria_id' =>  $this->input->post("select_categoria"),
            'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
        );
        $this->Create_product_model->add_product($params);
        $this->index();
    }
}
