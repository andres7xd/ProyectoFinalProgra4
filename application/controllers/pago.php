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
        $this->form_validation->set_rules('txt_numero','Numero_Tarjeta','required|max_length[19]', 'required|min_length[16]');
		$this->form_validation->set_rules('txt_vencimiento','Fecha_Vencimiento','required|max_length[5]');
        $this->form_validation->set_rules('txt_codigo','CVV','required|max_length[4]');
        $this->form_validation->set_rules('txt_saldo','Saldo','required|max_length[7]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nombre_dueno' => $this->input->post('txt_nombre'),
                'numero_tarjeta' =>  $this->input->post('txt_numero'),
				'codigo_cvv' => password_hash($this->input->post('txt_codigo'), PASSWORD_BCRYPT),
				'fecha_vencimiento' => $this->input->post('txt_vencimiento'),
                'saldo' => $this->input->post('txt_saldo'),
            );
            
            $usuario_id = $this->Pago_model->add_card($params);
            
            $data['message_display'] = 'Tarjeta Registrada Exitosamente.';
            redirect('user/edit/' . $this->session->userdata['logged_in']['usuario_id']);
        }
        else
        {
            $data['_view'] = 'pago/index';
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
