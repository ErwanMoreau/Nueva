<?php 

    if(isset($_GET['id']) && array_key_exists($_GET['id'], $arr_content)){
        if($_GET['id'] >= 100){
            require 'app/'.$arr_content[$_GET['id']].'.php'; // permet de determiner la page q'uil faut recuperer
        }else {
            require 'view/'.$arr_content[$_GET['id']].'.php'; // permet de determiner la page q'uil faut recuperer
        }
        

    }else{
        require 'view/'.$arr_content[1].'.php';
    }