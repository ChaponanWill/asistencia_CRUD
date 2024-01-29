<?php
if(isset($_POST["registrar"])){
    $nombre_usuario=$_POST["nombre_usuario"];
    $password_usuario=$_POST["password_usuario"];
    //encriptar contraseña
    $password_cifrado=password_hash($password_usuario, PASSWORD_DEFAULT, ["cost"=>12]);
    try{
        include("../Model/conexion_bbdd.php");
        //consulta
        $sql="insert into datos_usuario (nombre_usuario, password_usuario) values (:nombre_usuario, :password_usuario) ";
        //preparamos la consulta
        $resultado=$base->prepare($sql);
        //tomamos las variables y pasamos sus valores
        $resultado->execute([":nombre_usuario"=>$nombre_usuario, ":password_usuario"=>$password_cifrado]);
        //alerta de registro
        echo "<script>alert('USUARIO REGISTRADO!')</script>";
        $resultado->closeCursor();
    }catch(Exception $e){
        die("<p>Algo salió mal ..." . $e->getMessage() . "</p>");
    }finally{
        $base=null;
        //volver a la página principal
        echo "<script>window.location.href='../../signup.php'</script>";
    }
}else{
    echo "<script>alert('Hola, Ingresa un usuario')</script>";
    echo "<script>window.location.href='../../signup.php'</script>";
}
?>