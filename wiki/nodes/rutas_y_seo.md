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
| `/` | `views/index.php` | Fede Nowback \| Estrategia de Marca Personal, Mentalidad y Negocios Digitales | `Person`, `WebSite`, `ItemList` |
| `/mentalidad-marketing-neuroventas-ia` | `views/mentalidad-marketing-neuroventas-ia.php` | Mentalidad y Marketing con IA — Evento Presencial en CABA \| Fede Nowback Mentor | `EducationEvent`, `Person`, `Place`, `Offer`, `BreadcrumbList` |
| `/encende-tu-fuego` | `views/encende-tu-fuego.php` | Encendé tu Fuego \| Masterclass Presencial en CABA | `Event`, `Place`, `Offer` |
| `/mentorias` | `views/mentorias.php` | Mentoría 1 a 1 de Marca Personal, Eventos y Negocios Digitales \| Fede Nowback | `Course`, `Person` |
| `/sobre-mi` | `views/sobre-mi.php` | Sobre Fede Nowback \| Mi Historia, Filosofía y Trayectoria | `Person`, `ProfilePage` |
| `/comunidad` | `views/comunidad.php` | Campus Fede Nowback Pro \| Comunidad Oficial & Academia | `Course`, `EducationalOrganization` |
| `/contacto` | `views/contacto.php` | Contacto Oficial & Asesoría Directa \| Fede Nowback | `ContactPage` |
| `/sitemap.xml` | Dinámico (`index.php`) | Mapa de sitio XML indexable por Google con prioridades | XML Sitemap Standard |
| `/llms.txt` | Estático (`public/llms.txt`) | Ficha de autoridad y servicios oficiales para motores de IA | AI Standard Standard |

## 2. Redirecciones Canónicas 301 (Consolidación)
Para evitar canibalización y contenido duplicado, las rutas secundarias y extensiones estáticas se consolidan con redirección permanente 301 hacia `/mentalidad-marketing-neuroventas-ia`:
- `/landing-octubre`
- `/landin-octubre`
- `/landing-octubre.html`
- `/Mentalidad-Marketing-Neuroventas-con-IA.html`
- `/mentalidad-marketing-neuroventas-con-ia`
- `/mentalidad-y-marketing`
- `/evento-ia`

## 3. Red de Enlazado Interno (Interlinking)
- **Header Global:** Enlace persistente `🎟️ Eventos & IA`.
- **Footer Global:** Enlaces a `/mentalidad-marketing-neuroventas-ia` y `/encende-tu-fuego`.
- **Home (`/`):** Sección dedicada a eventos presenciales y masterclasses en vivo.
- **Mentorías (`/mentorias`):** Módulo de eventos presenciales complementarios.

## 4. Helper SEO (`website-php/includes/seo_helper.php`)
Genera automáticamente:
- `<title>` y `<meta name="description">` dinámicos.
- Canonical URLs absolutas basadas en `SITE_URL`.
- Open Graph tags con rutas absolutas (`og:title`, `og:description`, `og:image`, `og:url`).
- Twitter Card tags (`summary_large_image`).
- Bloques de datos estructurados `<script type="application/ld+json">`.

---

## 🔗 Nodos Relacionados
- [[sessions/2026-11-15-optimizacion-seo-eventos-y-mentorias]] — Optimización SEO integral de eventos y mentorías.
- [[nodes/arquitectura_sistema]] — Estructura del ruteador y Front Controller.
