<?php

class Factura_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function ultimo_numero_compra($usuario_id)
    {
        return $this->db->query("SELECT compras.numero_compra
                                 FROM compras
                                 WHERE compras.usuario_id = $usuario_id
                                 ORDER BY compras.numero_compra DESC
                                 LIMIT 1")->result_array();
    }

    function get_factura($numero_compra)
    {
        return $this->db->query("SELECT productos.nombre, compras.precio_producto, productos.costo_envio, compras.fecha
                                 FROM compras
                                 JOIN productos
                                 ON productos.producto_id = compras.producto_id
                                 WHERE compras.numero_compra = $numero_compra")->result_array();
    }
}
