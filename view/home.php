<?php
require_once '../model/model.php';

require_once './header.php';

$data = new Model();
$data->checkPer('read');
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
</html>
<body class="sb-nav-fixed">

<div class="container d-flex justify-content-center align-items-center
     flex-column" style="height: 100vh">
    <?php include './extra/alert.php'; ?>

<h1 class="display-1"><?= 'Welcome'.' '.$_SESSION['user']['name'] ?></h1>
</div>
</body>
