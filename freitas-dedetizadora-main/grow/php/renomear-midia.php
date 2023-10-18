<?php
    require_once("../classes/RenomearArquivo.php");
    require_once("../classes/Erros.php");
    if(isset($_POST['newName'], $_POST['oldName'], $_POST['extensao'])){
        $renomear = new RenomearArquivo($_POST['newName'], $_POST['oldName'], $_POST['extensao']);
        $renomear->Verify();
        $renomear->Rename();
        
        echo ErrosRenomearArquivo::$ErrList[$renomear->status];
    }
?>