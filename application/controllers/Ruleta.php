<?php

class Ruleta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
     $this->load->model('Ruleta_model');
        $this->load->library('session');
    }


    function index()
    {
        $data['tarjetas'] = $this->Ruleta_model->get_tarjetas();
        $data['_view'] = 'ruleta/index';
        $this->load->view('layouts/main', $data);
    }
    

}