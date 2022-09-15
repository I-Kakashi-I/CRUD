<?php


class Model
{

    public $conn;

    public $allPermissions = [
        "read",
        "users_list",
        "add-users",
    ];

    public function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'crud';


        $this->conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }


    function signIn($email, $pass)
    {


        $query = "SELECT * FROM mydata WHERE email = '$email'";


        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row['password'] == $pass) {
            session_start();
            $_SESSION['user'] = $row;
            $this->go('../view/home.php');
        } else {
            $this->go('../view/signIn.php', "Wrong Email Or Password", "danger");
        }
    }

    function hasMsg()
    {
        return isset($_SESSION['msg']);
    }

    function getMsg()
    {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
        unset($_SESSION['msg_type']);
        return $msg;
    }

    function getMsgType()
    {
        if (isset($_SESSION['msg_type'])) {
            $msg_type = $_SESSION['msg_type'];
            unset($_SESSION['msg_type']);
            return $msg_type;
        }
        return 'success';
    }

    function go($url, $msg = null, $type = null)
    {
        if ($msg)
            $this->setMsg($msg, $type);

        header("Location:$url");
    }

    function setMsg($msg, $type = "success")
    {
        $_SESSION['msg'] = $msg;
        $_SESSION['msg_type'] = $type;
    }

    function signUp($name, $email, $pass)
    {


        $count = 0;
        $queryAll = "SELECT * FROM mydata";
        $queryResult = mysqli_query($this->conn, $queryAll);
        while ($row = mysqli_fetch_array($queryResult, MYSQLI_ASSOC)) {
            if ($row['email'] == $email) {
                $count++;
                $this->go('../view/signUp.ph', 'This Email is already in use!', 'warning');
            }
        }

        if ($count == 0) {
            $query = "INSERT INTO mydata( `name`, `email`, `password`) VALUES ('$name','$email','$pass')";
            if ($this->conn->query($query) === TRUE) {
                $this->go('../view/signIn.php', '', 'success');
            } else {
                echo "Error: " . $query . "<br>" . $this->conn->error;
            }

            $this->conn->close();
        } else {
            $this->conn->close();
        }
    }


    function delete($id)
    {


        $query = "DELETE FROM `mydata` WHERE id = '$id' LIMIT 1";
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            $this->go('../view/users.php', 'No user!', 'danger');
        } else {
            if ($result == $id) {
                $this->go('../view/users.php', "User Deleted Successfully");
            } else {
                $this->go('../view/users.php', "Error!");
            }
        }
    }

    function update($id, $name, $email, $password, $role_id)
    {


        $query = "UPDATE `mydata` SET `name`='$name',`email`='$email',`password`='$password', `role_id`=$role_id WHERE  `id`=$id";
        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            $this->go('../view/users.php', 'Email already exist!', 'warning');
        } else {
            $this->go('../view/users.php', 'User updated successfully!', 'success');
        }
    }


    function getUser($id)
    {


        $query = "SELECT * FROM `mydata` where `id`=$id";


        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (!$row) {
            $this->go('../view/users.php', 'Not found data to this user', 'danger');
        } else {
            if ($row['id']) {
                $permissions = $this->getPer($row['role_id']);
                $permissions = array_column($permissions, 'permission');
                $role = $this->getRoleById($row['role_id']);
                $row['permissions'] = $permissions;
                $row['role'] = $role;
                return $row;
            } else {
                $this->go('../view/users.php', 'Error!', 'danger');

            }
        }
    }

    function getRoleName()
    {
        return mysqli_query($this->conn, "SELECT * FROM `roles` where 1");

    }

    function getRoleById($id)
    {
        $query = "SELECT * FROM `roles` where `id`=$id";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);

    }

    function getPer($role_id)
    {


        $query = "SELECT * FROM `permissions` where `role_id`=$role_id";

        $result = mysqli_query($this->conn, $query);
        $permissions = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($permissions, $row);

        }
        return $permissions;
    }

    function checkPer($permission, $withRoute = true)
    {


        if (!in_array($permission, $_SESSION['user']['permissions']) && $_SESSION['user']['role']['name'] != "admin") {
            if ($withRoute){
                $this->go("../view/home.php","Access Denied","danger");
                return false;
            }
            else
                return false;
        }

        return true;
    }

    /*    function getAllUsers()
        {
            return mysqli_query($this->conn, "SELECT * FROM `mydata` where 1");
        }*/


    function addUser($name, $email, $password)
    {


        $count = 0;
        $queryAll = "SELECT * FROM mydata";
        $queryResult = mysqli_query($this->conn, $queryAll);
        while ($row = mysqli_fetch_array($queryResult, MYSQLI_ASSOC)) {
            if ($row['email'] == $email) {
                $count++;
                $this->go('../view/addUser.php', 'This email is already used!', 'danger');
            }
        }

        if ($count == 0) {
            $query = "INSERT INTO mydata( `name`, `email`,`password`) VALUES ('$name','$email','$password')";
            if ($this->conn->query($query) === TRUE) {
                $this->go('../view/users.php', 'User added successfully!', 'success');
            } else {
                echo "Error: " . $query . "<br>" . $this->conn->error;
            }

            $this->conn->close();
        } else {
            $this->conn->close();
        }
    }

    function search($input)
    {

        return mysqli_query($this->conn, "SELECT * FROM `mydata` WHERE `name` LIKE '%$input%' OR `email` LIKE '%$input%' ORDER BY `id` DESC");

    }

    function showTasks()
    {
        return $result = mysqli_query($this->conn, "SELECT * FROM `tasks` WHERE 1");

    }

    function getTasks($id)
    {
        $query = "SELECT * FROM `tasks` where `id`=$id";


        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (!$row) {
            $this->go('../view/tasks.php', 'Can not found task data!', 'danger');
        } else {

            return $row;

        }
    }

    function addTask($task_name, $status, $dead_line, $user_id)
    {

        $query = "INSERT INTO `tasks`( `task_name`, `status`, `dead_line`, `user_id`) VALUES ('$task_name','$status','$dead_line','$user_id')";
        if ($this->conn->query($query) === TRUE) {
            $this->go('../view/addTask.php', 'Task added successfully', 'success');
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }

        $this->conn->close();
    }

    function updateTask($id, $task_name, $status, $dead_line)
    {
        $query = "UPDATE `tasks` SET `task_name`='$task_name',`status`='$status',`dead_line`='$dead_line'  WHERE  `id`=$id";

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            $this->go('../view/tasks.php', 'Error!', 'danger');
        } else {
            $this->go('../view/tasks.php', 'Task updated successfully!', 'success');
        }
    }

    function updateRole($id,$per_id, $role_name, $permissions)
    {
        $query = "UPDATE `roles` SET `name`='$role_name'   WHERE  `id`=$id";

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            $this->go('../view/roles.php', 'Error!', 'danger');
        } else {
            $this->addPermissionsToRole($id,$per_id, $permissions);
            $this->go('../view/roles.php', 'Role updated successfully!', 'success');
        }
    }


    function addPermissionsToRole($id,$role_id, $permissions)
    {
        $query = "UPDATE `permissions` SET  `permission`='$permissions' , `role_id`=$role_id where `id`=$id";
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            $this->go('../view/roles.php', 'Error!', 'danger');
        } else {
            $this->go('../view/roles.php', 'Role updated successfully!', 'success');


        }
    }

    function deleteTask($id)
    {
        $query = "DELETE FROM `tasks` WHERE `id` = $id LIMIT 1";
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            $this->go('../view/tasks.php', 'No Tasks!', 'danger');
        } else {
            if ($result == $id) {
                $this->go('../view/tasks.php', "Task Deleted Successfully");
            } else {
                $this->go('../view/tasks.php', "Error!");
            }
        }
    }

    function addPermissions($role_id, $permission)
    {
        $query = "INSERT INTO `permissions`( `role_id`, `permission`) VALUES ($role_id , '$permission')";
        if ($this->conn->query($query) === TRUE) {
            $this->go('../view/addPermission.php', 'Permission added successfully', 'success');
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }

        $this->conn->close();
    }

    function getPermissionById($id)
    {
        $query = "SELECT * FROM `permissons` where `id`=$id";


        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (!$row) {
            $this->go('../view/addPermission.php', 'Can not find permissions to this role!', 'danger');
        } else {

            return $row;

        }
    }

    function getPermissions()
    {
        $query = "SELECT * FROM `permissions` where 1";

        $result = mysqli_query($this->conn, $query);
        $permissions = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($permissions, $row);

        }
        return $permissions;
    }

    function addRole($role_name)
    {
        $query = "INSERT INTO `roles`( `name`) VALUES ('$role_name')";
        if ($this->conn->query($query) === TRUE) {
            $this->go('../view/addRole.php', 'Role added successfully', 'success');
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }

        $this->conn->close();
    }


    function sign_out()
    {
        unset($_SESSION['user']);
        $this->go('../view/signIn.php', 'Signed out', 'success');//to redirect back to "index.php" after logging out

    }

}

?>