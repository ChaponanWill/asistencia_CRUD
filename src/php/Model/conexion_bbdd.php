<?php
try{
    $base=new PDO("mysql:host=localhost; dbname=crud_asistencia","root","");
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$base->exec("SET NAMES utf8");
}catch(exception $e){
    die("<p>ERROR: " . $e->getMessage() ."</p>");
}
?>