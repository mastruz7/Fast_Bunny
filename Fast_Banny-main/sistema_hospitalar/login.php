<?php
session_start();
include("backend/Database/Database.php.php");

if(isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();
    if (empty($username)){
        $error['admin'] = "Enter Username";

    }else if (empty($password)){
        $error['admin'] = "Enter Password";
    }
    if (count($error)==0){
        $query = "SELECT * FROM admin where username='' and password='$password'";

        $result = mysqli_query( $connect,$query);

        if (mysqli_num_rows($result)== 1){
            echo "<script>alert('you have login as an admin')</script>";
            $_SESSION['admin'] = $usernames[$username];
           header("location:admin/index.php");
           exit();

        }else{
            echo "<script>alert('Invalid username')</script>";
        }

    }
}

?>
<!DOCTYPE html>
<htm>
    <head>
        <title>Pagina de Login da Administração</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

    </head>
    <body style="background-image: url(/img/hospital.jpg);background-repeat:no-repeat;background-size:cover;">
        <?php
        include "include/header.php";
        ?>
        <div style="margin-top: 40px;"></div>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"> </div>
                    <div class="col-md-6 jumbotron">
                        <img src="/img/admin_login.jpg" class="col-md-12">
                        <form method="post" class="my-2">

                                <div class="alert alert-danger">
                                    <?php 
                                    if(isset($error['admin'])){
                                        $sh= $error['admin'];
                                        $show = "<h4 class='alert alert-danger'>$sh</h4>";

                                        echo $show;

                                    }else{
                                        $show ="";
                                    }

                                    echo $show;
                                    

                                    ?>
                                </div>
                            <div class="form-group">
                                <label>username</label>
                                <input type="text" name="uname" class="form-control" 
                                autocomplete="off" placeholder="enter username">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>password</label>
                                <imput type="password" name="pass" class="form-control">
                            </div>

                            <input type="submit" name="login" class="btn btn-success" value="login">
                        
                        </form>
                    </div>
                    <div class="col-md-3"> 

                    </div>

                </div>

                </div>

            </div>
        </div>

    </body>
</htm>