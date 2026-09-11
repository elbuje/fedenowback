<?php
/**
 * Header Global - Fede Nowback
 * fedenowback.com.ar
 */
$current_slug = $current_slug ?? '';
?>
<header class="fede-header">
  <div class="fede-container fede-header-flex">
    <a href="/" class="fede-brand">
      <span class="fede-brand-badge">NOWBACK</span>
      <span class="fede-brand-name">FEDE NOWBACK</span>
    </a>

    <!-- Navegación Semántica & Amigable -->
    <nav aria-label="Navegación principal">
      <ul class="fede-nav-links">
        <li><a href="/" class="<?= empty($current_slug) ? 'active' : '' ?>">Inicio</a></li>
        <li><a href="/#metodo">Metodología</a></li>
        <li><a href="/#sobre-fede">Mi Recorrido</a></li>
        <li><a href="/#youtube-videos" style="color: #ff5555; font-weight: 700;">▶️ Clases YouTube</a></li>
        <li><a href="/mentorias" class="<?= $current_slug === 'mentorias' ? 'active' : '' ?>">Mentoría 1a1</a></li>
        <li><a href="/encende-tu-fuego" class="<?= $current_slug === 'evento' ? 'active' : '' ?>" style="color: var(--fede-fire-yellow, #eab308); font-weight: 700;">🔥 Evento 12/09</a></li>
        <li><a href="/comunidad" class="<?= $current_slug === 'comunidad' ? 'active' : '' ?>" style="color: var(--fede-fire-orange, #f97316); font-weight: 700;">⚡ Campus Pro</a></li>
        <li><a href="/sobre-mi" class="<?= $current_slug === 'sobre-mi' ? 'active' : '' ?>">Sobre Fede</a></li>
      </ul>
    </nav>
  </div>
</header>
