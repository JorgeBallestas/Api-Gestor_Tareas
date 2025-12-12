# Api-Gestor_Tareas

API REST para la **gestión de tareas**, desarrollada con **Laravel 10** y **PHP 8.x**. Permite crear, leer, actualizar y eliminar tareas de manera sencilla y segura. Ideal para aplicaciones de productividad o administración de tareas.

---

## 📌 Características

- CRUD completo de tareas (Create, Read, Update, Delete)
- Autenticación de usuarios (opcional según configuración)
- Documentación de API incluida
- Estructura modular y escalable
- Tests unitarios y funcionales incluidos

---

## 🛠 Requisitos

- PHP >= 8.1
- Composer
- MySQL o base de datos compatible
- Node.js y npm (para assets si aplica)
- Laravel 10

---

## ⚡ Instalación

1. **Clonar el repositorio**

```bash
git clone https://github.com/JorgeBallestas/Api-Gestor_Tareas.git
cd Api-Gestor_Tareas
Instalar dependencias de PHP

bash
Copiar código
composer install
Instalar dependencias de Node.js (si aplica)

bash
Copiar código
npm install
npm run build
Configurar variables de entorno

bash
Copiar código
cp .env.example .env
Editar .env y configurar la base de datos:

ini
Copiar código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_db
DB_USERNAME=usuario
DB_PASSWORD=contraseña
Generar clave de aplicación

bash
Copiar código
php artisan key:generate
Migrar la base de datos

bash
Copiar código
php artisan migrate
php artisan db:seed  # Opcional, si hay seeders
Ejecutar la aplicación

bash
Copiar código
php artisan serve
La API estará disponible en http://127.0.0.1:8000.

📂 Estructura del proyecto
app/ → Controladores, modelos y lógica de negocio

routes/ → Definición de rutas (api.php y web.php)

database/ → Migraciones, seeders y factories

resources/ → Vistas y recursos (si aplica)

tests/ → Tests unitarios y funcionales

public/ → Document root (index.php, assets)

🔗 Endpoints principales
Tareas
Método	Ruta	Descripción
GET	/api/tasks	Listar todas las tareas
GET	/api/tasks/{id}	Obtener una tarea por ID
POST	/api/tasks	Crear una nueva tarea
PUT	/api/tasks/{id}	Actualizar una tarea
DELETE	/api/tasks/{id}	Eliminar una tarea

(Ver API_DOCUMENTATION.md para más detalles de cada endpoint)

🧪 Tests
Ejecutar tests unitarios y funcionales con:

bash
Copiar código
php artisan test
📚 Recursos adicionales
Documentación oficial Laravel

Documentación completa de la API

📝 Notas
Asegúrate de tener las extensiones de PHP necesarias: pdo, mbstring, openssl, tokenizer, json

Los endpoints utilizan formato JSON para requests y responses

Puedes extender la API con autenticación, roles de usuario o integración con frontend

👤 Autor
Jorge Ballestas
GitHub

📄 Licencia

Proyecto de uso académico y educativo.

```bash
git clone https://github.com/JorgeBallestas/Api-Gestor_Tareas.git


