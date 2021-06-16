<?php

class Carrito_model extends CI_Model
{
    public $cant_maxima = array();
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

    function get_producto($id_usuario){// Obtiene la informacion de los productos mas vendidos

        return $this->db->query("SELECT carritos.carrito_id, carritos.usuario_id, carritos.producto_id, carritos.cantidad_productos, productos.nombre, productos.ubicacion_actual, productos.costo_envio, productos.precio, usuarios.nombre_real, productos.unidades
        FROM carritos
        join productos
        on productos.producto_id = carritos.producto_id
        join usuarios
        on productos.usuario_id = usuarios.usuario_id
        WHERE carritos.usuario_id = $id_usuario")->result_array();

    }

    function get_fotos_producto(){
        return $this->db->query("SELECT *
        FROM fotos
        JOIN productos
        ON fotos.producto_id = productos.producto_id")->result_array();
    }

    function delete($id_carrito)
    {
        $this->db->delete('carritos', array('carrito_id' => $id_carrito));

    }

    function aumentar_cantidad_producto($id_carrito,$cantidad,$cantidad_maxima)
    {
        

        if($cantidad <$cantidad_maxima){
            $cant_nueva = $cantidad +1;

            $this->db->query(" UPDATE carritos
            SET cantidad_productos = $cant_nueva
            WHERE carrito_id = $id_carrito");
        }
   
        
    }



    function disminuir_cantidad_producto($id_carrito,$cantidad)
    {
        

        if($cantidad >1){
            $cant_nueva = $cantidad -1;

            $this->db->query(" UPDATE carritos
            SET cantidad_productos = $cant_nueva
            WHERE carrito_id = $id_carrito");
        }
   
        
    }

    function get_tarjetas($id_usuario){
        return $this->db->query("SELECT *
        FROM tarjetas
     
        where tarjetas.usuario_id = $id_usuario")->result_array();
    }
   
    function add_compra($params)
    {
        $this->db->insert('compras', $params);
        return $this->db->insert_id();
    }

    function get_info_tarjeta($id_usuario, $contraseña){
        return $this->db->query("SELECT *
        FROM tarjetas
     
        where tarjetas.usuario_id = $id_usuario and tarjetas.codigo_cvv = '$contraseña'")->result_array();
    }
    function get_claves(){
        return $this->db->query("SELECT *
        FROM tarjetas")->result_array();
    }

    function update_saldo($tarjeta_id, $params)
    {
        $this->db->where('tarjeta_id', $tarjeta_id);
        return $this->db->update('tarjetas', $params);
    }

    function update_unidades_producto($id_producto, $params){
        $this->db->where('producto_id', $id_producto);
        return $this->db->update('productos', $params);
    }


}