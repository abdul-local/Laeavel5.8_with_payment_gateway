# Implementasi Payment Gateway Indonesia 
# langkah pertama
1. install laravel 5.8 dengan perintah commposer create-project --prefer-dist laravel/laravel Midtrans "5.8*"
2. setlah itu lakukan printah composer require veritans/veritans-php untuk me require file php
3. tambahkan file env untuk key api midtrans ke dalam project
# langkah kedua kita buat model dan migration Donation
1. jalankan printah php artisan make:model Donation -m , printah ini membuat model dengan nama donation dan membuat databse migration
2. setelah itu buat method di model untuk set status punding, success, failed dan expire/kadaluarsa

# Membuat Controller dan Halaman donasi
1. Membuat controller dapa di gunaka  printah php artisan make:controller DonationController
2. Setalah itu kalian buat di view desain sesui yang ada inginkan, kalau anda tidak mau ribet dapat kunjungin github.com/idstck/laravel_midtrans/
3. dimana disitu kalian bisa mengambil laman untuk view donation

# Untuk membuat Fungsi Store untuk payment gatway,
1. cek dulu strucktur untuk payment gateway dari midtrans
2. buat methodnya untuk mengaatur request untuk inputan

