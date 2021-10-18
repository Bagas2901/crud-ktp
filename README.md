<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


Aplikasi CRUD KTP sederhana

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

API
- Menampilkan data 		            : /tampil
- Simpan data 			            : /simpan
- Menampilkan data berdasrkan id 	: /tampil_data/{id}
- Update data			            : /update/{id}
- Hapus data 			            : /hapus/{id}

Created By : Bagas Aruna Yudhatama

