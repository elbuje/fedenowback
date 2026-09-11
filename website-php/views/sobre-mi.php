<?php
/**
 * Landing Page: Sobre Mí / Historia & Autoridad - Fede Nowback
 * URL: https://fedenowback.com.ar/sobre-mi
 */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/seo_helper.php';

$current_slug = 'sobre-mi';

$page_seo = [
    'title' => 'Sobre Mí | Fede Nowback - Historia, Trayectoria y Metodología',
    'description' => 'Conocé la historia de Fede Nowback: de creador de contenido a mentor de negocios digitales y speaker. Aprendé cómo ayudó a cientos de profesionales a destacar.',
    'keywords' => 'fede nowback historia, quien es fede nowback, mentor marca personal argentina, creador de contenido, bio fede nowback',
    'canonical' => SITE_URL . '/sobre-mi',
    'og_image' => SITE_URL . '/assets/img/fede_nowback_street.jpg'
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
  <div class="fede-container">
    <div class="fede-hero-grid">
      <div>
        <span class="fede-pill">⚡ Mi Historia & Filosofía</span>
        <h1 class="fede-h1" style="font-size: 2.8rem; line-height: 1.15;">
          No nací sabiendo hablarle a una cámara.<br>
          <span class="fire-grad">Aprendí a comunicar con impacto.</span>
        </h1>
        <p class="fede-lead">
          Durante años vi a profesionales brillantes ser ignorados porque no sabían comunicar su valor en el mundo digital. Decidí cambiar eso creando un método probado para monetizar conocimiento y construir negocios de alto impacto.
        </p>

        <div style="display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 24px;">
          <a href="/mentorias" class="btn-fede-fire">
            🚀 Ver Programa de Mentoría
          </a>
          <a href="/comunidad" class="btn-fede-outline">
            ⚡ Entrar al Campus Pro
          </a>
        </div>
      </div>

      <div style="text-align: center;">
        <img src="/assets/img/fede_nowback_street.jpg" alt="Fede Nowback Historia" style="width: 100%; max-width: 420px; border-radius: 20px; border: 2px solid rgba(249, 115, 22, 0.4); box-shadow: 0 20px 50px rgba(0,0,0,0.6);">
      </div>
    </div>
  </div>
</section>

<!-- Updated manifesto -->
<section style="padding: 80px 20px; background: #0c0d12; border-top: 1px solid #1e2029;">
  <div class="fede-container" style="max-width: 900px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 50px;">
      <span class="fede-pill">🔥 Mi Manifiesto</span>
      <h2 style="font-size: 2.2rem; font-weight: 800; color: #fff; margin-top: 12px;">Principios no negociables</h2>
    </div>

    <div style="display: flex; flex-direction: column; gap: 24px;">
      <div class="fede-card">
        <h3 style="color: #f97316; font-size: 1.3rem; margin-bottom: 8px;">1. La viralidad vacía no paga las cuentas</h3>
        <p style="color: #a1a1aa; font-size: 0.95rem; line-height: 1.6;">Tener un millón de vistas no sirve si nadie te compra. Nos enfocamos en contenido con intención de compra y clientes de alto valor.</p>
      </div>

      <div class="fede-card">
        <h3 style="color: #eab308; font-size: 1.3rem; margin-bottom: 8px;">2. Claridad antes que volumen</h3>
        <p style="color: #a1a1aa; font-size: 0.95rem; line-height: 1.6;">Antes de grabar 50 videos por semana, tenés que tener 100% claro qué problema resolvés y a quién se lo resolvés.</p>
      </div>

      <div class="fede-card">
        <h3 style="color: #ef4444; font-size: 1.3rem; margin-bottom: 8px;">3. Acción imperfecta vence al perfeccionismo</h3>
        <p style="color: #a1a1aa; font-size: 0.95rem; line-height: 1.6;">La única forma de mejorar frente a la cámara es prendiendo la cámara. Vencemos la postergación con sistemas simples de ejecución diaria.</p>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/layout/footer.php'; ?>
</body>
</html>
