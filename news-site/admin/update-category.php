<?php include "header.php";
  if($_SESSION["user_role"] == '0'){
    echo "<h2 style='margin-top:1rem; text-align:center;'> Page Only Read Admin </h2>";
    header("Location:post.php");
 }else{
    include "config.php";

  if(isset($_POST["submit"]) or isset($_POST["cat_name"])){
    $category_id = $_POST["cat_id"];
    $category_name = $_POST["cat_name"];
    $query = "UPDATE category SET category_name = '$category_name' WHERE category_id = '$category_id'";
    $result = mysqli_query($conn, $query) or die ("Query Failed");
    header("Location:category.php");
    mysqli_close($conn);
  }


?>
  <div id="admin-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h1 class="adin-heading">Update Category</h1>
        </div>
        <div class="col-md-offset-3 col-md-6">
       
              <!-- Form Start -->
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
              <?php 
                if($_SERVER["QUERY_STRING"]){
                 $id = $_GET["id"];
                 $query2 = "SELECT * FROM category WHERE category_id = '$id'";
                 $result2 = mysqli_query($conn, $query2) or die ("Query Failed");
                 if(mysqli_num_rows($result2) > 0){
                    $final_result = mysqli_fetch_assoc($result2);
                
              ?>
                  <div class="form-group">
                      <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $final_result["category_id"]?>">
                  </div>
                  <div class="form-group">
                      <label>category Name</label>
                      <input type="text" name="cat_name" class="form-control" value="<?php echo $final_result["category_name"]?>"  placeholder="" required>
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                  <?php  }} ?>
              </form>
               <!-- Form End-->
        </div>
      </div>
    </div> 
  </div>
  <?php } ?>
<?php include "footer.php"; ?>
