<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Pengajuan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nomor Induk Mahasiswa :</td>
                                    <td><?= $datapdm['nim']; ?></td>
                                </tr>
                                <tr style="color: red;">
                                    <td>Nama Mahasiswa :</td>
                                    <td><?= $datapdm['nama_lengkap']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Hp :</td>
                                    <td><?= $datapdm['nomor']; ?></td>
                                </tr>
                                <tr>
                                    <td>Fakultas :</td>
                                    <td><?= $datapdm['fakultas']; ?></td>
                                </tr>
                                <tr>
                                    <td>Program Studi :</td>
                                    <td><?= $datapdm['prodi']; ?></td>
                                </tr>
                                <tr>
                                    <td>Lokasi Data Yang Ingin Diubah :</td>
                                    <td><?= $datapdm['lokasi_data']; ?></td>
                                </tr>
                                <tr>
                                    <td>Data Yang Ingin Diubah :</td>
                                    <td><?= $datapdm['data']; ?></td>
                                </tr>
                                <tr>
                                    <td>Status :</td>
                                    <td>
                                        <form action="/pengajuan/setstatus/<?= $datapdm['id']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="SETSTATUS">
                                            <select class="form-control " id="status" name="status" value="">

                                                <option value="Menunggu Konfirmasi" <?php if ($datapdm['status'] == 'Menunggu Konfirmasi') : ?>selected <?php endif; ?>>Menunggu Konfirmasi</option>
                                                <option value="Diproses" <?php if ($datapdm['status'] == 'Diproses') : ?>selected <?php endif; ?>>Diproses</option>
                                                <option value="Selesai" <?php if ($datapdm['status'] == 'Selesai') : ?>selected <?php endif; ?>>Selesai</option>
                                                <option value="Ditolak" <?php if ($datapdm['status'] == 'Ditolak') : ?>selected <?php endif; ?>>Ditolak</option>

                                            </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Beri Keterangan :</td>
                                    <td><textarea class="form-control" name="keterangan" id="" cols="30" rows="10"></textarea><?= $datapdm['keterangan']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Berkas</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>File Akte :</td>
                                    <?php if ($datapdm['akte'] == 'tidakada') { ?>
                                        <td>Tidak Ada</td>
                                    <?php } else { ?>
                                        <td><a href="/file/akte/<?= $datapdm['akte']; ?>">Lihat File</a></td>
                                    <?php } ?>

                                </tr>
                                <tr>
                                    <td>File KTP :</td>
                                    <?php if ($datapdm['ktp'] == 'tidakada') { ?>
                                        <td>Tidak Ada</td>
                                    <?php } else { ?>
                                        <td><a href="/file/ktp/<?= $datapdm['ktp']; ?>">Lihat File</a></td>
                                    <?php } ?>

                                </tr>
                                <tr>
                                    <td>File Kartu Keluarga :</td>
                                    <?php if ($datapdm['kk'] == 'tidakada') { ?>
                                        <td>Tidak Ada</td>
                                    <?php } else { ?>
                                        <td><a href="/file/kk/<?= $datapdm['kk']; ?>">Lihat File</a></td>
                                    <?php } ?>

                                </tr>
                                <tr>
                                    <td>File KTM(Kartu Tanda Mahasiswa) :</td>
                                    <?php if ($datapdm['ktm'] == 'tidakada') { ?>
                                        <td>Tidak Ada</td>
                                    <?php } else { ?>
                                        <td><a href="/file/ktm/<?= $datapdm['ktm']; ?>">Lihat File</a></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>File Ijasah :</td>
                                    <?php if ($datapdm['ijasah'] == 'tidakada') { ?>
                                        <td>Tidak Ada</td>
                                    <?php } else { ?>
                                        <td><a href="/file/ijasah/<?= $datapdm['ijasah']; ?>">Lihat File</a></td>
                                    <?php } ?>

                                </tr>
                                <tr>
                                    <td>File Transkrip :</td>
                                    <?php if ($datapdm['transkrip'] == 'tidakada') { ?>
                                        <td>Tidak Ada</td>
                                    <?php } else { ?>
                                        <td><a href="/file/transkrip/<?= $datapdm['transkrip']; ?>">Lihat File</a></td>
                                    <?php } ?>

                                </tr>
                                <tr>
                                    <td>File Ijasah Akte 4 :</td>
                                    <?php if ($datapdm['akte4'] == 'tidakada') { ?>
                                        <td>Tidak Ada</td>
                                    <?php } else { ?>
                                        <td><a href="/file/akte4/<?= $datapdm['akte4']; ?>">Lihat File</a></td>
                                    <?php } ?>

                                </tr>


                            </tbody>
                        </table>
                        <a href="javascript:window.history.go(-1);" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('apakah anda yakin?');"><span class="fa fa-check"></span> Set Status</button>
                        </form>
                        <form action="/pengajuan/<?= $datapdm['id']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?');"><span class="fa fa-trash"></span> Delete</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>