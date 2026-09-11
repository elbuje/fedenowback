---
title: Guía de Despliegue y Mantenimiento — Fede Nowback
project: fedenowback
type: guide
tags: [guide, deployment, ploi, maintenance, operations]
---

# 🛠️ Guía de Despliegue y Mantenimiento — Fede Nowback

Esta guía detalla los procedimientos estándar para probar localmente, desplegar cambios a producción en Ploi y realizar tareas de mantenimiento.

---

## 1. 💻 Desarrollo y Pruebas Locales

El servidor de desarrollo corre en el Hostinger VPS (`72.62.107.109`) en el puerto **8015**:

```bash
# Iniciar servidor localmente si no está corriendo:
cd /home/mfmujic/fedenowback
php -S 0.0.0.0:8015 -t website-php/public website-php/public/index.php
```

Para verificar el servicio:
```bash
curl -I http://localhost:8015/
```

---

## 2. 🚀 Despliegue a Producción (Ploi)

El flujo de despliegue se activa automáticamente vía Git / Webhook de Ploi o manualmente desde el panel.

### Pasos de Publicación:
1. Asegurar que los cambios estén probados en local.
2. Hacer commit y push a la rama `main`:
   ```bash
   git add .
   git commit -m "FEAT/FIX: descripción del cambio"
   git push origin main
   ```
3. Ejecutar o verificar el script de deploy en Ploi (Sitio ID: `406351`, Servidor: `errante`):
   ```bash
   cd /home/ploi/fedenowback.com.ar
   git config core.fileMode false
   git reset --hard origin/main
   git pull origin main
   rm -f ./public/index.html
   mkdir -p ./views ./includes ./public
   cp -rf website-php/views/* ./views/
   cp -rf website-php/includes/* ./includes/
   cp -rf website-php/public/* ./public/
   rm -f ./public/index.html
   chmod -R 755 .
   chmod -R 755 public
   find public -type f -exec chmod 644 {} +
   php -r "require '/home/ploi/fedenowback.com.ar/includes/db.php'; fede_db_init_schema();"
   (flock -w 10 9 || exit 1; echo 'Restarting FPM...'; sudo -S service php8.5-fpm reload) 9>/tmp/fpmlock
   echo "🚀 Application deployed!"
   ```

---

## 3. 🗄️ Mantenimiento de Base de Datos

La inicialización y auto-migración de tablas se ejecuta automáticamente con la función `fede_db_init_schema()`.

Para forzar la migración manual en Dev:
```bash
php -r "require '/home/mfmujic/fedenowback/website-php/includes/db.php'; fede_db_init_schema();"
```

---

## 4. 🔗 Nodos Relacionados
- [[nodes/despliegue_y_ploi]] — Configuración completa del servidor Ploi.
- [[nodes/infraestructura_y_servidores]] — Arquitectura de servidores Dev & Prod.
- [[nodes/base_de_datos]] — Estructura de tablas y credenciales.
