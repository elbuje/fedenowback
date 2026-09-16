---
title: Sesión — Campus Pro: Meets Recurrentes, Avatares, Carga de Portadas y Protección Grupo WhatsApp
date: 2026-09-16
project: fedenowback
type: session
tags: [campus, meets, zoom, recurrente, avatars, courses, uploads, whatsapp-security, auth, mysql]
---

# 🚀 Sesión: Campus Pro — Meets Recurrentes, Avatares, Portadas y Protección de WhatsApp

**Fecha:** 16 de Septiembre de 2026  
**Rama:** `main`  
**Deploy Git:** `75a1f3a`  
**Estado:** ✅ Completado y Sincronizado en Producción

---

## 🎯 Objetivos de la Sesión

1. **Gestión de Avatares:** Excluir la fotografía oficial de Fede Nowback de los avatares predeterminados para alumnos y asignar avatares limpios y aleatorios al registrar usuarios.
2. **Programación de Meets Recurrentes:** Solucionar el guardado de `meet_date` / `meet_time` en MySQL, añadir soporte para sesiones recurrentes (semanal, quincenal, mensual) y enlaces directos a Google Calendar y videollamada (Google Meet / Zoom).
3. **Visibilidad de Cierre de Sesión y Perfil:** Asegurar que los botones `👤 Mi Perfil` y `🚪 Salir` estén accesibles y visibles en todo momento desde la barra de navegación y el topbar del admin.
4. **Carga de Portadas para Cursos:** Implementar selector de archivo, previsualización en vivo, compresión en Canvas del cliente y almacenamiento persistente en el servidor (`/assets/uploads/courses/`).
5. **Protección del Grupo VIP de WhatsApp:** Blindar el enlace del grupo privado de WhatsApp (`https://chat.whatsapp.com/EUM0qZSn8l7EDkjA7GDq8F`) para que solo sea accesible por usuarios autenticados, mostrando un botón con candado (`🔒 Acceso Alumnos`) para visitantes no logueados.

---

## 🛠️ Implementaciones & Decisiones Técnicas

### 1. Avatares de Alumnos y Exclusividad del Avatar de Fede
- Se limpió el array de avatares predeterminados en `includes/db.php` y `includes/community_store.php` para que la imagen personal de Fede no sea asignada a nuevos estudiantes.
- Al dar de alta un usuario o registrarse desde la web, el backend selecciona aleatoriamente un avatar neutral de alta calidad.
- La foto oficial de Fede quedó reservada y fija para la cuenta de Fede Nowback (`@fedenowback`).

### 2. Módulo de Meets en Vivo & Recurrencia en Calendario
- Se corrigió el mapeo de nombres de campos en `public/comunidad_api.php` y `public/assets/js/campus.js` para asegurar que `date` y `time` persistan correctamente en `fede_meets`.
- Se añadieron campos para recurrencia (`is_recurring`, `recurrence_type`, `recurrence_day`).
- Se implementó el botón `📅 Agendar` con generación dinámica de URL para Google Calendar y el botón `📹 Unirme a la Clase en Vivo` con enlace directo a Google Meet o Zoom.

### 3. Accesibilidad de Perfil y Logout
- Se integraron los accesos directos `👤 Mi Perfil` y `🚪 Salir` en la barra superior de administración (`campus-admin-topbar`) y en la barra de navegación del campus (`campus-nav-bar`).
- Se vinculó la función `fedeLogout()` para limpiar la sesión en backend y refrescar la vista.

### 4. Carga y Persistencia de Portadas de Cursos
- Se creó el directorio `/website-php/public/assets/uploads/courses/` con permisos de escritura.
- En el modal de creación y edición de cursos de la Academia, se implementó el selector de archivo (`📁 Subir Foto de Portada`) con previsualización inmediata y compresión automática vía HTML5 Canvas.
- El endpoint `save_course` en `public/comunidad_api.php` decodifica la imagen Base64, la guarda en disco con un nombre único sanitizado y almacena la ruta web en la base de datos.

### 5. Blindaje y Privacidad del Grupo VIP de WhatsApp
- **Visitantes (No Logueados):**
  - Tanto en el banner superior de la comunidad como en el widget lateral, el enlace directo queda completamente oculto.
  - Se visualiza un botón con candado: `🔒 Acceso Alumnos / Miembros`.
  - Al hacer clic, se abre el modal de inicio de sesión informando que el grupo es exclusivo para miembros registrados.
- **Alumnos y Administradores (Logueados):**
  - Se muestran los botones en verde con el enlace directo al grupo (`https://chat.whatsapp.com/EUM0qZSn8l7EDkjA7GDq8F`).

---

## 📂 Archivos Modificados

- `website-php/views/comunidad.php` — Banners y widgets protegidos con candado, inputs de portada, modales de meet recurrente y botones de perfil/logout.
- `website-php/public/assets/js/campus.js` — Lógica de previsualización de portadas, compresión en Canvas, modales y logout global.
- `website-php/public/comunidad_api.php` — API endpoints para recurrencia de meets, subida de portadas a disco y asignación aleatoria de avatares.
- `website-php/includes/community_store.php` — Lógica de almacenamiento y migración de esquemas.
- `website-php/includes/db.php` — Catálogo de avatares limpios y estructura DDL de la base de datos.
- `status.md` — Actualización del estado del proyecto.

---

## 📌 Próximos Pasos & Backlog

- [ ] Deploy a producción en Ploi (`errante`) para verificar en vivo el nuevo sistema de portadas, meets y protección de WhatsApp.
- [ ] Alta en Google Search Console y envío de `sitemap.xml`.
- [ ] Integración de Pixel de Meta / Google Tag Manager.
