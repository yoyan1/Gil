<?php
session_start();
include "../server/conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_FILES["image1"], $_FILES["image2"]) &&
        $_FILES["image1"]["error"] == 0 &&
        $_FILES["image2"]["error"] == 0 &&
        isset($_POST["content"])
    ) {
        $id = $_SESSION['id'];
        $image1Name = $_FILES["image1"]["name"];
        $image1TmpName = $_FILES["image1"]["tmp_name"];

        $image2Name = $_FILES["image2"]["name"];
        $image2TmpName = $_FILES["image2"]["tmp_name"];

        $content = $_POST["content"];

        $uploadDir = "uploads/"; 

        $image1Path = $uploadDir . $image1Name;
        $image2Path = $uploadDir . $image2Name;

        if (move_uploaded_file($image1TmpName, $image1Path) && move_uploaded_file($image2TmpName, $image2Path)) {
        
            $content = mysqli_real_escape_string($conn, $content);

            $sql = "INSERT INTO blogs (image1, image2, content, user) VALUES ('$image1Name', '$image2Name', '$content', '$id')";

            if (mysqli_query($conn, $sql)) {

                echo '<script>alert("Blog created successfully.");  window.location.href = "../blog.php";</script>';
            } else {

                echo '<script>alert("Error: ' . mysqli_error($conn) . '");  window.location.href = "../create.php";</script>';
            }

            mysqli_close($conn);
        } else {

            echo '<script>alert("Error uploading images.");  window.location.href = "../create.php";</script>';
        }
    } else {
        echo '<script>alert("Please choose images and provide content for the blog.");  window.location.href = "../create.php";</script>';
    }
}