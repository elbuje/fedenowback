---
title: Base de Datos y Modelos — Fede Nowback
project: fedenowback
type: node
tags: [database, mysql, schema, migrations, backend]
---

# 🗄️ Base de Datos — Fede Nowback

## 1. Conexión y Credenciales
- **Motor:** MySQL 8.x / MariaDB
- **Nombre de BD:** `fedenowback_db`
- **Usuario:** `fedenowback_user`
- **Charset:** `utf8mb4` / Collation: `utf8mb4_unicode_ci`

## 2. Tablas Principales
El script `website-php/includes/db.php` (`fede_db_init_schema()`) crea automáticamente las siguientes tablas:
- `fede_users`: Alumnos y miembros del campus (email, password hash, role, score, avatar).
- `fede_modules`: Módulos de cursos y lecciones.
- `fede_discussions`: Foros y debates de la comunidad.
- `fede_comments`: Respuestas a los debates.
- `fede_events`: Registro y reservas para eventos presenciales y online.

---

## 🔗 Nodos Relacionados
- [[nodes/arquitectura_sistema]] — Estructura modular y componentes de acceso a datos.
- [[nodes/despliegue_y_ploi]] — Ejecución de migraciones en el proceso de deploy.
