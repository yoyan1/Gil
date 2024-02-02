<?php
include "../server/conn.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $select = "SELECT * FROM user WHERE email = ?";

    $sel_query = $conn->prepare($select);
    $sel_query->bind_param("s", $email);
    
    $sel_query->execute();
    $result = $sel_query->get_result();
    if($result->num_rows < 1){

        $sql = "INSERT INTO `user`(`name`, `email`, `password`, `status`) VALUES (?, ?, ?, 'OFFLINE')";
        $stmnt = $conn->prepare($sql);
        $stmnt->bind_param("sss", $name, $email, $password);
        $stmnt->execute();
        if($stmnt->affected_rows > 0){
            echo '<script>alert("Registered successfully"); window.location.href = "../login.html";</script>';
        } else{
            echo "error";
        }
    } else{
        echo '<script>alert("email already exist"); window.location.href = "../signup.html";</script>';
    }

}