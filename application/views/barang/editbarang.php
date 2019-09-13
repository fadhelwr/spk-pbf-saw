<script>
    function sum() {
        var harga_beli  = document.getElementById('harga_beli').value;
        var harga_jual  = document.getElementById('harga_jual').value;
        var result      = parseInt(harga_jual) - parseInt(harga_beli);

        if (!isNaN(result)) {
            document.getElementById('profit').value = result;
        }
    }
</script>
<div class="row">
    <div class="col-sm-12">
        <h4 class="header-title m-t-0 m-b-20">Edit Barang</h4>
    </div>
</div> <!-- end row -->

<div class="body">
    <form id="form_validation" method="POST" action="<?=base_url()?>barang/simpan_update">
      <div class="col-sm-2">
        <label for="">Kode Barcode</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" class="form-control" readonly="" name="kode" value="<?=$row->kode_barcode?>" required/>
            </div>
        </div>
    </div>

    <div class="col-xs-6">
        <label for="">Nama Barang</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" class="form-control" name="namabarang" value="<?=$row->nama_barang?>" required/>
            </div>
        </div>
    </div>

    <div class="col-xs-2">
        <label for="">Stok</label>
        <div class="form-group">
            <div class="form-line">
                <input type="number" class="form-control" name="stok" value="<?=$row->stok?>" required/>
            </div>
        </div>
    </div>

    <div class="col-xs-2">
        <label for="">Satuan</label>
        <div class="form-group">
            <div class="form-line">
                <select name="satuan" class="form-control select2">
                    <option value="<?=$row->id_satuan;?>"><?=$row->nama_satuan;?></option>

                    <optgroup label="Pilih satuan">
                        <?php foreach($query as $sat){?>
                        <option value="<?=$sat->id_satuan;?>"><?=$sat->nama_satuan;?></option>
                    </optgroup>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-sm-2">
        <label for="">Harga Jual</label>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon bg-primary" style="color: #FFF">Rp</span>
                <input type="number" class="form-control" name="hrg_jual" placeholder="" value="<?=$row->harga_jual;?>" id="harga_jual" onkeyup="sum()">
            </div><!-- input-group -->
        </div>
    </div>

    <div class="col-sm-2">
        <label for="">Harga Beli</label>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon bg-primary" style="color: #FFF">Rp</span>
                <input type="number" class="form-control" name="hrg_beli" placeholder="" value="<?=$row->harga_beli;?>" id="harga_beli" onkeyup="sum()">
            </div><!-- input-group -->
        </div>
    </div>

    <div class="col-sm-2">
        <label for="">Profit</label>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon bg-primary" style="color: #FFF">Rp</span>
                <input type="number" class="form-control" name="profit" readonly="" value="<?=$row->profit;?>" id="profit" onkeyup="sum()">
            </div><!-- input-group -->
        </div>
    </div>

    <div class="col-sm-4">
        <label for="">Kandungan</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" class="form-control" name="kandungan" value="<?=$row->kandungan;?>" required/>
            </div>
        </div>
    </div>

    <div class="col-sm-2">
        <label for="">Kategori</label>
        <div class="form-group">
            <div class="form-line">
                <select name="kategori" class="form-control select2">
                    <option value="<?=$row->kategori;?>"><?=$row->kategori;?></option>

                    <optgroup label="Kategori">
                        <option value="UMUM">UMUM</option>
                        <option value="PREKURSOR">PREKURSOR</option>
                    </optgroup>
                    
                </select>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary waves-effect">
    </div>
</form> <!-- penutup form-->
</div>