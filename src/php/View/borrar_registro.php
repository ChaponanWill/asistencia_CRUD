<?php
// AQUÍ DEBERÍA EVALUAR SI LA SESIÓN ESTÁ ABIERTA
include("../Model/conexion_bbdd.php");
$id_alumno = $_GET['id_alumno'];
$sql = "delete from datos_alumno where id_alumno='$id_alumno'";
$base->query($sql);
echo "
    <script>
        alert('USUARIO ELIMINADO CORRECTAMENTE ...');
        window.location.href='crud.php'
    </script>
    ";
?>