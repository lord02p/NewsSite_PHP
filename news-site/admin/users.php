<?php 
     include "header.php";
    if($_SESSION["user_role"] == '0'){
       echo "<h2 style='margin-top:1rem; text-align:center;'> Page Only Read Admin </h2>";
       header("Location:post.php");
    }else{
   
    if($_SERVER["QUERY_STRING"]){

    }else{
        header("Location:users.php?page=1");
    }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
               
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
<?php
    include "config.php";
    $limit = 3;
    $page = $_GET["page"];
    $offset = ($page - 1) * $limit;
    $query = "SELECT * FROM user ORDER BY user_id DESC LIMIT $offset, $limit";
    $result = mysqli_query($conn, $query) or die("query failed.....");
    if(mysqli_num_rows($result) > 0){
        while ($final_result = mysqli_fetch_assoc($result)) {
?>
                          <tr>
                              <td class='id'><?php echo $final_result["user_id"] ?></td>
                              <td><?php echo $final_result["first_name"]. " ".$final_result["last_name"]; ?></td>
                              <td><?php echo $final_result["username"]; ?></td>
                              <td><?php  
                                if($final_result["role"] == 1){
                                    echo "Admin";
                                }else{
                                    echo "Normal User";
                                }
                              ?></td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $final_result["user_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $final_result["user_id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php }; ?>
                        
                      </tbody>
                      <?php  }else{
                        echo "Database Empty........";
                      } ?>
                  </table>
                <ul class="pagination admin-pagination">
                    
                <?php
                    if($page > 1){
                       $prev_page = $page - 1;
                       echo  "<li><a href='users.php?page=$prev_page'>Prev</a></li>";
                    }
                    $query2 = "SELECT * FROM user";
                    $result2 = mysqli_query($conn, $query2) or die("Query Error");
                    $totall_rows = mysqli_num_rows($result2);
                    $totall_page = ceil($totall_rows / $limit);

                    for ($i=1; $i <= $totall_page; $i++) {
                        if($page == $i){
                            echo "<li><a href='users.php?page=$i' style='background:black;'>$i</a></li>";
                        }else{
                            echo "<li><a href='users.php?page=$i'>$i</a></li>";
                        }
                  ?>
                    <?php  };
                        if($totall_page > $page){
                            $next_page = $page + 1;
                            echo "<li><a href='users.php?page=$next_page'>Next</a></li>";
                        }
                     ?>
                    
                </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>

<?php  }?>
