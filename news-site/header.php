
<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->

                <div class=" col-md-offset-4 col-md-4">
                    <a href="index.php" id="logo"><img src="images/news.jpg" alt=""></a>
                </div>
                <!-- /LOGO -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="menu-bar" style="position:relative">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class='menu'>
                        <li><a href="index.php">Home</a></li>
                        <?php
                    include "config.php";
                    $quert = "SELECT * FROM category WHERE POST > 0";
                    $result = mysqli_query($conn, $quert);
                    if(mysqli_num_rows($result) > 0){
                        while ($final_result = mysqli_fetch_assoc($result)) {
                    ?>
                            <li>
                                <a href='category.php?id=<?php echo $final_result["category_id"]; ?>&cn=<?php echo $final_result["category_name"] ?>'>
                                    <?php echo $final_result["category_name"] ?>
                                </a>
                            </li>
                            <?php                
                        }
                    }  ?>
                            
                            <?php
                                if(isset($_SESSION["email"]) and isset($_SESSION["user_role"])){
                                    $text = "Log out";
                                    $link = "admin/logout.php";
                                }else{
                                    $text = "Sign up";
                                    $link = "admin/signupp.php";
                                }
                            ?>
                         
                            <li  style="position:absolute; right:0;">
                            <a href="<?php echo $link ?>">
                                <i class="fa fa-sign-in" aria-hidden="true" style="color:white ; margin-right:2px; font-size:1.7rem;"></i>
                                <?php echo $text; ?>
                            </a>
                            </li>
                    
                    </ul>
                </div>
            </div>

            <a href="addPostRedirect.php" class="add_news_btn" style="position: fixed; bottom: 3rem; right: 3rem; background-color: #1E90FF; color: white; font-size: 4.5rem; width: 5rem; height: 5rem; border-radius: 999rem; display: flex; justify-content: center; align-items: center; z-index: 99; font-family: emoji;box-shadow:rgb(50 50 93 / 25%) 0px 6px 12px -2px, rgb(0 0 0 / 30%) 0px 3px 7px -3px;">
                +
            </a>

        </div>
    </div>
    <!-- /Menu Bar -->