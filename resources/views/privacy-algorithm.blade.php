@extends('layouts.main')
@section('title','Cara Memilih - ')
@section('content')

<section class="py-5 ">
            <div class="container">
          <div class="row align-items-center min-vh-40 mt-5">
            <div class="col-lg-12 mb-4 mb-lg-0">
              <h1 class="display-4  text-center ">Data Privacy & System Algorithm</h1> 
                  <p>Selamat datang di Website Resmi Pemilihan Umum Fakultas Hukum UNPAD ! Berikut adalah informasi mengenai data dan juga cara kerja sistem.</p>
              <br>
              <h3>Privacy Policy</h3>
              <p>Semua data yang dikumpulkan, bersifat rahasia termasuk Nama, NPM, Email Kampus. Data tersebut diperoleh dari internal fakultas dan disimpan didalam database yang terenkripsi secara aman.
              <br>Data yang dikumpulkan hanya Nama, NPM, Angkatan dan juga Email Kampus, hanya dipergunakan sebagai informasi data pemilih</p>
<br>
              <h3>Cara Kerja & Keamanan Sistem</h3>
              <p><h4>Cara Kerja One Time Password</h4>
              Setiap user mendapatkan random generated number yang berbeda beda jumlah digitnya, paling sedikit adalah 6 digit dan paling banyak adalah 12 digit menggunakan Algoritma Mersenne Twister untuk pseudorandom number generator.
              Jadi setiap user memiliki code yang unique dan tidak mungkin sama dengan kemungkinan sama.

              <br><br> One Time Password atau kode rahasia hanya bisa digunakan 1 (satu) kali saja, apabila telah digunakan tidak dapat digunakan kembali.
<br> One Time Password atau kode rahasia hanya bisa digunakan 1 (satu) browser/device saja, apabila terjadi kegagalan (internet terputus, dan lain lain) selama pemilihan, selama itu tidak mengklik tombol kirim dan belum terekam atau tersimpan di database pemilihan maka kode dapat digunakan di device yang sama atau di device yang berbeda.
              <br><br> <h4>Cara Kerja Pemilihan</h4>
              Tahapan dalam cara kerja pemilihan : 
              <ol>
              <li>Panitia mengupload data mahasiswa aktif yang didapat dari fakultas</li>
              <li>Sistem generate kode unik dan mengirim email satu per satu kepada setiap pemilih</li>
              <li>Pemilih menggunakan kodenya, kode tidak bisa dipakai dan pilihan tidak bisa diubah</li>
              <li>Real Count pada halaman depan saat pemilihan akan berubah seiring dengan pertambahan suara</li>
              <li>Semua pilihan terekam dan disimpan dalam database yang terenkripsi dengan server yang dikelola oleh pihak ketiga</li> 
              
              </ol>
              Pilihan setiap pemilih disimpan didalam database dan terenkripsi, demi menjaga asas kerahasiaan panitia tidak dapat melihat apa yang dipilih oleh pemilih, panitia hanya dapat melakukan :
              semua data terenkripsi menggunakan bcrypt (Blowfish Cipher) 183 Bit yang biasa digunakan sebagai password encrypter. Panitia tidak bisa merubah jumlah suara, pilihan pemilih, dan juga tidak bisa melihat kode milik pemilih.
              semua source code untuk sistem dapat dibuka, diteliti bersama, dan dapat diaudit oleh pihak ketiga.
<br>
              <br> Server pemilihan (hosting) dikelola oleh pihak ketiga berupa perusahaan swasta yang ditunjuk oleh KPUM.
               
             
            </p>
              </div>
               
            </div>
          </div>
        </section>

 
 
       
 
@endsection