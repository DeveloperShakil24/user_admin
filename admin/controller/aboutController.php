<?php
require 'dbConfig.php';
//This For Create Banner start

if (isset($_POST["saveAbout"])) {
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
            move_uploaded_file($file_file_tmp, '../uploads/aboutImage/'.$rendom_file_name);
            $uploade_status = true;
        } else {
            $masssage = $file_extension . 'Not Supported';
        }
    } else {
        $masssage     = 'Not Found';
    }
//image Uploade end

    $about_title  = $_POST['about_title'];
    $about_sub_title = $_POST['about_sub_title'];
    $about_detals = $_POST['about_detals'];

//   die('abc');
    if (empty($about_title) || empty($about_sub_title) || empty($about_detals) || $uploade_status == false) {
        $masssage = "All Field are Requried";
        die('abc');
    } else {
        $insertQry = "INSERT INTO about_section (about_title, about_sub_title, about_detals, image) VALUES ('{$about_title}', '{$about_sub_title}', '{$about_detals}', '{$rendom_file_name}')";
        $isSubmit  = mysqli_query($dbCon, $insertQry);
        
        if ($isSubmit == true) {
            $masssage = "About Insert Succesfull";
         
        } else {
            $masssage = "About Insert Failed";
        }
    }
    header("location: ../about_section/aboutAdd.php?msg={$masssage}");
}

//This For Create Banner end

//This For Update Banner
if (isset($_POST["updateAbout"])) {

    $about_title     = $_POST['about_title'];
    $about_sub_title = $_POST['about_sub_title'];
    $about_detals    = $_POST['about_detals'];

    if (empty($about_title) || empty($about_sub_title) || empty($about_detals)) {
        $masssage = "All Field are Requried";
    } else {
        $updateQry = "UPDATE about_section SET about_title='{$about_title}', about_sub_title='{$about_sub_title}', about_detals='{$about_detals}' WHERE id='{$contact_id}'";

        $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "About Update Succesfull";
        } else {
            $masssage = "About Update Failed";
        }
    }
    header("location: ../about_section/aboutUpdate.php?msg={$masssage}&about_id={$about_id}");
}
