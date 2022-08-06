<?php include "header.php";
  if($_SESSION["user_role"] == '0'){
    echo "<h2 style='margin-top:1rem; text-align:center;'> Page Only Read Admin </h2>";
    header("Location:post.php");
    die();
  }else{
    if($_SERVER["QUERY_STRING"]){
        include "config.php";
        $id = $_GET["id"];
        $cid = $_GET["cid"];
        $query = "DELETE FROM post WHERE post_id = '$id';";
        $query.= "UPDATE category SET category.post = category.post - 1 WHERE category.category_id = 32";
        if(mysqli_multi_query($conn, $query)){
          $query2 = "DELETE FROM user_index WHERE user_index.id = $id";
          mysqli_query($conn, $query2);
          header("Location:post.php");
          mysqli_close($conn);
        }else{
          die("Coection Error, Pleace Try Again..");
        } 
        
    }else{
        echo "<h1 style='margin-top:1rem; text-align:center; font-family: sans-serif;'> ID Undefined </h1>";
    }
  }
 ?>
