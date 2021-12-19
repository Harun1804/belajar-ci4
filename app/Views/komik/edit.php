<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="my-3">Edit Data Komik</h1>
            <form action="/komik/update/<?= $data['komik']['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="slug" value="<?= $data['komik']['slug']; ?>">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?= ($data['validation']->hasError('judul')) ? 'is-invalid' : '' ?>" id="judul" placeholder="Judul Komik" name="judul" autofocus value="<?= old('judul',$data['komik']['judul']); ?>">
                    <label for="judul">Judul Komik</label>
                    <div class="invalid-feedback">
                        <?= $data['validation']->getError('judul'); ?>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="penulis" placeholder="Penulis Komik" name="penulis" value="<?= old('penulis',$data['komik']['penulis']); ?>">
                    <label for="penulis">Penulis Komik</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="penerbit" placeholder="Penerbit Komik" name="penerbit" value="<?= old('penerbit',$data['komik']['penerbit']); ?>">
                    <label for="penerbit">Penerbit Komik</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="sampul" placeholder="Sampul Komik" name="sampul" value="<?= old('sampul',$data['komik']['sampul']); ?>">
                    <label for="sampul">Sampul Komik</label>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-sm btn-primary">Edit Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>