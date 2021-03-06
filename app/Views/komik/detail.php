<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Detail Komik</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/assets/img/<?= $data['komik']['sampul']; ?>" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['komik']['judul']; ?></h5>
                            <p class="card-text">
                                <strong><?= $data['komik']['penulis']; ?></strong>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <strong><?= $data['komik']['penerbit']; ?></strong>
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/komikcontroller" class="btn btn-sm btn-info">Back</a>
                    <a href="/komikcontroller/edit/<?= $data['komik']['slug']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form action="/komik/<?= $data['komik']['id']; ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>