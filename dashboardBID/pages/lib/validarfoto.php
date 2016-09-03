<?php
function validarFoto($nombre){
    global $dirSubida;
    global $rutaSubida;
    global $error;
    
    $dirSubida="fotos/$nombre/";
    $foto=$_FILES['foto'];
    //var_dump($foto);
    $nombreFoto=$foto['name'];
    $nombreTmp=$foto['tmp_name'];
    $rutaSubida="{$dirSubida}profile.jpg";
    $extArchivo=preg_replace('/image\//','',$foto['type']);
    if($extArchivo=='jpeg'||$extArchivo=='png'||$extArchivo=='jpg'){
        if(!file_exists($dirSubida)){
        mkdir($dirSubida,0777);
        }
        if(move_uploaded_file($nombreTmp,$rutaSubida)){
            return true;
        }else{
            trigger_error("No se pudo subir el archivo.", E_USER_ERROR);
            //return false;
        }
     }else{
        /*trigger_error('No es un archivo de imagen válido', E_USER_WARNING );
        exit;
        return false; */
        trigger_error("No es un archivo de imagen válido.", E_USER_ERROR);
    }
    return $error;
}

?>