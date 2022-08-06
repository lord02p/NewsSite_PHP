<?php include 'header.php'; 
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                  <?php
                    if($_SERVER["QUERY_STRING"]){
                        include "config.php";
                        $id = $_GET["id"];
                        $query = "SELECT * FROM post LEFT JOIN category ON post.category = category.category_id LEFT JOIN user ON post.author = user.user_id WHERE post.post_id = $id";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0){
                        $final_result = mysqli_fetch_assoc($result)
                  ?>
                    <div class="post-container">
                     
                        <div class="post-content single-post">
                            <h3><?php echo $final_result["title"]; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid='><?php echo $final_result["category_name"] ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid='><?php echo $final_result["first_name"]." ". $final_result["last_name"] ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $final_result["post_date"] ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $final_result["post_img"] ?>" alt=""/>
                            <p class="description">
                            <?php echo $final_result["description"] ?>
                            </p>
                        </div>
                    
                    </div>
                    <?php 
                        }}else{
                        echo "Id Undefined";
                    }
                    if(isset($_SESSION["view"])){

                    }else{
                        $query2 = "UPDATE user_index SET view_index = view_index + 1 WHERE id = $id";
                        $result2 = mysqli_query($conn, $query2);
                        $_SESSION["view"] = "done";
                    }
                 
                    ?>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
