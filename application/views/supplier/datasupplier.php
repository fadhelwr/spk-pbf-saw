<div class="row">
    <div class="col-sm-12">
        <h4 class="m-t-0 header-title">Data Supplier</h4>

        <div class="table-responsive m-b-20">
            <?=$this->session->flashdata('pesan')?>
            <div style="margin-bottom: 0px;">
                <a href="<?=base_url()?>supplier/tambah"  class="btn btn-primary"><i class="ti-plus"></i></a>
            </div>

            <table id="datatable" class="table table-striped table-hover">
                <thead>
                    <tr>
                      <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Nama Supplier</th>
                      <th style="text-align: center;">Alamat</th>
                      <th style="text-align: center;">Telepon</th>
                      <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Aksi</th>
                  </tr>
              </thead>

              <tbody>
                <?php 
                $no = 1; 
                foreach ($query as $rowdata) { ?>
                <tr>
                    <td style="text-align: center;"><?=$no++;?></td>
                    <td style="text-align: center;"><?=$rowdata->nama;?></td>
                    <td style="text-align: center;"><?=$rowdata->alamat;?></td>
                    <td style="text-align: center;"><?=$rowdata->telepon;?></td>
                    <td style="text-align: center;"><?=$rowdata->email;?></td>
                    <td style="text-align: center;">
                        <a href="<?=base_url()?>supplier/edit/?kode_supplier=<?=$rowdata->kode_supplier?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>


                        <!-- DELETE MODAL -->
                        <a href="" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal<?=$rowdata->kode_supplier;?>"><i class="glyphicon glyphicon-trash"></i></a>

                        <div id="myModal<?=$rowdata->kode_supplier;?>" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="mySmallModalLabel">Apakah yakin ingin dihapus?</h4>
                                    </div>

                                    <div class="modal-body">
                                      <button type="button" style="margin-right: 15px;" class="btn btn-default " data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                                      <a href="<?php echo base_url().'supplier/hapus/'.$rowdata->kode_supplier;?>" type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
