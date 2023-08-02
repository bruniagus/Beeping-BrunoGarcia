
Para iniciar se debe inicializar con 
```
docker-compose up
```
Instalamos composer en el proyecto

```
docker-compose exec app composer install
```

Se tiene que correr las migraciones y los seeders , como lo tengo inicializado en l maqiona de ubuntu yo pongo el siguiente comando para que docker sepa que estoy en ese imagen

```
docker-compose exec app php artisan migrate

docker-compose exec app php artisan db:seed --class=ProductsSeeder
docker-compose exec app php artisan db:seed --class=OrdersSeeder
```




inicializamos el server con el siguietne comando

```
docker-compose exec app php artisan serve --host 0.0.0.0 --port 8000
```

Inicializamos las colas

```
docker-compose exec app php artisan queue:work
```
Configurar del env

Para configurar el .env debemos hacer lo siguiente  para ejecutar la key
```
docker-compose exec app php artisan key:generate
```

```
APP_URL debemos poner tu ruta local y el puerto donde lo quieres poner en mi caso es "http://127.0.0.1:8000"
```
```
DB_HOST tenemos que poner el nombre del services creado en el docker-compose en este caso "db"
```
```
DB_PASSWORD  tenemos que poner la contraseña de la base de datos creado en el docker-compose en la linea de MYSQL_ROOT_PASSWORD
```
```
DB_PASSWORD  tenemos que poner el nombre la base de datos creado en el docker-compose en la linea de DB_DATABASE
```
```
QUEUE_CONNECTION ponemos database
```

