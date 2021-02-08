<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Pengajuan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover dt-bootstrap4" id="" width="100%" cellspacing="0">
                            <thead style="color: blue">
                                <tr>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Program Studi</th>
                                    <th>Waktu Pengajuan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if ($datapdm == null) {
                                    echo '<p class="alert-warning">Belum Melakukan Pengajuan Perubahan Data</p>';
                                } ?>

                                <?php foreach ($datapdm as $d) : ?>
                                    <tr>

                                        <td><?= $d['nama_lengkap']; ?></td>
                                        <td><?= $d['nim']; ?></td>
                                        <td><?= $d['prodi']; ?></td>
                                        <td><?= $d['created_at']; ?></td>
                                        <td>
                                            <div class="badge badge-<?= ($d['status'] == 'Sedang Di Tinjau') ? 'warning' : 'info'; ?> badge-pill"><?= $d['status']; ?></div>
                                        </td>
                                        <td>
                                            <a href="/riwayatpdm/<?= $d['id']; ?>"><button class="btn btn-info"><span class="fa fa-list"></span></button></a>
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



<?= $this->endSection(); ?>