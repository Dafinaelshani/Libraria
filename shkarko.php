<?php
session_start();
require 'includes/connect.php';
// kontrollo nese perdoruesi eshte loguar
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
$get_user_data = mysqli_query($conn, "SELECT * FROM `perdoruesi` WHERE username = '$username'");
$userData =  mysqli_fetch_assoc($get_user_data);
$userid=$userData['id'];
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // fetch file to download from database
    $sql = "SELECT * FROM librat WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath=$file['pdf'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize( $file['pdf']));
        readfile( $file['pdf']);

        $updateQuery = " INSERT INTO `lexon`(`user_id`, `libri_id`) VALUES ('$userid','$id')";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}}