<?php

class Reporte_suscripciones_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_suscripciones($usuario_id)
    {
        return $this->db->query("SELECT usuarios.nombre_real, usuarios.telefono, usuarios.email, usuarios.direccion
                                 FROM suscripciones 
                                 JOIN usuarios
                                 ON usuarios.usuario_id = suscripciones.tienda_id
                                 WHERE suscripciones.comprador_id = $usuario_id")->result_array();
    }

    function get_productos_suscripciones($usuario_id)
    {
        return $this->db->query("SELECT usuarios.nombre_real, productos.nombre, productos.precio, productos.costo_envio
                                 FROM suscripciones 
                                 JOIN deseos 
                                 ON deseos.usuario_id = suscripciones.comprador_id
                                 JOIN productos
                                 ON deseos.producto_id = productos.producto_id
                                 JOIN usuarios
                                 ON usuarios.usuario_id = productos.usuario_id
                                 WHERE suscripciones.comprador_id = $usuario_id and productos.usuario_id = suscripciones.tienda_id")->result_array();
    }
}
