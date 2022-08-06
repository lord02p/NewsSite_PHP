<?php 
    session_start();
    if(isset($_SESSION["email"])){
        header("Location:admin/post.php");
    }else{
        header("Location:admin/loginn.php?action=true");
    }
?>