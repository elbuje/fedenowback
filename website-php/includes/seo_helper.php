<?php
/**
 * SEO & CRO Helper - Fede Nowback (https://fedenowback.com.ar)
 * Generador de Metadatos, Geo-SEO, OpenGraph, JSON-LD Schema y Botón Flotante CRO
 */

function render_seo_head($page_data = []) {
    $title = $page_data['title'] ?? 'Fede Nowback | Estrategia de Marca Personal, Mentalidad y Negocios Digitales';
    $desc = $page_data['description'] ?? 'Especialista en escalar marcas personales, monetizar conocimiento y crear contenido de alta conversión. Mentorías 1 a 1, Campus Pro y Workshops.';
    $canonical = $page_data['canonical'] ?? SITE_URL . parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $og_img = $page_data['og_image'] ?? SITE_URL . '/assets/img/fede_nowback_hero.jpg';
    $og_type = $page_data['og_type'] ?? 'website';
    $keywords = $page_data['keywords'] ?? 'fede nowback, marca personal, negocios digitales, mentoría creadores, monetizar conocimiento, buenos aires argentina, consultoría de marca, escalar redes sociales';
    $schema_type = $page_data['schema_type'] ?? 'person';
    $extra_schema = $page_data['extra_schema'] ?? null;
    ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($desc) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($keywords) ?>">
  <meta name="author" content="Fede Nowback">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- Favicons Oficiales Fede Nowback -->
  <link rel="icon" type="image/x-icon" href="/favicon.ico?v=6">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png?v=6">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon-180x180.png?v=6">

  <!-- Geo-Targeting & Local SEO (Argentina / LATAM) -->
  <meta name="geo.region" content="AR-C">
  <meta name="geo.placename" content="Buenos Aires, Argentina">
  <meta name="geo.position" content="-34.6037;-58.3816">
  <meta name="ICBM" content="-34.6037, -58.3816">
  <meta name="language" content="Spanish">
  <meta name="coverage" content="Worldwide">
  <meta name="distribution" content="Global">

  <!-- Open Graph / Redes Sociales & WhatsApp -->
  <meta property="og:type" content="<?= htmlspecialchars($og_type) ?>">
  <meta property="og:locale" content="es_AR">
  <meta property="og:site_name" content="Fede Nowback">
  <meta property="og:title" content="<?= htmlspecialchars($title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($desc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
  <meta property="og:image" content="<?= htmlspecialchars($og_img) ?>">
  <meta property="og:image:secure_url" content="<?= htmlspecialchars($og_img) ?>">
  <meta property="og:image:alt" content="<?= htmlspecialchars($title) ?>">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($title) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($desc) ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($og_img) ?>">

  <!-- Preconnect & Webfonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="/assets/css/styles.css?v=3.2">
  <?php if (!empty($page_data['extra_css'])): ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($page_data['extra_css']) ?>">
  <?php endif; ?>

  <!-- Schema.org JSON-LD Específico -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Person",
        "@id": "<?= SITE_URL ?>/#person",
        "name": "Fede Nowback",
        "alternateName": "Federico Nowback",
        "jobTitle": "Estratega de Marca Personal & Mentor de Negocios Digitales",
        "description": "Especialista en escalado de marcas personales, creación de contenido estratégico y negocios digitales para profesionales y creadores en Argentina y Latinoamérica.",
        "url": "<?= SITE_URL ?>",
        "image": "<?= SITE_URL ?>/assets/img/fede_nowback_hero.jpg",
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "Buenos Aires",
          "addressCountry": "AR"
        },
        "sameAs": [
          "https://www.instagram.com/fedenowback/",
          "https://www.tiktok.com/@fedenowback",
          "https://www.threads.com/@fedenowback",
          "https://www.youtube.com/@fedenowback6170"
        ]
      },
      {
        "@type": "WebSite",
        "@id": "<?= SITE_URL ?>/#website",
        "url": "<?= SITE_URL ?>",
        "name": "Fede Nowback",
        "publisher": {
          "@id": "<?= SITE_URL ?>/#person"
        }
      }
      <?php if (!empty($extra_schema)): ?>,
      <?= json_encode($extra_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
      <?php endif; ?>
    ]
  }
  </script>
<?php
}

function render_whatsapp_float($custom_msg = '') {
    $wa_url = get_whatsapp_url($custom_msg);
    ?>
    <!-- WhatsApp Floating Conversion Widget -->
    <a href="<?= $wa_url ?>" target="_blank" rel="noopener noreferrer" class="fede-wa-float" aria-label="Contactar a Fede Nowback por WhatsApp">
      <div class="fede-wa-float-pulse"></div>
      <svg class="fede-wa-float-icon" viewBox="0 0 24 24" width="32" height="32" fill="currentColor">
        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.53 1.77.813 2.796.814h.005c3.181 0 5.768-2.586 5.768-5.766 0-3.18-2.587-5.766-5.773-5.766zm3.376 8.207c-.144.405-.837.774-1.17.824-.312.045-.718.067-1.164-.076-.273-.087-.629-.21-1.072-.403-1.879-.817-3.098-2.73-3.192-2.855-.094-.125-.764-1.016-.764-1.938 0-.922.483-1.376.655-1.564.172-.188.376-.235.501-.235.125 0 .25.002.359.007.116.005.271-.044.423.322.156.376.532 1.299.579 1.393.047.094.078.204.016.33-.063.125-.094.204-.188.313-.094.11-.198.245-.282.33-.094.094-.192.196-.083.384.11.188.487.804 1.045 1.302.721.642 1.328.841 1.516.935.188.094.297.078.407-.047.11-.125.469-.547.594-.735.125-.188.25-.156.422-.094.172.062 1.094.516 1.282.61.188.094.313.141.359.219.047.078.047.453-.097.858z"/>
      </svg>
      <span class="fede-wa-float-badge">Online</span>
    </a>
    <?php
}
