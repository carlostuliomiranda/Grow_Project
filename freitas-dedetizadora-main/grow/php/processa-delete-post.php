<?php
    require_once("../classes/Post.php");

    $id = $_POST['id'];
    if(isset($id) && $id > 0){
        $post = new Post($id);
        echo $post->Delete();
    }else
        echo 0;
?>