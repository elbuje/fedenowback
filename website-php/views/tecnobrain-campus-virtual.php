<?php
/**
 * Landing Page: Desarrollo Web, Landings y Campus Virtual para Coaches, Mentores y Marca Personal
 * Marca: TECNOBRAIN Servicios Informáticos
 * Estética: Manual de Marca Tecnobrain (Open Sans, Violeta #6A4E9E, Lima #A5C400, Gris #9D9C9E, Azul Midnight)
 */
$page_title = "Campus Virtual y Web para Coaches, Mentores y Marca Personal | Tecnobrain";
$page_desc = "Desarrollamos tu ecosistema digital integral: Web de autoridad, Landing Pages de alta conversión y Campus Virtual propio. Cobros directos a tu cuenta, sin suscripciones en dólares y 0% comisión los primeros 6 meses.";
$whatsapp_num = "5491160253240";
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://tecnobrain.ar/campus-virtual-para-coaches-mentores-marca-personal">

    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
    <meta property="og:url" content="https://tecnobrain.ar/campus-virtual-para-coaches-mentores-marca-personal">
    <meta property="og:site_name" content="Tecnobrain Servicios Informáticos">

    <!-- Tipografía Oficial Tecnobrain: Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Schema.org JSON-LD (Capa 4 & 5 SEO) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "Organization",
          "name": "Tecnobrain Servicios Informáticos",
          "url": "https://tecnobrain.ar",
          "description": "Somos tu aliado tecnológico en soluciones informáticas integrales. Diseño web, infraestructura y plataformas digitales para profesionales y empresas.",
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+5491160253240",
            "contactType": "sales",
            "areaServed": "AR",
            "availableLanguage": ["es"]
          }
        },
        {
          "@type": "Service",
          "name": "Desarrollo Web, Landings y Campus Virtual para Creadores y Mentores",
          "provider": {
            "@type": "Organization",
            "name": "Tecnobrain Servicios Informáticos"
          },
          "description": "Desarrollo llave en mano de plataformas propias para venta de cursos, membresías y mentorías: Web institucional, Landing Pages de alta conversión y Campus Virtual interactivo.",
          "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Planes de Plataforma y Campus Virtual",
            "itemListElement": [
              {
                "@type": "Offer",
                "name": "Landing Page de Alta Conversión",
                "price": "150000",
                "priceCurrency": "ARS",
                "description": "Hasta 5 bloques de contenido, entrega estimada en 4 días, soporte estándar e integración con links de pago."
              },
              {
                "@type": "Offer",
                "name": "Página Web de Autoridad con Landings",
                "price": "550000",
                "priceCurrency": "ARS",
                "description": "Hasta 5 secciones principales, 3 landing pages gratis por 6 meses, hasta 3 cambios básicos por mes, entrega en 15 días y soporte prioritario."
              },
              {
                "@type": "Offer",
                "name": "Comunidad Full (Web + Campus Virtual)",
                "price": "900000",
                "priceCurrency": "ARS",
                "description": "Página web + Campus de comunidad, 0% comisión por usuario los primeros 6 meses, entrega en 30 días y soporte VIP dedicado."
              }
            ]
          }
        },
        {
          "@type": "FAQPage",
          "mainEntity": [
            {
              "@type": "Question",
              "name": "¿Por qué tener mi propio campus en vez de plataformas como Skool o Hotmart?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Tener tu propio campus te otorga 100% de propiedad sobre tu marca, tus datos y tus alumnos. No dependés de suscripciones fijas en dólares ($99-$299 USD/mes) ni de retenciones de hasta 15% por venta. Además, cobrás directo a tu cuenta bancaria o Mercado Pago en el acto."
              }
            },
            {
              "@type": "Question",
              "name": "¿Cómo funciona el esquema de comisiones y mantenimiento en el plan Comunidad Full?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Durante los primeros 6 meses tenés 0% de comisión por usuario (el ingreso de alumnos está 100% bonificado). A partir del mes 7 se abona un mantenimiento mensual de $100.000 ARS + comisión por alumno activo."
              }
            },
            {
              "@type": "Question",
              "name": "¿El costo del dominio web está incluido en los precios?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Todos los precios son aparte del costo del dominio (por ejemplo .com o .com.ar). El cliente lo adquiere o gestiona de forma independiente en NIC Argentina o su registrador preferido para mantener su titularidad legal."
              }
            },
            {
              "@type": "Question",
              "name": "¿Cómo cobro a mis alumnos sus inscripciones?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Conectamos los medios de pago que ya utilizás habitualmente: links de pago de Mercado Pago, transferencias con CBU/CVU o botones de cobro directos, recibiendo el 100% de la facturación en tu cuenta."
              }
            }
          ]
        }
      ]
    }
    </script>

    <style>
        :root {
            /* Paleta Oficial Tecnobrain */
            --tb-violet: #6A4E9E;
            --tb-violet-dark: #4A3372;
            --tb-violet-deep: #2B2353;
            --tb-lime: #A5C400;
            --tb-lime-glow: rgba(165, 196, 0, 0.35);
            --tb-gray: #9D9C9E;
            --tb-gray-light: #E5E7EB;
            
            /* Fondo tecnológico oscuro (Flyer midnight blue) */
            --bg-deep: #070a13;
            --bg-card: rgba(13, 20, 36, 0.88);
            --bg-card-border: rgba(255, 255, 255, 0.08);
            --bg-card-hover: rgba(18, 28, 50, 0.95);
            
            /* Azul eléctrico de acción (Flyer) */
            --blue-accent: #2563eb;
            --blue-glow: rgba(37, 99, 235, 0.35);
            --blue-pill: #1d4ed8;
            
            --text-main: #FFFFFF;
            --text-muted: #94a3b8;
            --text-sub: #cbd5e1;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-deep);
            color: var(--text-main);
            line-height: 1.6;
            overflow-x: hidden;
            background-image: 
                radial-gradient(circle at 50% 0%, rgba(106, 78, 158, 0.18) 0%, transparent 60%),
                radial-gradient(circle at 85% 30%, rgba(37, 99, 235, 0.12) 0%, transparent 50%),
                radial-gradient(circle at 15% 70%, rgba(165, 196, 0, 0.08) 0%, transparent 50%);
            background-attachment: fixed;
        }

        .container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* NAVBAR INSTITUCIONAL TECNOBRAIN */
        .tb-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(7, 10, 19, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 16px 0;
        }
        .tb-header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .tb-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
        }
        .tb-brand-svg {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
        }
        .tb-brand-titles {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }
        .tb-brand-name {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #FFFFFF;
        }
        .tb-brand-name span {
            color: #B7BF10;
        }
        .tb-brand-sub {
            font-size: 11px;
            font-weight: 400;
            letter-spacing: 0.5px;
            color: var(--tb-gray);
            text-transform: uppercase;
            margin-top: 2px;
        }
        .tb-nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            list-style: none;
        }
        .tb-nav-links a {
            color: #9ca3af;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: color 0.2s ease;
        }
        .tb-nav-links a:hover {
            color: #B7BF10;
        }
        .tb-nav-btn {
            background: #B7BF10;
            color: #050505;
            padding: 10px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: 0.3px;
            transition: all 0.25s ease;
            box-shadow: 0 0 20px rgba(183, 191, 16, 0.25);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .tb-nav-btn:hover {
            background: #FFFFFF;
            color: #050505;
            transform: translateY(-1px);
            box-shadow: 0 0 25px rgba(255, 255, 255, 0.4);
        }

        /* HERO SECTION */
        .hero {
            padding: 90px 0 70px;
            text-align: center;
            position: relative;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(106, 78, 158, 0.16);
            border: 1px solid rgba(106, 78, 158, 0.35);
            padding: 6px 18px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            color: #d8b4fe;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 24px;
        }
        .hero-badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--tb-lime);
            box-shadow: 0 0 8px var(--tb-lime);
        }
        .hero h1 {
            font-size: 52px;
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -1px;
            max-width: 980px;
            margin: 0 auto 24px;
            color: #FFFFFF;
        }
        .hero h1 .highlight-blue {
            color: #38bdf8;
            background: linear-gradient(135deg, #38bdf8 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero h1 .highlight-lime {
            color: var(--tb-lime);
        }
        .hero-lead {
            font-size: 19px;
            font-weight: 400;
            color: var(--text-sub);
            max-width: 820px;
            margin: 0 auto 40px;
            line-height: 1.7;
        }
        .hero-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 50px;
        }
        .btn-primary {
            background: var(--blue-accent);
            color: #FFFFFF;
            padding: 16px 36px;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 6px 24px rgba(37, 99, 235, 0.4);
            transition: all 0.25s ease;
        }
        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.6);
        }
        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            color: #FFFFFF;
            padding: 16px 32px;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: all 0.25s ease;
        }
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* BADGES METRICAS */
        .hero-metrics {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            max-width: 980px;
            margin: 0 auto;
        }
        .metric-card {
            background: rgba(13, 20, 36, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            padding: 16px;
            text-align: center;
        }
        .metric-val {
            font-size: 18px;
            font-weight: 800;
            color: var(--tb-lime);
        }
        .metric-label {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* SECCION DIAGNOSTICO B2B / DOLORES */
        .section {
            padding: 90px 0;
            position: relative;
        }
        .section-header {
            text-align: center;
            max-width: 780px;
            margin: 0 auto 54px;
        }
        .section-tag {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--tb-lime);
            margin-bottom: 12px;
            display: block;
        }
        .section-title {
            font-size: 38px;
            font-weight: 800;
            letter-spacing: -0.5px;
            line-height: 1.25;
            color: #FFFFFF;
            margin-bottom: 18px;
        }
        .section-subtitle {
            font-size: 16px;
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* GRID PROBLEMAS */
        .pain-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }
        .pain-card {
            background: var(--bg-card);
            border: 1px solid var(--bg-card-border);
            border-radius: 18px;
            padding: 32px;
            transition: all 0.3s ease;
        }
        .pain-card:hover {
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-4px);
        }
        .pain-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 20px;
            background: rgba(239, 68, 68, 0.12);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.25);
        }
        .pain-card h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #FFFFFF;
        }
        .pain-card p {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* PILARES DEL SERVICIO */
        .pillars-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 28px;
        }
        .pillar-card {
            background: var(--bg-card);
            border: 1px solid var(--bg-card-border);
            border-radius: 20px;
            padding: 36px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .pillar-card:hover {
            border-color: rgba(37, 99, 235, 0.4);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }
        .pillar-badge {
            display: inline-block;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 4px 12px;
            border-radius: 6px;
            margin-bottom: 18px;
        }
        .pillar-b1 { background: rgba(106, 78, 158, 0.2); color: #d8b4fe; border: 1px solid rgba(106, 78, 158, 0.35); }
        .pillar-b2 { background: rgba(37, 99, 235, 0.15); color: #93c5fd; border: 1px solid rgba(37, 99, 235, 0.3); }
        .pillar-b3 { background: rgba(165, 196, 0, 0.15); color: #d9f99d; border: 1px solid rgba(165, 196, 0, 0.3); }
        .pillar-b4 { background: rgba(16, 185, 129, 0.15); color: #a7f3d0; border: 1px solid rgba(16, 185, 129, 0.3); }
        .pillar-card h3 {
            font-size: 22px;
            font-weight: 700;
            color: #FFFFFF;
            margin-bottom: 14px;
        }
        .pillar-card p {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.7;
            margin-bottom: 18px;
        }
        .pillar-list {
            list-style: none;
            space-y: 10px;
        }
        .pillar-list li {
            font-size: 13px;
            color: var(--text-sub);
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }
        .pillar-list li span {
            color: var(--tb-lime);
            font-weight: 800;
        }

        /* CASO DE ESTUDIO REAL (FEDE NOWBACK) */
        .case-study {
            background: linear-gradient(135deg, rgba(106, 78, 158, 0.12) 0%, rgba(13, 20, 36, 0.95) 100%);
            border: 1px solid rgba(106, 78, 158, 0.3);
            border-radius: 24px;
            padding: 48px;
            display: grid;
            grid-template-columns: 1.3fr 0.7fr;
            gap: 40px;
            align-items: center;
            margin-top: 40px;
        }
        .case-tag {
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--tb-lime);
            margin-bottom: 8px;
        }
        .case-study h3 {
            font-size: 30px;
            font-weight: 800;
            line-height: 1.25;
            color: #FFFFFF;
            margin-bottom: 16px;
        }
        .case-study p {
            font-size: 15px;
            color: var(--text-sub);
            line-height: 1.7;
            margin-bottom: 24px;
        }
        .case-stats {
            display: flex;
            gap: 24px;
            margin-bottom: 24px;
        }
        .case-stat-box {
            background: rgba(7, 10, 19, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 14px 20px;
        }
        .case-stat-val {
            font-size: 24px;
            font-weight: 800;
            color: var(--tb-lime);
        }
        .case-stat-desc {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 2px;
        }
        .case-quote-box {
            background: rgba(7, 10, 19, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 18px;
            padding: 30px;
            text-align: center;
        }
        .case-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--tb-violet) 0%, var(--tb-lime) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
            color: #FFFFFF;
            margin: 0 auto 16px;
        }
        .case-quote {
            font-size: 13px;
            font-style: italic;
            color: var(--text-sub);
            line-height: 1.7;
            margin-bottom: 14px;
        }
        .case-author {
            font-size: 13px;
            font-weight: 700;
            color: #FFFFFF;
        }
        .case-author-role {
            font-size: 11px;
            color: var(--tb-gray);
        }

        /* SECCION DE PRECIOS EXACTOS DEL FLYER */
        .pricing-section {
            padding: 100px 0;
            background: rgba(7, 10, 19, 0.95);
            position: relative;
        }
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            align-items: stretch;
            margin-top: 40px;
        }
        .pricing-card {
            background: var(--bg-card);
            border: 1px solid var(--bg-card-border);
            border-radius: 20px;
            padding: 40px 32px 36px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            transition: all 0.3s ease;
        }
        .pricing-card:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 255, 255, 0.2);
        }

        /* TARJETA DESTACADA: PAGINA WEB - MAS POPULAR (FLYER) */
        .pricing-card.featured {
            background: rgba(13, 22, 44, 0.95);
            border: 2px solid var(--blue-accent);
            box-shadow: 0 0 35px var(--blue-glow);
            transform: scale(1.02);
            z-index: 10;
        }
        .pricing-card.featured:hover {
            transform: scale(1.03) translateY(-4px);
            box-shadow: 0 0 45px rgba(37, 99, 235, 0.5);
        }
        .badge-popular {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--blue-accent);
            color: #FFFFFF;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.6px;
            padding: 5px 18px;
            border-radius: 999px;
            text-transform: uppercase;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
        }

        .pricing-title {
            font-size: 24px;
            font-weight: 800;
            color: #FFFFFF;
            text-align: center;
            margin-bottom: 12px;
        }
        .pricing-price {
            font-size: 44px;
            font-weight: 800;
            color: #FFFFFF;
            text-align: center;
            line-height: 1;
            margin-bottom: 6px;
            letter-spacing: -1px;
        }
        .pricing-installments {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-muted);
            text-align: center;
            margin-bottom: 28px;
        }
        .pricing-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.08);
            margin: 0 -32px 28px;
        }

        /* BULLETS CON CHECK VERDE DEL FLYER */
        .pricing-features {
            list-style: none;
            margin-bottom: 36px;
            flex-grow: 1;
        }
        .pricing-features li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 14px;
            color: #e2e8f0;
            margin-bottom: 16px;
            line-height: 1.5;
        }
        .check-icon {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* BOTON AZUL PILDORA EMPEZAR (DEL FLYER) */
        .btn-pricing {
            display: block;
            width: 100%;
            text-align: center;
            background: var(--blue-accent);
            color: #FFFFFF;
            padding: 14px 24px;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.35);
        }
        .btn-pricing:hover {
            background: #3b82f6;
            box-shadow: 0 6px 22px rgba(37, 99, 235, 0.55);
            transform: translateY(-2px);
        }

        /* POLITICAS TRANSPARENTES */
        .pricing-notes {
            margin-top: 40px;
            background: rgba(13, 20, 36, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            padding: 22px 28px;
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.7;
        }
        .pricing-notes strong {
            color: #FFFFFF;
        }

        /* TABLA COMPARATIVA */
        .comp-table-wrap {
            overflow-x: auto;
            margin-top: 30px;
        }
        .comp-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            text-align: left;
        }
        .comp-table th, .comp-table td {
            padding: 18px 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .comp-table th {
            font-weight: 700;
            color: #FFFFFF;
            background: rgba(13, 20, 36, 0.8);
        }
        .comp-table th.tb-col {
            background: rgba(37, 99, 235, 0.15);
            color: #60a5fa;
            border-left: 1px solid rgba(37, 99, 235, 0.3);
            border-right: 1px solid rgba(37, 99, 235, 0.3);
        }
        .comp-table td.tb-col {
            background: rgba(37, 99, 235, 0.05);
            color: #FFFFFF;
            font-weight: 600;
            border-left: 1px solid rgba(37, 99, 235, 0.2);
            border-right: 1px solid rgba(37, 99, 235, 0.2);
        }
        .comp-table td {
            color: var(--text-muted);
        }

        /* FAQ ACCORDION */
        .faq-wrap {
            max-width: 860px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .faq-item {
            background: var(--bg-card);
            border: 1px solid var(--bg-card-border);
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.2s ease;
        }
        .faq-header {
            padding: 20px 24px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 700;
            font-size: 15px;
            color: #FFFFFF;
            user-select: none;
        }
        .faq-header:hover {
            color: #60a5fa;
        }
        .faq-icon {
            font-size: 18px;
            transition: transform 0.3s ease;
            color: var(--tb-lime);
        }
        .faq-item.open .faq-icon {
            transform: rotate(45deg);
        }
        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease, padding 0.35s ease;
            padding: 0 24px;
            font-size: 14px;
            color: var(--text-sub);
            line-height: 1.7;
        }
        .faq-item.open .faq-body {
            max-height: 250px;
            padding: 0 24px 20px;
        }

        /* CTA FINAL */
        .cta-box {
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.2) 0%, rgba(106, 78, 158, 0.2) 100%);
            border: 1px solid rgba(37, 99, 235, 0.35);
            border-radius: 28px;
            padding: 60px 40px;
            text-align: center;
            max-width: 920px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }
        .cta-box h2 {
            font-size: 38px;
            font-weight: 800;
            line-height: 1.25;
            color: #FFFFFF;
            margin-bottom: 18px;
        }
        .cta-box p {
            font-size: 16px;
            color: var(--text-sub);
            max-width: 680px;
            margin: 0 auto 36px;
            line-height: 1.7;
        }

        /* FOOTER CORPORATIVO TECNOBRAIN */
        .tb-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: #050505;
            padding: 70px 0 30px;
            font-size: 14px;
            color: var(--text-muted);
            position: relative;
        }
        .tb-footer-topline {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 900px;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, #B7BF10 50%, transparent 100%);
            opacity: 0.4;
        }
        .tb-footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 40px;
            margin-bottom: 50px;
        }
        .tb-footer-col h4 {
            color: #FFFFFF;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding-bottom: 8px;
        }
        .tb-footer-links {
            list-style: none;
        }
        .tb-footer-links li {
            margin-bottom: 10px;
        }
        .tb-footer-links a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.2s;
        }
        .tb-footer-links a:hover {
            color: #B7BF10;
        }
        .tb-footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 13px;
            color: #cbd5e1;
        }
        .tb-footer-contact-item span.icon {
            color: #B7BF10;
            font-size: 15px;
        }
        .tb-footer-contact-item a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s;
        }
        .tb-footer-contact-item a:hover {
            color: #FFFFFF;
        }
        .tb-footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            font-size: 12px;
            color: #64748b;
        }
        .tb-footer-bottom a {
            color: #94a3b8;
            text-decoration: none;
            margin-left: 18px;
            transition: color 0.2s;
        }
        .tb-footer-bottom a:hover {
            color: #B7BF10;
        }
        .tb-live-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            color: #a1a1aa;
        }
        .tb-live-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #B7BF10;
            box-shadow: 0 0 6px #B7BF10;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .hero h1 { font-size: 38px; }
            .pricing-grid { grid-template-columns: 1fr; }
            .pricing-card.featured { transform: none; }
            .pricing-card.featured:hover { transform: translateY(-4px); }
            .pain-grid { grid-template-columns: 1fr; }
            .pillars-grid { grid-template-columns: 1fr; }
            .case-study { grid-template-columns: 1fr; padding: 32px; }
            .hero-metrics { grid-template-columns: repeat(2, 1fr); }
            .tb-nav-links { display: none; }
            .tb-footer-grid { grid-template-columns: 1fr; gap: 32px; }
            .tb-footer-bottom { flex-direction: column; text-align: center; }
            .tb-footer-bottom a { margin: 0 8px; }
        }
    </style>
