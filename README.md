<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## REIMBURSE APPS
Aplikasi reimbursement sederhana untuk employee menggunakan Laravel v10.22.0 (PHP v8.2.4) dan Bootstrap. 

### Instalasi
1.	Login ke github
2.	Copy link clone github
3.	Buka explorer->xampp->htdocs klik kanan, pilih Gitbash here atau buka terminal 
4.	Ketikkan di terminal / gitbash git clone https://github.com/indrajayaf/kaspin-task Enter
5.	Masuk ke folder dengan mengetik cd kaspin-task Enter
6.	Instal depedency dengan mengetik composer install tunggu sampai selesai
7.	Buat file env dengan cara ketik cp .env.example .env Enter
8.	Generate key dengan cara ketik php artisan key:generate Enter
9.	Jalankan migrate database dengan cara ketik php artisan migrate
10.	Jalankan database seeder dengan cara ketik php artisan db:seed
11.	Jalankan link storage dengan cara ketik php artisan storage:link
12.	Jalankan aplikasi dengan mengetik php artisan serve
13.	Buka browser dan ketik URL yang tampil di terminal / git bash seperti http://127.0.0.1:8000/

### Fitur
1.	Login User/Employee (Role : Direktur, Finance, Staff) menggunakan NIP dan password
2.	Halaman Dashboard, menampilkan jumlah data Reimbursement berdasarkan status (Pending, Accepted, Declined. Paid)
3.	User dengan role Direktur, bisa menampilkan list User, menambah, merubah, atau menghapus User
4.	List User bisa difilter berdasarkan role/jabatan/level (Direktur, Finance, Staff)
5.	User dengan role Staff, bisa menampilkan list Reimbursement-nya sendiri, mengajukan reimbursement, merubah reimbursement yang statusnya masih pending, dan menghapus Reimbursement
6.	List Reimbursement bisa difilter berdasarkan Status Reimbursement (Pending, Accepted, Declined. Paid)
7.	User dengan role Direktur, bisa menerima atau menolak dan memasukkan alasan penolakan reimbursement dari Staff yang statusnya masih pending
8.	User dengan role Finance, bisa menerima (paid) atau menolak dan memasukkan alasan penolakan reimbursement dari Staff yang statusnya sudah accepted by Direktur
9.	Semua User bisa melakukan pencarian reimbursement berdasarkan judul dan deskripsi reimburse
10.	Semua User bisa menampilkan profile dan mengubah profile
11.	User ketika melakukan pengajuan reimburse, bisa mengupload file berupa image/pdf dan bisa menampilkan detail reimbursement beserta file bukti reimburse (pdf/image)
12.	User dengan role Direktur bisa menampilkan master Status Reimburse dan Role User

### CONTOH DATA CREDENTIALS YANG BISA DIGUNAKAN PER ROLE/JABATAN
•	Directur
NIP : 1111
Password : password
•	Finance
NIP : 2222
Password : password
•	Staff
NIP : 3333
Password : password

### CONTOH SCREENSHOT APSS
![image](https://github.com/indrajayaf/kaspin-task/assets/14921024/a6176af4-4de2-4557-892c-b9de3df7ee3f)
![image](https://github.com/indrajayaf/kaspin-task/assets/14921024/2684c350-250b-4ff9-896b-bd88c461da60)


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
