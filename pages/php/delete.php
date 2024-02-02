<?php
include "../server/conn.php";

if(isset($_GET['delete'])){
    echo "<script>var result = confirm('Are you sure you want to delete thi blog'); (result)? window.location.href = './delete.php?id=".$_GET['delete']."' : window.location.href = '../view.php?id=".$_GET['delete']."' </script>";
} 

if(isset($_GET['id'])){
    $delet = mysqli_query($conn, "DELETE FROM blogs WHERE id = '".$_GET['id']."'");

    echo "<script>alert('Successfuly deleted'); window.location.href = '../blog.php';</script>";
}
