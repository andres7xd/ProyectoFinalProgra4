<?php

class Reporte_ofertas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_ofertas($categoria, $fecha_ini, $fecha_fin, $precio_ini, $precio_fin)
    {
        return $this->db->query("SELECT *
                                FROM productos
                                JOIN categorias
                                on productos.categoria_id = categorias.categoria_id
                                WHERE categorias.categoria = '$categoria' and productos.fecha_publicacion BETWEEN '$fecha_ini' and '$fecha_fin' AND 
                                productos.precio BETWEEN $precio_ini and $precio_fin")->result_array();
    }


}