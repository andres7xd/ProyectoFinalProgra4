<?php

class Deseos extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Deseos_model');
        $this->load->model('Product_model');
        $this->load->library('session');
    }

    function index()
    {
        $data['deseos'] = $this->Deseos_model->get_deseos($this->session->userdata['logged_in']['usuario_id']);
        $data['fotos_producto'] = $this->Deseos_model->get_fotos_producto();
        $data['_view'] = 'deseos/index';
        $this->load->view('layouts/main', $data);
    }

    function delete($id)
    {
        $this->Deseos_model->delete_deseo($id);
        $this->index();
    }

    function add_carrito($id){
        $params = array(
            'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
            'producto_id' =>  $id,
            'cantidad_productos' =>  1,
        );

     
        $this->Product_model->add_carrito($params);
        $params = array();
        $this->index('');



    }
}
