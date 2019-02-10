<?php  
	include 'db/db.php';

	$id = $_GET['id'];

	$query = "SELECT * FROM blog_post WHERE id='$id'";

	$stmt 	  = $db->prepare($query);
	$result   = $stmt->execute();
	$row	  = $stmt->fetch();
	$view 	  = $row['view'];

	$view = $view +1;


	$query_view = "UPDATE blog_post SET view='$view' WHERE id='$id'";
	$query_view 	  = $db->prepare($query_view);
	$query_view   	  = $query_view->execute();

?>