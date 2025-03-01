<?php
class Flasher
{
    //dapat dipanggial tanpa di instansiasi
    //parameter set flash 
    //$pesan berisi berhasil atau gagal
    //$aksi saat melakukan update delete tambah
    //$tipe digunakan untuk tipe pada bootsrap saat menampilkan pesan
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    //untuk menampilkan pesannya
    public static function flash()
    {
        //cek adakah $_SESSION['flash']
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
  Data Mahasiswa <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            // ketika sudah tampil hapus $_SESSION hanya berlaku sekali
            unset($_SESSION['flash']);
        }
    }
}
