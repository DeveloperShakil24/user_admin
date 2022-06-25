<?php
require 'dbConfig.php';
//This For Create Banner start

if (isset($_POST["saveProjetc"])) {
//image Uploade start
    if (isset($_FILES['project_image'])) {

        $imageArry     = $_FILES['project_image'];

        $file_name     = $imageArry['name'];
        $file_file_tmp = $imageArry['tmp_name'];
        $file_size     = $imageArry['size'];

        $nameExtArr = explode('.', $file_name);
        $file_extension   = strtolower(end($nameExtArr));
        $valid_extensions = array('jpg', 'png', 'jpeg');

        $rendom_file_name = time() . '.' . $file_extension;

        if (in_array($file_extension, $valid_extensions)) {
            move_uploaded_file($file_file_tmp, '../uploads/projectThumb/' . $rendom_file_name);
            $uploade_status = true;
        } else {
            $masssage = $file_extension . 'Not Supported';
        }
    } else {
        $masssage     = 'Not Found';
    }
//image Uploade end

    $category_id   = $_POST['category_id'];
    $project_name  = $_POST['project_name'];
    $project_link  = $_POST['project_link'];
    // $project_image = $_POST['project_image'];

    if (empty($category_id) || empty($project_name) || empty($project_link) || $uploade_status == false) {
        $masssage = "All Field are Requried";
    } else {
        $insertQry = "INSERT INTO our_project (category_id, project_name, project_link, project_image) VALUES ('{$category_id}', '{$project_name}', '{$project_link}', '{$rendom_file_name}')";
        $isSubmit  = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $masssage = "Banner Insert Succesfull";
        } else {
            $masssage = "Insert Failed";
        }
    }
    header("location: ../ourProject/projetcAdd.php?msg={$masssage}");
}

//This For Create Banner end

//This For Update Banner
if (isset($_POST["updateProjetc"])) {

    $project_id    = $_POST['projetc_id'];
    $category_id   = $_POST['category_id'];
    $project_name  = $_POST['project_name'];
    $project_link  = $_POST['project_link'];
    $project_image = $_POST['image'];

    if (empty($category_id) || empty($project_name) || empty($project_link)) {
        $masssage = "All Field are Requried";
    } else {
        $updateQry = "UPDATE our_project SET category_id='{$category_id}', project_name='{$project_name}', project_link='{$project_link}' WHERE id='{$project_id}'";

        $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Banner Update Succesfull";
        } else {
            $masssage = "Banner Update Failed";
        }
    }
    header("location: ../ourProject/projetcUpdate.php?msg={$masssage}&projetc_id={$project_id}");
}
