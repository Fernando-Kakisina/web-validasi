<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Edit Data Peserta</h2>
            <form action="/peserta/update/<?= $peserta['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $peserta['id'] ?>">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= (validation_show_error('nama_peserta')) ? "is-invalid" : "" ?>" id="nama_peserta" name="nama_peserta" autofocus value="<?= (old('nama_peserta')) ? old('nama_peserta') : $peserta['nama_peserta'] ?>">
                        <div class="invalid-feedback">
                            <?= (validation_show_error('nama_peserta')) ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_telp" class="col-sm-2 col-form-label">No. Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= (validation_show_error('no_telepon')) ? "is-invalid" : "" ?>" id="no_telepon" name="no_telepon" value="<?= (old('no_telepon')) ? old('no_telepon') : $peserta['no_telepon'] ?>">
                        <div class="invalid-feedback">
                            <?= (validation_show_error('no_telepon')) ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="instansi" class="col-sm-2 col-form-label">Instansi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= (validation_show_error('instansi')) ? "is-invalid" : "" ?>" id="instansi" name="instansi" value="<?= (old('instansi')) ? old('instansi') : $peserta['instansi'] ?>">
                        <div class="invalid-feedback">
                            <?= (validation_show_error('instansi')) ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>