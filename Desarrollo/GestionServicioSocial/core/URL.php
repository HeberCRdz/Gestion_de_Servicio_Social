<?php

class URL {

    /* 
       Parametro 1 = Controlador
       Parametro 2 = Accion
       Parametro 3 = Datos(parametros) 
    */
    static function construir(){
        $param = func_get_args();
        $num = func_num_args();

        $url = "?controlador=".$param[0];
        if($num > 1){
            $url .= "&accion=".$param[1];
        }
        if($num > 2){
            foreach($param[2] as $clave=>$valor){
                $url .= "&$clave=$valor";
            }
        }
        return $url;
    }
}