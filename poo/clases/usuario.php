<?php
class Usuario{
    private $nombre;
    private $apellido;
    private $userName;
    private $email;
    private $password;
    private $passwordRepeat;
    private $avatar;

<<<<<<< HEAD
    public function __construct($nombre,$apellido,$userName,$email,$password,$passwordRepeat, $avatar){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->avatar = $avatar;
    }
=======
class Usuario
{
  private $nombre;
  private $apellido;
  private $userName;
  private $email;
  private $password;
  private $passwordRepeat;
>>>>>>> d9271b603563e77201eabfcc17cc703ff8f033c1

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellid;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getPasswordRepeat(){
        return $this->passwordRepeat;
    }
    public function getAvatar(){
        return $this->avatar;
    }


    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setuserName($userName){
        $this->userName = $userName;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setpassword($password){
        $this->password = $password;
    }
    public function setpasswordRepeat($passwordRepeat){
        $this->passwordRepeat = $passwordRepeat;
    }
    public function setAvatar($passwordRepeat){
        $this->passwordRepeat = $passwordRepeat;
    }



}
