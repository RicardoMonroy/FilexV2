

## Pasos para instalar
Clonar la app desde el repositorio de Github

```
git clone https://github.com/RicardoMonroy/FilexV2.git
```

Acceder a la carpeta del proyecto
crear un archivo .env (se puede tomar como referencia el .env.example)

Instalar dependencias de PHP con:

```
composer install
```
 Crear Key de la aplicación con:

 ```
 php artisan key:generate
 ```
 Dar de alta datos de acceso apra Base de Datos, por ejemplo

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={db_name}
DB_USERNAME={tu_user}
DB_PASSWORD={pass_de_tu_user}
```

Instalar dependencias de Node
```
npm install
```
```
npm run dev
```
Ejecutar migraciones y poblar la base de datos
```
php artisan migrate --seed
```
Generar enlace simbíolico para acceder al Storage
```
php artisan storage:link
```
Ejecutar servidor
```
php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
