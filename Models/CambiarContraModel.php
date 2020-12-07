<?php 


    require_once $_SERVER['/var/www/html'] .'db/db.php';
    //Se crea clase CambiarContraModel
    class CambiarContraModel{
        private $db;
        private $cambiarContra;
        public $cambiarContra_exitoso; 
        
        //Se conecta la base de datos y se establecen los tipos de variables
        public function __construct()
        {
            $this->db = db::conexion();
            $this->cambiarContra = array();
            $this->cambiarContra_exitoso = False; 
        }

        //Se crea la funcion cambiarContrasena
        public function cambiarContrasena($datos){
            //Se definen variables
            $correo = $datos['correo'];
            $nueva_contra = $datos['nueva_contra'];
            $verif_nueva_contra = $datos['verif_nueva_contra'];
            //Se crea una condicional para ver si las contraseñas ingresadas coinciden, si no coinciden se muestra un mensaje de error
            if ($nueva_contra!=$verif_nueva_contra){
                header("location:/Views/Layouts/cambiar_contrasena_fallido.php");
            }
            //En caso tal que las contraseñas coincidan, se procede a verificar que el correo exista en el sistema
            else{

            try {
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

            } catch(Exception $e) {
                echo 'Error encontrado: ', $e->getMessage(), "\n";
            }
            //Si el correo no existe en la base de datos, cambiarContra_existoso se quedara en falso
                if(mysqli_num_rows($result_correo)==0){
                    $this -> cambiarContra_exitoso = FALSE;
                }
            //Si el correo existe en la base de datos, cambiarContra_existoso se pasara a ser verdadero
                else{
                    if($this->db->query($sql_contra)==True){
                        $this -> cambiarContra_exitoso = True;
                    }
            //Cualquier otro error dejara cambiarContra_existoso en falso
                    else{
                        $this -> cambiarContra_exitoso = False;
                    }
                }
                
            }
        }
    }
?>