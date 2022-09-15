<?php

include '../model/model.php';
$data = new Model();
$role_name = $_POST['role_name'];

if ($role_name == "" ) {

    $data->go('../view/roles.php', "Enter date correctly", "warning");
} else {
    $data->addRole($role_name);

    $data->go('../view/addRole.php', 'Role added successfully!', 'success');


}

?>