</head>
<body>

    <!-- 1. HEADER INSTITUCIONAL TECNOBRAIN -->
    <header class="tb-header">
        <div class="container tb-header-inner">
            <a href="https://tecnobrain.ar" class="tb-brand">
                <!-- Isotipo 3 pastillas exactas de la diapositiva 1 y 4 -->
                <svg class="tb-brand-svg" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Pastilla violeta inferior-izquierda -->
                    <rect x="22" y="46" width="28" height="28" rx="8" transform="rotate(45 22 46)" fill="#6A4E9E"/>
                    <!-- Pastilla gris superior-derecha -->
                    <rect x="42" y="26" width="28" height="28" rx="8" transform="rotate(45 42 26)" fill="#9D9C9E"/>
                    <!-- Pastilla verde lima inferior-derecha -->
                    <rect x="62" y="46" width="28" height="28" rx="8" transform="rotate(45 62 46)" fill="#A5C400"/>
                </svg>
                <div class="tb-brand-titles">
                    <span class="tb-brand-name">TECNOBRAIN</span>
                    <span class="tb-brand-sub">Servicios Informáticos</span>
                </div>
            </a>

            <nav>
                <ul class="tb-nav-links">
                    <li><a href="#solucion">Ecosistema</a></li>
                    <li><a href="#caso-fede">Caso de Éxito</a></li>
                    <li><a href="#comparativa">Comparativa</a></li>
                    <li><a href="#precios">Precios</a></li>
                    <li><a href="#faq">Preguntas</a></li>
                </ul>
            </nav>

            <a href="https://wa.me/<?= $whatsapp_num ?>?text=Hola%20Tecnobrain!%20Quiero%20conocer%20m%C3%A1s%20sobre%20el%20desarrollo%20de%20Web%20y%20Campus%20Virtual%20para%20mi%20marca%20personal." target="_blank" rel="noopener noreferrer" class="tb-nav-btn">
                Hablemos por WhatsApp
            </a>
        </div>
    </header>

    <!-- 2. HERO PRINCIPAL -->
    <section class="hero">
        <div class="container">
            <div class="hero-badge">
                <span class="hero-badge-dot"></span>
                Tecnobrain • Tu Aliado Tecnológico en Formación y Marca Personal
            </div>

            <h1>
                Tu propia Web, Landing Pages y <span class="highlight-blue">Campus de Comunidad</span> con tu Marca.
            </h1>

            <p class="hero-lead">
                Acompañamos a coaches, mentores y formadores a dar el salto profesional definitivo. Desarrollamos tu infraestructura propia llave en mano: web de autoridad, páginas de venta y un campus virtual interactivo con cobros directos a tu cuenta, sin intermediarios ni suscripciones en dólares.
            </p>

            <div class="hero-actions">
                <a href="#precios" class="btn-primary">
                    <span>Ver Planes y Precios</span>
                    <span>↓</span>
                </a>
                <a href="https://wa.me/<?= $whatsapp_num ?>?text=Hola%20Tecnobrain!%20Quiero%20asesorarme%20sobre%20la%20plataforma%20de%20Campus%20Virtual." target="_blank" rel="noopener noreferrer" class="btn-secondary">
                    Hablar con un Especialista
                </a>
            </div>

            <!-- Métricas de Confianza -->
            <div class="hero-metrics">
                <div class="metric-card">
                    <div class="metric-val">0% Comisión</div>
                    <div class="metric-label">Primeros 6 meses bonificados</div>
                </div>
                <div class="metric-card">
                    <div class="metric-val">100% Directo</div>
                    <div class="metric-label">Tu Mercado Pago o CBU en el acto</div>
                </div>
                <div class="metric-card">
                    <div class="metric-val">4 a 30 Días</div>
                    <div class="metric-label">Plazos de entrega récord</div>
                </div>
                <div class="metric-card">
                    <div class="metric-val">Tu Dominio</div>
                    <div class="metric-label">100% bajo tu titularidad legal</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. SECCIÓN DIAGNÓSTICO: EL DOLOR DEL MENTOR B2B -->
    <section class="section" id="diagnostico">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Somos personas que conectan con personas</span>
                <h2 class="section-title">El techo de cristal de vender cursos por WhatsApp y Drive</h2>
                <p class="section-subtitle">
                    Entendemos los desafíos reales a los que te enfrentás al momento de monetizar y entregar tu conocimiento a tus alumnos.
                </p>
            </div>

            <div class="pain-grid">
                <div class="pain-card">
                    <div class="pain-icon">⚠️</div>
                    <h3>Desorden y Falta de Percepción de Valor</h3>
                    <p>
                        Enviar links sueltos de Drive, links de YouTube no listados y grupos caóticos de WhatsApp transmite informalidad, propicia la piratería de tus cursos y hace que te cueste hacer valer tus precios altos.
                    </p>
                </div>

                <div class="pain-card">
                    <div class="pain-icon">💸</div>
                    <h3>La Trampa de Plataformas en Dólares</h3>
                    <p>
                        Herramientas como Skool o Kajabi cobran suscripciones mensuales fijas en dólares ($99 a $299 USD/mes), más pasarelas foráneas que en Argentina complican la liquidación de fondos o retienen tus cobros.
                    </p>
                </div>

                <div class="pain-card">
                    <div class="pain-icon">🤝</div>
                    <h3>Falta de un Socio Estratégico</h3>
                    <p>
                        Los freelancers desaparecen ante los problemas y los marketplaces se quedan con tus alumnos. Necesitás un equipo tecnológico que responda rápido, garantice disponibilidad y se preocupe por tu crecimiento continuo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. LOS 4 PILARES DEL ECOSISTEMA TECNOBRAIN -->
    <section class="section" id="solucion" style="background: rgba(13, 20, 36, 0.4);">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Infraestructura Llave en Mano</span>
                <h2 class="section-title">Los 4 componentes de tu Ecosistema Digital Propio</h2>
                <p class="section-subtitle">
                    Diseñado específicamente para que solo te preocupes por crear contenido y transformar a tus clientes.
                </p>
            </div>

            <div class="pillars-grid">
                <!-- Pilar 1 -->
                <div class="pillar-card">
                    <span class="pillar-badge pillar-b1">Pilar 1 • Autoridad</span>
                    <h3>Página Web Institucional y de Marca</h3>
                    <p>Tu carta de presentación central en internet. Estructurada con narrativa de alta conversión para transmitir confianza, posicionar tu método y cerrar clientes corporativos o alumnos de mentoría.</p>
                    <ul class="pillar-list">
                        <li><span>✓</span> Hasta 5 secciones o bloques principales diseñados a medida.</li>
                        <li><span>✓</span> Optimización técnica para celulares y computadoras.</li>
                        <li><span>✓</span> Formularios de contacto y conexión con tus redes sociales.</li>
                    </ul>
                </div>

                <!-- Pilar 2 -->
                <div class="pillar-card">
                    <span class="pillar-badge pillar-b2">Pilar 2 • Conversión</span>
                    <h3>Landing Pages de Oferta Rápida</h3>
                    <p>Páginas de aterrizaje sin puntos de fuga creadas para vender eventos, masterclasses, talleres o promociones puntuales con velocidad de entrega estimada en solo 4 días.</p>
                    <ul class="pillar-list">
                        <li><span>✓</span> Estructura de oferta persuasiva, bloques de contenido y urgencia.</li>
                        <li><span>✓</span> Integración directa con tus botones de Mercado Pago o WhatsApp.</li>
                        <li><span>✓</span> El plan Página Web incluye 3 Landings gratuitas por 6 meses.</li>
                    </ul>
                </div>

                <!-- Pilar 3 -->
                <div class="pillar-card">
                    <span class="pillar-badge pillar-b3">Pilar 3 • Retención</span>
                    <h3>Campus Virtual & Comunidad Privada</h3>
                    <p>Tu propia academia online. Un espacio exclusivo donde tus alumnos acceden a tus clases grabadas, materiales descargables, sala de encuentros por Zoom/Meet y muro interactivo.</p>
                    <ul class="pillar-list">
                        <li><span>✓</span> Módulos ordenados y reproductor de video protegido.</li>
                        <li><span>✓</span> 0% de comisión por usuario durante los primeros 6 meses.</li>
                        <li><span>✓</span> Experiencia fluida tipo Skool pero con tu marca y en tus propios servidores.</li>
                    </ul>
                </div>

                <!-- Pilar 4 -->
                <div class="pillar-card">
                    <span class="pillar-badge pillar-b4">Pilar 4 • Facturación</span>
                    <h3>Cobros Directos sin Retenciones</h3>
                    <p>No exigimos integraciones bancarias complejas ni billeteras extranjeras. Conectamos tus propios medios de pago habituales para que el dinero ingrese a tu cuenta el mismo día.</p>
                    <ul class="pillar-list">
                        <li><span>✓</span> Links de Mercado Pago, transferencias CBU/CVU o botones de cobro.</li>
                        <li><span>✓</span> Cero retenciones internacionales ni sorpresas cambiarias.</li>
                        <li><span>✓</span> El alumno paga en pesos argentinos o su moneda local sin trabas.</li>
                    </ul>
                </div>
            </div>

            <!-- CASO DE ESTUDIO REAL -->
            <div class="case-study" id="caso-fede">
                <div>
                    <div class="case-tag">Caso de Éxito en Producción</div>
                    <h3>Fede Nowback: Centralización de marca, mentorías y comunidad</h3>
                    <p>
                        Federico Nowback, especialista en ventas y consultoría de marca personal, transformó su modelo disperso en una plataforma unificada desarrollada por Tecnobrain. Hoy gestiona sus lanzamientos de eventos (como "Encendé tu Fuego"), sus programas 1 a 1 y su campus de comunidad activa.
                    </p>
                    <div class="case-stats">
                        <div class="case-stat-box">
                            <div class="case-stat-val">+100</div>
                            <div class="case-stat-desc">Alumnos & Mentorías activas</div>
                        </div>
                        <div class="case-stat-box">
                            <div class="case-stat-val">100%</div>
                            <div class="case-stat-desc">Control de cobros directos</div>
                        </div>
                        <div class="case-stat-box">
                            <div class="case-stat-val">3 Landings</div>
                            <div class="case-stat-desc">Ofertas y eventos en vivo</div>
                        </div>
                    </div>
                    <a href="https://fedenowback.com.ar" target="_blank" rel="noopener noreferrer" style="color: var(--tb-lime); font-size: 14px; font-weight: 700; text-decoration: none;">
                        Ver sitio web y campus en vivo (fedenowback.com.ar) →
                    </a>
                </div>

                <div class="case-quote-box">
                    <div class="case-avatar">FN</div>
                    <p class="case-quote">
                        "Tener mi propia web y campus con Tecnobrain me permitió ordenar mi oferta, cobrar directo a mi cuenta sin pagar comisiones en dólares y brindar una experiencia profesional que fideliza a mis alumnos."
                    </p>
                    <div class="case-author">Fede Nowback</div>
                    <div class="case-author-role">Speaker, Formador & Consultor de Ventas</div>
                </div>
            </div>

        </div>
    </section>

    <!-- 5. TABLA COMPARATIVA -->
    <section class="section" id="comparativa">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Análisis Comparativo</span>
                <h2 class="section-title">¿Por qué Tecnobrain vs Otras Plataformas?</h2>
                <p class="section-subtitle">
                    Compará las ventajas estratégicas y económicas de tener tu plataforma propia frente a soluciones de terceros.
                </p>
            </div>

            <div class="comp-table-wrap">
                <table class="comp-table">
                    <thead>
                        <tr>
                            <th>Característica</th>
                            <th class="tb-col">Tecnobrain Ecosistema</th>
                            <th>Plataformas SaaS (Skool / Kajabi)</th>
                            <th>Marketplaces (Hotmart / Udemy)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Propiedad de Marca y Dominio</strong></td>
                            <td class="tb-col">✓ 100% tu dominio y tu marca</td>
                            <td>Subdominio ajeno</td>
                            <td>Propiedad del marketplace</td>
                        </tr>
                        <tr>
                            <td><strong>Cobro del Dinero</strong></td>
                            <td class="tb-col">✓ En el acto a tu CBU / Mercado Pago</td>
                            <td>Stripe en USD (complejo en Arg)</td>
                            <td>Retenciones de 15 a 30 días</td>
                        </tr>
                        <tr>
                            <td><strong>Comisiones de Ingreso Inicial</strong></td>
                            <td class="tb-col">✓ 0% comisión x 6 meses</td>
                            <td>Tarifa fija $99-$299 USD/mes</td>
                            <td>10% a 15% por cada venta</td>
                        </tr>
                        <tr>
                            <td><strong>Web + Landings + Campus Integrados</strong></td>
                            <td class="tb-col">✓ Todo en el mismo ecosistema</td>
                            <td>Solo comunidad / cursos</td>
                            <td>Páginas estándar genéricas</td>
                        </tr>
                        <tr>
                            <td><strong>Soporte Técnico y Cercanía</strong></td>
                            <td class="tb-col">✓ Soporte humano en español</td>
                            <td>Tickets en inglés / bots</td>
                            <td>Centro de ayuda automatizado</td>
                        </tr>
                        <tr>
                            <td><strong>Base de Datos de tus Alumnos</strong></td>
                            <td class="tb-col">✓ 100% tuya y exportable siempre</td>
                            <td>Cautiva en su servidor</td>
                            <td>El marketplace es el dueño</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- 6. SECCIÓN DE PRECIOS EXACTOS DEL FLYER -->
    <section class="pricing-section" id="precios">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Inversión Transparente y Sin Letra Chica</span>
                <h2 class="section-title">Elegí la forma ideal de trabajar</h2>
                <p class="section-subtitle">
                    Estructura de precios oficial para el desarrollo de tu plataforma digital.
                </p>
            </div>

            <div class="pricing-grid">
                
                <!-- CARD 1: LANDING PAGE -->
                <div class="pricing-card">
                    <div>
                        <h3 class="pricing-title">Landing Page</h3>
                        <div class="pricing-price">$150.000</div>
                        <div class="pricing-installments">&nbsp;</div>
                        <div class="pricing-divider"></div>

                        <ul class="pricing-features">
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Hasta 5 bloques de contenido</span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Entrega estimada en 4 días</span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Soporte estándar</span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Integración con links de pago</span>
                            </li>
                        </ul>
                    </div>

                    <a href="https://wa.me/<?= $whatsapp_num ?>?text=Hola%20Tecnobrain!%20Quiero%20contratar%20el%20servicio%20de%20Landing%20Page%20($150.000)." target="_blank" rel="noopener noreferrer" class="btn-pricing">
                        Empezar
                    </a>
                </div>

                <!-- CARD 2: PAGINA WEB (DESTACADA - MAS POPULAR) -->
                <div class="pricing-card featured">
                    <div class="badge-popular">Más Popular</div>

                    <div>
                        <h3 class="pricing-title">Página Web</h3>
                        <div class="pricing-price">$550.000</div>
                        <div class="pricing-installments">(3 cuotas o 10% OFF en un pago)</div>
                        <div class="pricing-divider"></div>

                        <ul class="pricing-features">
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Hasta 5 secciones principales</span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span><strong>3 landing pages gratis por 6 meses</strong></span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Hasta 3 cambios básicos por mes</span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Entrega estimada en 15 días</span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Soporte prioritario</span>
                            </li>
                        </ul>
                    </div>

                    <a href="https://wa.me/<?= $whatsapp_num ?>?text=Hola%20Tecnobrain!%20Quiero%20contratar%20el%20servicio%20de%20P%C3%A1gina%20Web%20($550.000)." target="_blank" rel="noopener noreferrer" class="btn-pricing">
                        Empezar
                    </a>
                </div>

                <!-- CARD 3: COMUNIDAD FULL -->
                <div class="pricing-card">
                    <div>
                        <h3 class="pricing-title">Comunidad Full</h3>
                        <div class="pricing-price">$900.000</div>
                        <div class="pricing-installments">(3 cuotas o 10% OFF en un pago)</div>
                        <div class="pricing-divider"></div>

                        <ul class="pricing-features">
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span><strong>Página web + Campus de comunidad</strong></span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>0% comisión por usuario los primeros 6 meses</span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Mantenimiento de $100.000/mes (desde mes 7)</span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Mayor margen de cambios mensuales</span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Entrega estimada en 30 días</span>
                            </li>
                            <li>
                                <svg class="check-icon" viewBox="0 0 20 20" fill="#22c55e"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Soporte VIP dedicado</span>
                            </li>
                        </ul>
                    </div>

                    <a href="https://wa.me/<?= $whatsapp_num ?>?text=Hola%20Tecnobrain!%20Quiero%20contratar%20el%20servicio%20de%20Comunidad%20Full%20($900.000)." target="_blank" rel="noopener noreferrer" class="btn-pricing">
                        Empezar
                    </a>
                </div>

            </div>

            <!-- NOTAS Y POLÍTICAS COMERCIALES CLARAS -->
            <div class="pricing-notes">
                <p><strong>Condiciones de servicio:</strong> Todos los precios presentados son aparte del costo del dominio (el cliente debe adquirirlo o gestionarlo de forma independiente en NIC Argentina o su registrador de preferencia). No se realizan integraciones bancarias complejas: se implementan los medios de pago que el cliente ya utilice (transferencias directas con CBU/CVU, efectivo o links de cobro de Mercado Pago). Los clientes proveen sus propios links para insertarlos en las landings o campus.</p>
            </div>
        </div>
    </section>

    <!-- 7. PREGUNTAS FRECUENTES (FAQ) -->
    <section class="section" id="faq">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Respuestas Claras</span>
                <h2 class="section-title">Preguntas Frecuentes</h2>
                <p class="section-subtitle">
                    Todo lo que necesitás saber antes de comenzar tu proyecto con Tecnobrain.
                </p>
            </div>

            <div class="faq-wrap">
                <div class="faq-item">
                    <div class="faq-header">
                        ¿Por qué me conviene tener un Campus Propio en lugar de usar plataformas como Skool o Hotmart?
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-body">
                        Tener tu propio campus te da 100% de control sobre tu marca, tus datos y tus alumnos. No pagás suscripciones mensuales fijas en dólares desde el primer día ni sufrís retenciones del 10% al 15% por cada venta. Además, el dinero de las inscripciones ingresa directamente a tu cuenta bancaria o Mercado Pago en el acto.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-header">
                        ¿Cómo funciona el esquema de comisiones en Comunidad Full?
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-body">
                        Durante los primeros 6 meses tenés 0% de comisión por usuario (el ingreso de alumnos está 100% bonificado). A partir del mes 7 se abona un mantenimiento mensual de $100.000 ARS que incluye soporte, seguridad y un esquema de comisión por nuevo usuario activo.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-header">
                        ¿El costo del dominio web está incluido en los precios?
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-body">
                        No. El costo del registro o renovación de tu dominio (.com o .com.ar) es gestionado directamente por vos para garantizar que la titularidad legal sea 100% tuya ante NIC Argentina u otros organismos.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-header">
                        ¿Qué incluye el beneficio de las 3 Landing Pages gratis en el plan Página Web?
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-body">
                        Al contratar el desarrollo de tu Página Web ($550.000 ARS), te incluimos la creación de 3 Landing Pages específicas de venta o captura durante los primeros 6 meses, ideales para lanzar masterclasses, talleres o promociones especiales sin costos adicionales.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-header">
                        ¿Cómo se realizan las actualizaciones y cambios mensuales?
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-body">
                        En el plan Página Web tenés incluidos hasta 3 cambios básicos mensuales (textos, imágenes, nuevas fechas). En el plan Comunidad Full contás con un margen de cambios ampliado y tarifas preferenciales para expansiones mayores.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-header">
                        ¿Cuáles son los plazos de entrega de cada solución?
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-body">
                        La Landing Page se entrega en un plazo estimado de 4 días hábiles. La Página Web completa en 15 días hábiles. El ecosistema Comunidad Full (Web + Landings + Campus Virtual) en 30 días hábiles.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. CTA FINAL -->
    <section class="section">
        <div class="container">
            <div class="cta-box">
                <h2>¿Listo para construir tu propio activo digital?</h2>
                <p>
                    Comunicate directamente con nuestro equipo tecnológico. Evaluamos tus necesidades, definimos la mejor estructura y ponemos en marcha tu plataforma.
                </p>
                <a href="https://wa.me/<?= $whatsapp_num ?>?text=Hola%20Tecnobrain!%20Quiero%20coordinar%20una%20reuni%C3%B3n%20para%20armar%20mi%20Web%20y%20Campus%20Virtual." target="_blank" rel="noopener noreferrer" class="btn-primary" style="font-size: 16px; padding: 18px 42px;">
                    <span>Iniciar Consulta por WhatsApp</span>
                    <span>→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 9. FOOTER INSTITUCIONAL CORPORATIVO TECNOBRAIN -->
    <footer class="tb-footer">
        <div class="tb-footer-topline"></div>
        <div class="container">
            <div class="tb-footer-grid">
                
                <!-- Columna 1: Marca y Propósito -->
                <div class="tb-footer-col">
                    <a href="https://tecnobrain.ar" class="tb-brand" style="margin-bottom: 16px;">
                        <svg class="tb-brand-svg" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="22" y="46" width="28" height="28" rx="8" transform="rotate(45 22 46)" fill="#6A4E9E"/>
                            <rect x="42" y="26" width="28" height="28" rx="8" transform="rotate(45 42 26)" fill="#9D9C9E"/>
                            <rect x="62" y="46" width="28" height="28" rx="8" transform="rotate(45 62 46)" fill="#A5C400"/>
                        </svg>
                        <div class="tb-brand-titles">
                            <span class="tb-brand-name">TECNO<span>BRAIN</span></span>
                            <span class="tb-brand-sub">Servicios Informáticos</span>
                        </div>
                    </a>
                    <p style="font-size: 13px; color: #94a3b8; line-height: 1.7; margin-bottom: 16px;">
                        Tu Socio IT Corporativo. Construimos, securizamos y administramos arquitectura tecnológica de alta disponibilidad para empresas y profesionales que no pueden detenerse.
                    </p>
                    <a href="https://wa.me/<?= $whatsapp_num ?>?text=Hola%20Tecnobrain!%20Quiero%20conocer%20m%C3%A1s%20sobre%20sus%20servicios." target="_blank" rel="noopener noreferrer" style="color: #B7BF10; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                        Hablemos <span>→</span>
                    </a>
                </div>

                <!-- Columna 2: Plataformas y Campus -->
                <div class="tb-footer-col">
                    <h4>Plataformas Digitales</h4>
                    <ul class="tb-footer-links">
                        <li><a href="#solucion">Ecosistema Llave en Mano</a></li>
                        <li><a href="#precios">Campus Virtual Pro</a></li>
                        <li><a href="#precios">Landing Pages de Venta</a></li>
                        <li><a href="#caso-fede">Caso Fede Nowback</a></li>
                        <li><a href="#comparativa">Comparativa de Mercado</a></li>
                    </ul>
                </div>

                <!-- Columna 3: Especialidades IT -->
                <div class="tb-footer-col">
                    <h4>Especialidades IT</h4>
                    <ul class="tb-footer-links">
                        <li><a href="https://tecnobrain.ar/instalacion-redes-informaticas-mikrotik" target="_blank" rel="noopener noreferrer">Redes y Routing Mikrotik</a></li>
                        <li><a href="https://tecnobrain.ar/cableado-estructurado-empresas" target="_blank" rel="noopener noreferrer">Cableado Estructurado</a></li>
                        <li><a href="https://tecnobrain.ar/wifi-para-oficinas-y-empresas" target="_blank" rel="noopener noreferrer">Wi-Fi Corporativo</a></li>
                        <li><a href="https://tecnobrain.ar/administracion-implementacion-servidores" target="_blank" rel="noopener noreferrer">Servidores Locales y Cloud</a></li>
                        <li><a href="https://tecnobrain.ar/telefonia-ip-pymes" target="_blank" rel="noopener noreferrer">Centrales IP PBX</a></li>
                    </ul>
                </div>

                <!-- Columna 4: Contacto Oficial -->
                <div class="tb-footer-col">
                    <h4>Contacto Oficial</h4>
                    <div class="tb-footer-contact-item">
                        <span class="icon">📍</span>
                        <div>
                            <strong style="color: #FFFFFF; font-size: 13px;">Sede Central</strong><br>
                            <span style="color: #94a3b8; font-size: 12px;">Lavalle 362, Piso 7<br>CABA, Buenos Aires</span>
                        </div>
                    </div>
                    <div class="tb-footer-contact-item">
                        <span class="icon">📞</span>
                        <div>
                            <a href="tel:+541160253240">+54 11 6025-3240</a><br>
                            <span style="color: #64748b; font-size: 11px;">(Línea principal)</span>
                        </div>
                    </div>
                    <div class="tb-footer-contact-item">
                        <span class="icon">☎️</span>
                        <div>
                            <a href="tel:+541150318023">+54 11 5031-8023</a><br>
                            <span style="color: #64748b; font-size: 11px;">(Administración)</span>
                        </div>
                    </div>
                    <div class="tb-footer-contact-item">
                        <span class="icon">✉️</span>
                        <a href="mailto:info@tecnobrain.com.ar">info@tecnobrain.com.ar</a>
                    </div>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="tb-footer-bottom">
                <div>
                    &copy; <?= date("Y") ?> Tecnobrain SRL. Todos los derechos reservados.
                </div>
                <div>
                    <a href="https://tecnobrain.ar/areas-de-cobertura" target="_blank" rel="noopener noreferrer">Mapa de Cobertura</a>
                    <a href="https://tecnobrain.ar/politicas-de-sla" target="_blank" rel="noopener noreferrer">SLA</a>
                    <a href="https://tecnobrain.ar/politica-de-privacidad" target="_blank" rel="noopener noreferrer">Privacidad</a>
                    <a href="https://tecnobrain.ar/terminos-y-condiciones" target="_blank" rel="noopener noreferrer">Términos</a>
                </div>
                <div class="tb-live-badge">
                    <span class="tb-live-dot"></span>
                    <span>Tecnobrain IT Ecosystem</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS FAQ INTERACTIVO -->
    <script>
        document.querySelectorAll('.faq-header').forEach(header => {
            header.addEventListener('click', () => {
                const item = header.parentElement;
                const wasOpen = item.classList.contains('open');
                document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
                if (!wasOpen) {
                    item.classList.add('open');
                }
            });
        });
    </script>
</body>
</html>
