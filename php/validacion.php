<?php
    function validar($datos){
        //borrar caracteres innecesarios (espacios o saltos de linea)
        $datos =trim($datos);
        //remover barras invertidas
        $datos =stripslashes($datos);
        //convertir caracteres especiales a entidades html
        $datos = htmlspecialchars($datos);
        //retornar datos seguros (evitando ataques)
        return $datos;
    }
?>