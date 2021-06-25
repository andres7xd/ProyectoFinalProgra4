<?php

class Profile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->library('session');
    }

    function index($id)
    {
        $data['usuario'] = $this->Profile_model->get_info_usuario($id);

        $data['productos'] = $this->Profile_model->get_productos_vendidos();
        $data['fotos_producto'] = $this->Profile_model->get_fotos_producto();
        $data['calificacion_producto'] = $this->Profile_model->get_calificacion();

        $data['_view'] = 'profile/index';
        $this->load->view('layouts/main', $data);
    }

    function process()
    {
        if ($this->input->post('btn_search')) {
            $this->buscar();
        }
    }

    function buscar()
    {
        $this->Profile_model->buscar_productos($this->input->post('txt_nombre'), 5);
        $this->index(5);
    }
}
