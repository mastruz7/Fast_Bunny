<?php
include_once('include/header.php');
include_once('include/includes.php');

$obPaciente = new Paciente;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['paciente_email'], $_POST['paciente_senha'], $_POST['paciente_nome'], $_POST['paciente_tel'], $_POST['paciente_endereco_cidade'], $_POST['paciente_endereco_rua'], $_POST['paciente_endereco_numero'], $_POST['paciente_endereco_bairro'])){
        
        $obPaciente->paciente_email = $_POST['paciente_email'];
        $obPaciente->paciente_senha = $_POST['paciente_senha'];
        $obPaciente->paciente_nome = $_POST['paciente_nome'];
        $obPaciente->paciente_endereco = $_POST['paciente_endereco_rua'].', '.$_POST['paciente_endereco_numero'].' - '.$_POST['paciente_endereco_bairro'].' - '.$_POST['paciente_endereco_cidade'];
        $obPaciente->paciente_tel = $_POST['paciente_tel'];
        $obPaciente->Cadastrar();

        header('location: login.php?status=success');
    }else{
        header('location: index.php?status=error');
    }
}

?>

     <section id="register" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <img src="images/register.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <form id="register-form" role="form" method="post" onsubmit="return validatePhoneNumber()">

                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Registre-se e Agenda sua consulta</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-12 col-sm-12">
                                        <label for="nome">Nome Completo</label>
                                        <input type="text" class="form-control" id="paciente_nome" name="paciente_nome" placeholder="Nome Completo" required>
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="tel">Telefone para contato</label>
                                        <input type="tel" class="form-control" id="paciente_tel" name="paciente_tel" placeholder="DDD+Número" pattern="[0-9]{11}" required>
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="paciente_email" name="paciente_email" placeholder="Insira seu e-mail" required>
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="senha">Senha</label>
                                        <input type="password" name="paciente_senha" id="paciente_senha" value="" class="form-control" placeholder="Insira uma senha" maxlength="16" required>
                                   </div>
                                   
                                   <div class="col-md-12 col-sm-12">
                                        <label for="endereco">Endereço Completo</label>
                                        <input type="text" class="form-control" id="paciente_endereco_rua" name="paciente_endereco_rua" placeholder="Rua/Avenida" required>
                                        <input type="text" class="form-control" id="paciente_endereco_numero" name="paciente_endereco_numero" placeholder="Nº" required>
                                        <input type="text" class="form-control" id="paciente_endereco_bairro" name="paciente_endereco_bairro" placeholder="Bairro" required>
                                        <input type="text" class="form-control" id="paciente_endereco_cidade" name="paciente_endereco_cidade" placeholder="Cidade" required>
                                        <button type="submit" class="form-control" id="cf-submit" name="submit">Registrar</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>

<?php include_once('include/footer.php'); ?>