<?php
require 'dbConfig.php';
//This For Create Banner start

if (isset($_POST["saveDesignation"])) {
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

    $designation_name     = $_POST['designation_name'];
    // $sub_title = $_POST['sub_title'];
    // $details   = $_POST['details'];

    if (empty($designation_name)) {
        $masssage = "All Field are Requried";
    } else {
        $insertQry = "INSERT INTO designation (designation_name) VALUES ('{$designation_name}')";
        $isSubmit  = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $masssage = "Catagory Insert Succesfull";
        } else {
            $masssage = "Catagory Insert Failed";
        }
    }
    header("location: ../designation/designationAdd.php?msg={$masssage}&catagory_id={$catagory}");
}

//This For Create Category end

//This For Update Categoty
if (isset($_POST["updateDesignation"])) {

    $designation_name = $_POST['designation_name'];
    $designation_id   = $_POST['designation_id'];

    if (empty($designation_name)) {
        $masssage = "All Field are Requried";
    } else {
        $updateQry = "UPDATE designation SET designation_name='{$designation_name}' WHERE id='{$designation_id}'";

        $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Designation Update Succesfull";
        } else {
            $masssage = "Designation Update Failed";
        }
    }
    header("location: ../designation/designationUpdate.php?msg={$masssage}&designation_id={$designation_id}");
}
