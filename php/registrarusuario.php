<?php
    require 'conexion.php';
    class RegistrarUsuario extends Conexion{
        public function RegistrarUsuario(){
            parent::__construct();
        }

        public function insertarUsuario($username, $fullname, $pass, $tipoUsuario){
            //array de respuesta que sera enviado
            $response = array();

            $sql = "INSERT INTO Usuarios (username, nombreCompleto, password, tipoUsuario_idtipoUsuario)
            values (:username, :fullname, :pass, :tipoUsuario) ";


            try{
                $sentencia = $this->conexion_db->prepare($sql);
                //declarando los marcadores para ejecutar
                $sentencia->execute(array(':username'=>$username, ':fullname'=>$fullname,
                                            ':pass'=>md5($pass), ':tipoUsuario'=>$tipoUsuario));
                $sentencia->closeCursor();
                
                //echo "Registrado";
                $response['error'] = false;
                $response['message'] = 'Usuario registrado!';
            }catch(Exception $e){
                //echo "Error: " . $e->getMessage();
                $response['error'] = true;
                $response['message'] = 'No se pudo agregar usuario. '. $e->getMessage();
            }
    
            $this->conexion_db = null;
            //mostrar info en json
            echo json_encode($response);     
        }
        
    }
?>