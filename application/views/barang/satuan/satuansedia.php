<div class="row">
  <div class="col-sm-12">
    <h4 class="m-t-0 header-title"><?=$title;?></h4>

    <div class="table-responsive m-b-20">
      <?=$this->session->flashdata('pesan')?>
      <div style="margin-bottom: 0px;">
        <a href="<?=base_url()?>barang/tambah_satuan_sedia"  class="btn btn-primary"><i class="ti-plus"></i></a>
      </div>

      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th style="text-align: center;">No.</th>
                  <th style="text-align: center;">Satuan</th>
            <th style="text-align: center;">Keterangan</th>
                  <th style="text-align: center;">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($query as $rowdata) { ?>
          <tr>
            <td style="text-align: center;" width="10"><?=$rowdata->id_satuan;?></td>
            <td style="text-align: center;"><?=$rowdata->nama_satuan_sedia;?></td>
            <td style="text-align: center;"><?=$rowdata->keterangan;?></td>
            <td style="text-align: center;" width="10">
              <a href="<?=base_url()?>barang/edit_satuan_sedia/?id=<?=$rowdata->id_satuan;?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
              
              <!--<a href="<?php echo base_url().'barang/hapus/'.$rowdata->kode_barcode;?>" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>-->

              <a href="" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal<?=$rowdata->id_satuan;?>"><i class="glyphicon glyphicon-trash"></i></a>

              <div id="myModal<?=$rowdata->id_satuan;?>" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="mySmallModalLabel">Apakah yakin ingin dihapus?</h4>
                    </div>

                    <div class="modal-body">
                      <button type="button" style="margin-right: 15px;" class="btn btn-default " data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> TIDAK</button>
                      <a href="<?php echo base_url().'barang/hapus/'.$rowdata->id_satuan;?>" type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> YA</a>
                    </div>
                  </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </td>

            
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



