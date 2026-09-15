---
title: Bitácora de Cambios — Fede Nowback
project: fedenowback
type: log
tags: [log, changelog, history, fedenowback]
---

# 🪵 Bitácora de Cambios (Log) — Fede Nowback

## [2026-09-15] - Gestión Integral Campus: Usuarios, Planes, Recuperación, Clases y MySQL
- **FEAT:** ABM completo de usuarios en Campus (`fede_users`) con selector de planes (Gratuito, Pro, Mentoria VIP, Vitalicio), cálculo de vencimientos automáticos (+30d, +90d, +1y), estados semánticos y badges de caducidad.
- **SECURITY:** Campos de confirmación de contraseña, toggles de visualización con ojo (👁️), hashes seguros `PASSWORD_BCRYPT` y protección estricta contra eliminación del superadmin principal.
- **EMAIL & WHATSAPP:** Generación de enlaces y mensajes directos para WhatsApp con credenciales listas para enviar; sistema de notificaciones por email para bienvenida y flujo seguro de "¿Olvidaste tu contraseña?" con token temporal SHA-256 (`reset_token`).
- **FIX (DB):** Corrección de fallo silencioso en `community_store.php` por `PDO::FETCH_KEY_PAIR` en tabla de 3 columnas (`fede_settings`) que provocaba fallback a usuarios dummy con IDs alfanuméricos. Migración DDL automática de columnas en `db.php` y persistencia 100% real en MySQL.
- **FEAT (ACADEMY):** Visualización interactiva de clases por curso en pestaña Cursos del Admin con botón de preview/reproducción modal (`▶️ Ver / Probar Video`).
- **MEDIA:** Parser y conversor automático de URLs compartidas de YouTube (`https://youtu.be/...`, `watch?v=...`) al formato embed reproducible (`fede_format_video_embed_url`).
- **UI/UX:** Búsqueda en tiempo real y ordenamiento por columnas (↕️ Nombre, Email, Plan, Vencimiento, Estado) en la tabla de miembros del panel de administración.

## [2026-09-12] - Landing PHP Tecnobrain, Estrategia Social 3 Meses & Metricool
- **FEAT:** Landing autónoma en PHP liviano (`website-php/views/tecnobrain-campus-virtual.php`) respetando el manual de marca y sin alterar `tecnobrain` (Next.js).
- **ROUTING:** Habilitación de URLs amigables en `website-php/public/index.php` activas en puertos `:8015` y `:8011`.
- **CONTENT:** Estrategia de 4 piezas recurrentes enfocadas en "Herramienta Completa" (sin ataques a competidores) para Instagram, Facebook, LinkedIn y Google con calendario de rotación para 3 meses (2 publicaciones/semana).
- **MEDIA:** Generación de imágenes profesionales en alta resolución incluyendo mockup fotorrealista del Campus Real con Muro social, Meets y Recursos.
- **INTEGRATION:** Verificación y prueba de la API de Metricool (`/api/v2/scheduler/posts`) con credenciales oficiales de Tecnobrain.

## [2026-09-12] - Landing Page SEO 5 Capas & Precios Ecosistema Tecnobrain
- **FEAT:** Creación de la Landing Page de alta conversión en `tecnobrain.ar/campus-virtual-para-coaches-mentores-marca-personal`.
- **DOC:** Integración oficial de la lista de precios desde `PreciosWeb.docx` (Landing $150k, Web $550k, Comunidad Full $900k).
- **SEO:** Auditoría y ejecución de las 5 Capas SEO (+2.200 palabras, no thin content, Schemas JSON-LD `Service`, `OfferCatalog`, `FAQPage`, `BreadcrumbList`).
- **COMMERCIAL:** Políticas claras: 0% comisión x 6 meses en Comunidad Full, dominio por cuenta del cliente y cobros directos sin intermediarios.
- **SOCIAL PROOF:** Caso de estudio real con `fedenowback.com.ar` como referencia en producción.

## [2026-09-11] - Estandarización Wiki & Diagnóstico SSL
- **DOC:** Estandarización total de LLM Wiki bajo arquitectura universal de 3 capas.
- **DOC:** Incorporación de frontmatters YAML, tags y wikilinks bidireccionales en todos los nodos y sesiones.
- **DOC:** Creación de `guides/guia_despliegue_y_mantenimiento.md`.
- **INFRA:** Diagnóstico profundo de Certbot en Ploi, documentación de Multi-Perspective Validation y gestión de Rate Limits en `ssl_y_dominios.md`.
- **SYNC:** Integración y verificación con visualizador de grafo 3D (`:5190`).

## [2026-09-11] - Versión 1.0.0 (Migración & Lanzamiento)
- **FEAT:** Extracción del ecosistema Fede Nowback del monolito `estudio-pericial-sur`.
- **FEAT:** Creación de 6 landing pages de alta conversión (`/`, `/encende-tu-fuego`, `/mentorias`, `/sobre-mi`, `/comunidad`, `/contacto`).
- **FEAT:** Implementación de `seo_helper.php` con metatags OpenGraph y Schema.org JSON-LD.
- **FEAT:** Configuración de servidor dev local en puerto `:8015` con auto-inicio en `start-dev-servers.sh`.
- **INFRA:** Alta de sitio en Ploi `errante` (ID: 406351), script de deploy con git reset y primer deploy exitoso (`18d09b7`).
- **DB:** Creación de base de datos `fedenowback_db` y usuario `fedenowback_user` en Dev y Producción.
- **DOC:** Creación de LLM Wiki bajo estándar de 3 capas y conexión con MetaWiki Global.
