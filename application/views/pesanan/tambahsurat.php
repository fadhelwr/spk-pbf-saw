<?php error_reporting((E_ALL ^ (E_NOTICE | E_WARNING)));?>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-t-0 header-title">
            <?=$title;?>
            &nbsp;&nbsp;
            <?php
            if ($saran == NULL) { ?>
            <small>(Anda belum melakukan evaluasi supplier, klik <a href="http://localhost/appku/supplier/evaluasi-supplier" class="btn btn-xs btn-primary">di sini</a> untuk melakukan evaluasi supplier!)</small>
            <?php } 
            if ($saran != NULL) { }?>
        </h4>

        <form id="form_validation" method="POST" action="<?=base_url()?>suratpesanan/simpansurat">
            <div class="col-md-12">
                <small>
                    <div class="alert alert-info fade in" role="alert">
                        <strong> 1. Pilih obat, qty (jumlah pesanan), dan satuan yang akan dipesan. Kemudian klik <span class="label label-primary">Tambahkan</span></strong>
                    </div>
                </small>
            </div>
            <div class="col-md-2">
                <label for="">No. Surat</label>
                <input type="text" class="form-control" value="<?=$kodeunik;?>" name="kode" readonly="" required/>
            </div> 

            <div class="col-md-6">
                <label for="">Barang</label>
                <select class="form-control select2" name="kode_brg">
                    <?php foreach ($dataobat as $row) { ?>

                    <option value="<?=$row->kode_barcode;?>"><?=$row->nama_barang;?> || <?=$row->kode_barcode;?></option>

                    <?php }?>
                </select>
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
                                <?php foreach($query as $sat) { ?>
                                <option value="<?=$sat->id_satuan;?>"><?=$sat->nama_satuan;?></option>
                                <?php } ?>
                            </optgroup>                    
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <label for="">&nbsp;</label>
                <input type="submit" name="simpan" value="Tambahkan" class="form-control btn btn-primary waves-effect">
            </div>
        </form>

        <form method="POST" action="<?=base_url()?>suratpesanan/update_supp/?kode=<?=$kodeunik;?>">
            <div class="col-md-12">
                <small><div class="alert alert-warning fade in" role="alert">
                    <strong>2. Periksa kembali pesanan Anda. Jika sudah siap, atur tanggal dan pilih Supplier Obat yang diinginkan kemudian klik</strong> <span class="label label-info">Simpian</span>
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

            <!-- TABEL PESANAN -->
            <div class="row">
                <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table m-t-30">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Nama Barang</th>
                                <th style="text-align: center;">Jumlah</th>
                                <th style="text-align: center;">Satuan</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($datas as $row) {?>

                            <tr align="center">
                                <td style="text-align: center;"><?=$no++;?>.</td>
                                <td style="text-align: center;"><?=$row->nama_barang;?></td>
                                <td style="text-align: center;" width="100"><?=$row->jumlah?></td>
                                <td style="text-align: center;"><?=$row->nama_satuan;?></td>
                                <td style="text-align: center;">
                                    <a href="<?php echo base_url().'suratpesanan/del_list/'.$row->id.'/'.$row->kode_trx;?>" title="Tambah" class="btn btn-xs btn-danger"><i class="ti-close"></i></a>
                                </td>
                            </tr>
                            <?php } ?>

                            <tr>
                                <th colspan="4"></th>
                                <td td style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;
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