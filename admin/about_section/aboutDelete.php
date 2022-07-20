<?php
require "../controller/dbConfig.php";

      $about_id = $_GET['about_id'];
      $updateQry = "UPDATE about_section SET active_status=0 WHERE id='{$about_id}'";

      $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "About Delete Succesfull";
        } else {
            $masssage = "About Delete Failed";
        }
        header("location: ../about_section/aboutAdd.php?msg={$masssage}");