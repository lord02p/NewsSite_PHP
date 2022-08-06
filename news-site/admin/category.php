<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                  <table class="content-table">
                                <thead>
                                  <th>S.No.</th>
                                  <th>Category Name</th>
                                  <th>No. of Posts</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </thead>
                              <tbody>
                        <?php 
                        include "config.php";
                        $query = "SELECT * FROM category ORDER BY category_id DESC";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0){
                            while ($final_result = mysqli_fetch_assoc($result)) {
                                $c_id = $final_result["category_id"];
                        ?>
                        <tr>
                            <td class='id'><?php echo $c_id; ?></td>
                            <td><?php echo $final_result["category_name"]; ?></td>
                            <td><?php echo $final_result["post"]; ?></td>
                            <td class='edit'><a href='update-category.php?id=<?php echo $c_id; ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?id=<?php echo $c_id; ?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php
                           }
                        }else{
                            echo "<h2 style='margin-top:1rem; font-family:sans-serif; text-align:center;'> Category Empty </h2>";
                        }
                        ?>
                       </tbody>
                    </table>
                   
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
