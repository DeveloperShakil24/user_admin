<?php
require "../controller/dbConfig.php";

      $project_id = $_GET['projetc_id'];
      $updateQry = "UPDATE our_project SET active_status=0 WHERE id='{$project_id}'";

      $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Our Project Delete Succesfull";
        } else {
            $masssage = "Our Project Delete Failed";
        }
        header("location: ../ourProject/projetcList.php?msg={$masssage}");