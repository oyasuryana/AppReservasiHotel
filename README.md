# Aplikasi Resevasi Hotel

## Pengantar ?

Aplikasi reservasi hotel dengan codeigniter4 ini merupakan sebuah contoh proyek untuk siswa Rekayasa Perangkat Lunak Jenjang SMK. Aktor dari aplikasi ini terdiri dari 3 yaitu :

1. Tamu
2. Admin
3. Resepsionis

Tamu bisa melihat galeri fasilitas hotel dan fasilitas kamar serta melakukan reservasi online tanpa harus membuat akun, administrator hanya bertugas mengelola data fasilitas hotel, fasilitas kamar dan kamar. Sedangkan resepsionis bertugas menerima tamu untuk melakukan cek in dan cek out tanpa mencatat pembayarannya, resepsionis juga bisa mengecek ketersediaan kamar.

## Prasyarat

Untuk menjalankan aplikasi ini aplikasi yang dibutuhkan
1. PHP min versi 7.3.x
2. MySQL
3. Composer 
4. Browser
5. Git bash (optional untuk proses download)

## Instalasi

Untuk instalasi silahkan pilih metode berikut
1. Download zip file, atau
2. Clone dari repostory (membutuhkan Git yang terinstall di PC anda), dengan cara
    a. jalankan terminal atau command line
    b. jalankan perintah berikut :

    `git clone https://github.com/oyasuryana/AppReservasiHotel`
    
    c. Maka akan terdownload folder 'AppReservasiHotel'
    d. Buat database dengan nama `appReservasiHotel`
    e. Import file database dengan phpmyadmin atau MySQL client tool lainnya
    f. Lakukan perubahan seting database di file env
    g. rename file env menjadi .env (diawali tanda titik)
3. Jalankan aplikasi
    a. Jalankan editor (disarankan Visual Studio COde)
    b. Buka folder folder appReservasiHotel
    c. Pada visual studio code buat terminal baru
    d. ketik perintah berikut 

        `php spark serve` (tekan enter)
    e. Jalankan browser, arahkan url ke http://localhost:8080 (atau port yang tertera di terminal)    

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
# AppReservasiHotel
