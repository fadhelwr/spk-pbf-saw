<?php error_reporting((E_ALL ^ (E_NOTICE | E_WARNING)));?>
<div class="row">
    <div class="col-sm-12" style="margin-bottom: 10px">
        <h4 class="header-title m-t-0 m-b-0">Validasi Barang</h4>
    </div>

    <div class="col-sm-12" style="margin-bottom: 10px">
        <a href="<?=base_url('suratpesanan')?>" class="btn btn-sm btn-primary" "><i class="ti-back-right"></i> Kembali</a>
    </div>

    <?=$this->session->flashdata('pesan')?>
    <div class="body">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table m-t-30">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Nama Barang</th>
                            <th style="text-align: center;">QTY</th>
                            <th style="text-align: center;">Satuan</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($datas as $row) {

                            ?>
                            <tr align="center">
                                <td style="text-align: center;vertical-align: middle;"><?=$no++;?></td>
                                <td style="text-align: center;vertical-align: middle;"><?=$row->nama_barang;?></td>
                                <td style="text-align: center;vertical-align: middle;width: 95px"><?=$row->jumlah;?></td>
                                <td style="text-align: center;vertical-align: middle;"><?=$row->nama_satuan;?></td>
                                
                                <td style="text-align: center;vertical-align: middle;">
                                    <?php if ($row->status == "ORDER") { ?>

                                    <a href="<?php echo base_url().'suratpesanan/validasistatus/'.$row->id.'/'.$row->kode_trx;?>" title="Hapus" class="btn btn-xs btn-dark"><i class="ti-check"></i></a>

                                    
                                    <?php } if ($row->status == "SUCCESS") {?>

                                    <a href="#" class="btn btn-sm btn-rounded btn-success"><i class="ti-check"></i></a> 
                                    <?php } ?>
                                </td>
                            </tr>

                            <?php } ?>

                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div> <!-- end row -->