            <?php
            for ($i = 0; $i <= 7; $i++) {
                 $error[$i] = "";
            }
            
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['post_title']) && !empty($_POST['post_content'])){

                $post_title = $_POST['post_title'];
                $post_content = $_POST['post_content'];
                $post_location = $_POST['post_location'];
                $post_image = uploadImage('res/img/');

                if(empty($post_title)){
                    $error[0] = "no title";
                }else{
                    $gossipModel->setPost_title($post_title);
                }
                if(empty($post_content)){
                     $error[1] = "no Content";
                }else{
                    $gossipModel->setPost_content($post_content);
                }
                if(empty($post_image)){
                    $error[3] = "no Image";
                }else{
                    $gossipModel->setPost_image(($post_image));
                }
                if(!ctype_alpha($error)){
                        $locationModel->setState($post_location);
                        $gossipModel->setloc_id($locationController->getLocationIDByState($locationModel));
                        $gossipController->addGossip($gossipModel);
                }
            }

            ?>
            <!--Modal: Start a gossip -->
            <div class="modal fade" id="modalStartGossip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog cascading-modal" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header light-blue darken-3 white-text">
                            <h4 class="title"><i class="fa fa-pencil"></i> Start A Gossip</h4>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--Body-->
                        <div class="modal-body mb-0">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                <div class="md-form form-sm">
                                    <i class="fa fa-tag prefix"></i>
                                    <input type="text" id="post_title" name="post_title" class="form-control">
                                    <label for="form21">Enter Gossip Title</label>
                                    <div class="error"><?php print_r($error[0]) ?></div>
                                </div>
                                <div class="col-md-12 mr-auto">
                                    <select class="form-control" name="post_location" id="post_location"> 
                                        <option value="" disabled selected>Select Gossip Section / Location</option>
                                        <?php 
                                            $states = $locationController->getLocations();
                                            while ($row = $states->fetch(PDO::FETCH_ASSOC)) {
                                                extract($row);
                                                echo "<option>$state</option>";
                                            }
                                        ?>
                                        
                                    </select>
                                    
                                </div>
                                <div class="md-form form-sm">
                                    <i class="fa fa-pencil prefix"></i>
                                    <textarea type="text" id="post_content" name="post_content" class="md-textarea mb-0"></textarea>
                                    <label for="form8">Enter Gossip Contents</label>
                                    <div class="error"><?php print_r($error[2]) ?></div>
                                </div>
                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm">
                                        <span>Choose file</span>
                                        <input type="file" id="post_image" name="post_image">
                                    </div>
                                    <div class="file-path-wrapper">
                                       <input class="file-path validate" type="text" value="<?php print_r($error[4]) ?>" placeholder="Upload Image If Any(optional)">
                                    </div>
                                </div>
                                <div class="text-center mt-1-half myHead-nxt">
                                    <button class="btn btn-info mb-2" id="submit">Post <i class="fa fa-send ml-1"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            <!--Modal: Start Gossip-->
                

            <!--Modal: About -->
            <div class="modal fade" id="modalAbout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog cascading-modal" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header light-blue darken-3 white-text">
                            <h4 class="title"><i class="fa fa-pencil"></i> About DailyGossips Ng</h4>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--Body-->
                        <div class="modal-body mb-0">
                            <div class="aboutg">
                                <h6>DailyGossips Ng is a platform which helps users around the world to make post on daily activities of people, without those other people knowing that they were the one thad made those posts</h5>
                                <h6>With DailyGossips Ng, you get to post gossips about your friend or anyone without your name or profile attached to it. This simply means that you can start a gossip about someone and the gossip would not be traced back to you.</h5>
                            </div>
                            <div class="text-center mt-1-half myHead-nxt">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            <!--Modal: About Gossip-->


            <!--Modal: Suggest a gossip Section -->
            <div class="modal fade" id="modalSuggest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog cascading-modal" role="document">
                    <!--Content-->
                    <div class="modal-content">

                        <!--Header-->
                        <div class="modal-header light-blue darken-3 white-text">
                            <h4 class="title"><i class="fa fa-pencil"></i> Suggest A Gossip Section</h4>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--Body-->
                        <div class="modal-body mb-0">
                            <form action="<?php echo htmlspecialchars('actions.php'); ?>" method="POST">
                                <div class="md-form form-sm">
                                    <i class="fa fa-tag prefix"></i>
                                    <input type="text" id="SuggestTitle" name="SuggestTitle" class="form-control">
                                    <label for="form21">Enter Section Title</label>
                                    <div class="error">*</div>
                                </div>
                                <div class="col-md-12 mr-auto">
                                    <select class="form-control" id="SuggestLocation" name="SuggestLocation"> 
                                        <option value="" disabled selected>Select Location</option>
                                        <?php 
                                            $states = $locationController->getLocations();
                                            while ($row = $states->fetch(PDO::FETCH_ASSOC)) {
                                                extract($row);
                                                echo "<option>$state</option>";
                                            }
                                        ?>
                                    </select>
                                    <div class="error">*</div>
                                </div>
                            
                                <div class="text-center mt-1-half myHead-nxt">
                                    <button class="btn btn-info mb-2" name="Suggest" id="Suggest">Suggest<i class="fa fa-send ml-1"></i></button>
                                </div>
                        </form>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            <!--Modal: Suggest Gossip-->


            <!--Modal: Faq  -->
            <div class="modal fade" id="modalFaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog cascading-modal" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header light-blue darken-3 white-text">
                            <h4 class="title"><i class="fa fa-pencil"></i> Faq</h4>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--Body-->
                        <div class="modal-body mb-0 faq" >
                            <ul>
                                <li><i class="fa fa-pencil"></i>how do i make a gossip?</li>
                                <li><i class="fa fa-reply"></i>click on the "start gossip" button from any part of the platform, enter details of your gossip and post.</li>
                            </ul>
                            <hr>
                            <ul>
                                <li><i class="fa fa-pencil"></i>how do i View a gossip?</li>
                                <li><i class="fa fa-reply"></i>click on the "view gossip" button from any part of the platform and select gossip section to view</li>
                            </ul>
                            <hr>
                            <ul>
                                <li><i class="fa fa-pencil"></i>What type of things can i post</li>
                                <li><i class="fa fa-reply"></i>All types of post and gossips are allowed on this platform</li>
                            </ul>
                            <hr>
                             <ul>
                                <li><i class="fa fa-pencil"></i>Do i need to register or sign up</li>
                                <li><i class="fa fa-reply"></i>No, Registration and sign up details are not needed</li>
                            </ul>
                            <hr>
                             <ul>
                                <li><i class="fa fa-pencil"></i>Are my details needed on this platform?</li>
                                <li><i class="fa fa-reply"></i>No, The idea is to make gossips annonymous so that can never be traced back to you the gossip starter</li>
                            </ul>
                            <hr>

                            <div class="text-center mt-1-half myHead-nxt">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            <!--Modal: Faq Gossip-->
                               
            <!--Footer-->
            <footer class="page-footer center-on-small-only unique-color-dark pt-0">
                <div style="background-color: #6351ce;">
                    <div class="container">
                        <div class="row py-4 d-flex align-items-center">
                            <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                                <h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
                            </div>
                            <div class="col-md-6 col-lg-7 text-center text-md-right">
                                <a class="icons-sm fb-ic ml-0"><i class="fa fa-facebook white-text mr-lg-4"> </i></a>
                                <a class="icons-sm tw-ic"><i class="fa fa-twitter white-text mr-lg-4"> </i></a>
                                <a class="icons-sm gplus-ic"><i class="fa fa-google-plus white-text mr-lg-4"> </i></a>
                                <a class="icons-sm li-ic"><i class="fa fa-linkedin white-text mr-lg-4"> </i></a>
                                <a class="icons-sm ins-ic"><i class="fa fa-instagram white-text mr-lg-4"> </i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr>
                
                <div class="footer-copyright">
                    <div class="container-fluid">
                        © 2018 Copyright: <a href="index.php"><strong> DailyGossips NG</strong></a>
                    </div>
                </div>
            </footer>   
        </main>
        <div class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px;">
            <a href="#1" >
                <img src="res/img/top-arrow.png">
            </a>
        </div>
       
        <script type="text/javascript" src="res/js/compiled.js"></script>
        <script type="text/javascript" src="res/js/script.js"></script>
        <script type="text/javascript">

        </script>
        
        <script>
            new WOW().init();

            // Material Select Initialization
            $(document).ready(function() {
                $('.mdb-select').material_select();
            });

            $('body').scrollspy({
                target: '.dotted-scrollspy'
            });
            $(function () {
                $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
            });

            $('.navbar-collapse a').click(function(){
                $(".navbar-collapse").collapse('hide');
            });
            
        </script>
    </body>
