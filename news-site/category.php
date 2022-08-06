<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
               
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading"> News <?php echo $_GET["cn"]; ?></h2>
                  <?php 
                    if($_SERVER["QUERY_STRING"]){
                        include "config.php";
                        $id = $_GET["id"];
                        $query = "SELECT * FROM post LEFT JOIN user ON post.author = user.user_id WHERE post.category = $id";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0){
                            while ($final_result = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                              <a class="post-img" href="single.php?id=<?php echo $final_result["post_id"] ?>"><img src="admin/upload/<?php echo $final_result["post_img"] ?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                              <div class="inner-content clearfix">
                                  <h3><a href='single.php?id=<?php echo $final_result["post_id"]?>'><?php echo $final_result["title"] ?></a></h3>
                                  <div class="post-information">
                                      <span>
                                          <i class="fa fa-tags" aria-hidden="true"></i>
                                          <a href='category.php?id=><?php echo $final_result["category"];?>&cn=<?php echo $_GET["cn"]; ?>'><?php echo $_GET["cn"];?></a>
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
                                  <p class="description">
                                     <?php echo $final_result["description"]; ?>
                                  </p>
                                  <a class='read-more pull-right' href='single.php?id=<?php echo $final_result["post_id"] ?>'>read more</a>
                              </div>
                            </div>
                        </div>
                    </div>
                    <?php
                       }
                    }else{
                        echo "News Undefined";
                    }
                }else{
                    echo "Id Undefined";
                }
                ?>
                  
                </div>
                <!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
