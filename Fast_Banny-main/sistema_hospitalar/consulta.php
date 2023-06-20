<?php 
    
    include_once('include/header-paciente.php'); 
    include_once('include/includes.php');

    $obConsulta = new Consulta;

     if($_SERVER["REQUEST_METHOD"] == "POST"){

     if(isset($_POST['data_consulta'], $_POST['sintoma'], $_POST['select'], $_POST['paciente_tel'])){
          
          $obConsulta->paciente_email = $_POST['paciente_email'];
          $obConsulta->paciente_senha = $_POST['paciente_senha'];
          $obConsulta->paciente_nome = $_POST['paciente_nome'];
          $obConsulta->paciente_endereco = $_POST['paciente_endereco_rua'].', '.$_POST['paciente_endereco_numero'].' - '.$_POST['paciente_endereco_bairro'].' - '.$_POST['paciente_endereco_cidade'];
          $obConsulta->paciente_tel = $_POST['paciente_tel'];
          $obConsulta->Cadastrar();

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
                         <img src="images/online-appointment.jpeg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <form id="register-form" role="form" method="post" action="#">

                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Agendar nova Consulta</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">

                                   <div class="col-md-6 col-sm-6">
                                        <label for="data">Selecione a Data</label>
                                        <input type="date" name="data_consulta" id="data_consulta" value="" class="form-control">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="select">Selecione o Médico</label>
                                        <select class="form-control" name="select" id="select">
                                        <?php
                                        $resultados = '';
                                        $medicos = Medico::getMedicos();
                                        foreach($medicos as $medico){ 
                                             $resultados .= '<option>'.$medico->medico_nome.'</option>';
                                        }
                                        echo $resultados;
                                        ?>
                                        </select>
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="telefone">Telefone para Contato</label>
                                        <input type="tel" class="form-control" id="paciente_tel" name="paciente_tel" placeholder="DDD+Número" pattern="[0-9]{11}" required>
                                        <label for="Sintoma">Sintomas</label>
                                        <textarea class="form-control" rows="5" id="sintoma" name="sintoma" placeholder="Sintomas"></textarea>
                                        <button type="submit" class="form-control" id="cf-submit" name="submit">Agendar</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
    </section>
     
<?php include_once('include/footer.php'); ?>
