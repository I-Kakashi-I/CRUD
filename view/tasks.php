<?php
require_once "../model/model.php";

$data = new Model();
$data->checkPer('read');
$tasks = $data->showTasks();

$i = 0;

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
</html>
<body class="sb-nav-fixed">
<?php require_once './header.php'; ?>
<div class="container d-flex justify-content-center align-items-center
     flex-column" style="height: 100vh">
    <table class="table table-condensed">
        <tbody>
        <?php include './extra/alert.php' ?>

        <tr class="active">
            <td>#</td>
            <td>Title</td>
            <td>Status</td>
            <td>Deadline</td>
            <td>Update Task</td>
            <td>Delete Task</td>
        </tr>
        <tr>
            <?php
            while ($row = mysqli_fetch_array($tasks)) { ?>


            <td><?= ++$i ?></td>
            <td> <?= $row['task_name'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['dead_line'] ?></td>
            <td class="user-delete">
                <form action="../view/updateTask.php" method="POST">
                    <input type="hidden" value="<?= $row['id'] ?>" name="id">
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </td>
            <td class="user-delete">
                <button onclick="deleteUser(<?= $row['id'] ?>,'<?= $row['task_name'] ?>')" type="button"
                        class="btn btn-danger">Delete
                </button>
            </td>
        </tr>

        <?php } ?>
        </tbody>
    </table>
</div>

</body>
<script>
    function deleteUser(id, name) {
        if (confirm("Do You Want To Delete " + name)) {
            location.href = `../controllers/deleteTask.php?id=${id}`;
        }
    }
</script>
