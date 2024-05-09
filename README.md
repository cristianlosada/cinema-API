# Proyecto Laravel de Cine

Esta es una API de Laravel diseñada para proporcionar acceso a información relacionada con películas, actores y directores. La API permite a los desarrolladores realizar diversas acciones relacionadas con el cine, como obtener detalles de películas, listar actores, agregar nuevas películas, etc.

## Requisitos del Sistema

- PHP >= 8.2
- Composer
- Servidor web (por ejemplo, Apache, Nginx)
- MySQL o cualquier otro sistema de gestión de bases de datos compatible

## Instalación

1. Clona el repositorio a tu máquina local:

    ```bash
    git clone https://github.com/tu-usuario/proyecto-laravel-cine.git
    ```

2. Accede al directorio del proyecto:

    ```bash
    cd proyecto-laravel-cine
    ```

3. Instala las dependencias del proyecto utilizando Composer:

    ```bash
    composer install
    ```

4. Copia el archivo de configuración de entorno y configura las variables de entorno necesarias:

    ```bash
    cp .env.example .env
    ```

5. Genera la clave de aplicación:

    ```bash
    php artisan key:generate
    ```

6. Configura la conexión a la base de datos en el archivo `.env`:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=usuario_de_tu_base_de_datos
    DB_PASSWORD=contraseña_de_tu_base_de_datos
    ```

7. Inicia el servidor de desarrollo:

    ```bash
    php artisan serve
    ```

10. Accede a tu aplicación en tu navegador web en la URL `http://localhost:8000`.

## Contribución

Si deseas contribuir a este proyecto, sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama para tu funcionalidad: `git checkout -b feature/nueva-funcionalidad`.
3. Realiza tus cambios y realiza un commit: `git commit -m "Añadir nueva funcionalidad"`.
4. Sube tu rama al repositorio remoto: `git push origin feature/nueva-funcionalidad`.
5. Abre un pull request en GitHub.

## Licencia

Este proyecto está bajo la licencia [MIT](LICENSE).
