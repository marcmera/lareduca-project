<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Proyecto Laravel con Tailwind CSS

Este repositorio contiene un proyecto Laravel configurado con Tailwind CSS para facilitar el desarrollo de interfaces de usuario modernas y responsivas.

## Requisitos

Antes de comenzar, asegúrate de tener instalado:

- PHP >= 7.3
- Composer
- Node.js (para gestionar paquetes de JavaScript)
- npm (para instalar dependencias de Tailwind CSS)

## Instalación

### Clonar el Repositorio

Primero, clona este repositorio en tu máquina local utilizando Git:

    git clone https://github.com/marcmera/lareduca-project

Navega al directorio del proyecto:

    cd laravel-project

### Configurar el Entorno

Copia el archivo `.env.example` a `.env` y ajusta las variables de entorno según sea necesario:

    cp.env.example.env

Luego, genera una clave de aplicación para Laravel:

    php artisan key:generate

### Instalar Dependencias

Instala las dependencias de PHP mediante Composer:

    composer install

Y luego, instala las dependencias de JavaScript con npm:

    npm install

### Compilar Assets

Compila los assets de Tailwind CSS para producción:

    npm run dev

O si prefieres compilar solo los archivos necesarios sin purgarlos:

    npm run watch

### Base de datos

Para la creación de la base de base de datos ejecuta el dump.sql que se encuentra en el proyecto:

### Servidor de Desarrollo

Inicia el servidor de desarrollo de Laravel:

    php artisan serve

Ahora, tu proyecto está corriendo en `http://localhost:8000`.

### Juegos

Para ejecutar los juegos necesitar abrir un terminal desde la ruta del proyecto y hacer lo siguiente (este es un ejemplo con uno de ellos):

Navega al directorio de juegos y al juego que quieras ejecutar (por ejemplo el piano):

    cd games/piano

Instala las dependencias:

    npm install

Ejecuta el juego:

    npm run dev


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
