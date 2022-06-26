<?php
require 'dbConfig.php';
//This For Create Banner start

if (isset($_POST["saveMassages"])) {
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

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $massage = $_POST['massage'];

    if (empty($name) || empty($email) || empty($subject) || empty($massage)) {
        $masssage = "All Field are Requried";
    } else {
        $insertQry = "INSERT INTO contact_massages (name, email, subject, massage) VALUES ('{$name}', '{$email}', '{$subject}', '{$massage}')";
        $isSubmit  = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $masssage = "Massage Insert Succesfull";
        } else {
            $masssage = "Massage Insert Failed";
        }
    }
    header("location: ../contact_massages/massageAdd.php?msg={$masssage}");
}

//This For Create Banner end

//This For Update Banner
 if (isset($_POST["updateMassage"])) {

    $massage_id = $_POST['massages_id'];
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $subject    = $_POST['subject'];
    $massage    = $_POST['massage'];

    if (empty($name) || empty($email) || empty($subject) || empty($massage)) {
        $masssage = "All Field are Requried";
    } else {
         $updateQry = "UPDATE contact_massages SET name='{$name}', email='{$email}', subject='{$subject}' , massage='{$massage}' WHERE id='{$massage_id}'";

        $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Massage Update Succesfull";
        } else {
            $masssage = "Massage Update Failed";
        }
    }
    header("location: ../contact_massages/massageUpdate.php?msg={$masssage}&massages_id={$massage_id}");
}
