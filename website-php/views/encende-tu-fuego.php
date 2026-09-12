<?php
/**
 * Landing Page de Alta Conversión — ENCENDÉ TU FUEGO: Oferta Exclusiva de Acompañamiento
 * Fede Nowback — Programas & Membresías
 * WhatsApp Oficial: +54 9 11 3820-5570
 */

$page_title = "Encendé tu Fuego | Programas & Acompañamiento — Fede Nowback";
$page_desc = "Elegí cómo querés que te acompañe: 3 modalidades según el nivel de claridad, estrategia y aceleración que necesita hoy tu negocio o marca personal.";
$canonical_url = "https://fedenowback.com.ar/encende-tu-fuego";

function get_fede_wa_link($msg = '') {
    if (empty($msg)) {
        $msg = "Hola Fede! Tengo una consulta sobre los programas de Encendé tu Fuego.";
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
  <meta name="keywords" content="encende tu fuego, fede nowback, mentoria marca personal, comunidad emprendedores, templos de fuego, aceleracion negocios digitales">
  <meta name="author" content="Fede Nowback">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <link rel="canonical" href="<?= htmlspecialchars($canonical_url) ?>">

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="/favicon.ico?v=6">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png?v=6">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon-180x180.png?v=6">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_AR">
  <meta property="og:site_name" content="Fede Nowback">
  <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical_url) ?>">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

  <style>
    :root {
      --f-bg: #07090e;
      --f-bg-alt: #0c0f17;
      --f-card: rgba(17, 22, 33, 0.92);
      --f-card-hover: rgba(23, 30, 46, 0.98);
      --f-card-popular: rgba(28, 20, 15, 0.95);
      --f-border: rgba(255, 255, 255, 0.08);
      --f-border-popular: rgba(255, 85, 0, 0.55);
      
      --f-fire: #ff5500;
      --f-fire-gold: #ffb703;
      --f-fire-amber: #fb8500;
      --f-fire-gradient: linear-gradient(135deg, #ff5500 0%, #ffb703 100%);
      --f-fire-gradient-glow: radial-gradient(circle at 50% 20%, rgba(255, 85, 0, 0.22) 0%, rgba(255, 183, 3, 0.06) 45%, transparent 70%);
      
      --f-text: #f8fafc;
      --f-text-muted: #94a3b8;
      --f-text-sub: #cbd5e1;
      
      --f-radius: 18px;
      --f-radius-sm: 10px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: var(--f-bg);
      color: var(--f-text);
      font-family: 'Inter', sans-serif;
      line-height: 1.5;
      overflow-x: hidden;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    /* Ambient Background Glow */
    .ambient-glow {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 750px;
      background: var(--f-fire-gradient-glow);
      pointer-events: none;
      z-index: 0;
    }

    .container {
      width: 100%;
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 20px;
      position: relative;
      z-index: 1;
    }

    /* Minimalist Top Nav */
    .site-header {
      padding: 22px 0;
      border-bottom: 1px solid var(--f-border);
      backdrop-filter: blur(12px);
      background: rgba(7, 9, 14, 0.85);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .nav-wrap {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
    }

    .brand-badge {
      background: var(--f-fire-gradient);
      color: #000;
      font-family: 'Montserrat', sans-serif;
      font-weight: 900;
      font-size: 0.78rem;
      padding: 4px 10px;
      border-radius: 6px;
      letter-spacing: 1px;
    }

    .brand-name {
      font-family: 'Montserrat', sans-serif;
      font-weight: 800;
      font-size: 1.15rem;
      color: #fff;
      letter-spacing: -0.02em;
    }

    .nav-right-link {
      color: var(--f-text-sub);
      text-decoration: none;
      font-size: 0.88rem;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: color 0.2s;
    }

    .nav-right-link:hover {
      color: var(--f-fire-gold);
    }

    /* Hero Full Width Section */
    .hero-section {
      padding: 65px 0 45px;
      text-align: center;
    }

    .hero-supertag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(255, 85, 0, 0.12);
      border: 1px solid rgba(255, 85, 0, 0.35);
      color: var(--f-fire-gold);
      font-family: 'Montserrat', sans-serif;
      font-size: 0.85rem;
      font-weight: 900;
      padding: 6px 16px;
      border-radius: 9999px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin-bottom: 20px;
    }

    .hero-title {
      font-family: 'Montserrat', sans-serif;
      font-size: clamp(2.4rem, 6.5vw, 4.4rem);
      font-weight: 900;
      line-height: 1.06;
      letter-spacing: -0.03em;
      text-transform: uppercase;
      margin-bottom: 24px;
      background: linear-gradient(135deg, #ffffff 30%, #ffb703 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .hero-subtitle-box {
      max-width: 820px;
      margin: 0 auto;
      background: rgba(17, 22, 33, 0.6);
      border: 1px solid var(--f-border);
      border-radius: var(--f-radius);
      padding: 24px 30px;
      backdrop-filter: blur(8px);
    }

    .hero-sub-head {
      font-family: 'Montserrat', sans-serif;
      font-size: 1.25rem;
      font-weight: 800;
      color: var(--f-fire-gold);
      margin-bottom: 12px;
      text-transform: uppercase;
      letter-spacing: 0.02em;
    }

    .hero-lead-p {
      color: var(--f-text-sub);
      font-size: 1.05rem;
      line-height: 1.6;
      margin-bottom: 8px;
    }

    .hero-lead-p strong {
      color: #fff;
    }

    /* 3 Offers Pricing Grid */
    .offers-section {
      padding: 30px 0 70px;
    }

    .offers-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
      align-items: stretch;
    }

    @media (max-width: 1024px) {
      .offers-grid {
        grid-template-columns: 1fr;
        max-width: 650px;
        margin: 0 auto;
      }
    }

    /* Offer Card */
    .offer-card {
      background: var(--f-card);
      border: 1px solid var(--f-border);
      border-radius: var(--f-radius);
      padding: 36px 28px 30px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    }

    .offer-card:hover {
      transform: translateY(-6px);
      background: var(--f-card-hover);
      box-shadow: 0 20px 45px rgba(0, 0, 0, 0.6);
      border-color: rgba(255, 255, 255, 0.18);
    }

    /* Popular / Highlighted Card (Opción 2) */
    .offer-card.featured {
      background: var(--f-card-popular);
      border: 2px solid var(--f-border-popular);
      box-shadow: 0 15px 45px rgba(255, 85, 0, 0.2);
      transform: scale(1.02);
    }

    .offer-card.featured:hover {
      transform: scale(1.02) translateY(-6px);
      box-shadow: 0 25px 60px rgba(255, 85, 0, 0.32);
      border-color: var(--f-fire-gold);
    }

    .featured-ribbon {
      position: absolute;
      top: -14px;
      left: 50%;
      transform: translateX(-50%);
      background: var(--f-fire-gradient);
      color: #000;
      font-family: 'Montserrat', sans-serif;
      font-weight: 900;
      font-size: 0.75rem;
      padding: 5px 16px;
      border-radius: 9999px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      box-shadow: 0 4px 14px rgba(255, 85, 0, 0.5);
      white-space: nowrap;
    }

    .card-top-tag {
      font-family: 'Montserrat', sans-serif;
      font-size: 0.82rem;
      font-weight: 900;
      color: var(--f-fire-gold);
      letter-spacing: 0.06em;
      text-transform: uppercase;
      margin-bottom: 6px;
    }

    .card-title {
      font-family: 'Montserrat', sans-serif;
      font-size: 1.55rem;
      font-weight: 900;
      color: #fff;
      margin-bottom: 6px;
      line-height: 1.18;
    }

    .card-subheadline {
      font-size: 0.85rem;
      font-weight: 800;
      color: var(--f-fire-amber);
      text-transform: uppercase;
      letter-spacing: 0.03em;
      margin-bottom: 18px;
      padding-bottom: 14px;
      border-bottom: 1px solid var(--f-border);
    }

    .card-body-desc {
      color: var(--f-text-sub);
      font-size: 0.94rem;
      line-height: 1.55;
      margin-bottom: 20px;
    }

    .features-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 12px;
      margin-bottom: 26px;
      font-size: 0.91rem;
      color: var(--f-text-sub);
    }

    .features-list li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      line-height: 1.45;
    }

    .features-list li .bullet {
      color: var(--f-fire-gold);
      font-weight: 900;
      font-size: 1.05rem;
      flex-shrink: 0;
      margin-top: -1px;
    }

    .features-list li strong {
      color: #fff;
    }

    .section-breakout {
      background: rgba(255, 85, 0, 0.08);
      border: 1px solid rgba(255, 85, 0, 0.22);
      border-radius: var(--f-radius-sm);
      padding: 14px;
      margin: 18px 0;
    }

    .section-breakout-title {
      font-family: 'Montserrat', sans-serif;
      font-size: 0.86rem;
      font-weight: 900;
      color: var(--f-fire-gold);
      margin-bottom: 6px;
      text-transform: uppercase;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .section-breakout p {
      font-size: 0.86rem;
      color: var(--f-text-sub);
      line-height: 1.45;
    }

    /* Price Section Inside Card */
    .card-pricing-box {
      margin-top: auto;
      padding-top: 20px;
      border-top: 1px solid var(--f-border);
      text-align: center;
    }

    .price-label {
      font-size: 0.78rem;
      font-weight: 800;
      color: var(--f-text-muted);
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin-bottom: 4px;
    }

    .price-main {
      font-family: 'Montserrat', sans-serif;
      font-size: 2.2rem;
      font-weight: 900;
      color: #fff;
      line-height: 1;
      margin-bottom: 4px;
    }

    .price-usd {
      font-size: 0.95rem;
      font-weight: 700;
      color: var(--f-fire-gold);
      margin-bottom: 18px;
    }

    /* CTA Button */
    .btn-buy-mp {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      background: var(--f-fire-gradient);
      color: #000;
      font-family: 'Montserrat', sans-serif;
      font-size: 0.95rem;
      font-weight: 900;
      padding: 16px 20px;
      border-radius: var(--f-radius-sm);
      text-decoration: none;
      text-transform: uppercase;
      letter-spacing: 0.04em;
      box-shadow: 0 8px 25px rgba(255, 85, 0, 0.35);
      transition: all 0.25s ease;
      cursor: pointer;
    }

    .btn-buy-mp:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 32px rgba(255, 85, 0, 0.55);
      filter: brightness(1.08);
    }

    .btn-buy-mp-featured {
      background: linear-gradient(135deg, #ff8500 0%, #ffc107 100%);
      box-shadow: 0 10px 30px rgba(255, 133, 0, 0.45);
    }

    .card-security-note {
      font-size: 0.75rem;
      color: var(--f-text-muted);
      margin-top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }

    /* Manifest & Closing Banner */
    .closing-section {
      padding: 60px 0 80px;
      background: linear-gradient(180deg, transparent 0%, rgba(255, 85, 0, 0.05) 50%, rgba(0,0,0,0.5) 100%);
      border-top: 1px solid var(--f-border);
    }

    .manifesto-box {
      max-width: 860px;
      margin: 0 auto;
      background: rgba(17, 22, 33, 0.75);
      border: 1px solid rgba(255, 85, 0, 0.3);
      border-radius: var(--f-radius);
      padding: 45px 36px;
      text-align: center;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
    }

    .manifesto-title {
      font-family: 'Montserrat', sans-serif;
      font-size: 1.6rem;
      font-weight: 900;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 0.03em;
      margin-bottom: 20px;
    }

    .manifesto-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 16px;
      margin: 28px 0;
      text-align: left;
    }

    .manifesto-item {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid var(--f-border);
      border-radius: 12px;
      padding: 16px;
    }

    .manifesto-item-icon {
      font-size: 1.4rem;
      margin-bottom: 6px;
    }

    .manifesto-item-text {
      font-size: 0.92rem;
      color: var(--f-text-sub);
      line-height: 1.45;
    }

    .manifesto-conclusion {
      font-family: 'Montserrat', sans-serif;
      font-size: 1.3rem;
      font-weight: 900;
      color: var(--f-fire-gold);
      text-transform: uppercase;
      letter-spacing: 0.02em;
      margin-top: 25px;
      padding-top: 20px;
      border-top: 1px solid var(--f-border);
    }

    .footer-help {
      text-align: center;
      margin-top: 30px;
      font-size: 0.92rem;
      color: var(--f-text-muted);
    }

    .footer-help a {
      color: var(--f-fire-gold);
      text-decoration: none;
      font-weight: 700;
    }

    .footer-help a:hover {
      text-decoration: underline;
    }

    /* Footer */
    .site-footer {
      padding: 30px 0;
      border-top: 1px solid var(--f-border);
      text-align: center;
      font-size: 0.82rem;
      color: var(--f-text-muted);
      background: #040508;
    }
  </style>
</head>
<body>

  <div class="ambient-glow"></div>

  <!-- Minimal Header -->
  <header class="site-header">
    <div class="container nav-wrap">
      <a href="/" class="brand">
        <span class="brand-badge">NOWBACK</span>
        <span class="brand-name">FEDE NOWBACK</span>
      </a>
      <a href="<?= get_fede_wa_link('Hola Fede! Tengo una consulta sobre los 3 programas de Encendé tu Fuego.') ?>" target="_blank" rel="noopener noreferrer" class="nav-right-link">
        <span>💬</span>
        <span>Consultar por WhatsApp</span>
      </a>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      
      <div class="hero-supertag">
        🔥 OFERTA EXCLUSIVA • ENCENDÉ TU FUEGO
      </div>

      <h1 class="hero-title">
        ENCENDÉ TU FUEGO
      </h1>

      <div class="hero-subtitle-box">
        <h2 class="hero-sub-head">ELEGÍ CÓMO QUERÉS QUE TE ACOMPAÑE</h2>
        <p class="hero-lead-p">
          <strong>No necesitás acumular más información.</strong><br>
          Necesitás claridad, estrategia, herramientas y acompañamiento para ejecutar.
        </p>
        <p class="hero-lead-p" style="font-size: 0.96rem; color: var(--f-text-muted); margin-top: 6px;">
          Por eso armé <strong>tres formas diferentes de trabajar conmigo</strong>, según el nivel de acompañamiento que necesites hoy para hacer crecer tu negocio o marca personal.
        </p>
      </div>

    </div>
  </section>

  <!-- 3 Pricing & Offers Blocks -->
  <section class="offers-section" id="planes">
    <div class="container">
      <div class="offers-grid">

        <!-- ========================================== -->
        <!-- OPCIÓN 1: EMPEZÁ A MOVERTE -->
        <!-- ========================================== -->
        <div class="offer-card">
          <div>
            <div class="card-img-banner" style="margin-bottom: 18px; border-radius: 12px; overflow: hidden; border: 1px solid var(--f-border); box-shadow: 0 8px 20px rgba(0,0,0,0.4);">
              <img src="/assets/img/promo_opcion_1.jpg" alt="Opción 1: Empezá a moverte" style="width: 100%; height: auto; display: block;">
            </div>

            <div class="card-top-tag">OPCIÓN 1</div>
            <h3 class="card-title">EMPEZÁ A MOVERTE</h3>
            <div class="card-subheadline">
              1 MES DE MEMBRESÍA + 1 ENCUENTRO 1 A 1
            </div>

            <p class="card-body-desc">
              Durante un mes vas a formar parte de nuestra <strong>Comunidad de Emprendedores</strong> con acceso integral a formación y networking:
            </p>

            <ul class="features-list">
              <li>
                <span class="bullet">✓</span>
                <span><strong>1 encuentro grupal semanal</strong> por Zoom en vivo.</span>
              </li>
              <li>
                <span class="bullet">✓</span>
                <span><strong>Clases estratégicas</strong> sobre negocios, ventas, contenido, marca personal y mentalidad.</span>
              </li>
              <li>
                <span class="bullet">✓</span>
                <span><strong>Espacio abierto</strong> para hacer tus consultas directas.</span>
              </li>
              <li>
                <span class="bullet">✓</span>
                <span><strong>Comunidad privada</strong> + grupo exclusivo de WhatsApp.</span>
              </li>
              <li>
                <span class="bullet">✓</span>
                <span><strong>Acceso a los cursos grabados</strong> disponibles durante tu membresía.</span>
              </li>
              <li>
                <span class="bullet">✓</span>
                <span><strong>Beneficios especiales</strong> en futuros eventos presenciales.</span>
              </li>
            </ul>

            <div class="section-breakout">
              <div class="section-breakout-title">
                <span>🎯</span> + ENCUENTRO PRIVADO CONMIGO
              </div>
              <p>
                Un encuentro 1 a 1 de <strong>una hora vía Google Meet</strong> para trabajar específicamente sobre tu negocio, detectar qué necesitás mejorar y definir próximos pasos claros.
              </p>
            </div>
          </div>

          <div class="card-pricing-box">
            <div class="price-label">INVERSIÓN</div>
            <div class="price-main">$99.000 <span style="font-size: 0.9rem; font-weight: 600; color: var(--f-text-muted);">ARS</span></div>
            <div class="price-usd">USD 60 (Exterior)</div>

            <a href="https://mpago.la/14zkFmJ" target="_blank" rel="noopener noreferrer" class="btn-buy-mp">
              <span>💳 Reservar Opción 1</span>
              <span>→</span>
            </a>

            <div class="card-security-note">
              <span>🔒</span> Pago seguro procesado por MercadoPago
            </div>
          </div>
        </div>

        <!-- ========================================== -->
        <!-- OPCIÓN 2: RODEATE. TRABAJÁ. AVANZÁ. (MÁS ELEGIDO) -->
        <!-- ========================================== -->
        <div class="offer-card featured">
          <div class="featured-ribbon">
            🔥 MÁS ELEGIDO • GRUPO REDUCIDO
          </div>

          <div>
            <div class="card-img-banner" style="margin-bottom: 18px; border-radius: 12px; overflow: hidden; border: 1px solid rgba(255, 85, 0, 0.4); box-shadow: 0 8px 25px rgba(255,85,0,0.25);">
              <img src="/assets/img/promo_opcion_2.jpg" alt="Opción 2: Rodeate. Trabajá. Avanzá." style="width: 100%; height: auto; display: block;">
            </div>

            <div class="card-top-tag" style="color: var(--f-fire-gold);">OPCIÓN 2</div>
            <h3 class="card-title">RODEATE. TRABAJÁ. AVANZÁ.</h3>
            <div class="card-subheadline" style="color: var(--f-fire-gold);">
              2 MESES DE MEMBRESÍA + 2 MESES EN SALAS TEMPLO DE FUEGO + 1 ENCUENTRO 1 A 1
            </div>

            <p class="card-body-desc">
              Además de tener <strong>2 meses completos</strong> dentro de la Comunidad de Emprendedores, vas a acceder durante dos meses a:
            </p>

            <div class="section-breakout" style="background: rgba(255, 183, 3, 0.1); border-color: rgba(255, 183, 3, 0.35);">
              <div class="section-breakout-title" style="color: var(--f-fire-gold); font-size: 0.92rem;">
                <span>🔥</span> SALAS TEMPLO DE FUEGO
              </div>
              <p style="margin-bottom: 8px;">
                Un espacio privado de trabajo formado por <strong>solamente 4 emprendedores</strong>.
              </p>
              <p style="font-size: 0.84rem; color: var(--f-text-sub); line-height: 1.45;">
                Nos encontramos <strong>4 veces por mes</strong> para trabajar sobre los negocios, compartir situaciones reales, resolver problemas, bajar ideas a tierra y avanzar acompañados.
              </p>
              <div style="margin-top: 8px; font-weight: 800; color: #fff; font-size: 0.84rem;">
                ⚡ 2 meses dentro de la Sala • 8 encuentros privados en grupo reducido.
              </div>
            </div>

            <ul class="features-list">
              <li>
                <span class="bullet" style="color: var(--f-fire-gold);">✓</span>
                <span><strong>2 meses completos</strong> de Comunidad de Emprendedores.</span>
              </li>
              <li>
                <span class="bullet" style="color: var(--f-fire-gold);">✓</span>
                <span><strong>Encuentros grupales semanales</strong> + clases y cursos grabados.</span>
              </li>
              <li>
                <span class="bullet" style="color: var(--f-fire-gold);">✓</span>
                <span><strong>Comunidad privada + WhatsApp</strong> y espacio para consultas.</span>
              </li>
              <li>
                <span class="bullet" style="color: var(--f-fire-gold);">✓</span>
                <span><strong>Beneficios prioritarios</strong> en futuros eventos presenciales.</span>
              </li>
              <li>
                <span class="bullet" style="color: var(--f-fire-gold);">✓</span>
                <span><strong>1 encuentro privado 1 a 1 de 1 hora</strong> conmigo vía Google Meet.</span>
              </li>
            </ul>
          </div>

          <div class="card-pricing-box">
            <div class="price-label">INVERSIÓN</div>
            <div class="price-main" style="color: var(--f-fire-gold);">$250.000 <span style="font-size: 0.9rem; font-weight: 600; color: var(--f-text-muted);">ARS</span></div>
            <div class="price-usd">USD 165 (Exterior)</div>

            <a href="https://mpago.li/26skaPq" target="_blank" rel="noopener noreferrer" class="btn-buy-mp btn-buy-mp-featured">
              <span>🔥 Reservar Opción 2</span>
              <span>→</span>
            </a>

            <div class="card-security-note">
              <span>🔒</span> Cupos estrictamente limitados a 4 por Sala
            </div>
          </div>
        </div>

        <!-- ========================================== -->
        <!-- OPCIÓN 3: ACOMPAÑAMIENTO INTENSIVO -->
        <!-- ========================================== -->
        <div class="offer-card">
          <div>
            <div class="card-img-banner" style="margin-bottom: 18px; border-radius: 12px; overflow: hidden; border: 1px solid var(--f-border); box-shadow: 0 8px 20px rgba(0,0,0,0.4);">
              <img src="/assets/img/promo_opcion_3.jpg" alt="Opción 3: Acompañamiento Intensivo" style="width: 100%; height: auto; display: block;">
            </div>

            <div class="card-top-tag">OPCIÓN 3</div>
            <h3 class="card-title">ACOMPAÑAMIENTO INTENSIVO</h3>
            <div class="card-subheadline">
              3 MESES DE MEMBRESÍA + 1 MES DE MENTORÍA PRIVADA 1 A 1
            </div>

            <p class="card-body-desc">
              Esta opción es para quien busca un <strong>acompañamiento mucho más cercano, personalizado y de alto impacto</strong>.
            </p>

            <ul class="features-list">
              <li>
                <span class="bullet">✓</span>
                <span><strong>3 meses completos</strong> dentro de la Comunidad de Emprendedores.</span>
              </li>
              <li>
                <span class="bullet">✓</span>
                <span>Acceso a <strong>todos los encuentros, clases, cursos, consultas y nuevos contenidos</strong> que se incorporen en el período.</span>
              </li>
            </ul>

            <div class="section-breakout" style="background: rgba(255, 85, 0, 0.12); border-color: rgba(255, 85, 0, 0.35);">
              <div class="section-breakout-title">
                <span>👑</span> + 1 MES DE MENTORÍA PRIVADA CONMIGO
              </div>
              <ul style="list-style: none; font-size: 0.86rem; color: var(--f-text-sub); display: flex; flex-direction: column; gap: 6px; margin-top: 6px;">
                <li>• <strong>4 encuentros privados 1 a 1</strong> (1 por semana, 1 hora cada uno).</li>
                <li>• Trabajo directo sobre tu negocio, marca personal, comunicación, estrategia y ventas.</li>
                <li>• Toma de decisiones estratégicas para desbloquear tu facturación.</li>
                <li>• <strong>Acompañamiento continuo por WhatsApp directo</strong> durante todo el proceso.</li>
              </ul>
            </div>
          </div>

          <div class="card-pricing-box">
            <div class="price-label">INVERSIÓN</div>
            <div class="price-main">$447.000 <span style="font-size: 0.9rem; font-weight: 600; color: var(--f-text-muted);">ARS</span></div>
            <div class="price-usd">USD 290 (Exterior)</div>

            <a href="https://mpago.li/1sqwSxe" target="_blank" rel="noopener noreferrer" class="btn-buy-mp">
              <span>👑 Reservar Opción 3</span>
              <span>→</span>
            </a>

            <div class="card-security-note">
              <span>🔒</span> Plazas limitadas por agenda de mentoría
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Manifesto & Closing Section -->
  <section class="closing-section">
    <div class="container">
      
      <div class="manifesto-box">
        <h3 class="manifesto-title">NO ES SOLO CONTENIDO.</h3>
        
        <div class="manifesto-grid">
          <div class="manifesto-item">
            <div class="manifesto-item-icon">❓</div>
            <div class="manifesto-item-text">
              <strong>Es tener un lugar donde preguntar</strong> sin miedo y con respuestas estratégicas basadas en la práctica.
            </div>
          </div>

          <div class="manifesto-item">
            <div class="manifesto-item-icon">🤝</div>
            <div class="manifesto-item-text">
              <strong>Personas con quienes compartir el camino</strong>, rodearte de pares con tu misma ambición y empuje.
            </div>
          </div>

          <div class="manifesto-item">
            <div class="manifesto-item-icon">🛠️</div>
            <div class="manifesto-item-text">
              <strong>Herramientas para aplicar</strong> en tu día a día, sin rodeos ni teorías que no mueven la aguja.
            </div>
          </div>

          <div class="manifesto-item">
            <div class="manifesto-item-icon">🚀</div>
            <div class="manifesto-item-text">
              <strong>Distintos niveles de acompañamiento</strong> para transformar tus ideas y conocimientos en acciones que generen resultados reales.
            </div>
          </div>
        </div>

        <div class="manifesto-conclusion">
          AHORA TE TOCA ELEGIR CÓMO QUERÉS AVANZAR.
        </div>

        <div style="margin-top: 25px;">
          <a href="#planes" class="btn-buy-mp" style="max-width: 380px; margin: 0 auto;">
            ⚡ Ver las 3 Opciones y Reservar
          </a>
        </div>
      </div>

      <div class="footer-help">
        ¿Tenés dudas sobre cuál es la mejor opción para tu caso? 
        <a href="<?= get_fede_wa_link('Hola Fede! Tengo dudas sobre cuál de las 3 opciones de Encendé tu Fuego elegir para mi negocio.') ?>" target="_blank" rel="noopener noreferrer">
          Escribime por WhatsApp
        </a>
      </div>

    </div>
  </section>

  <!-- Global Minimal Footer -->
  <footer class="site-footer">
    <div class="container">
      <p>&copy; <?= date('Y') ?> <strong>Fede Nowback</strong>. Todos los derechos reservados. Marca Personal & Estrategia de Negocios.</p>
    </div>
  </footer>

</body>
</html>
