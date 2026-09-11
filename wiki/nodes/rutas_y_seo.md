---
title: Rutas y Estrategia SEO — Fede Nowback
project: fedenowback
type: node
tags: [seo, routes, open-graph, json-ld, landings, marketing]
---

# 🛣️ Rutas y Estrategia SEO — Fede Nowback

## 1. Mapa de Landings y URLs Amigables
Todas las páginas están optimizadas para posicionamiento orgánico en búsquedas relacionadas a *marca personal, mentoría de negocios digitales, eventos de mentalidad y cursos para creadores*:

| URL | Vista | Título SEO | Schema JSON-LD |
|:---|:---|:---|:---|
| `/` | `views/index.php` | Fede Nowback \| Estrategia de Marca Personal, Mentalidad y Negocios Digitales | `Person`, `WebSite` |
| `/encende-tu-fuego` | `views/encende-tu-fuego.php` | Encendé tu Fuego \| Masterclass Presencial en CABA | `Event`, `Place`, `Offer` |
| `/mentorias` | `views/mentorias.php` | Mentorías & Programas de Acompañamiento \| Fede Nowback | `Service`, `OfferCatalog` |
| `/sobre-mi` | `views/sobre-mi.php` | Sobre Fede Nowback \| Mi Historia, Filosofía y Trayectoria | `Person`, `ProfilePage` |
| `/comunidad` | `views/comunidad.php` | Campus Fede Nowback Pro \| Comunidad Oficial & Academia | `Course`, `EducationalOrganization` |
| `/contacto` | `views/contacto.php` | Contacto Oficial & Asesoría Directa \| Fede Nowback | `ContactPage` |
| `/sitemap.xml` | Dinámico | Mapa de sitio XML indexable por Google | XML Sitemap |

## 2. Helper SEO (`website-php/includes/seo_helper.php`)
Genera automáticamente:
- `<title>` y `<meta name="description">` dinámicos.
- Canonical URLs absolutas basadas en `SITE_URL`.
- Open Graph tags (`og:title`, `og:description`, `og:image`, `og:url`).
- Twitter Card tags.
- Bloques de datos estructurados `<script type="application/ld+json">`.

---

## 🔗 Nodos Relacionados
- [[nodes/arquitectura_sistema]] — Estructura del ruteador y Front Controller.
