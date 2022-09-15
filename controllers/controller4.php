<?php

include '../model/model.php';
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];




if ($name == ""|| $email == "") {
    ?>
    <script>alert("Input your data correctly!");
        history.back(); </script><?php
} else {
    $myModel = new Model();
    $myModel->addUser($name, $email,$pass);
}
?>