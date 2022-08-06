<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Signup</title>
</head>

<body>
    <main>
        <section class="signup_container">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="data-form">
                <h3>Signup Form</h3>
                <p>It's quick and easy.</p>
                <input type="text" name="f_name" placeholder="First Name..." required>
                <input type="text" name="l_name" placeholder="Last Name..." required>
                <input type="email" name="username" placeholder="Creat username..." required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="Cpassword" placeholder="Confrim Password" required>
                <?php 
                    if(isset($_POST["submit"]) or isset($_POST["Cpassword"])){
                        include "config.php";
                        $f_name = mysqli_real_escape_string($conn,$_POST["f_name"]);
                        $l_name = mysqli_real_escape_string($conn,$_POST["l_name"]);
                        $email = mysqli_real_escape_string($conn,$_POST["username"]);            
                        $password = mysqli_real_escape_string($conn, md5($_POST["password"]));             
                        $cpassword = mysqli_real_escape_string($conn, md5($_POST["Cpassword"])); 
                        if($password == $cpassword){
                            $exits_query = "SELECT * FROM user WHERE username = '$email'";
                            $exits_result = mysqli_query($conn, $exits_query);
                            if(mysqli_num_rows($exits_result) > 0){
                                echo "<p class='error_box'> The Username Already Exits...</p>";
                            }else{
                                $query = "INSERT INTO user (first_name, last_name, username, password, role) VALUES ('$f_name', '$l_name', '$email', '$password', '0')";
                                $result = mysqli_query($conn, $query);
                                $_SESSION["user_name"] = $f_name. " ". $l_name;
                                $_SESSION["email"] = $email;
                                $_SESSION["user_role"] = 0;
                                if($_SERVER["QUERY_STRING"]){
                                    header("Location:post.php");
                                }else{
                                    header("Location:../index.php");
                                }
                                mysqli_close($conn);
                            }
                        }else{
                            echo "<p class='error_box'> The Password Does'nt Match</p>";
                        }
                    }
                ?>
                <input type="submit" value="Signup" name="submit" id="submit" required>
                <p class="login-text">Alrady a member <a href="loginn.php">Login here</a></p>
         
            </form>
        </section>
    </main>
</body>

</html>

