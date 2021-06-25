<?php

class Home_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_fotos_producto()
    {
        return $this->db->query("SELECT *
        FROM fotos
        JOIN productos
        ON fotos.producto_id = productos.producto_id")->result_array();
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
        WHERE productos.unidades_vendidas != 0  
        ORDER BY productos.unidades_vendidas DESC")->result_array();

    }

    function get_calificacion(){
        return $this->db->query("SELECT *
                                 FROM calificaciones_productos")->result_array();
    }

    function get_calificacion_tienda(){
        return $this->db->query("SELECT *
                                 FROM calificaciones_tiendas")->result_array();
    }

    function buscar_productos($data)
    {
        return $this->db->query("SELECT productos.nombre, productos.unidades, productos.precio, productos.unidades_vendidas, productos.producto_id, usuarios.nombre_real
                                 FROM productos
                                 JOIN usuarios
                                 ON productos.usuario_id = usuarios.usuario_id
                                 WHERE  productos.nombre LIKE '%" . $data . "%'
                                 ORDER BY productos.unidades_vendidas DESC")->result_array();
    }

    function buscar_tiendas($data)
    {
        return $this->db->query("SELECT usuarios.usuario_id, usuarios.cedula, usuarios.nombre_usuario, usuarios.nombre_real, usuarios.direccion, usuarios.telefono, usuarios.email,usuarios.foto
                                 FROM usuarios
                                 WHERE usuarios.tipo_usuario = 'Empresa'
                                 AND usuarios.nombre_real LIKE '%" . $data . "%'
                                 ORDER BY usuarios.nombre_real ASC")->result_array();
    }

}