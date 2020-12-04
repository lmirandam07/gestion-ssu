<?php 


    require_once $_SERVER['/var/www/html'] .'db/db.php';

    class CambiarContraModel{
        private $db;
        private $cambiarContra;
        public $cambiarContra_exitoso; 
        

        public function __construct()
        {
            $this->db = db::conexion();
            $this->cambiarContra = array();
            $this->cambiarContra_exitoso = False; 
        }


        public function cambiarContrasena($datos){
            $correo = $datos['correo'];
            $nueva_contra = $datos['nueva_contra'];
            $verif_nueva_contra = $datos['verif_nueva_contra'];

            if ($nueva_contra!=$verif_nueva_contra){
                header("location:/Views/Layouts/cambiar_contrasena_fallido.php");
            }
            else{
            $sql_correo="SELECT correo
                        FROM usuario
                            WHERE
                            correo = '$correo';";
            $sql_contra="UPDATE usuario
                    SET
                        contrasena = '$nueva_contra'
                    WHERE
                        correo = '$correo'";
            $result_correo=$this->db->query($sql_correo);
                if(mysqli_num_rows($result_correo)==0){
                    $this -> cambiarContra_exitoso = FALSE;
                }
                else{
                    if($this->db->query($sql_contra)==True){
                        $this -> cambiarContra_exitoso = True;
                    }
                    else{
                        $this -> cambiarContra_exitoso = False;
                    }
                }
                
            }
        }
    }
?>