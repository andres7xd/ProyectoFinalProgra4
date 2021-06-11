<?php

class Profile_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_usuario_tienda()
    {
        return $this->db->query("SELECT usuarios.usuario_id, usuarios.cedula, usuarios.nombre_usuario, usuarios.nombre_real, usuarios.direccion, usuarios.telefono, usuarios.email,usuarios.foto
        FROM usuarios
        WHERE usuarios.tipo_usuario = 'Empresa'
        ORDER BY usuarios.nombre_real ASC")->result_array();
    }

    function get_info_usuario($id_usuario){// Obtiene la informacion de los productos mas vendidos

        return $this->db->query("SELECT*
        FROM usuarios
        WHERE usuarios.usuario_id = $id_usuario")->result_array();

    }

  




}