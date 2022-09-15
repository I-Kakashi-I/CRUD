<?php
session_start();
require_once "../model/model.php";
$data=new Model();
if (!$data->checkPer('write')){
    return;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- <link href="features.css" rel="stylesheet"> -->
    <link href="../assets/css/carousel.rtl.css" rel="stylesheet">
    <link href="../assets/css/prezzo-site.css" rel="stylesheet">
    <link href="../assets/css/menu-navigation.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

    <title>Crud</title>
</head>

<body>
<!-- Heading -->
<h1 class=" text-center mb-xl-5">
    <span class="text-primary">Add new user</span>
    <br>
</h1>
<br>
<section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8 col-xl-6">
                <div class="text-center mb-4">
                    <form class="row g-1" action = "../controllers/controller4.php" method = "POST">
                        <?php include './extra/alert.php'?>
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Name</label>
                            <input type="text" class="form-control" name = "name" id="name">
                        </div>

                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" name = "email" id="email">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <input class="form-control password" id="password" class="block mt-1 w-full"
                                       type="password" name="password" value="" required/>
                                <span class="input-group-text togglePassword" id="">
                                    <i data-feather="eye" style="cursor: pointer"></i>
                                </span>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">ADD</button><br><br>
                            <a href = "users.php">
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
<script>
    feather.replace({ 'aria-hidden': 'true' });

    $(".togglePassword").click(function (e) {
        e.preventDefault();
        var type = $(this).parent().parent().find(".password").attr("type");
        console.log(type);
        if(type == "password"){
            $("svg.feather.feather-eye").replaceWith(feather.icons["eye-off"].toSvg());
            $(this).parent().parent().find(".password").attr("type","text");
        }else if(type == "text"){
            $("svg.feather.feather-eye-off").replaceWith(feather.icons["eye"].toSvg());
            $(this).parent().parent().find(".password").attr("type","password");
        }
    });
</script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
</body>

</html>