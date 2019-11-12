//este archivo es un back up de funciones que no queremos eliminar pero no son parte del rpoyecto

<?php

class usuario{
  private $nombre;
  private $apellido;
  private $userName;
  private $email;
  private $password;
  private $passwordRepeat;

  public function __construct($nombre,$apellido,$email,$userName,$password,$passwordRepeat){
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->userName = $userName;
    $this->email = $email;
    $this->password = $password;
    $this->passwordRepeat = $passwordRepeat;
}
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }
  public function setApellido($apellido)
  {
    $this->apellido = $apellido;
  }
  public function setuserName($userName)
  {
    $this->userName = $userName;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function setpassword($password)
  {
    $this->password = $password;
  }
  public function setpasswordRepeat($passwordRepeat)
  {
    $this->passwordRepeat = $passwordRepeat;
  }
  public function getNombre($nombre){
    return $this->nombre;
  }
  public function getApellido($apellido){
    return $this->apellido;
  }
  public function getUserName($userName){
    return $this->userName;
  }
  public function getEmail($email){
    return $this->email;
  }
  public function getPassword($password){
    return $this->password;
  }
  public function getPasswordRepeat($passwordRepeat){
    return $this->passwordRepeat;
  }

  public function hashContraseña(){
    if(is_numeric($this->getContraseña())){
      password_hash($contraseña,PASSWORD_DEFAULT);
    }}


}
 ?>


 $errores = $validarUsuario->validar($usuario);
 if(count($errores)==0){
  $usuarioEncontrado = $json->buscar($usuario->getEmail());
  if($usuario = null){
    $errores["email"]="Usuario ya registrado";
  }else{
    $avatar = $registro->armarAvatar($usuario->getAvatar());
    $registro = armarRegistro($_POST,$avatar);
    guardarRegistro($registro);
