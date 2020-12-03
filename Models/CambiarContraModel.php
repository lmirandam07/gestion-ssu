<?php 


require_once $_SERVER['/var/www/html'] .'db/db.php';

class CambiarContraModel{
    private $db;
    private $cambiarContra;
    
    

    public function __construct()
    {
        $this->db = db::conexion();
        $this->cambiarContra = array(); 
    }


    public function cambiarContrasena($datos){
        $correo = $datos['correo'];
        $nueva_contra = $datos['nueva_contra'];
        $verif_nueva_contra = $datos['verif_nueva_contra'];

        if ($nueva_contra!=$verif_nueva_contra){
            header("location:../cambiar_contra.php");
        }
        else{
        $sql="UPDATE usuario
                SET
                    contrasena = '$nueva_contra'
                WHERE
                    correo = '$correo'";
        if($this->db->query($sql)==True){
            echo 'Exitoso';
        }
        else{
            echo 'No exitoso';
        }
        }
    }

}
?>