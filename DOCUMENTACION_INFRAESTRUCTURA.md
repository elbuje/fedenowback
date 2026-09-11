# 🚀 Fede Nowback (`fedenowback.com.ar`) — Guía Completa de Infraestructura y Proyecto

**Fecha de Creación:** 2026-09-11  
**Repositorio GitHub:** [elbuje/fedenowback](https://github.com/elbuje/fedenowback) (Ramas: `main`, `dev`)  
**Directorio Local en Servidor:** `/home/mfmujic/fedenowback/`  
**Dominio de Producción:** `http://fedenowback.com.ar` (SSL pendiente de propagación DNS internacional)  
**Servidor de Desarrollo Local:** `http://localhost:8015/`  

---

## 🗺️ 1. Mapa de Infraestructura y Servidores

### 🖥️ Servidor de Desarrollo (Dev Server)
- **Host / IP:** `antig.nippur.cloud` (`72.62.107.109`)
- **Directorio:** `/home/mfmujic/fedenowback`
- **Puerto Asignado:** `8015` (registrado en `/home/mfmujic/PORT_REGISTRY.md`)
- **Servicio:** PHP 8.x Built-in Web Server ejecutando:
  ```bash
  php -S 0.0.0.0:8015 -t /home/mfmujic/fedenowback/website-php/public /home/mfmujic/fedenowback/website-php/public/index.php
  ```
- **Auto-Inicio:** Integrado en `/home/mfmujic/start-dev-servers.sh` (arranca en background y loguea a `/tmp/fedenowback-dev.log`).
- **Base de Datos Local (Dev):**
  - **Host:** `127.0.0.1` / `localhost` (Puerto 3306)
  - **Base de Datos:** `fedenowback_db`
  - **Usuario:** `fedenowback_user`
  - **Password:** `NowbackFuego2026_SecurePass!`
  - **Estado:** ✅ Creada, verificada y con tablas inicializadas.

---

### 🌐 Servidor de Producción (Ploi)
- **Servidor Ploi:** `errante` (`72.61.34.92` - Server ID `105871`)
- **Site ID en Ploi:** `406351` (`fedenowback.com.ar`)
- **Directorio en Producción:** `/home/ploi/fedenowback.com.ar/`
- **Web Directory (Nginx Root):** `/home/ploi/fedenowback.com.ar/public`
- **PHP Version:** PHP 8.5 FPM (`unix:/run/php/php8.5-fpm.sock`)
- **Archivo de Entorno (`.env`):** Ubicado en `/home/ploi/fedenowback.com.ar/.env`
  ```env
  APP_NAME="Fede Nowback"
  APP_ENV=production
  APP_DEBUG=false
  APP_URL=https://fedenowback.com.ar

  FEDE_DB_HOST=127.0.0.1
  FEDE_DB_PORT=3306
  FEDE_DB_NAME=fedenowback_db
  FEDE_DB_USER=fedenowback_user
  FEDE_DB_PASS=NowbackFuego2026_SecurePass!
  ```
- **Base de Datos Producción:**
  - **Servidor:** MySQL 8.4 local en `errante`
  - **Database:** `fedenowback_db`
  - **Usuario:** `fedenowback_user`
  - **Password:** `NowbackFuego2026_SecurePass!`
  - **Estado:** ✅ Verificada con PDO y conectando OK.

---

### 📦 Deploy Script Oficial en Ploi
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

## 📁 2. Estructura de Directorios del Proyecto

```text
/home/mfmujic/fedenowback/
├── .agent/
│   └── workflows/
│       ├── abrirsesion.md
│       ├── cerrarsesion.md
│       └── instalarwiki.md
├── .git/
├── .gitignore
├── README.md
├── status.md
├── wiki/
│   ├── index.md
│   ├── log.md
│   ├── sources.md
│   ├── nodes/
│   │   ├── arquitectura_sistema.md
│   │   ├── base_de_datos.md
│   │   ├── infraestructura_y_servidores.md
│   │   └── rutas_y_seo.md
│   └── sessions/
│       └── 2026-09-11-migracion-proyecto-independiente.md
└── website-php/
    ├── includes/
    │   ├── community_store.php     # Lógica y funciones del Campus Pro
    │   ├── config.php              # Configuración global, constantes y helpers
    │   ├── db.php                  # Conexión PDO y auto-inicialización de esquema MySQL
    │   └── seo_helper.php          # Generador de metatags dinámicos y JSON-LD Schema
    ├── public/
    │   ├── .htaccess               # Reglas de Apache / Fallback
    │   ├── comunidad_api.php       # API Ajax para interacciones del campus
    │   ├── index.php               # Front Controller y Ruteador Central
    │   ├── robots.txt              # Directivas de indexación y sitemap
    │   └── assets/
    │       ├── css/
    │       │   ├── campus.css      # Estilos del Campus Pro
    │       │   └── styles.css      # Estilos de Landings y Web Corporativa
    │       ├── img/                # Imágenes de Fede, eventos y assets visuales
    │       └── js/
    │           └── campus.js       # Interactividad del campus
    └── views/
        ├── layout/
        │   ├── header.php          # Encabezado modular con navegación
        │   └── footer.php          # Pie de página y links legales
        ├── index.php               # Landing Principal (Home)
        ├── encende-tu-fuego.php    # Landing Evento Presencial
        ├── mentorias.php           # Landing Mentorías 1 a 1 y Grupales
        ├── sobre-mi.php            # Landing Bio / Speaker / Trayectoria
        ├── comunidad.php           # Campus Fede Nowback Pro (Academia y Comunidad)
        └── contacto.php            # Landing Contacto y WhatsApp Directo
```

---

## 🛣️ 3. Ruteo y Páginas Creadas (Landing Page Format)

Todas las páginas fueron estructuradas como **landings de alta conversión**, con URLs limpias, diseño responsivo, llamadas a la acción (CTA) directas a WhatsApp y datos estructurados Schema.org (`Person`, `Event`, `Course`, `ContactPage`):

| Ruta URL | Vista PHP | Propósito | Schema JSON-LD |
|:---|:---|:---|:---|
| `/` | `views/index.php` | Landing Principal / Hub de Marca Personal | `Person`, `WebSite`, `ProfessionalService` |
| `/encende-tu-fuego` | `views/encende-tu-fuego.php` | Landing Evento Presencial (Lavalle 362, CABA) | `Event`, `Place`, `Offer` |
| `/mentorias` | `views/mentorias.php` | Landing de Mentorías y Programas Digitales | `Service`, `OfferCatalog` |
| `/sobre-mi` | `views/sobre-mi.php` | Historia, Mentalidad, Speaker & Autor | `Person`, `ProfilePage` |
| `/comunidad` | `views/comunidad.php` | Campus Privado, Módulos, Debates y Ranking | `EducationalOrganization`, `Course` |
| `/contacto` | `views/contacto.php` | Formulario & Acceso Directo WhatsApp | `ContactPage`, `ContactPoint` |
| `/sitemap.xml` | Generado dinámicamente | Sitemap XML para Google Search Console | XML Sitemap Standard |

---

## 🔐 4. Estado del Certificado SSL (Let's Encrypt)

- **Diagnóstico:** Los validadores globales secundarios de Let's Encrypt devolvieron `DNS problem: networking error during secondary validation`.
- **Causa:** La delegación de `fedenowback.com.ar` desde NIC Argentina hacia los DNS de Hostinger (`cosmos.dns-parking.com` y `nova.dns-parking.com`) fue reciente y algunos resolvers internacionales de Let's Encrypt sufren timeouts temporales.
- **Solución:**
  1. El sitio web ya está accesible vía `http://fedenowback.com.ar`.
  2. En cuanto pasen unos minutos de propagación, entrás a [Ploi -> fedenowback.com.ar -> SSL](https://ploi.io/panel/servers/105871/sites/406351), seleccionás **Let's Encrypt** y hacés clic en **Add certificate**.

---

## 🎯 5. Checklist de Tareas Pendientes para Continuar en la Carpeta `fedenowback`

Al abrir la carpeta `/home/mfmujic/fedenowback` como espacio de trabajo independiente:

- [ ] **1. Emitir SSL:** Solicitar certificado Let's Encrypt en el panel de Ploi una vez asentada la propagación.
- [ ] **2. Túneles SSH Mac:** Si necesitás acceder al dev server desde tu Mac, verificar que `hvtunnels` incluya `-L 8015:localhost:8015`.
- [ ] **3. Limpiar monolito en `estudio-pericias`:** Eliminar las vistas y rutas viejas de Fede Nowback de `estudio-pericias/proyecto/Estudio_Pericial_Sur/website-php/` para mantener el repositorio pericial 100% enfocado en psicología forense.
- [ ] **4. Google Search Console & Analytics:** Configurar las etiquetas de seguimiento y subir el sitemap `https://fedenowback.com.ar/sitemap.xml`.
