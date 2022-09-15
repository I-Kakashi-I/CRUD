<?php

include '../model/model.php';

$id = $_POST['task_id'];
$task_name = $_POST['task_name'];
$state = $_POST['status'];
$dead_line = $_POST['dead_line'];


if ($id == 0) {
    ?>
    <script>alert("Error!");
        history.back(); </script><?php
} else {
    $myModel = new Model();
    $myModel->updateTask($id, $task_name, $state, $dead_line);
} ?>



