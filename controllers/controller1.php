<?php

include '../model/model.php';
$data=new Model();
$name = $_POST['name'];
$email = $_POST['email'];
$password =$_POST['password'];
$password_confirm=$_POST['confirm_password'];



    if ($name == ""|| $email == "" || $password == "" ) {

        $data->go('../view/signUp.php',"Enter your date correctly","danger");
    } else {

        if($password!=$password_confirm){

            $data->go('../view/signUp.php','password is not match!','warning');
            return;
        }
        $myModel = new Model();
        $myModel->signUp($name, $email, $password);
    }
die($password_confirm);

?>