<?php

class usuario
{
  private $nombre;
  private $apellido;
  private $userName;
  private $email;
  private $password;
  private $passwordRepeat;

  public function __construct(string $nombre, string $apellido, string $email, string $userName, int $password, int $passwordRepeat)
  {
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
