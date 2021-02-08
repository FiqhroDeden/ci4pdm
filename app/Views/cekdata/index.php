<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                Silahkan memeriksa data anda dengan baik, jika ada kesalahan data segera ajukan perubahan data
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header" style="color: blue">Data anda di <b> PDDIKTI </b></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <?php foreach ($pddikti as $p) : ?>
                                <tr>
                                    <td>Nomor Induk Mahasiswa :</td>
                                    <td><?= $p['nim']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Mahasiswa :</td>
                                    <td><?= $p['nama_lengkap']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu Kandung :</td>
                                    <td><?= $p['nama_ibu']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir :</td>
                                    <td><?= $p['tempat_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir :</td>
                                    <td><?= $p['tanggal_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Periode Pendaftaran :</td>
                                    <td><?= $p['periode_pendaftaran']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin :</td>
                                    <td><?= $p['jenis_kelamin']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header" style="color: blue">Data anda di <b> SIAKAD </b></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <?php foreach ($siakad as $s) : ?>
                                <tr>
                                    <td>Nomor Induk Mahasiswa :</td>
                                    <td><?= $s['nim']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Mahasiswa :</td>
                                    <td><?= $s['nama_lengkap']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu Kandung :</td>
                                    <td><?= $s['nama_ibu']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir :</td>
                                    <td><?= $s['tempat_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir :</td>
                                    <td><?= $s['tanggal_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Periode Pendaftaran :</td>
                                    <td><?= $s['periode_pendaftaran']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin :</td>
                                    <td><?= $s['jenis_kelamin']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-2">
            <a href="<?= base_url('pdm'); ?>">
                <button class="btn btn-danger" type="button">Ajukan Perubahan Data</button>
            </a>
        </div>
        <div class="col-5"></div>

    </div>
    <br>
</div>

<?= $this->endSection(); ?>