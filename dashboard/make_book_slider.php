<?php  
	include 'db/db.php';

	$get_id = $_GET['id'];

	$query  		= "SELECT * FROM tbl_books WHERE book_id = '$get_id'";
    $stmt           = $db->prepare($query);
    $result         = $stmt->execute();

    if ($result == true) {
    	$query_update          = "UPDATE tbl_books SET 	book_feature = 1 WHERE book_id = '$get_id'";
        $stmt_update           = $db->prepare($query_update);
        $result_update         = $stmt_update->execute(); 
        if ($result_update == true) {
        	echo "<script>alert('Slider activated')</script>";
        	echo "<script>window.location.href='book'</script>";
        }else{
        	echo "<script>alert('Slider activated Error')</script>";
        }
        
    }
?>