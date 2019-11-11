<?php
class Producto{
  private $marca;
  private $categoria;
  private $talle;
  private $precio;
  public function __construct($marca,$categoria,$talle,$precio){
      $this->marca = $marca;
      $this->categoria = $categoria;
      $this->talle = $talle;
      $this->precio = $precio;
  }
  //Getters
  public function getMarca(){
      return $this->marca;
  }
  public function getCategoria(){
      return $this->categoria;
  }
  public function getTalle(){
      return $this->talle;
  }
  public function getPrecio(){
      return $this->precio;
  }
  //Setters
  public function setMarca($marca){
      $this->marca = $marca;
  }
  public function setCategoria($categoria){
      $this->categoria = $categoria;
  }
  public function setTalle($talle){
      $this->talle = $talle;
  }
  public function setPrecio($precio){
      $this->precio = $precio;
  }
}

 ?>
