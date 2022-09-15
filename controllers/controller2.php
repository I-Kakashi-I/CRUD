<?php
include '../model/model.php';
$id = $_GET['id'];


if ($id == 0) {
    ?>
    <script>alert("No users found in database!");
        history.back(); </script><?php
} else {

    $myModel = new Model();
    $myModel->checkPer('write');
    $myModel->delete($id);
}

?>