<?php 
    include "config.php";
    if(empty($_FILES["new-image"]["name"])){
      $file_name = $_POST["old_image"];
    }else{
        $errors = array();
        $file_name = $_FILES["new-image"]['name'];
        $file_size = $_FILES["new-image"]['size'];
        $file_tmp = $_FILES["new-image"]['tmp_name'];
        $file_type = $_FILES["new-image"]['type'];
        $file_exection = explode('.', $file_name);
        $final_file_extention = $file_exection[1];
        $extention = array("jpeg", "jpg", "png");
        if(in_array($final_file_extention, $extention) === false){
            $errors[] = "This Extention File are not Allowed... please choose jpeg, jpg, png extention.";
        }
        if(empty($errors) == true){

        }else{
            print_r($errors);
            die();
        }
    }
        $title = mysqli_real_escape_string($conn, $_POST["post_title"]);
        $postdesc = mysqli_real_escape_string($conn, $_POST["postdesc"]);
        $category = mysqli_real_escape_string($conn, $_POST["category"]);
        $post_id = $_POST["post_id"];
        $query = "UPDATE post SET title = '$title', description = '$postdesc', category = '$category', post_img = '$file_name' WHERE post_id = $post_id;";
        if(mysqli_query($conn, $query)){
            header("Location:post.php");
        }else{
            echo "<h2 class='alert'> Query Faild, try again...</h2>";
        }
?>


