<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
              <!-- post-container -->
              <div class="post-container">
                <h2 class="page-heading">News By</h2>
                  <div class="post-content">
                      <div class="row">
                          <div class="col-md-4">
                            <a class="post-img" href="single.php?id="><img src="admin/upload/" alt=""/></a>
                          </div>
                          <div class="col-md-8">
                            <div class="inner-content clearfix">
                                <h3><a href='single.php?id='></a></h3>
                                <div class="post-information">
                                    <span>
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <a href='category.php?cid='></a>
                                    </span>
                                    <span>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <a href='author.php?aid='></a>
                                    </span>
                                    <span>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                       
                                    </span>
                                </div>
                                <p class="description">

                                </p>
                                <a class='read-more pull-right' href='single.php?id='>read more</a>
                            </div>
                          </div>
                      </div>
                  </div>
               

                  // show pagination
                  <ul class="pagination admin-pagination">
                   <li><a href="">Prev</a></li>
                   <li class="'.$active.'"><a href=""></a></li>
                   <li><a href="">Next</a></li>
                  
              </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
