<?php

include '../model/model.php';
$input=$_GET['search']  ;

    $myModel = new Model();
    $myModel->search($input);
    ?>
    <script>
        location.href="../view/users.php?search=<?= $input?>" </script>
