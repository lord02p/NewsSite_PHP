<?php include 'header.php';
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <?php 
                        include "config.php";
                        $query = "SELECT * FROM post LEFT JOIN category ON post.category = category.category_id LEFT JOIN user ON post.author = user.user_id ";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0){
                            while ($final_result = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="post-container">
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                  <a class="post-img" href="single.php?id=<?php echo $final_result["post_id"]?>"><img src="admin/upload/<?php echo $final_result["post_img"] ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                  <div class="inner-content clearfix" style="text-align: start;">
                                      <h3><a href='single.php?id=<?php echo $final_result["post_id"]?>'><?php echo $final_result["title"] ?></a></h3>
                                      <div class="post-information">
                                          <span>
                                              <i class="fa fa-tags" aria-hidden="true"></i>
                                              <a href='category.php?cid=<?php echo $final_result["post_id"]?>'><?php echo $final_result["category_name"] ?></a>
                                          </span>
                                          <span>
                                              <i class="fa fa-user" aria-hidden="true"></i>
                                              <a href='author.php?aid=<?php echo $final_result["post_id"]?>'><?php echo $final_result["first_name"]." ". $final_result["last_name"] ?></a>
                                          </span>
                                          <span>
                                              <i class="fa fa-calendar" aria-hidden="true"></i>
                                              <?php echo $final_result["post_date"] ?>
                                          </span>
                                          <span>
                                             <i class="fa fa-eye"></i>
                                             <?php 
                                             $post_id = $final_result["post_id"];
                                                $query2 = "SELECT * FROM user_index WHERE id = $post_id";
                                                $result2 = mysqli_query($conn, $query2);
                                                while ($final_result2 = mysqli_fetch_assoc($result2)) {
                                                   echo $final_result2["view_index"];
                                                }
                                             ?>
                                          </span>
                                      </div>
                                      <p class="description">
                                         <?php echo  substr($final_result["description"], 0, 130)."..."; ?>
                                      </p>
                                      <a class='read-more pull-right' href='single.php?id=<?php echo $final_result["post_id"]?>'>read more</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                         }
                        }else{
                            echo "<div class='alert alert-danger'>News Empty</div>";
                        }
                    ?>
                    <!-- /post-container -->

                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
