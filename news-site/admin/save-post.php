<?php 
    include "config.php";
    session_start();
    if(isset($_FILES["fileToUpload"])){
        $errors = array();
        $file_name = $_FILES["fileToUpload"]['name'];
        $file_size = $_FILES["fileToUpload"]['size'];
        $file_tmp = $_FILES["fileToUpload"]['tmp_name'];
        $file_type = $_FILES["fileToUpload"]['type'];
        $file_exection = explode('.', $file_name);
        $final_file_extention = $file_exection[1];
        $extention = array("jpeg", "jpg", "png");
    }
        $title = mysqli_real_escape_string($conn, $_POST["post_title"]);
        $postdesc = mysqli_real_escape_string($conn, $_POST["postdesc"]);
        $category = mysqli_real_escape_string($conn, $_POST["category"]);
        $date = date("d M, Y");
        $author_name = $_SESSION["user_id"];
        $query = "INSERT INTO post (title, description, category, post_date, author, post_img) VALUES ('$title', '$postdesc', $category, '$date', $author_name, '$file_name');";
        $query.= "UPDATE category SET post = post + 1 WHERE category_id = $category";
        $query3 = "SELECT MAX(post_id) FROM post";
        $result3 = mysqli_query($conn, $query3);
        $final_result3 = mysqli_fetch_assoc($result3);
        $post_id = $final_result3["MAX(post_id)"] + 1;
        $query2 = "INSERT user_index SET id = $post_id, like_index = 0, dislike_index = 0, view_index = 0";
        $result = mysqli_query($conn, $query2);
        if(mysqli_multi_query( $conn, $query)){
            header("Location:post.php");
        }else{
            echo "<h2 class='alert'> Query Faild, try again...</h2>";
        }
?>
