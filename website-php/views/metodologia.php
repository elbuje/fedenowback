<?php
/**
 * Landing Page: Metodología de Marca Personal - Fede Nowback
 * URL Canonical: https://fedenowback.com.ar/metodologia-marca-personal
 * Aliases: /metodologia, /metodo
 */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/seo_helper.php';

$current_slug = 'metodologia-marca-personal';

$page_seo = [
    'title' => 'Metodología de Marca Personal | Sistema de 4 Fases — Fede Nowback',
    'description' => 'Descubrí el método paso a paso de Fede Nowback: cómo definir una oferta irresistible, perder el miedo a la cámara, crear contenido estratégico y cerrar clientes por WhatsApp.',
    'keywords' => 'metodologia marca personal, sistema marca personal fede nowback, como vender con marca personal, crear contenido para redes, oratoria camara, embudo de ventas whatsapp creadores',
    'canonical' => SITE_URL . '/metodologia-marca-personal',
    'og_image' => SITE_URL . '/assets/img/fede_nowback_hero.jpg',
    'og_type' => 'article'
];
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
  <?php render_seo_head($page_seo); ?>

  <!-- JSON-LD HowTo Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "HowTo",
    "name": "Cómo monetizar tu Marca Personal con la Metodología Nowback",
    "description": "Sistema de 4 fases para estructurar tu oferta, comunicar con soltura en cámara y captar clientes de alto valor.",
    "step": [
      {
        "@type": "HowToStep",
        "name": "Fase 1: Diagnóstico y Oferta High-Ticket",
        "text": "Definición del cliente ideal, propuesta de valor diferenciada y empaquetado de servicios premium."
      },
      {
        "@type": "HowToStep",
        "name": "Fase 2: Guiones y Soltura en Cámara",
        "text": "Estructuras de guiones probados y técnicas progresivas para eliminar la timidez frente al lente."
      },
      {
        "@type": "HowToStep",
        "name": "Fase 3: Motor de Contenido Orgánico",
        "text": "Estrategia de Reels, Carruseles y YouTube optimizados para retención y alcance cualificado."
      },
      {
        "@type": "HowToStep",
        "name": "Fase 4: Conversión Directa y Cierres",
        "text": "Automatización de llamados a la acción hacia DMs y cierre de ventas por WhatsApp."
      }
    ]
  }
  </script>
</head>
<body>

<?php require __DIR__ . '/layout/header.php'; ?>

