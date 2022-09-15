<?php
require_once '../model/model.php';
$data = new Model();;
$user = $data->getUser($_SESSION['user']['id']);
$data->checkPer('read');

if (isset($_GET['search'])) {
    $input = $_GET['search'];
} else {

    $input = "";
}

$newResult = $data->search($input);
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
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body class="sb-nav-fixed">
<?php require_once './header.php';?>
<div class="c2">
    <div class="d-flex justify-content-end p-5 text-right">

    </div>

    <div class="d-flex justify-content-center align-items-center">

        <?php include './extra/alert.php' ?>

    </div>

    <div class="container d-flex justify-content-center align-items-center
     flex-column" style="min-height: 100vh">

        <form class="input-group text-left w-50 mb-4 " method="get" action="../controllers/search.php"">

        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
               aria-describedby="search-addon" name="search" value="<?= $input ?>"/>
        <button type="submit" class="btn btn-outline-primary">search</button>

        </form>


        <div class="text-left w-100 mb-2">
            <a class="btn btn-success px-4" href="addUser.php">Add</a>
        </div>

        <table class="table table-condensed">
            <tbody>
            <?php include './extra/alert.php' ?>

            <tr class="active">
                <td>#</td>
                <td>Name</td>
                <td>E-mail</td>
                <td>Update User</td>
                <td>Delete User</td>
            </tr><tr>
            <?php
            while ($row = mysqli_fetch_array($newResult)) { ?>

                    <td><?= ++$i ?></td>
                    <td> <?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <?php
                    if ($data->checkPer('write', false)) {
                        ?>
                        <td class="user-update">
                                <a href="../view/update.php?id=<?= $row['id'] ?>" class="btn btn-success">Update</a>

                        </td>
                        <td class="user-delete">
                            <button onclick="deleteUser(<?= $row['id'] ?>,'<?= $row['name'] ?>')" type="button"
                                    class="btn btn-danger">Delete
                            </button>
                        </td>
                        <?php
                    }
                    ?>

                </tr>

            <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    function deleteUser(id, name) {
        if (confirm("Do You Want To Delete " + name)) {
            location.href = `../controllers/controller2.php?id=${id}`;
        }
    }
</script>

</body>
</html>


