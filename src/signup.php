<!-- Verlo después para las sesiones -->
<!-- <?php
    session_start();
    if(!isset($_SESSION['nombre_usuario'])){
        echo"
        <script>alert('INICIA SESIÓN')</script>
        <script>window.location.href='index.html'</script>
        ";
    }
?> -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="flex bg-cream">
    <div class="formulario mx-auto flex w-1/2">

        <div class="imagen">
            <img src="./assets/signup.svg" alt="" class="h-screen">
        </div>

        <form action="./php/Controller/registrar_usuario.php" method="post" class="p-5 my-auto drop-shadow-xl box-border">

            <div class="login flex justify-center mb-5">
                <h1 class="font-montserrat">Registrarse</h1>
            </div>

            <div class="usuario mb-5">                
                <label for="user">Usuario:</label>
                <input type="text" id="user" name="nombre_usuario" placeholder="Neptune" required autofocus autocomplete="off">
            </div>

            <div class="password mb-5">
                <label for="password">Contraseña:</label>
                <input type="password" name="password_usuario" id="password_usuario" required>    
            </div>
            
            <div class="newuser mb-3">
                <p class="text-xs">¿Ya tienes cuenta? <a href="index.html" class="text-blue-700">Inicia Sesión</a></p>
            </div>

            <div class="button flex justify-center">
                <input type="submit" name="registrar" id="registrar" class="py-2 px-3 bg-orange-500 rounded-lg cursor-pointer" value="Registrarse">
            </div>
        </form>
    </div>
</body>
</html>