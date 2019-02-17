<?php 
	include '../db/db.php';

	/*
	* Here we check whether the remember_me cookie is set or not
	*/

	if (isset($_COOKIE['remember'])) {

		$cookie 	= $_COOKIE['remember'] ?? false;
		$token_hash = hash_hmac('sha256', $cookie, 'secret');

		$query 	= "SELECT * FROM remember_login WHERE token_hash = :token_hash";
		$stmt	= $db->prepare($query);
		$stmt	-> bindValue('token_hash',$token_hash,PDO::PARAM_STR);
		$result	= $stmt->execute();
		$fetch	= $stmt->fetch();

		if ($fetch > 0) {
			$_SESSION['user_id'] = $fetch['user_id'];
			header('location: ../dashboard/index.php');
		}

		if (isset($_SESSION['user_id'])) {
			$_SESSION['user_id'] = $fetch['user_id'];
			header('location: ../dashboard/index.php');
		}
	}else{
		if (isset($_SESSION['user_id'])) {
			header('location: ../dashboard/index.php');
		}
	}



	/*
	* If someone press the Sign In button OR
	* If server request method is set to post & the name is signin.
	* Thess code will execute.
	*/

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])) {
		

		/*
		* Input data from Form
		*/

		$email 			= $_POST['email'];
		$password		= $_POST['pass'];
		if (isset($_POST['remember'])) {
			$remember_me	= $_POST['remember'];
		}


		/*
		* Validation [Empty Check]
		*/

		$error = 0;

		if ($email == '' || empty($email)) {
			echo "<script>alert('Email Field Empty')</script>";
			echo "<script>window.location.href='../blog-signin'</script>";

			$error = 1;
		}

		if ($password == '' || empty($password)) {
			echo "<script>alert('Password Field Empty')</script>";
			echo "<script>window.location.href='../blog-signin'</script>";

			$error = 1;
		}		


		/*
		* If there is not error
		* then these code will execute
		*/
		if ($error == 0) {

			$query_sta 	= "SELECT * FROM user WHERE email = :uemail AND status = 1";
			$stmt		= $db->prepare($query_sta);
			$stmt		-> bindValue(':uemail',$email,PDO::PARAM_STR);
			$result		= $stmt->execute();
			$fetch		= $stmt->fetch();



			/*
			* If email matched to the database 
			* and user_status is 1
			* then these code will execute
			*/

			if ($result) {

				$query_email 	= "SELECT * FROM user WHERE email = '$email'";
				$stmt 			= $db->prepare($query_email);
				$result 		= $stmt->execute();
				$row 			= $stmt->fetch();

				if ($result) {
					if (password_verify($password,$row['password'])) {

						/*
							* If someone press the Remember me checkbok
							* then these code will execute
							* otherwise only Session will set.
							*/
							if (isset($_POST['remember'])) {

								$token = bin2hex(random_bytes(16));
								$token_hash = hash_hmac('sha256',$token,'secret');


								$user_id = $row['id'];
								$expire_timestamp = time() + 60*60*24*30;
								$expires_at = date('Y-m-d H:i:s', $expire_timestamp);

								$query 	  = "INSERT INTO remember_login(token_hash, user_id, expires_at) 
											VALUES(:token_hash, :user_id, :expires_at)";
						    	$stmt 	  = $db->prepare($query);

						        $stmt     -> bindValue(':token_hash',$token_hash,PDO::PARAM_STR);
						        $stmt     -> bindValue(':user_id',$user_id,PDO::PARAM_INT);
						        $stmt     -> bindValue(':expires_at',$expires_at,PDO::PARAM_STR);

						    	$result   = $stmt->execute();

						    	if ($result) {
						    		$_SESSION['user_id'] = $row['id'];
						    		setcookie('remember',$token,$expire_timestamp,'/');
						    		header("Location: ../dashboard/index.php");
						    	}
						    	
							}else{
								echo $_SESSION['user_id'] = $row['id'];
								header("Location: ../blog");
							}
					}else{
						echo "<script>alert('Password missmatch')</script>";
						echo "<script>window.location.href='../blog-signin'</script>";
					}
				}else{
					header("location: $domain/dashboard/login?error_res_code_field=103");
				}
			}else{
				echo "<script>alert('User Not Activated please Check Your Email')</script>";
				echo "<script>window.location.href='../blog-signin'</script>";
			}
		}

	}
?>