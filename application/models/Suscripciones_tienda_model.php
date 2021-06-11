<?php

class Suscripciones_tienda_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_deseos($usuario_id)
    {

        return $this->db->query("SELECT deseos.deseo_id, deseos.producto_id, productos.producto_id, productos.nombre, productos.unidades, productos.precio, usuarios.nombre_real
        FROM deseos
        JOIN productos
        ON productos.producto_id = deseos.producto_id
        JOIN usuarios
        ON productos.usuario_id = usuarios.usuario_id
        WHERE deseos.usuario_id = $usuario_id")->result_array();
    }

    function get_fotos_producto()
    {
        return $this->db->query("SELECT *
        FROM fotos
        JOIN productos
        ON fotos.producto_id = productos.producto_id")->result_array();
    }

    function get_usuarios_suscritos($id_tienda){
        return $this->db->query("SELECT * 
        FROM suscripciones
        JOIN usuarios
        ON usuarios.usuario_id = suscripciones.comprador_id
        WHERE suscripciones.tienda_id = $id_tienda")->result_array();
    }

    

    
}
