<?php

class Twitter extends CI_Controller
{

    // function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('Twitter_model');
    //     $this->load->library('session');
    // }

    // function index($tweets_data = array())
    // {   
    //     $data['reacciones'] = $this->Twitter_model->get_nombres();
    //     $data['reacciones_usuario'] = $this->Twitter_model->get_reacciones_usuario($this->session->userdata['logged_in']['users_id']);

    //     if ($tweets_data == null){
    //         $data['tweets'] = $this->Twitter_model->get_all_tweets();
        
    //     }
           

    //     else
    //         $data['tweets'] = $tweets_data;

    //     $data['_view'] = 'twitter/index';
    //     $this->load->view('layouts/main', $data);



    // }

    // function process()
    // {
    //     if ($this->input->post('btn_save')) {

    //         $this->add();
    //     }

    //     if ($this->input->post('btn_search')) {
    //         $this->search();
    //     }
    // }

    // function add()
    // {
    //     $config['upload_path']          = './resources/files/';
    //     $config['allowed_types']        = 'gif|jpg|png|txt|docx|pdf|pptx|xlsx';
    //     $config['max_size']             = 2000; //2MB
    //     $config['overwrite']            = true;

    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('txt_post', 'Post/Tweet', 'required|max_length[128]');
    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload('txt_file')) {
    //         if ($this->form_validation->run()) {
    //             $params = array(
    //                 'post' => $this->input->post('txt_post'),
    //                 'date' => date('Y-m-d H:i:s'),
    //                 'users_id' => $this->session->userdata['logged_in']['users_id'],

    //             );

    //             $this->Twitter_model->add_tweet($params);
    //         }
    //     } else {
    //         $data = array('upload_data' => $this->upload->data());
    //         $params = array(
    //             'archivo' => $this->upload->data('file_name'),
    //             'post' => $this->input->post('txt_post'),
    //             'date' => date('Y-m-d H:i:s'),
    //             'users_id' => $this->session->userdata['logged_in']['users_id'],
    //         );

    //         $this->Twitter_model->add_tweet($params);

    //         $this->session->set_flashdata('success', "Archivo cargado al sistema exitosamente.");
    //     }


    //     $this->index();
    // }

    // function edit($id)
    // {
    //     $config['upload_path']          = './resources/files/';
    //     $config['allowed_types']        = 'gif|jpg|png|txt|docx|pdf|pptx|xlsx';
    //     $config['max_size']             = 2000; //2MB
    //     $config['overwrite']            = true;

    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('txt_post', 'Post/Tweet', 'required|max_length[128]');
    //     $this->load->library('upload', $config);

    //     $data['tweet'] = $this->Twitter_model->get_data_tweet($id);

    //     if (isset($data['tweet']['tweets_id']) && $this->session->userdata['logged_in']['users_id'] == $data['tweet']['users_id']) {
    //         $this->load->library('form_validation');
    //         $this->form_validation->set_rules('txt_post', 'Post/Tweet', 'required|max_length[128]');


    //         if ($this->form_validation->run()) {
    //             $params = array();
    //             if ($this->upload->do_upload('txt_file')) {

    //                 $params = array(
    //                     'post' => $this->input->post('txt_post'),
    //                     'date' => date('Y-m-d H:i:s'),
    //                     'users_id' => $this->session->userdata['logged_in']['users_id'],
    //                     'archivo' => $this->upload->data('file_name'),
    //                 );
    //             } else {

    //                 $params = array(

    //                     'post' => $this->input->post('txt_post'),
    //                     'date' => date('Y-m-d H:i:s'),
    //                     'users_id' => $this->session->userdata['logged_in']['users_id'],
    //                 );
    //             }

    //             $this->Twitter_model->edit_tweet($params, $data['tweet']['tweets_id']);

    //             redirect('twitter/index');
    //         } else {
    //             $data['_view'] = 'twitter/edit';
    //             $this->load->view('layouts/main', $data);
    //         }
    //     } else {

    //         $this->index();
    //     }
    // }

    // function search()
    // {
    //     $result = $this->Twitter_model->search_tweets($this->input->post('txt_post'));
    //     $this->index($result);
    // }

    // function delete($id)
    // {
    //     $data['tweet'] = $this->Twitter_model->get_data_tweet($id);

    //     if ($this->session->userdata['logged_in']['users_id'] == $data['tweet']['users_id'])
    //         $this->Twitter_model->delete_tweet($id);

    //     $this->index();
    // }

    // function add_reaccionD($id)
    // {

    //     if ($data['tweet'] = $this->Twitter_model->reaccion_existe($id, $this->session->userdata['logged_in']['users_id'])) {
            
    //         $params = array(
                
    //             'estado_reaccion' => 'D',
               
                
    //         );
        
    //         $this->Twitter_model->update_reaccion($id,$params,$this->session->userdata['logged_in']['users_id']);
    //     }
    //     else{
    //         $params = array(
                
    //             'estado_reaccion' => 'D',
    //             'tweets_id' => $id,
    //             'users_id' => $this->session->userdata['logged_in']['users_id'],
                
    //         );
        
    //         $this->Twitter_model->add_reac($params);
    //     }
    //     $this->index();
    // }

    // function add_reaccionL($id)
    // {
        
    //     if ($data['tweet'] = $this->Twitter_model->reaccion_existe($id, $this->session->userdata['logged_in']['users_id'])) {
            
    //         $params = array(
                
    //             'estado_reaccion' => 'L',
               
                
    //         );
        
    //         $this->Twitter_model->update_reaccion($id,$params,$this->session->userdata['logged_in']['users_id']);
    //     }
    //     else{
    //         $params = array(
                
    //             'estado_reaccion' => 'L',
    //             'tweets_id' => $id,
    //             'users_id' => $this->session->userdata['logged_in']['users_id'],
                
    //         );
        
    //         $this->Twitter_model->add_reac($params);
    //     }
    //     $this->index();
    // }

 
}
