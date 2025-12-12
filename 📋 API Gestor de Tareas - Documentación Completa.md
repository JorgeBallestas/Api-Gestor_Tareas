# 📋 API Gestor de Tareas - Documentación Completa

API REST desarrollada en Laravel para la gestión de proyectos y tareas personales con autenticación de usuarios.

## 🚀 Características

- **Autenticación completa**: Registro, login, logout y gestión de sesiones con Laravel Sanctum
- **Gestión de proyectos**: CRUD completo (Crear, Leer, Actualizar, Eliminar)
- **Gestión de tareas**: CRUD completo con asignación a proyectos
- **Validaciones robustas**: Prevención de errores y validación de datos
- **Respuestas consistentes**: Formato JSON estandarizado para todas las respuestas
- **Aislamiento de datos**: Cada usuario solo puede acceder a sus propios proyectos y tareas
- **Paginación**: Listados paginados para mejor rendimiento
- **Progreso de proyectos**: Cálculo automático del porcentaje de tareas completadas

## 📖 Endpoints Disponibles

### Base URL
```
http://localhost:8000/api
```

### Autenticación

#### 1. Registro de Usuario
**Endpoint:** `POST /auth/register`

**Body:**
```json
{
  "name": "Juan Pérez",
  "email": "juan@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

**Respuesta exitosa (201):**
```json
{
  "success": true,
  "message": "Usuario registrado exitosamente",
  "data": {
    "user": {
      "id": 1,
      "name": "Juan Pérez",
      "email": "juan@example.com",
      "created_at": "2025-12-03 12:00:00"
    },
    "token": "1|abc123..."
  }
}
```

#### 2. Iniciar Sesión
**Endpoint:** `POST /auth/login`

**Body:**
```json
{
  "email": "juan@example.com",
  "password": "password123"
}
```

**Respuesta exitosa (200):**
```json
{
  "success": true,
  "message": "Inicio de sesión exitoso",
  "data": {
    "user": {
      "id": 1,
      "name": "Juan Pérez",
      "email": "juan@example.com",
      "created_at": "2025-12-03 12:00:00",
      "projects": []
    },
    "token": "2|xyz789..."
  }
}
```

#### 3. Cerrar Sesión
**Endpoint:** `POST /auth/logout`

**Headers:**
```
Authorization: Bearer {token}
```

**Respuesta exitosa (200):**
```json
{
  "success": true,
  "message": "Sesión cerrada exitosamente"
}
```

#### 4. Obtener Usuario Autenticado
**Endpoint:** `GET /auth/me`

**Headers:**
```
Authorization: Bearer {token}
```

### Proyectos

#### 5. Listar Proyectos
**Endpoint:** `GET /projects`

**Headers:**
```
Authorization: Bearer {token}
```

**Respuesta exitosa (200):**
```json
{
  "success": true,
  "data": {
    "projects": [
      {
        "id": 1,
        "name": "Proyecto Web",
        "description": "Desarrollo de sitio web corporativo",
        "is_archived": false,
        "progress": 50.0,
        "created_at": "2025-12-03 12:00:00",
        "updated_at": "2025-12-03 12:00:00",
        "tasks": []
      }
    ],
    "pagination": {
      "current_page": 1,
      "per_page": 15,
      "total": 1,
      "last_page": 1,
      "from": 1,
      "to": 1
    }
  }
}
```

#### 6. Crear Proyecto
**Endpoint:** `POST /projects`

**Headers:**
```
Authorization: Bearer {token}
Content-Type: application/json
```

**Body:**
```json
{
  "name": "Nuevo Proyecto",
  "description": "Descripción del proyecto",
  "is_archived": false
}
```

**Respuesta exitosa (201):**
```json
{
  "success": true,
  "message": "Proyecto creado exitosamente",
  "data": {
    "id": 2,
    "name": "Nuevo Proyecto",
    "description": "Descripción del proyecto",
    "is_archived": false,
    "progress": 0,
    "created_at": "2025-12-03 13:00:00",
    "updated_at": "2025-12-03 13:00:00"
  }
}
```

#### 7. Ver Proyecto Específico
**Endpoint:** `GET /projects/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

#### 8. Actualizar Proyecto
**Endpoint:** `PUT /projects/{id}`

**Headers:**
```
Authorization: Bearer {token}
Content-Type: application/json
```

**Body:**
```json
{
  "name": "Proyecto Actualizado",
  "description": "Nueva descripción",
  "is_archived": false
}
```

