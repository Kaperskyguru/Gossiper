<?php
	include('config.php');
	$action = $_REQUEST['action'];
	if($action=="showAll"){	
		$stmt=$dbcon->prepare('SELECT post_id, post_title,post_content FROM posts ORDER BY post_id');
		$stmt->execute();	
	} else{	
		$stmt=$dbcon->prepare('SELECT post_id, post_title,post_content FROM posts WHERE loc_id=:cid ORDER BY post_id');
		$stmt->execute(array(':cid'=>$action));
	}
	
?>
<div class="row">
	<?php
		if($stmt->rowCount() > 0){
		
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);
		
	?>
	<!--Featured news-->
	 <div class="single-news ">
        <!--Excerpt-->
        <div class="news-data card ">
        	<img src="res/img/1.jpg" class="img-fluid" alt="Wider sample post image">
        	<ul>
        		<li>
        			<a href="" class="light-blue-text"><h6><i class="fa fa-tag"></i><strong> Culinary</strong></h6></a>
        		</li>
        		<li>
        			<a href="viewPost.php" class="light-blue-text"><h6><i class="fa fa-commenting"></i><strong> <span class="badge blue">3</span></strong></h6></a>
        		</li>
        		<li>
        			<a href="" class="light-blue-text"><h6><i class="fa fa-thumbs-up"></i><strong> <span class="badge blue">3</span></strong></h6></a>
        		</li>
        		<li>
        			<a href="" class="light-blue-text"><h6><i class="fa fa-thumbs-down"></i><strong> <span class="badge blue">3</span></strong></h6></a>
        		</li>
        		<li>
        			<a href="" class="light-blue-text"><h6><i class="fa fa-heart-o"></i><strong> <span class="badge blue">3</span></strong></h6></a>
        		</li>
        		<li>
        			<a class="light-blue-text"><h6><i class="fa fa-calendar"></i><strong> <span class="">1/2/2018</span></strong></h6></a>
        		</li>
        	</ul>
			<h3><a><strong><?php echo $post_title; ?></strong></a></h3>
			 <p align="justify"><?php echo $post_content; ?>
            </p>	
		</div>
		<?php		
			}
		
		}else{
	?>
    <!--Featured news-->
    <div class="single-news ">

        <!--Image-->
        <div class="view overlay hm-white-slight z-depth-1-half">
            <img src="res/img/1.jpg" class="img-fluid" alt="Wider sample post image">
            <a>
                <div class="mask"></div>
            </a>
        </div>

        <!--Excerpt-->
        <div class="news-data">
            <a href="" class="light-blue-text"><h6><i class="fa fa-tag"></i><strong> <?php echo $state; ?></strong></h6></a>
            <a href="viewPost.php" class="light-blue-text"><h6><i class="fa fa-commenting"></i><strong> <span class="badge blue">3</span></strong></h6></a>
            <a href="" class="light-blue-text"><h6><i class="fa fa-thumbs-up"></i><strong> <span class="badge blue">3</span></strong></h6></a>
            <a href="" class="light-blue-text"><h6><i class="fa fa-thumbs-down"></i><strong> <span class="badge blue">3</span></strong></h6></a>
            <a href="" class="light-blue-text"><h6><i class="fa fa-heart-o"></i><strong> <span class="badge blue">3</span></strong></h6></a>
            
	
			<h3><a><strong><?php echo $post_title; ?></strong></a></h3>
			 <p align="justify"><?php echo $post_content; ?>
	        </p>
		</div>
    	<?php		
			}


		?>
	</div>