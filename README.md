## Workers Manager 

**[DEV Demo](http://dev-workers.dredward.site) (50,000 registros)**
**[UAT Demo](http://uat-workers.dredward.site) (entorno completamente limpio)**

## Status: 
* API: Terminado
* Integración continua: Terminado con CircleCi

## Instalación rápida

1. Clonar este repo
2. Correr composer install
3. Crear un archivo de entorno (.env) con las configuraciónes de la su base de datos local (No hay que agregar el archivo .env al repositorio). Se puede tomar el archivo `.env.example` como base
4. Correr php artisan key:generate
5. Si desea el modo desarrollo - Correr php artisan build:development:refresh - Ejecuta migraciones, seeders de desarrollo y genera keys de passport
6. Si desea el modo producción - Correr php artisan build:production:refresh - Ejecuta migraciones, seeders de producción y genera keys de passport
6. Si desea el modo estresado - Correr php artisan build:development:stress - Ejecuta migraciones, seeders de stress (Inserta 50 mil registros) y genera keys de passport

## Acceso

* Usuario: admin@dredward.site
* Contraseña: tUgxsc9Nqm4IwO3W

## Api

### Endpoints

<*Environment*> = http://dev-workers.dredward.site/api || http://uat-workers.dredward.site/api

##### <*Environment*>/auth/login
``Method: POST``
```
Params: 
```
```
Headers: 
{
  Content-Type: application/json,
  Accept: application/json,
}
```
```
Payload: 
{
	"firstName": "Edward",
	"lastName": "Delgado",
	"birthday": "1994-09-07",
	"email": "edward@dredward.site",
	"phone": 6182122364,
	"hiredDate": "2020-10-29",
	"banckAccountNumber": "xxxxxxxxxxxx1234",
	"salary": 20000.20
}
```

```
OK Response: 
{
  "data": {
    "firstName": "Edward",
    "lastName": "Delgado",
    "birthday": "1994-09-07",
    "email": "edward@dredward.site",
    "hiredDate": "2020-10-29",
    "banckAccountNumber": "xxxxxxxxxxxx1234",
    "salary": 20000.2,
    "updated_at": "2020-10-29T22:23:10.000000Z",
    "created_at": "2020-10-29T22:23:10.000000Z",
    "id": 2,
    "full_name": "Edward Delgado",
    "phone_formatted": "(618) 212 2364"
  },
  "message_type": "success",
  "message_text": "Created successfully",
  "code": 200
}
```

##### <*Environment*>/auth/logout
``Method: POST``
```
Params: 
```
```
Headers: 
{
  Content-Type: application/json,
  Accept: application/json,
  Authorization: Bearer Token
}
```
```
Payload: 
```

```
OK Response: 
{
  "message_type": "success",
  "message_text": "See you later"
}
```

##### <*Environment*>/workers
``Method: GET``
```
Params: 
Page: int
```
```
Headers: 
{
  Content-Type: application/json,
  Accept: application/json,
  Authorization: Bearer Token
}
```
```
Payload: 
```

```
OK Response: 
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "firstName": "Edward",
      "lastName": "Delgado",
      "birthday": "1994-09-07",
      "email": "edward@dredward.site",
      "hiredDate": "2020-10-29",
      "banckAccountNumber": "xxxxxxxxxxxx1234",
      "salary": 20000.2,
      "deleted_at": null,
      "created_at": "2020-10-29T22:21:22.000000Z",
      "updated_at": "2020-10-29T22:21:22.000000Z",
      "full_name": "Edward Delgado",
      "phone_formatted": "(618) 212 2364"
    }
  ],
  "first_page_url": "http:\/\/uat-workers.dredward.site\/api\/workers?page=1",
  "from": 1,
  "last_page": 1,
  "last_page_url": "http:\/\/uat-workers.dredward.site\/api\/workers?page=1",
  "links": [
    {
      "url": null,
      "label": "&laquo; Previous",
      "active": false
    },
    {
      "url": "http:\/\/uat-workers.dredward.site\/api\/workers?page=1",
      "label": 1,
      "active": true
    },
    {
      "url": null,
      "label": "Next &raquo;",
      "active": false
    }
  ],
  "next_page_url": null,
  "path": "http:\/\/uat-workers.dredward.site\/api\/workers",
  "per_page": 10,
  "prev_page_url": null,
  "to": 1,
  "total": 1
}
```

##### <*Environment*>/workers/{id}
``Method: GET``
```
Params: 
int - id
```
```
Headers: 
{
  Content-Type: application/json,
  Accept: application/json,
  Authorization: Bearer Token
}
```
```
Payload: 
```

```
OK Response: 
{
  "data": {
    "id": 1,
    "firstName": "Edward",
    "lastName": "Delgado",
    "birthday": "1994-09-07",
    "email": "edward@dredward.site",
    "hiredDate": "2020-10-29",
    "banckAccountNumber": "xxxxxxxxxxxx1234",
    "salary": 20000.2,
    "deleted_at": null,
    "created_at": "2020-10-29T22:21:22.000000Z",
    "updated_at": "2020-10-29T22:21:22.000000Z",
    "full_name": "Edward Delgado",
    "phone_formatted": "(618) 212 2364"
  },
  "message_type": "success",
  "message_text": "Found it.",
  "code": 200
}
```

##### <*Environment*>/workers
``Method: POST``
```
Params: 
```
```
Headers: 
{
  Content-Type: application/json,
  Accept: application/json,
  Authorization: Bearer Token
}
```
```
Payload: 
{
  "firstName": "Edward",
  "lastName": "Delgado",
  "birthday": "1994-09-07",
  "email": "edward@dredward.site",
  "phone": 6182122364,
  "hiredDate": "2020-10-29",
  "banckAccountNumber": "xxxxxxxxxxxx1234",
  "salary": 20000.20
}
```

```
OK Response: 
{
  "data": {
    "firstName": "Edward",
    "lastName": "Delgado",
    "birthday": "1994-09-07",
    "email": "edward@dredward.site",
    "hiredDate": "2020-10-29",
    "banckAccountNumber": "xxxxxxxxxxxx1234",
    "salary": 20000.2,
    "updated_at": "2020-10-29T22:23:10.000000Z",
    "created_at": "2020-10-29T22:23:10.000000Z",
    "id": 2,
    "full_name": "Edward Delgado",
    "phone_formatted": "(618) 212 2364"
  },
  "message_type": "success",
  "message_text": "Created successfully",
  "code": 200
}
```

##### <*Environment*>/workers/{id}
``Method: PUT``
```
Params: 
int - id
```
```
Headers: 
{
  Content-Type: application/json,
  Accept: application/json,
  Authorization: Bearer Token
}
```
```
Payload: 
{
	"firstName": "Edward Iovanny",
	"lastName": "Delgado",
	"birthday": "1994-09-07",
	"email": "edward@dredward.site",
	"phone": 6182122364,
	"hiredDate": "2020-10-29",
	"banckAccountNumber": "xxxxxxxxxxxx1234",
	"salary": 20000.00
}
```

```
OK Response: 
{
  "data": true,
  "message_type": "success",
  "message_text": "Updated",
  "code": 200
}
```

##### <*Environment*>/workers/{id}
``Method: DELETE``
```
Params: 
int - id
```
```
Headers: 
{
  Content-Type: application/json,
  Accept: application/json,
  Authorization: Bearer Token
}
```
```
Payload: 
```

```
OK Response: 
{
  "data": {
    "id": 1,
    "firstName": "Edward Iovanny",
    "lastName": "Delgado",
    "birthday": "1994-09-07",
    "email": "edward@dredward.site",
    "hiredDate": "2020-10-29",
    "banckAccountNumber": "xxxxxxxxxxxx1234",
    "salary": 20000,
    "deleted_at": null,
    "created_at": "2020-10-29T22:21:22.000000Z",
    "updated_at": "2020-10-29T22:21:45.000000Z",
    "full_name": "Edward Iovanny Delgado",
    "phone_formatted": "(618) 212 2364"
  },
  "message_type": "success",
  "message_text": "Deleted",
  "code": 200
}
```


### Insomnia Collections
Se puede obtener una colección completa con todos los endpoints por medio de los siguientes archivos:
* **DEV** - **[file](https://github.com/DR-Edward/Workers/blob/master/importation/dev/Insomnia_2020-10-29_dev.json)**
* **UAT** - **[file](https://github.com/DR-Edward/Workers/blob/master/importation/uat/Insomnia_2020-10-29_uat.json)**
