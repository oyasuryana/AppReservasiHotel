# Aplikasi Reservasi Hotel

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
    1. jalankan terminal atau command line
    2. jalankan perintah berikut :

    `git clone https://github.com/oyasuryana/AppReservasiHotel`
    
    3. Maka akan terdownload folder 'AppReservasiHotel'
    4. Buat database dengan nama `appReservasiHotel`
    5. Import file database dengan phpmyadmin atau MySQL client tool lainnya
    6. Lakukan perubahan seting database di file env
    7. rename file env menjadi .env (diawali tanda titik)
3. Jalankan aplikasi
    1. Jalankan editor (disarankan Visual Studio COde)
    2. Buka folder folder appReservasiHotel
    3. Pada visual studio code buat terminal baru
    4. ketik perintah berikut 

        `php spark serve` (tekan enter)
    5. Jalankan browser, arahkan url ke http://localhost:8080 (atau port yang tertera di terminal)    

## Error Karena Perbedaan Versi PHP

Perbedaan versi PHP yang digunakan akan menyebabkan error, untuk mengantisipasi error tersebut lakukan langkah berikut :
1. Jalankan editor (disarankan Visual Studio COde)
2. Buka folder folder appReservasiHotel
3. Pada visual studio code buat terminal baru
4. ketik perintah berikut 

    `composer update (tekan enter)`

5. Jalankan kembali apliaksi, ketik perintah berikut 

    `php spark serve` (tekan enter)
6. Jalankan browser, arahkan url ke http://localhost:8080 (atau port yang tertera di terminal)    


## Visit My Repository

Blog : https://ozs.web.id
Subscribe YT channel : https://youtube.com/c/PojokProgrammer

## Buy Me Copy
Sebagai bentuk dukungan untuk tetap berkarya silahkan yang mau berdonasi mengganti pulsa
kirik ke
OVO - 085224191648

terima kasih


## Screenshoot
1. Halaman Depan 
![image](https://drive.google.com/uc?export=view&id=1gWFJLhiSbqSo6FOpkUheyoStCGhCzl66)

2. Form Reservasi
![image](https://drive.google.com/uc?export=view&id=188pUPFhS5MsQVBYKoXyHcZ4RRKN8XaSR)

3. Halaman Admin : Daftar Fasilitas Hotel
![image](https://drive.google.com/uc?export=view&id=124gpug32kqtJcAvQL8Duo-ZxcDEGIEAI)

4. Halaman Admin : Daftar Fasilitas Kamar
![image](https://drive.google.com/uc?export=view&id=1mGmdotmDQHKmsi4yEYIoab3XoJVV-_PW)

5. Halaman Admin : Daftar Kamar
![image](https://drive.google.com/uc?export=view&id=1BZmqkO4T-iWW29rLSZ7VuKE_wFlGmKBi)

6. Halaman Admin : Tambah Kamar
![image](https://drive.google.com/uc?export=view&id=15Lza7F4Ytl3XHiOYWZ8qDdmGmUQWTTcl)

7. Halaman Resepsionis : Kelola Reservasi
![image](https://drive.google.com/uc?export=view&id=1tgnB2kS62KlAQS1NZ0-DCB-vG4V0aAIf)

8. Halaman Resepsionis : Cek Ketersedian Kamar
![image](https://drive.google.com/uc?export=view&id=1XXcfiWsSdx-fQpfzdFi4Rwu2r_CRGyGe)
