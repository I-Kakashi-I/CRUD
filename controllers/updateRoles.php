<?php

include '../model/model.php';

$id = $_POST['id'];
$per_id=$_POST['perm_id'];
$role_name = $_POST['name'];
$permissions=$_POST['permissions'];


if ($id == 0) {
    ?>
    <script>alert("Error!");
        history.back(); </script><?php
} else {
    $myModel = new Model();
    $myModel->updateRole($id,$per_id,$role_name,$permissions);


} ?>
