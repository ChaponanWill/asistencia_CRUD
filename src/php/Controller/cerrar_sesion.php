<!-- Verlo después para las sesiones -->
<?php
    echo "<script>alert('Gracias por tu visita ... ')</script>";
    session_start();
    session_destroy();
    echo "<script>window.location.href='../../index.html'</script>";
    
?>