<?php
include "../model/model.php";
$data = new Model();
$data->checkPer("read");
$role = $data->getRoleName();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    <!-- <link href="features.css" rel="stylesheet"> -->
    <link href="../assets/css/mediaStyle.css" rel="stylesheet">
    <link href="../assets/css/containerStyle.css" rel="stylesheet">
    <link href="../assets/css/formStyle.css" rel="stylesheet">

    <title>Crud</title>

    <style>

    </style>


</head>

<body>
<!-- Heading -->
<h1 class=" text-center mb-xl-5">
    <span class="text-primary">Add New Task</span>
    <br>
</h1>
<br>
<section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8 col-xl-6">
                <div class="text-center mb-4">
                    <form class="" action="../controllers/addTasks.php" method="POST">
                        <?php include './extra/alert.php' ?>
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Title</label>
                            <input type="text" class="form-control" name="task_name" id="task_name">
                        </div>

                        <label for="inputEmail4" class="form-label">Deadline</label>
                        <br>
                        <input type="datetime-local" class="form-control" name="dead_line">
                        <br>
                        <select class="form-select" aria-label="Default select example " name="status">
                            <option disabled>Task State</option>
                            <option >Pending</option>
                            <option >Completed</option>

                        </select>

                        <br>
                        <br>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">ADD</button>
                            <br><br>
                            <a href="tasks.php">
                                Back!
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->


</body>

