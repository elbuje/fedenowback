---
title: Infraestructura y Servidores — Fede Nowback
project: fedenowback
type: node
tags: [infrastructure, hostinger, ploi, dev-server, production, ports]
---

# 🖥️ Infraestructura y Servidores — Fede Nowback

## 1. Entorno de Desarrollo (Dev)
- **Servidor:** Hostinger VPS KVM 4 — `antig.nippur.cloud` (`72.62.107.109`)
- **Directorio:** `/home/mfmujic/fedenowback`
- **Puerto:** `8015`
- **Comando de arranque:**
  ```bash
  php -S 0.0.0.0:8015 -t website-php/public website-php/public/index.php
  ```
- **Auto-Inicio:** Configurado en `/home/mfmujic/start-dev-servers.sh`.

## 2. Entorno de Producción (Ploi)
- **Servidor:** Ploi `errante` (`72.61.34.92`)
- **Site ID:** `406351` (`fedenowback.com.ar`)
- **Ruta en Producción:** `/home/ploi/fedenowback.com.ar`
- **Root Nginx:** `/home/ploi/fedenowback.com.ar/public`
- **PHP Version:** PHP 8.5-FPM
- **Base de Datos:** MySQL local `fedenowback_db`
- **SSL:** Let's Encrypt administrado por Ploi.

## 3. Repositorio Git
- **URL:** `https://github.com/elbuje/fedenowback.git`
- **Ramas:** `main` (Producción), `dev` (Desarrollo).

---

## 🔗 Nodos Relacionados
- [[nodes/despliegue_y_ploi]] — Configuración de despliegue en servidor Ploi.
- [[nodes/ssl_y_dominios]] — Gestión de dominios y certificados SSL.
- [[nodes/arquitectura_sistema]] — Estructura técnica de la aplicación.
