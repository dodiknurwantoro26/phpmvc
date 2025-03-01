<?php
class Controller
{
    //### Pengelolaan View ###
    //  membuat function methode view dengan parameter isi dari methode view ($view) dan data jika ada klau tidak ada isi kosong pada $data[]
    public function view($view, $data = [])
    {
        // memanggil view yang ada difolder home
        require_once '../app/views/' . $view . '.php';
    }


    //### Pengelolaan View ###
    public function model($model)
    {
        require_once '../app/models/User_model.php';
        require_once '../app/models/' . $model . '.php';
        // karena class menggunakan returnt new
        // instansiasi : penciptaan objek dari suatu kelas dalam bahasa pemrograman berorientasi objek (OOP)
        return new $model;
    }
}
