<?php
    function br(){
        return "<br>";
    }
    function h1($cadena){
        return "<h1>".$cadena."</h1>";
    }
    function p($cadena){
        return "".$cadena."";
    }
    function self(){
        return highlight_file( $_SERVER['SCRIPT_FILENAME']);
    }
    function letraDni($dni){
        $letras = array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');
        return $letras[$dni%23];
    }
    function generarAleatorios(&$list,$numeroMin,$numeroMax,$numerosGenerados,$repetir){

        for($i=0;$i<$numerosGenerados;$i++){
            $numero=random_int($numeroMin,$numeroMax);
            if($repetir){
                $list[$i]=$numero;
            }else{
                do{
                    $numero= random_int($numeroMin,$numeroMax);
                } while(in_array($numero,$list));
                $list[$i]=$numero;
            }
        }
    }
    ?>