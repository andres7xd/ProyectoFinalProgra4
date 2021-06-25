
<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('session');
    }

    function index($productos_data = array(), $tiendas_data = array())
    {
        $data['fotos_producto'] = $this->Home_model->get_fotos_producto();
        $data['calificacion_producto'] = $this->Home_model->get_calificacion();
        $data['calificacion_tienda'] = $this->Home_model->get_calificacion_tienda();

        if ($productos_data == null) {
            $data['productos_vendidos'] = $this->Home_model->get_productos_vendidos();
        } else
            $data['productos_vendidos'] = $productos_data;

        if ($tiendas_data == null) {
            $data['nombre_usuario'] = $this->Home_model->get_usuario_tienda();
        } else
            $data['nombre_usuario'] = $tiendas_data;

        $data['_view'] = 'home/index';
        $this->load->view('layouts/main', $data);
    }

    function process_producto()
    {
        if ($this->input->post('btn_search')) {
            $this->buscar_producto();
        }
    }

    function buscar_producto()
    {
        $result = $this->Home_model->buscar_productos($this->input->post('txt_nombre'));
        $this->index($result, '');
    }

    function process_tienda()
    {
        if ($this->input->post('btn_search')) {
            $this->buscar_tienda();
        }
    }

    function buscar_tienda()
    {
        $result = $this->Home_model->buscar_tiendas($this->input->post('txt_nombre_tienda'));
        $this->index('' ,$result);
    }
}
