<div class="row">
    <div class="col-sm-12">
        <h4 class="header-title m-t-0 m-b-20"><?=$title?></h4>
    </div>
</div> <!-- end row -->
<?=$this->session->flashdata('pesan')?>
<div class="body">
                    <form id="form_validation" method="POST" action="<?=base_url()?>user/simpan" enctype="multipart/form-data">
                            <div class="col-sm-12">
                                <label for="">Nama</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                            <label for="">Username</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="username" required/>
                                </div>
                            </div>
                            </div>

                                <div class="col-sm-4">
                                    <label for="">Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="password" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                <label for="">Level</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    <select name="level" class="form-control select2">
                                        <option value="admin">ADMIN</option>
                                        <option value="kasir">KASIR</option>
                                    </select>
                                </div>
                                </div>
                                </div>

                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Foto</label>
                                    <input type="file" class="filestyle" name="filefoto" data-buttonname="btn-default">
                                </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">SIA</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="sia" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">SIPA</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="sipa" required/>
                                        </div>
                                    </div>
                                </div>

                        <div class="col-sm-12">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary waves-effect">
                        </div>
                    </form> <!-- penutup form-->
                </div>