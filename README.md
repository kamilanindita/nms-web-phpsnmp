<h1 align="center">NMS</h1>
<h2 align="center">Fault Management dan Accaounting Management NMS</h2>

___

1.Menggunakan protocol SNMP untuk penggambilan data perangkat jaringan<br>
2.Menggunakan bahasa pemograman PHP<br>
3.Pemograman ditulis secara Prosedural<br>
4.Menggunakan framework bootstarap (SB-ADMIN2) sebagai template Dashboard Admin<br>
5.Database menggunakan DBMS(mysql) <br>
6.Menjalankan penggambilan data otomatis (polling snmp) menggunakan Cronjobs<br>
7.Server CentOs 7.6<br>

___

Fitur NMS:
- **Detail**: Menampilkan detail perangkat 
- **Chart**: Menampilkan data dalam bentuk grafik
- **Fault Management**: Ketersediaan dan daftar kegagalan port/interfaces perangkat jaringan
- **Accounting Management**: Kalkulasi penggunakan resoauce perangkat dan jaringan
- **Notifiasi**: Konfigurasi notifikasi telegram

___

# Instalasi
## Requirement Linux
    apache2
    php7.0 php7.0-mysql php7.0-curl php7.0-json php7.0-cgi  php7.0 libapache2-mod-php7.0 
    php7.0-snmp
    mariadb-server mariadb-client
    phpmyadmin
    crontab

        
## Quick start
   Install semua service yang dibutuhkan sesuai requirement
   Buka databases melalui phpmyadmin lalu buat database baru dengan nama nms
   Import database dengan databaes (nms.sql) yang telah disediakan
   Copy file ke directory /var/www/html 
   Edit file koneksi pada directory /var/www/html/nms/koneksi/koneksi.php sesuai dengan konfigurasi database (user dan passwd)
   Pastikan server dan admin terhubung,lalu buka browser dan akses alamat dari server NMS serta login dengan user dan password
   **username (admin1) dan password (admin1) tanpa tanda ()
 
 ## Readme
    Pastikan server nms dapat terhubung ke perangkat jaringan
 
 
___

#### 1. Halaman Depan
![Image of index]()

#### 2. Konfigurasi Notifikasi
![Image of Konfigurasi Notifikasi]()

#### 3. Menambahkan Perangkat
![Image of Menambahkan Perangkat]()

#### 4. Detail Perangkat
![Image of Detail Perangkat]()

#### 5. Charts
![Image of Charts]()

#### 6. Fault Management
![Image of Fault Management]()

#### 7. Accounting Management
![Image of Accounting Management]()

#### 8. Notifikasi Telegram
![Image of Notifikasi]()

___

** Project Kerja Praktik<br>
** Ip address, community, password, dan hal hal privasi lainnya yang dapat disalahgunakan sudah di samarkan<br>
email:kamilanindita@gmail.com
