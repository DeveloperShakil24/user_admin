<?php
require "../controller/dbConfig.php";

      $banner_id = $_GET['banner_id'];
      $updateQry = "UPDATE banners SET active_status=0 WHERE id='{$banner_id}'";

      $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Banner Delete Succesfull";
        } else {
            $masssage = "Banner Delete Failed";
        }
        header("location: ../banner/bannerList.php?msg={$masssage}");