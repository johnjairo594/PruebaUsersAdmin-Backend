# Proyecto Laravel con Docker

Este proyecto es una API REST construida con Laravel y contenerizada usando Docker. Usa MySQL como base de datos y Nginx como servidor web.

## Requisitos

- [Docker](https://www.docker.com/) instalado
- [Docker Compose](https://docs.docker.com/compose/) instalado

---

## Servicios

Este proyecto levanta los siguientes contenedores:

| Servicio  | Descripción                         |
|-----------|-------------------------------------|
| **laravel** | Contenedor PHP con Laravel         |
| **mysql**   | Base de datos MySQL 8              |
| **nginx**   | Servidor web Nginx                 |

---

## Levantar el proyecto

1. Clonar el repositorio:

   ```
   git clone https://github.com/johnjairo594/PruebaUsersAdmin-Backend.git
    ```

2. Construir y levantar los contenedores
    ``` 
    docker compose up -d --build
    ```

## Configuración inicial

Una vez levantado el entorno, accede al contenedor PHP para ejecutar los comandos de configuración:

1. Para ver los contenedores en ejecución
    ```
    docker ps
    ```
2. Ingresar al contenedor de Laravel
    ```
    docker exec -it [nombre_contenedor_laravel] bash
    ```
3. Copiar la variable de entorno
    ```
    cp .env.example .env
    ```
4. Generar Keys:
    ```
    php artisan key:generate
    ```
5. Ejecutar las migraciones:
    ```
    php artisan migrate
    ```
6. Ejecutar los seeders:
    ```
    php artisan db:seed
    ```
7. Verificar las rutas disponibles:
    ```
    php artisan route:list
    ```

## Consideraciones Adicionales
El api por defecto estará disponible en:
```
http://localhost:8080
```

El puerto expuesto por defecto para la conexión a la base de datos es: 
    ``` 
    3308
    ```