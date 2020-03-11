<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Prueba Keirón en Dev Laravel =): 

La aplicación se realizon el Laravel 6.x

Requerimeintos:


    PHP >= 7.2.5
    BCMath PHP Extension
    Ctype PHP Extension
    Fileinfo PHP extension
    JSON PHP Extension
    Mbstring PHP Extension
    OpenSSL PHP Extension
    PDO PHP Extension
    Tokenizer PHP Extension
    XML PHP Extension


Instalación

1.- Clonar el codigo

git clone https://github.com/Haleymhm/kerion.git


2.- Descargar las librerias necesarias
Debe acceder al directorio en donde se clono el proyecto y ejecutar el siguiente comando:

composer update

3.- Ediat los datos de conexion a la base de datos en el archivo .env

4.- Ejecutar la migracion del proyecto

php artisan migrate:refresh --seed 

5.- Iniciar el servidor local
php artisan serve

6.- acceder a la aplicacion

http://127.0.0.1:8000

Nota: 
Para ingresar a la aplicacion de usar los siguientes datos:
email: admin@localhost.dev
passw: Admin123

Para ingresar como usuario sin privilegios debe registrarse en la aplicacion.



Haleym Hidalgo  haleymhm@gmail.com