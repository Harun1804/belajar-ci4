<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="my-3">Tambah Data Komik</h1>
            <form action="/komikcontroller/store" method="post">
                <?= csrf_field(); ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="judul" placeholder="Judul Komik" name="judul" autofocus>
                    <label for="judul">Judul Komik</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="penulis" placeholder="Penulis Komik" name="penulis">
                    <label for="penulis">Penulis Komik</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="penerbit" placeholder="Penerbit Komik" name="penerbit">
                    <label for="penerbit">Penerbit Komik</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="sampul" placeholder="Sampul Komik" name="sampul">
                    <label for="sampul">Sampul Komik</label>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-sm btn-primary">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>