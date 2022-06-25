<?php
require "../controller/dbConfig.php";

      $catagory_id = $_GET['catagory_id'];
      $updateQry = "UPDATE categories SET active_status=0 WHERE id='{$catagory_id}'";

      $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Our Project Delete Succesfull";
        } else {
            $masssage = "Our Project Delete Failed";
        }
        header("location: ../catagory/catagoryList.php?msg={$masssage}");