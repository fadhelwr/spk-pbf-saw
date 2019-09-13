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

                <h5 style="margin-top: 18px;margin-bottom: 0px;text-align: center;"><u>SURAT PESANAN OBAT MENGANDUNG PREKURSOR FARMASI</u></h5>
                <p style="text-align: center;margin-top: 5px;margin-bottom: 0">Nomor SP : <?=$kodeunik;?></p>

                
            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 0px;">
                <div class="col-md-12">                                                
                    <table style="margin-top: 0px">
                        <tr>
                            <td colspan="3"><b>Yang bertanda tangan di bawah ini :</b></td>
                        </tr>
                        <tr>
                            <td>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>: &nbsp;</td>
                            <td><?=$this->session->userdata("namalengkap"); ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan </td>
                            <td>: </td>
                            <td>Apoteker Penanggung Jawab</td>
                        </tr>
                        <tr>
                            <td>No. SIPA </td>
                            <td>: </td>
                            <td><?=$this->session->userdata("sipa"); ?></td>
                        </tr>

                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>

                        <tr>
                            <td colspan="3"><b>Mengajukan pesanan obat mengandung Prekursor Farmasi kepada :</b></td>
                        </tr>
                        <tr>
                            <td>Nama PBF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>: &nbsp;</td>
                            <td><?=$datas->nama?></td>
                        </tr>
                        <tr>
                            <td>Alamat </td>
                            <td>: </td>
                            <td><?=$datas->alamat;?></td>
                        </tr>
                        <tr>
                            <td>Telp </td>
                            <td>: </td>
                            <td><?=$datas->telepon;?></td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Jenis obat mengandung Prekursor Farmasi adalah :</b></td>
                        </tr>
                    </table>
                    <div class="table-responsive" style="margin-top: 10px;">
                        <table class="table table-bordered m-t-0">
                            <thead>
                                <tr>
                                    <th style="width: 10px;font-size: 13px;">No.</th>
                                    <th style="text-align: center;width: 300px;font-size: 13px;">Nama barang</th>
                                    <th style="text-align: center;width: 200px;font-size: 13px;">Zat Prekursor</th>
                                    <th style="text-align: center;font-size: 13px;">Sedia</th>
                                    <th style="text-align: center;font-size: 13px;">Satuan</th>
                                    <th style="text-align: center;font-size: 13px;width: 85px;">QTY</th>
                                    <th style="text-align: center;font-size: 13px;width: 100px;">Ket</th>
                                </tr></thead>
                                <tbody>

                                    <?php
                                    $no =1;

                                    foreach ($obat as $rowdata) {
                                        ?>

                                        <tr>
                                            <td ><?php echo $no++;?></td>
                                            <td style="text-align: center;"><?=$rowdata->nama_barang;?></td>
                                            <td style="text-align: center;"><?=$rowdata->kandungan;?></td>
                                            <td style="text-align: center;"><?=$rowdata->nama_satuan_sedia;?></td>
                                            <td style="text-align: center;"><?=$rowdata->nama_satuan;?></td>
                                            <td style="text-align: center;"><?=$rowdata->jumlah;?> <?=$rowdata->nama_satuan;?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>

                            <table style="margin-top: 0px;margin-bottom: 0px;">
                                <tr>
                                    <td colspan="3"><b>Obat mengandung Prekursor Farmasi tersebut akan digunakan untuk memenuhi kebutuhan :</b></td>
                                </tr>
                                <tr>
                                    <td>Nama Apotek &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td>: &nbsp;</td>
                                    <td>Apotek Pageralang</td>
                                </tr>
                                <tr>
                                    <td>Alamat </td>
                                    <td>: </td>
                                    <td>Pageralang, Rt 03/13 Kec. Kemranjen Kab. Banyumas</td>
                                </tr>
                                <tr>
                                    <td>Surat Izin Apotek </td>
                                    <td>: </td>
                                    <td><?=$this->session->userdata("sia"); ?></td>
                                </tr>
                            </table>
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