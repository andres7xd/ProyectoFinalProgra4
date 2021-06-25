<?php

class Profile_buyer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_buyer_model');
        $this->load->library('session');
    }

    function index($id)
    {
        $data['usuario'] = $this->Profile_buyer_model->get_info_usuario($id);
        $data['productos'] = $this->Profile_buyer_model->get_productos_vendidos();
        $data['fotos_producto'] = $this->Profile_buyer_model->get_fotos_producto();
        $data['calificacion_producto'] = $this->Profile_buyer_model->get_calificacion();
        $data['calificacion_tienda'] = $this->Profile_buyer_model->get_calificacion_tienda($this->session->userdata['logged_in']['usuario_id'], $id);
        $data['_view'] = 'profile_buyer/index';
        $this->load->view('layouts/main', $data);
    }

    function process($id)
    {
        if ($this->input->post('btn_search')) {
            $this->buscar($id);
        }
    }

    function buscar($id)
    {
        $this->Profile_buyer_model->buscar_productos($this->input->post('txt_nombre'), 5);
        $this->index($id);
    }

    function add_calificacion($id_comprador, $id_tienda)
    {
        $existe =  $this->Profile_buyer_model->existe_calificacion($id_comprador, $id_tienda);

        if (empty($existe)) {
            $calificaciones = array(
                'comprador_id' => $id_comprador,
                'tienda_id' =>  $id_tienda,
                'calificacion' => $this->input->post('select_calificacion'),
            );

            $this->Profile_buyer_model->add_calificacion_tienda($calificaciones);
            $calificaciones = array();
        } else {
            foreach ($existe as $e) {
                $calificaciones = array(
                    'calificacion' => $this->input->post('select_calificacion'),
                );
                $this->Profile_buyer_model->update_calificacion($e['calificacion_tienda_id'], $calificaciones);
                $calificaciones = array();
            }
        }
        $this->index($id_tienda);
    }
}