<?php
require 'dbConfig.php';
//This For Create Banner start

if (isset($_POST["saveBanner"])) {
    //image Uploade start
    if (isset($_FILES['image'])) {

        $imageArry     = $_FILES['image'];

        $file_name     = $imageArry['name'];
        $file_file_tmp = $imageArry['tmp_name'];
        $file_size     = $imageArry['size'];

        $nameExtArr = explode('.', $file_name);
        $file_extension   = strtolower(end($nameExtArr));
        $valid_extensions = array('jpg', 'png', 'jpeg');

        $rendom_file_name = time() . '.' . $file_extension;

        if (in_array($file_extension, $valid_extensions)) {
            move_uploaded_file($file_file_tmp, '../uploads/bannerImage/' . $rendom_file_name);
            $uploade_status = true;
        } else {
            $masssage = $file_extension . 'Not Supported';
        }
    } else {
        $masssage     = 'Not Found';
    }
    //image Uploaded end

    $title     = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $details   = $_POST['details'];

    if (empty($title) || empty($sub_title) || empty($details) || $uploade_status == false) {
        $masssage = "All Field are Requried";
    } else {
        $insertQry = "INSERT INTO banners (title, sub_title, details, image) VALUES ('{$title}', '{$sub_title}', '{$details}', '{$rendom_file_name}')";
        $isSubmit  = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $masssage = "Banner Insert Succesfull";
        } else {
            $masssage = "Insert Failed";
        }
    }
    header("location: ../banner/bannerAdd.php?msg={$masssage}");
}
//This For Create Banner end

/**
 * 1. we need edit rows icon-dash
 * 2. get old image name by icon-dash
 * 3. genaret new image namespace
 * 4. check both image name equal oe not equal -> if not equal then delete previous image and uploade new image
 */

 /**
  * 1. we have already uploade image -> we dont need to validation for image
  * 2. we have to overcome the $random _file_name error in line 126
  * 3. when user dont uploade any new image then we replace the variable $random _file_name value by previous old image name
  */
//This For Update Banner
if (isset($_POST["updateBanner"])) {

    //GET THE IMAGE START
    $banner_id = $_POST['banner_id'];
    $getSingelDataQry = "SELECT * FROM banners WHERE id={$banner_id}";
    $getResult = mysqli_query($dbCon, $getSingelDataQry);

    $oldImage = "";
    foreach ($getResult as $key => $banner) {
        $oldImage = $banner['image'];
    }
    //GET THE IMAGE END


    //IMAGE UPLOADE START
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

        $imageArry     = $_FILES['image'];

        $file_name     = $imageArry['name'];
        $file_file_tmp = $imageArry['tmp_name'];
        $file_size     = $imageArry['size'];

        $nameExtArr = explode('.', $file_name);
        $file_extension   = strtolower(end($nameExtArr));
        $valid_extensions = array('jpg', 'png', 'jpeg');

        $rendom_file_name = time() . '.' . $file_extension;

        if ($rendom_file_name != $oldImage) { // New Imagw And Old Image not match
            //FILE DELETE START
            $file = '../uploads/bannerImage/'.$oldImage;
            if (file_exists($file)) {
                unlink($file);
            } 
            //FILE DELETE END
            //FILE INSART START
            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($file_file_tmp, '../uploads/bannerImage/' . $rendom_file_name);
                $uploade_status = true;
            } else {
                $masssage = $file_extension . 'Not Supported';
            }
        }
        //FILE INSART END
    } else {
        //$masssage     = 'Not Found';
        $rendom_file_name = $oldImage;
    }
    //IMAGE UPLOADE END


    $banner_id = $_POST['banner_id'];
    $title     = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $details   = $_POST['details'];

    if (empty($title) || empty($sub_title) || empty($details)) {
        $masssage = "All Field are Requried";
    } else {
        $updateQry = "UPDATE banners SET title='{$title}', sub_title='{$sub_title}', details='{$details}', image='{$rendom_file_name}' WHERE id='{$banner_id}'";

        $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Banner Update Succesfull";
        } else {
            $masssage = "Banner Update Failed";
        }
    }
    header("location: ../banner/bannerUpdate.php?msg={$masssage}&banner_id={$banner_id}");
}
