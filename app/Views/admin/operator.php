<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Operator</h6><br>
            <button type="button" class="btn btn-primary tomboltambahdata" data-bs-toggle="modal" data-bs-target="#tambah">
                Tambah Operator
            </button><br><br><?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover dt-bootstrap4" id="dataTable" width="100%" cellspacing="0">

                        <thead style="color: blue">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <!-- <th>Hak Akses</th> -->
                                <th>Role</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><a href="<?= base_url('admin/' . $user->userid); ?>" class=""><?= $user->fullname; ?></a></td>
                                    <!-- <td><span class="badge badge"><?= $user->nama_fakultas; ?></span></td> -->
                                    <td><span class="badge badge-<?= ($user->name == 'admin') ? 'success' : 'warning'; ?>"><?= $user->name; ?></span></td>
                                    <td>
                                        <form action="/admin/hapus" method="POST">
                                            <button type="button" class="btn btn-warning btn-sm tampilmodalubah" data-bs-toggle="modal" data-bs-target="#ubah" data-id="<?= $user->userid; ?>"><span class="fa fa-edit"></button>

                                            <input type="hidden" name="id" value="<?= $user->userid; ?>">
                                            <button type="submit" onclick="return confirm('apakah anda yakin?');" class="btn btn-danger btn-sm"><span class="fa fa-trash"></button>
                                        </form>
                                    </td>


                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Operator Baru</h5>
                    <a type="button" style="color: black;" data-bs-dismiss="modal" aria-label="Close">X</a>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" action="/admin/save/" method="POST" novalidate="">
                        <input type="hidden" name="group_id" value="3">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" name="nim" class="form-control" required="">
                                <div class="invalid-feedback">
                                    NIP Wajib Diisi?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" name="fullname" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Nama Lengkap wajib diisi?.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Hak Fakultas</label>
                            <div class="col-sm-9">
                                <select name="hakfakultas" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php foreach ($fakultas as $f) : ?>
                                        <option value="<?= $f['fakultas_id']; ?>"><?= $f['nama_fakultas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </option>
                                <div class="invalid-feedback">
                                    Jabatan wajib dipilih?.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No. Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_hp" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Nomor Telepon wajib diisi?.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Email wajib diisi?.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Username wajib diisi?.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_hash" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Password wajib diisi?.
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ubah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modallabel">Ubah Operator</h5>
                    <a type="button" style="color: black;" data-bs-dismiss="modal" aria-label="Close">X</a>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" action="/admin/update/" method="POST" novalidate="">
                        <input type="hidden" name="group_id" value="3">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="oldpass" value="<?= $user->password_hash; ?>">
                        <input type="hidden" name="passwordnow" id="password">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" name="nim" id="nim" class="form-control" required="">
                                <div class="invalid-feedback">
                                    NIP Wajib Diisi?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" name="fullname" id="fullname" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Nama Lengkap wajib diisi?.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Hak Fakultas</label>
                            <div class="col-sm-9">
                                <select name="hakfakultas" id="hakfakultas" class="form-control">
                                    <?php foreach ($fakultas as $f) : ?>
                                        <option value="<?= $f['fakultas_id']; ?>"><?= $f['nama_fakultas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </option>
                                <div class="invalid-feedback">
                                    Jabatan wajib dipilih?.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No. Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_hp" id="no_hp" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Nomor Telepon wajib diisi?.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" id="email" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Email wajib diisi?.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" id="username" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Username wajib diisi?.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">

                                <input type="password" name="password_hash" class="form-control">
                                <div class="invalid-feedback">
                                    Password wajib diisi?.
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>