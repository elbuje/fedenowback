---
title: Sesión 2026-09-11 — Migración a Proyecto Independiente
project: fedenowback
type: session
tags: [session, migration, setup, deployment, v1]
---

# 📝 Sesión: 2026-09-11 — Migración a Proyecto Independiente

## 🎯 Objetivos
- Extraer Fede Nowback del monolito `estudio-pericial-sur`.
- Crear repositorio independiente `elbuje/fedenowback`.
- Desarrollar formato landings con optimización SEO para todas las páginas.
- Configurar base de datos MySQL, servidor dev (`:8015`) y deploy en Ploi (`fedenowback.com.ar`).

## 🛠️ Acciones Realizadas
1. **Extracción y Modularización:** Creación de `/home/mfmujic/fedenowback/` con front controller, layout y vistas dedicadas.
2. **Desarrollo de Landings:** Creación de `/`, `/encende-tu-fuego`, `/mentorias`, `/sobre-mi`, `/comunidad`, `/contacto` y `/sitemap.xml`.
3. **SEO Helper:** Implementación de `website-php/includes/seo_helper.php` con schemas JSON-LD.
4. **Dev Server:** Asignación de puerto `:8015`, integración en `start-dev-servers.sh` y registro en `/home/mfmujic/PORT_REGISTRY.md`.
5. **Ploi Producción:** Alta de `fedenowback.com.ar` en server `errante` (ID 105871), script de deploy con git reset y primer deploy exitoso (`18d09b7`).
6. **Base de Datos:** Inicialización de `fedenowback_db` en Dev y Producción.
7. **LLM Wiki:** Configuración e instalación de wiki bajo estándar de 3 capas.

## 🔗 Nodos Relacionados
- [[nodes/arquitectura_sistema]] — Estructura MVC y componentes modulares.
- [[nodes/despliegue_y_ploi]] — Pipeline de despliegue en Ploi.
- [[nodes/infraestructura_y_servidores]] — Configuración de Dev y Producción.
- [[nodes/rutas_y_seo]] — Landings y optimización para motores de búsqueda.
- [[nodes/base_de_datos]] — Base de datos relacional y tablas de comunidad.

## 📌 Próximos Pasos
- Emitir certificado SSL Let's Encrypt / ZeroSSL en Ploi tras asentarse la propagación DNS en resolvers de EE.UU./Europa.
- Limpiar vistas residuales en el repositorio `estudio-pericias`.
