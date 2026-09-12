# 📊 Estado del Proyecto — Fede Nowback (`v1.0.0`)

**Última actualización:** 2026-09-12  
**Rama activa:** `main` / `dev`  
**Deploy en Producción:** ✅ Activo (`18d09b7`)  
**Servidor Dev:** ✅ Activo en `:8015` y `:8011`  
**LLM Wiki 3 Capas:** ✅ 100% Estandarizada e Indexada en Grafo 3D  

---

## 🎯 Tareas Completadas (v1.0.0 & Expansión Comercial)
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
- [x] Calendario rotativo aleatorizado para 3 meses (12 semanas, 2 publicaciones/semana = 24 publicaciones).
- [x] Test técnico y validación de endpoints de la API de Metricool (`/api/v2/scheduler/posts`) con credenciales de Tecnobrain.

---

## ⏳ Backlog / Próximas Tareas
- [ ] Programación automatizada de las 24 publicaciones en el planificador de Metricool.
- [ ] Emisión de certificado SSL Let's Encrypt en Ploi (ventana de rate limit finaliza a las `01:25:46 UTC`).
- [ ] Alta en Google Search Console y envío de `https://fedenowback.com.ar/sitemap.xml`.
- [ ] Integración de Google Analytics / Pixel de Meta.
- [ ] Limpieza de vistas residuales de fedenowback en el repositorio `estudio-pericias`.
