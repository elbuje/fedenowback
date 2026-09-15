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

7. **Gestión de Administradores vs Alumnos:**
   - Los usuarios con rol `admin` no requieren asignación de plan ni fecha de vencimiento.
   - En la tabla de administración se identifican como `👑 Acceso Total (Admin)` y vigencia `💎 Ilimitado`.
   - En los modales de alta/edición, al seleccionar Administrador se oculta automáticamente la sección de planes y se muestra el aviso de Acceso Total.
8. **Generador y Copiador de Mensajes de WhatsApp:**
   - Modal interactivo `modalWhatsAppShare` con el texto listo para copiar al portapapeles (`📋 Copiar Mensaje`) y enlace directo `🟢 Abrir en WhatsApp`.
   - Incluye automáticamente el nombre, correo, plan (o acceso admin), enlace al campus y la **contraseña asignada/modificada**.
   - Solución definitiva a caracteres unicode/emojis corruptos (eliminación de artefactos `` o signos de pregunta).
9. **Unicidad de Nombre de Usuario / Handle (`@usuario`):**
   - Validación y deduplicación automática de handles para evitar usuarios duplicados (ej: `@fedenowback` único para Fede, y `@mfmujic` para Marcelo Mujica).
   - Campo editable de `@usuario` en el alta/edición de usuarios del panel admin y en "Mi Perfil".
10. **Módulo Completo "Mi Perfil & Avatar":**
    - Modal accesible para todos los usuarios (alumnos y admins) con contraste óptimo en el menú desplegable.
    - Carga de foto de perfil personalizada (selector de archivo hasta 3MB) y presets de avatares.
    - Campos de Nombre, Usuario (@handle), Biografía/Descripción, Intereses/Nicho, Instagram, LinkedIn/Web y cambio seguro de contraseña.
11. **Corrección de Apertura del Modal "Mi Perfil":**
    - Se corrigió la estructura HTML donde `modalMyProfile` había quedado accidentalmente dentro del contenedor cerrado de `modalResetPassword`.
    - Se agregó cache-busting dinámico por timestamp a `campus.js` para asegurar que el navegador cargue inmediatamente el código actualizado.
12. **Blindaje de Roles & Eliminación de Switcher Demo:**
    - Se eliminó por completo el botón y endpoint de prueba `switch_role` que permitía alternar roles.
    - Se implementó sincronización en tiempo real de sesión contra MySQL (`fede_users`) en cada petición, impidiendo que un usuario mantenga o suplante permisos de administrador.

---

## 🛠️ Cambios Técnicos Implementados

### 1. Base de Datos & Migraciones (`website-php/includes/db.php`)
- Columnas agregadas a `fede_users`: `bio`, `interests`, `instagram`, `linkedin`, `website`, `plan_id`, `plan_name`, `plan_expires_at`, `status`, `reset_token`, `reset_token_expires_at`, `email_verified`, `verification_token`.
- Deduplicación automática de handles en el inicio para garantizar unicidad.
- Auto-migración no destructiva con `SHOW COLUMNS FROM fede_users`.

### 2. Capa de Datos & Mail Helpers (`website-php/includes/community_store.php`)
- `fede_load_community_data()` con soporte para usuarios admin sin vencimiento y badges con contraste claro.
- Envío de correos HTML de bienvenida y reseteo de claves.

### 3. API AJAX Backend (`website-php/public/comunidad_api.php`)
- `get_my_profile` y `update_my_profile`: Lectura y actualización de perfil, bio, intereses, redes, avatar y cambio de contraseña con validación de handle único.
- `admin_save_user`: Forzado de plan nulo / `Acceso Total (Admin)` para administradores y validación de unicidad de handle.

### 4. Vistas y Modales (`website-php/views/comunidad.php`)
- `modalMyProfile`: Modal completo de edición de perfil.
- `modalWhatsAppShare`: Modal generador de mensaje con copia al portapapeles.
- Mejora de contraste en el menú desplegable del avatar (texto blanco legible).

---

## 🔗 Nodos Relacionados
- [[nodes/base_de_datos]] — Esquema actualizado de `fede_users`.
- [[nodes/arquitectura_sistema]] — Controladores de API y frontend del campus.
- [[nodes/rutas_y_seo]] — Enrutamiento y vistas del campus.
