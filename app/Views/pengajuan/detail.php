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

                                                <option selected value=" <?= $datapdm['status']; ?>"><?= $datapdm['status']; ?></option>
                                                <option value="baru">Baru</option>
                                                <option value="Diproses">Diproses</option>
                                                <option value="Selesai">Selesai</option>
                                                <option value="Ditolak">Ditolak</option>

                                            </select>

                                    </td>
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
                                    <td>File KTM(Kartu Tanda Mahasiswa) :</td>
                                    <?php if ($datapdm['ktm'] == 'tidakada') { ?>
                                        <td>Tidak Ada</td>
                                    <?php } else { ?>
                                        <td><a href="/file/ktm/<?= $datapdm['ktm']; ?>">Lihat File</a></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>File Ijasah/Transkip Nilai :</td>
                                    <?php if ($datapdm['ijasah'] == 'tidakada') { ?>
                                        <td>Tidak Ada</td>
                                    <?php } else { ?>
                                        <td><a href="/file/ijasah/<?= $datapdm['ijasah']; ?>">Lihat File</a></td>
                                    <?php } ?>

                                </tr>
                                <tr>
                                    <td>File Surat Penerimaan :</td>
                                    <?php if ($datapdm['surat'] == 'tidakada') { ?>
                                        <td>Tidak Ada</td>
                                    <?php } else { ?>
                                        <td><a href="/file/surat/<?= $datapdm['surat']; ?>">Lihat File</a></td>
                                    <?php } ?>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col">
            <button type="submit" class="btn btn-info" onclick="return confirm('apakah anda yakin?');"><span class="fa fa-check"></span> Ubah Status</button>
            </form>
            <form action="/pengajuan/<?= $datapdm['id']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');"><span class="fa fa-trash"></span> Delete</button>
            </form>


        </div>




    </div>
</div>

<?= $this->endSection(); ?>