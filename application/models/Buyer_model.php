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

    function get_productos_vendidos()
    { // Obtiene la informacion de los productos mas vendidos

        return $this->db->query("SELECT productos.nombre, productos.unidades, productos.precio, productos.unidades_vendidas, productos.producto_id, usuarios.nombre_real
        FROM productos
        join usuarios
        on productos.usuario_id = usuarios.usuario_id
        WHERE productos.unidades != 0  
        ORDER BY productos.nombre ASC")->result_array();
    }


    function buscar_productos($data)
    {
        return $this->db->query("SELECT productos.nombre, productos.unidades, productos.precio, productos.unidades_vendidas, productos.producto_id, usuarios.nombre_real
        FROM productos
        join usuarios
        on productos.usuario_id = usuarios.usuario_id
        WHERE  productos.nombre LIKE '%" . $data . "%'
        ORDER BY productos.nombre DESC")->result_array();
    }

    function get_fotos_producto(){// Obtiene la lista de fotos de los productos
        return $this->db->query("SELECT *
        FROM fotos
        JOIN productos
        ON fotos.producto_id = productos.producto_id")->result_array();
    }

    function get_deseos($id_producto, $id_usuario){
        return $this->db->query("SELECT *
        FROM deseos
        where deseos.producto_id = $id_producto and deseos.usuario_id = $id_usuario")->result_array();

    }

    function get_carritos($id_producto,$id_usuario){
        return $this->db->query("SELECT *
        FROM carritos
        where carritos.producto_id = $id_producto and carritos.usuario_id = $id_usuario")->result_array();
    }
}
