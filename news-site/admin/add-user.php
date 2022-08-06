<?php include "header.php"; 
    session_start();
      if($_SESSION["user_role"] == '0'){
        echo "<h2 style='margin-top:1rem; text-align:center;'> Page Only Read Admin </h2>";
        header("Location:post.php");
     }else{
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <?php     

                            if(isset($_POST["save"]) or isset($_POST["user"])){
                                    include "config.php";
                                    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
                                    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
                                    $user = mysqli_real_escape_string($conn, $_POST["user"]);
                                    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
                                    $role = mysqli_real_escape_string($conn, $_POST["role"]);
                                    $check_query = "SELECT * FROM user WHERE username = '$user'";
                                    $check_result = mysqli_query($conn,$check_query) or die("Conection Error try again");
                                if(mysqli_num_rows($check_result) > 0){
                                    echo "<p style='text-align:center;color:white;background: #e11515f7;padding: 8px 0;font-size: 1.4rem;border-radius: 3px; font-weight:bold;'> User Name Already Exits</p>";
                                }else{
                                    $query = "INSERT INTO user (first_name, last_name, username, password, role ) VALUES ('$fname', '$lname', '$user', '$password', '$role')";
                                    mysqli_query($conn, $query) or die("Query Fail");
                                    header("Location:add-user.php?UserRegisterd");
                                    mysqli_close($conn);
                                }
                            }
                      ?>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>

                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
   <?php } ?>
<?php include "footer.php"; ?>


