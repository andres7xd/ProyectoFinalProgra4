<?php

class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
    } 

    function index()
    {
        $data['_view'] = 'twitter/index';
        $this->load->view('layouts/main',$data);
    }


    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('txt_usuario','Usuario','required|max_length[64]');
        $this->form_validation->set_rules('txt_clave','Contraseña','required|max_length[128]');
		$this->form_validation->set_rules('txt_nombre','Nombre','required|max_length[64]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nombre_usuario' => $this->input->post('txt_usuario'),
				'contrasena' => password_hash($this->input->post('txt_clave'), PASSWORD_BCRYPT),
				'nombre_real' => $this->input->post('txt_nombre'),
                'foto' => 'unknown.jpg',
                'cedula' =>  $this->input->post('txt_cedula'),
                'direccion' =>  $this->input->post('txt_direccion'),
                'telefono' =>  $this->input->post('txt_telefono'),
                'email' =>  $this->input->post('txt_email'),
                'tipo_usuario' =>  $this->input->post('select_tipo_usuario'),
                'pais' => $this->input->post('txt_pais'),
            );
            
            $usuario_id = $this->User_model->add_user($params);
            
            $data['message_display'] = 'Te has registrado exitosamente.';
            $this->load->view('auth/login', $data);
        }
        else
        {
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main',$data);
        }
    }  


    function edit($users_id)
    {   
        $data['user'] = $this->User_model->get_user($users_id);
        
        if(isset($data['user']['usuario_id']) && $this->session->userdata['logged_in']['usuario_id'] == $data['user']['usuario_id'])
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('txt_usuario','Usuario','required|max_length[64]');
            $this->form_validation->set_rules('txt_clave','Contraseña','required|max_length[128]');
            $this->form_validation->set_rules('txt_nombre','Nombre','required|max_length[64]');
            
            if($this->form_validation->run())    
            {   
                $params = array(
                    'nombre_usuario' => $this->input->post('txt_usuario'),
                    'contrasena' => password_hash($this->input->post('txt_clave'), PASSWORD_BCRYPT),
                    'nombre_real' => $this->input->post('txt_nombre'),
                );

                $this->User_model->update_user($users_id,$params);

                $this->session->set_flashdata('success', "Tus datos de usuario se han actualizado. Vuelve a autenticarte para ver los cambios.");

                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main',$data);
            }
            else
            {
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main',$data);
            }
        } else {       
            redirect('home/index/');
        }
    } 


    function delete($users_id)
    {   
        $data['user'] = $this->User_model->get_user($users_id);

        if($this->session->userdata['logged_in']['users_id'] == $data['user']['users_id'])      
            $this->User_model->delete_user($users_id);

        $this->session->sess_destroy();
        $data['message_display'] = 'Tu cuenta se ha eliminado exitosamente. ¡Vuelve pronto!';
        $this->load->view('auth/login', $data);
    }

    function upload_photo($users_id)
    {
            $config['upload_path']          = './resources/photos/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000; //2MB
            $config['file_name']           = $users_id;
            $config['overwrite']            = true;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('txt_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);

            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $params = array(
                    'foto' => $this->upload->data('file_name'),
                );

                $this->User_model->update_user($users_id,$params);

                $this->session->set_flashdata('success', "Archivo cargado al sistema exitosamente.");
            }

            redirect('user/edit/'. $users_id);
    }
    
}
