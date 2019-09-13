<div class="row">
    <div class="col-sm-12">
        <h4 class="m-t-0 header-title"><?=$title?></h4>

        <div class="table-responsive m-b-20">
            <?=$this->session->flashdata('pesan')?>
            <div style="margin-bottom: 0px;">
                <a href="<?=base_url()?>user/tambah"  class="btn btn-primary"><i class="ti-plus"></i></a>
            </div>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                      <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Nama</th>
                      <th style="text-align: center;">level</th>
                      <th style="text-align: center;">foto</th>
                            <th style="text-align: center;">Aksi</th>
                  </tr>
              </thead>

              <tbody>
                <?php $no = 1; foreach ($query as $rowdata) { ?>
                <tr>
                    <td style="text-align: center;vertical-align: middle"><?=$no++?></td>
                    <td style="text-align: center;vertical-align: middle"><?=$rowdata->nama?></td>
                    <td style="text-align: center;vertical-align: middle"><?=$rowdata->level?></td>
                    <td style="text-align: center;vertical-align: middle"><img src="<?=base_url()?>assets/images/users/<?=$rowdata->foto?>" width="50" height="50" alt=""></td>
                    <td style="text-align: center;vertical-align: middle">
                        <a href="<?=base_url();?>user/lihatprofil/?id=<?=$rowdata->id?>" class="btn btn-xs btn-primary">Edit <i class="glyphicon glyphicon-pencil"></i></a>
                        <!--<a href="" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>-->
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
