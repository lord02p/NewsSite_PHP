<?php include "header.php";
      if($_SESSION["user_role"] == '0'){
        echo "<h2 style='margin-top:1rem; text-align:center;'> Page Only Read Admin </h2>";
        header("Location:post.php");
     }else{
 ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Website Settings</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
               
                  <!-- Form -->
                  <form  action="save-settings.php" method="POST" enctype="multipart/form-data">
                  <?php 

                    include "config.php";
                    $query = "SELECT * FROM settings";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0){
                    $final_result = mysqli_fetch_assoc($result);

                ?>
                      <div class="form-group">
                          <label for="website_name">Website Name</label>
                          <input type="text" name="website_name" value="<?php echo $final_result["websitename"] ?>" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
       
                          <label for="logo">Website Logo</label>
                          <input type="file" name="logo">
                          <img src="images/<?php echo $final_result["logo"]; ?>">
                          <input type="hidden" name="old_logo" value="" >
                      </div>
                      <div class="form-group">
                          <label for="footer_desc">Footer Description</label>
                          <textarea name="footer_desc" class="form-control" rows="5" required><?php echo $final_result["footerdesc"]; ?></textarea>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                    <?php 
                                }
                    ?>
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
  <?php } ?>
<?php include "footer.php"; ?>
