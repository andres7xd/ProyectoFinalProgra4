<?php

class Profile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->library('session');
    }

    function index($id, $productos_data = array())
    {
        $data['usuario'] = $this->Profile_model->get_info_usuario($id);
        $data['fotos_producto'] = $this->Profile_model->get_fotos_producto();
        $data['calificacion_producto'] = $this->Profile_model->get_calificacion();
        $data['redes_sociales'] = $this->Profile_model->get_redes_sociales();
        if($productos_data == null){
            $data['productos'] = $this->Profile_model->get_productos_vendidos();
        }else
            $data['productos'] = $productos_data;

        $data['_view'] = 'profile/index';
        $this->load->view('layouts/main', $data);
    }

    function process($tienda_id)
    {
        if ($this->input->post('btn_search')) {
            $this->buscar($tienda_id);
        }
    }

    function buscar($tienda_id)
    {
        $result = $this->Profile_model->buscar_productos($this->input->post('txt_nombre'), $tienda_id);
        $this->index($tienda_id, $result);
    }
}
