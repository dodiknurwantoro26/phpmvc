//teknik jQuery
// ketika document sudah siap jalankan script didalamnya
$(function(){

    // ## Tombol Tambah Data
    // jquery mencarikan class tampilTambahData. ketika diklik jalankan fungsi berikut
    $('.tampilTambahData').on('click', function(){
        //carikan idnya formModalLabel yang isi htmlnya diubah
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        //memakai CSS selector
        //mencari class modal-footer didalamnya ada button yang tipe submit
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    // ## Tombol Ubah Data
    // jquery mencarikan class tampilModal. ketika diklik jalankan fungsi berikut
    $('.tampilModalUbah').on('click', function(){
        //carikan idnya formModalLabel yang isi htmlnya diubah
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        //memakai CSS selector
        //mencari class modal-footer didalamnya ada button yang tipe submit
        $('.modal-footer button[type=submit]').html('Ubah Data');
        //mencari class modal-body didalamnya ada form. ubah attribut action menjadi berikut
        $('.modal-body form').attr('action','http://localhost/phpmvc/public/mahasiswa/ubah');

        //$(this) tombol yg diklik pada ('.tampilModalUbah'). ambil data dengan id tersebut 
        const id = $(this).data('id');
        
        // menjalankan ajax
        //parameter ajax: 
        // 1. url -> mengambil dari url mana
        $.ajax({
            //get ubah akan mengembalikan sesuai ID yg dikrimkan
            url:'http://localhost/phpmvc/public/mahasiswa/getubah',
            //data dikirim menggunakan method apa? jika pakai post akan di tangkap dengan $_POST
            method: 'POST',
            //kirim sebuah data. 
            // id kiri nama data yg akan di kirim atau disebut key
            // id kanan isi dari sebudah data yang akan di krim atau isi dari key
            data: {id : id},
            //tipe data yang akan dikirim
            dataType: 'json',
            //ketika sukses melakukan ...
            success: function(data){
            //cari id nama pada modal ganti value dengan data keynya nama
            $('#nama').val(data.nama);
            $('#nim').val(data.nim);
            $('#email').val(data.email);
            $('#jurusan').val(data.jurusan);
            $('#id').val(data.id);
            }
        });
    });

});