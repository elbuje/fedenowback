<?php
/**
 * Landing Page: Mentoría 1 a 1 de Marca Personal - Fede Nowback
 * URL: https://fedenowback.com.ar/mentorias
 */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/seo_helper.php';

$current_slug = 'mentorias';

$page_seo = [
    'title' => 'Mentoría 1 a 1 de Marca Personal y Negocios Digitales | Fede Nowback',
    'description' => 'Programa intensivo y personalizado de mentoría 1 a 1 con Fede Nowback. Construí tu autoridad, dominá la creación de contenidos y monetizá tu audiencia.',
    'keywords' => 'mentoria marca personal, consultoria negocios digitales, como vender en instagram, crear contenido para vender, mentor de creadores argentina, fede nowback',
    'canonical' => SITE_URL . '/mentorias',
    'og_image' => SITE_URL . '/assets/img/fede_nowback_mentor.jpg',
    'extra_schema' => [
        '@type' => 'Course',
        'name' => 'Mentoría 1 a 1: Escalado de Marca Personal y Negocios Digitales',
        'description' => 'Programa de mentoría y consultoría estratégica uno a uno para creadores, profesionales y consultores que buscan monetizar su conocimiento.',
        'provider' => [
            '@type' => 'Person',
            'name' => 'Fede Nowback',
            'url' => SITE_URL
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
  <?php render_seo_head($page_seo); ?>
</head>
<body>

<?php require __DIR__ . '/layout/header.php'; ?>

<!-- Hero Mentoría -->
<section class="fede-hero" style="padding: 80px 0 60px;">
  <div class="fede-hero-glow"></div>
  <div class="fede-container">
    <div class="fede-hero-grid">
      <div>
        <span class="fede-pill">🚀 Programa Exclusivo • Cupos Limitados por Mes</span>
        <h1 class="fede-h1" style="font-size: 2.8rem; line-height: 1.15;">
          Dejá de improvisar.<br>
          <span class="fire-grad">Construí una Marca Personal</span> que atraiga clientes reales.
        </h1>
        <p class="fede-lead">
          Un acompañamiento estratégico 1 a 1 diseñado a medida para profesionales, consultores y creadores que quieren dejar de perder tiempo y construir un negocio digital rentable.
        </p>

        <div style="display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 30px;">
          <a href="<?= get_whatsapp_url('Hola Fede! Quiero postularme a tu Programa de Mentoría 1 a 1 de Marca Personal.') ?>" target="_blank" rel="noopener" class="btn-fede-fire">
            🔥 Postularme a la Mentoría 1 a 1
          </a>
          <a href="#programa" class="btn-fede-outline">
            Ver los 4 Pilares del Programa
          </a>
        </div>

        <div style="display: flex; align-items: center; gap: 16px; color: #a1a1aa; font-size: 0.9rem;">
          <span>✅ Sesiones 1a1 en vivo</span>
          <span>✅ Acceso a Campus Pro</span>
          <span>✅ Soporte directo WhatsApp</span>
        </div>
      </div>

      <div style="text-align: center;">
        <img src="/assets/img/fede_nowback_mentor.jpg" alt="Fede Nowback Mentoría 1 a 1" style="width: 100%; max-width: 420px; border-radius: 20px; border: 2px solid rgba(249, 115, 22, 0.4); box-shadow: 0 20px 50px rgba(0,0,0,0.6);">
      </div>
    </div>
  </div>
</section>

<!-- Para Quién Es -->
<section style="padding: 80px 20px; background: #0c0d12; border-top: 1px solid #1e2029;">
  <div class="fede-container" style="max-width: 1000px; margin: 0 auto; text-align: center;">
    <span class="fede-pill">🎯 Diagnóstico</span>
    <h2 style="font-size: 2.2rem; font-weight: 800; color: #fff; margin: 16px 0 40px;">¿Esta mentoría es para vos?</h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; text-align: left;">
      <div class="fede-card" style="border-left: 4px solid #f97316;">
        <h3 style="color: #fff; font-size: 1.2rem; margin-bottom: 10px;">👤 Profesionales y Consultores</h3>
        <p style="color: #a1a1aa; font-size: 0.95rem; line-height: 1.5;">Tenés mucho conocimiento técnico pero te cuesta comunicarlo en redes sin parecer aburrido ni perder autoridad.</p>
      </div>

      <div class="fede-card" style="border-left: 4px solid #eab308;">
        <h3 style="color: #fff; font-size: 1.2rem; margin-bottom: 10px;">🎬 Creadores Estancados</h3>
        <p style="color: #a1a1aa; font-size: 0.95rem; line-height: 1.5;">Publicás contenido pero tenés pocas vistas o muchas vistas que no se traducen en ventas ni clientes que paguen bien.</p>
      </div>

      <div class="fede-card" style="border-left: 4px solid #ef4444;">
        <h3 style="color: #fff; font-size: 1.2rem; margin-bottom: 10px;">💼 Emprendedores Digitales</h3>
        <p style="color: #a1a1aa; font-size: 0.95rem; line-height: 1.5;">Querés lanzar tu oferta de servicios, infoproductos o comunidad pero no tenés una estrategia clara de lanzamiento.</p>
      </div>
    </div>
  </div>
</section>

<!-- 4 Pilares -->
<section id="programa" style="padding: 80px 20px; background: #08090c;">
  <div class="fede-container" style="max-width: 1100px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 50px;">
      <span class="fede-pill">⚡ Metodología Nowback</span>
      <h2 style="font-size: 2.4rem; font-weight: 800; color: #fff; margin-top: 12px;">Los 4 Pilares de la Mentoría</h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 24px;">
      <div class="fede-card">
        <span style="font-size: 2.5rem; font-weight: 900; color: #f97316;">01</span>
        <h3 style="color: #fff; font-size: 1.25rem; margin: 12px 0;">Claridad y Posicionamiento</h3>
        <p style="color: #a1a1aa; font-size: 0.9rem; line-height: 1.6;">Definimos tu propuesta única de valor, tu cliente ideal de alto ticket y el ángulo con el que vas a dominar tu nicho.</p>
      </div>

      <div class="fede-card">
        <span style="font-size: 2.5rem; font-weight: 900; color: #eab308;">02</span>
        <h3 style="color: #fff; font-size: 1.25rem; margin: 12px 0;">Contenido con Intención</h3>
        <p style="color: #a1a1aa; font-size: 0.9rem; line-height: 1.6;">Estructuras de guionado probadas para Reels, TikTok, YouTube y carruseles que educan, entretienen y venden.</p>
      </div>

      <div class="fede-card">
        <span style="font-size: 2.5rem; font-weight: 900; color: #ef4444;">03</span>
        <h3 style="color: #fff; font-size: 1.25rem; margin: 12px 0;">Oferta y Embudo de Ventas</h3>
        <p style="color: #a1a1aa; font-size: 0.9rem; line-height: 1.6;">Armado de tu oferta irresistible y flujo de conversión directo por mensajes directos (DM) y WhatsApp.</p>
      </div>

      <div class="fede-card">
        <span style="font-size: 2.5rem; font-weight: 900; color: #22c55e;">04</span>
        <h3 style="color: #fff; font-size: 1.25rem; margin: 12px 0;">Mentalidad y Hábitos</h3>
        <p style="color: #a1a1aa; font-size: 0.9rem; line-height: 1.6;">Vencer la postergación, crear sistemas de grabación eficientes y sostener la disciplina a largo plazo.</p>
      </div>
    </div>

    <!-- CTA Box -->
    <div style="margin-top: 60px; background: linear-gradient(135deg, rgba(249,115,22,0.15), rgba(234,179,8,0.1)); border: 1px solid rgba(249,115,22,0.3); border-radius: 16px; padding: 40px; text-align: center;">
      <h3 style="color: #fff; font-size: 1.8rem; font-weight: 800; margin-bottom: 12px;">¿Listo para dar el salto?</h3>
      <p style="color: #d4d4d8; max-width: 600px; margin: 0 auto 24px;">Las sesiones se coordinan de forma personalizada. Postulate para evaluar tu caso y coordinar una llamada de diagnóstico.</p>
      <a href="<?= get_whatsapp_url('Hola Fede! Quiero consultar disponibilidad y precios de la Mentoría 1 a 1.') ?>" target="_blank" rel="noopener" class="btn-fede-fire" style="font-size: 1.1rem; padding: 16px 36px;">
        🚀 Coordinar Llamada de Diagnóstico
      </a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/layout/footer.php'; ?>
</body>
</html>
