<?php 

     include_once('include/header-paciente.php'); 
     include_once('include/includes.php'); 



?>

     <section id="team" data-stellar-background-ratio="1">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.1s">Suas Consultas</h2>
                         </div>
                    </div>

                    <div class="clearfix"></div>

                    <?php
                         $resultados = '';
                         $consultas = Consulta::getConsultas();
                         foreach($consultas as $consulta){ 
                              $agenda = Agenda::getAgenda($consulta->agenda_id_fk);
                              $medico = Medico::getMedico($agenda->medico_id_fk);
                              $resultados .= 
                                   '<div class="col-md-4 col-sm-6">
                                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                                             <img src="images/appointment.jpeg" class="img-responsive" alt="">
                                                  <div class="team-info">
                                                       <h3>'.$consulta->consulta_data.'</h3>
                                                       <h5>'.$agenda->agenda_hora.'</h5>
                                                       <p>'.$medico->medico_nome.'</p>
                                                            <div class="team-contact-info">
                                                                 <p><i class="fa fa-phone"></i>'.$medico->medico_tel.'</p>
                                                                 <p><i class="fa fa-envelope-o"></i> <a href="#"></a>'.$medico->medico_email.'</p>
                                                            </div>
                                                            <ul class="social-icon">
                                                                 <li><a href="editar_consulta.php?id='.$consulta->consulta_id.'" class="fa fa-pencil"></a></li>
                                                            </ul>
                                                  </div>
                    
                                        </div>
                                   </div>';
                         }
                         echo $resultados;
                    ?>
                    
               </div>
          </div>
     </section>

<?php include_once('include/footer.php'); ?>