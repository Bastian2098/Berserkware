<?php

class Producto{

    private $id;
    private $numLote;
    private $numSerie;
    private $nombre;
    private $marca;
    private $precio;
    private $categoria;
    private $descripcion;
    private $cantidad;
    private $modelo;
    private $linea;

    function Producto($_id, $_numLote, $_numSerie, $_nombre, $_marca, $_precio, $_categoria, $_descripcion, $_cantidad, $_modelo, $_linea){
        $this->id = $_id;      
        $this->numLote = $_numLote;
        $this->numSerie = $_numSerie;
        $this->nombre = $_nombre;
        $this->marca = $_marca;
        $this->precio = $_precio;
        $this->categoria = $_categoria;
        $this->descripcion = $_descripcion;
        $this->cantidad = $_cantidad;
        $this->modelo = $_modelo;
        $this->linea = $_linea;
    }

    function crearProducto(){
        return null;
    }

    function modificarProducto(){
        return null;
    }

    function eliminarProducto(){
        return null;
    }

    function consultarProducto(){
        return null;
    }

}

?>
