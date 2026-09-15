---
title: "Sesión: Gestión Integral del Campus, Usuarios, Clases y Persistencia MySQL"
date: 2026-09-15
project: fedenowback
type: session
tags: [session, campus, mysql, usuarios, abm, video, auth, password-recovery, whatsapp]
---

# 🚀 Sesión: Gestión Integral del Campus, Usuarios, Clases y MySQL (2026-09-15)

## 🎯 Objetivos de la Sesión
1. **Depuración y Persistencia 100% MySQL:** Diagnosticar la carga de miembros en el campus, eliminar los datos dummy fallback y habilitar la persistencia íntegra de usuarios en `fede_users`.
2. **Corrección de Borrado y Edición (ABM):** Resolver el error de `ID de usuario inválido` asegurando que todos los registros utilicen IDs numéricos reales de MySQL.
3. **Mejoras en el Alta y Edición de Usuarios:**
   - Implementar visibilidad de contraseña con icono de ojito (👁️ / 🙈).
   - Agregar campo de confirmación de contraseña para evitar errores de tipeo.
   - Clarificar los formularios diferenciando Alta (contraseña requerida) vs Edición (dejar en blanco para mantener la actual).
   - Agregar selector de Plan de Membresía y fecha de caducidad con atajos rápidos (`+30 días`, `+90 días`, `+1 año`, `💎 Vitalicio`).
   - Generar enlace y mensaje preformateado para compartir accesos y credenciales por **WhatsApp**.
   - Implementar envío de correo HTML de bienvenida con credenciales.
4. **Directorio y Tabla de Usuarios Avanzada:**
   - Incorporar buscador interactivo en tiempo real por nombre, email, plan y rol.
   - Implementar ordenamiento por columnas (↕️).
   - Mostrar estado semántico de vigencia (*Activo*, *Por Vencer < 7 días*, *Vencido*, *Vitalicio*).
5. **Visualización y Prueba de Clases en la Academia:**
   - Listar todas las clases asociadas dentro de cada tarjeta de curso en el Panel Admin.
   - Incorporar botón **▶️ Ver / Probar Video** para previsualizar inmediatamente la clase en el reproductor modal.
   - Normalizar automáticamente URLs de YouTube (watch, embed y share `youtu.be/ID?si=...`).
6. **Autogestión de Contraseñas:**
   - Enlace *"¿Olvidaste tu contraseña?"* en el modal de login.
   - Modal y flujo para solicitar reseteo por email con token temporal seguro de 2 horas.
   - Modal para actualizar la contraseña con confirmación.

---

## 🛠️ Cambios Técnicos Implementados

### 1. Base de Datos & Migraciones (`website-php/includes/db.php`)
- Se agregaron las columnas `plan_id`, `plan_name`, `plan_expires_at`, `status`, `reset_token`, `reset_token_expires_at`, `email_verified`, `verification_token` a `fede_users`.
- Se implementó auto-migración no destructiva con `SHOW COLUMNS FROM fede_users` ejecutada en la conexión inicial `fede_db()`.
- Se agregó la función helper `fede_format_video_embed_url($url)` para normalizar URLs de YouTube, Vimeo, Loom y MP4.

### 2. Capa de Datos & Mail Helpers (`website-php/includes/community_store.php`)
- Se corrigió la consulta de `fede_settings` (`SELECT setting_key, setting_value`) que causaba una excepción PDO y provocaba el fallback a datos demo.
- Se enriqueció `fede_load_community_data()` para cargar todos los campos de usuarios desde MySQL y calcular el estado de vigencia y días restantes.
- Se implementaron las funciones de envío de correos HTML con estilo corporativo Fede Nowback:
  - `fede_send_welcome_user_email($email, $name, $password, $plan_name)`
  - `fede_send_reset_password_email($email, $name, $reset_url)`

### 3. API AJAX Backend (`website-php/public/comunidad_api.php`)
- `admin_save_user`: Manejo de campos completos (nombre, email, passwords con validación de coincidencia, plan, vencimiento, rol, puntos y envío de email).
- `admin_delete_user`: Validación de ID numérico y protección contra eliminación del superadmin `mfmujic@gmail.com`.
- `admin_save_lesson`: Normalización automática de URLs de video antes de persistir en MySQL.
- `auth_forgot_password` y `auth_reset_password`: Generación de tokens seguros, validación de caducidad y actualización de hash BCRYPT.

### 4. Vistas y Modales (`website-php/views/comunidad.php`)
- **Subtab Cursos:** Vista desplegable de clases dentro de cada curso con botón *▶️ Ver / Probar Video*, *✏️ Editar* y *🗑️ Borrar*.
- **Subtab Usuarios:** Toolbar con buscador en vivo, contador dinámico, ordenamiento interactivo y badges semánticos de vencimiento.
- **Modal Usuario (`modalAdminUser`):** Ojito toggle, confirmación de clave, selector de plan, fecha con atajos y botón WhatsApp.
- **Modales de Auth:** Eliminación de botones demo en login, link de recuperación, `modalForgotPassword` y `modalResetPassword`.

### 5. Controlador Frontend (`website-php/public/assets/js/campus.js`)
- Lógica de búsqueda en vivo en tabla, ordenamiento dinámico por columnas, toggles de visibilidad de contraseñas, generador de mensajes de WhatsApp y apertura automática de reseteo si la URL contiene `?reset_token=...`.

---

## 🧪 Pruebas y Verificación
- **Prueba CLI `test_backend.php`:** Conexión exitosa a MySQL, migración de esquema validada y carga de miembros con plan y vigencia correctos.
- **Prueba CLI `test_user_crud.php`:** Creación de usuario de prueba con BCRYPT, consulta, actualización de plan y eliminación limpia en `fede_users`.
- **Prueba de Normalización de Video:** `https://youtu.be/civfV2xxrNE?si=LAzH0-8x5IRmIWKh` $\rightarrow$ `https://www.youtube.com/embed/civfV2xxrNE`.

---

## 🔗 Nodos Relacionados
- [[nodes/base_de_datos]] — Esquema actualizado de `fede_users`.
- [[nodes/arquitectura_sistema]] — Controladores de API y frontend del campus.
- [[nodes/rutas_y_seo]] — Enrutamiento y vistas del campus.
