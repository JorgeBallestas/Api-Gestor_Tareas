# 📇 API Gestor de Tareas

API REST desarrollada en **Laravel 10** para la gestión de tareas personales con endpoints CRUD completos.

---

## 🚀 Características

- **Gestión completa de tareas:** Crear, Leer, Actualizar y Eliminar tareas  
- **Validaciones robustas:** Prevención de errores y validación de datos requeridos  
- **Asignación de estados:** Las tareas pueden tener estados como pendiente, en progreso o completada  
- **Búsqueda y filtrado:** Buscar tareas por título, descripción o estado  
- **Respuestas consistentes:** Formato JSON estandarizado para todas las respuestas  
- **Paginación:** Listados paginados para mejor rendimiento  
- **Tests automatizados:** Cobertura de funcionalidades con PHPUnit  

---

## 🛠️ Tecnologías Utilizadas

- **Laravel 10:** Framework PHP principal  
- **MySQL:** Base de datos relacional  
- **PHPUnit:** Framework de testing  
- **Eloquent ORM:** Manejo de base de datos  

---

## 📋 Requisitos

- PHP 8.1 o superior  
- Composer  
- MySQL 5.7 o superior  
- Laravel 10.x  

---

## ⚡ Instalación Rápida

1. **Clonar el repositorio**

```bash
git clone https://github.com/JorgeBallestas/Api-Gestor_Tareas.git
cd Api-Gestor_Tareas
Instalar dependencias

bash
Copiar código
composer install
Configurar entorno

bash
Copiar código
cp .env.example .env
php artisan key:generate
Editar .env y configurar la base de datos:

ini
Copiar código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_db
DB_USERNAME=usuario
DB_PASSWORD=contraseña
Ejecutar migraciones

bash
Copiar código
php artisan migrate
Cargar datos de prueba (opcional)

bash
Copiar código
php artisan db:seed
Iniciar servidor

bash
Copiar código
php artisan serve
La API estará disponible en http://127.0.0.1:8000.

📖 Documentación de Endpoints

Tareas
Método	Ruta	Descripción
GET	/api/tasks	Listar todas las tareas
GET	/api/tasks/{id}	Obtener una tarea por ID
POST	/api/tasks	Crear una nueva tarea
PUT	/api/tasks/{id}	Actualizar una tarea
DELETE	/api/tasks/{id}	Eliminar una tarea

(Consulta API_DOCUMENTATION.md para más detalles de cada endpoint y ejemplos de uso)

🧪 Testing
Ejecutar tests automatizados con:

bash
Copiar código
php artisan test

💾 Datos de Prueba
Puedes agregar tareas de prueba usando seeders o manualmente en la base de datos.

🔒 Validaciones Implementadas
Cada tarea debe tener título obligatorio

Validación de longitud de campos

Estado de la tarea solo puede ser: pendiente, en progreso o completada

👤 Autor
Jorge Ballestas
GitHub

css
Copiar código

Si quieres, puedo hacer **una versión aún más profesional con badges de estado, build y cobertura de tests**, como los que se usan en GitHub para proyectos open-source, que queda lista para mostrar a cualquier persona que vea tu repo.  

¿Quieres que haga esa versión también?


📄 Licencia

Proyecto de uso académico y educativo.

```bash
(https://github.com/JorgeBallestas/Api-Gestor_Tareas.git)


