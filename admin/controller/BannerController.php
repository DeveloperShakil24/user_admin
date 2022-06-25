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
//image Uploade end

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

//This For Update Banner
if (isset($_POST["updateBanner"])) {

    $banner_id = $_POST['banner_id'];
    $title     = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $details   = $_POST['details'];

    if (empty($title) || empty($sub_title) || empty($details)) {
        $masssage = "All Field are Requried";
    } else {
        $updateQry = "UPDATE banners SET title='{$title}', sub_title='{$sub_title}', details='{$details}' WHERE id='{$banner_id}'";

        $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Banner Update Succesfull";
        } else {
            $masssage = "Banner Update Failed";
        }
    }
    header("location: ../banner/bannerUpdate.php?msg={$masssage}&banner_id={$banner_id}");
}