<!-- Hero Metodología -->
<section class="fede-hero" style="padding: 90px 0 70px;">
  <div class="fede-hero-glow"></div>
  <div class="fede-container">
    <div style="max-width: 840px; margin: 0 auto; text-align: center;">
      <span class="fede-pill">⚡ El Sistema Nowback de 4 Fases</span>
      <h1 class="fede-h1" style="font-size: clamp(2.2rem, 4.5vw, 3.4rem); line-height: 1.15; margin-bottom: 20px;">
        El Método Probado para Convertir tu Conocimiento en una <span class="fire-grad">Marca que Vende</span>
      </h1>
      <p class="fede-lead" style="margin-bottom: 30px;">
        Sin fórmulas mágicas ni bailes de TikTok. Una estrategia estructurada en 4 pasos claros para posicionarte como referente de tu sector y generar clientes de alto valor.
      </p>

      <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
        <a href="/mentorias" class="btn-fede-fire">
          🚀 Aplicar el Método en Mentoría 1 a 1
        </a>
        <a href="/comunidad" class="btn-fede-outline">
          ⚡ Aprender en el Campus Pro
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Las 4 Fases Detalladas -->
<section class="fede-section" style="background: rgba(255, 255, 255, 0.015); border-top: 1px solid var(--fede-border);">
  <div class="fede-container">
    <div class="fede-sec-header">
      <span class="fede-sec-tag">Paso a Paso</span>
      <h2 class="fede-sec-title">Las 4 Fases de la Metodología</h2>
      <p class="fede-sec-desc">Desde el diagnóstico inicial hasta la automatización de tus consultas comerciales.</p>
    </div>

    <div class="fede-grid-2" style="gap: 30px;">
      
      <!-- Fase 1 -->
      <div class="fede-card" style="border-top: 4px solid var(--fede-fire-orange); padding: 32px;">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 14px;">
          <span style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.8rem; color: var(--fede-fire-orange);">01</span>
          <h3 style="font-family: var(--fede-font-heading); font-size: 1.3rem; color: #fff; margin: 0;">Diagnóstico & Oferta High-Ticket</h3>
        </div>
        <p style="color: var(--fede-text-sub); line-height: 1.6; margin-bottom: 14px;">
          Analizamos en profundidad tu experiencia previa, tus fortalezas únicas y el dolor urgente que resolvés. Empaquetamos tus servicios en una oferta irresistible que te permita cobrar por resultados y no por horas.
        </p>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 8px; font-size: 0.9rem; color: var(--fede-text-muted);">
          <li><strong style="color: #10b981;">✓</strong> Definición precisa de tu cliente ideal</li>
          <li><strong style="color: #10b981;">✓</strong> Fijación de precios y propuesta de transformación</li>
          <li><strong style="color: #10b981;">✓</strong> Optimización integral de tu biografía y perfil</li>
        </ul>
      </div>

      <!-- Fase 2 -->
      <div class="fede-card" style="border-top: 4px solid var(--fede-fire-yellow); padding: 32px;">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 14px;">
          <span style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.8rem; color: var(--fede-fire-yellow);">02</span>
          <h3 style="font-family: var(--fede-font-heading); font-size: 1.3rem; color: #fff; margin: 0;">Guiones & Pérdida del Miedo a la Cámara</h3>
        </div>
        <p style="color: var(--fede-text-sub); line-height: 1.6; margin-bottom: 14px;">
          Te entrego plantillas de guiones con ganchos psicológicos para que sepas exactamente qué decir antes de grabar. Trabajamos la postura, el ritmo y la naturalidad para que hables con total seguridad.
        </p>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 8px; font-size: 0.9rem; color: var(--fede-text-muted);">
          <li><strong style="color: #10b981;">✓</strong> Plantillas de guiones para Reels y Shorts</li>
          <li><strong style="color: #10b981;">✓</strong> Técnicas de grabación rápida con tu propio celular</li>
          <li><strong style="color: #10b981;">✓</strong> Desbloqueo de creencias limitantes sobre exponerte</li>
        </ul>
      </div>

      <!-- Fase 3 -->
      <div class="fede-card" style="border-top: 4px solid #38bdf8; padding: 32px;">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 14px;">
          <span style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.8rem; color: #38bdf8);">03</span>
          <h3 style="font-family: var(--fede-font-heading); font-size: 1.3rem; color: #fff; margin: 0;">Motor de Contenido Orgánico & Retención</h3>
        </div>
        <p style="color: var(--fede-text-sub); line-height: 1.6; margin-bottom: 14px;">
          Aplicamos principios de producción audiovisual (ojo de filmmaker) para maximizar la retención de los primeros 3 segundos y nutrir a tu audiencia con contenido de valor que construye autoridad inmediata.
        </p>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 8px; font-size: 0.9rem; color: var(--fede-text-muted);">
          <li><strong style="color: #10b981;">✓</strong> Calendario editorial de 3 a 5 piezas semanales</li>
          <li><strong style="color: #10b981;">✓</strong> Estructuras de alto impacto visual y textual</li>
          <li><strong style="color: #10b981;">✓</strong> Posicionamiento multiformato (Instagram, TikTok, YouTube)</li>
        </ul>
      </div>

      <!-- Fase 4 -->
      <div class="fede-card" style="border-top: 4px solid #10b981; padding: 32px;">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 14px;">
          <span style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.8rem; color: #10b981);">04</span>
          <h3 style="font-family: var(--fede-font-heading); font-size: 1.3rem; color: #fff; margin: 0;">Embudo de Conversión & Cierres por WhatsApp</h3>
        </div>
        <p style="color: var(--fede-text-sub); line-height: 1.6; margin-bottom: 14px;">
          El contenido atrae, pero los DMs y WhatsApp cierran. Implementamos llamados a la acción estratégicos y guiones de conversación consultiva para transformar seguidores en clientes que pagan por adelantado.
        </p>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 8px; font-size: 0.9rem; color: var(--fede-text-muted);">
          <li><strong style="color: #10b981;">✓</strong> CTAs magnéticos para generar conversaciones en mensajes directos</li>
          <li><strong style="color: #10b981;">✓</strong> Guion de diagnóstico y calificación rápida por WhatsApp</li>
          <li><strong style="color: #10b981;">✓</strong> Protocolo de cierre en llamadas 1 a 1 sin sonar insistente</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- Comparativa: Sin Método vs Con Método Nowback -->
