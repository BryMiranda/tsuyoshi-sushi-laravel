# Proyecto Examen - Universidad Politécnica Salesiana

Este repositorio contiene el proyecto de examen para la materia **(A) ANÁLISIS Y DISEÑO DE SISTEMAS**  
**Grupo:** 1 - Periodo 65  
**Maestro:** Dario Huilcapi

El proyecto ha sido desarrollado utilizando **Laravel** y está orientado a demostrar el análisis y diseño de sistemas.

## Recomendaciones para Usuarios de Windows

Se recomienda utilizar **Laragon** o **Laravel Herd** para facilitar la configuración y el entorno de desarrollo en Windows.  
- [Laragon](https://laragon.org)  
- [Laravel Herd](https://laravelherd.com/)

## Pasos para Clonar y Ejecutar el Repositorio Localmente

Siga los siguientes pasos para levantar el proyecto en su máquina:

1. **Clonar el repositorio:**

   ```bash
   git clone https://github.com/BryMiranda/tsuyoshi-sushi-laravel.git
   cd tsuyoshi-sushi-laravel
2. **Instalar dependencias de PHP**:
composer install
3. **Crear el archivo de entorno:**
cp .env.example .env
4. **Generar la clave de la aplicación:**
php artisan key:generate
5. **Configurar la base de datos:**

Abra el archivo .env y ajuste los siguientes valores según su configuración local:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

debe de tener la base de datos creada

6. **Ejecutar las migraciones y seeders:**
php artisan migrate --seed
7. **Instalar dependencias de JavaScript:**

npm install
npm run dev

8. **Levantar el servidor de desarrollo:**

composer install

php artisan serve
Abra su navegador en http://127.0.0.1:8000
