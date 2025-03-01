<?php
class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db; // menampung database

    public function __construct()
    {
        $this->db = new database;
    }

    public function getAllMahasiswa()
    {
        //menjalankan method query yg ada di core/database.php
        $this->db->query('SELECT * FROM ' . $this->table);
        //menjalankan method resultSet yg ada di core/database.php yang bersifat mengembalikan data banyak
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        //WHERE id = :id tidak langsung pakai $id menghindari injection SQL. nnti akan di banding :id nya 
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        //masukin id menggunakan bind
        $this->db->bind('id', $id);
        //mengembalikan data menggunakan methode single dikarenakan datanya hanya 1
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa 
        VALUES
        ('', :nama, :nim,:email,:jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        // membutuhkan nilai. karena di if memerlukan nilai
        // ketika berhasil menghasilkan angka 1
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa 
        WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        // membutuhkan nilai. karena di if memerlukan nilai
        // ketika berhasil menghasilkan angka 1
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET 
        nama = :nama,
        nim = :nim,
        email = :email,
        jurusan = :jurusan
        WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();

        // membutuhkan nilai. karena di if memerlukan nilai
        // ketika berhasil menghasilkan angka 1
        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', '%' . $keyword . '%');
        return $this->db->resultSet();
    }
}
