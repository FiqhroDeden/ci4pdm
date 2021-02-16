<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">

                        </div>
                        <div class="col-sm-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= $user->username; ?></h4>
                                </li>
                                <?php if ($user->fullname) : ?>
                                    <li class="list-group-item"><?= $user->fullname; ?></li>
                                <?php endif; ?>
                                <?php if (in_groups('mahasiswa')) : ?>
                                    <li class="list-group-item"><?= $user->nim; ?></li>
                                <?php endif; ?>
                                <li class="list-group-item"><?= $user->email; ?></li>
                                <li class="list-group-item">
                                    <span class="badge badge-<?= ($user->name == 'admin') ? 'success' : 'info'; ?>"><?= $user->name; ?></span>
                                </li>
                                <li class="list-group-item">
                                    <a href="/profil/edit/<?= $user->userid; ?>" class="btn btn-warning btn-sm"><span class="fa fa-user-edit"></span> Edit</a>
                                </li>
                            </ul>
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