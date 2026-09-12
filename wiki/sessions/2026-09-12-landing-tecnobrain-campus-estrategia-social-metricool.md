---
title: "Sesión: Landing PHP Tecnobrain, Estrategia Social 3 Meses y Configuración Metricool"
date: "2026-09-12"
project: "fedenowback"
tags: [session, tecnobrain, campus-virtual, php, metricool, social-media, branding]
---

# 🚀 Sesión: Landing PHP Tecnobrain, Estrategia Social 3 Meses y Metricool (2026-09-12)

## 🎯 Resumen Ejecutivo y Decisiones
1. **Aislamiento Total de Tecnobrain (Next.js):**
   - Siguiendo la orden estricta del usuario, no se tocó ni alteró el código fuente ni el menú de `tecnobrain`.
   - Se implementó la landing en **PHP liviano autónomo** dentro de `fedenowback` (`website-php/views/tecnobrain-campus-virtual.php`) servida en desarrollo en `localhost:8015` y `localhost:8011` con carga instantánea sin tiempos de compilación.
2. **Estética Oficial y Manual de Marca Tecnobrain:**
   - Incorporación del manual de marca de 26 diapositivas: Tipografía *Open Sans*, paleta oficial (violeta `#6A4E9E`, lima `#A5C400` / `#B7BF10`, gris `#9D9C9E`, fondo corporativo `#050505`).
   - Propuesta de valor: *"Somos personas que conectan con personas"*, *"Tu aliado tecnológico en soluciones informáticas integrales"*, *"Tranquilidad operativa"*.
   - Flyer oficial de precios exactos:
     - **Landing Page:** $150.000 ARS (entrega 4 días).
     - **Página Web:** $550.000 ARS (3 cuotas o 10% OFF = $495.000 ARS, 3 landings gratis x 6 meses, entrega 15 días).
     - **Comunidad Full:** $900.000 ARS (3 cuotas o 10% OFF = $810.000 ARS, Web + Campus, 0% comisión x usuario los primeros 6 meses, entrega 30 días).
   - Prueba social: Caso de éxito de **Fede Nowback** en producción.
3. **Estrategia de 4 Publicaciones Recurrentes Multicanal (3 Meses):**
   - Diseño de 4 piezas con enfoque de **"Herramienta Completa"** (sin atacar agresivamente a la competencia):
     - **Pieza 1 (Autoridad):** De referente a institución con tu propia casa digital (Speaker en escenario keynote).
     - **Pieza 2 (Ecosistema Todo en Uno):** Centralización y control sin dispersión técnica (Mentor en estudio masterclass).
     - **Pieza 3 (El Campus por Dentro):** Muro social con etiquetas (*Victorias, Feedback, Preguntas, Recursos*), Academia modular, Meets y Hot Seats en vivo con agendado, Chat de miembros y conexión directa a WhatsApp.
     - **Pieza 4 (Activo Escalable):** Paquete integral llave en mano con soporte y tiempos de entrega garantizados.
   - Calendario de publicación rotativo y aleatorizado de 12 semanas (2 publicaciones semanales = 24 salidas) para Instagram, Facebook, LinkedIn y Google.
4. **Integración con Metricool:**
   - Verificación de credenciales activas del ecosistema Tecnobrain (`METRICOOL_API_KEY`, `METRICOOL_BLOG_ID=4104186`, `METRICOOL_USER_ID=3225120`).
   - Prueba técnica del endpoint de publicación (`/api/v2/scheduler/posts`) confirmada con status 200.

---

## 📁 Archivos Modificados y Generados
- `website-php/views/tecnobrain-campus-virtual.php` — Landing de venta oficial en PHP.
- `website-php/public/index.php` — Enrutador con URLs amigables (`/campus-virtual-para-coaches-mentores-marca-personal` y `/tecnobrain-campus-virtual`).
- `estrategia_publicaciones_campus_virtual.md` — Documento de estrategia, copys multicanal y calendario de rotación.
- Activos gráficos generados:
  - `speaker_stage_keynote_1789229913235.jpg`
  - `mentor_masterclass_studio_1789229945357.jpg`
  - `real_campus_community_mockup_1789230715447.jpg`
  - `speaker_executive_conference_1789230024485.jpg`

---

## 📌 Próximos Pasos (Backlog)
- Ejecutar la carga masiva automatizada de las 24 publicaciones del calendario de 3 meses en el planificador de Metricool.
- Replicar la landing en el entorno de producción si se requiere despliegue público en dominio.
