# Implementasi Payment Gateway Indonesia 
# langkah pertama
1. install laravel 5.8 dengan perintah commposer create-project --prefer-dist laravel/laravel Midtrans "5.8*"
2. setlah itu lakukan printah composer require veritans/veritans-php untuk me require file php
3. tambahkan file env untuk key api midtrans ke dalam project
# langkah kedua kita buat model dan migration Donation
1. jalankan printah php artisan make:model Donation -m , printah ini membuat model dengan nama donation dan membuat databse migration
2. setelah itu buat method di model untuk set status punding, success, failed dan expire/kadaluarsa