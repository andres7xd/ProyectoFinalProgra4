<?php

class Edit_product_model extends CI_Model
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

        return $this->db->query("SELECT productos.producto_id, productos.nombre, productos.descripcion, productos.fecha_publicacion, productos.unidades, productos.ubicacion_actual, productos.precio, productos.tiempo_envio, productos.costo_envio, productos.categoria_id, categorias.categoria, productos.unidades_vendidas, usuarios.nombre_real
        FROM productos
        join usuarios
        on productos.usuario_id = usuarios.usuario_id
        join categorias
        on categorias.categoria_id = productos.categoria_id
        WHERE productos.producto_id = $id_producto")->result_array();
    }

    function get_fotos_producto($id_producto){// Obtiene la lista de fotos de los productos
        return $this->db->query("SELECT fotos.foto
        FROM fotos
        WHERE fotos.producto_id = $id_producto")->result_array();

    }

    function add_photo($params)
    {
        $this->db->insert('fotos', $params);
        return $this->db->insert_id();
    }

    function get_categorias()
    {
        return $this->db->query("SELECT categorias.categoria_id, categorias.categoria
        FROM categorias")->result_array();
    }

    function update_producto($id_producto, $params){
        $this->db->where('producto_id', $id_producto);
        $this->db->update('productos', $params);
    }

    function get_categoria_edit($nombre)
    {
        $nomb = $this->db->query("SELECT categorias.categoria_id, categorias.categoria
        FROM categorias
        WHERE categorias.categoria = $nombre");
        return $nomb;
    }

    function add_notificacion($notificacion){
        $this->db->insert('notificaciones', $notificacion);
        return $this->db->insert_id();  
    }

    function get_lista_deseadores($id_producto){
        return $this->db->query("SELECT * 
        FROM deseos
        JOIN usuarios
        ON usuarios.usuario_id = deseos.usuario_id
        where deseos.producto_id = $id_producto")->result_array();
    }

    function get_lista_comentarios($id_producto){
        return $this->db->query("SELECT *
        FROM calificaciones_productos
        JOIN usuarios
        ON calificaciones_productos.usuario_id = usuarios.usuario_id
        WHERE calificaciones_productos.producto_id = $id_producto")->result_array();
    }
    
}