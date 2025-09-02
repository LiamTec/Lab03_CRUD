# Despliegue de CRUD Laravel con Docker en Ubuntu

## Descripción
Este proyecto implementa un CRUD básico en Laravel, desplegado usando Docker y Docker Compose con Apache, PHP y MySQL. La imagen de la aplicación está publicada en Docker Hub para facilitar el despliegue en cualquier entorno.

---

## Instalaciones necesarias en Ubuntu

1. **Instalar Docker y Docker Compose:**
   ```bash
   sudo apt update
   sudo apt install ca-certificates curl gnupg -y
   sudo install -m 0755 -d /etc/apt/keyrings
   curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
   echo \
     "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
     $(lsb_release -cs) stable" | \
     sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
   sudo apt update
   sudo apt install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin -y
   ```

2. **Verificar instalación:**
   ```bash
   sudo docker --version
   sudo docker compose version
   ```

---

## Archivos Docker usados

- **Dockerfile**: Define cómo construir la imagen de la aplicación Laravel con Apache y PHP.
- **docker-compose.yml**: Orquesta los servicios de la aplicación (`app`) y la base de datos (`db`), incluyendo variables de entorno y volúmenes.

---

## Imagen Docker Hub

- **App:** `liamtec/crud-laravel-app:latest`
- **Base de datos:** `mysql:8.0` (oficial)

---

## Pasos realizados en Ubuntu

1. **Copia el archivo `docker-compose.yml` al servidor Ubuntu**
   - Puedes hacerlo manualmente, por USB, SCP, etc.

2. **Descarga la imagen de la app desde Docker Hub**
   ```bash
   sudo docker pull liamtec/crud-laravel-app:latest
   ```

3. **Levanta el entorno con Docker Compose**
   ```bash
   sudo docker compose up
   ```

4. **Accede a la aplicación**
   - Abre `http://localhost:8080` en el navegador de Ubuntu.

---

## Explicación de los archivos Docker

- **docker-compose.yml**
  - Define dos servicios:
    - `app`: Usa la imagen de Docker Hub, expone el puerto 8080, espera 15 segundos antes de ejecutar migraciones para asegurar que MySQL esté listo.
    - `db`: Usa la imagen oficial de MySQL, expone el puerto 3306 y persiste los datos en un volumen.
  - Variables de entorno configuran la conexión entre Laravel y MySQL.

- **Dockerfile**
  - Parte de `php:8.2-apache`.
  - Instala dependencias de PHP y Composer.
  - Copia el código de Laravel.
  - Configura Apache para servir la app desde `/var/www/html/public`.

---

## Uso de Docker Hub

- La imagen `liamtec/crud-laravel-app:latest` está publicada en Docker Hub.
- Puedes descargarla en cualquier servidor con Docker usando:
  ```bash
  sudo docker pull liamtec/crud-laravel-app:latest
  ```
- El archivo `docker-compose.yml` la usará automáticamente para levantar el entorno.

---

## Notas finales

- No es necesario instalar Apache, PHP, MySQL ni Laravel en Ubuntu; todo está contenido en los servicios Docker.
- Puedes actualizar la imagen de la app reconstruyendo y subiendo una nueva versión a Docker Hub.
- El entorno es portable y reproducible en cualquier máquina con Docker y Docker Compose.

---

**Autor:** LiamTec
