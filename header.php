<?php require_once 'init.php';?>
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
            <a class="navbar-brand brand"  href="http://localhost/gossiper.ng/">DailyGossips NG<i class="fa fa-commenting"></i></a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item myselect ">
                        <select id="getProducts" class="form-control  myselect2">
                            <option value="showAll" disabled selected>Select Post Location</option>
                            <?php
                                
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