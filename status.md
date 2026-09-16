# 📊 Estado del Proyecto — Fede Nowback (`v1.1.0`)

**Última actualización:** 2026-09-15  
**Rama activa:** `main` / `dev`  
**Deploy en Producción:** ✅ Activo (`18d09b7`)  
**Servidor Dev:** ✅ Activo en `:8015` y `:8011`  
**LLM Wiki 3 Capas:** ✅ 100% Estandarizada e Indexada en Grafo 3D  

---

## 🎯 Tareas Completadas (v1.1.0 - Gestión Campus, Auth, Clases & MySQL)
- [x] **Auth & Login:** Remoción de botones demo residuales del modal de acceso.
- [x] **Seguridad de Contraseñas:** Toggle de visibilidad (ojo 👁️), confirmación de contraseña, hash `PASSWORD_BCRYPT`.
- [x] **Gestión de Planes y Vencimientos:** Selector de planes (`Gratuito`, `Pro`, `Mentoría VIP`, `Vitalicio`), atajos de vigencia (+30d, +90d, +1y, Vitalicio), etiquetas semánticas de caducidad.
- [x] **Cuentas Administrador:** Acceso total ilimitado sin requerir plan ni caducidad, ocultando la sección en modales y badges claros en tablas.
- [x] **Módulo "Mi Perfil & Avatar":** Modal para todos los miembros con carga y compresión inteligente en Canvas de avatar, guardado en disco del servidor, nombre, handle único, bio, intereses, redes y cambio de clave.
- [x] **Unicidad de Handles:** Deduplicación automática en MySQL (`@fedenowback` exclusivo para Fede, `@mfmujic` para Marcelo Mujica) y validación en tiempo real.
- [x] **Herramienta WhatsApp:** Modal y botón `📋 Copiar Mensaje` con credenciales completas y contraseña asignada sin errores de codificación.
- [x] **Blindaje de Sesión:** Eliminación definitiva del switcher de rol demo y sincronización estricta de sesión en tiempo real contra MySQL (`fede_users`).
- [x] **Notificaciones y Accesos:** Envío de correo de bienvenida y generador de mensaje con link directo a WhatsApp con un solo clic.
- [x] **Recuperación de Contraseña:** Flujo completo de "¿Olvidaste tu contraseña?" y "Cambiar Contraseña" mediante tokens seguros SHA-256 (`reset_token`).
- [x] **MySQL Fix & Persistencia Real:** Corrección del error de fetch en `community_store.php`, migración DDL automática de columnas en `fede_users` y eliminación segura de usuarios con protección de superadmin.
- [x] **Búsqueda & Ordenamiento:** Búsqueda en vivo y ordenamiento ascendente/descendente por columnas en la tabla de miembros del admin.
- [x] **Gestión de Academia & Clases:** Listado interactivo de clases cargadas por curso en el Admin con preview modal de video (`▶️ Ver / Probar Video`).
- [x] **Soporte YouTube:** Normalización automática de URLs cortas (`youtu.be/ID`) y estándar a formato `embed/ID`.
- [x] **Avatares de Usuarios & Alumnos:** Eliminación de la foto de Fede de la galería de avatares predefinidos para alumnos; asignación automática y aleatoria de avatares de la comunidad al registrarse o darse de alta en el sistema, preservando el avatar oficial exclusivo para Fede Nowback.
- [x] **Programación de Meets & Sesiones Recurrentes:** Corrección integral del guardado de sesiones en vivo en MySQL con soporte de frecuencia recurrente (Semanal / Quincenal / Mensual / Puntual), selección de día de la semana, integración directa con Google Meet / Zoom y generación automática de enlaces para Google Calendar.
- [x] **Acceso a Perfil & Cierre de Sesión:** Botones visibles y accesibles permanentemente de `👤 Mi Perfil` y `🚪 Salir / Cerrar Sesión` integrados en la barra de navegación principal (`campus-nav-bar`) y en la barra superior de administrador (`campus-admin-topbar`).
- [x] **Grupo VIP de WhatsApp en el Muro:** Banner destacado en el muro y widget lateral exclusivo para miembros registrados y alumnos con enlace directo al grupo oficial de WhatsApp (`https://chat.whatsapp.com/EUM0qZSn8l7EDkjA7GDq8F`).
- [x] **Carga de Foto de Portada para Cursos:** Selector de archivo (`📁 Subir Foto de Portada`) con previsualización en vivo, compresión en Canvas y guardado permanente en disco (`/assets/uploads/courses/`) al crear o editar cursos en la Academia.

---

## 🎯 Tareas Previas Completadas (v1.0.0 & Expansión Comercial)
- [x] Extracción y desacople del monolito `estudio-pericial-sur`.
- [x] Creación de arquitectura modular independiente en `/home/mfmujic/fedenowback/`.
- [x] Creación de front controller en `public/index.php` con ruteo limpio.
- [x] Desarrollo de landings SEO de alta conversión:
  - [x] Home / Hub Central (`/`)
  - [x] Evento Presencial "Encendé tu Fuego" (`/encende-tu-fuego`)
  - [x] Mentorías & Programas (`/mentorias`)
  - [x] Bio / Sobre Mí (`/sobre-mi`)
  - [x] Contacto & WhatsApp (`/contacto`)
  - [x] Campus Fede Nowback Pro (`/comunidad`)
- [x] Helper SEO dinámico (`includes/seo_helper.php`) con OpenGraph, Twitter Cards y Schema.org JSON-LD.
- [x] Base de datos MySQL `fedenowback_db` creada y configurada en Dev y Prod.
- [x] Repositorio Git inicializado y sincronizado en `elbuje/fedenowback`.
- [x] Sitio creado y desplegado en Ploi (`errante` - Site ID `406351`).
- [x] Configuración de auto-inicio en `start-dev-servers.sh` y registro en `PORT_REGISTRY.md`.
- [x] Estandarización total de LLM Wiki bajo arquitectura de 3 capas con frontmatter YAML y guías operativas.
- [x] Landing comercial en PHP liviano autónomo (`website-php/views/tecnobrain-campus-virtual.php`) respetando manual de marca Tecnobrain, flyer oficial de precios y preservando 100% intacto el código de `tecnobrain`.
- [x] Estrategia de 4 publicaciones recurrentes enfocadas en "Herramienta Completa" para Instagram, Facebook, LinkedIn y Google.
- [x] Generación de 4 activos visuales fotorrealistas en alta resolución (speaker en escenario, mentor en estudio, mockup en monitor de la comunidad real con Muro/Meets/Recursos y conferencista ejecutiva).
- [x] Programación automatizada de las 24 publicaciones del calendario de 3 meses en el planificador de Metricool.
- [x] Publicación inmediata de la Pieza 3 ("El Campus por Dentro") en Metricool (Post ID: 374960975) con imagen normalizada en Instagram, Facebook, LinkedIn y GMB.

---

## ⏳ Backlog / Próximas Tareas
- [ ] Emisión de certificado SSL Let's Encrypt en Ploi (ventana de rate limit finaliza a las `01:25:46 UTC`).
- [ ] Deploy a producción en Ploi de los módulos de Campus y Gestión de Usuarios MySQL.
- [ ] Alta en Google Search Console y envío de `https://fedenowback.com.ar/sitemap.xml`.
- [ ] Integración de Google Analytics / Pixel de Meta.
- [ ] Limpieza de vistas residuales de fedenowback en el repositorio `estudio-pericias`.
