<?php  
	include 'db/db.php';

	$id = $_GET['id'];

	$query = "SELECT COUNT(*) as total FROM blog_comment WHERE post_id='$id'";

	$stmt 	  = $db->prepare($query);
	$result   = $stmt->execute();
	$row = $stmt->fetch();
	$total_comment = $row['total'];
?>
