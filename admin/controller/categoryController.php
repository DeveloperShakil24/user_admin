<?php
require 'dbConfig.php';
//This For Create Banner start

if (isset($_POST["saveCatagory"])) {
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
//This For Create Category Start

    $category_name     = $_POST['category_name'];
    // $sub_title = $_POST['sub_title'];
    // $details   = $_POST['details'];

    if (empty($category_name)) {
        $masssage = "All Field are Requried";
    } else {
        $insertQry = "INSERT INTO categories (category_name) VALUES ('{$category_name}')";
        $isSubmit  = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $masssage = "Catagory Insert Succesfull";
        } else {
            $masssage = "Catagory Insert Failed";
        }
    }
    header("location: ../catagory/catagoryAdd.php?msg={$masssage}&catagory_id={$catagory}");
}

//This For Create Category end

//This For Update Categoty
if (isset($_POST["updateCatagory"])) {

    $catagory_name = $_POST['category_name'];
    $catagory_id     = $_POST['catagory_id'];
    // $sub_title = $_POST['sub_title'];
    // $details   = $_POST['details'];

    if (empty($catagory_name)) {
        $masssage = "All Field are Requried";
    } else {
        $updateQry = "UPDATE categories SET category_name='{$catagory_name}' WHERE id='{$catagory_id}'";

        $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Banner Update Succesfull";
        } else {
            $masssage = "Banner Update Failed";
        }
    }
    header("location: ../catagory/catagoryUpdate.php?msg={$masssage}&catagory_id={$catagory_id}");
}
