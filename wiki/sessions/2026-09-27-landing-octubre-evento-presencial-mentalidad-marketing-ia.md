---
title: "Sesión: Landing Evento Presencial Mentalidad & Marketing - Neuroventas con IA (Octubre)"
project: fedenowback
type: session
date: 2026-09-27
tags: [session, landing, evento, neuroventas-ia, marketing, conversion, whatsapp]
---

# 🚀 Sesión: Landing Evento Presencial "Mentalidad y Marketing — Neuroventas con IA" (Octubre)

**Fecha:** 27 de Septiembre de 2026  
**Rama:** `main`  
**Commit:** `71ce9b0` (`feat: landing-octubre evento presencial mentalidad y marketing con IA`)  
**Autor:** elbuje <mfmujic@gmail.com>

---

## 🎯 Resumen Ejecutivo

En esta sesión se diseñó, maquetó e integró la Landing Page de alta conversión para el evento presencial de Octubre: **"Mentalidad y Marketing — Neuroventas con IA"**, protagonizado por **Fede Nowback**, **Anthony Altuna** y **Christian Cencherle**.

La landing fue concebida como una página de aterrizaje 100% enfocada en conversión (sin barra de navegación de distracción ni enlaces salientes superfluos) con copy persuasivo, diseño Dark/Gold de alto impacto, desglose de speakers, módulos de contenido, testimonios y llamados a la acción directos hacia WhatsApp.

---

## 🛠️ Archivos Creados & Modificados

### 1. Vistas y Ruteo
- `website-php/views/landing-octubre.php` y `website-php/views/mentalidad-marketing-neuroventas-ia.php`: Vista PHP de la landing estructurada con componentes modernos y responsive.
- `website-php/public/Mentalidad-Marketing-Neuroventas-con-IA.html`, `landing-octubre.html`, `landin-octubre.html`: Archivos HTML estáticos para acceso directo y redundancia.
- `website-php/public/index.php`: Rutas amigables añadidas al router:
  - `/mentalidad-marketing-neuroventas-ia`
  - `/mentalidad-marketing-neuroventas-con-ia`
  - `/mentalidad-y-marketing`
  - `/landing-octubre`
  - `/evento-presencial`
  - `/neuroventas-con-ia`
  - `/evento-ia`

### 2. Recursos Visuales y Fotografía
Directorio `website-php/public/events_new/` y `website-php/public/assets/events/`:
- `hero-speakers-group-hires.jpg` & `hero-speakers-group-wide.jpg`: Banner principal con los 3 speakers.
- `fede-portrait.jpg`, `anthony-portrait.jpg`, `christian-portrait.jpg`: Retratos individuales de alta resolución.
- `speaker-fede-card.jpg`, `speaker-anthony-card.jpg`, `speaker-christian-card.jpg`: Tarjetas biográficas y de temáticas.
- `fede-flyer.jpg`, `anthony-flyer.jpg`, `christian-flyer.jpg`: Flyers promocionales de cada disertante.
- `agenda-auditorium.jpg`, `footer-audience.jpg`, `manifiesto-bg.jpg`: Fondos de ambientación para auditorio y manifiesto.
- `flyer-mentalidad-marketing.jpg`: Flyer oficial unificado en `/assets/img/` y `/assets/events/`.

---

## 💎 Características Principales de la Landing

1. **Enfoque de Conversión Directa (No Navigation Distractions):** Se eliminó el menú estándar para dirigir 100% la atención al copy del evento y al botón de reserva.
2. **Presentación de Speakers de Élite:**
   - **Fede Nowback:** Mentalidad, Marca Personal y Posicionamiento Disruptivo.
   - **Anthony Altuna:** Inteligencia Artificial aplicada al Marketing y Automatizaciones.
   - **Christian Cencherle:** Neuroventas, Cierre de Alto Valor y Psicología del Comprador.
3. **Integración con WhatsApp:** CTAs con enlaces preconfigurados con mensaje personalizado para reserva de cupos inmediatos.
4. **Optimización Mobile-First:** Maquetación con CSS nativo ultra optimizado, carga asíncrona de imágenes y contraste de alta visibilidad.

---

## 🔗 Nodos y Referencias Relacionadas
- [[nodes/rutas_y_seo]] — Mapeo de rutas amigables y SEO de landings.
- [[nodes/arquitectura_sistema]] — Front Controller y estructura de vistas.
- [status.md](file:///home/mfmujic/fedenowback/status.md) — Estado de avance del proyecto.