#### 9. Eliminar Proyecto
**Endpoint:** `DELETE /projects/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Respuesta exitosa (200):**
```json
{
  "success": true,
  "message": "Proyecto eliminado exitosamente"
}
```

### Tareas

#### 10. Listar Tareas
**Endpoint:** `GET /tasks`

**Headers:**
```
Authorization: Bearer {token}
```

**Query Parameters (opcionales):**
- `project_id`: Filtrar tareas por proyecto

**Ejemplo:**
```
GET /tasks?project_id=1
```

**Respuesta exitosa (200):**
```json
{
  "success": true,
  "data": {
    "tasks": [
      {
        "id": 1,
        "project_id": 1,
        "title": "Diseñar mockups",
        "due_date": "2025-12-15",
        "is_completed": false,
        "created_at": "2025-12-03 12:00:00",
        "updated_at": "2025-12-03 12:00:00"
      }
    ],
    "pagination": {
      "current_page": 1,
      "per_page": 15,
      "total": 1,
      "last_page": 1,
      "from": 1,
      "to": 1
    }
  }
}
```

#### 11. Crear Tarea
**Endpoint:** `POST /tasks`

**Headers:**
```
Authorization: Bearer {token}
Content-Type: application/json
```

**Body:**
```json
{
  "project_id": 1,
  "title": "Nueva tarea",
  "due_date": "2025-12-20",
  "is_completed": false
}
```

**Respuesta exitosa (201):**
```json
{
  "success": true,
  "message": "Tarea creada exitosamente",
  "data": {
    "id": 2,
    "project_id": 1,
    "title": "Nueva tarea",
    "due_date": "2025-12-20",
    "is_completed": false,
    "created_at": "2025-12-03 13:00:00",
    "updated_at": "2025-12-03 13:00:00"
  }
}
```

#### 12. Ver Tarea Específica
**Endpoint:** `GET /tasks/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

#### 13. Actualizar Tarea
**Endpoint:** `PUT /tasks/{id}`

**Headers:**
```
Authorization: Bearer {token}
Content-Type: application/json
```

**Body:**
```json
{
  "project_id": 1,
  "title": "Tarea actualizada",
  "due_date": "2025-12-25",
  "is_completed": false
}
```

#### 14. Marcar Tarea como Completada
**Endpoint:** `PUT /tasks/{id}/complete`

**Headers:**
```
Authorization: Bearer {token}
```

**Respuesta exitosa (200):**
```json
{
  "success": true,
  "message": "Tarea marcada como completada",
  "data": {
    "id": 1,
    "project_id": 1,
    "title": "Diseñar mockups",
    "due_date": "2025-12-15",
    "is_completed": true,
    "created_at": "2025-12-03 12:00:00",
    "updated_at": "2025-12-03 14:00:00"
  }
}
```

#### 15. Eliminar Tarea
**Endpoint:** `DELETE /tasks/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Respuesta exitosa (200):**
```json
{
  "success": true,
  "message": "Tarea eliminada exitosamente"
}
```

## 🔒 Códigos de Estado HTTP

- **200 OK**: Operación exitosa
- **201 Created**: Recurso creado exitosamente
- **400 Bad Request**: Datos de entrada inválidos
- **401 Unauthorized**: No autenticado o token inválido
- **403 Forbidden**: No tiene permisos para acceder al recurso
- **404 Not Found**: Recurso no encontrado
- **500 Internal Server Error**: Error del servidor

## 📝 Modelos de Datos

### User (Usuario)
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | integer | ID único |
| name | string | Nombre completo |
| email | string | Correo electrónico (único) |
| password | string | Contraseña (hasheada) |
| created_at | timestamp | Fecha de creación |
| updated_at | timestamp | Fecha de actualización |

### Project (Proyecto)
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | integer | ID único |
| user_id | integer | ID del usuario propietario |
| name | string | Nombre del proyecto |
| description | text | Descripción (opcional) |
| is_archived | boolean | Estado de archivado |
| created_at | timestamp | Fecha de creación |
| updated_at | timestamp | Fecha de actualización |

### Task (Tarea)
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | integer | ID único |
| project_id | integer | ID del proyecto |
| title | string | Título de la tarea |
| due_date | date | Fecha de vencimiento (opcional) |
| is_completed | boolean | Estado de completado |
| created_at | timestamp | Fecha de creación |
| updated_at | timestamp | Fecha de actualización |

## 🎯 Relaciones

- Un **Usuario** puede tener muchos **Proyectos** (1:N)
- Un **Proyecto** pertenece a un **Usuario** (N:1)
- Un **Proyecto** puede tener muchas **Tareas** (1:N)
- Una **Tarea** pertenece a un **Proyecto** (N:1)

---

**Proyecto desarrollado como material de formación para el programa de ADSO**
