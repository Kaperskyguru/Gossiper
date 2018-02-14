<!--Grid column-->


<div class="col-lg-4 col-md-12 myhead2">
     <h3 class="font-up my-5 pt-5 "  style="color:dodgerblue"><strong>Pinned Gossips</strong></h3>
<?php
    $stmt = $gossipController->getPinnedGossips();
    if ($stmt->rowCount()>0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           extract($row);
?>
    <!--Small news-->
    <div class="single-news">
        <div class="row">
            <div class="col-md-3">
            <!--Image-->
                <div class="view overlay hm-white-slight z-depth-1-half">
                    <img src="res/img/phone.png" class="img-fluid" alt="Minor sample post image">
                    <a>
                        <div class="mask"></div>
                    </a>
                </div>
            </div>

            <!--Excerpt-->
            <div class="col-md-9">
                <p><strong><?php echo $post_date;?></strong></p>
                <a href="viewPost.php?id=<?php echo $post_id; echo '">'; echo $post_title;?>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div>
    </div>

    <?php
  
        }
    }
    ?>
    <!--/Small news-->
