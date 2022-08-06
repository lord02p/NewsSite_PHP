<?php include "header.php";
$post_index = 0; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php 
                            include "config.php";
                            $user_id = $_SESSION["email"];
                            if($_SESSION["user_role"] == 1){
                                $query = "SELECT * FROM post LEFT JOIN category ON post.category = category.category_id
                                LEFT JOIN user ON user.user_id = post.author ORDER BY post.post_id";
                            }else{
                                $query = "SELECT * FROM post LEFT JOIN category ON post.category = category.category_id
                                LEFT JOIN user ON user.user_id = post.author WHERE username = '$user_id' ORDER BY post.post_id";
                            }
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){
                                
                                while ($final_result = mysqli_fetch_assoc($result)) {
                                    $post_id = $final_result["post_id"];
                                    $post_index = $post_index + 1;
                        ?>
                          <tr>
                              <td class='id'><?php echo $post_index; ?></td>
                              <td><?php echo $final_result["title"]; ?></td>
                              <td>
                                <?php echo $final_result["category_name"];?>
                            </td>
                              <td><?php echo $final_result["post_date"]; ?></td>
                              <td><?php echo $final_result["first_name"]." ".$final_result["last_name"]; ?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $post_id; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $post_id; ?>&cid=<?php echo $final_result["category_id"];?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php    }
                            } ?>
                      </tbody>
                  </table>
                  
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
