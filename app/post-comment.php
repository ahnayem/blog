<?php  
	include 'db/db.php';

	if (isset($_POST['submit'])) {

		$comment_id = $_GET['Cid'];
		$post_id = $_GET['Pid'];
		
	}

	$name = $_POST['Name'];
	$reply = $_POST['reply'];


	$query 	  = "INSERT INTO blog_post(id, post_id, author_id, author_name, comment) 
								VALUES(:title, :description, :author_name, :tag, :photo)";
	$stmt 	  = $db->prepare($query);
    $stmt     -> bindValue(':title',$title,PDO::PARAM_STR);
    $stmt     -> bindValue(':description',$description,PDO::PARAM_STR);
    $stmt     -> bindValue(':author_name',$author,PDO::PARAM_STR);
    $stmt     -> bindValue(':author_id',10,PDO::PARAM_INT);
    $stmt     -> bindValue(':tag',$tag,PDO::PARAM_STR);
    $stmt     -> bindValue(':photo',$newfilename,PDO::PARAM_STR);
	$result   = $stmt->execute();
	
	if($result == true){
		echo "<script>alert('successfull!!')</script>";
	}else{
		echo "<script>alert('Post Failed')</script>";
	}

?>