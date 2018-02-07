<!DOCTYPE html>
<html lang="en" class="full-height">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DAILY GOSSIPs | Home</title>
    
    
    <link rel="stylesheet" href="res/font-awesome/css/font-awesome.css">
    <link href="res/css/bootstrap.css" rel="stylesheet">
    <link href="res/css/style.css" type="text/css" rel="stylesheet">
    <link href="res/css/mdb.css" rel="stylesheet">
    <!--<link href="res/css/compiled.css" rel="stylesheet">-->
    <style>
        @media (max-width: 740px) {
            .full-height,
            .full-height body,
            .full-height header,
            .full-height header .view {
                height: 700px; 
            } 
        }
    </style>
    

</head>
<body class="developer" id="1">
   
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" style="float:right">
            <a class="navbar-brand brand"  href="#">DailyGossips NG<i class="fa fa-commenting"></i></a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item myselect ">
                        <select id="getProducts" class="form-control  myselect2">
                            <option value="showAll" selected="selected">Select Post Location</option>
                            <?php
                                require_once 'config.php';
                                
                                $stmt = $dbcon->prepare('SELECT * FROM location');
                                $stmt->execute();
                                
                                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    extract($row);
                                    ?>
                                    <option value="<?php echo $loc_id; ?>"><?php echo $state; ?></option>
                                    <?php
                                }
                            ?>
                        </select> 
                    </li>
                    <li class="nav-item myselect">
                         <button class="btn btn-pink btn-block btn-rounded z-depth-5" data-toggle="modal" data-target="#modalStartGossip" >Start a Gossip</button>
                    </li>
                    
                    <li class="nav-item ">
                        <a class="nav-link " href="index.php"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="nav-item  d-lg-none ">
                        <a class="nav-link" href="about.php" data-toggle="modal" data-target="#modalAbout">About DailyGossips Ng</a>
                    </li>
                    <li class="nav-item  d-lg-none">
                        <a class="nav-link" href="suggest.php" data-toggle="modal" data-target="#modalSuggest">Suggest Section</a>
                    </li>
                    <li class="nav-item  d-lg-none">
                        <a class="nav-link" href="faq.php" data-toggle="modal" data-target="#modalFaq">Faq</a>
                    </li>
                    </li>
                    <li class="nav-item dropdown d-none  d-md-block">
                        <a class="nav-link dropdown-toggle " id="navbarDropdownMenuLink " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                        <div class="dropdown-menu dropdown-primary xsDisplay" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="suggest.php" data-toggle="modal" data-target="#modalSuggest" style="background-color: dodgerblue">Suggest Section</a>
                            <a class="dropdown-item" href="about.php" data-toggle="modal" data-target="#modalAbout" style="background-color: dodgerblue">About DailyGossips Ng</a>
                            <a class="dropdown-item" href="faq.php" data-toggle="modal" data-target="#modalFaq" style="background-color: dodgerblue">Faq</a>
                        </div>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><i class="fa fa-twitter"></i></a>
                    </li>
                </ul>   
            </div>         
        </nav>
    <main>
    <section id="posts" class="container">
        <!--Section: Magazine v.2-->
        <section class="section magazine-section">    
            <!--Grid row-->
            <div class="row text-left">
                <!--Grid column-->
                <div class="col-lg-8 col-md-12">
                     <h3 class="font-up my-5 pt-5 "  style="color:dodgerblue"><strong>Abia Gossips</strong>
                   </h3> <!--add gossip tag-->

                    <!--Featured news-->
                    <div class="single-news">
                        <!--Image-->
                        <div class="view overlay hm-white-slight z-depth-1-half">
                            <img src="res/img/1.jpg" class="img-fluid" alt="Wider sample post image">
                            <a>
                                <div class="mask"></div>
                            </a>
                        </div>

                        <!--Excerpt-->
                        <div class="news-data">
                            <a href="" class="light-blue-text"><h6><i class="fa fa-tag"></i><strong> Culinary</strong></h6></a>
                            <a href="viewPost.php" class="light-blue-text"><h6><i class="fa fa-commenting"></i><strong> <span class="badge blue">3</span></strong></h6></a>
                            <a href="" class="light-blue-text"><h6><i class="fa fa-thumbs-up"></i><strong> <span class="badge blue">3</span></strong></h6></a>
                            <a href="" class="light-blue-text"><h6><i class="fa fa-thumbs-down"></i><strong> <span class="badge blue">3</span></strong></h6></a>
                            <a href="" class="light-blue-text"><h6><i class="fa fa-heart-o"></i><strong> <span class="badge blue">3</span></strong></h6></a>
                            

                            <p><strong><i class="fa fa-clock-o"></i> 27/02/2016</strong></p>
                        </div>

                        <h3><a><strong>This is title of the news.</strong></a></h3>

                        <p align="justify">my name is iyke.my name is iyke.my name is iyke.my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. v v v my name is iyke. v my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.
                        </p>

                    </div>
                    <!--Featured news--> 

                    <!--Section: Leave a reply (Logged In User)-->
                    <section>
                        <!--Leave a reply form-->
                        <div class="reply-form">
                            <h3 class="section-heading">Make a Comment </h3>
                            <!--Third row-->
                            <div class="row">
                                <!--Content column-->
                                <div class="col-sm-10 col-12">
                                    <div class="md-form">
                                        <textarea type="text" id="form8" class="md-textarea"></textarea>
                                        <label for="form8">Enter Comment</label>
                                    </div>
                                </div>

                                <div class="">
                                    <button class="btn btn-primary">Post</button>
                                </div>
                                <!--/.Content column-->
                            </div>
                            <!--/.Third row-->
                        </div>
                        <!--/.Leave a reply form-->
                    </section>
                    <!--/Section: Leave a reply -->
                
                    <!--Main wrapper-->
                    <div class="comments-list text-left">
                        <div class="section-heading">
                            <h3>Comments <span class="badge blue">3</span></h3>
                        </div>
                        <!--First row-->
                        <div class="row">
                            
                            <!--Content column-->
                            <div class="col-sm-10 col-12">
                               
                                <div class="card-data">
                                    <ul>
                                        <li class="comment-date"><i class="fa fa-clock-o"></i> 05/10/2015</li>
                                    </ul>
                                </div>
                                <p class="comment-text">my name is iyke.my name is iyke.my name is iyke.my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. v v v my name is iyke. v my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke..</p>
                            </div>
                            <!--/.Content column-->
                        </div>
                        <!--/.First row-->
                        <!--Second row-->
                        <div class="row">
                           
                            <!--/.Image column-->
                            <!--Content column-->
                            <div class="col-sm-10 col-12">
                                
                                <div class="card-data">
                                    <ul>
                                        <li class="comment-date"><i class="fa fa-clock-o"></i> 08/10/2015</li>
                                    </ul>
                                </div>
                                <p class="comment-text">my name is iyke.my name is iyke.my name is iyke.my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. v v v my name is iyke. v my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke
                                my name is iyke.my name is iyke.my name is iyke.my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. v v v my name is iyke. v my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke..</p>
                            </div>
                            <!--/.Content column-->
                        </div>
                        <!--/.Second row-->
                        <!--Third row-->
                        <div class="row">
                            
                            <!--Content column-->
                            <div class="col-sm-10 col-12">
                                
                                <div class="card-data">
                                    <ul>
                                        <li class="comment-date"><i class="fa fa-clock-o"></i> 17/10/2015</li>
                                    </ul>
                                </div>
                                <p class="comment-text">my name is iyke.my name is iyke.my name is iyke.my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. v v v my name is iyke. v my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is 
                                iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.</p>
                            </div>
                            <!--/.Content column-->
                        </div>
                        <!--/.Third row-->
                    </div>
                    <!--/.Main wrapper-->
                 </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 myhead2">
                     <h3 class="font-up my-5 pt-5 "  style="color:dodgerblue"><strong>Pinned Gossips</strong>
                    </h3>

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
                                <p><strong>26/02/2016</strong></p>
                                <a>Title
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--/Small news-->

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
                                <p><strong>25/02/2016</strong></p>
                                <a>Title
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <!--/Small news-->

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
                                <p><strong>24/02/2016</strong></p>
                                <a>Title
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <!--/Small news-->

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
                                <p><strong>23/02/2016</strong></p>
                                <a>Title
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--/Small news-->
                </div>
                <!--Grid column-->
             </div>
            <!--Grid row-->
        </section>
        <!--Section: Magazine v.2-->           
    </section>

<?php include 'footer.php'; ?>