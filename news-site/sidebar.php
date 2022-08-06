<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Top 5 Recent Posts</h4>
        <?php 
            include "config.php";
            $query = "SELECT * FROM post LEFT JOIN category ON post.category = category.category_id ORDER BY post_id DESC LIMIT 0,5";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0){
                while ($final_result = mysqli_fetch_assoc($result)) {
                    ?>
        <div class="recent-post">
            <a class="post-img" href="single.php?id=<?php echo $final_result["post_id"]?>">
                <img src="admin/upload/<?php echo $final_result["post_img"] ?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single.php?id=<?php echo $final_result["post_id"]?>"><?php echo $final_result["title"] ?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?cid='><?php echo $final_result["category_name"] ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $final_result["post_date"] ?>
                </span>
                <a class="read-more" href="single.php?id=<?php echo $final_result["post_id"]?>">read more</a>
            </div>
        </div>
        <?php
    }
}
        ?>
    </div>
    <!-- /recent posts box -->
</div>
