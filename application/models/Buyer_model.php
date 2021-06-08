<?php

class Buyer_model extends CI_Model
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

    function get_productos_vendidos(){// Obtiene la informacion de los productos mas vendidos

        return $this->db->query("SELECT productos.nombre, productos.unidades, productos.precio, productos.unidades_vendidas, productos.producto_id, usuarios.nombre_real
        FROM productos
        join usuarios
        on productos.usuario_id = usuarios.usuario_id
        WHERE productos.unidades != 0  
        ORDER BY productos.nombre ASC")->result_array();

    }
}