<?php
/**
 * Landing Page: Contacto & Contrataciones - Fede Nowback
 * URL: https://fedenowback.com.ar/contacto
 */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/seo_helper.php';

$current_slug = 'contacto';

$page_seo = [
    'title' => 'Contacto & Prensa | Fede Nowback - Conferencias y Mentorías',
    'description' => 'Canales oficiales de contacto de Fede Nowback. Consultas de mentoría 1a1, conferencias presenciales, prensa y colaboraciones.',
    'keywords' => 'contacto fede nowback, contratar speaker marca personal, conferencias motivacionales buenos aires, fede nowback whatsapp',
    'canonical' => SITE_URL . '/contacto',
    'og_image' => SITE_URL . '/assets/img/fede_nowback_hero.jpg'
];
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
  <?php render_seo_head($page_seo); ?>
</head>
<body>

<?php require __DIR__ . '/layout/header.php'; ?>

<section class="fede-hero" style="padding: 80px 0 60px;">
  <div class="fede-hero-glow"></div>
  <div class="fede-container" style="max-width: 900px; margin: 0 auto; text-align: center;">
    <span class="fede-pill">💬 Canales Directos</span>
    <h1 class="fede-h1" style="font-size: 2.8rem;">
      Hablemos de tu <span class="fire-grad">próximo gran salto</span>
    </h1>
    <p class="fede-lead" style="margin: 0 auto 40px;">
      Ya sea para postularte a una Mentoría 1 a 1, contratar una conferencia o sumar a tu equipo a un workshop de marca personal, podés contactarme directamente.
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px; text-align: left;">
      
      <div class="fede-card" style="border: 1px solid rgba(34, 197, 94, 0.4);">
        <div style="font-size: 2rem; margin-bottom: 12px;">💬</div>
        <h3 style="color: #fff; font-size: 1.25rem; margin-bottom: 8px;">WhatsApp Directo</h3>
        <p style="color: #a1a1aa; font-size: 0.9rem; margin-bottom: 20px;">Resppesta ágil para postulaciones a mentoria y dudas de campus.</p>
        <a href="<>= get_whatsapp_url('Hola Fede! Me comunico desde la página de contacto.') ?>" target="_blank" rel="noopener" class="btn-fede-fire" style="background: #22c55e; display: inline-block;">
          Abrir WhatsApp
        </a>
      </div>

      <div class="fede-card" style="border: 1px solid rgba(249, 115, 22, 0.4);">
        <div style="font-size: 2rem; margin-bottom: 12px;">✉️</div>
        <h3 style="color: #fff; font-size: 1.25rem; margin-bottom: 8px;">Correo Electrónico</h3>
        <p style="color: #a1a1aa; font-size: 0.9rem; margin-bottom: 20px;">Propuestas de prensa, conferencias corporativas y alianzas.</p>
        <a href="mailto:<?= SITE_EMAIL ?>" class="btn-fede-outline" style="display: inline-block;">
          <?= SITE_EMAIL ?>
        </a>
      </div>

      <div class="fede-card" style="border: 1px solid rgba(234, 179, 8, 0.4);">
        <div style="font-size: 2rem; margin-bottom: 12px;">📸</div>
        <h3 style="color: #fff; font-size: 1.25rem; margin-bottom: 8px;">Redes Sociales</h3>
        <p style="color: #a1a1aa; font-size: 0.9rem; margin-bottom: 20px;">Seguime a diario en Instagram, YouTube y TikTok.</p>
        <a href="https://www.instagram.com/fedenowback/" target="_blank" rel="noopener" class="btn-fede-outline" style="display: inline-block;">
          @fedenowback
        </a>
      </div>

    </div>
  </div>
</section>

<?php require __DIR__ . '/layout/footer.php'; ?>
</body>
</html>
