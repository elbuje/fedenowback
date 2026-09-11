<?php
/**
 * Landing Page: Hub de Clases Gratuitas en YouTube - Fede Nowback
 * URL Canonical: https://fedenowback.com.ar/clases-gratuitas-marca-personal
 * Aliases: /clases-youtube, /clases
 */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/seo_helper.php';

$current_slug = 'clases-gratuitas-marca-personal';

$page_seo = [
    'title' => 'Clases Gratuitas de Marca Personal & Negocios | Canal YouTube Fede Nowback',
    'description' => 'Mirá las masterclasses y clases liberadas de Fede Nowback en YouTube: cómo crear tu negocio desde cero, generar tus primeros USD 1.000 y hacer contenido sin miedo a la cámara.',
    'keywords' => 'clases marca personal youtube, fede nowback youtube, como crear un negocio desde cero, generar primeros 1000 dolares creadores, perder miedo camara reels, masterclass marca personal gratis',
    'canonical' => SITE_URL . '/clases-gratuitas-marca-personal',
    'og_image' => 'https://img.youtube.com/vi/NGmRSA8aWAk/maxresdefault.jpg',
    'og_type' => 'video.other'
];
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
  <?php render_seo_head($page_seo); ?>

  <!-- JSON-LD VideoObject Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ItemList",
    "itemListElement": [
      {
        "@type": "VideoObject",
        "position": 1,
        "name": "CÓMO CREAR MI PROPIO NEGOCIO | PASO A PASO",
        "description": "Guía completa para fundar tu propio negocio digital basado en marca personal y monetizar tu conocimiento.",
        "thumbnailUrl": "https://img.youtube.com/vi/NGmRSA8aWAk/hqdefault.jpg",
        "uploadDate": "2024-01-15T08:00:00+08:00",
        "embedUrl": "https://www.youtube.com/embed/NGmRSA8aWAk"
      },
      {
        "@type": "VideoObject",
        "position": 2,
        "name": "El paso a paso para generar tus primeros USD 1.000 (LIBERADA)",
        "description": "Estrategia práctica de validación de ofertas y cierres directos para alcanzar tus primeros $1000 dólares.",
        "thumbnailUrl": "https://img.youtube.com/vi/RDlGX8zYkQ8/hqdefault.jpg",
        "uploadDate": "2024-02-10T08:00:00+08:00",
        "embedUrl": "https://www.youtube.com/embed/RDlGX8zYkQ8"
      }
    ]
  }
  </script>
</head>
<body>

<?php require __DIR__ . '/layout/header.php'; ?>

<!-- Hero Clases YouTube -->
<section class="fede-hero" style="padding: 90px 0 60px;">
  <div class="fede-hero-glow"></div>
  <div class="fede-container">
    <div style="max-width: 840px; margin: 0 auto; text-align: center;">
      <span class="fede-pill" style="background: rgba(229, 9, 20, 0.15); color: #ff4d4d; border-color: rgba(229, 9, 20, 0.35);">
        ▶️ Canal Oficial de YouTube de Fede Nowback
      </span>
      <h1 class="fede-h1" style="font-size: clamp(2.2rem, 4.5vw, 3.4rem); line-height: 1.15; margin-bottom: 20px;">
        Masterclasses & Clases Gratuitas sobre <span class="fire-grad">Marca Personal</span>
      </h1>
      <p class="fede-lead" style="margin-bottom: 28px;">
        Contenido 100% práctico y sin filtro para que aprendas a estructurar tu negocio, comunicar con soltura frente al lente y facturar con tu conocimiento.
      </p>

      <a href="https://www.youtube.com/@fedenowback6170?sub_confirmation=1" target="_blank" rel="noopener noreferrer" class="btn-fede-fire" style="background: #e50914; border-color: #ff3333; display: inline-flex; align-items: center; gap: 8px;">
        <span>▶</span> Suscribirme al Canal de YouTube
      </a>
    </div>
  </div>
</section>

