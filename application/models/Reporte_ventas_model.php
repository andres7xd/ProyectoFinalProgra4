<?php

class Reporte_ventas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_ventas($id_usuario, $fecha_ini, $fecha_fin)
    {
        return $this->db->query("SELECT p.nombre, c.precio_producto, p.costo_envio, u.nombre_real, p.unidades_vendidas 
                                 FROM compras c
                                 JOIN productos p
                                 ON p.producto_id = c.producto_id
                                 JOIN usuarios u
                                 ON u.usuario_id = c.usuario_id
                                 WHERE (p.usuario_id = $id_usuario) AND c.fecha BETWEEN '$fecha_ini' AND '$fecha_fin'")->result_array();
    }
}
