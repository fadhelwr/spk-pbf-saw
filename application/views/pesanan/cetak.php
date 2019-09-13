<div class="row">
    <div class="col-md-12">
        <div class="panel-body">
            <div class="clearfix">
                <center>
                    <table>

                        <tr>
                            <td>
                                <img src="<?=base_url()?>assets/images/logo.png" alt="" height="40" style="margin-bottom: 5px;width: 100%;height: 100%">
                            </td>
                            <td style='width:20px;'>
                                <p>&nbsp;</p>
                            </td>
                            <td>
                                <p style="margin-bottom: 0px;"><small>Pageralang - Kemranjen - Banyumas</small></p>
                                <p style="margin-bottom: 0px;"><small>APA : <?php echo $this->session->userdata("namalengkap"); ?></small></p>
                                <p style="margin-bottom: 0px;"><small>SIA : <?php echo $this->session->userdata("sia"); ?></small></p>
                                <p><small>SIPA : <?php echo $this->session->userdata("sipa"); ?></small></p>
                            </td>
                        </tr>
                    </table>
                </center>

                

                <hr style="width: 100%;border-style: double;border-width: 1px;margin-top: 2px;margin-bottom: 0px">

                <h4 style="margin-top: 18px;margin-bottom: 0px;text-align: center;"><u>SURAT PESANAN</u></h4>

                
            </div>

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="pull-left m-t-30">
                        
                        <p><b>Kepada. Yth. <?=$datas->nama?></b></p>
                        <p class="text-muted"><small>Mohon dikirim obat-obatan untuk keperluan apotek.</small> </p>
                    </div>

                    <div class="pull-right m-t-30">
                        <p><b>No. : </b><?=$kodeunik;?></p>
                    </div>

                </div><!-- end col -->
                
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered m-t-30">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama barang</th>
                                    <th style="text-align: center;">Jumlah</th>
                                    <th style="text-align: center;">Satuan</th>
                                </tr></thead>
                                <tbody>

                                    <?php
                                    $no =1;

                                    foreach ($obat as $rowdata) {
                                        ?>

                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><b><?=$rowdata->nama_barang?></b></td>
                                            <td style="text-align: center;"><?=$rowdata->jumlah?></td>
                                            <td style="text-align: center;"><?=$rowdata->nama_satuan?></td>
                                        </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="clearfix p-t-50">
                        
                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 col-md-offset-3">
                    <div class="pull-right">
                        <br><br><br>
                        <p style="text-align: center;margin-bottom: 75px">
                            <b>Pageralang, <?=Suratpesanan::format($datas->tgl_surat);?></b><br>
                            
                            <b>Apoteker Penanggung Jawab</b></p>
                            <h5><?php echo $this->session->userdata("namalengkap"); ?></h5>
                            <hr style="border-style: solid #000;margin-bottom: 0px;margin-top: 0px">
                            <h5>SIPA : <?php echo $this->session->userdata("sipa"); ?></h5>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="hidden-print m-t-30 m-b-30">
                    <div class="text-right">
                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="ti-printer"></i> Cetak</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
                        <!-- end row -->