<!-- Reproductor & Playlist Interactiva -->
<section class="fede-section" style="padding-top: 20px;">
  <div class="fede-container">
    
    <!-- Visor de Video Principal -->
    <div class="fede-video-player-container" style="max-width: 900px; margin: 0 auto 30px;">
      <div class="fede-video-responsive">
        <iframe id="mainYtPlayer" src="https://www.youtube-nocookie.com/embed/NGmRSA8aWAk?rel=0&modestbranding=1" title="CÓMO CREAR MI PROPIO NEGOCIO | PASO A PASO - Fede Nowback" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
    </div>

    <!-- Playlist Interactiva de Clases -->
    <div style="text-align: center; margin-bottom: 20px;">
      <span style="font-size: 0.8rem; font-weight: 800; color: var(--fede-text-muted); text-transform: uppercase;">
        Elegí una clase para reproducir:
      </span>
    </div>

    <div class="fede-video-playlist" style="max-width: 1000px; margin: 0 auto 50px;">
      
      <div class="fede-video-card active" onclick="loadFedeVideo('NGmRSA8aWAk', this)">
        <div class="fede-video-thumb-wrap">
          <img src="https://img.youtube.com/vi/NGmRSA8aWAk/hqdefault.jpg" alt="Cómo crear mi propio negocio paso a paso">
          <span class="fede-video-badge-play">▶ Video</span>
        </div>
        <div class="fede-video-card-title">CÓMO CREAR MI PROPIO NEGOCIO | PASO A PASO</div>
        <span style="font-size: 0.78rem; color: var(--fede-fire-yellow); font-weight: 700;">⭐ Recomendado</span>
      </div>

      <div class="fede-video-card" onclick="loadFedeVideo('RDlGX8zYkQ8', this)">
        <div class="fede-video-thumb-wrap">
          <img src="https://img.youtube.com/vi/RDlGX8zYkQ8/hqdefault.jpg" alt="Generar tus primeros USD 1000">
          <span class="fede-video-badge-play">▶ Masterclass</span>
        </div>
        <div class="fede-video-card-title">Clase: El paso a paso para generar tus primeros USD 1.000 (LIBERADA)</div>
        <span style="font-size: 0.78rem; color: #10b981; font-weight: 700;">💰 Facturación</span>
      </div>

      <div class="fede-video-card" onclick="loadFedeVideo('civfV2xxrNE', this)">
        <div class="fede-video-thumb-wrap">
          <img src="https://img.youtube.com/vi/civfV2xxrNE/hqdefault.jpg" alt="Renuncié a mi trabajo para emprender">
          <span class="fede-video-badge-play">▶ Historia</span>
        </div>
        <div class="fede-video-card-title">RENUNCIÉ A MI TRABAJO para EMPRENDER desde CERO | Lo que aprendí</div>
        <span style="font-size: 0.78rem; color: var(--fede-fire-orange); font-weight: 700;">🔥 Reinvención</span>
      </div>

      <div class="fede-video-card" onclick="loadFedeVideo('7VNw5QxgJLc', this)">
        <div class="fede-video-thumb-wrap">
          <img src="https://img.youtube.com/vi/7VNw5QxgJLc/hqdefault.jpg" alt="Hacer contenido aunque tengas miedo de mostrarte">
          <span class="fede-video-badge-play">▶ Video</span>
        </div>
        <div class="fede-video-card-title">Cómo Hacer Contenido para Redes Aunque Tengas Miedo de Mostrarte</div>
        <span style="font-size: 0.78rem; color: #38bdf8; font-weight: 700;">🎬 Cámara & Foco</span>
      </div>

      <div class="fede-video-card" onclick="loadFedeVideo('CpVRIFUo-Io', this)">
        <div class="fede-video-thumb-wrap">
          <img src="https://img.youtube.com/vi/CpVRIFUo-Io/hqdefault.jpg" alt="Estrategias de marca personal">
          <span class="fede-video-badge-play">▶ Masterclass</span>
        </div>
        <div class="fede-video-card-title">Estrategias de Marca Personal para Destacar en un Mercado Saturado</div>
        <span style="font-size: 0.78rem; color: #a855f7; font-weight: 700;">🚀 Crecimiento</span>
      </div>

    </div>

  </div>
</section>

<!-- Banner de Próximo Paso -->
<section class="fede-section" style="border-top: 1px solid var(--fede-border);">
  <div class="fede-container">
    <div style="background: linear-gradient(135deg, #180800 0%, #2b0c03 100%); border: 2px solid var(--fede-fire-orange); border-radius: var(--fede-radius-xl); padding: 50px 30px; text-align: center;">
      <h2 style="font-family: var(--fede-font-heading); font-size: clamp(1.8rem, 4vw, 2.6rem); font-weight: 900; text-transform: uppercase; margin-bottom: 14px;">
        ¿Querés llevar tu negocio al siguiente nivel con acompañamiento directo?
      </h2>
      <p style="color: var(--fede-text-sub); font-size: 1.05rem; max-width: 620px; margin: 0 auto 28px;">
        Mirar videos te da claridad, pero la ejecución con feedback personalizado es lo que acelera tus resultados.
      </p>
      <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
        <a href="/mentorias" class="btn-fede-fire">
          🚀 Postular a Mentoría 1 a 1
        </a>
        <a href="/comunidad" class="btn-fede-outline">
          ⚡ Entrar al Campus Pro
        </a>
      </div>
    </div>
  </div>
</section>

<script>
function loadFedeVideo(videoId, cardEl) {
  const player = document.getElementById('mainYtPlayer');
  if (player) {
    player.src = 'https://www.youtube-nocookie.com/embed/' + videoId + '?autoplay=1&rel=0&modestbranding=1';
  }
  document.querySelectorAll('.fede-video-card').forEach(c => c.classList.remove('active'));
  if (cardEl) {
    cardEl.classList.add('active');
  }
}
</script>

<?php require __DIR__ . '/layout/footer.php'; ?>
</body>
</html>
