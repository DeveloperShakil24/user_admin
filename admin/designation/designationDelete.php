<?php
require "../controller/dbConfig.php";

      $designation_id = $_GET['designation_id'];
      $updateQry = "UPDATE designation SET active_status=0 WHERE id='{$designation_id}'";

      $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Designation Delete Succesfull";
        } else {
            $masssage = "Designation Delete Failed";
        }
        header("location: ../designation/designationList.php?msg={$masssage}");