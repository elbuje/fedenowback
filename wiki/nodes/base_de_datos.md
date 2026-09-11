# 🗄️ Base de Datos — Fede Nowback

## 1. Conexión y Credenciales
- **Motor:** MySQL 8.x
- **Nombre de BD:** `fedenowback_db`
- **Usuario:** `fedenowback_user`
- **Password:** `NowbackFuego2026_SecurePass!`
- **Charset:** `utf8mb4` / Collation: `utf8mb4_unicode_ci`

## 2. Tablas Principales
El script `includes/db.php` (`fede_db_init_schema()`) crea automáticamente las siguientes tablas:
- `fede_users`: Alumnos y miembros del campus (email, password hash, role, score, avatar).
- `fede_modules`: Módulos de cursos y lecciones.
- `fede_discussions`: Foros y debates de la comunidad.
- `fede_comments`: Respuestas a los debates.
- `fede_events`: Registro y reservas para eventos presenciales y online.
