<?php
	require_once 'classes/controllers/DB.php';
    require_once 'init.php';
  

	$action = $_REQUEST['action'];

	if($action=="showAll" || $action == 1){	
		$stmt=$dbcon->prepare('SELECT * FROM posts ORDER BY post_id');
		$stmt->execute();	
	} else{
		$stmt=$dbcon->prepare('SELECT * FROM posts WHERE loc_id=:cid ORDER BY post_id');
		$stmt->execute(array(':cid'=>$action));
	}
	
?>
<div class="row">
	<?php
    $i = 0;
		if($stmt->rowCount() > 0){
		
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);
                $i = $i + 1;
		
	?>
	<!--Featured news-->
	 <div class="single-news ">
        <!--Excerpt-->
        <div class="news-data card ">
        	<img src="<?php echo $gossipController->getGossipImageByPostID($post_id)?>" class="img-fluid" alt="Wider sample post image" />
        	<ul>
        		<li>
        			<a href="#co<?php echo $i;?>" id="co" class="light-blue-text"><h6><i class="fa fa-tag"></i><strong> Culinary</strong></h6></a>
        		</li>
        		<li>
        			<a href="#co<?php echo $i;?>" class="light-blue-text"><h6><i class="fa fa-commenting"></i><strong> <span class="badge blue"><?php echo $post_comments; ?></span></strong></h6></a>
        		</li>
        		<li>
        			<a href="#co<?php echo $i;?>" id="post_like_id" pid="<?php echo $post_id;?>" name="post_like_id" class="light-blue-text"><h6><i class="fa fa-thumbs-up"></i><strong> <span class="badge blue" id="like_span<?php echo $post_id;?>"><?php echo $post_like; ?></span></strong></h6></a>
        		</li>
        		<li>
        			<a href="#co<?php echo $i;?>" id="post_dislike_id" pid="<?php echo $post_id;?>" class="light-blue-text"><h6><i class="fa fa-thumbs-down"></i><strong> <span class="badge blue" id="dislike_span<?php echo $post_id;?>"><?php echo $post_dislike; ?></span></strong></h6></a>
        		</li>
        		<li>
        			<a href="#co<?php echo $i;?>" id="post_heart_id" pid="<?php echo $post_id;?>" class="light-blue-text"><h6><i class="fa fa-heart-o"></i><strong> <span class="badge blue" id="heart_span<?php echo $post_id;?>"><?php echo $post_heart; ?></span></strong></h6></a>
        		</li>
        		<li>
        			<h6 class="light-blue-text"><i class="fa fa-calendar"></i><strong> <span class=""><?php echo time_elapsed_string($post_date); ?></span></strong></h6>
        		</li>
        	</ul>
			<h3><a href="viewPost.php?id=<?php echo $post_id ?>"><strong><?php echo $post_title; ?></strong></a></h3>

			 <p align="justify"><?php echo $gossipController->getGossipExcerpt($post_id, 250); ?>
            </p>	
		</div>
    </div>
		<?php		
			}
		
		}else{
	?>

            <h1>No Latest Gossip yet</h1>
    <!--Featured news-->
    
    	<?php		
			}


		?>
        