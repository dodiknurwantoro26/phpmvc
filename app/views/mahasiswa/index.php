<div class="container mt-5">

    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>

            <ul class="list-group">
                <?php foreach ($data['mahasiswa'] as $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-item-center"><?= $mhs['nama'];  ?> <a class="badge badge-primary" href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>">detail</a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>