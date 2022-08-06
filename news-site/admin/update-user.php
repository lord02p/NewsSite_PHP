<?php include "header.php";
  if($_SESSION["user_role"] == '0'){
    echo "<h2 style='margin-top:1rem; text-align:center;'> Page Only Read Admin </h2>";
    header("Location:post.php");
  }else{
    if(isset($_POST["submit"])){
        include "config.php";
        $user_id = $_POST["user_id"];
        $fname = mysqli_real_escape_string($conn, $_POST["f_name"]);
        $lname = mysqli_real_escape_string($conn, $_POST["l_name"]);
        $user = mysqli_real_escape_string($conn, $_POST["username"]);
        $role = mysqli_real_escape_string($conn, $_POST["role"]);
        $query = "UPDATE user SET first_name = '$fname', last_name = '$lname', username = '$user', role = '$role' WHERE user_id = '$user_id'";
        $result = mysqli_query($conn,$query) or die("Conection Error try again");
        header("Location:users.php");
        mysqli_close($conn);
}
    if($_SERVER["QUERY_STRING"]){
        include "config.php";
        $id = $_GET["id"];
        $query = "SELECT * FROM user WHERE user_id = '$id'";
        $result = mysqli_query($conn, $query) or die ("Query Failed");
        if(mysqli_num_rows($result) > 0){
        $final_result = mysqli_fetch_assoc($result);
?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id" class="form-control" value="<?php echo $final_result["user_id"]; ?>">
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $final_result["first_name"]; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $final_result["last_name"]; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $final_result["username"]; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="">
                            <?php if($final_result["role"] == 1){
                                $selected = "selected";
                            }else{
                                $selected = "";
                            }
                             ?>
                             <option <?php echo $selected; ?> value='0'>normal User</option>
                             <option <?php echo $selected; ?> value='1'>Admin</option> 
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
               <?php
               }else{
                echo "<h3 style='padding=10px;text-align:center;'>Undefine Value...</h3>";
                    }
                       }else{
                        echo "<h3 style='padding=10px;text-align:center;'>Sorry,Id Not Found...</h3>";
                    }
               ?>
              </div>
          </div>
      </div>
  </div>
  <?php } ?>
<?php include "footer.php"; ?>
