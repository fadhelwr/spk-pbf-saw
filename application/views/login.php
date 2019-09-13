<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Halaman Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fav-ap.png');?>">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/css/metisMenu.min.css" rel="stylesheet">
    <!-- Icons CSS -->
    <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

</head>


<body>

    <!-- HOME -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 card-box">
                            <div class="text-center">
                                <h2 class="text-uppercase m-t-0 m-b-30">
                                    <a href="index.html" class="text-success">
                                        <span><img src="<?php echo base_url();?>assets/images/logo.png" alt="" height="30"></span>
                                    </a>
                                </h2>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" method="POST" action="<?php echo base_url('login/do_login');?>">
                                   <p align="center" style="color:#f71d1d;">
                                     <?php echo $this->session->flashdata('gagallogin'); ?>
                                 </p>
                                 <div class="form-group m-b-20">
                                    <div class="col-xs-12">
                                        <label for="emailaddress">Username</label>
                                        <input class="form-control" type="text" name="username" required placeholder="Masukkan username">
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <div class="col-xs-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required name="password" placeholder="Masukkan password">
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <input class="btn btn-lg btn-custom btn-block" type="submit" name="login" value="LOGIN" />
                                    </div>
                                </div>
                            </form>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <!-- end card-box-->

                </div>
                <!-- end wrapper -->

            </div>
        </div>
    </div>
</section>
<!-- END HOME -->



<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>

<!-- App Js -->
<script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>

</body>
</html>