<?php
class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();



        ### eksekusi Controller
        // pengecekan controller dan url
        // atau pengecekan ada atau tidak file yang di ketik di url, didalam folder controller
        if (!empty($url) && file_exists('../app/controllers/' . $url[0] . '.php'))
        // kalau ada $controller = 'Home' timpa dengan controller yang baru
        {
            // mengambil data $controller = 'home' menggunakan $this
            $this->controller = $url[0];
            // menghilangkan controller di array url
            unset($url[0]);
        }

        // panggil file didalam folder controller
        require_once '../app/controllers/' . $this->controller . '.php';
        // di instansiasi
        $this->controller = new $this->controller;


        //##proses Method
        //jika ada method di url
        if (isset($url[1])) {
            // pengecekan method didalam controller
            if (method_exists($this->controller, $url[1])) {
                // jika ada timpa dengan method baru
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //##kelola params
        if (!empty($url)) {
            // pengambil data parameter url dan masukan ke $params = [];
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // rtrim untuk menghilangkan slas"/" pada url
            $url = rtrim($_GET['url'], '/');
            // membersihkan url dari karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // url pecah dengan delimiter '/' menggunakan fungsi explode()
            $url = explode('/', $url);

            return $url;
        }
    }
}
