<h1 align="center">NMS</h1>
<h2 align="center">Fault Management dan Accaounting Management</h2>

___
Perancangan:<br>
1.Menggunakan protocol SNMP untuk penggambilan data perangkat jaringan<br>
2.Menggunakan bahasa pemograman PHP<br>
3.Pemograman ditulis secara Prosedural<br>
4.Menggunakan framework bootstarap (SB-ADMIN2) sebagai template Dashboard Admin<br>
5.Database menggunakan DBMS(mysql) <br>
6.Menjalankan penggambilan data otomatis (polling snmp) menggunakan Cronjobs<br>
7.Server CentOs 7.6<br>
8.Notifikasi menggunakan telegram

___

Fitur NMS:
- **Detail**: Menampilkan detail perangkat 
- **Chart**: Menampilkan data dalam bentuk grafik
- **Fault Management**: Ketersediaan dan daftar kegagalan port/interfaces perangkat jaringan
- **Accounting Management**: Kalkulasi penggunakan resoauce perangkat dan jaringan
- **Notifiasi**: Konfigurasi notifikasi telegram

___

# Instalasi Linux
## Requirement
    apache2
    php7.0 php7.0-mysql php7.0-curl php7.0-json php7.0-cgi  php7.0 libapache2-mod-php7.0 
    php7.0-snmp
    mariadb-server mariadb-client
    phpmyadmin
    crontab

        
## Quick start
   Install semua service yang dibutuhkan sesuai requirement<br>
   Buka databases melalui phpmyadmin lalu buat database baru dengan nama nms<br>
   Import database dengan databaes (nms.sql) yang telah disediakan<br>
   Copy file ke directory /var/www/html <br>
   Edit file koneksi pada directory /var/www/html/nms/koneksi/koneksi.php sesuai dengan konfigurasi database (user dan passwd) <br>
   Pastikan server dan admin terhubung,lalu buka browser dan akses alamat dari server NMS serta login dengan user dan password <br>
   **username (admin1) dan password (admin1) tanpa tanda ()
 
 ## Readme
    Pastikan server nms dapat terhubung ke perangkat jaringan
 
 
___

#### 1. Halaman Login
![Image of Halaman Login](https://drive.google.com/uc?export=view&id=1R-25nv0s3TkvkV4D5eR3GuBrZZPouEKG)

#### 2. Halaman Depan
![Image of Halaman Depan](https://drive.google.com/uc?export=view&id=1mU_-a0V3k7N_3_fWUKThS8NLg4CmeGGJ)

#### 3. Konfigurasi Notifikasi
![Image of Konfigurasi Notifikasi](https://drive.google.com/uc?export=view&id=19jOYsQ9IZ8FhYTGtdcPQpaf3DLeNxbzU)

#### 4. Menambahkan Perangkat
![Image of Menambahkan Perangkat](https://drive.google.com/uc?export=view&id=110PY94kBwm_7-rfA6_N8UPY_uwXBx1ny)

#### 5. Detail Perangkat
![Image of Detail Perangkat](https://drive.google.com/uc?export=view&id=1P9-uIVS4Vlvh5kpOkdmOZWksp0mYmOKL)

#### 6. Charts
![Image of Charts](https://drive.google.com/uc?export=view&id=1wQM0yKG1cNVdBNEI6l58HVsXOpkC70Yx)

#### 7. Fault Management
![Image of Fault Management](https://drive.google.com/uc?export=view&id=1DBsy1-bgH7bXXUbqi_UjJBbd8mTqwHwH)

#### 8. Accounting Management
![Image of Accounting Management](https://drive.google.com/uc?export=view&id=1UAix0la3Gw2ddOE6q6UKyAf8pC9kRgDV)

#### 9. Notifikasi Telegram
![Image of Notifikasi](https://drive.google.com/uc?export=view&id=1oOlK5QE9cL9ub9mr56FRrkMr6c6Soea8)

___

** Project Kerja Praktik<br>
** Ip address, community, password, dan hal hal privasi lainnya yang dapat disalahgunakan sudah di samarkan<br>
** kamilanindita@gmail.com
