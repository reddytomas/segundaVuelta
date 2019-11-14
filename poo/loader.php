<?php
require_once('helpers.php');
require_once('clases/usuario.php');
require_once('clases/validador.php');
require_once('clases/baseDato.php');
require_once('clases/baseJson.php');
require_once("clases/armador.php");
require_once("clases/Consulta.php");
require_once("clases/encriptador.php");
require_once("clases/basemysql.php");
require_once("clases/validarProducto.php");
require_once("clases/Producto.php");


$validarUsuario = new Validador();
$json = new BaseJson("usuarios.json");
$registro = new armador();
$bd = BaseMysql::conexion();
$consulta = new Consulta();
$validar = new ValidarProducto();
