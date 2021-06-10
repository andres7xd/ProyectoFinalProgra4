<?php

class Pago extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Pago_model');
    } 

    function index()
    {
        $data['_view'] = 'pago/index';
        $this->load->view('layouts/main',$data);
    }
    
    function add()
    {   
     
    }  
  
    function edit()
    {   

    } 


    function delete()
    {   
    
    }

    function upload_photo()
    {

    }
}
