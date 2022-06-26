<?php
require "../controller/dbConfig.php";

      $contact_id = $_GET['contact_id'];
      $updateQry = "UPDATE contact_us SET active_status=0 WHERE id='{$contact_id}'";

      $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Banner Delete Succesfull";
        } else {
            $masssage = "Banner Delete Failed";
        }
        header("location: ../contact/contactList.php?msg={$masssage}");