<?php

class Direccion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Direccion_model');
    } 

    function index()
    {
        $data['_view'] = 'direccion/index';
        $data['direccion'] = $this->Direccion_model->get_address(); 
        $this->load->view('layouts/main',$data);

    }
    
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('txt_pais','Pais','required|max_length[15]');
        $this->form_validation->set_rules('txt_provincia','Provincia','required|max_length[30]');
		$this->form_validation->set_rules('txt_casillero','Casillero','required|max_length[10]');
        $this->form_validation->set_rules('txt_codigo','Codigo','required|max_length[10]');
        $this->form_validation->set_rules('txt_observacion','Observacion','required|max_length[120]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
                'usuario_id' => $this->session->userdata['logged_in']['usuario_id'],
				'pais' => $this->input->post('txt_pais'),
                'provincia' =>  $this->input->post('txt_provincia'),
				'numero_casillero' => $this->input->post('txt_casillero'),
				'codigo_postal' => $this->input->post('txt_codigo'),
                'observaciones' => $this->input->post('txt_observacion'),
            );
            
            $this->Direccion_model->add_address($params); 
            $data['message_display'] = 'Direccion Registrada Exitosamente.';
            redirect('user/edit/' . $this->session->userdata['logged_in']['usuario_id']);
        }
        else
        {
            $data['_view'] = 'direcciones/index';
            $this->load->view('layouts/main',$data);
        }
    }  

    function delete($id_address)
    {  
        $this->Direccion_model->delete_address($id_address);
        $this->index();
    }
}
