@extends('layouts.main')
@section('title','Cara Memilih - ')
@section('content')

<section class="py-5 ">
            <div class="container">
          <div class="row align-items-center min-vh-40 mt-5">
            <div class="col-lg-12 mb-4 mb-lg-0">
              <h1 class="display-4  text-center ">Panduan Memilih</h1> 
                  <p>Selamat datang di Website Resmi Pemilihan Umum Fakultas Hukum UNPAD ! Berikut adalah panduan bagaimana kamu dapat menggunakan hak pilih kamu.</p>
              <br>
              <h3>1. Cek Status Pemilih</h3>
              <p>Untuk mengecek apakah kamu terdaftar sebagai pemilih dan memiliki hak suara dalam sistem pemilihan umum FH Unpad, silahkan kunjungi halaman <a href="{{url('cek-pemilih')}}">"Cek Status Pemilih"</a> lalu masukan nomor pokok mahasiswa, apabila terdaftar akan ada notifikasi berwarna hijau yang menyebutkan bahwa kamu terdaftar. 
             
             <br><img src="{{asset('tutorial/tutorial-0.png')}}" style="width:50%;" class="img-fluid"></img>
             
              <br><b>Namun, apabila tidak terdaftar sebagai pemilih</b> maka terdapat beberapa kemungkinan : 
              <ol>
              <li>Status kemahasiswaan dianggap tidak aktif oleh dekanat / universitas</li> 
              <li>Tidak memiliki hak pilih </li>
              <li>Informasi Belum di input oleh panitia </li>
              </ol>
              Apabila demikian silahkan hubungi panitia KPUM FH Unpad untuk meminta informasi lebih lanjut.</p>
<br>
              <h3>2. Dapatkan Undangan Pemilihan Melalui Email</h3>
              <p>Apabila kamu telah terdaftar maka kamu akan secara otomatis mendapatkan email berupa kode unik pemilihan ke alamat email UNPAD (@mail.unpad.ac.id), email akan berbentuk seperti ini :  
              <br>
              <img src="{{asset('tutorial/tutorial-1.png')}}" style="width:50%;"  class="img-fluid"></img> 
            <br>Kode pada email tersebut berbentuk angka sebanyak 6-10 digit yang bersifat random, kode ini selanjutnya akan dimasukan di halaman <a href="{{url('pilih')}}">"Tentukan Pilihan"</a> sebagai one-time password untuk menggunakan hak suara. untuk informasi mengenai cara kerja dan algoritma dibalik sistem ini silahkan lihat di halaman <a href="{{url('privacy-and-algorithm')}}">"
Kebijakan Privasi & Cara Kerja Sistem"</a>
            <div class="alert alert-danger" role="alert">
            KODE BERSIFAT RAHASIA, Jangan pernah berikan kode kepada siapapun. 1 Suara sangat berharga untuk menentukan kehidupan kampusmu
            </div>
            <div class="alert alert-info" role="alert">
            <span class="badge badge-warning"><b>Perlu Diperhatikan</b></span> Pengiriman kode akan dimulai minimal H-3 sebelum pemilihan dimulai, apabila pada hari H kode belum terkirim namun sudah terdaftar sebagai pemilih silahkan hubungi panitia KPUM 
            </div>
           

            <br>
              <h3>3. Tentukan Pilihan</h3>
              <p>Setelah mendapat 6-10 digit kode, copy kode tersebut lalu kunjungi halaman <a href="{{url('pilih')}}">Tentukan Pilihan</a>
              <br>
              <img src="{{asset('tutorial/tutorial-2.png')}}" class="img-fluid"></img> 
           
<ul>
<li><h4>Pilih Ketua dan Wakil Ketua BEM</h4> <br>
<img src="{{asset('tutorial/tutorial-3.png')}}" style="width:50%;" class="img-fluid">
<br>
Pilih dengan cara klik pada foto atau nama pasangan sampai pasangan tersebut memiliki tanda ceklis</li>  
<li><h4>Pilih Anggota BPM Angkatan</h4> <br>
<img src="{{asset('tutorial/tutorial-4.png')}}" style="width:50%;" class="img-fluid">
<br>
Pilih dengan cara klik pada foto atau nama calon anggota sampai pasangan tersebut memiliki tanda ceklis
<div class="alert alert-primary" role="alert">
Pilihan Anggota BPM hanya muncul apabila pada angkatan pemilih terdapat calon BPM, calon BPM hanya ada di 3 angkatan termuda dari tahun ajaran
</div>
            </li>  
            <li><h4>Klik Pilih</h4>
<img src="{{asset('tutorial/tutorial-5.png')}}" class="img-fluid"><br>
Selesaikan pemilihan dengan cara klik tombol Pilih sampai redirect ke halaman terima kasih, maka suara kamu akan otomatis terekam
<br> 
<img src="{{asset('tutorial/tutorial-6.png')}}" class="img-fluid"></li>  
</ul>         
             
            <div class="alert alert-success" role="alert">
            1 Kode Rahasia sama dengan 1 Suara dan juga 1 Device, kode rahasia tidak dapat digunakan kembali dengan cara apapun baik oleh panitia maupun oleh pemilih.
            </div>
            <div class="alert alert-info" role="alert">
            <span class="badge badge-warning"><b>Perlu Diperhatikan</b></span> Pengumuman Resmi Pemenang akan diumumkan setelah berakhirnya masa pemilihan, pemilih dapat melihat real-count di halaman terdepan website ini.
            </div>

            <div class="alert alert-warning" role="alert">
            <span class="badge badge-warning"><b>Perlu Diperhatikan</b></span> Pastikan, untuk kelancaran, kenyamanan dan keamanan memilih, pemilih disarankan untuk menggunakan Browser dari Laptop atau PC seperti Firefox, dan Chrome dengan enable Javascript dan juga Accept Cookies, segala bentuk error karena kesalahan pemilih karena tidak mengikuti anjuran cara pemilihan bukan tanggung jawab KPUM.
            </div>
           
            </p>
              </div>
               
            </div>
          </div>
        </section>

 
 
       
 
@endsection