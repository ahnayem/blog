<?php

    if(isset($_SESSION['user_id']) ) {
        include '../db/db.php';
       
        $get_user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM tbl_user WHERE id='$get_user_id'";
        $stmt           = $db->prepare($query);
        $result         = $stmt->execute();

        while ($row  = $stmt->fetch()) {
            $id            =$row['id'];
            $email         =$row['email'];
            $name          =$row['fullname'];
            $role          =$row['role'];
            $image         =$row['image'];
            $DOB           =$row['DOB'];
            $image         =$row['image'];
            $address       =$row['address'];
            $joining_date  =$row['joining_date'];
        }
    }
?>