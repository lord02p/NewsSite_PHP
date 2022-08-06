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
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="data-form">
                    <h3>Login Form</h3>
                    <p>Login with your email and password.</p>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <?php
                        if(isset($_POST["submit"])){
                            include "config.php";
                            $email = mysqli_real_escape_string($conn, $_POST["email"]);            
                            $password = mysqli_real_escape_string($conn,md5($_POST["password"]));          
                            
                            $query = "SELECT * FROM user WHERE username = '$email' AND password = '$password'";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){
                                $final_result = mysqli_fetch_assoc($result);
                                
                                $_SESSION["user_name"] = $final_result["first_name"]." ". $final_result["last_name"];
                                $_SESSION["email"] = $final_result["username"];
                                $_SESSION["user_role"] = $final_result["role"];
                                $_SESSION["user_id"] = $final_result["user_id"];
                                if(isset($_SERVER["QUERY_STRING"])){
                                    header("Location:post.php");
                                }else{
                                    header("Location:../index.php");
                                }
                                
                            }else{
                                echo "<p class='error_box'>Password Does Not Match...</p>";
                            }
                        }
 
                    ?>
                    <input type="submit" value="Login" name="submit" id="submit" required>

                    <p class="login-text">Not yet member? <a href="signupp.php?true">Signup now</a></p>
                </form>
            </section>
        </main>
    </body>

    </html>