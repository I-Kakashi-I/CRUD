<?php

include '../model/model.php';
$data = new Model();
$id=$_POST['role_id'];
$permission = $_POST['permission'];

if ($permission == "" ) {

    $data->go('../view/addPermission.php', "Enter date correctly", "warning");
} else {
    $data->addPermissions($id,$permission);

    $data->go('../view/addPermission.php', 'Permission added successfully!', 'success');


}

?>
