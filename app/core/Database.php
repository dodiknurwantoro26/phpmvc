<?php
class database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; //database handler
    private $stmt; //untuk query database

    // koneksi ke database dengan PDO
    // database menggunakan PDO memudahkan ketika gnt server database
    public function __construct()
    {
        // identitas server
        // data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        //optimasi mengamana dan mingirimkan pesan eror
        $option = [
            PDO::ATTR_PERSISTENT => true, // pengamanan koneksi
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        //pengecekan koneksi sql
        try {
            //parameter PDO = data source name, username, password dari SQL
            // tambahan option untuk melakukan optimasi
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            //jika eror berhentikan program kasih pesar eror
            die($e->getMessage());
        }
    }

    // function query generik bisa dipakai untuk apapun seperti SELECT, DELETE, UPLOAD dll
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // teknik ini untuk menghindari sql injection
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR; //selain itu nilainya string
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // eksekusi hasil query
    public function execute()
    {
        $this->stmt->execute();
    }

    // mengembalikan data banyak 
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //mengembalikan data satu
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    //menghitung ada berapa baris yang berubah di table database
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
