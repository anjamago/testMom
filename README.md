## Nota
La siguiente aplicacion es un test 

la aplicacion creatraciones internas entre aplicaciones atraves de un cliente http con soporte de los verbos `GET, POST, PUT,DELETE`
y cada trasacion se registra en  la base de datos en la tabla `Logs` para control de auditoria


## Instalacion

1. clonar el repositorio 
2. aceder a la carpeta del proyecto
3. una ves realizado el paso 2 ejecutar `composer install` o `composer i`
4. en el archivo `.env` debe agregarce la siguienre varible `API_ENDPOINT=https://jsonplaceholder.typicode.com`
5. definir una base de datos en el archivo `.env` y ejecutar el comando `php artisan migrate`
6. ejecutar o levantar aplicacion `php artisan serve`

## dependencias instaladas 

### Via composer
api para realizar solicitudes http construida apartir de HTTP Guzzle
documentacion

[[Documentacion laravel]](https://laravel.com/docs/8.x/http-client)

[[Documentacion Guzzle ]](https://docs.guzzlephp.org/en/stable/)

`composer require guzzlehttp/guzzle`

franmento extraido de material dashboard laravel esto no deberia presentar inconvenientes ya que en la  instalacion 
el paso 3 deberia resolver 

1. `Cd` to your Laravel app
2. Type in your terminal: `composer require laravel/ui` and `php artisan ui vue --auth`
3. Install this preset via `composer require laravel-frontend-presets/material-dashboard`. No need to register the service provider. Laravel 5.5 & up can auto detect the package.
4. Run `php artisan ui material` command to install the Argon preset. This will install all the necessary assets and also the custom auth views, it will also add the auth route in `routes/web.php`
   (NOTE: If you run this command several times, be sure to clean up the duplicate Auth entries in routes/web.php)
5. In your terminal run `composer dump-autoload`
6. Run `php artisan migrate --seed` to create basic users table


###  folder present
en este folder se encuentra las images relacionadas a esta aplicacion 


