<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Peserta</h1>
            <?php if (session()->get('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->get('pesan') ?>
                </div>
            <?php endif; ?>
            <a href="/peserta/create" class="btn btn-primary mb-3">Tambah Peserta</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No. Telp</th>
                        <th scope="col">Instansi/Organisasi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($daftar_peserta as $ps) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $ps['nama_peserta']; ?></td>
                            <td><?= $ps['no_telepon']; ?></td>
                            <td><?= $ps['instansi']; ?></td>
                            <td><a href="/peserta/edit/<?= $ps['id']; ?>" class="btn btn-success">Edit</a></td>
                            <td>
                                <form action="/peserta/<?= $ps['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>