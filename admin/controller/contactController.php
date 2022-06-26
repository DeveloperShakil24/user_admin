<?php
require 'dbConfig.php';
//This For Create Banner start

if (isset($_POST["saveContact"])) {
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

    $contact_title  = $_POST['contact_title'];
    $contact_detals = $_POST['contact_detals'];
    $icon_name      = $_POST['icon_name'];

    if (empty($contact_title) || empty($contact_detals) || empty($icon_name)) {
        $masssage = "All Field are Requried";
    } else {
        $insertQry = "INSERT INTO contact_us (contact_title, contact_detals, icon_name) VALUES ('{$contact_title}', '{$contact_detals}', '{$icon_name}')";
        $isSubmit  = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $masssage = "Contact Insert Succesfull";
        } else {
            $masssage = "Contact Insert Failed";
        }
    }
    header("location: ../contact/contactAdd.php?msg={$masssage}");
}

//This For Create Banner end

//This For Update Banner
if (isset($_POST["updateContact"])) {

    $contact_id      = $_POST['contact_id'];
    $contact_title  = $_POST['contact_title'];
    $contact_detals = $_POST['contact_detals'];
    $icon_name      = $_POST['icon_name'];

    if (empty($contact_title) || empty($contact_detals) || empty($icon_name)) {
        $masssage = "All Field are Requried";
    } else {
        $updateQry = "UPDATE contact_us SET contact_title='{$contact_title}', contact_detals='{$contact_detals}', icon_name='{$icon_name}' WHERE id='{$contact_id}'";

        $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Contact Update Succesfull";
        } else {
            $masssage = "Contact Update Failed";
        }
    }
    header("location: ../contact/contactUpdate.php?msg={$masssage}&contact_id={$contact_id}");
}
