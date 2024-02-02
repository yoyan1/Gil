<?php
session_start();
include "../server/conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_GET['id'];
    $image1Name = $_FILES["image1"]["name"];
    $image1TmpName = $_FILES["image1"]["tmp_name"];

    $image2Name = $_FILES["image2"]["name"];
    $image2TmpName = $_FILES["image2"]["tmp_name"];

    $content = $_POST["content"];

    $uploadDir = "uploads/"; 

    $image1Path = $uploadDir . $image1Name;
    $image2Path = $uploadDir . $image2Name;
    if (
        isset($_FILES["image1"], $_FILES["image2"]) &&
        $_FILES["image1"]["error"] == 0 &&
        $_FILES["image2"]["error"] == 0 &&
        isset($_POST["content"])
    ) {

        if (move_uploaded_file($image1TmpName, $image1Path) && move_uploaded_file($image2TmpName, $image2Path)) {
        
            $content = mysqli_real_escape_string($conn, $content);

            $sql = "UPDATE blogs set image1 = '$image1Name', image2 = '$image2Name', content = '$content' WHERE id = '$id'";
        } else {

            echo '<script>alert("Error uploading images.");  window.location.href = "../edit.php?id='.$_GET['id'].'";</script>';
        }
    } elseif($_FILES["image1"]["error"] == 0 ) {
        if (move_uploaded_file($image1TmpName, $image1Path)) {
        
            $content = mysqli_real_escape_string($conn, $content);

            $sql = "UPDATE blogs set image1 = '$image1Name', content = '$content' WHERE id = '$id'";

        } else {

            echo '<script>alert("Error uploading images.");  window.location.href = "../edit.php?id='.$_GET['id'].'";</script>';
        }
    } elseif($_FILES["image2"]["error"] == 0 ){
        if (move_uploaded_file($image2TmpName, $image2Path)) {
        
            $content = mysqli_real_escape_string($conn, $content);

            $sql = "UPDATE blogs set image2 = '$image2Name', content = '$content' WHERE id = '$id'";
        } else {

            echo '<script>alert("Error uploading images.");  window.location.href = "../edit.php?id='.$_GET['id'].'";</script>';
        }
    } else{
        $content = mysqli_real_escape_string($conn, $content);

            $sql = "UPDATE blogs set content = '$content' WHERE id = '$id'";
    }
    if (mysqli_query($conn, $sql)) {

        echo '<script>alert("Blog edited successfully.");  window.location.href = "../view.php?id='.$_GET['id'].'";</script>';
    } else {

        echo '<script>alert("Error: ' . mysqli_error($conn) . '");  window.location.href = "../edit.php?id='.$_GET['id'].'";</script>';
    }

    mysqli_close($conn);
}