<!-- COMPROBAR USUARIO REGISTRADO CON CONTRASEÑA ENCRIPTADA, SOLO PONER EN EL WHERE AL USUARIO -->
<?php
if (isset($_POST["enviar"])) {
    try {
        $nombre_usuario = htmlentities(addslashes($_POST["nombre_usuario"]));
        $password_usuario = htmlentities(addslashes($_POST["password_usuario"]));
        //crear un contador para saber si el login esta en la base de datos
        $contador = 0;
        //instanciar
        include("../Model/conexion_bbdd.php");
        //consulta sql
        $sql = "select nombre_usuario, password_usuario from datos_usuario where nombre_usuario= :nombre_usuario";
        //Preparamos la consulta
        $resultado = $base->prepare($sql);
        //ejecutamos la consulta con el array y parámetros
        $resultado->execute([":nombre_usuario" => $nombre_usuario]);
        //comprobar usuario y contraseña
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            //verificar si el registro concuerda la contraseña y el usuario, con password_verify()
            if (password_verify($password_usuario, $registro['password_usuario'])) {
                $contador++;
            }
        }
        //evaluar si hay usuarios registrados
        if ($contador != 0) {            
            // Verificar si la sesión no está activa
            if (session_status() == PHP_SESSION_NONE) {
                // No hay una sesión activa, entonces la iniciamos
                session_start();
            }
            // Verificar si la sesión está iniciada
            if (!isset($_SESSION['nombre_usuario'])) {
                $_SESSION['nombre_usuario']=$nombre_usuario;
            } 
            echo "<script>alert('BIENVENIDO')</script>";
            echo "<script>window.location.href='../View/crud.php'</script>";
        } else {
            //sino encontró usuario le redirigimos a vuelta iniciar sesión
            echo "<script>alert('USUARIO INCORRECTO')</script>";
            echo "<script>window.location.href='../../index.html'</script>";
        }
    } catch (Exception $e) {
        die("<p>Algo salió mal ..." . $e->getMessage() . "</p>");
    }
} else {
    //Mandar al login
    echo "<script>alert('Hola, Identificate!')</script>";
    echo "<script>window.location.href='../../index.html'</script>";
}
?>