</html>

<?php



function uploadImage($target_dir) {

    if (!empty(basename($_FILES['post_image']["name"]))) {
        //$target_dir = '../res/img/';
        $target_file = $target_dir . basename($_FILES['post_image']["name"]);
        $uploadOK = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        global $error;

        if (getimagesize($_FILES['post_image']["tmp_name"]) !== false) {
            $uploadOK = 1;
        } else {
            $error[4] = "File is not an image";
            $uploadOK = 0;
        }

// Check if the file already exist
        if (file_exists($target_file)) {
            //$error[6] = "Sorry, file already exists";
            $uploadOK = 1;
        }

//Check file size
     /*  if ($_FILES["post_image"]["size"] > 500000) {
           $error[4] = "Sorry, Your file is too large.";
           $uploadOK = 0;
       }*/

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error[4] = "Sorry, only JPG, JPEG, PNG, GIF files are allowed";
            $uploadOK = 0;
        }

// Check if $uploadOK is set to 0 by an error
        if ($uploadOK == 1) {
            if (move_uploaded_file($_FILES['post_image']["tmp_name"], $target_file)) {
                return dirname($target_file) . '/' . basename($_FILES['post_image']["name"]);
            } else {
                $error[4] = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $error[4] = "Please Select an Image";
    }
}