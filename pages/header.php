<?php
session_start();
include "./server/conn.php";

if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        
        $sql = "SELECT * FROM user WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAVS BLOG</title>

    <link rel="stylesheet" href="../css/about.css">
</head>
<body>
    <header>
        <div class="title">
            <h1>RAVS BLOG</h1>
            <input type="text" placeholder="search...">
        </div>
        <div class="nav">
            <a href="../index.html">Home</a>
            <a href="./blog.php">Blog</a>
            <?php if(!isset($_SESSION['id'])){
                echo '<a href="./login.html" class="login">login</a>';
            } else{
                echo '<a href="./create.php">Create</a>'; 
                echo '<a href="./php/logout.php">Logout</a>'; 
            } ?>
        </div>
    </header>