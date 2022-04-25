<?php
    require 'conexion.php';
    class InicioSesion extends Conexion{
        public function InicioSesion(){
            parent::__construct();
        }

        public function iniciarSesion($username, $pass){

            try{
                //$sql = "SELECT * FROM usuarios WHERE username = :usr AND password = :psw"; 
                $sql = "SELECT * FROM usuarios WHERE username = :usr"; 

                $resultado = $this->conexion_db->prepare($sql);
                
                //$resultado->execute(array(":usr"=>$username, ":psw"=>$pass ) );
                $resultado->execute(array(":usr"=>$username));

                    //---si hay filas con ese usuario, se verifica su contrasena---
                if($resultado->rowCount()>0){
                    while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                        //echo "Usuario: " . $registro['username'] . "Contras: " . $registro['password'];
                        $pass = md5($pass);
                        if ($pass==$registro['password']){
                            $response['error'] = false;
                            $response['message'] = 'Contraseña aceptada';
                            echo json_encode($response, JSON_UNESCAPED_UNICODE);
                        }else{
                            $response['error'] = true;
                            $response['message'] = 'Contraseña incorrecta';
                            echo json_encode($response, JSON_UNESCAPED_UNICODE);
                        }
                    }
                }else{
                    $response['error'] = true;
                    $response['message'] = 'Usuario no encontrado';
                    echo json_encode($response, JSON_UNESCAPED_UNICODE);
                }
                
            
                $resultado->closeCursor();
            }catch(Exception $e){
                echo "Error: " . $e->getMessage();
            }
            
            $this->conexion_db = null;
        }
        
    }
?>