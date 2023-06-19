<?php 

     include_once('include/header.php'); 
     include_once('include/includes.php');

?>
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Conheça nossos Especialistas</h3>
                                             <h1></h1>
                                             <a href="#team" class="section-btn btn btn-default smoothScroll">Nossos Especialistas</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Conheça nossa equipe</h3>
                                             <h1></h1>
                                             <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">Sobre nós</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>

     <section id="team" data-stellar-background-ratio="1">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.1s">Nossos Especialistas</h2>
                         </div>
                    </div>

                    <div class="clearfix"></div>

                    <?php
                         $resultados = '';
                         $medicos = Medico::getMedicos();
                         foreach($medicos as $medico){ 
                              $medico_especialidade = Especialidade::getEspecialidade($medico->medico_especialidade_fk);
                              $resultados .= 
                                   '<div class="col-md-4 col-sm-6">
                                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                                             <img src="images/doctor.jpg" class="img-responsive" alt="">
                                                  <div class="team-info">
                                                       <h3>'.$medico->medico_nome.'</h3>
                                                       <p>'.$medico_especialidade->especialidade_nome.'</p>
                                                            <div class="team-contact-info">
                                                                 <p><i class="fa fa-phone"></i>'.$medico->medico_tel.'</p>
                                                                 <p><i class="fa fa-envelope-o"></i> <a href="#">'.$medico->medico_email.'</a></p>
                                                            </div>
                                                            <ul class="social-icon">
                                                                 <li><a href="https://pt-br.facebook.com/" class="fa fa-facebook-square"></a></li>
                                                                 <li><a href="mailto:'.$medico->medico_email.'" class="fa fa-envelope-o"></a></li>
                                                                 <li><a href="https://www.instagram.com/" class="fa fa-instagram"></a></li>
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

     <section id="google-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.9519821877857!2d-47.336596125381064!3d-22.355441879646992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c87088f8596037%3A0xe6300980fc459049!2sFATEC%20Araras%20-%20Faculdade%20de%20Tecnologia%20de%20Araras!5e0!3m2!1spt-BR!2sbr!4v1687121688558!5m2!1spt-BR!2sbr" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
     </section>           

<?php include_once('include/footer.php'); ?>