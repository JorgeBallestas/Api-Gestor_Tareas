# 🚀 Guía de Instalación - API Gestor de Tareas

Esta guía te ayudará a instalar y configurar la API en tu entorno local.

## 📋 Requisitos Previos

Antes de comenzar, asegúrate de tener instalado:

- **PHP 8.1 o superior**
- **Composer** (gestor de dependencias de PHP)
- **MySQL 5.7 o superior** (o MariaDB)
- **Git** (para clonar el repositorio)

## 🔧 Pasos de Instalación

### 1. Clonar o Descargar el Proyecto

Si tienes el proyecto en un repositorio Git:
```bash
git clone <url-del-repositorio>
cd ApiGestorTareas
```

Si descargaste el proyecto como ZIP, descomprímelo y navega a la carpeta:
```bash
cd ApiGestorTareas
```

### 2. Instalar Dependencias de PHP

Ejecuta Composer para instalar todas las dependencias del proyecto:
```bash
composer install
```

Este comando puede tardar unos minutos dependiendo de tu conexión a internet.

### 3. Configurar Variables de Entorno

Copia el archivo de ejemplo de configuración:
```bash
cp .env.example .env
```

Genera la clave de aplicación de Laravel:
```bash
php artisan key:generate
```

### 4. Configurar la Base de Datos

Abre el archivo `.env` con tu editor de texto favorito y configura los datos de tu base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=api_gestor_tareas
DB_USERNAME=tu_usuario_mysql
DB_PASSWORD=tu_contraseña_mysql
```

**Importante:** Asegúrate de crear la base de datos antes de continuar:

```sql
CREATE DATABASE api_gestor_tareas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Puedes crear la base de datos desde la línea de comandos de MySQL:
```bash
mysql -u root -p
```

Y luego ejecutar:
```sql
CREATE DATABASE api_gestor_tareas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

### 5. Ejecutar las Migraciones

Las migraciones crearán todas las tablas necesarias en tu base de datos:
```bash
php artisan migrate
```

Deberías ver un mensaje confirmando que las migraciones se ejecutaron correctamente.

### 6. (Opcional) Cargar Datos de Prueba

Si deseas cargar datos de prueba para probar la API:
```bash
php artisan db:seed
```

### 7. Iniciar el Servidor de Desarrollo

Inicia el servidor de desarrollo de Laravel:
```bash
php artisan serve
```

Por defecto, el servidor se iniciará en `http://localhost:8000`

Si el puerto 8000 está ocupado, puedes especificar otro puerto:
```bash
php artisan serve --port=8080
```

## ✅ Verificar la Instalación

Para verificar que la API está funcionando correctamente, abre tu navegador o usa una herramienta como Postman y accede a:

```
http://localhost:8000/api/auth/register
```

Si ves un error de método no permitido (405), significa que la API está funcionando correctamente (el endpoint espera un POST, no un GET).

## 🧪 Probar la API

### Usando cURL

**Registrar un usuario:**
```bash
curl -X POST http://localhost:8000/api/auth/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Usuario Prueba",
    "email": "prueba@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }'
```

**Iniciar sesión:**
```bash
curl -X POST http://localhost:8000/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "prueba@example.com",
    "password": "password123"
  }'
```

Guarda el token que recibes en la respuesta para usarlo en las siguientes peticiones.

### Usando Postman

1. Descarga e instala [Postman](https://www.postman.com/downloads/)
2. Crea una nueva colección llamada "API Gestor Tareas"
3. Agrega las peticiones siguiendo la documentación en `API_DOCUMENTATION.md`
4. Configura el token de autenticación en el header `Authorization: Bearer {tu_token}`

## 🔍 Solución de Problemas

### Error: "Class not found"
```bash
composer dump-autoload
```

### Error de permisos en storage o bootstrap/cache
```bash
chmod -R 775 storage bootstrap/cache
```

### Error de conexión a la base de datos
- Verifica que MySQL esté corriendo
- Confirma que las credenciales en `.env` sean correctas
- Asegúrate de que la base de datos exista

### Puerto 8000 ya en uso
```bash
php artisan serve --port=8080
```

## 📚 Siguientes Pasos

Una vez instalada la API:

1. Lee la documentación completa en `API_DOCUMENTATION.md`
2. Prueba todos los endpoints disponibles
3. Desarrolla el frontend que consumirá esta API (WebGestorTareas)

## 🆘 Soporte

Si encuentras algún problema durante la instalación, revisa:
- Los logs de Laravel en `storage/logs/laravel.log`
- La documentación oficial de Laravel: https://laravel.com/docs

---

**¡Felicidades! Tu API está lista para usarse.**
