<?php

require_once('./Controllers/UsuarioController.php');

$datos=[];
$datos['nombre_us']=$_POST['nombre'];
$datos['apellido_us']=$_POST['apellido'];
$datos['correo']=$_POST['correo'];
$datos['cedula_us']=$_POST['cedula'];
$datos['contrasena']=$_POST['contra'];
$datos['telefono']=$_POST['numero_contacto'];
$datos['id_tipo_us']=$_POST['1'];
$datos['facultad']=$_POST['facultad'];  



$ingresar_datos=new UsuarioController();
$ingresar_datos->registrar($datos);








?>