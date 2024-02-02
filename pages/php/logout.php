<?php
session_start();
include "../server/conn.php";

$_SESSION['id'] = $row['id'];
$id = $row['id'];
$status = "OFFLINE";

$user_status = $conn->prepare("UPDATE user set  status = ? WHERE id = ?");
$user_status->bind_param("si", $status, $id);
$user_status->execute();

header("location: ../blog.php");