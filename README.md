
# PROYECTO APLICACIÓN SEGUIMIENTO

Este repositorio contiene una aplicación basada en Laravel 10, diseñada para gestionar clientes con autenticación segura, usuarios, roles, permisos, reportes en PDF/Excel, códigos QR y comunicación con APIs externas como Google.

## Tecnologías Usadas

![PHP](https://img.shields.io/badge/PHP-8.1-blue)  
![Laravel](https://img.shields.io/badge/Laravel-10-red)  
![MySQL](https://img.shields.io/badge/MySQL-Database-lightblue)  
![Composer](https://img.shields.io/badge/Composer-Dependency-orange)  
![Sanctum](https://img.shields.io/badge/Sanctum-TokenAuth-blueviolet)  
![Socialite](https://img.shields.io/badge/Socialite-Login-green)  
![Excel](https://img.shields.io/badge/Excel-Export%2FImport-success)  
![QR](https://img.shields.io/badge/QR--Code-Generator-informational)  
![API](https://img.shields.io/badge/API-GoogleClient-yellow)

## Requisitos

- **PHP**: ^8.1
- **Composer**
- **MySQL**
- Extensiones PHP: OpenSSL, PDO, Mbstring, Tokenizer, JSON, Fileinfo, Ctype, BCMath, XML

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/Logicainformatica18/seguimiento_aybar
   cd repositorio
   ```

2. Instala las dependencias:
   ```bash
   composer install
   ```

3. Copia el archivo de entorno y genera la clave de la app:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configura las variables de entorno `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_de_base
   DB_USERNAME=usuario
   DB_PASSWORD=contraseña
   ```

5. Ejecuta las migraciones y seeders:
   ```bash
   php artisan migrate --seed
   ```

6. Inicia el servidor local:
   ```bash
   php artisan serve
   ```

## Funcionalidades

- Autenticación tradicional y mediante cuentas Microsoft
- Permisos y roles dinámicos con Spatie
- Exportación e importación de datos con Excel
- Generación de códigos QR únicos
- Reportes en PDF
- Manejo de imágenes con Intervention
- Integración con APIs externas (Google)
- Soporte para autenticación en dos pasos (2FA)
- CRUDs completos protegidos con middleware
- API REST segura con Laravel Sanctum

## Estructura del Proyecto

- `app/` – Controladores, modelos, servicios y lógica de la app
- `database/` – Migraciones, seeders y factories
- `public/` – Archivos públicos y punto de entrada
- `resources/` – Vistas Blade y archivos front (CSS/JS)
- `routes/` – Definición de rutas web y API
- `tests/` – Pruebas automatizadas

## Paquetes Incluidos

### Dependencias de producción

- **laravel/framework**: Core del framework
- **laravel/sanctum**: Autenticación API basada en tokens
- **laravel/socialite**: Autenticación mediante redes sociales
- **socialiteproviders/microsoft**: Extensión para login con Microsoft
- **spatie/laravel-permission**: Roles y permisos
- **maatwebsite/excel**: Exportación/Importación en Excel
- **simplesoftwareio/simple-qrcode**: Generador de códigos QR
- **intervention/image**: Procesamiento de imágenes
- **guzzlehttp/guzzle**: Cliente HTTP
- **google/apiclient**: Cliente oficial de Google
- **pragmarx/google2fa-laravel**: Autenticación en dos pasos
- **laravel/ui**: Plantillas básicas para login/register

### Dependencias de desarrollo

- **barryvdh/laravel-debugbar**: Depuración visual
- **fakerphp/faker**: Generador de datos falsos
- **laravel/pint**: Formateo de código
- **laravel/sail**: Entorno Docker para desarrollo
- **mockery/mockery**: Mocking en tests
- **phpunit/phpunit**: Framework de testing
- **spatie/laravel-ignition**: Mejor manejo de errores
- **nunomaduro/collision**: Reporte de errores en CLI

## Comandos Útiles

```bash
php artisan migrate:fresh --seed      # Reinicia la base de datos
php artisan config:cache              # Cachea la configuración
php artisan route:list                # Lista de rutas
php artisan optimize:clear            # Limpia caches (config, view, routes)
php artisan vendor:publish            # Publica archivos de los proveedores
```

## Seguridad y Autenticación

- Middleware para proteger rutas según roles
- Token API con Laravel Sanctum
- Opcional: Doble autenticación (2FA) con Google Authenticator
- Validaciones backend con Requests

## Buenas prácticas usadas

- Separación de lógica (Controllers, Services)
- Validación a nivel de Request
- Uso de Seeders para datos iniciales
- Control de acceso con Spatie Permission
- Manejo de excepciones con Ignition y Debugbar
- Control de versiones con Git

## Licencia

Este proyecto está licenciado bajo la [Licencia MIT](https://opensource.org/licenses/MIT).

## Recursos adicionales

- [Documentación oficial de Laravel](https://laravel.com/docs)
- [Documentación de Composer](https://getcomposer.org/doc/)
- [API Client de Google](https://github.com/googleapis/google-api-php-client)
- [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission)
- [Maatwebsite Excel](https://docs.laravel-excel.com)
