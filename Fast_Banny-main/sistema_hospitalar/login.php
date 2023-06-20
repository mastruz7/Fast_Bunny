<?php

include_once('include/header.php');
include_once('include/includes.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    session_start();
    
    $email=$_POST['useremail'];
    $password=$_POST['userpassword'];
    
    $select = WebUser::getWebUser($email);
    
    #$select= $database->query("select * from webuser where email='$email'");
    if($select->login_email == $email){

        if ($select->login_tipo == 'P'){
            $login = Paciente::pacienteLogin($email, $password);
            #$login = $select_paciente->query("select * from patient where pemail='$email' and ppassword='$password'");
            if ($login->paciente_email == $email and $login->paciente_senha == $password){

                $_SESSION['user']=$email;
                $_SESSION['usertype']='P';
                $_SESSION['loggedin'] = TRUE;

                header('location: paciente.php');

            }else{
                echo "<script>alert('Invalid Credentials')</script>";
            }

        }elseif($select->login_tipo == 'A'){
            $login = Admin::adminLogin($email, $password);
            #$login = $database->query("select * from admin where aemail='$email' and apassword='$password'");
            if ($login->admin_email == $email and $login->admin_senha == $password){


                //   Admin dashbord
                $_SESSION['user']=$email;
                $_SESSION['usertype']='A';
                $_SESSION['loggedin'] = TRUE;
                
                header('location: admin/index.php');

            }else{
                echo "<script>alert('Usuário ou Senha inválidos')</script>";
                
            }


        }elseif($select->login_tipo == 'M'){
            $login = Medico::medicoLogin($email, $password);
            #$login = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");
            if ($login->medico_email == $email and $login->medico_senha == $password){


                //   doctor dashbord
                $_SESSION['user']=$email;
                $_SESSION['usertype']='M';
                $_SESSION['loggedin'] = TRUE;
                
                header('location: medico/index.php');

            }else{
                $_SESSION['loggedin'] = FALSE;
                echo "<script>alert('Usuário ou Senha inválidos')</script>";

            }

        }
        
    }else{
        echo "<script>alert('Nenhuma conta foi encontrada!')</script>";
    }
  
}else{
    echo "&nbsp";
}



?>
     <section id="register" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <img src="images/login.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <form id="register-form" role="form" method="post">

                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Login</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-12 col-sm-12">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Insira seu e-mail" required>
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="senha">Senha</label>
                                        <input type="password" name="userpassword" id="userpassword" class="form-control" placeholder="Insira sua senha" required>
                                   </div>
                                        <button type="submit" class="form-control" id="cf-submit" name="submit">Enviar</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>
<?php include_once('include/footer.php'); ?>