<?php
    if($_SERVER["QUERY_STRING"]){
        if(isset($_SERVER["Logout"])){
            $_COOKIE["newsP"];
            setcookie("newsU", '');
            setcookie("newsP", '');
            header("Location:index.php");
        }else{
            echo "Empty Action";
        }
    }else{
        echo "Empty Action";
    }
?>
