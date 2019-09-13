<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?=$title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fav-ap.png');?>">

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-iso.css" />

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/css/metisMenu.min.css" rel="stylesheet">
    <!-- Icons CSS -->
    <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

    <!-- PLUGIN -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css"/>


    <!-- SELECT2 -->
    <link href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        tr.group,
        tr.group:hover {
            background-color: #EAF7FB !important;
        }

        td.details-control {
            background: url('../resources/details_open.png') no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            background: url('../resources/details_close.png') no-repeat center center;
        }
    </style>


</head>


<body>

    <div id="page-wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <div class="">
                    <a href="<?php echo base_url();?>" class="logo">
                        <img src="<?php echo base_url();?>assets/images/logo.png" alt="logo" class="logo-lg" />
                        <img src="<?php echo base_url();?>assets/images/logo_sm.png" alt="logo" class="logo-sm hidden" />
                    </a>
                </div>
            </div>

            <!-- Top navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">

                        <!-- Mobile menu button -->
                        <div class="pull-left">
                            <button type="button" class="button-menu-mobile visible-xs visible-sm">
                                <i class="fa fa-bars"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>

                        <!-- Top nav left menu 
                        <ul class="nav navbar-nav hidden-sm hidden-xs top-navbar-items">
                            <li><a href="#">Page rendered in <strong>{elapsed_time}</strong> seconds.</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul> -->

                        <!-- Top nav Right menu -->
                        <ul class="nav navbar-nav navbar-right top-navbar-items-right pull-right">

                            <li class="dropdown top-menu-item-xs">
                                <a href="" class="dropdown-toggle menu-right-item profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url();?>assets/images/users/<?php echo $this->session->userdata("foto"); ?>" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url();?>user/lihatprofil/?id=<?=$this->session->userdata("id"); ?>"><i class="ti-user m-r-10"></i> Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url('login/logout');?>"><i class="ti-power-off m-r-10"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end container -->
            </div> <!-- end navbar -->
        </div>
        <!-- Top Bar End -->


        <!-- Page content start -->
        
        <div class="page-contentbar">

            <!--left navigation start-->
            <aside class="sidebar-navigation">
                <div class="scrollbar-wrapper">
                    <div>
                        <button type="button" class="button-menu-mobile btn-mobile-view visible-xs visible-sm">
                            <i class="mdi mdi-close"></i>
                        </button>
                        <!-- User Detail box -->
                        <div class="user-details">
                            <div class="pull-left">
                                <img src="<?php echo base_url();?>assets/images/users/<?php echo $this->session->userdata("foto"); ?>" alt="" class="thumb-md img-circle">
                            </div>
                            <div class="user-info">
                                <a href="<?=base_url();?>user/lihatprofil/?id=<?=$this->session->userdata("id"); ?>"><?php echo $this->session->userdata("namalengkap"); ?></a>
                                <p class="text-muted m-0"><?php echo $this->session->userdata("level"); ?></p>
                            </div>
                        </div>
                        <!--- End User Detail box -->

                        <!-- Left Menu Start -->
                        <ul class="metisMenu nav" id="side-menu">
                            <li><a href="<?php echo base_url();?>"><i class="ti-home"></i> Dashboard </a></li>

                            <?php if($this->session->userdata('level') == "admin"){ ?>
                            
                            <li><a href="<?php echo base_url('barang');?>"><i class="ti-package"></i> Data Obat </a></li>

                            <li><a href="#"><i class="ti-info-alt"></i> SPK <span class="fa arrow"></a>
                                <ul class="nav-second-level nav" aria-expanded="true">
                                    <li><a href="<?php echo base_url('supplier/evaluasi-supplier');?>">Evaluasi Supplier</a></li>
                                    <li><a href="<?php echo base_url('supplier/daftar-kriteria');?>">Daftar Kriteria</a></li>
                                     <li><a href="<?php echo base_url('supplier/spk-penilaian-kriteria');?>">Riwayat Penghitungan</a></li>
                                </ul>
                            </li>

                            <li><a href="<?php echo base_url('supplier');?>"><i class="ti-truck"></i> Supplier</a></li>

                            <li><a href="<?php echo base_url('user');?>"><i class="ti-user"></i> Pengguna</a></li>

                            <li>
                                <a href="javascript: void(0);" aria-expanded="true"><i class="ti-share"></i> Surat Pesanan<span class="fa arrow"></span></a>
                                <ul class="nav-second-level nav" aria-expanded="true">
                                    <li><a href="<?php echo base_url('suratpesanan');?>">Umum</a></li>
                                    <li><a href="<?php echo base_url('suratpesanan/prekursor');?>">Prekursor</a></li>
                                </ul>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div><!--Scrollbar wrapper-->
            </aside>
            <!--left navigation end-->

            <!-- START PAGE CONTENT -->
            <div id="page-right-content">

                <div class="container">

                    <?php echo $contents;?>

                </div>
                <!-- end container -->

                <div class="footer">
                    <div class="pull-right hidden-xs">
                        <b>STMIK AMIKOM PURWOKERTO</b> <img src="<?php echo base_url();?>assets/images/amikom20.png">
                    </div>
                    <div>
                        <strong>Apotek Pageralang</strong> - Fadhel &copy; 2018 
                    </div>
                </div> <!-- end footer -->

            </div>
            <!-- End #page-right-content -->

        </div>
        <!-- end .page-contentbar -->
    </div>
    <!-- End #page-wrapper -->



    <!-- js placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>

    <!--Morris Chart-->
    <script src="<?php echo base_url();?>assets/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/raphael/raphael-min.js"></script>

    <!-- Dashboard init -->
    <script src="<?php echo base_url();?>assets/pages/jquery.dashboard.js"></script>

    <!-- App Js -->
    <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>

    <!-- Datatable js -->
    <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/responsive.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.colVis.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

    <script src="<?php echo base_url();?>assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>


    <!-- init -->
    <script src="<?php echo base_url();?>assets/pages/jquery.datatables.init.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

    <!-- SELECT2  -->
    <script src="<?php echo base_url();?>assets/plugins/select2/js/select2.full.js" type="text/javascript"></script>

    <!-- DATE PICKER -->
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>

    <!-- form advanced init js -->
    <script src="<?php echo base_url();?>assets/pages/jquery.form-advanced.init.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/moment/moment.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable(
            {
                "aaSorting": [[0,'desc']]
            } );
        });
    </script>

    <script>
        $(document).ready(function() {
            var groupColumn = 0;
            var table = $('#example').DataTable({
                "columnDefs": [
                { "visible": false, "targets": groupColumn }
                ],
                "order": [[ groupColumn, 'desc' ]],
                "displayLength": 25,
                "drawCallback": function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;
                    
                    api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {
                            $(rows).eq( i ).before(
                                '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                                );
                            
                            last = group;
                        }
                    } );
                }
            } );
    } );
</script>

<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/formden.js"></script>
<script>
    $(document).ready(function(){
        var date_input=$('input[name="tgl_pemesanan"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-m-d',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
</body>
</html>