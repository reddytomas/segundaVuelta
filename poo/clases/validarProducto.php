<?php
class ValidarProducto{
    public function ValidadorProducto($producto){
        $errores = [];
        $marca = trim($producto->getMarca());
        if(empty($marca)){
            $errores['marca'] = "Campo requerido";
        }
        return $errores;
    }
}