<section class="fede-section" style="border-top: 1px solid var(--fede-border);">
  <div class="fede-container" style="max-width: 900px;">
    <div class="fede-sec-header">
      <span class="fede-sec-tag">El Cambio Real</span>
      <h2 class="fede-sec-title">¿Cómo cambia tu negocio con el Método Nowback?</h2>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
      
      <!-- Sin Metodo -->
      <div class="fede-card" style="border-color: rgba(239, 68, 68, 0.4); background: rgba(239, 68, 68, 0.02);">
        <h4 style="font-family: var(--fede-font-heading); font-weight: 800; font-size: 1.1rem; color: #ef4444; margin-bottom: 14px;">
          ❌ Sin Método (El Creador Frustrado)
        </h4>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px; font-size: 0.9rem; color: var(--fede-text-muted);">
          <li>• Graba horas enteras y termina borrando todo por vergüenza.</li>
          <li>• Persigue likes y viralidad pero no tiene consultas de compra.</li>
          <li>• Cobra tarifas bajas compitiendo por precio contra el mercado.</li>
          <li>• No tiene claridad de qué vender ni a quién hablarle.</li>
        </ul>
      </div>

      <!-- Con Metodo -->
      <div class="fede-card" style="border-color: rgba(16, 185, 129, 0.4); background: rgba(16, 185, 129, 0.02);">
        <h4 style="font-family: var(--fede-font-heading); font-weight: 800; font-size: 1.1rem; color: #10b981; margin-bottom: 14px;">
          ✅ Con el Método Nowback (Marca de Alto Impacto)
        </h4>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px; font-size: 0.9rem; color: var(--fede-text-sub);">
          <li>• Graba en 20 minutos con guiones claros y total soltura.</li>
          <li>• Cada publicación atrae a potenciales clientes cualificados.</li>
          <li>• Cobra tickets altos porque su autoridad está demostrada.</li>
          <li>• Tiene un sistema predecible de consultas semanales por WhatsApp.</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- Banner Final -->
<section class="fede-section" style="padding-top: 20px;">
  <div class="fede-container">
    <div style="background: linear-gradient(135deg, #180800 0%, #2b0c03 100%); border: 2px solid var(--fede-fire-orange); border-radius: var(--fede-radius-xl); padding: 50px 30px; text-align: center;">
      <h2 style="font-family: var(--fede-font-heading); font-size: clamp(1.8rem, 4vw, 2.6rem); font-weight: 900; text-transform: uppercase; margin-bottom: 14px;">
        Empezá a aplicar este sistema en tu negocio hoy mismo
      </h2>
      <p style="color: var(--fede-text-sub); font-size: 1.05rem; max-width: 600px; margin: 0 auto 28px;">
        Agendá una llamada de diagnóstico o escribime por WhatsApp para analizar tu caso y armar tu plan a medida.
      </p>
      <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
        <a href="<?= get_fede_wa('Hola Fede! Quiero aplicar tu Metodología de Marca Personal en mi negocio.') ?>" target="_blank" rel="noopener noreferrer" class="btn-fede-fire">
          💬 Escribir a Fede por WhatsApp
        </a>
        <a href="/mentorias" class="btn-fede-outline">
          🚀 Ver Detalles de la Mentoría
        </a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/layout/footer.php'; ?>
</body>
</html>
