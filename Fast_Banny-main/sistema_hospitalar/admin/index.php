<?php
include("../include/validate.php");

?>
<!doctype html>
<html>
    <head>
        <title>Admin Dashboard</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px;">
                        <?php
                        include("sidnav.php");
                         ?>
                    </div>
                    <div class="col-md-10">
                        <h4 class="my-2">Admin Dashboard</h4>

                        <div class="col-md-12 my-1">
                            <div class="row">
                            <div class="col-md-3 bg-success   mx-2" style="height: 130px;">   
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5 class="my-2  text-white text-center" style=font-size:30px; >0</h5>
                                             <h5 class="text-White">total</h5>
                                             <h5 class="text-White">Admin</h5>
                                        </div>
                                        <div class="col-md-3">
                                        <i class="fa"></i>
                                        </div>
                                    </div>
                                </div>     

                            </div>
                                <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                                    

                                </div>
                                <div class="col-md-3 bg-warning mx-2 " style="height: 130px;">
                                    

                                </div>
                                <div class="col-md-3 bg-danger mx-2 mix-1" style="height: 130px;">
                                    

                                </div>
                                <div class="col-md-3 bg-warning mx-2 mix-1" style="height: 130px;">
                                    

                                </div>
                                <div class="col-md-3 bg-success mx-2 mix-1" style="height: 130px;">
                                    

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
 