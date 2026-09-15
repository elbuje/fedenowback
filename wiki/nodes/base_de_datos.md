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
El script `website-php/includes/db.php` (`fede_db_init_schema()`) crea y migra automáticamente las siguientes tablas en MySQL:
- `fede_users`: Alumnos y miembros del campus (`id`, `email`, `password_hash`, `name`, `handle`, `avatar` (MEDIUMTEXT/file upload), `bio`, `interests`, `instagram`, `linkedin`, `website`, `role`, `points`, `level`, `plan_id`, `plan_name`, `plan_expires_at`, `status`, `reset_token`, `reset_token_expires_at`, `email_verified`).
- `fede_courses`: Cursos de la academia (`id`, `title`, `slug`, `thumbnail`, `duration`, `level_required`, `description`).
- `fede_modules`: Módulos agrupadores de clases (`id`, `course_id`, `title`, `order_num`).
- `fede_lessons`: Clases y videos embebidos (`id`, `module_id`, `title`, `duration`, `video_url`, `description`, `is_free`).
- `fede_posts` & `fede_comments`: Muro social, debates comunitarios y respuestas.
- `fede_post_likes`: Registro único de reacciones/fuegos por usuario y post.
- `fede_meets`: Sesiones en vivo, mentorías grupales, enlaces Zoom y Google Calendar.
- `fede_plans`: Planes de suscripción y precios (`price_ars`, `price_usd`, `period`, `checkout_url`).
- `fede_settings`: Configuración clave-valor del sistema (toggle de gamificación, nombre, WhatsApp de soporte).
- `fede_chat_messages`: Mensajes de la sala de chat en tiempo real.

---

## 🔗 Nodos Relacionados
- [[nodes/arquitectura_sistema]] — Estructura modular y componentes de acceso a datos.
- [[nodes/despliegue_y_ploi]] — Ejecución de migraciones en el proceso de deploy.
