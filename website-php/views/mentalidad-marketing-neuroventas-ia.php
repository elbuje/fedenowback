<!DOCTYPE html>
<html lang="es-AR" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mentalidad y Marketing — Neuroventas con IA | Evento Presencial 10 de Octubre</title>
  <meta name="description" content="Una jornada para transformar la forma en que pensás, comunicás y vendés tu negocio, con neurociencia, inteligencia artificial, marca personal y casos reales. Sábado 10 de octubre, Lavalle 362, CABA.">
  <meta name="keywords" content="Mentalidad y Marketing, Neuroventas con IA, Anthony Sánchez Altuna, Fede Nowback, Christian Cencherle, Evento Presencial CABA, Lavalle 362">
  <meta name="robots" content="index, follow">

  <!-- Open Graph / Meta -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Mentalidad y Marketing — Neuroventas con IA">
  <meta property="og:description" content="Evento presencial exclusivo para dueños de negocio y emprendedores. Sábado 10 de octubre en CABA.">
  <meta property="og:image" content="/events_new/hero-speakers-group-wide.jpg">

  <!-- Google Fonts: Cormorant Garamond, Playfair Display, Cinzel, Inter, Caveat -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Cinzel:wght@600;700;800;900&family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,700&display=swap" rel="stylesheet">

  <style>
    /* =========================================================
       RESET & THEME VARIABLES (Puro estilo mockup original)
       ========================================================= */
    *, *::before, *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    :root {
      --bg-dark: #070707;
      --bg-card: #0F0F10;
      --bg-card-hover: #141416;
      --gold-light: #F7E4A8;
      --gold-main: #D4AF37;
      --gold-dark: #9E7D1E;
      --text-main: #EDE8DF;
      --text-muted: rgba(237, 232, 223, 0.7);
      --border-gold: rgba(212, 175, 55, 0.28);
      --border-gold-bright: rgba(212, 175, 55, 0.65);
    }
    html {
      scroll-behavior: smooth;
      font-size: 16px;
      background-color: var(--bg-dark);
      color: var(--text-main);
    }
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background-color: #060606;
      color: var(--text-main);
      line-height: 1.55;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    /* TYPOGRAPHY HELPERS */
    .font-serif {
      font-family: 'Playfair Display', Georgia, serif;
    }
    .font-cinzel {
      font-family: 'Cinzel', serif;
    }
    .font-script {
      font-family: 'Caveat', cursive;
    }

    /* GOLD TEXT EFFECTS */
    .gold-gradient {
      background: linear-gradient(135deg, #FDE8A5 0%, #D4AF37 45%, #AA820A 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      display: inline-block;
    }
    .gold-metallic {
      background: linear-gradient(180deg, #FFFFFF 0%, #F6E6C2 25%, #D4AF37 70%, #8A6412 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      display: inline-block;
    }

    /* CONTAINERS */
    .container {
      width: 100%;
      max-width: 1180px;
      margin: 0 auto;
      padding: 0 24px;
    }

    /* BUTTONS */
    .btn-gold-main {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      background: linear-gradient(135deg, #ECC868 0%, #D4AF37 50%, #A88114 100%);
      color: #080808;
      font-family: 'Inter', sans-serif;
      font-weight: 800;
      font-size: 14.5px;
      letter-spacing: 0.8px;
      text-transform: uppercase;
      padding: 16px 36px;
      border-radius: 9999px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      box-shadow: 0 8px 30px rgba(212, 175, 55, 0.35);
      transition: all 0.25s ease;
    }
    .btn-gold-main:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 40px rgba(212, 175, 55, 0.55);
      background: linear-gradient(135deg, #F8DB86 0%, #DEBA46 50%, #BC9525 100%);
    }
    .btn-gold-main:active {
      transform: translateY(1px);
    }

    .badge-cupos {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      border: 1px solid rgba(212, 175, 55, 0.45);
      background: rgba(212, 175, 55, 0.08);
      color: #D4AF37;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      padding: 14px 24px;
      border-radius: 9999px;
    }

    /* =========================================================
       1. TOP BAR (MOCKUP EXACTO: SIN MENÚ, SOLO ACCENTS)
       ========================================================= */
    .top-meta-bar {
      padding: 24px 0 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .top-event-tag {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 3.5px;
      color: #D4AF37;
      text-transform: uppercase;
      display: inline-flex;
      align-items: center;
      gap: 12px;
    }
    .top-event-tag::before,
    .top-event-tag::after {
      content: "";
      display: inline-block;
      width: 24px;
      height: 1px;
      background: #D4AF37;
      opacity: 0.6;
    }
    .top-right-keywords {
      font-size: 10.5px;
      font-weight: 700;
      letter-spacing: 2px;
      color: rgba(212, 175, 55, 0.7);
      text-transform: uppercase;
      text-align: right;
    }

    /* =========================================================
       2. HERO SECTION
       ========================================================= */
    .hero-wrap {
      position: relative;
      padding: 40px 0 70px;
    }
    .hero-grid {
      display: grid;
      grid-template-columns: 1.15fr 0.95fr;
      gap: 40px;
      align-items: center;
    }
    .hero-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: clamp(38px, 4.6vw, 64px);
      line-height: 1.05;
      font-weight: 700;
      color: #FFFFFF;
      margin-bottom: 22px;
      letter-spacing: -0.5px;
    }
    .hero-title span {
      display: block;
    }
    .hero-subtitle {
      font-size: 16px;
      line-height: 1.6;
      color: rgba(237, 232, 223, 0.82);
      max-width: 520px;
      margin-bottom: 32px;
    }

    /* Hero Info Bar */
    .hero-info-strip {
      display: grid;
      grid-template-columns: auto auto auto;
      gap: 20px;
      padding: 16px 20px;
      background: rgba(255, 255, 255, 0.025);
      border: 1px solid rgba(212, 175, 55, 0.22);
      border-radius: 12px;
      margin-bottom: 34px;
    }
    .info-item {
      display: flex;
      align-items: flex-start;
      gap: 10px;
    }
    .info-icon {
      color: #D4AF37;
      font-size: 18px;
      line-height: 1;
      margin-top: 2px;
    }
    .info-title {
      font-size: 13.5px;
      font-weight: 700;
      color: #FFFFFF;
      margin-bottom: 2px;
    }
    .info-desc {
      font-size: 11px;
      color: rgba(237, 232, 223, 0.6);
    }

    .hero-cta-group {
      display: flex;
      align-items: center;
      gap: 16px;
      flex-wrap: wrap;
    }

    /* Hero Right: 3 Speakers Cutout Blend */
    .hero-speakers-col {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .hero-glow-bg {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 440px;
      height: 440px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(212, 175, 55, 0.2) 0%, rgba(212, 175, 55, 0.05) 45%, rgba(6, 6, 6, 0) 70%);
      pointer-events: none;
      z-index: 1;
    }
    .hero-speakers-image {
      position: relative;
      z-index: 2;
      width: 100%;
      max-width: 500px;
      height: auto;
      display: block;
      border-radius: 18px;
      border: 1px solid rgba(212, 175, 55, 0.3);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.9), 0 0 35px rgba(212, 175, 55, 0.12);
    }
    .hero-speakers-signatures {
      position: relative;
      z-index: 2;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      width: 100%;
      max-width: 500px;
      margin-top: 16px;
      text-align: center;
    }
    .sig-block {
      padding: 8px 4px;
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(212, 175, 55, 0.18);
      border-radius: 8px;
    }
    .sig-name {
      font-family: 'Caveat', cursive;
      font-size: 19px;
      font-weight: 700;
      color: #FFFFFF;
      line-height: 1.1;
    }
    .sig-topic {
      font-size: 8.5px;
      letter-spacing: 1px;
      color: #D4AF37;
      text-transform: uppercase;
      font-weight: 700;
      margin-top: 2px;
    }

    /* =========================================================
       3. KEYWORDS PILLS STRIP
       ========================================================= */
    .keywords-strip {
      padding: 26px 0;
      background: #0B0B0C;
      border-top: 1px solid rgba(212, 175, 55, 0.12);
      border-bottom: 1px solid rgba(212, 175, 55, 0.12);
    }
    .keywords-grid {
      display: grid;
      grid-template-columns: repeat(8, 1fr);
      gap: 12px;
    }
    .kw-card {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 14px 6px;
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(212, 175, 55, 0.14);
      border-radius: 12px;
      text-align: center;
      transition: all 0.25s ease;
    }
    .kw-card:hover {
      border-color: rgba(212, 175, 55, 0.45);
      background: rgba(212, 175, 55, 0.06);
      transform: translateY(-2px);
    }
    .kw-icon {
      font-size: 20px;
      margin-bottom: 6px;
    }
    .kw-text {
      font-size: 11.5px;
      font-weight: 600;
      color: rgba(237, 232, 223, 0.9);
      letter-spacing: 0.2px;
    }

    /* =========================================================
       4. MANIFIESTO SECTION
       ========================================================= */
    .manifiesto-wrap {
      position: relative;
      padding: 95px 0;
      background: linear-gradient(180deg, #060606 0%, #120D05 50%, #060606 100%);
      overflow: hidden;
      border-bottom: 1px solid rgba(212, 175, 55, 0.12);
    }
    .manifiesto-grid {
      position: relative;
      z-index: 2;
      display: grid;
      grid-template-columns: 1.1fr 0.8fr 1.1fr;
      gap: 36px;
      align-items: center;
    }
    .manifiesto-quote h2 {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: clamp(28px, 3.2vw, 42px);
      line-height: 1.15;
      font-weight: 800;
      color: #FFFFFF;
      text-transform: uppercase;
      letter-spacing: -0.5px;
    }
    .manifiesto-center-img {
      position: relative;
      border-radius: 14px;
      overflow: hidden;
      border: 1px solid rgba(212, 175, 55, 0.3);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.7);
    }
    .manifiesto-center-img img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      display: block;
    }
    .manifiesto-body p {
      font-size: 15px;
      line-height: 1.7;
      color: rgba(237, 232, 223, 0.85);
      margin-bottom: 16px;
    }
    .manifiesto-body strong {
      color: #FFFFFF;
    }

    /* =========================================================
       5. SPEAKERS SECTION
       ========================================================= */
    .speakers-wrap {
      padding: 95px 0;
      background: #060606;
      position: relative;
    }
    .section-header {
      margin-bottom: 48px;
    }
    .section-tag {
      font-size: 11px;
      letter-spacing: 3.5px;
      color: #D4AF37;
      text-transform: uppercase;
      font-weight: 700;
      margin-bottom: 8px;
    }
    .section-title-row {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      gap: 20px;
      flex-wrap: wrap;
    }
    .section-main-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: clamp(28px, 3.6vw, 44px);
      font-weight: 700;
      color: #FFFFFF;
      line-height: 1.15;
    }
    .section-right-note {
      font-size: 11px;
      letter-spacing: 2px;
      color: rgba(212, 175, 55, 0.85);
      font-weight: 700;
      text-transform: uppercase;
      max-width: 400px;
      text-align: right;
    }

    .speakers-cards-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
    }
    .speaker-box {
      background: rgba(18, 18, 19, 0.75);
      border: 1px solid rgba(212, 175, 55, 0.22);
      border-radius: 18px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      transition: all 0.3s ease;
    }
    .speaker-box:hover {
      transform: translateY(-6px);
      border-color: rgba(212, 175, 55, 0.55);
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.85), 0 0 25px rgba(212, 175, 55, 0.12);
    }
    .speaker-img-container {
      position: relative;
      width: 100%;
      height: 280px;
      overflow: hidden;
      background: #0E0E0E;
    }
    .speaker-img-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center 20%;
      transition: transform 0.4s ease;
    }
    .speaker-box:hover .speaker-img-container img {
      transform: scale(1.04);
    }
    .speaker-img-shade {
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(8, 8, 8, 0) 50%, rgba(18, 18, 19, 0.98) 100%);
    }

    .speaker-details {
      padding: 24px 22px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }
    .speaker-h3 {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #FFFFFF;
      margin-bottom: 4px;
      line-height: 1.1;
    }
    .speaker-h3 .last-name {
      color: #D4AF37;
    }
    .speaker-subrole {
      font-size: 12px;
      color: rgba(237, 232, 223, 0.65);
      margin-bottom: 16px;
      line-height: 1.4;
      font-style: italic;
    }
    .speaker-bullets-list {
      list-style: none;
      margin-bottom: 20px;
    }
    .speaker-bullets-list li {
      position: relative;
      padding-left: 18px;
      font-size: 13px;
      color: rgba(237, 232, 223, 0.8);
      margin-bottom: 7px;
      line-height: 1.4;
    }
    .speaker-bullets-list li::before {
      content: "•";
      position: absolute;
      left: 4px;
      color: #D4AF37;
      font-weight: bold;
      font-size: 15px;
    }
    .speaker-topic-pill {
      margin-top: auto;
      padding: 10px 14px;
      background: rgba(212, 175, 55, 0.08);
      border: 1px solid rgba(212, 175, 55, 0.35);
      border-radius: 8px;
      font-size: 11px;
      font-weight: 800;
      letter-spacing: 1px;
      color: #D4AF37;
      text-transform: uppercase;
      text-align: center;
      margin-bottom: 14px;
    }
    .speaker-summary-text {
      font-size: 12.5px;
      line-height: 1.5;
      color: rgba(237, 232, 223, 0.7);
    }

    /* =========================================================
       6. QUÉ TE LLEVÁS
       ========================================================= */
    .takeaways-wrap {
      padding: 95px 0;
      background: linear-gradient(180deg, #060606 0%, #100C05 50%, #060606 100%);
      border-top: 1px solid rgba(212, 175, 55, 0.12);
    }
    .takeaways-cards-5 {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 18px;
      margin-top: 40px;
    }
    .takeaway-item {
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(212, 175, 55, 0.2);
      border-radius: 14px;
      padding: 26px 18px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      transition: all 0.25s ease;
    }
    .takeaway-item:hover {
      border-color: rgba(212, 175, 55, 0.5);
      background: rgba(212, 175, 55, 0.05);
      transform: translateY(-4px);
    }
    .takeaway-circle-icon {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background: rgba(212, 175, 55, 0.1);
      border: 1px solid rgba(212, 175, 55, 0.35);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      margin-bottom: 16px;
      color: #D4AF37;
    }
    .takeaway-item h3 {
      font-size: 14.5px;
      font-weight: 700;
      color: #FFFFFF;
      margin-bottom: 8px;
      line-height: 1.3;
    }
    .takeaway-item p {
      font-size: 12px;
      color: rgba(237, 232, 223, 0.65);
      line-height: 1.45;
    }

    /* =========================================================
       7. AGENDA
       ========================================================= */
    .agenda-wrap {
      padding: 95px 0;
      background: #060606;
      border-top: 1px solid rgba(212, 175, 55, 0.12);
    }
    .agenda-layout {
      display: grid;
      grid-template-columns: 0.9fr 1.1fr;
      gap: 40px;
      align-items: center;
    }
    .agenda-banner {
      position: relative;
      border-radius: 18px;
      overflow: hidden;
      border: 1px solid rgba(212, 175, 55, 0.25);
      height: 100%;
      min-height: 380px;
    }
    .agenda-banner img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .agenda-banner-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(8,8,8,0.2) 0%, rgba(8,8,8,0.9) 100%);
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 28px;
    }
    .agenda-banner-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 22px;
      font-weight: 700;
      color: #FFFFFF;
      margin-bottom: 6px;
    }
    .agenda-banner-sub {
      font-size: 12px;
      color: #D4AF37;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .agenda-timeline-list {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }
    .agenda-step {
      display: flex;
      align-items: flex-start;
      gap: 20px;
      padding: 18px 20px;
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(212, 175, 55, 0.15);
      border-radius: 12px;
      transition: all 0.2s;
    }
    .agenda-step:hover {
      border-color: rgba(212, 175, 55, 0.4);
      background: rgba(212, 175, 55, 0.03);
    }
    .agenda-time-pill {
      padding: 6px 14px;
      background: rgba(212, 175, 55, 0.12);
      border: 1px solid rgba(212, 175, 55, 0.35);
      border-radius: 8px;
      font-weight: 800;
      font-size: 13.5px;
      color: #D4AF37;
      white-space: nowrap;
    }
    .agenda-info h4 {
      font-size: 15px;
      font-weight: 700;
      color: #FFFFFF;
      margin-bottom: 4px;
    }
    .agenda-info p {
      font-size: 12.5px;
      color: rgba(237, 232, 223, 0.7);
      line-height: 1.4;
    }

    /* =========================================================
       8. TU INVERSIÓN / PRICING
       ========================================================= */
    .pricing-wrap {
      padding: 95px 0;
      background: linear-gradient(180deg, #060606 0%, #140E05 50%, #060606 100%);
      border-top: 1px solid rgba(212, 175, 55, 0.15);
    }
    .pricing-cards-row {
      display: grid;
      grid-template-columns: 1.15fr 0.95fr 0.9fr;
      gap: 24px;
      margin-top: 40px;
      align-items: stretch;
    }
    .p-card {
      background: rgba(20, 20, 20, 0.85);
      border: 1px solid rgba(212, 175, 55, 0.2);
      border-radius: 18px;
      padding: 32px 24px;
      display: flex;
      flex-direction: column;
      position: relative;
    }
    .p-card.featured {
      border: 2px solid #D4AF37;
      background: radial-gradient(circle at 50% 0%, rgba(212, 175, 55, 0.16) 0%, rgba(20, 20, 20, 0.98) 75%);
      box-shadow: 0 16px 50px rgba(212, 175, 55, 0.22);
      transform: scale(1.02);
    }
    .p-ribbon {
      position: absolute;
      top: -13px;
      left: 50%;
      transform: translateX(-50%);
      background: linear-gradient(135deg, #ECC868 0%, #D4AF37 50%, #9E7915 100%);
      color: #080808;
      font-size: 10.5px;
      font-weight: 900;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 5px 16px;
      border-radius: 9999px;
      white-space: nowrap;
      box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);
    }
    .p-tier {
      font-size: 12px;
      font-weight: 800;
      letter-spacing: 2px;
      color: #D4AF37;
      text-transform: uppercase;
      margin-bottom: 6px;
    }
    .p-validity {
      font-size: 11.5px;
      color: rgba(237, 232, 223, 0.55);
      margin-bottom: 20px;
    }
    .p-old-price {
      font-size: 16px;
      text-decoration: line-through;
      color: rgba(237, 232, 223, 0.4);
      margin-bottom: 2px;
    }
    .p-amount {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 42px;
      font-weight: 800;
      color: #FFFFFF;
      line-height: 1;
      margin-bottom: 8px;
    }
    .p-card.featured .p-amount {
      background: linear-gradient(135deg, #FFFFFF 0%, #F5E5BE 40%, #D4AF37 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .p-savings {
      display: inline-block;
      font-size: 11px;
      font-weight: 700;
      color: #22C55E;
      background: rgba(34, 197, 94, 0.1);
      border: 1px solid rgba(34, 197, 94, 0.3);
      padding: 3px 10px;
      border-radius: 9999px;
      margin-bottom: 24px;
      align-self: flex-start;
    }
    .p-list {
      list-style: none;
      margin-bottom: 28px;
      margin-top: auto;
    }
    .p-list li {
      position: relative;
      padding-left: 20px;
      font-size: 12.5px;
      color: rgba(237, 232, 223, 0.8);
      margin-bottom: 8px;
    }
    .p-list li::before {
      content: "✓";
      position: absolute;
      left: 0;
      color: #D4AF37;
      font-weight: bold;
    }

    /* Medios de Pago Bar */
    .payments-row {
      margin-top: 36px;
      padding: 16px 20px;
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(212, 175, 55, 0.15);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 28px;
      flex-wrap: wrap;
    }
    .payments-tag {
      font-size: 11px;
      letter-spacing: 2px;
      color: #D4AF37;
      text-transform: uppercase;
      font-weight: 700;
    }
    .payments-items {
      display: flex;
      align-items: center;
      gap: 20px;
      flex-wrap: wrap;
    }
    .payment-badge {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 12px;
      color: rgba(237, 232, 223, 0.8);
    }

    /* =========================================================
       9. PREGUNTAS FRECUENTES
       ========================================================= */
    .faq-wrap {
      padding: 95px 0;
      background: #060606;
      border-top: 1px solid rgba(212, 175, 55, 0.12);
    }
    .faq-layout {
      display: grid;
      grid-template-columns: 0.85fr 1.15fr;
      gap: 50px;
      align-items: flex-start;
    }
    .faq-accordion-box {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .faq-single {
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(212, 175, 55, 0.18);
      border-radius: 12px;
      overflow: hidden;
      transition: all 0.2s;
    }
    .faq-single.active {
      border-color: rgba(212, 175, 55, 0.5);
      background: rgba(212, 175, 55, 0.03);
    }
    .faq-btn {
      width: 100%;
      padding: 18px 20px;
      background: none;
      border: none;
      color: #FFFFFF;
      font-size: 14.5px;
      font-weight: 600;
      text-align: left;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
    }
    .faq-icon-sign {
      color: #D4AF37;
      font-size: 20px;
      transition: transform 0.25s ease;
    }
    .faq-single.active .faq-icon-sign {
      transform: rotate(45deg);
    }
    .faq-body-text {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease, padding 0.3s ease;
      padding: 0 20px;
      font-size: 13.5px;
      line-height: 1.6;
      color: rgba(237, 232, 223, 0.75);
    }
    .faq-single.active .faq-body-text {
      max-height: 250px;
      padding: 0 20px 20px 20px;
    }

    /* =========================================================
       10. PRE-FOOTER CTA & LOGOS ORGANIZAN
       ========================================================= */
    .prefooter-wrap {
      position: relative;
      padding: 80px 0;
      background: linear-gradient(180deg, #060606 0%, #150E05 50%, #060606 100%);
      border-top: 1px solid rgba(212, 175, 55, 0.18);
      overflow: hidden;
    }
    .prefooter-bg {
      position: absolute;
      inset: 0;
      background-image: url(/events_new/footer-audience.jpg);
      background-size: cover;
      background-position: center;
      opacity: 0.12;
    }
    .prefooter-inner {
      position: relative;
      z-index: 2;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 30px;
      flex-wrap: wrap;
    }
    .prefooter-left-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: clamp(26px, 3.2vw, 38px);
      font-weight: 700;
      color: #FFFFFF;
      line-height: 1.15;
      margin-bottom: 8px;
    }
    .prefooter-left-sub {
      font-size: 13px;
      color: rgba(237, 232, 223, 0.75);
    }

    .organizers-strip {
      padding: 40px 0 50px;
      background: #040404;
      border-top: 1px solid rgba(212, 175, 55, 0.12);
      text-align: center;
    }
    .org-label {
      font-size: 10px;
      letter-spacing: 3px;
      color: rgba(212, 175, 55, 0.7);
      text-transform: uppercase;
      font-weight: 700;
      margin-bottom: 20px;
    }
    .org-logos-row {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 40px;
      flex-wrap: wrap;
    }
    .org-item {
      font-family: 'Cinzel', serif;
      font-size: 15px;
      letter-spacing: 1.5px;
      color: rgba(237, 232, 223, 0.75);
      font-weight: 600;
    }

    .copyright-bar {
      padding: 22px 0;
      background: #020202;
      text-align: center;
      font-size: 11.5px;
      color: rgba(237, 232, 223, 0.35);
      border-top: 1px solid rgba(255, 255, 255, 0.04);
    }

    /* =========================================================
       11. MOBILE STICKY BAR
       ========================================================= */
    .mobile-sticky-cta {
      display: none;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 99;
      background: rgba(10, 10, 10, 0.96);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-top: 1px solid rgba(212, 175, 55, 0.35);
      padding: 12px 18px;
      box-shadow: 0 -8px 25px rgba(0, 0, 0, 0.85);
    }
    .mobile-sticky-flex {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
    }
    .sticky-price-col {
      display: flex;
      flex-direction: column;
    }
    .sticky-val {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 19px;
      font-weight: 800;
      color: #FFFFFF;
    }
    .sticky-tag {
      font-size: 9px;
      color: #D4AF37;
      text-transform: uppercase;
      font-weight: 700;
    }

    /* =========================================================
       RESPONSIVE BREAKPOINTS
       ========================================================= */
    @media (max-width: 1024px) {
      .hero-grid {
        grid-template-columns: 1fr;
        text-align: center;
      }
      .top-event-tag {
        justify-content: center;
      }
      .hero-subtitle {
        margin-left: auto;
        margin-right: auto;
      }
      .hero-info-strip {
        max-width: 580px;
        margin-left: auto;
        margin-right: auto;
      }
      .hero-cta-group {
        justify-content: center;
      }
      .hero-speakers-col {
        margin-top: 24px;
      }
      .keywords-grid {
        grid-template-columns: repeat(4, 1fr);
      }
      .manifiesto-grid {
        grid-template-columns: 1fr;
        text-align: center;
      }
      .speakers-cards-grid {
        grid-template-columns: 1fr;
        max-width: 480px;
        margin: 0 auto;
      }
      .takeaways-cards-5 {
        grid-template-columns: repeat(2, 1fr);
      }
      .agenda-layout {
        grid-template-columns: 1fr;
      }
      .pricing-cards-row {
        grid-template-columns: 1fr;
        max-width: 460px;
        margin: 40px auto 0;
      }
      .faq-layout {
        grid-template-columns: 1fr;
      }
      .prefooter-inner {
        flex-direction: column;
        text-align: center;
      }
    }

    @media (max-width: 640px) {
      .top-meta-bar {
        flex-direction: column;
        gap: 8px;
        text-align: center;
      }
      .hero-info-strip {
        grid-template-columns: 1fr;
        text-align: left;
      }
      .keywords-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      .takeaways-cards-5 {
        grid-template-columns: 1fr;
      }
      .mobile-sticky-cta {
        display: block;
      }
      body {
        padding-bottom: 72px;
      }
    }
  </style>
</head>
<body>

  <!-- =========================================================
       1. TOP BAR (MOCKUP EXACTO: SIN MENÚ DE NAVEGACIÓN)
       ========================================================= -->
  <header class="container top-meta-bar">
    <div class="top-event-tag">EVENTO PRESENCIAL</div>
    <div class="top-right-keywords">IDEAS // HERRAMIENTAS // CASOS REALES // RESULTADOS</div>
  </header>

  <!-- =========================================================
       2. HERO SECTION
       ========================================================= -->
  <section class="hero-wrap">
    <div class="container">
      <div class="hero-grid">
        <!-- Text & Action Left -->
        <div>
          <h1 class="hero-title">
            <span>Mentalidad</span>
            <span>y Marketing</span>
            <span class="gold-gradient">Neuroventas con IA</span>
          </h1>
          <p class="hero-subtitle">
            Una jornada para transformar la forma en que pensás, comunicás y vendés tu negocio, con neurociencia, inteligencia artificial, marca personal y casos reales.
          </p>

          <!-- Info Strip -->
          <div class="hero-info-strip">
            <div class="info-item">
              <span class="info-icon">📅</span>
              <div>
                <div class="info-title">10 de octubre</div>
                <div class="info-desc">Sábado · Presencial</div>
              </div>
            </div>
            <div class="info-item">
              <span class="info-icon">⏰</span>
              <div>
                <div class="info-title">10:00 a 17:00 hs</div>
                <div class="info-desc">Break de 13 a 14 hs</div>
              </div>
            </div>
            <div class="info-item">
              <span class="info-icon">📍</span>
              <div>
                <div class="info-title">Lavalle 362, Piso 7</div>
                <div class="info-desc">Microcentro, CABA</div>
              </div>
            </div>
          </div>

          <!-- CTAs -->
          <div class="hero-cta-group">
            <a href="https://wa.me/5491170610766?text=Hola%2C%20quiero%20reservar%20mi%20lugar%20para%20el%20evento%20Mentalidad%20y%20Marketing%20del%2010%20de%20octubre." target="_blank" rel="noopener noreferrer" class="btn-gold-main">
              RESERVAR MI LUGAR →
            </a>
            <div class="badge-cupos">
              <span>👥</span> CUPOS LIMITADOS
            </div>
          </div>
        </div>

        <!-- 3 Speakers Visual Right -->
        <div class="hero-speakers-col">
          <div class="hero-glow-bg"></div>
          <img
            src="/events_new/hero-speakers-group-wide.jpg"
            alt="Speakers: Fede Nowback, Anthony Sánchez Altuna, Christian Cencherle"
            class="hero-speakers-image"
          >
          <div class="hero-speakers-signatures">
            <div class="sig-block">
              <div class="sig-name">Fede Novak</div>
              <div class="sig-topic">Marca Personal y Mentalidad</div>
            </div>
            <div class="sig-block">
              <div class="sig-name">Anthony Sánchez Altuna</div>
              <div class="sig-topic">Neuroventas con IA</div>
            </div>
            <div class="sig-block">
              <div class="sig-name">Christian Cencherle</div>
              <div class="sig-topic">Trayectoria Empresarial</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================
       3. KEYWORDS PILLS STRIP
       ========================================================= -->
  <section class="keywords-strip">
    <div class="container">
      <div class="keywords-grid">
        <div class="kw-card">
          <span class="kw-icon">🧠</span>
          <span class="kw-text">Mentalidad</span>
        </div>
        <div class="kw-card">
          <span class="kw-icon">📈</span>
          <span class="kw-text">Marketing</span>
        </div>
        <div class="kw-card">
          <span class="kw-icon">🎯</span>
          <span class="kw-text">Neuroventas</span>
        </div>
        <div class="kw-card">
          <span class="kw-icon">⚡</span>
          <span class="kw-text">IA Aplicada</span>
        </div>
        <div class="kw-card">
          <span class="kw-icon">📸</span>
          <span class="kw-text">Contenido</span>
        </div>
        <div class="kw-card">
          <span class="kw-icon">💼</span>
          <span class="kw-text">Casos Reales</span>
        </div>
        <div class="kw-card">
          <span class="kw-icon">🤝</span>
          <span class="kw-text">Networking</span>
        </div>
        <div class="kw-card">
          <span class="kw-icon">🚀</span>
          <span class="kw-text">Crecimiento</span>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================
       4. MANIFIESTO SECTION
       ========================================================= -->
  <section class="manifiesto-wrap">
    <div class="container">
      <div class="manifiesto-grid">
        <div class="manifiesto-quote">
          <h2>
            No necesitás más información.
            <span class="gold-gradient" style="display: block; margin-top: 6px;">Necesitás saber cómo usarla para vender.</span>
          </h2>
        </div>
        <div class="manifiesto-center-img">
          <img src="/events_new/manifiesto-bg.jpg" alt="Businessman looking at city lights">
        </div>
        <div class="manifiesto-body">
          <p>
            Hoy tenemos más herramientas que nunca. Pero tener acceso a ellas no significa saber utilizarlas estratégicamente.
          </p>
          <p>
            <strong>Mentalidad y Marketing — Neuroventas con IA</strong> es una experiencia presencial para dueños de negocio y emprendedores que quieren entender cómo toman decisiones sus clientes, cómo comunicar valor y cómo utilizar la inteligencia artificial y las redes sociales para vender más, con casos reales y herramientas concretas.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================
       5. SPEAKERS SECTION
       ========================================================= -->
  <section class="speakers-wrap">
    <div class="container">
      <div class="section-header">
        <div class="section-tag">SPEAKERS</div>
        <div class="section-title-row">
          <h2 class="section-main-title">
            Tres miradas. Un mismo objetivo:<br>
            <span class="gold-gradient">hacer crecer tu negocio.</span>
          </h2>
          <div class="section-right-note">
            EXPERIENCIA REAL · CONOCIMIENTOS APLICABLES · RESULTADOS
          </div>
        </div>
      </div>

      <div class="speakers-cards-grid">
        <!-- Card 1: Anthony -->
        <div class="speaker-box">
          <div class="speaker-img-container">
            <img src="/events_new/speaker-anthony-card.jpg" alt="Anthony Sánchez Altuna">
            <div class="speaker-img-shade"></div>
          </div>
          <div class="speaker-details">
            <h3 class="speaker-h3">Anthony <span class="last-name">Sánchez Altuna</span></h3>
            <div class="speaker-subrole">Economista · Empresario · Especialista en Marketing Digital</div>
            <ul class="speaker-bullets-list">
              <li>Dueño de una clínica dental y de una agencia de marketing.</li>
              <li>Director de GEN (Gestión Empresarial de Negocios).</li>
              <li>Formado junto a Jürgen Klaric.</li>
            </ul>
            <div class="speaker-topic-pill">NEUROVENTAS Y NEUROMARKETING CON IA</div>
            <p class="speaker-summary-text">
              Herramientas de diseño, contenido y campañas publicitarias en redes sociales, con ejemplos y métricas reales de sus propios negocios.
            </p>
          </div>
        </div>

        <!-- Card 2: Fede -->
        <div class="speaker-box">
          <div class="speaker-img-container">
            <img src="/events_new/speaker-fede-card.jpg" alt="Fede Nowback">
            <div class="speaker-img-shade"></div>
          </div>
          <div class="speaker-details">
            <h3 class="speaker-h3">Fede <span class="last-name">Nowback</span></h3>
            <div class="speaker-subrole">Productor · Creador de contenido · Referente en Marca Personal</div>
            <ul class="speaker-bullets-list">
              <li>Marca personal consolidada.</li>
              <li>Referente e influencer en redes sociales.</li>
              <li>Especialista en monetización digital y mentalidad.</li>
            </ul>
            <div class="speaker-topic-pill">MARCA PERSONAL, MENTALIDAD Y VENTAS EN REDES SOCIALES</div>
            <p class="speaker-summary-text">
              Cómo vender a través de redes sociales, humanizar tu marca personal, trabajar la mentalidad y la autoconfianza, y dar los primeros pasos para vender online.
            </p>
          </div>
        </div>

        <!-- Card 3: Christian -->
        <div class="speaker-box">
          <div class="speaker-img-container">
            <img src="/events_new/speaker-christian-card.jpg" alt="Christian Cencherle">
            <div class="speaker-img-shade"></div>
          </div>
          <div class="speaker-details">
            <h3 class="speaker-h3">Christian <span class="last-name">Cencherle</span></h3>
            <div class="speaker-subrole">Empresario · Más de 25 años en el mercado</div>
            <ul class="speaker-bullets-list">
              <li>Referente del rubro lanas y confección.</li>
              <li>Dos locales estratégicos (Palermo y Lomas de Zamora).</li>
              <li>Liderazgo y resiliencia en contextos desafiantes.</li>
            </ul>
            <div class="speaker-topic-pill">EMPRENDER CUANDO LA TEORÍA SE TERMINA</div>
            <p class="speaker-summary-text">
              Charla motivacional basada en su trayectoria de más de 25 años construyendo y consolidando una empresa en el mercado argentino.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================
       6. QUÉ TE LLEVÁS
       ========================================================= -->
  <section class="takeaways-wrap">
    <div class="container">
      <div class="section-header" style="text-align: center;">
        <div class="section-tag">QUÉ TE LLEVÁS</div>
        <h2 class="section-main-title" style="margin-bottom: 12px;">
          Ideas que podés <span class="gold-gradient">implementar.</span>
        </h2>
        <p style="font-size: 15px; color: rgba(237, 232, 223, 0.75); max-width: 620px; margin: 0 auto;">
          Vas a salir del evento con herramientas concretas, inspiración y contactos para seguir haciendo crecer tu negocio.
        </p>
      </div>

      <div class="takeaways-cards-5">
        <div class="takeaway-item">
          <div class="takeaway-circle-icon">🤖</div>
          <h3>Herramientas prácticas de IA</h3>
          <p>Aplicadas a redes sociales y ventas.</p>
        </div>
        <div class="takeaway-item">
          <div class="takeaway-circle-icon">📊</div>
          <h3>Casos reales y métricas</h3>
          <p>De campañas implementadas.</p>
        </div>
        <div class="takeaway-item">
          <div class="takeaway-circle-icon">🧠</div>
          <h3>Estrategias de neuroventas</h3>
          <p>Y neuromarketing.</p>
        </div>
        <div class="takeaway-item">
          <div class="takeaway-circle-icon">👤</div>
          <h3>Cómo construir y humanizar tu marca personal</h3>
          <p>Para conectar y generar autoridad.</p>
        </div>
        <div class="takeaway-item">
          <div class="takeaway-circle-icon">👥</div>
          <h3>Networking</h3>
          <p>Con otros dueños de negocio y emprendedores.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================
       7. AGENDA
       ========================================================= -->
  <section class="agenda-wrap">
    <div class="container">
      <div class="agenda-layout">
        <!-- Visual auditorium left -->
        <div class="agenda-banner">
          <img src="/events_new/agenda-auditorium.jpg" alt="Auditorio de conferencias">
          <div class="agenda-banner-overlay">
            <div class="agenda-banner-title">Ideas reales para negocios reales.</div>
            <div class="agenda-banner-sub">Herramientas que podés aplicar desde el día siguiente</div>
          </div>
        </div>

        <!-- Timeline right -->
        <div>
          <div class="section-tag">AGENDA</div>
          <h2 class="section-main-title" style="margin-bottom: 24px;">
            Un día, <span class="gold-gradient">todo lo que necesitás.</span>
          </h2>

          <div class="agenda-timeline-list">
            <div class="agenda-step">
              <div class="agenda-time-pill">10:00</div>
              <div class="agenda-info">
                <h4>Apertura: Neuroventas y marketing con IA</h4>
                <p>Anthony Sánchez Altuna</p>
              </div>
            </div>

            <div class="agenda-step">
              <div class="agenda-time-pill">13:00</div>
              <div class="agenda-info">
                <h4>Break (1 hora)</h4>
                <p>Almuerzo y networking</p>
              </div>
            </div>

            <div class="agenda-step">
              <div class="agenda-time-pill">14:00</div>
              <div class="agenda-info">
                <h4>Charla motivacional & Marca personal</h4>
                <p>Christian Cencherle: Charla motivacional para empresarios</p>
                <p style="margin-top: 4px;">Fede Novak: Marca personal y mentalidad</p>
              </div>
            </div>

            <div class="agenda-step">
              <div class="agenda-time-pill">17:00</div>
              <div class="agenda-info">
                <h4>Cierre del evento</h4>
                <p>Conclusiones y oferta especial del día.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================
       8. TU INVERSIÓN
       ========================================================= -->
  <section id="inversion" class="pricing-wrap">
    <div class="container">
      <div class="section-header" style="text-align: center;">
        <div class="section-tag">TU INVERSIÓN</div>
        <h2 class="section-main-title" style="margin-bottom: 10px;">
          Asegurá tu lugar <span class="gold-gradient">antes del 30 de septiembre.</span>
        </h2>
      </div>

      <div class="pricing-cards-row">
        <!-- Box 1: Preventa -->
        <div class="p-card featured">
          <div class="p-ribbon">⭐ PREVENTA EXCLUSIVA</div>
          <div class="p-tier">PREVENTA</div>
          <div class="p-validity">HASTA EL 30 DE SEPTIEMBRE</div>
          <div class="p-old-price">$200.000</div>
          <div class="p-amount">$150.000</div>
          <div class="p-savings">Ahorrás $50.000</div>

          <ul class="p-list">
            <li>Acceso a la jornada completa (10 a 17 hs)</li>
            <li>Las 3 charlas y talleres de los speakers</li>
            <li>Espacio de networking exclusivo</li>
            <li>Material complementario digital</li>
            <li>Certificado de asistencia</li>
          </ul>

          <a href="https://wa.me/5491170610766?text=Hola%2C%20quiero%20reservar%20mi%20lugar%20con%20precio%20de%20PREVENTA%20($150.000)%20para%20el%20evento%20Mentalidad%20y%20Marketing%20del%2010%20de%20octubre." target="_blank" rel="noopener noreferrer" class="btn-gold-main" style="width: 100%;">
            RESERVAR MI LUGAR →
          </a>
        </div>

        <!-- Box 2: Precio de Lista -->
        <div class="p-card">
          <div class="p-tier">PRECIO DE LISTA</div>
          <div class="p-validity">DESDE EL 1 DE OCTUBRE</div>
          <div style="height: 22px;"></div>
          <div class="p-amount">$200.000</div>
          <div style="font-size: 12px; color: rgba(237, 232, 223, 0.5); margin-bottom: 24px;">Precio regular</div>

          <ul class="p-list">
            <li>Acceso a la jornada completa (10 a 17 hs)</li>
            <li>Las 3 charlas y talleres de los speakers</li>
            <li>Espacio de networking exclusivo</li>
            <li>Material complementario digital</li>
          </ul>

          <a href="https://wa.me/5491170610766?text=Hola%2C%20quiero%20consultar%20por%20entradas%20para%20el%20evento%20Mentalidad%20y%20Marketing%20del%2010%20de%20octubre." target="_blank" rel="noopener noreferrer" class="btn-gold-main" style="background: rgba(255, 255, 255, 0.08); color: #FFFFFF; border: 1px solid rgba(212, 175, 55, 0.4); box-shadow: none;">
            Consultar entrada
          </a>
        </div>

        <!-- Box 3: Comunidad Fede Novak -->
        <div class="p-card">
          <div class="p-tier">COMUNIDAD FEDE NOVAK</div>
          <div class="p-validity">BENEFICIO PARA ALUMNOS / SEGUIDORES</div>
          <div style="font-size: 18px; font-weight: 700; color: #D4AF37; margin: 18px 0 8px;">Valor especial</div>
          <p style="font-size: 13px; color: rgba(237, 232, 223, 0.7); line-height: 1.5; margin-bottom: 24px;">
            Valor especial para su comunidad.
          </p>

          <ul class="p-list">
            <li>Acceso completo a toda la jornada</li>
            <li>Descuento exclusivo de comunidad</li>
            <li>Ubicaciones preferenciales</li>
          </ul>

          <a href="https://wa.me/5491170610766?text=Hola%2C%20soy%20de%20la%20comunidad%20de%20Fede%20Nowback%20y%20quiero%20mi%20descuento%20especial%20para%20el%20evento%20del%2010%20de%20octubre." target="_blank" rel="noopener noreferrer" class="btn-gold-main" style="background: rgba(212, 175, 55, 0.15); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.5); box-shadow: none;">
            Consultá para acceder →
          </a>
        </div>
      </div>

      <!-- Medios de Pago Bar -->
      <div class="payments-row">
        <span class="payments-tag">MEDIOS DE PAGO:</span>
        <div class="payments-items">
          <div class="payment-badge"><span>💵</span> Efectivo</div>
          <div class="payment-badge"><span>🏦</span> Transferencia</div>
          <div class="payment-badge"><span>💳</span> Tarjeta de crédito</div>
          <div class="payment-badge"><span>💻</span> Pago online directo desde la web</div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================
       9. PREGUNTAS FRECUENTES
       ========================================================= -->
  <section class="faq-wrap">
    <div class="container">
      <div class="faq-layout">
        <div>
          <div class="section-tag">PREGUNTAS FRECUENTES</div>
          <h2 class="section-main-title" style="margin-bottom: 16px;">
            Todo lo que<br>
            <span class="gold-gradient">necesitás saber.</span>
          </h2>
          <p style="font-size: 14px; color: rgba(237, 232, 223, 0.75); line-height: 1.6; margin-bottom: 24px;">
            ¿Tenés alguna consulta puntual? Escribinos por WhatsApp y te asesoramos al instante.
          </p>
          <a href="https://wa.me/5491170610766?text=Hola%2C%20tengo%20una%20consulta%20sobre%20el%20evento%20Mentalidad%20y%20Marketing%20del%2010%20de%20octubre." target="_blank" rel="noopener noreferrer" class="btn-gold-main" style="font-size: 13px; padding: 12px 24px;">
            💬 Chatear al WhatsApp
          </a>
        </div>

        <div class="faq-accordion-box">
          <div class="faq-single active">
            <button class="faq-btn" onclick="toggleFaq(this)">
              <span>¿Dónde se realiza el evento?</span>
              <span class="faq-icon-sign">+</span>
            </button>
            <div class="faq-body-text">
              El evento se realizará en Lavalle 362, Piso 7, Microcentro, Ciudad Autónoma de Buenos Aires. En una sala moderna y equipada con todas las comodidades.
            </div>
          </div>

          <div class="faq-single">
            <button class="faq-btn" onclick="toggleFaq(this)">
              <span>¿Qué incluye la entrada?</span>
              <span class="faq-icon-sign">+</span>
            </button>
            <div class="faq-body-text">
              Incluye el acceso completo a la jornada presencial (10:00 a 17:00 hs), las exposiciones de Anthony Sánchez Altuna, Fede Nowback y Christian Cencherle, espacio de networking y material digital descargable.
            </div>
          </div>

          <div class="faq-single">
            <button class="faq-btn" onclick="toggleFaq(this)">
              <span>¿Puedo cancelar mi inscripción?</span>
              <span class="faq-icon-sign">+</span>
            </button>
            <div class="faq-body-text">
              Las entradas son transferibles notificando por WhatsApp hasta 48 horas antes del evento con los datos del nuevo asistente.
            </div>
          </div>

          <div class="faq-single">
            <button class="faq-btn" onclick="toggleFaq(this)">
              <span>¿Hay estacionamiento cerca?</span>
              <span class="faq-icon-sign">+</span>
            </button>
            <div class="faq-body-text">
              Sí, hay múltiples cocheras y estacionamientos comerciales sobre Lavalle, Florida, Corrientes y San Martín a pocos metros del lugar.
            </div>
          </div>

          <div class="faq-single">
            <button class="faq-btn" onclick="toggleFaq(this)">
              <span>¿A quién está dirigido?</span>
              <span class="faq-icon-sign">+</span>
            </button>
            <div class="faq-body-text">
              A dueños de negocio, comerciantes, profesionales independientes y emprendedores que quieran multiplicar sus ventas con inteligencia artificial y marca personal.
            </div>
          </div>

          <div class="faq-single">
            <button class="faq-btn" onclick="toggleFaq(this)">
              <span>¿Cómo se realiza el pago?</span>
              <span class="faq-icon-sign">+</span>
            </button>
            <div class="faq-body-text">
              Podés abonar por transferencia bancaria en pesos, tarjeta de crédito/débito, efectivo o pago online directo. Al escribirnos te enviamos los links de cobro.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================
       10. PRE-FOOTER BANNER & LOGOS
       ========================================================= -->
  <section class="prefooter-wrap">
    <div class="prefooter-bg"></div>
    <div class="container">
      <div class="prefooter-inner">
        <div>
          <div class="top-event-tag" style="margin-bottom: 8px;">EVENTO PRESENCIAL</div>
          <h2 class="prefooter-left-title">
            Mentalidad y Marketing<br>
            <span class="gold-gradient">Neuroventas con IA</span>
          </h2>
          <div class="prefooter-left-sub">
            📅 10 de octubre · ⏰ 10:00 a 17:00 hs · 📍 Lavalle 362, Piso 7, Microcentro, CABA
          </div>
        </div>

        <div style="display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
          <div class="badge-cupos">
            <span>👥</span> CUPOS LIMITADOS
          </div>
          <a href="https://wa.me/5491170610766?text=Hola%2C%20quiero%20reservar%20mi%20lugar%20para%20el%20evento%20Mentalidad%20y%20Marketing%20del%2010%20de%20octubre." target="_blank" rel="noopener noreferrer" class="btn-gold-main">
            RESERVAR MI LUGAR →
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Organizers -->
  <section class="organizers-strip">
    <div class="container">
      <div class="org-label">ORGANIZAN</div>
      <div class="org-logos-row">
        <div class="org-item">GEN · Gestión Empresarial de Negocios</div>
        <div class="org-item">⚡ tecnobrain</div>
        <div class="org-item">Cencherle LANAS</div>
        <div class="org-item">Fede Novak</div>
      </div>
    </div>
  </section>

  <!-- Copyright -->
  <footer class="copyright-bar">
    <div class="container">
      © 2026 · Mentalidad y Marketing — Neuroventas con IA · Todos los derechos reservados.
    </div>
  </footer>

  <!-- =========================================================
       11. MOBILE STICKY BOTTOM BAR
       ========================================================= -->
  <div class="mobile-sticky-cta">
    <div class="mobile-sticky-flex">
      <div class="sticky-price-col">
        <span class="sticky-tag">PREVENTA 10 OCT</span>
        <span class="sticky-val">$150.000</span>
      </div>
      <a href="https://wa.me/5491170610766?text=Hola%2C%20quiero%20reservar%20mi%20lugar%20con%20precio%20de%20PREVENTA%20($150.000)%20para%20el%20evento%20Mentalidad%20y%20Marketing." target="_blank" rel="noopener noreferrer" class="btn-gold-main" style="padding: 11px 22px; font-size: 13px;">
        RESERVAR →
      </a>
    </div>
  </div>

  <script>
    function toggleFaq(btn) {
      const item = btn.parentElement;
      const isActive = item.classList.contains('active');
      document.querySelectorAll('.faq-single').forEach(el => el.classList.remove('active'));
      if (!isActive) {
        item.classList.add('active');
      }
    }
  </script>
</body>
</html>
