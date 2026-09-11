# 🏛️ Arquitectura del Sistema — Fede Nowback

## 1. Patrón Arquitectónico
El proyecto sigue un patrón **MVC Ligero en PHP Nativo (Vanilla)**, sin dependencias de frameworks pesados como Laravel o Symfony, optimizado para máxima velocidad de respuesta y bajo consumo de recursos.

- **Punto de Entrada Único:** `website-php/public/index.php` actúa como Front Controller.
- **Ruteador:** Normaliza `REQUEST_URI` descartando query strings y resuelve la vista correspondiente en `website-php/views/`.
- **Layout Modular:** Las vistas consumen componentes comunes (`website-php/views/layout/header.php` y `website-php/views/layout/footer.php`).

## 2. Componentes Clave
- `website-php/includes/config.php`: Constantes globales (`SITE_URL`, `SITE_PHONE`, redes, WhatsApp generator).
- `website-php/includes/seo_helper.php`: Motor dinámico de etiquetas SEO y JSON-LD.
- `website-php/includes/db.php`: Conector PDO singleton con auto-migración de tablas (`fede_db_init_schema()`).
- `website-php/includes/community_store.php`: Lógica de negocio para ranking, debates, cursos y perfiles del Campus Pro.
