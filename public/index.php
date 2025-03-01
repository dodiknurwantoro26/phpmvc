<?php
//jika tidak ada session jalankan session
if (!session_id()) session_start();

// teknik bootstraping
require_once '../app/init.php';

//menjalankan class App()
$app = new App();
