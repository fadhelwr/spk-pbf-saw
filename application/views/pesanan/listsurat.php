<div class="row">
  <div class="col-sm-12">
    <h4 class="m-t-0 header-title"><?=$title?></h4>

    <div class="table-responsive m-b-20">
      <div style="margin-bottom: 0px;">
        <a href="<?=base_url()?>suratpesanan/tambah"  class="btn btn-primary"><i class="ti-plus"></i></a>
      </div>      
      <br>

      <div class="panel panel-color panel-custom">
        <div class="panel-heading">
          <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">
          <table id="dataTables-example" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th style="text-align: center;">#</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($query as $rowdata) { ?>
                <tr>
                  <td colspan="6">
                    
                    <div class="col-sm-4">
                      <a data-toggle="collapse" href="#collapseExample<?=$rowdata->kode_trx;?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span style="margin-right: 25px;"><b><?=$rowdata->kode_trx;?></b></span>
                      </a>

                      <span style="text-align: center;margin-right: 0px">
                        <a href="<?=base_url().'suratpesanan/edit-status/'.$rowdata->kode_trx?>" class="btn btn-xs btn-rounded btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tinjau">
                          <i class="mdi mdi-grease-pencil"></i>
                        </a>

                        <a href="<?=base_url()?>suratpesanan/cetak/?kode=<?=$rowdata->kode_trx?>" class="btn btn-xs btn-rounded btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cetak">
                          <i class="mdi mdi-printer"></i>
                        </a>

                        <!--<a href="<?=base_url()?>suratpesanan/cetak-pdf/?kode=<?=$rowdata->kode_trx?>" target="_blank" class="btn btn-xs btn-rounded btn-custom" data-toggle="tooltip" data-placement="top" title="" data-original-title="Unduh">
                          <i class="mdi mdi-download"></i>
                        </a>-->


                        <!-- DELETE MODAL -->
                        <a href="" class="btn btn-xs btn-rounded btn-danger" data-toggle="modal" data-target="#myModal<?=$rowdata->kode_trx;?>">
                          <i class="mdi mdi-close"></i>
                        </a>

                        <div id="myModal<?=$rowdata->kode_trx;?>" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="mySmallModalLabel">Apakah yakin ingin dihapus?</h4>
                              </div>

                              <div class="modal-body">
                                <button type="button" style="margin-right: 15px;" class="btn btn-default " data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                                <a href="<?php echo base_url().'suratpesanan/hapus/'.$rowdata->kode_trx;?>" type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                              </div>
                            </div><!-- /.modal-content -->

                          </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                      </span>
                    </div>

                    <div class="col-sm-4">
                      <span style="margin-right: 0px"><b><?=$rowdata->nama;?></b></span>
                    </div>

                    <div class="col-sm-4">
                      <span style="margin-right: 0px"><b><?=Suratpesanan::format($rowdata->tgl_surat);?></b></span>
                    </div>

                    <div class="collapse" id="collapseExample<?=$rowdata->kode_trx;?>" style="margin-top: 40px">
                      <div class="card card-body">
                        <?php 

                        $kd = $rowdata->kode_trx;
                        $no = 1;
                        $sql= "SELECT nama_barang, status FROM tb_pembelian_detail
                        INNER JOIN tb_barang 
                        ON tb_pembelian_detail.kode_barcode=tb_barang.kode_barcode
                        AND tb_pembelian_detail.kode_trx='$kd'";

                        $query = $this->db->query($sql);

                        if ($query->num_rows() > 0) {
                          foreach ($query->result() as $row) {?>

                            <p align="left">
                              <span class="label label-danger"><?=$row->nama_barang;?></span>
                              <?php 
                                if ($row->status == "ORDER") { ?>
                                  &nbsp;
                              <?php } ?>

                              <?php
                                if ($row->status == "SUCCESS") { ?>
                                  <button type="button" class="btn btn-xs btn-success btn-rounded"><small><i class="ti-check"></i></small></button>
                              <?php } ?>
                            </p>

                          <?php }
                        } ?>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <table id="example"
            class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th style="text-align: center;">Kode Transaksi</th>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Harga</th>
                    <th style="text-align: center;">Total Biaya Order</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $rowdata) { ?>
                <tr>
                    <td style="text-align: center;">

                        <div class="col-sm-4">
                            <b>No. <?=$rowdata->kode_trx;?>
                            </div>

                            <div class="col-sm-2">
                                <?=$rowdata->nama;?>
                            </div>

                            <div class="col-sm-2">
                                <?=Suratpesanan::format($rowdata->tgl_pembelian);?>
                            </div>

                            <div class="col-sm-2">
                                Rp<?=number_format($rowdata->subtotal).',-';?>
                                <?php 
                                if ($rowdata->status == "ORDER") { ?>
                                <button type="button" class="btn btn-xs btn-warning btn-rounded"><small><i class="mdi mdi-information-variant"></i></small></button>
                                <?php    
                            }
                            ?>

                            <?php
                            if ($rowdata->status == "SUCCESS") { ?>
                            <button type="button" class="btn btn-xs btn-success btn-rounded"><small><i class="ti-check"></i></small></button>
                            <?php    
                        } ?></b>
                    </div>

                    <div class="col-sm-2">
                        <?php 
                        if ($rowdata->status == "ORDER") { ?>
                        <a href="<?=base_url()?>suratpesanan/validasi_trx/?kode=<?=$rowdata->kode_trx?>" class="btn btn-xs btn-dark"><i class="ti-check"></i></a>
                        <?php } ?>

                        <a href="<?=base_url()?>suratpesanan/edit_status/?kode=<?=$rowdata->kode_trx?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="<?=base_url()?>suratpesanan/cetak/?kode=<?=$rowdata->kode_trx?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-print"></i></a>
                        

                        
                        <a href="" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal<?=$rowdata->kode_trx;?>"><i class="glyphicon glyphicon-trash"></i></a>

                        <div id="myModal<?=$rowdata->kode_trx;?>" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="mySmallModalLabel">Apakah yakin ingin dihapus?</h4>
                                    </div>

                                    <div class="modal-body">
                                      <button type="button" style="margin-right: 15px;" class="btn btn-default " data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                                      <a href="<?php echo base_url().'suratpesanan/hapus/'.$rowdata->kode_trx;?>" type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                  </div>
                              </div>

                          </div><
                      </div><
                  </div>
              </div>

          </td>
          <td style="text-align: center;"><?=$rowdata->nama_barang;?> </td>

          <?php 
          if ($rowdata->harga == 0) {?>
          <td style="text-align: center;"><span class="label label-warning">Belum Divalidasi</span></td>
          <?php } else { ?>

          <td style="text-align: center;">Rp<?=number_format($rowdata->harga).',-';?> @<?=$rowdata->jumlah;?> <?=$rowdata->nama_satuan;?></td>
          <?php } ?>

          <td style="text-align: center;">Rp<?=number_format($rowdata->total).',-';?></td>
      </tr>
      <?php } ?>
  </tbody>
</table> -->
