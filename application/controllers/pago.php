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
        $this->load->library('form_validation');

		$this->form_validation->set_rules('txt_nombre','Nombre_Tarjeta','required|max_length[50]');
        $this->form_validation->set_rules('txt_numero','Numero_Tarjeta','required|max_length[19]');
		$this->form_validation->set_rules('txt_vencimiento','Fecha_Vencimiento','required|max_length[5]');
        $this->form_validation->set_rules('txt_codigo','CVV','required|max_length[4]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nombre_dueno' => $this->input->post('txt_nombre'),
                'numero_tarjeta' =>  $this->input->post('txt_numero'),
				'codigo_cvv' => password_hash($this->input->post('txt_codigo'), PASSWORD_BCRYPT),
				'fecha_vencimiento' => $this->input->post('txt_vencimiento'),
                'saldo' => $this->input->post('txt_saldo'),
            );
            
            $usuario_id = $this->User_model->add_user($params);
            
            $data['message_display'] = 'Se ha registrado la Tarjeta Exitosamente.';
            $this->load->view('pago/edit', $data);
        }
        else
        {
            $data['_view'] = 'pago/add';
            $this->load->view('layouts/main',$data);
        }
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
