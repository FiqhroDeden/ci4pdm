<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Profil</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">

                        </div>
                        <div class="col-sm-6">
                            <form action="/profil/update/<?= $user->userid; ?>" method="POST">
                                <input type="hidden" name="oldpass" value="<?= $user->password_hash; ?>">
                                <input type="hidden" name="id" value="<?= $user->userid; ?>">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="fullname" value="<?= $user->fullname; ?>" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Tanggal Surat wajib diisi
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIM</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nim" value="<?= $user->nim; ?>" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Tanggal Surat wajib diisi
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nomor HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="no_hp" value="<?= $user->no_hp; ?>" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Tanggal Surat wajib diisi
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" value="<?= $user->username; ?>" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Tanggal Surat wajib diisi
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" value="<?= $user->email; ?>" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Tanggal Surat wajib diisi
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="password_hash" class="form-control">
                                        <small>silahkan dikosongkan jika tidak ingin merubah password</small>
                                        <div class="invalid-feedback">
                                            Tanggal Surat wajib diisi
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                <a href="javascript:window.history.go(-1);" class="btn btn-warning btn-sm"><span class="fa fa-arrow-left"></span>kembali</a>
                            </form>
                        </div>
                        <div class="col-sm-3">

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>