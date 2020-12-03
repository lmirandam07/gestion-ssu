<?php

function registrarUsuario(){
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
$datos['validC']=$_POST['validarC']; 

$ingresar_datos=new UsuarioController();
$ingresar_datos->registrar($datos);
}

if(strpos($_SERVER['HTTP_REFERER'],'/registrar.php')){
    registrarUsuario();
}








?>