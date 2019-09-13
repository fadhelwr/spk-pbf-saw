<div class="row">
    <div class="col-md-12">
        <div class="p-0 text-center">
            <div class="member-card">
                <div class="thumb-xl member-thumb m-b-10 center-block">
                    <img src="<?=base_url();?>assets/images/users/<?=$row->foto; ?>" height="50" class="img-circle img-thumbnail" alt="profile-image">
                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                </div>

                <div class="">
                    <h4 class="m-b-5"><?=$row->nama;?></h4>
                    <p class="text-muted">as <?=$row->level;?></p>
                </div>

            </div>

        </div> <!-- end card-box -->

    </div> <!-- end col -->
</div> <!-- end row -->

<div class="m-t-30">
    <ul class="nav nav-tabs tabs-bordered">
        <li class="active">
            <a href="#home-b1" data-toggle="tab" aria-expanded="true">
                Profil
            </a>
        </li>
        <li class="">
            <a href="#profile-b1" data-toggle="tab" aria-expanded="false">
                Pengaturan
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="home-b1">
            <div class="row">
                <div class="col-md-4">
                    <!-- Personal-Information -->
                    <div class="panel panel-default panel-fill">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Pribadi</h3>
                        </div>
                        <div class="panel-body">
                            <div class="m-b-20">
                                <strong>Nama Lengkap</strong>
                                <br>
                                <p class="text-muted"><?=$row->nama;?></p>
                            </div>
                            <div class="m-b-20">
                                <strong>SIA</strong>
                                <br>
                                <p class="text-muted"><?=$row->sia;?></p>
                            </div>
                            <div class="m-b-20">
                                <strong>SIPA</strong>
                                <br>
                                <p class="text-muted"><?=$row->sipa;?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Personal-Information -->
                </div>


                <div class="col-md-8">
                    <!-- Personal-Information -->
                    <div class="panel panel-default panel-fill">
                        <div class="panel-heading">
                            <h3 class="panel-title">Biografi</h3>
                        </div>
                        <div class="panel-body">
                            <h5 class="header-title text-uppercase">Tentang</h5>
                            <?=$row->tentang?>
                        </div>
                    </div>
                    <!-- Personal-Information -->
                </div>

            </div>
        </div>
        <div class="tab-pane" id="profile-b1">
            <!-- Personal-Information -->
            <div class="panel panel-default panel-fill">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Profil</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="<?=base_url()?>user/update_user/?id=<?=$row->id;?>">
                        <div class="form-group">
                            <label for="NamaLengkap">Nama Lengkap</label>
                            <input type="text" value="<?=$row->nama;?>" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" value="<?=$row->username;?>" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="KataSandi">Kata Sandi</label>
                            <input type="password" value="<?=$row->password;?>" name="password" id="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Sia">Sia</label>
                            <input type="text" value="<?=$row->sia;?>" name="sia" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Sipa">Sipa</label>
                            <input type="text" value="<?=$row->sipa;?>" name="sipa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Tentang">Tentang</label>
                            <input type="text" value="<?=$row->tentang;?>" name="tentang" class="form-control">
                        </div>
                        <input class="btn btn-primary waves-effect waves-light w-md" type="submit" name="" value="Update">
                    </form>

                </div>
            </div>
            <!-- Personal-Information -->
        </div>
    </div>
</div>
