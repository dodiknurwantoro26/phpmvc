<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Mahasiswa';
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        //jika ada yang berhasil masuk
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            //setup flasher / notifikasi
            //terdapat 3 paramerter : 1 pesan, 2 aksi, 3 tipe class bootstrap berupa warna
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');

            //redirest ke halaman index
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            //setup flasher / notifikasi
            //terdapat 3 paramerter : 1 pesan, 2 aksi, 3 tipe class bootstrap berupa warna
            Flasher::setFlash('berhasil', 'dihapus', 'success');

            //redirest ke halaman index
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getubah()
    {
        //karena data tersebut dikembalikan dengan tipe json di bungkus dengan  json_encode agar bisa di load pada ajax
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            //setup flasher / notifikasi
            //terdapat 3 paramerter : 1 pesan, 2 aksi, 3 tipe class bootstrap berupa warna
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');

            //redirest ke halaman index
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Mahasiswa';
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
