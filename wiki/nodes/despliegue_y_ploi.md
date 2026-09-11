---
title: Despliegue y Configuración en Ploi — Fede Nowback
project: fedenowback
type: node
tags: [deployment, ploi, errante, nginx, php-fpm, production]
---

# 🚀 Nodo: Despliegue y Configuración en Ploi

## 🖥️ Servidor de Producción
* **Servidor Ploi:** `errante` (ID: `105871`)
* **IP Servidor:** `72.61.34.92`
* **ID Sitio:** `406351`
* **Dominio:** `fedenowback.com.ar`
* **Directorio Raíz Web:** `/public`
* **Versión PHP:** 8.5 FPM
* **Usuario del Sistema:** `ploi`

## ⚙️ Script de Despliegue en Ploi
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

## 🔗 Nodos Relacionados
- [[nodes/infraestructura_y_servidores]] — Mapa de servidores Dev y Prod.
- [[nodes/ssl_y_dominios]] — Configuración de DNS y certificados SSL en Ploi.
- [[guides/guia_despliegue_y_mantenimiento]] — Procedimientos detallados de despliegue.
