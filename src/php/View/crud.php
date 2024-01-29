<!-- Verlo después para las sesiones -->
<!-- <?php
        // Verificar si la sesión no está activa
        // session_start();
        // // Verificar si la sesión está iniciada
        // if(isset($_SESSION['nombre_usuario'])){
        //     echo "<p>Bienvenido, " . $_SESSION['nombre_usuario'] . "!</p>";
        // }else{
        //     echo "
        //     <script>alert('Debes iniciar Sesión');
        //     window.location.href='../../index.html'
        //     </script>
        //     ";
        // } 
        ?> -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD ALUMNOS PHP</title>
    <link rel="stylesheet" href="../../css/estilos.css">
</head>

<body>
    <?php
    include("../Model/conexion_bbdd.php");
    //devuelva el array 
    $sql = "select * from datos_alumno";
    $registros = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
    // Cógigo para ingresar registros
    if (isset($_POST["registrar"])) {
        $nombre_alumno=$_POST["nombre_alumno"];
        $apellido_alumno=$_POST["apellido_alumno"];
        $grado_alumno=$_POST["grado_alumno"];
        $seccion_alumno=$_POST["seccion_alumno"];
        $nota_alumno=$_POST["nota_alumno"];
        //preparar consulta SQL para evitar inyecciones
        $sql="insert into datos_alumno (nombre_alumno, apellido_alumno, grado_alumno, seccion_alumno, nota_alumno) values 
                (:nombre_alumno, :apellido_alumno, :grado_alumno, :seccion_alumno, :nota_alumno)";
        $resultado=$base->prepare($sql);
        $resultado->execute([":nombre_alumno"=>$nombre_alumno, ":apellido_alumno"=>$apellido_alumno, ":grado_alumno"=>$grado_alumno, ":seccion_alumno"=>$seccion_alumno, ":nota_alumno"=>$nota_alumno]);
        // enviar un mensaje de registro exitoso y actualizar la página
        echo "<script>
            alert('Registro ingresado correctamente');
            window.location.href='crud.php';
        </script>";

    }
    ?>
    <!-- Formulario para insertar registros en la misma página, es decir que la redirija -->
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <table class="border-collapse border-solid mx-auto">
            <thead>
                <tr>
                    <th class="border border-cream px-4 py-2">ID</th>
                    <th class="border border-cream px-4 py-2">Nombre</th>
                    <th class="border border-cream px-4 py-2">Apellido</th>
                    <th class="border border-cream px-4 py-2">Grado</th>
                    <th class="border border-cream px-4 py-2">Sección</th>
                    <th class="border border-cream px-4 py-2">Nota</th>
                    <th colspan="2" class="border border-cream px-4 py-2">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- AQUÍ EL BUCLE PARA BORRAR REGISTRO-->
                <?php foreach ($registros as $valor) : ?>
                    <tr>
                        <td class="border border-cream px-4 py-2"><?php echo $valor->id_alumno ?></td>
                        <td class="border border-cream px-4 py-2"><?php echo $valor->nombre_alumno ?></td>
                        <td class="border border-cream px-4 py-2"><?php echo $valor->apellido_alumno ?></td>
                        <td class="border border-cream px-4 py-2"><?php echo $valor->grado_alumno ?></td>
                        <td class="border border-cream px-4 py-2"><?php echo $valor->seccion_alumno ?></td>
                        <td class="border border-cream px-4 py-2"><?php echo $valor->nota_alumno ?></td>
                        <td class="border border-cream px-4 py-2"> <input type='button' class="button py-1 px-2 bg-green-500 rounded-lg cursor-pointer" name="editar" value="Editar"></td>
                        <td class="border border-cream px-4 py-2"><a href="borrar_registro.php?id_alumno=<?php echo $valor->id_alumno ?>"><input type='button' class="button py-1 px-2 bg-red-500 rounded-lg cursor-pointer" name="borrar" value="Borrar"></a></td>
                    </tr>
                <?php endforeach; ?>
                <!-- AQUÍ INGRESAR UN REGISTRO -->
                <tr>
                    <td class="border border-cream px-4 py-2"><?php echo ($valor->id_alumno) + 1 ?></td>
                    <td class="border border-cream px-4 py-2"><input type="text" required autocomplete="off" placeholder="Ingrese Nombre" autofocus name="nombre_alumno"></td>
                    <td class="border border-cream px-4 py-2"><input type="text" required autocomplete="off" placeholder="Ingrese Apellido" autofocus name="apellido_alumno"></td>
                    <td class="border border-cream px-4 py-2"><select class="p-2" name="grado_alumno" id="grado">
                            <option value="1°">1°</option>
                            <option value="2°">2°</option>
                            <option value="3°">3°</option>
                            <option value="4°">4°</option>
                            <option value="5°">5°</option>
                        </select></td>
                    <td class="border border-cream px-4 py-2"><select name="seccion_alumno" id="seccion">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select></td>
                    <td class="border border-cream px-4 py-2"><input type="number" name="nota_alumno" pattern="\d+(\.\d{1,2})?" step="0.01" inputmode="numeric" required autocomplete="off" placeholder="Ingrese Nota" oninput="validarInputEdad(event)"></td>
                    <td class="border border-cream px-4 py-2 text-center" colspan="2"><input class="button py-1 px-6 bg-blue-500 rounded-lg cursor-pointer" type="submit" name="registrar" value="Registrar"></td>
                </tr>
            </tbody>
        </table>
    </form>
    <br><br><br><br>
    <a href="../Controller/cerrar_sesion.php">
        <h5>Cerrar sesión</h5>
    </a>



    <script>
        function validarInputEdad(event) {
            const input = event.target;
            input.setCustomValidity('');

            // Verificar si la entrada contiene la letra "e"
            if (input.value.includes('e')) {
                input.setCustomValidity('No se permite la letra "e".');
            }
        }
    </script>
</body>

</html>