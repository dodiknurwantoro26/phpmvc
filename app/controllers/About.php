<?php
class About extends Controller
{

    // membuat method default
    // mmebuat paramareter defult $nama= 'Dodik', $profesi = 'Programmer'
    public function index($nama = 'Dodik', $profesi = 'Programmer')
    {
        // menyiapkan data dengan aray assosiatif
        $data['judul'] = 'About Me';
        $data['data'] = $nama;
        $data['profesi'] = $profesi;
        // mengembalikan view dengan tambahan data
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'My Page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}
