<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa (PDDIKTI)</h6>

                </div>
                <div class="card-body">
                    <div class="mb-10">
                        <button type="button" class="btn btn-primary btn-sm tomboltambahdata" data-bs-toggle="modal" data-bs-target="#tambah">
                            Tambah Data
                        </button>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover dt-bootstrap4" id="dataTable" width="100%" cellspacing="0">
                            <thead style="color: blue">
                                <tr>
                                    <th>No</th>
                                    <th>Nim
                                        <hr> Nama Lengkap
                                    </th>
                                    <th>Nama Ibu

                                    </th>
                                    <th>Tempat Lahir
                                        <hr> Tempat Lahir
                                    </th>
                                    <th>Periode Pendaftaran
                                        <hr> Jenis Kelamin

                                    </th>
                                    <th><span class="fa fa-cog"></span></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pddikti as $d) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $d['nim']; ?>
                                            <hr> <?= $d['nama_lengkap']; ?>
                                        </td>

                                        <td><?= $d['nama_ibu']; ?>

                                        </td>
                                        <td><?= $d['tempat_lahir']; ?>
                                            <hr> <?= $d['tanggal_lahir']; ?>
                                        </td>
                                        <td><?= $d['periode_pendaftaran']; ?>
                                            <hr> <?= $d['jenis_kelamin']; ?>
                                        </td>


                                        <td>
                                            <a href="" class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#updateModal<?= $d['id']; ?>">
                                                Update
                                            </a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- add Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <a type="button" style="color: black;" data-bs-dismiss="modal" aria-label="Close">X</a>

            </div>
            <div class="modal-body">
                <form class="needs-validation" action="/pddikti/save/" method="POST" novalidate="">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NIM</label>
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
                            <input type="text" name="nama_lengkap" class="form-control" required="">
                            <div class="invalid-feedback">
                                Nama Lengkap wajib diisi?.
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Ibu</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_ibu" class="form-control" required="">
                            <div class="invalid-feedback">
                                Nomor Telepon wajib diisi?.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_lahir" class="form-control" required="">
                            <div class="invalid-feedback">
                                Email wajib diisi?.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" name="tempat_lahir" class="form-control" required="">
                            <div class="invalid-feedback">
                                Username wajib diisi?.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Periode Pendaftaran</label>
                        <div class="col-sm-9">
                            <input type="text" name="periode_pendaftaran" class="form-control" required="">
                            <div class="invalid-feedback">
                                Password wajib diisi?.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="jenis_kelamin" id="">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
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

<!-- update modal -->
<?php foreach ($pddikti as $d) : ?>
    <div class="modal fade" id="updateModal<?= $d['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <a type="button" style="color: black;" data-bs-dismiss="modal" href="/pddikti/index/" class="close" aria-label="Close">X</a>

                </div>
                <div class="modal-body">
                    <?= form_open('pddikti/update/' . $d['id']); ?>
                    <?= csrf_field(); ?>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NIM</label>
                        <div class="col-sm-9">
                            <input type="text" name="nim" value="<?= $d['nim']; ?>" class="form-control" required="">
                            <div class="invalid-feedback">
                                NIP Wajib Diisi?
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_lengkap" value="<?= $d['nama_lengkap']; ?>" class="form-control" required="">
                            <div class="invalid-feedback">
                                Nama Lengkap wajib diisi?.
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Ibu</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_ibu" value="<?= $d['nama_ibu']; ?>" class="form-control" required="">
                            <div class="invalid-feedback">
                                Nomor Telepon wajib diisi?.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_lahir" value="<?= $d['tanggal_lahir']; ?>" class="form-control" required="">
                            <div class="invalid-feedback">
                                Email wajib diisi?.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" name="tempat_lahir" value="<?= $d['tempat_lahir']; ?>" class="form-control" required="">
                            <div class="invalid-feedback">
                                Username wajib diisi?.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Periode Pendaftaran</label>
                        <div class="col-sm-9">
                            <input type="text" name="periode_pendaftaran" value="<?= $d['periode_pendaftaran']; ?>" class="form-control" required="">
                            <div class="invalid-feedback">
                                Password wajib diisi?.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="jenis_kelamin" id="">
                                <option value="Laki-laki" <?php if ($d == 'Laki-laki') : ?>selected <?php endif; ?>>Laki-laki</option>
                                <option value="Perempuan" <?php if ($d == 'Perempuan') : ?>selected <?php endif; ?>>Perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                Password wajib diisi?.
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="/pddikti/index" class="btn btn-danger btn-sm"> Batal</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>