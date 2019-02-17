<?php  
	include 'db/db.php';

	$title = $_POST['title'];
	$description = $_POST['description'];
	$author = $_POST['author_name'];
	$tag = $_POST['tag'];


	$file           = $_FILES['image']['name'];
    $tmp_file       = $_FILES['image']['tmp_name'];

    $target_dir     = "uploads/";
    $target_file    = $target_dir . basename($file);
    $target_file    = md5($target_file);
    $imageFileType  = pathinfo($target_file,PATHINFO_EXTENSION);

    $extension=explode(".", $file);
	$extension=end($extension);
	$prod = $target_file;
	$newfilename=$prod .".".$extension;
	$move = move_uploaded_file($tmp_file, $target_dir.$newfilename);


	$query 	  = "INSERT INTO blog_post(title, description, author_name, author_id, tag, photo) 
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