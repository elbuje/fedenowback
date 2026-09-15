<?php
/**
 * Footer Global - Fede Nowback
 * fedenowback.com.ar
 */
?>
<footer class="fede-footer" style="background: #09090b; border-top: 1px solid #1e2029; padding: 60px 20px 30px; color: #a1a1aa;">
  <div class="fede-container" style="max-width: 1200px; margin: 0 auto;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 40px; margin-bottom: 40px;">
      
      <!-- Brand Col -->
      <div>
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 16px;">
          <span style="background: #f97316; color: #fff; font-size: 0.75rem; font-weight: 900; padding: 4px 8px; border-radius: 4px; letter-spacing: 1px;">NOWBACK</span>
          <span style="font-size: 1.25rem; font-weight: 800; color: #fff;">FEDE NOWBACK</span>
        </div>
        <p style="font-size: 0.95rem; line-height: 1.6; color: #71717a;">
          Estratega de Marca Personal, Ex-Filmmaker y Mentor de Negocios Digitales. Buenos Aires, Argentina para todo el mundo hispanohablante.
        </p>
        <div style="display: flex; gap: 12px; margin-top: 16px;">
          <a href="<?= SITE_INSTAGRAM ?>" target="_blank" rel="noopener" style="color: #f97316; font-size: 1.1rem; text-decoration: none;">Instagram</a>
          <a href="<?= SITE_YOUTUBE ?>" target="_blank" rel="noopener" style="color: #ff4444; font-size: 1.1rem; text-decoration: none;">YouTube</a>
          <a href="https://www.tiktok.com/@fedenowback" target="_blank" rel="noopener" style="color: #fff; font-size: 1.1rem; text-decoration: none;">TikTok</a>
        </div>
      </div>

      <!-- Links Col (URLs SEO Optimizadas) -->
      <div>
        <h4 style="color: #fff; font-size: 1rem; font-weight: 700; margin-bottom: 16px;">Navegación & Contenido</h4>
        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; font-size: 0.95rem;">
          <li><a href="/" style="color: #a1a1aa; text-decoration: none;">Inicio</a></li>
          <li><a href="/fede-nowback-especialista-filmmaker" style="color: #a1a1aa; text-decoration: none;">Mi Recorrido & Historia</a></li>
          <li><a href="/metodologia-marca-personal" style="color: #a1a1aa; text-decoration: none;">Metodología de 4 Fases</a></li>
          <li><a href="/clases-gratuitas-marca-personal" style="color: #ff5555; text-decoration: none;">▶️ Clases en YouTube</a></li>
          <li><a href="/mentorias" style="color: #a1a1aa; text-decoration: none;">Mentoría 1 a 1</a></li>
          <li><a href="/comunidad" style="color: #f97316; text-decoration: none;">⚡ Campus Pro</a></li>
          <li><a href="/contacto" style="color: #a1a1aa; text-decoration: none;">Contacto & Prensa</a></li>
        </ul>
      </div>

      <!-- Contacto & GEO Col -->
      <div>
        <h4 style="color: #fff; font-size: 1rem; font-weight: 700; margin-bottom: 16px;">Contacto Oficial</h4>
        <p style="font-size: 0.95rem; margin: 0 0 8px 0;">📍 Buenos Aires, Argentina (Cobertura Global)</p>
        <p style="font-size: 0.95rem; margin: 0 0 8px 0;">💬 WhatsApp: <a href="<?= get_whatsapp_url() ?>" target="_blank" style="color: #22c55e; text-decoration: none; font-weight: 600;"><?= SITE_PHONE ?></a></p>
        <p style="font-size: 0.95rem; margin: 0 0 8px 0;">✉️ Email: <a href="mailto:<?= SITE_EMAIL ?>" style="color: #f97316; text-decoration: none;"><?= SITE_EMAIL ?></a></p>
      </div>

    </div>

    <div style="border-top: 1px solid #1e2029; padding-top: 24px; text-align: center; font-size: 0.85rem; color: #52525b;">
      <p style="margin: 0;">&copy; <?= date('Y') ?> Fede Nowback. Todos los derechos reservados. Marca Personal, Producción & Negocios Digitales.</p>
    </div>
  </div>
</footer>
<?= render_whatsapp_float() ?>
