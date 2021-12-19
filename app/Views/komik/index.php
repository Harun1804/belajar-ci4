<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/komikcontroller/create" class="btn btn-sm btn-primary my-3">Tambah Data Komik</a>
            <h1>Daftar Komik</h1>
            <?php if(session()->getFlashdata('pesan')) :?>
                <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
            <?php endif ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Judul</th>
                        <th>Sampul</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data['komik'] as $k) : 
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <a href="/komik/<?= $k['slug']; ?>">Detail</a>
                        </td>
                        <td>
                            <img src="/assets/img/<?= $k['sampul']; ?>" alt="Sampul" class="sampul">
                        </td>
                        <td><?= $k['judul']; ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>