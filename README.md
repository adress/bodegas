# Bodegas
 Prueba TOC

### Requerimientos 
* Tener instalado composer
* Tener una versiond de php 7.2 o superior 

### Despliegue 
* Ejecutar ```composer install``` para instalar las dependencias
* Copiar el archivo ``env.example`` renombrarlo a ``.env``
* Configurar las variables de entorno en el archivo ``.env`` con los datos de su base de datos
```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
* Ejecutar ```php artisan migrate --seed``` para crear las tablas e insertar alguns datos
* Finamete puede ejecutar  ```php artisan serve``` para iniciar el proyecto
