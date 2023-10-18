<?php
    require_once("../classes/Controlador.php");
    if(isset($_POST['id'])){
        echo Controlador::GetUploadPath($_POST['id']);
    }
?>