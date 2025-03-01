<div class="container mt-5">

    <!-- Flasher / notifikasi -->
    <div class="roq">
        <div class="row-lg-6">
            <!-- memanggil class dan method menggunakan '::' karena function static -->
            <?php Flasher::flash();  ?>
        </div>
    </div>

    <div class="row mb3">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3 tombilTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>

    <!-- ## Searching fitur -->
    <div class="row mb3">
        <div class="col-lg-6">
            <form action="<?= BASEURL ?>/mahasiswa/cari" method="post">

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa.." name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ($data['mahasiswa'] as $mhs) : ?>
                    <li class="list-group-item"><?= $mhs['nama'];  ?>
                        <a class="badge badge-danger float-right ml-2" href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" onclick="return confirm('Yakin hapus data?')">hapus</a>
                        <!-- data-toggle="modal" data-target="#formModal" untuk popup data -->
                        <!-- penambahan data-id untuk menangkap id data untuk jquery -->
                        <a class="badge badge-warning float-right ml-2 tampilModalUbah" href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">ubah</a>
                        <a class="badge badge-primary float-right ml-2" href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                    <!-- menyembunyikan id yang nntinya akan dipakai -->
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <!-- input butuh properti name biar bisa diambi array assosiatif phpnya -->
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="input nama...">
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <!-- input butuh properti name biar bisa diambi array assosiatif phpnya -->
                        <input type="number" class="form-control" id="nim" name="nim" placeholder="input nim...">
                    </div>
                    <div class="form-group">
                        <label for="emaik">Email</label>
                        <!-- input butuh properti name biar bisa diambi array assosiatif phpnya -->
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Akuntansi">Akuntansi</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- type button submit untuk kirim data -->
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>