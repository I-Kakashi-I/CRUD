<?php

include '../model/model.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$role=$_POST['role_id'];


if ($id == 0) {
    ?>
    <script>alert("Error!");
        history.back(); </script><?php
} else {
    $myModel = new Model();
    $myModel->update($id, $name, $email,$pass, $role); ?>
    <?php
}
?>