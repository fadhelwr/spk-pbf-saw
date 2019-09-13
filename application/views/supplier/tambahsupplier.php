<div class="row">
    <div class="col-sm-12">
        <h4 class="header-title m-t-0 m-b-20">Tambah Supplier</h4>
    </div>
</div> <!-- end row -->

<div class="body">
    <form id="form_validation" method="POST" action="<?=base_url()?>supplier/simpan_baru">
        <div class="col-sm-4">
            <label for="">Nama</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" class="form-control" name="namasupplier" required/>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <label for="">Alamat</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" class="form-control" name="alamat" required/>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <label for="">Telepon</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" class="form-control" name="telepon" required/>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <label for="">Email</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" class="form-control" name="email" required/>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary waves-effect">
        </div>
    </form> <!-- penutup form-->
</div>