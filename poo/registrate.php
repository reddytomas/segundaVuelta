<?php
  //Esto hace que veamos las funciones creadas
  require_once("loader.php");
  require_once("helpers.php");
  require_once("controladores/funciones.php");
  if($_POST){

    $errores = validar($_POST,$_FILES);
   if(count($errores)==0){
     $avatar = armarAvatar($_FILES);
     $registro = armarRegistro($_POST,$avatar);
     guardarRegistro($registro);

     //De n o excistir errores en la información tipeada por el usuario entonces lo redirecciono a donde yo desee.
     header("location:login.php");
   }
  }
?>

//de aca borre esto if($_POST){
  //primer paso - entra el post del usuario y crea la clase.
 $usuario  = new Usuario($_POST['nombre'],$_POST['apellido'],$_POST['userName'],$_POST['email'],$_POST['password'],$_POST['passwordRepeat'], $_FILES);
 //segundo paso - la clase se valida con el llamado a la clase validador con sus metodos
 $errores = $validarUsuario->validar($usuario);
 //tercer - paso - si no hay errores, se fija en la base jason si encuentra el mail. Si el mail llega a ser igual a "nulo" se arma el registro con el $registro con el $_POST y el $avatar.
 if(count($errores)==0){
  $usuarioEncontrado = $json->buscar($usuario->getEmail());
  if($usuario = null){
    $avatar = $registro->armarAvatar($usuario->getAvatar());
    $registro = armarRegistro($_POST,$avatar);
    guardarRegistro($registro);
  }else{
    //si no es igual a nulo te devuelve este mensaje
    $errores["email"]="usted ya es un usuario";

    }
    header("location:login.php");
    exit;


}
}
?>

<html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fuentes y nuestro stylesheet -->
    <link href="https://fonts.googleapis.com/css?family=Ceviche+One|Sedgwick+Ave|Sedgwick+Ave+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Playfair+Display|Raleway|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">

    <link rel="stylesheet" href="css/registrate.css">
    <title>Registro</title>
  </head>

<body>
  <div class="container-fluid m-0 p-0">
    <?php require_once 'parciales/header.php'; ?>
    <div><h1 id="caccount" class="_tituloPagina ml-1 mr-1  bg-light text-dark pl-3 mb-3  text-center">Crear una cuenta</h1></div>
    <main class="container">

      <br>
      <br>
      <div class="">
        <?php if(isset($errores)):?>
          <ul class="alert alert-danger">
            <?php foreach ($errores as $value) :?>
                <li><?=$value;?></li>
            <?php endforeach;?>
          </ul>
        <?php endif;?>

        <form id="formulario" class="form" name="formRegistro" novalidate action=""  method="POST" enctype="multipart/form-data">

          <p>
            <label for="nombre">
              Nombre:
            </label>
            <input type="text" required name="nombre" value= "<?=isset($errores['nombre'])? "":old('nombre') ;?>"  id="nombre">
          </p>
          <p>
            <label for="apellido">
              Apellido:
            </label>
            <input type="text" required name="apellido" value= "<?=isset($errores['apellido'])? "":old('apellido') ;?>"  required>
          </p>
          <p>
            <label for="email">
              Email:
            </label>
            <input type="email" required name="email" value= "<?=isset($errores['email'])? "":old('email') ;?>" required>
          </p>
          <p>
            <label for="userName">
              Username:
            </label>
            <input type="text" required name="userName" value= "<?=isset($errores['userName'])? "":old('userName') ;?>" required>
          </p>
          <p>
            <label for="password">
              Password:
            </label>
            <input type="password" required name="password" value= "<?=isset($errores['password'])? "":old('password') ;?>" required>
          </p>
          <p>
            <label for="passwordRepeat">
              Password again:
            </label>
            <input type="password" required name="passwordRepeat" value= "<?=isset($errores['passwordRepeat'])? "":old('passwordRepeat') ;?>" required>
          </p>
          <p>
            <label for="avatar">
              Avatar:
            </label>
            <input required name="avatar" type="file" value="" id="avatar" >
          </p>
          <button type="submit" class="btn btn-primary">Crear Cuenta</button>
        </form>
      </div>

    </main>
<br>
<!-- FOOTER con redes y nada mas -->
<?php require_once 'parciales/footer.php'; ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
