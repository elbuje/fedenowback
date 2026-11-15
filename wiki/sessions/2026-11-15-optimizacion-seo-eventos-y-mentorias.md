# Sesión 2026-11-15: Optimización SEO Integral de la Landing del Evento con IA y Mentorías

**Fecha:** 2026-11-15  
**Proyecto:** Fede Nowback (`fedenowback.com.ar`)  
**Servidores Involucrados:**  
- Servidor Local Dev: `http://localhost:8015/`  
- Servidor Producción: Ploi `errante` (`72.61.34.92` - Site ID `406351`) -> `https://fedenowback.com.ar`  

---

## 🎯 Objetivo de la Sesión
Resolver el problema de indexación y posicionamiento orgánico en Google, donde para búsquedas como `fede nowback mentorias eventos` el buscador mostraba únicamente los posteos de Instagram y no la página oficial del evento presencial de Mentalidad, Marketing y Neuroventas con IA.

---

## 🔍 Hallazgos Principales (Diagnóstico de 5 Capas)
1. **Error Crítico de Entidad:** El nombre del mentor figuraba escrito como "Fede Novak" (con "k") en 5 secciones clave de la página (firmas de speakers, cronograma, comunidad de seguidores y organizadores), imposibilitando que Google asociara el contenido a "Fede Nowback".
2. **Página Huérfana:** La landing no tenía enlaces entrantes desde la portada principal, el menú de navegación, el pie de página ni la sección de mentorías.
3. **Falta de Términos en Títulos y Metadatos:** El título no incluía la marca "Fede Nowback" ni "Mentoría".
4. **Dispersión de URLs:** Múltiples variantes `.html` y rutas paralelas sin etiqueta canónica ni redirecciones 301.
5. **Ruta Relativa en Open Graph:** La imagen para redes (`og:image`) era relativa (`/events_new/...`), impidiendo su procesamiento en tarjetas visuales de buscadores y mensajería.
6. **Ausencia de Datos Estructurados:** No existía Schema.org `EducationEvent` con expositores, ubicación y perfiles sociales.

---

## 🛠️ Acciones Implementadas
- **Corrección de Identidad:** Corrección unificada de "Fede Novak" a "Fede Nowback" en todas las vistas y páginas estáticas.
- **Optimización On-Page y Metadatos:**
  - Título optimizado: `Mentalidad y Marketing con IA — Evento Presencial en CABA | Fede Nowback Mentor`
  - Meta descripción enriquecida con ubicación (CABA), temáticas y expositores.
  - Canónica absoluta: `https://fedenowback.com.ar/mentalidad-marketing-neuroventas-ia`.
  - OpenGraph y Twitter Cards con imágenes absolutas.
- **Datos Estructurados Schema.org:** JSON-LD de tipo `EducationEvent`, `Person` (Fede Nowback con redes sociales verificadas `sameAs`), `Place`, `Offer` y `BreadcrumbList`.
- **Estrategia de Enlazado Interno (Interlinking):**
  - **Menú Superior:** Agregado el enlace "🎟️ Eventos & IA" en toda la navegación.
  - **Pie de Página:** Enlaces directos al evento presencial y a "Encendé tu Fuego".
  - **Página de Inicio:** Sección destacada para los eventos presenciales y masterclasses en vivo.
  - **Sección de Mentorías:** Módulo de formación presencial complementaria que vincula directamente las mentorías 1 a 1 con el evento con IA.
- **Redirecciones 301 y Limpieza de Rutas:** Redirección permanente de URLs secundarias hacia la ruta canónica limpia.
- **Descubrimiento para Modelos de IA:** Creación del archivo `llms.txt` con la información oficial estructurada de Fede Nowback.
- **Informe de Auditoría Completo:** Generado en `docs/auditoria_seo_2026-11-15.md`.

