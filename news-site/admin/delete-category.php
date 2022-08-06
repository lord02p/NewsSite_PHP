<?php
    session_start();
  if($_SESSION["user_role"] == '0'){
    echo "<h2 style='margin-top:1rem; text-align:center;'> Page Only Read Admin </h2>";
    header("Location:post.php");
 }else{
    if($_SERVER["QUERY_STRING"]){
        include "config.php";
        $id = $_GET["id"];
        $query = "DELETE FROM category WHERE category_id = '$id'";
        mysqli_query($conn, $query) or die("Coection Error, Pleace Try Again..");
        header("Location:category.php");
        mysqli_close($conn);
        
    }else{
        echo "<h1 style='margin-top:1rem; text-align:center; font-family: sans-serif;'> ID Undefined </h1>";
    }
}

?>