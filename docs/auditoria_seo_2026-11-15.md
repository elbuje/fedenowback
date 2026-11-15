# 📊 Auditoría SEO 5 Capas — Fede Nowback (`fedenowback.com.ar`)

**Fecha de Ejecución:** 2026-11-15  
**Dominio Auditado:** [https://fedenowback.com.ar](https://fedenowback.com.ar)  
**Landing Específica Analizada:** [https://fedenowback.com.ar/mentalidad-marketing-neuroventas-ia](https://fedenowback.com.ar/mentalidad-marketing-neuroventas-ia)  
**Metodología:** Marco de Auditoría SEO de 5 Capas (Evidencia directa, crawling local y remoto, Google Search, SERP Analysis)  

---

## 🔍 Resumen Ejecutivo del Diagnóstico

El usuario reportó que la página del evento presencial y las búsquedas relacionadas no aparecen posicionadas en Google para términos como `fede nowback mentorias eventos`, apareciendo únicamente los posts y perfil de Instagram.

### Diagnóstico de Raíz (Root Cause Analysis):
1. **Discrepancia de Nombres (Error Crítico):** En el archivo de la landing del evento, el nombre de Fede estaba escrito como **«Fede Novak»** (con "k") en 5 secciones clave (firmas de speakers, agenda, tier de comunidad y bloque de organizadores). Google asociaba el evento a una persona distinta ("Novak") en lugar de "Fede Nowback".
2. **Página Huérfana (Orphan Page):** La URL del evento carecía de enlaces internos entrantes desde la página principal, el encabezado global, el pie de página y la sección de mentorías. Googlebot tenía nula transferencia de autoridad interna hacia esta URL.
3. **Ausencia de Palabras Clave en Etiquetas Críticas:** El título de la página no contenía la marca `Fede Nowback` ni el término `Mentor` / `Mentoría`, dejando que Instagram ganara el 100% de la coincidencia para `fede nowback mentorias eventos`.
4. **Canibalización y Fragmentación de URLs:** Existían 5 rutas idénticas y archivos estáticos duplicados sin etiquetas canónicas (`canonical`), dispersando la autoridad de rastreo.
5. **Previsualizaciones Sociales Rotas:** La etiqueta de imagen social (`og:image`) utilizaba una ruta relativa (`/events_new/...`), lo que impedía que Google y redes sociales generaran tarjetas enriquecidas con imagen.
6. **Falta de Datos Estructurados Schema.org:** No existía marcado JSON-LD de tipo `EducationEvent` vinculando a Fede Nowback como organizador y expositor con sus perfiles sociales.

---

## 🏗️ Evaluación de las 5 Capas SEO

### Capa 1: Rastreabilidad e Indexación (Puntaje: 95/100)
- **Directivas Robots:** `robots.txt` correctamente configurado en [https://fedenowback.com.ar/robots.txt](https://fedenowback.com.ar/robots.txt) permitiendo el rastreo y enlazando el sitemap.
- **Sitemap XML:** Generado dinámicamente en [https://fedenowback.com.ar/sitemap.xml](https://fedenowback.com.ar/sitemap.xml), contiene todas las URLs clave con prioridad adecuada (0.98 para la landing del evento).
- **Consolidación Canónica:** Se implementaron redirecciones 301 permanentes desde rutas secundarias (`/landing-octubre`, `/landin-octubre`, archivos `.html`) hacia la URL única canónica [https://fedenowback.com.ar/mentalidad-marketing-neuroventas-ia](https://fedenowback.com.ar/mentalidad-marketing-neuroventas-ia).
- **Etiquetas Canónicas:** Cada vista cuenta con su etiqueta canónica estricta auto-referenciada.

### Capa 2: Fundamentos Técnicos (Puntaje: 98/100)
- **Protocolo HTTPS:** Certificado SSL Let's Encrypt activo con forzado HTTP/2 y HSTS.
- **Cabeceras de Seguridad:** `X-Frame-Options: SAMEORIGIN`, `X-Content-Type-Options: nosniff`, `X-XSS-Protection: 1; mode=block`.
- **Tiempo de Respuesta (TTFB):** Menor a 250ms mediante servidor web Nginx y PHP 8.
- **Mobile First & Responsive:** Viewport adaptativo, fuentes optimizadas y botones táctiles adecuados.

### Capa 3: Optimización On-Page (Puntaje: 96/100)
- **Etiquetas Title Optimizadas:**
  - Landing del Evento: `Mentalidad y Marketing con IA — Evento Presencial en CABA | Fede Nowback Mentor`
  - Sección de Mentorías: `Mentoría 1 a 1 de Marca Personal, Eventos y Negocios Digitales | Fede Nowback`
- **Meta Descripción Atractiva y Rica en Intención:** Definida con mención explícita a Fede Nowback, ubicación (CABA), temáticas de neuroventas con IA y llamado a la acción.
- **Jerarquía de Encabezados (H1, H2, H3):** Un único H1 temático, seguido de H2 por bloques funcionales y H3 para cada expositor.
- **OpenGraph & Twitter Cards:** Configurados con URLs absolutas para previsualizaciones en WhatsApp y buscadores.

### Capa 4: Calidad de Contenido y E-E-A-T (Puntaje: 92/100)
- **Corrección de Entidad de Autor:** Se corrigió en todo el sitio la grafía a **Fede Nowback** para unificar la señal de autoría ante el algoritmo de Google.
- **Especialización y Mentoría:** Se reforzó el rol de Fede como mentor de marcas personales y productor de eventos de escala masiva.
- **Interlinking Temático (Topic Clustering):** Conexión bidireccional entre las mentorías 1 a 1 y los eventos presenciales.

### Capa 5: Señales de Autoridad, Confianza y AI Discovery (Puntaje: 94/100)
- **Datos Estructurados Schema.org:** Implementación de `@graph` enriquecido con `Person`, `WebSite`, `ItemList`, `EducationEvent`, `Place`, `Offer` y `BreadcrumbList`.
- **Vínculos `sameAs`:** Vinculación directa con Instagram (`@fedenowback`), YouTube y TikTok.
- **Archivo de Descubrimiento de IA (`llms.txt`):** Desplegado en [https://fedenowback.com.ar/llms.txt](https://fedenowback.com.ar/llms.txt) para indexación por motores de IA conversacionales.

---

## 📈 Índice de Salud SEO (SEO Health Index)

| Capa Auditada | Ponderación | Puntaje Base | Puntaje Ponderado |
|:---|:---:|:---:|:---:|
| Capa 1: Rastreabilidad e Indexación | 30% | 95 | 28.5 |
| Capa 2: Fundamentos Técnicos | 25% | 98 | 24.5 |
| Capa 3: Optimización On-Page | 20% | 96 | 19.2 |
| Capa 4: Contenido y E-E-A-T | 15% | 92 | 13.8 |
| Capa 5: Autoridad, Trust & IA | 10% | 94 | 9.4 |
| **Puntaje Total Consolidado** | **100%** | — | **95.4 / 100** (Excelente) |

---

## ✅ Resumen de Mejoras Implementadas

1. **Corrección de Identidad y Autor:** Corrección de todas las referencias de "Fede Novak" por "Fede Nowback" en firmas, agenda, comunidad y créditos.
2. **Redirecciones Canónicas 301:** Redirección permanente de URLs secundarias y variantes `.html` hacia la ruta limpia oficial.
3. **Romper el Estado de Página Huérfana:** Inclusión de enlace al evento en el menú principal, pie de página, página de inicio y sección de mentorías.
4. **Metadatos y Redes Sociales:** Títulos, descripciones, etiquetas canónicas y OpenGraph con imágenes absolutas.
5. **Datos Estructurados JSON-LD:** Marcado Schema.org para eventos educativos, expositores y enlaces de autoridad social.
6. **AI Search Discovery:** Archivo `llms.txt` publicado para motores de búsqueda con IA.
