<?php

// extends Controller = untuk mengenali function view yang ada di controller
class Home extends Controller
{
    // method defult index
    public function index()
    {
        $data['judul'] = 'Home';
        // mengambil data dari model dikirim ke home/index
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
