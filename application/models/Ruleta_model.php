<?php

class Ruleta_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }



    function get_tarjetas(){
        return $this->db->query("SELECT * FROM tarjetas WHERE tarjetas.usuario_id = 4")->result_array();
    }


    function add_premio($params)
    {
        $this->db->insert('premios', $params);
        return $this->db->insert_id();
    }

    function get_premio($id_usuario){
        return $this->db->query("SELECT *
        FROM premios
        WHERE premios.usuario_id = $id_usuario")->result_array();
    }


    function update_ruleta($id_usuario, $params)
    {
        $this->db->where('usuario_id', $id_usuario);
        return $this->db->update('premios', $params);
    }

}