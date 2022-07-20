<?php
require "../controller/dbConfig.php";

      $services_id = $_GET['services_id'];
      $updateQry = "UPDATE services SET design_status=3 WHERE id='{$services_id}'";

      $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Services Delete Succesfull";
        } else {
            $masssage = "Services Delete Failed";
        }
        header("location: ../services/servicesList.php?msg={$masssage}");