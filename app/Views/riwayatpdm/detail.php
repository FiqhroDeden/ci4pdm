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
                                    <td><?= $datapdm['status']; ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Pengajuan :</td>
                                    <td><?= $datapdm['created_at']; ?></td>
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
                                    <td>
                                        <a href="/file/akte/<?= $datapdm['akte']; ?>"><?= $datapdm['akte']; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>File KTM(Kartu Tanda Mahasiswa) :</td>
                                    <td><a href="/file/ktm/<?= $datapdm['ktm']; ?>"><?= $datapdm['ktm']; ?></a></td>
                                </tr>
                                <tr>
                                    <td>File Ijasah/Transkip Nilai :</td>
                                    <td><a href="/file/ijasah/<?= $datapdm['ijasah']; ?>"><?= $datapdm['ijasah']; ?></a></td>

                                </tr>
                                <tr>
                                    <td>File Surat Penerimaan :</td>
                                    <td>
                                        <a href="/file/surat/<?= $datapdm['surat']; ?>"><?= $datapdm['surat']; ?></a>
                                    </td>
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
            <form action="/pengajuan/<?= $datapdm['id']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="EDIT">
                <button type="submit" class="btn btn-warning" "><span class=" fa fa-edit"></span> Edit</button>
            </form>


        </div>




    </div>
</div>

<?= $this->endSection(); ?>