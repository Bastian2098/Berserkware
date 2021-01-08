<?php

require "persistencia/productoDAO.php";

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
    private $productoDAO;

    function Producto($_id="", $_numLote="", $_numSerie="", $_nombre="", $_marca="", $_precio="", $_categoria="", $_descripcion="", $_cantidad="", $_modelo="", $_linea=""){
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

    function getId(){
        return $this->id;
    }
    
    function getNumLote(){
        return $this->numLote;
    }

    function getNumSerie(){
        return $this->numSerie;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getMarca(){
        return $this->marca;
    }

    function getPrecio(){
        return $this->precio;
    }

    function getCategoria(){
        return $this->categoria;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function getCantidad(){
        return $this->cantidad;
    }

    function getModelo(){
        return $this->modelo;
    }

    function getLinea(){
        return $this->linea;
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