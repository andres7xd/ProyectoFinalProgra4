<?php

class Edit_product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Edit_product_model');
        $this->load->library('session');
    }

    function index($id)
    {
        $data['producto'] = $this->Edit_product_model->get_producto($id);
        $data['fotos_productos'] = $this->Edit_product_model->get_fotos_producto($id);
        $data['_view'] = 'product/index';
        $this->load->view('layouts/main', $data);
        if (isset($_POST['prod_carrito']) == true) {
            $this->add_carrito($id);
        }

        if (isset($_POST['prod_deseos']) == true) {
            $this->add_deseo($id);
        }
    }

    function add_carrito($id)
    {
        $params = array(
            'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
            'producto_id' =>  $id,
            'cantidad_productos' =>  $this->input->post('txt_cantidad_prod'),
        );
        $this->Edit_product_model->add_carrito($params);
        $params = array();
    }

    function add_deseo($id)
    {
        $params_deseos = array(
            'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
            'producto_id' =>  $id,
        );
        $this->Edit_product_model->add_deseo($params_deseos);
        $params_deseos = array();
    }
}
