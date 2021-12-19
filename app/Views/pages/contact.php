<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Contact Us</h1>
            <?php foreach ($data['alamat'] as $alamat) : ?>
                <ul>
                    <li><?= $alamat['tipe']; ?></li>
                    <li><?= $alamat['alamat']; ?></li>
                    <li><?= $alamat['kota']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>