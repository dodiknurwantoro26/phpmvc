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
}
