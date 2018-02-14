<?php require 'header.php';

// getting Post id from the click post
$id1 = sanitizer($_GET["id"]);
$id = intval($id1);
$i=0;

if($id == 0){
    // Log hackers value here  
   echo '
   <section id="posts" class="container">
        <!--Section: Magazine v.2-->
        <section class="section magazine-section">    
            <!--Grid row-->
            <div class="row text-left">
                <!--Grid column-->
                <div class="col-lg-8 col-md-12">
                    <h1> No Such Post Exist 1</h1>
                </div>
            </div>
        </section>
    </section>

   '; 
}else{
    $gossipModel->setGossipPost_id($id);
    $stmt = $gossipController->getGossipsByID($gossipModel);

    if(is_null($stmt)){
        // Log null value here   
        echo '
           <section id="posts" class="container">
                <!--Section: Magazine v.2-->
                <section class="section magazine-section">    
                    <!--Grid row-->
                    <div class="row text-left">
                        <!--Grid column-->
                        <div class="col-lg-8 col-md-12">
                            <h1> No Such Post Exist 1</h1>
                        </div>
                    </div>
                </section>
            </section>
    ';

    }else{

     if($stmt->rowCount() >0){
       ?>

    <section id="posts" class="container">
            <!--Section: Magazine v.2-->
            <section class="section magazine-section">    
                <!--Grid row-->
                <div class="row text-left">
                    <!--Grid column-->
                    <?php
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            $i=$i+1;?>
                    <div class="col-lg-8 col-md-12">
                         <h3 class="font-up my-5 pt-5 "  style="color:dodgerblue"><strong>Abia Gossips</strong>
                       </h3> <!--add gossip tag-->

                        <!--Featured news-->
                        <div class="single-news">
                            <!--Image-->
                            <div class="view overlay hm-white-slight z-depth-1-half">
                                <img src="<?php echo $gossipController->getGossipImageByPostID($post_id)?>" class="img-fluid" alt="Wider sample post image">
                                <a>
                                    <div class="mask"></div>
                                </a>
                            </div>

                            <!--Excerpt-->
                            <div class="news-data">
                                <a href="#co<?php echo $i;?>" id="co" class="light-blue-text"><h6><i class="fa fa-tag"></i><strong> Culinary</strong></h6></a>
                                <a href="#co<?php echo $i;?>" class="light-blue-text"><h6><i class="fa fa-commenting"></i><strong> <span class="badge blue"><?php echo $post_comments; ?></span></strong></h6></a>

                                <a href="#co<?php echo $i;?>" class="light-blue-text"><h6><i class="fa fa-thumbs-up"></i><strong> <span class="badge blue"><?php echo $post_like; ?></span></strong></h6></a>

                                <a href="#co<?php echo $i;?>" class="light-blue-text"><h6><i class="fa fa-thumbs-down"></i><strong> <span class="badge blue"><?php echo $post_dislike; ?></span></strong></h6></a>

                                <a href="#co<?php echo $i;?>" class="light-blue-text"><h6><i class="fa fa-heart-o"></i><strong> <span class="badge blue"><?php echo $post_heart; ?></span></strong></h6></a>

                                <p><strong><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($post_date); ?></strong></p>
                            </div>

                            <h3><a><strong><?php echo $post_title; ?></strong></a></h3>

                            <p align="justify"><?php echo $post_content; ?>
                            </p>

                        </div>
                        <?php
                            }
                        ?>
                        <!--Featured news--> 

                        <!--Section: Leave a reply (Logged In User)-->
                        <section>
                            <!--Leave a reply form-->
                            <div class="reply-form">
                                <h3 class="section-heading">Make a Comment </h3>
                                <!--Third row-->
                                <div class="row">
                                    <form action="<?php echo htmlspecialchars('actions.php');?>" method="POST">
                                        <!--Content column-->
                                        <div class="col-sm-10 col-12">
                                            <div class="md-form">
                                                <textarea type="text" id="commentBox" name="commentBox" class="md-textarea"></textarea>
                                                <label for="commentBox">Enter Comment</label>
                                                <input type="text" id="d" name="d" value="<?php echo $id;?>"></input>
                                            </div>
                                        </div>

                                        <div class="">
                                            <button class="btn btn-primary" pid="<?php echo $id;?>">Post</button>
                                        </div>
                                        <!--/.Content column-->
                                    </form>
                                </div>
                                <!--/.Third row-->
                            </div>
                            <!--/.Leave a reply form-->
                        </section>
                        <!--/Section: Leave a reply -->
                         <!--Main wrapper-->
                        <div class="comments-list text-left">
                            <div class="section-heading">
                                <h3>Comments <span class="badge blue"><?php echo $gossipController->getGossipCommentCount($id)?></span></h3>
                            </div>

                            <?php
                                $stmt = $commentController->getCommentsByPostID($id);
                                if(is_null($stmt)){
                                    echo 'NO COMMENTS';
                                }else{
                                    if ($stmt->rowCount() > 0) {
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            extract($row);?>
                                                <!--First row-->
                                                <div class="row">
                                                    
                                                    <!--Content column-->
                                                    <div class="col-sm-10 col-12">
                                                       
                                                        <div class="card-data">
                                                            <ul>
                                                                <li class="comment-date"><i class="fa fa-clock-o"></i> <?php echo $comment_post_date; ?></li>
                                                            </ul>
                                                        </div>
                                                        <p class="comment-text"><?php echo $comment_body; ?></p>
                                                    </div>
                                                    <!--/.Content column-->
                                                </div>
                                                <!--/.First row-->
                                           <?php  
                                        }
                                    }else{
                                        echo 'NO COMMENTS YET; Be the first to drop a comment';
                                    }
                                }
                              ?>
                      </div>
                    <?php
                        }
                    }
                }
            ?>
                            

                    <!--/.Main wrapper-->
                     </div>
                    <!--Grid column-->
                    <?php include 'sidebar.php'; ?>
                    <!--Grid column-->
                    
                    <!--Grid column-->
                 </div>
                <!--Grid row-->
            </section>
            <!--Section: Magazine v.2-->           
        </section>


       

<!-- all code goes here -->
    

<?php include 'footer.php';?>