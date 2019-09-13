<?php error_reporting((E_ALL ^ (E_NOTICE | E_WARNING)));?>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-t-0 header-title">
            <?=$title;?> <span class="label label-danger">Prekursor</span>
            &nbsp;&nbsp;
            <?php
            if ($saran == NULL) { ?>
            <small>(Anda belum melakukan evaluasi supplier, klik <a href="http://localhost/appku/supplier/evaluasi-supplier" class="btn btn-xs btn-primary">di sini</a> untuk melakukan evaluasi supplier!)</small>
            <?php } 
            if ($saran != NULL) { }?>
        </h4>

        

        <form id="form_validation" method="POST" action="<?=base_url()?>suratpesanan/simpansuratpre">
            <div class="col-md-12">
                <label for=""></label>
                <small>
                    <div class="alert alert-info fade in" role="alert">
                        <strong> 1. Pilih obat, qty (jumlah pesanan), dan satuan yang akan dipesan. Kemudian klik <span class="label label-danger">Tambahkan</span></strong>
                    </div>
                </small>
            </div>
            <div class="col-md-2">
                <label for="">No. TRX</label>
                <input type="text" class="form-control" value="<?=$kodeunik;?>" name="kode" readonly="" required/>
            </div>

            <div class="col-md-5">
                <label for="">Barang</label>
                <select class="form-control select2" name="kode_brg">
                    <?php foreach ($dataobat as $row) { ?>

                    <option value="<?=$row->kode_barcode;?>"><?=$row->nama_barang;?> || <?=$row->kode_barcode;?></option>  

                    <?php }?>
                </select>
            </div>

            <div class="col-sm-1">
                <label for="">Sedia</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="satuan_sedia" class="form-control select2">
                            <optgroup label="Pilih satuan">
                                <?php foreach($querys as $sat){?>
                                <option value="<?=$sat->id_satuan;?>"><?=$sat->nama_satuan_sedia;?></option>
                            </optgroup>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div> 

            <div class="col-md-1">
                <label for="">QTY</label>
                <input type="number" class="form-control" placeholder="qty" name="qty" required/>
            </div> 

            <div class="col-sm-1">
                <label for="">Satuan</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="satuan" class="form-control select2">
                            <optgroup label="Pilih satuan">
                                <?php foreach($query as $sat){?>
                                <option value="<?=$sat->id_satuan;?>"><?=$sat->nama_satuan;?></option>
                            </optgroup>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div> 

            <div class="col-md-2">
                <label for="">&nbsp;</label>
                <input type="submit" name="simpan" value="Tambahkan" class="form-control btn btn-danger waves-effect">
            </div>
        </form>

        <form method="POST" action="<?=base_url()?>suratpesanan/update_supp_pre/?kode=<?=$kodeunik;?>">
            <div class="col-md-12" style="margin-top: 15px">
                <small><div class="alert alert-warning fade in" role="alert">
                    <strong>2. Periksa kembali pesanan Anda. Jika sudah siap, pilih Supplier Obat yang diinginkan kemudian klik</strong> <span class="label label-info">Simpian</span>
                </div></small>
            </div>
            <div class="col-md-2">
                <label for="">Tanggal <i class="ti-info-alt text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Kosongkan jika untuk hari ini!"></i></label>
                <div class="input-group">
                    <input class="form-control" id="date" name="tgl_pemesanan" placeholder="yyyy-mm-dd" type="text" required="" readonly="" />
                    <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                </div><!-- input-group -->
            </div>
            <div class="col-md-4">
                <label for="">Supplier</label>

                <select class="form-control select2" name="supplier">

                    <optgroup label="Saran bulan ini">
                        <option>
                            <?php
                                if ($saran == NULL) {
                                    echo "Belum ada saran, klik untuk pilihan lain!";
                                }

                                if ($saran != NULL) {
                                    echo $saran->nama;
                                }
                            ?>
                        </option>
                    </optgroup>

                    <optgroup label="Pilihan lain">
                        <?php foreach ($datasupp as $row) {?>

                        <option value="<?=$row->kode_supplier;?>"><?=$row->nama;?></option>

                        <?php } ?>
                    </optgroup>
                </select>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table m-t-30">
                            <thead>
                                <tr>
                                    <th style="text-align: center;width: 20px">No.</th>
                                    <th style="text-align: center;">Nama Barang</th>
                                    <th style="text-align: center;">Zat Prekursor</th>
                                    <th style="text-align: center;">Bentuk Sedia</th>
                                    <th style="text-align: center;width:">Satuan</th>
                                    <th style="text-align: center;width: 20px">Jumlah</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($datas as $row) {?>
                                <tr>
                                    <td style="text-align: center;"><?=$no++;?>.</td>
                                    <td style="text-align: center;width: 300px"><?=$row->nama_barang;?></td>
                                    <td style="text-align: center;width: 200px"><?=$row->kandungan;?></td>
                                    <td style="text-align: center;width: 20px"><?=$row->nama_satuan_sedia;?></td>
                                    <td style="text-align: center;"><?=$row->nama_satuan;?></td>
                                    <td style="text-align: center;" width="100"><?=$row->jumlah?> <?=$row->nama_satuan;?></td>
                                    <td style="text-align: center;">
                                        <a href="<?=base_url()?>suratpesanan/tambah_qtypre/?id=<?=$row->id?>&kode_trx=<?=$row->kode_trx?>&qty=<?=$row->jumlah?>" title="Tambah" class="btn btn-xs btn-info"><i class="ti-plus"></i></a>

                                        <a href="<?=base_url()?>suratpesanan/kurang_qtypre/?id=<?=$row->id?>&kode_trx=<?=$row->kode_trx?>&qty=<?=$row->jumlah?>" title="Kurang" class="btn btn-xs btn-warning"><i class="ti-minus"></i></a>
                                        <a href="<?php echo base_url().'suratpesanan/del_listpre/'.$row->id.'/'.$row->kode_trx;?>" title="Hapus" class="btn btn-xs btn-danger"><i class="ti-close"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>

                                <tr>
                                    <th colspan="5"></th>
                                    <td style="text-align: center;" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="submit" name="simpan_pj" value="Simpan" class="btn btn-info">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>