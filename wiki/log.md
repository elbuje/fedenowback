---
title: Bitácora de Cambios — Fede Nowback
project: fedenowback
type: log
tags: [log, changelog, history, fedenowback]
---

# 🪵 Bitácora de Cambios (Log) — Fede Nowback

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
