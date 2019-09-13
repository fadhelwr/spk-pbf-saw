<div class="row">
    <div class="col-sm-12">
        <h4 class="header-title m-t-0 m-b-20">Edit Supplier</h4>
    </div>
</div> <!-- end row -->

<div class="body">
    <form id="form_validation" method="POST" action="<?=base_url()?>supplier/simpan_update/?kode=<?=$row->kode_supplier?>">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <label for="">Nama</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" class="form-control" name="namasupplier" value="<?=$row->nama?>" required/>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <label for="">Alamat</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" class="form-control" name="alamat" value="<?=$row->alamat?>" required/>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <label for="">Telepon</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" class="form-control" name="telepon" value="<?=$row->telepon?>" required/>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <label for="">Email</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" class="form-control" name="email" value="<?=$row->email?>" required/>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-2">
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary waves-effect">
            </div>
        </div>
    </form> <!-- penutup form-->
</div>