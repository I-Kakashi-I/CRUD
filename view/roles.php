<?php
require_once "../model/model.php";

$data = new Model();
$roles=$data->getRoleName();
if (!$data->checkPer('write')){
    return;
}


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
        <title>Roles</title>
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
                <td>Role
                <td>Update</td>
                <td>Delete</td>

            </tr>
            <tr>
                <?php
                while ($row = mysqli_fetch_array($roles)) { ?>


                <td><?= ++$i ?></td>
                <td> <?= $row['name'] ?></td>

                <td class="user-delete">
                    <form action="../view/updateRole.php" method="POST">
                        <input type="hidden" value="<?= $row['id'] ?>" name="id">
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </td>
                <td class="user-delete">
                    <button onclick="deleteRole(<?= $row['id'] ?>,'<?= $row['task_name'] ?>')" type="button"
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
        function deleteRole(id, name) {
            if (confirm("Do You Want To Delete " + name)) {
                location.href = `../controllers/deleteRoles.php?id=${id}`;
            }
        }
    </script>
<?php
