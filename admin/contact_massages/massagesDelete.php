<?php
require "../controller/dbConfig.php";

      $massage_id = $_GET['massages_id'];
      $updateQry = "UPDATE contact_massages SET active_status=0 WHERE id='{$massage_id}'";

      $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Massage Delete Succesfull";
        } else {
            $masssage = "Massage Delete Failed";
        }
        header("location: ../contact_massages/massagesList.php?msg={$masssage}&massages_id={$massage_id}");