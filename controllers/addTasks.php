<?php

include '../model/model.php';
$data = new Model();
$task_name = $_POST['task_name'];
$status = $_POST['status'];
$dead_line = $_POST['dead_line'];
$user_id = $_SESSION['user']['id'];
if ($task_name == "" || $status == "") {

    $data->go('../view/tasks.php', "Enter date correctly", "warning");
} else {
    $data->addTask($task_name, $status, $dead_line, $user_id);

    $data->go('../view/addTask.php', 'Task added successfully!', 'success');


}

?>