<?php
session_start();
include "../server/conn.php";

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $select = "SELECT * FROM user WHERE email = ? AND password = ?";

    $sel_query = $conn->prepare($select);
    $sel_query->bind_param("ss", $email, $password);
    
    $sel_query->execute();
    $result = $sel_query->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $id = $row['id'];
        $status = "ONLINE";

        $user_status = $conn->prepare("UPDATE user set  status = ? WHERE id = ?");
        $user_status->bind_param("si", $status, $id);
        $user_status->execute();

        echo '<script>alert("Welcome '.$row['name'].'"); window.location.href = "../blog.php";</script>';
    } else{
        echo '<script>alert("incorrect username or password"); window.location.href = "../login.html";</script>';
} 
} else{
    echo "error";
}

?>