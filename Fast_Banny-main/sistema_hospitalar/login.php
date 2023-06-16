<?php

include('include/includes.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    session_start();
    
    $email=$_POST['useremail'];
    $password=$_POST['userpassword'];
    
    $select = WebUser::getWebUser($email);

    if($select->login_email == $email){

        if ($select->login_tipo == 'P'){
            $login = Paciente::pacienteLogin($email, $password);

            if ($login->paciente_email == $email and $login->paciente_senha == $password){

                $_SESSION['user']=$email;
                $_SESSION['usertype']='P';
                $_SESSION['loggedin'] = TRUE;

                
                header('location: paciente/index.php');

            }else{
                echo "<script>alert('Invalid Credentials')</script>";
            }

        }elseif($select->login_tipo == 'A'){
            $login = Admin::adminLogin($email, $password);

            if ($login->admin_email == $email and $login->admin_senha == $password){

                $_SESSION['user']=$email;
                $_SESSION['usertype']='A';
                $_SESSION['loggedin'] = TRUE;
                
                header('location: admin/index.php');

            }else{
                echo "<script>alert('Invalid Credentials')</script>";
                
            }


        }elseif($select->login_tipo == 'M'){
            $login = Medico::medicoLogin($email, $password);

            if ($login->medico_email == $email and $login->medico_senha == $password){

                $_SESSION['user']=$email;
                $_SESSION['usertype']='M';
                $_SESSION['loggedin'] = TRUE;
                
                header('location: medico/index.php');

            }else{
                $_SESSION['loggedin'] = FALSE;
                echo "<script>alert('Invalid Credentials')</script>";

            }

        }
        
    }else{
        echo "<script>alert('Nenhuma conta foi encontrada!')</script>";
    }






    
}else{
    echo "&nbsp";
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
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="useremail" id="useremail" class="form-control" 
                                autocomplete="off" placeholder="enter e-mail">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" name="userpassword" id="userpassword" class="form-control">
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