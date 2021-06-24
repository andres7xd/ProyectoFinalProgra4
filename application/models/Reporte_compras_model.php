<?php

class Reporte_compras_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_compras($usuario_id, $fecha_ini, $fecha_fin)
    {
        return $this->db->query("SELECT productos.nombre, compras.precio_producto, productos.costo_envio, compras.fecha, productos.producto_id
                                 FROM compras
                                 JOIN productos
                                 ON productos.producto_id = compras.producto_id
                                 WHERE compras.usuario_id = $usuario_id AND compras.fecha BETWEEN '$fecha_ini' AND '$fecha_fin'")->result_array();
    }


    function get_datos_grafico($usuario_id, $fecha_ini, $fecha_fin){
        return $this->db->query("SELECT productos.nombre, compras.precio_producto, productos.costo_envio,SUM(precio_producto), SUM(costo_envio)
        FROM compras
        JOIN productos
        ON productos.producto_id = compras.producto_id
        WHERE compras.usuario_id = $usuario_id AND compras.fecha BETWEEN '$fecha_ini' AND '$fecha_fin'
        GROUP BY productos.nombre")->result_array();
    }
}
