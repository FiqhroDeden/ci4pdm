<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan PDM</h6>
        </div>
        <div class="card-body">

            <form action="/pdm/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <input type="hidden" name="id_pengirim" value="<?= user_id(); ?>">
                <input type="hidden" name="status" value="Menunggu Konfirmasi">
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="nama_lengkap" name="nama_lengkap" autofocus value="<?= old('nama_lengkap'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_lengkap'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nim" class="col-sm-4 col-form-label">NIM</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= old('nim'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nim'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomor" class="col-sm-4 col-form-label">Nomor Hp/Wa</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control <?= ($validation->hasError('nomor')) ? 'is-invalid' : ''; ?>" id="nomor" name="nomor" value="<?= old('nomor'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nomor'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fakultas" class="col-sm-4 col-form-label">Pilih Fakultas</label>
                    <div class="col-sm-6">
                        <select class="form-control <?= ($validation->hasError('fakultas')) ? 'is-invalid' : ''; ?>" id="fakultas" name="fakultas" value="<?= old('fakultas'); ?>">
                            <option></option>
                            <?php foreach ($fakultas as $f) : ?>
                                <option value="<?= $f['nama_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="invalid-feedback">
                            <?= $validation->getError('fakultas'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prodi" class="col-sm-4 col-form-label">Pilih Program Studi</label>
                    <div class="col-sm-6">
                        <select class="form-control <?= ($validation->hasError('prodi')) ? 'is-invalid' : ''; ?>" id="prodi" name="prodi" value="<?= old('prodi'); ?>" searchable="Search here..">
                            <option selected></option>
                            <?php foreach ($prodi as $p) : ?>
                                <option value="<?= $p['nama_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('prodi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fakultas" class="col-sm-4 col-form-label">Ingin Melakukan Perubahan Data Pada</label>
                    <div class="col-sm-6">
                        <select class="form-control <?= ($validation->hasError('lokasi_data')) ? 'is-invalid' : ''; ?>" id="lokasi_data" name="lokasi_data" value="<?= old('lokasi_data'); ?>">
                            <option selected></option>
                            <option value="SIAKAD">SIAKAD</option>
                            <option value="PDDIKTI">PDDIKTI</option>
                            <option value="SIAKAD dan PDDIKTI">SIAKAD dan PDDIKTI</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('lokasi_data'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="data" class="col-sm-4 col-form-label">Data Yang Ingin Di Ubah</label>
                    <div class="col-sm-6">
                        <div class="custom-control custom-checkbox custom-control-solid">
                            <input class="custom-control-input" id="ubah_nim" name="data[]" type="checkbox" value="NIM">
                            <label class="custom-control-label" for="ubah_nim">Nomor Induk Mahasiswa</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-solid">
                            <input class="custom-control-input" id="ubah_nama" name="data[]" type="checkbox" value="Nama Mahasiswa">
                            <label class="custom-control-label" for="ubah_nama">Nama Mahasiswa</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-solid">
                            <input class="custom-control-input" id="ubah_namaibu" name="data[]" type="checkbox" value="Nama Ibu">
                            <label class="custom-control-label" for="ubah_namaibu">Nama Ibu Kandung</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-solid">
                            <input class="custom-control-input" id="ubah_tempatlahir" name="data[]" type="checkbox" value="Tempat Lahir">
                            <label class="custom-control-label" for="ubah_tempatlahir">Tempat Lahir</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-solid">
                            <input class="custom-control-input" id="ubah_tanggallahir" name="data[]" type="checkbox" value="Tanggal Lahir">
                            <label class="custom-control-label" for="ubah_tanggallahir">Tanggal Lahir</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-solid">
                            <input class="custom-control-input" id="ubah_periode" name="data[]" type="checkbox" value="Periode">
                            <label class="custom-control-label" for="ubah_periode">Periode Pendaftaran</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-solid">
                            <input class="custom-control-input" id="ubah_jeniskelamin" name="data[]" type="checkbox" value="Jenis Kelamin">
                            <label class="custom-control-label" for="ubah_jeniskelamin">Jenis Kelamin</label>
                        </div>
                    </div>

                </div>
                <div class="from-group row">
                    <label for="akte" class="col-sm-4 col-xs-12 col-form-laber">Upload Akte kelahiran</label>
                    <div class="col-sm-6 col-xs-12">
                        <div class="custom-file">
                            <input type="file" class="form-control <?= ($validation->hasError('akte')) ? 'is-invalid' : ''; ?>" id="akte" name="akte" required>
                            <div class="invalid-feedback">
                                <?= $validation->getError('akte'); ?>
                            </div>
                            <small>File yang di upload harus berformat .pdf dan ukurannya tidak lebih dari 500kb</small>

                        </div>
                    </div>
                </div>
                <br>
                <div class="from-group row">
                    <label for="akte" class="col-sm-4 col-xs-12 col-form-laber">Upload KTP</label>
                    <div class="col-sm-6 col-xs-12">
                        <div class="custom-file">
                            <input type="file" class="form-control <?= ($validation->hasError('ktp')) ? 'is-invalid' : ''; ?>" id="ktp" name="ktp" required>
                            <div class="invalid-feedback">
                                <?= $validation->getError('ktp'); ?>
                            </div>
                            <small>File yang di upload harus berformat .pdf dan ukurannya tidak lebih dari 500kb</small>

                        </div>
                    </div>
                </div>
                <br>
                <div class="from-group row">
                    <label for="akte" class="col-sm-4 col-xs-12 col-form-laber">Upload Kartu Keluarga</label>
                    <div class="col-sm-6 col-xs-12">
                        <div class="custom-file">
                            <input type="file" class="form-control <?= ($validation->hasError('kk')) ? 'is-invalid' : ''; ?>" id="kk" name="kk" required>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kk'); ?>
                            </div>
                            <small>File yang di upload harus berformat .pdf dan ukurannya tidak lebih dari 500kb</small>

                        </div>
                    </div>
                </div>
                <br>
                <div class="from-group row">
                    <label for="ktm" class="col-sm-4 col-xs-12 col-form-laber">Upload KTM <small>(Jika tidak punya ktm harap kebagian kemahasiswaa untuk dibuatkan surat keterangan ktm)</small></label>

                    <div class="col-sm-6 col-xs-12">
                        <div class="custom-file">
                            <input type="file" class="form-control <?= ($validation->hasError('ktm')) ? 'is-invalid' : ''; ?>" id="ktm" name="ktm" required>
                            <div class="invalid-feedback">
                                <?= $validation->getError('ktm'); ?>
                            </div>
                            <small>File yang di upload harus berformat .pdf dan ukurannya tidak lebih dari 500Kb</small>
                        </div>
                    </div>
                </div>
                <br>
                <div class="from-group row">
                    <label for="ijasah" class="col-sm-4 col-xs-12 col-form-laber">Upload Ijasah <small>(jika sudah lulus)</small></label>
                    <div class="col-sm-6 col-xs-12">
                        <div class="custom-file">
                            <input type="file" class="form-control <?= ($validation->hasError('ijasah')) ? 'is-invalid' : ''; ?>" id="ijasah" name="ijasah">
                            <div class="invalid-feedback">
                                <?= $validation->getError('ijasah'); ?>
                            </div>
                            <small>File yang di upload harus berformat .pdf dan ukurannya tidak lebih dari 500Kb</small>
                        </div>
                    </div>
                </div>
                <br>
                <div class="from-group row">
                    <label for="ijasah" class="col-sm-4 col-xs-12 col-form-laber">Upload Transkrip Nilai <small> (jika sudah lulus)</small></label>
                    <div class="col-sm-6 col-xs-12">
                        <div class="custom-file">
                            <input type="file" class="form-control <?= ($validation->hasError('transkrip')) ? 'is-invalid' : ''; ?>" id="transkrip" name="transkrip">
                            <div class="invalid-feedback">
                                <?= $validation->getError('ijasah'); ?>
                            </div>
                            <small>File yang di upload harus berformat .pdf dan ukurannya tidak lebih dari 500kb</small>
                        </div>
                    </div>
                </div>
                <br>
                <div class="from-group row">
                    <label for="ijasah" class="col-sm-4 col-xs-12 col-form-laber">Upload Ijasah Akte 4 <small>(Bagi Alumni Fakultas Keguruan dan Ilmu Pendidikan)</small> </label>
                    <div class="col-sm-6 col-xs-12">
                        <div class="custom-file">
                            <input type="file" class="form-control <?= ($validation->hasError('akte4')) ? 'is-invalid' : ''; ?>" id="akte4" name="akte4">
                            <div class="invalid-feedback">
                                <?= $validation->getError('akte4'); ?>
                            </div>
                            <small>File yang di upload harus berformat .pdf dan ukurannya tidak lebih dari 500kb</small>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-sm-10">
                    <button class="btn btn-primary btn-sm" type="submit"><span class="fa fa-plus"></span> Submit</button>
                    <a href="javascript:window.history.go(-1);" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

        </div>

    </div>
    <div class="form-group row">

    </div>
    <br>



    </form>




</div>
<!-- Logout Modal-->
<div class="modal fade" id="pdmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Data yang anda masukan sudah benar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "YA" untuk mengajukan Perubahan Data</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="submit" data-dismiss="modal">Batalkan</button>
                <a class="btn btn-primary" href="/pdm/save">YA</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>