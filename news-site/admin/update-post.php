<?php include "header.php";
?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
          <?php 
            if($_SERVER["QUERY_STRING"]){
                include "config.php";
                $id = $_GET["id"];
                $query = "SELECT * FROM post WHERE post_id = $id";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0){
                  $final_result = mysqli_fetch_assoc($result);
            }
          ?>
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $final_result["post_id"]; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $final_result["title"]; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5"><?php echo $final_result["description"]; ?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                <option disabled> Select Category</option>
                  <?php 
                      $query2 = "SELECT * FROM category";
                      $result2 = mysqli_query($conn, $query2);
                      if(mysqli_num_rows($result2) > 0){
                        while ($final_result2 = mysqli_fetch_assoc($result2)) {
                          $value = $final_result2["category_id"];
                          if($final_result["category"] == $final_result2["category_id"]){
                            echo "<option value='$value' selected value>".$final_result2['category_name']."</option>";
                          }else{
                            echo "<option value='$value'>".$final_result2['category_name']."</option>";
                          }
                        }
                      }
                  ?>
                </select>
                <input type="hidden" name="old_category" value="<?php echo $final_result["category"]; ?>">
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $final_result["post_img"];?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $final_result["post_img"]; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
            <?php  
              }else{
                echo "<h2> Result Undefined...</h2>";
              }
            ?>
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php";?>
