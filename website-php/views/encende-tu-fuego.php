<?php
/**
 * Landing Page de Alta Conversión - Evento "Encendé tu Fuego"
 * Fede Nowback — Sábado 12 de Septiembre, 9:30 a 12:00 hs — Lavalle 362 Piso 7, CABA
 * WhatsApp Oficial: +54 9 11 3820-5570
 */

$page_title = "Encendé tu Fuego | Masterclass Presencial en CABA — Fede Nowback";
$page_desc = "Evento presencial exclusivo: 7 reglas para dejar de postergar, vencer el miedo y cumplir tus metas. Sábado 12 de Septiembre de 9:30 a 12:00 hs en Lavalle 362 Piso 7 (CABA). ¡Últimos 6 lugares!";
$canonical_url = "https://fedenowback.com.ar";
$og_image = "https://fedenowback.com.ar/assets/img/evento_encende_tu_fuego.jpg";

function get_evento_wa($msg = '') {
    if (empty($msg)) {
        $msg = "Hola Fede! Quiero reservar uno de los últimos 6 lugares para el evento presencial 'Encendé tu Fuego' del 12 de Septiembre en Lavalle 362.";
    }
    return "https://wa.me/5491138205570?text=" . urlencode($msg);
}
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta name="keywords" content="encende tu fuego, fede nowback, evento dejar de postergar, masterclass presencial caba, desarrollo personal buenos aires, metas 2026">
  <meta name="author" content="Fede Nowback">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <link rel="canonical" href="<?= htmlspecialchars($canonical_url) ?>">

  <!-- Favicons Oficiales Fede Nowback -->
  <link rel="icon" type="image/x-icon" href="/favicon.ico?v=6">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png?v=6">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon-180x180.png?v=6">

  <!-- Open Graph / WhatsApp Preview -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_AR">
  <meta property="og:site_name" content="Fede Nowback">
  <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical_url) ?>">
  <meta property="og:image" content="<?= htmlspecialchars($og_image) ?>?v=3">
  <meta property="og:image:secure_url" content="<?= htmlspecialchars($og_image) ?>?v=3">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="682">
  <meta property="og:image:height" content="1024">
  <meta property="og:image:alt" content="Encendé tu Fuego - Fede Nowback">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($og_image) ?>?v=3">

  <!-- Google Fonts: Montserrat (Tipografía con pegada y autoridad) + Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

  <!-- Schema.org JSON-LD Event -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Event",
    "name": "Encendé tu Fuego: 7 Reglas para Dejar de Postergar y Cumplir tus Metas",
    "description": "Masterclass presencial de mentalidad, superación del miedo y ejecución de objetivos con Fede Nowback.",
    "image": "https://fedenowback.com.ar/assets/img/evento_encende_tu_fuego.jpg",
    "startDate": "2026-09-12T09:30:00-03:00",
    "endDate": "2026-09-12T12:00:00-03:00",
    "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
    "eventStatus": "https://schema.org/EventScheduled",
    "location": {
      "@type": "Place",
      "name": "Auditorio Lavalle 362",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Lavalle 362 Piso 7",
        "addressLocality": "Ciudad Autónoma de Buenos Aires",
        "addressRegion": "CABA",
        "addressCountry": "AR"
      }
    },
    "organizer": {
      "@type": "Person",
      "name": "Fede Nowback",
      "url": "https://fedenowback.com.ar",
      "sameAs": [
        "https://www.instagram.com/fedenowback/",
        "https://www.tiktok.com/@fedenowback"
      ]
    }
  }
  </script>

  <style>
    :root {
      --f-bg: #06080d;
      --f-card: rgba(18, 22, 32, 0.88);
      --f-card-hover: rgba(26, 32, 46, 0.95);
      --f-orange: #ff5500;
      --f-yellow: #ffb703;
      --f-red: #d90429;
      --f-text: #ffffff;
      --f-muted: #9ca3af;
      --f-sub: #d1d5db;
      --f-font-h: 'Montserrat', sans-serif;
      --f-font-b: 'Inter', sans-serif;
      --f-border: rgba(255, 255, 255, 0.08);
      --f-border-fire: rgba(255, 85, 0, 0.35);
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      background-color: var(--f-bg);
      color: var(--f-text);
      font-family: var(--f-font-b);
      line-height: 1.6;
      -webkit-font-smoothing: antialiased;
    }

    .container {
      max-width: 1060px;
      margin: 0 auto;
      padding: 0 20px;
    }

    /* Top Sticky Bar de Urgencia */
    .top-urgency-bar {
      background: linear-gradient(90deg, #d90429, #ff5500, #d90429);
      background-size: 200% 100%;
      animation: pulseGlow 4s linear infinite;
      color: #fff;
      text-align: center;
      padding: 10px 15px;
      font-family: var(--f-font-h);
      font-size: 0.88rem;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }

    @keyframes pulseGlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Header Minimalista (Sin enlaces distractivos) */
    .landing-header {
      padding: 14px 0;
      border-bottom: 1px solid var(--f-border);
      background: rgba(6, 8, 13, 0.92);
      position: sticky;
      top: 0;
      z-index: 100;
      backdrop-filter: blur(14px);
    }

    .header-wrap {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .brand-tag {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      color: #fff;
    }

    .brand-badge {
      background: linear-gradient(135deg, var(--f-orange), var(--f-red));
      color: #fff;
      font-family: var(--f-font-h);
      font-weight: 900;
      font-size: 0.8rem;
      padding: 4px 10px;
      border-radius: 6px;
      letter-spacing: 0.05em;
    }

    .brand-text {
      font-family: var(--f-font-h);
      font-weight: 800;
      font-size: 1.15rem;
    }

    /* Botón WhatsApp Header */
    .btn-wa-header {
      background: linear-gradient(135deg, #25D366, #128C7E);
      color: #fff;
      font-family: var(--f-font-b);
      font-weight: 700;
      font-size: 0.9rem;
      padding: 10px 20px;
      border-radius: 9999px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 4px 15px rgba(37, 211, 102, 0.35);
      transition: all 0.25s ease;
    }

    .btn-wa-header:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(37, 211, 102, 0.5);
    }

    /* Hero Section */
    .hero {
      position: relative;
      padding: 45px 0 65px;
      overflow: hidden;
    }

    .hero-glow {
      position: absolute;
      top: -120px;
      left: 50%;
      transform: translateX(-50%);
      width: 600px;
      height: 600px;
      background: radial-gradient(circle, rgba(255, 85, 0, 0.2) 0%, rgba(217, 4, 41, 0.05) 60%, transparent 70%);
      filter: blur(80px);
      pointer-events: none;
      z-index: 0;
    }

    .hero-grid {
      display: grid;
      grid-template-columns: 1.15fr 0.85fr;
      gap: 36px;
      align-items: center;
      position: relative;
      z-index: 1;
    }

    .badge-presencial {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(255, 85, 0, 0.12);
      border: 1px solid rgba(255, 85, 0, 0.4);
      color: var(--f-yellow);
      font-family: var(--f-font-h);
      font-size: 0.82rem;
      font-weight: 900;
      padding: 6px 14px;
      border-radius: 9999px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 16px;
    }

    .hero-h1 {
      font-family: var(--f-font-h);
      font-size: clamp(2.4rem, 4.8vw, 3.8rem);
      font-weight: 900;
      line-height: 1.05;
      text-transform: uppercase;
      margin-bottom: 14px;
    }

    .fire-text {
      background: linear-gradient(135deg, var(--f-yellow) 0%, var(--f-orange) 50%, var(--f-red) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .hero-lead {
      font-size: 1.12rem;
      color: var(--f-sub);
      margin-bottom: 24px;
      line-height: 1.55;
    }

    /* Contador Regresivo en Vivo */
    .countdown-box {
      background: rgba(0, 0, 0, 0.5);
      border: 1px solid var(--f-border-fire);
      border-radius: 12px;
      padding: 16px 20px;
      margin-bottom: 24px;
    }

    .countdown-title {
      font-size: 0.78rem;
      color: var(--f-muted);
      text-transform: uppercase;
      font-weight: 800;
      letter-spacing: 0.05em;
      margin-bottom: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .countdown-timer {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 10px;
      text-align: center;
    }

    .time-card {
      background: rgba(255, 85, 0, 0.08);
      border: 1px solid rgba(255, 85, 0, 0.2);
      border-radius: 8px;
      padding: 8px 4px;
    }

    .time-num {
      font-family: var(--f-font-h);
      font-size: 1.6rem;
      font-weight: 900;
      color: var(--f-yellow);
      line-height: 1;
    }

    .time-lbl {
      font-size: 0.68rem;
      color: var(--f-muted);
      text-transform: uppercase;
      font-weight: 700;
      margin-top: 4px;
    }

    /* Barra de Escasez */
    .scarcity-wrap {
      margin-bottom: 24px;
    }

    .scarcity-header {
      display: flex;
      justify-content: space-between;
      font-size: 0.85rem;
      font-weight: 700;
      margin-bottom: 6px;
    }

    .scarcity-bar-bg {
      width: 100%;
      height: 10px;
      background: rgba(255,255,255,0.1);
      border-radius: 9999px;
      overflow: hidden;
    }

    .scarcity-bar-fill {
      width: 88%;
      height: 100%;
      background: linear-gradient(90deg, var(--f-yellow), var(--f-orange), var(--f-red));
      border-radius: 9999px;
    }

    /* Event Data Cards Grid */
    .event-details-grid {
      background: var(--f-card);
      border: 1px solid var(--f-border-fire);
      border-radius: 14px;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 12px;
      margin-bottom: 28px;
    }

    .detail-item {
      display: flex;
      flex-direction: column;
      gap: 3px;
    }

    .detail-lbl {
      font-size: 0.72rem;
      color: var(--f-muted);
      text-transform: uppercase;
      font-weight: 700;
    }

    .detail-val {
      font-family: var(--f-font-h);
      font-size: 0.98rem;
      font-weight: 800;
      color: #fff;
    }

    /* Botón Fuego Principal */
    .btn-fire-hero {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      background: linear-gradient(135deg, var(--f-orange), var(--f-yellow));
      color: #000;
      font-family: var(--f-font-h);
      font-weight: 900;
      font-size: 1.05rem;
      padding: 16px 32px;
      border-radius: 9999px;
      text-decoration: none;
      box-shadow: 0 6px 25px rgba(255, 85, 0, 0.45);
      transition: all 0.25s ease;
      text-transform: uppercase;
      letter-spacing: 0.03em;
      width: 100%;
      text-align: center;
    }

    .btn-fire-hero:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 35px rgba(255, 85, 0, 0.65);
      background: linear-gradient(135deg, #ff6b1a, #ffc629);
    }

    .flyer-hero-img {
      width: 100%;
      border-radius: 16px;
      border: 2px solid rgba(255, 85, 0, 0.4);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.7), 0 0 30px rgba(255, 85, 0, 0.25);
      display: block;
    }

    /* Secciones */
    .section-wrap {
      padding: 65px 0;
      border-top: 1px solid var(--f-border);
    }

    .sec-header {
      text-align: center;
      max-width: 680px;
      margin: 0 auto 45px;
    }

    .sec-tag {
      color: var(--f-yellow);
      font-family: var(--f-font-h);
      font-size: 0.82rem;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      margin-bottom: 8px;
      display: block;
    }

    .sec-title {
      font-family: var(--f-font-h);
      font-size: clamp(1.8rem, 3.5vw, 2.5rem);
      font-weight: 900;
      line-height: 1.15;
      text-transform: uppercase;
      margin-bottom: 12px;
    }

    /* PAS (Problema - Agitación - Solución) */
    .pas-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .pas-card {
      background: var(--f-card);
      border: 1px solid var(--f-border);
      border-radius: 14px;
      padding: 26px;
    }

    .pas-card.highlight {
      border-color: var(--f-orange);
      background: linear-gradient(180deg, rgba(255, 85, 0, 0.12) 0%, rgba(18, 22, 32, 0.95) 100%);
    }

    .pas-icon {
      font-size: 2rem;
      margin-bottom: 14px;
    }

    .pas-h3 {
      font-family: var(--f-font-h);
      font-size: 1.15rem;
      font-weight: 800;
      margin-bottom: 10px;
      color: #fff;
    }

    .pas-p {
      color: var(--f-muted);
      font-size: 0.92rem;
      line-height: 1.55;
    }

    /* Las 7 Reglas */
    .rules-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 18px;
    }

    .rule-card {
      background: var(--f-card);
      border: 1px solid var(--f-border);
      border-radius: 12px;
      padding: 22px;
      display: flex;
      gap: 16px;
      align-items: flex-start;
    }

    .rule-card:hover {
      border-color: var(--f-border-fire);
    }

    .rule-num {
      width: 42px;
      height: 42px;
      background: rgba(255, 85, 0, 0.15);
      border: 1px solid var(--f-border-fire);
      color: var(--f-yellow);
      font-family: var(--f-font-h);
      font-weight: 900;
      font-size: 1.25rem;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .rule-title {
      font-family: var(--f-font-h);
      font-size: 1.05rem;
      font-weight: 800;
      margin-bottom: 6px;
      color: #fff;
    }

    .rule-desc {
      color: var(--f-muted);
      font-size: 0.9rem;
      line-height: 1.5;
    }

    /* Agenda del Evento */
    .agenda-box {
      background: var(--f-card);
      border: 1px solid var(--f-border-fire);
      border-radius: 16px;
      padding: 32px;
      max-width: 780px;
      margin: 0 auto;
    }

    .agenda-item {
      display: flex;
      gap: 20px;
      padding: 16px 0;
      border-bottom: 1px solid rgba(255,255,255,0.06);
    }

    .agenda-item:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .agenda-time {
      font-family: var(--f-font-h);
      font-weight: 900;
      font-size: 1rem;
      color: var(--f-yellow);
      min-width: 80px;
    }

    .agenda-info strong {
      display: block;
      color: #fff;
      font-size: 1.02rem;
      margin-bottom: 4px;
    }

    .agenda-info p {
      color: var(--f-muted);
      font-size: 0.88rem;
    }

    /* Galería 3 Fotos Reales */
    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px;
    }

    .gallery-item {
      position: relative;
      border-radius: 12px;
      overflow: hidden;
      aspect-ratio: 4/5;
      border: 1px solid var(--f-border);
      background: #12151f;
    }

    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.35s ease;
    }

    .gallery-item:hover img {
      transform: scale(1.04);
    }

    .gallery-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, transparent 50%, rgba(6, 8, 13, 0.95) 100%);
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 16px;
    }

    /* Para quién es / No es */
    .who-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 24px;
    }

    .who-box {
      background: var(--f-card);
      border: 1px solid var(--f-border);
      border-radius: 14px;
      padding: 28px;
    }

    .who-box.yes { border-color: rgba(16, 185, 129, 0.35); }
    .who-box.no { border-color: rgba(217, 4, 41, 0.35); }

    .who-title {
      font-family: var(--f-font-h);
      font-size: 1.2rem;
      font-weight: 800;
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .who-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 12px;
      font-size: 0.92rem;
      color: var(--f-sub);
    }

    /* Sticky Floating WhatsApp */
    .wa-float {
      position: fixed;
      bottom: 24px;
      right: 24px;
      z-index: 999;
      display: flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(135deg, #25D366, #128C7E);
      color: #fff;
      padding: 14px 24px;
      border-radius: 9999px;
      text-decoration: none;
      font-family: var(--f-font-h);
      font-weight: 800;
      font-size: 0.92rem;
      box-shadow: 0 8px 30px rgba(37, 211, 102, 0.45);
      transition: all 0.25s ease;
    }

    .wa-float:hover {
      transform: translateY(-3px) scale(1.03);
      box-shadow: 0 12px 35px rgba(37, 211, 102, 0.65);
    }

    .pulse-dot {
      width: 10px;
      height: 10px;
      background: #ff5500;
      border-radius: 50%;
      display: inline-block;
      box-shadow: 0 0 10px #ff5500;
    }

    /* FAQ */
    .faq-list {
      max-width: 760px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .faq-item {
      background: var(--f-card);
      border: 1px solid var(--f-border);
      border-radius: 10px;
      padding: 18px 22px;
    }

    .faq-q {
      font-family: var(--f-font-h);
      font-weight: 800;
      font-size: 1rem;
      color: #fff;
      margin-bottom: 6px;
    }

    .faq-a {
      color: var(--f-muted);
      font-size: 0.92rem;
      line-height: 1.55;
    }

    /* Footer Simple */
    .landing-footer {
      border-top: 1px solid var(--f-border);
      padding: 36px 0;
      text-align: center;
      color: var(--f-muted);
      font-size: 0.85rem;
    }

    /* Responsive */
    @media (max-width: 860px) {
      .hero-grid, .pas-grid, .rules-grid, .gallery-grid, .who-grid, .event-details-grid {
        grid-template-columns: 1fr;
      }
      .countdown-timer {
        grid-template-columns: repeat(4, 1fr);
      }
    }
  </style>
</head>
<body>

  <!-- Barra Superior de Urgencia -->
  <div class="top-urgency-bar">
    ⚡ ¡Últimos 6 Lugares Disponibles! • Sábado 12 de Septiembre en Lavalle 362 (CABA)
  </div>

  <!-- Header Minimalista -->
  <header class="landing-header">
    <div class="container header-wrap">
      <div class="brand-tag">
        <span class="brand-badge">NOWBACK</span>
        <span class="brand-text">FEDE NOWBACK</span>
      </div>

      <a href="<?= get_evento_wa() ?>" target="_blank" rel="noopener noreferrer" class="btn-wa-header">
        <span>💬</span>
        <span>Reservar Lugar (+54 9 11 3820 5570)</span>
      </a>
    </div>
  </header>

  <!-- Hero Section con Técnicas de Venta -->
  <section class="hero">
    <div class="hero-glow"></div>
    <div class="container">
      <div class="hero-grid">
        
        <!-- Columna de Texto & Conversión -->
        <div>
          <span class="badge-presencial">
            <span class="pulse-dot"></span> Masterclass Presencial en CABA
          </span>
          <h1 class="hero-h1">
            ENCENDÉ <span class="fire-text">TU FUEGO</span>
          </h1>
          <p class="hero-lead">
            <strong>7 Reglas Prácticas para Dejar de Postergar, Vencer el Miedo y Cumplir tus Metas.</strong> Un encuentro intensivo de 2 horas y media para reprogramar tu disciplina y accionar definitivamente.
          </p>

          <!-- Contador Regresivo en Vivo -->
          <div class="countdown-box">
            <div class="countdown-title">
              <span>⏳ El evento comienza en:</span>
              <span style="color: var(--f-yellow);">Sábado 12/09 • 09:30 hs</span>
            </div>
            <div class="countdown-timer">
              <div class="time-card">
                <div class="time-num" id="cd-days">02</div>
                <div class="time-lbl">Días</div>
              </div>
              <div class="time-card">
                <div class="time-num" id="cd-hours">09</div>
                <div class="time-lbl">Horas</div>
              </div>
              <div class="time-card">
                <div class="time-num" id="cd-mins">15</div>
                <div class="time-lbl">Minutos</div>
              </div>
              <div class="time-card">
                <div class="time-num" id="cd-secs">30</div>
                <div class="time-lbl">Segundos</div>
              </div>
            </div>
          </div>

          <!-- Barra de Escasez / Cupos -->
          <div class="scarcity-wrap">
            <div class="scarcity-header">
              <span style="color: #ff4d6d;">🔥 Capacidad del Auditorio: 88% Reservado</span>
              <span style="color: var(--f-yellow);">Quedan 6 Entradas</span>
            </div>
            <div class="scarcity-bar-bg">
              <div class="scarcity-bar-fill"></div>
            </div>
          </div>

          <!-- Detalles del Evento -->
          <div class="event-details-grid">
            <div class="detail-item">
              <span class="detail-lbl">📅 Fecha</span>
              <span class="detail-val">12 de Septiembre</span>
            </div>
            <div class="detail-item">
              <span class="detail-lbl">⏰ Horario</span>
              <span class="detail-val">9:30 a 12:00 H</span>
            </div>
            <div class="detail-item">
              <span class="detail-lbl">📍 Ubicación</span>
              <span class="detail-val">Lavalle 362, Piso 7</span>
            </div>
          </div>

          <!-- CTA Principal -->
          <a href="<?= get_evento_wa() ?>" target="_blank" rel="noopener noreferrer" class="btn-fire-hero">
            🔥 Asegurar Mi Entrada por WhatsApp
          </a>
          <p style="text-align: center; color: var(--f-muted); font-size: 0.82rem; margin-top: 8px;">
            Coordinación y reserva directa con Fede al <strong>+54 9 11 3820-5570</strong>
          </p>
        </div>

        <!-- Flyer Oficial -->
        <div>
          <img src="/assets/img/evento_encende_tu_fuego.jpg" alt="Flyer Oficial Encendé tu Fuego - Fede Nowback" class="flyer-hero-img">
        </div>

      </div>
    </div>
  </section>

  <!-- Problema - Agitación - Solución (PAS) -->
  <section class="section-wrap">
    <div class="container">
      <div class="sec-header">
        <span class="sec-tag">El Diagnóstico</span>
        <h2 class="sec-title">¿Por qué seguís postergando lo que sabés que tenés que hacer?</h2>
      </div>

      <div class="pas-grid">
        <div class="pas-card">
          <div class="pas-icon">⏳</div>
          <h3 class="pas-h3">1. La Trampa del "Empiezo el Lunes"</h3>
          <p class="pas-p">Tenés ideas y ganas, pero cuando llega el momento de ejecutar te gana la pereza, la distracción del celular o el cansancio mental.</p>
        </div>

        <div class="pas-card">
          <div class="pas-icon">🛑</div>
          <h3 class="pas-h3">2. El Miedo al Qué Dirán</h3>
          <p class="pas-p">Te da vergüenza mostrarte, temés que tus conocidos te critiquen o pensás que no estás 100% listo para dar el paso.</p>
        </div>

        <div class="pas-card highlight">
          <div class="pas-icon">🔥</div>
          <h3 class="pas-h3" style="color: var(--f-yellow);">3. La Solución: Encender tu Fuego</h3>
          <p class="pas-p" style="color: #fff;">Un sistema mental y de hábitos probado para salir de la inercia, blindar tu convicción y sostener la disciplina pase lo que pase.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Las 7 Reglas del Encuentro -->
  <section class="section-wrap" style="background: rgba(255,255,255,0.015);">
    <div class="container">
      <div class="sec-header">
        <span class="sec-tag">El Programa de Transformación</span>
        <h2 class="sec-title">Las 7 Reglas que vas a incorporar</h2>
      </div>

      <div class="rules-grid">
        <div class="rule-card">
          <div class="rule-num">1</div>
          <div>
            <h3 class="rule-title">Destruir la Procrastinación de Raíz</h3>
            <p class="rule-desc">El método exacto para eliminar las justificaciones mentales y ejecutar en bloques de acción masiva.</p>
          </div>
        </div>

        <div class="rule-card">
          <div class="rule-num">2</div>
          <div>
            <h3 class="rule-title">Blindaje Mental contra las Críticas</h3>
            <p class="rule-desc">Cómo desapegarte de la opinión ajena: los que critican nunca están en la arena construyendo.</p>
          </div>
        </div>

        <div class="rule-card">
          <div class="rule-num">3</div>
          <div>
            <h3 class="rule-title">Gestión de la Frustración y el Rechazo</h3>
            <p class="rule-desc">Cómo mantener la energía y la convicción intactas cuando los resultados tardan o se caen ventas.</p>
          </div>
        </div>

        <div class="rule-card">
          <div class="rule-num">4</div>
          <div>
            <h3 class="rule-title">El Poder del Círculo Íntimo</h3>
            <p class="rule-desc">Cómo purgar entornos tóxicos y rodearte de personas que te exijan subir tu estándar de vida.</p>
          </div>
        </div>

        <div class="rule-card">
          <div class="rule-num">5</div>
          <div>
            <h3 class="rule-title">Estructura de Metas Inquebrantables</h3>
            <p class="rule-desc">La ingeniería inversa de objetivos: cómo dividir una meta grande en 3 acciones diarias simples.</p>
          </div>
        </div>

        <div class="rule-card">
          <div class="rule-num">6</div>
          <div>
            <h3 class="rule-title">Hábitos de Alta Energía y Foco</h3>
            <p class="rule-desc">Rutinas de desconexión y enfoque profundo para triplicar tu productividad sin quemarte.</p>
          </div>
        </div>

        <div class="rule-card" style="grid-column: 1 / -1; background: linear-gradient(135deg, rgba(255,85,0,0.1) 0%, rgba(18,22,32,0.9) 100%); border-color: var(--f-orange);">
          <div class="rule-num" style="background: var(--f-orange); color: #000;">7</div>
          <div>
            <h3 class="rule-title" style="color: var(--f-yellow);">De Gacela a León: Autoestima y Liderazgo</h3>
            <p class="rule-desc" style="color: #fff;">Dejar de actuar desde la escasez o la necesidad para negociar, vender y vivir con absoluta autoridad.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Agenda del Evento -->
  <section class="section-wrap">
    <div class="container">
      <div class="sec-header">
        <span class="sec-tag">Cronograma Oficial</span>
        <h2 class="sec-title">Agenda • Sábado 12 de Septiembre</h2>
      </div>

      <div class="agenda-box">
        <div class="agenda-item">
          <div class="agenda-time">09:30 hs</div>
          <div class="agenda-info">
            <strong>Acreditación & Café de Bienvenida</strong>
            <p>Recepción en Lavalle 362 Piso 7, entrega de materiales y networking inicial.</p>
          </div>
        </div>

        <div class="agenda-item">
          <div class="agenda-time">10:00 hs</div>
          <div class="agenda-info">
            <strong>Bloque 1: Romper la Inercia & Superar el Miedo</strong>
            <p>Destrucción de creencias limitantes, superación de la vergüenza y reglas 1 a 3.</p>
          </div>
        </div>

        <div class="agenda-item">
          <div class="agenda-time">10:45 hs</div>
          <div class="agenda-info">
            <strong>Bloque 2: Hábitos, Metas y Entornos Ganadores</strong>
            <p>Estructura de ejecución diaria, blindaje mental y reglas 4 a 7.</p>
          </div>
        </div>

        <div class="agenda-item">
          <div class="agenda-time">11:30 hs</div>
          <div class="agenda-info">
            <strong>Bloque 3: Preguntas & Respuestas en Vivo + Cierre</strong>
            <p>Resolución de casos en vivo con Fede, dinámicas de compromiso y networking final.</p>
          </div>
        </div>
      </div>

      <div style="text-align: center; margin-top: 32px;">
        <a href="<?= get_evento_wa() ?>" target="_blank" rel="noopener noreferrer" class="btn-fire-hero" style="max-width: 440px; margin: 0 auto;">
          🔥 Reservar Mi Asiento Ahora
        </a>
      </div>
    </div>
  </section>

  <!-- Quién es Fede Nowback (3 Fotos Reales) -->
  <section class="section-wrap" style="background: rgba(255,255,255,0.015);">
    <div class="container">
      <div class="sec-header">
        <span class="sec-tag">Tu Mentor</span>
        <h2 class="sec-title">Conocé a Fede Nowback</h2>
        <p style="color: var(--f-muted);">+65.000 seguidores en redes • Estratega de Marca Personal & Mentor de Negocios</p>
      </div>

      <div class="gallery-grid" style="margin-bottom: 36px;">
        <div class="gallery-item">
          <img src="/assets/img/fede_nowback_hero.jpg" alt="Fede Nowback Estratega de Marca Personal">
          <div class="gallery-overlay">
            <strong style="color:#fff;">Fede Nowback</strong>
            <span style="font-size:0.8rem; color:var(--f-yellow);">Estratega de Marca Personal</span>
          </div>
        </div>

        <div class="gallery-item">
          <img src="/assets/img/fede_nowback_fuego.jpg" alt="Fede Nowback Encendé tu Fuego">
          <div class="gallery-overlay">
            <strong style="color:#fff;">Disciplina & Metas</strong>
            <span style="font-size:0.8rem; color:var(--f-yellow);">7 Reglas de Ejecución</span>
          </div>
        </div>

        <div class="gallery-item">
          <img src="/assets/img/evento_encende_tu_fuego.jpg" alt="Flyer Evento CABA">
          <div class="gallery-overlay">
            <strong style="color:#fff;">Sábado 12 de Septiembre</strong>
            <span style="font-size:0.8rem; color:var(--f-yellow);">Lavalle 362 Piso 7</span>
          </div>
        </div>
      </div>

      <!-- Historia Real de Transformación -->
      <div style="background: var(--f-card); border: 1px solid var(--f-border); border-radius: 14px; padding: 32px; max-width: 820px; margin: 0 auto;">
        <h3 style="font-family: var(--f-font-h); font-size: 1.3rem; font-weight: 900; margin-bottom: 12px; color: #fff;">
          "No nací con confianza. Tuve que filmarme con miedo."
        </h3>
        <p style="color: var(--f-sub); margin-bottom: 12px; font-size: 0.95rem;">
          Durante años sufrí ataques de ansiedad, inseguridades profundas y el temor constante al qué dirán. Trabajaba en relación de dependencia sintiendo que mis semanas se repetían en un bucle sin sentido.
        </p>
        <p style="color: var(--f-sub); margin-bottom: 16px; font-size: 0.95rem;">
          Cuando decidí tomar el control de mi mente, de mis hábitos y de mis decisiones, logré construir una comunidad de decenas de miles de personas y vivir 100% de mi pasión. En este evento presencial te voy a entregar exactamente las reglas que me permitieron dar ese salto.
        </p>
        <div style="border-left: 3px solid var(--f-orange); background: rgba(255,85,0,0.08); padding: 12px 18px; border-radius: 0 8px 8px 0; font-style: italic; color: #fff; font-weight: 600;">
          "Dejá de actuar como una gacela cuando dentro tuyo vive un león. El momento de encender tu fuego es ahora."
        </div>
      </div>
    </div>
  </section>

  <!-- Para Quién Es y Para Quién NO Es -->
  <section class="section-wrap">
    <div class="container">
      <div class="sec-header">
        <span class="sec-tag">Filtro de Compromiso</span>
        <h2 class="sec-title">¿Este evento es para vos?</h2>
      </div>

      <div class="who-grid">
        <div class="who-box yes">
          <div class="who-title" style="color: #10b981;">
            <span>✅</span> SÍ es para vos si:
          </div>
          <ul class="who-list">
            <li>• Estás cansado de postergar proyectos y querés un plan de acción claro.</li>
            <li>• Querés superar el miedo al juicio ajeno y la vergüenza de mostrarte.</li>
            <li>• Buscás rodearte de personas enfocadas y con ganas de crecer.</li>
            <li>• Estás dispuesto a incomodarte para subir tu estándar de vida.</li>
          </ul>
        </div>

        <div class="who-box no">
          <div class="who-title" style="color: #ef4444;">
            <span>❌</span> NO es para vos si:
          </div>
          <ul class="who-list">
            <li>• Buscás fórmulas mágicas o resultados de la noche a la mañana.</li>
            <li>• Preferís quedarte en la queja y culpar a las circunstancias.</li>
            <li>• No estás dispuesto a invertir 2 horas y media en tu propio crecimiento.</li>
            <li>• No vas a poner en práctica lo que aprendas al salir del auditorio.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section-wrap" style="background: rgba(255,255,255,0.015);">
    <div class="container">
      <div class="sec-header">
        <span class="sec-tag">Preguntas Frecuentes</span>
        <h2 class="sec-title">Dudas Comunes</h2>
      </div>

      <div class="faq-list">
        <div class="faq-item">
          <div class="faq-q">¿Dónde y a qué hora es exactamente?</div>
          <div class="faq-a">Es el <strong>Sábado 12 de Septiembre de 9:30 a 12:00 hs</strong> en <strong>Lavalle 362, Piso 7, Ciudad de Buenos Aires (CABA)</strong>.</div>
        </div>

        <div class="faq-item">
          <div class="faq-q">¿Cómo aseguro mi lugar y cuáles son los medios de pago?</div>
          <div class="faq-a">Hacés clic en los botones de WhatsApp y coordinás tu entrada directamente con Fede al <strong>+54 9 11 3820-5570</strong> (transferencia bancaria / Mercado Pago).</div>
        </div>

        <div class="faq-item">
          <div class="faq-q">¿Puedo ir si todavía no tengo un negocio en marcha?</div>
          <div class="faq-a">Totalmente. El evento trabaja los fundamentos de disciplina, superación del miedo y enfoque que aplican tanto para emprender como para tu vida personal.</div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Final con Urgencia -->
  <section class="section-wrap" style="padding-bottom: 90px;">
    <div class="container">
      <div style="background: linear-gradient(135deg, #2b0c03 0%, #150600 100%); border: 2px solid var(--f-orange); border-radius: 18px; padding: 48px 24px; text-align: center; box-shadow: 0 0 50px rgba(255, 85, 0, 0.3);">
        <span style="background: var(--f-red); color: #fff; font-family: var(--f-font-h); font-weight: 900; font-size: 0.8rem; padding: 4px 14px; border-radius: 9999px; text-transform: uppercase;">
          ⚠️ ÚLTIMOS 6 LUGARES
        </span>
        <h2 style="font-family: var(--f-font-h); font-size: clamp(2rem, 4vw, 2.8rem); font-weight: 900; text-transform: uppercase; margin: 16px 0 10px;">
          ¿Vas a seguir postergando o vas a encender tu fuego?
        </h2>
        <p style="color: #e5e7eb; font-size: 1.1rem; max-width: 540px; margin: 0 auto 28px;">
          No dejes pasar otro mes en el mismo lugar. Asegurá tu entrada ahora antes de que se agoten los cupos.
        </p>
        <a href="<?= get_evento_wa() ?>" target="_blank" rel="noopener noreferrer" class="btn-fire-hero" style="max-width: 460px; margin: 0 auto;">
          🔥 Quiero Mi Entrada por WhatsApp
        </a>
      </div>
    </div>
  </section>

  <!-- Footer Simple -->
  <footer class="landing-footer">
    <div class="container">
      <p style="margin-bottom: 6px;">&copy; <?= date('Y') ?> <strong>Fede Nowback</strong>. Todos los derechos reservados.</p>
      <p>Consultas WhatsApp directo: <strong>+54 9 11 3820-5570</strong> • Instagram: <strong>@fedenowback</strong></p>
    </div>
  </footer>

  <!-- Floating Sticky WhatsApp Button -->
  <a href="<?= get_evento_wa() ?>" target="_blank" rel="noopener noreferrer" class="wa-float" aria-label="WhatsApp Fede Nowback">
    <span style="font-size: 1.3rem;">💬</span>
    <span>Reservar (+54 9 11 3820 5570)</span>
  </a>

  <!-- Script Contador Regresivo en Tiempo Real -->
  <script>
    function updateCountdown() {
      // Fecha del evento: Sábado 12 de Septiembre 2026 a las 09:30 AM (GMT-3)
      const eventDate = new Date("2026-09-12T09:30:00-03:00").getTime();
      const now = new Date().getTime();
      const diff = eventDate - now;

      if (diff > 0) {
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const secs = Math.floor((diff % (1000 * 60)) / 1000);

        document.getElementById('cd-days').textContent = String(days).padStart(2, '0');
        document.getElementById('cd-hours').textContent = String(hours).padStart(2, '0');
        document.getElementById('cd-mins').textContent = String(mins).padStart(2, '0');
        document.getElementById('cd-secs').textContent = String(secs).padStart(2, '0');
      } else {
        document.getElementById('cd-days').textContent = '00';
        document.getElementById('cd-hours').textContent = '00';
        document.getElementById('cd-mins').textContent = '00';
        document.getElementById('cd-secs').textContent = '00';
      }
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
  </script>

</body>
</html>
