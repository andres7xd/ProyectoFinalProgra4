<?php

class Product_model extends CI_Model
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

    function get_producto($id_producto){// Obtiene la informacion de los productos mas vendidos

        return $this->db->query("SELECT productos.nombre, productos.descripcion, productos.fecha_publicacion, productos.unidades, productos.ubicacion_actual, productos.precio, productos.tiempo_envio, productos.costo_envio, categorias.categoria, productos.unidades_vendidas, usuarios.nombre_real
        FROM productos
        join usuarios
        on productos.usuario_id = usuarios.usuario_id
        join categorias
        on categorias.categoria_id = productos.categoria_id
        WHERE productos.producto_id = $id_producto")->result_array();

    }
}