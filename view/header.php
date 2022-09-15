<?php
require_once '../model/model.php';
$data = new Model();;
$user = $data->getUser($_SESSION['user']['id']);
$_SESSION['user'] = $user;
if (!$_SESSION['user']) {
    header('location:signIn.php');
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Crud</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./users.php">Users</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Roles
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./roles.php">Roles</a></li>
                        <li>

                            <a class="dropdown-item" href="./addRole.php">Add Role</a>

                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li><a class="dropdown-item" href="./addPermission.php">Add Permission</a></li>

                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Tasks
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./tasks.php">Show Tasks</a></li>
                        <li><a class="dropdown-item" href="./addTask.php">Add Task</a></li>

                    </ul>
                </li>

            </ul>

            <div class="d-flex align-items-center">
                <a href="../view/update.php?id=<?= $_SESSION['user']['id']?>"

                   class="btn btn-link text-white mx-3 ">
                    <i class="fa fa-user"></i> </a>


                <form action="../controllers/logout.php" class="m-0">
                    <button onclick="sign_out()" type="submit"
                            class="btn btn-danger ">Sign out
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>


<script>
    function sign_out() {
        if (confirm("Do You Want To Sign out !")) {
            location.href = '../controllers/logout.php';
        }
    }



</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
