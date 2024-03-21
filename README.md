# Notification Test
Se requiere crear un sistema de notificaciones, capaz de recibir un mensaje y dependiendo de la 
categoría del mensaje y de los usuarios suscritos a estos, se notificará al medio que ellos eligieron. En el sistema hay 2 catalogos, de Categorias y de canales de envio.
#### Catalogo de Categorias
* Deportes
* Finanzas
* Peliculas
#### Catalogo de canales
* SMS
* Email
* Push Notification

En el log se requiere guardar toda la información necesaria para identificar que se hizo la notificación 
correcta al usuario correspondiente. Guardar información como el tipo de mensaje, tipo de 
notificación, datos del usuario, hora, etc.

## Instalación
* Descargar el repo en el servidor
* Configurar el archivo .env
* Instalar las dependencias de Composer:
```batch
composer install
````
* Configurar las llaves requeridas:
```batch
php artisan key:generate
````
* Correr las migraciones con el artisan, no olvidar agregar el parametro del seeder:
```batch
php artisan migrate --seed
````
* La aplicacion hace uso de CronJobs, se deben dejar corriendo con un daemon, ya sea que el mismo laravel lo corra, o que el crontab lo haga
```batch
// Que el laravel lo gestione:
php artisan schedule:work
// Que el crontab del SO lo gestione:
php artisan schedule:run
````
## Usuarios iniciales
|Usuario|Contraseña|
|---|---|
|demo@demo.com|password|
|demo2@demo.com|password|
