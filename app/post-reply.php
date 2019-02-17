<?php  
	$dns = 'mysql:host=localhost;dbname=db_blog;charset=utf8';
	$db = new PDO($dns,'root','');


	if (isset($_POST['submit'])) {

		$pid  = $_GET['pid'];
		$cid  = $_GET['cid'];
		$name = $_POST['Name'];
		$reply = $_POST['reply'];


	


		$query 	  = "INSERT INTO blog_reply(post_id,comment_id, author_id, author_name, reply) 
									VALUES(:post_id, :comment_id, :author_id, :author_name, :reply)";
		$stmt 	  = $db->prepare($query);
	    $stmt     -> bindValue(':post_id',$pid,PDO::PARAM_INT);
	    $stmt     -> bindValue(':comment_id',$cid,PDO::PARAM_INT);
	    $stmt     -> bindValue(':author_id',1,PDO::PARAM_INT);
	    $stmt     -> bindValue(':author_name',$name,PDO::PARAM_STR);
	    $stmt     -> bindValue(':reply',$reply,PDO::PARAM_STR);
		$result   = $stmt->execute();
		
		if($result == true){
			//echo "<script>alert('successfull!!')</script>";
			echo "<script>window.location.href='../blog-single.php?id=$pid'</script>";
		}else{
			//echo "<script>alert('Post Failed')</script>";
			echo "<script>window.location.href='../blog-single.php?id=$pid'</script>";
		}


	}

?>