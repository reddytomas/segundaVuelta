<?php
class Consulta{
    //Este método muestra el listatdo de todas las películas
    public function listarProductos($bd,$productos){
        $sql = "select * from $productos";
        $query = $bd->prepare($sql);
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $productos;
    }
    //Método para listar los generos, estos son usudados luego tanto en agregar como en editar películas
    public function listarUsuarios($bd,$usuarios){
        $sql = "select * from $usuarios";
        $query = $bd->prepare($sql);
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }
    //Método para agregar una nueva película
    public function guardarProducto($bd,$movies,$pelicula){
        $sql = "insert into $movies (title,rating,awards,release_date,length,genre_id) values (:title,:rating,:awards,:release_date,:length,:genre_id)";
        $query = $bd->prepare($sql);
        $query->bindValue(':title',$pelicula->getTitle());
        $query->bindValue(':rating',$pelicula->getRating());
        $query->bindValue(':awards',$pelicula->getAwards());
        $query->bindValue(':release_date',$pelicula->getReleaseDate());
        $query->bindValue(':length',$pelicula->getLength());
        $query->bindValue(':genre_id',$pelicula->getGenre());
        $query->execute();
        header('location:index.php');
    }
    //Este método muestra el detalle de una película selecciona de la lista por parte del usuario
    public function detalleProducto($bd,$productos,$usuarios,$id){
        $sql = "select $productos.*,$usuarios.nombre from $productos,$usuarios where $productos.usuarios_id =$usuarios.id and $productos.id = $id";
        $query = $bd->prepare($sql);
        $query->execute();
        $productos = $query->fetch(PDO::FETCH_ASSOC);

        return $productos;
    }
    //Este es el método que controla la busqueda de las películas
    public function buscarProducto($bd,$tabla,$busqueda){
        $sql = "select * from $tabla where marca like :busqueda";
        $query = $bd->prepare($sql);
        $query->bindValue(':busqueda',"%".$busqueda."%");
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $productos;
    }
    //Este método controla el borrado de la película que el usuario selecione
    public function borrarProducto($bd,$productos,$id){
        $sql = "delete from $productos where id = :id";
        $query = $bd->prepare($sql);
        $query->bindvalue(':id',$id);
        $query->execute();
    }
    //Método para realizar la edición o modificación de los datos de alguna película
    public function actualizarProducto($bd,$movies,$pelicula,$id){
        $sql = "update $movies set title=:title,rating=:rating,awards=:awards,release_date=:release_date, length=:length,genre_id=:genre_id where $movies.id=$id";
        $query = $bd->prepare($sql);
        $query->bindValue(':title',$pelicula->getTitle());
        $query->bindValue(':rating',$pelicula->getRating());
        $query->bindValue(':awards',$pelicula->getAwards());
        $query->bindValue(':release_date',$pelicula->getReleaseDate());
        $query->bindValue(':length',$pelicula->getLength());
        $query->bindValue(':genre_id',$pelicula->getGenre());
        $query->execute();
        header('location:index.php');
      }

}
