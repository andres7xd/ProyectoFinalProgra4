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
    

    function add_premio(){
        $hoy = getdate();
        $existe = $this->Ruleta_model->get_premio($this->session->userdata['logged_in']['usuario_id']);
        $cantidad_giros = 0;
        foreach ($existe as $e){
            $cantidad_giros = $e['giros_disponibles'];
        }

        if($e['giros_disponibles'] != 0){
            if(empty($existe)){
                $params = array(
                    'premio'=> $this->input->post('txt_premio'),
                    'usuario_id' => $this->session->userdata['logged_in']['usuario_id'],
                    'fecha_premio' => $hoy['year'] . '-' . $hoy['mon'] . '-' . $hoy['mday'],
                    'giros_disponibles' =>2,
                    'estado' => 1,
                );
                
             
        
                $this->Ruleta_model->add_premio($params);
            }

            else{
                $params = array(
                    'premio'=> $this->input->post('txt_premio'),
                    'fecha_premio' => $hoy['year'] . '-' . $hoy['mon'] . '-' . $hoy['mday'],
                    'giros_disponibles' => $cantidad_giros - 1,
                    'estado' => 1,
                );
        
        
                $this->Ruleta_model->update_ruleta($this->session->userdata['logged_in']['usuario_id'],$params);
            }
        }

           
        
        $this->index();
    }

}