<?php
require 'dbConfig.php';
//This For Create Banner start

if (isset($_POST["saveServices"])) {

//image Uploade end

    $service_name    = $_POST['service_name'];
    $services_detals = $_POST['services_detals'];
    $icon_name       = $_POST['icon_name'];

    if (empty($service_name) || empty($services_detals) || empty($icon_name)) {
        $masssage = "All Field are Requried";
    } else {
        $insertQry = "INSERT INTO services (service_name, services_detals, icon_name) VALUES ('{$service_name}', '{$services_detals}', '{$icon_name}')";
        $isSubmit  = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $masssage = "Banner Insert Succesfull";
        } else {
            $masssage = "Insert Failed";
        }
    }
    header("location: ../services/servicesAdd.php?msg={$masssage}");
}

//This For Create Banner end

//This For Update Banner
if (isset($_POST["updateServices"])) {

    $services_id     = $_POST['services_id'];
    $service_name    = $_POST['service_name'];
    $services_detals = $_POST['services_detals'];
    $icon_name       = $_POST['icon_name'];

    if (empty($service_name) || empty($services_detals) || empty($icon_name)) {
        $masssage = "All Field are Requried";
    } else {
        $updateQry = "UPDATE services SET service_name='{$service_name}', services_detals='{$services_detals}', icon_name='{$icon_name}' WHERE id='{$services_id}'";

        $isSubmit  = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $masssage = "Services Update Succesfull";
        } else {
            $masssage = "Services Update Failed";
        }
    }
    header("location: ../services/servicesUpdate.php?msg={$masssage}&services_id={$services_id}");
}
