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

    <!-- Navegación Semántica & Amigable (URLs Dedicadas SEO) -->
    <nav aria-label="Navegación principal">
      <ul class="fede-nav-links">
        <li><a href="/metodologia-marca-personal" class="<?= $current_slug === 'metodologia-marca-personal' ? 'active' : '' ?>">Metodología</a></li>
        <li><a href="/fede-nowback-especialista-filmmaker" class="<?= $current_slug === 'fede-nowback-especialista-filmmaker' ? 'active' : '' ?>">Mi Recorrido</a></li>
        <li><a href="/clases-gratuitas-marca-personal" class="<?= $current_slug === 'clases-gratuitas-marca-personal' ? 'active' : '' ?>" style="color: #ff5555; font-weight: 700;">▶️ Clases YouTube</a></li>
        <li><a href="/mentorias" class="<?= $current_slug === 'mentorias' ? 'active' : '' ?>">Mentoría 1a1</a></li>
        <li><a href="/comunidad" class="<?= $current_slug === 'comunidad' ? 'active' : '' ?>" style="color: var(--fede-fire-orange, #f97316); font-weight: 700;">⚡ Campus Pro</a></li>
      </ul>
    </nav>
  </div>
</header>
