<?php
/**
 * Landing Page de Autoridad & Trayectoria SEO
 * URL Canonical: https://fedenowback.com.ar/fede-nowback-especialista-filmmaker
 * Aliases: /sobre-fede, /sobre-mi, /bio
 */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/seo_helper.php';

$current_slug = 'fede-nowback-especialista-filmmaker';

$page_seo = [
    'title' => 'Fede Nowback | Especialista en Marca Personal, Ex-Filmmaker & Productor',
    'description' => 'Conocé la historia de Fede Nowback: de filmmaker para bandas de rock y director de agencia con 35 clientes a productor de eventos de 25.000 personas y mentor de marcas personales.',
    'keywords' => 'fede nowback especialista filmmaker, fede nowback historia, productor eventos maxi leguizamo, mentor marca personal argentina, de filmmaker a mentor, comunicacion y ventas para creadores, fede nowback agencia, produccion audiovisual argentina',
    'canonical' => SITE_URL . '/fede-nowback-especialista-filmmaker',
    'og_image' => SITE_URL . '/assets/img/fede_nowback_street.jpg',
    'og_type' => 'profile'
];
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
  <?php render_seo_head($page_seo); ?>

  <!-- JSON-LD Breadcrumbs & Profile Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfilePage",
    "mainEntity": {
      "@type": "Person",
      "name": "Fede Nowback",
      "alternateName": "Federico Nowback",
      "jobTitle": "Especialista en Marca Personal, Mentor & Ex-Filmmaker",
      "description": "Estratega de marca personal con más de 10 años de experiencia en producción audiovisual, gestión de agencias y eventos masivos en Argentina y LATAM.",
      "image": "<?= SITE_URL ?>/assets/img/fede_nowback_street.jpg",
      "url": "<?= SITE_URL ?>/fede-nowback-especialista-filmmaker",
      "knowsAbout": [
        "Marca Personal",
        "Producción Audiovisual",
        "Filmmaking",
        "Negocios Digitales",
        "Estrategia de Contenido",
        "Oratoria y Comunicación en Cámara"
      ]
    }
  }
  </script>
</head>
<body>

<?php require __DIR__ . '/layout/header.php'; ?>

<!-- Hero Section Autoridad -->
<section class="fede-hero" style="padding: 90px 0 70px;">
  <div class="fede-hero-glow"></div>
  <div class="fede-container">
    <div class="fede-hero-grid" style="align-items: center;">
      <div>
        <span class="fede-pill">🎬 De Filmmaker a Estratega de Marcas Personales</span>
        <h1 class="fede-h1" style="font-size: clamp(2.2rem, 4.5vw, 3.4rem); line-height: 1.15; margin-bottom: 20px;">
          "Empecé de cero.<br>
          <span class="fire-grad">Cámara en mano y sin contactos."</span>
        </h1>
        <p class="fede-lead" style="margin-bottom: 24px;">
          Durante más de una década recorrí el camino completo: desde filmar bandas de rock por pasión hasta liderar una agencia con 35 clientes y producir mega-eventos para 25.000 personas. Hoy pongo toda esa experiencia en el campo de batalla al servicio de tu marca personal.
        </p>

        <div style="display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 30px;">
          <a href="/mentorias" class="btn-fede-fire">
            🚀 Conocer la Mentoría 1 a 1
          </a>
          <a href="/comunidad" class="btn-fede-outline">
            ⚡ Ingresar al Campus Pro
          </a>
        </div>

        <!-- Métricas Rápidas -->
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; border-top: 1px solid var(--fede-border); padding-top: 20px;">
          <div>
            <div style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.8rem; color: var(--fede-fire-orange);">+10 Años</div>
            <div style="font-size: 0.8rem; color: var(--fede-text-muted);">En Producción & Medios</div>
          </div>
          <div>
            <div style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.8rem; color: var(--fede-fire-yellow);">25.000</div>
            <div style="font-size: 0.8rem; color: var(--fede-text-muted);">Personas en Eventos</div>
          </div>
          <div>
            <div style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.8rem; color: #10b981;">+35</div>
            <div style="font-size: 0.8rem; color: var(--fede-text-muted);">Clientes en Agencia</div>
          </div>
        </div>
      </div>

      <!-- Imagen de Autoridad -->
      <div style="text-align: center; position: relative;">
        <div style="position: absolute; inset: -10px; background: radial-gradient(circle, rgba(255,85,0,0.2) 0%, transparent 70%); z-index: 0;"></div>
        <img src="/assets/img/fede_nowback_street.jpg" alt="Fede Nowback Especialista Filmmaker y Estratega de Marca Personal" style="position: relative; z-index: 1; width: 100%; max-width: 440px; border-radius: var(--fede-radius-xl); border: 2px solid var(--fede-border-fire); box-shadow: 0 25px 60px rgba(0,0,0,0.8); object-fit: cover;">
      </div>
    </div>
  </div>
</section>

<!-- Timeline / Las 4 Etapas del Recorrido -->
<section class="fede-section" style="background: rgba(255, 255, 255, 0.015); border-top: 1px solid var(--fede-border);">
  <div class="fede-container" style="max-width: 960px;">
    <div class="fede-sec-header">
      <span class="fede-sec-tag">Historia & Evolución</span>
      <h2 class="fede-sec-title">Las 4 Etapas que Forjaron mi Metodología</h2>
      <p class="fede-sec-desc">
        No enseño desde la teoría de un curso de internet. Enseño desde más de 10 años de aciertos, errores y ejecuciones reales.
      </p>
    </div>

    <div style="display: flex; flex-direction: column; gap: 30px;">
      
      <!-- Etapa 1 -->
      <div class="fede-card" style="border-left: 4px solid var(--fede-fire-orange); padding: 32px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 10px;">
          <span style="font-size: 0.8rem; font-weight: 800; color: var(--fede-fire-orange); text-transform: uppercase; letter-spacing: 0.05em;">Etapa 01 • Los Inicios</span>
          <span style="font-size: 0.85rem; color: var(--fede-text-muted); background: var(--fede-bg-dark); padding: 4px 12px; border-radius: 999px; border: 1px solid var(--fede-border);">Filmmaker & Rock</span>
        </div>
        <h3 style="font-family: var(--fede-font-heading); font-size: 1.4rem; color: #fff; margin-bottom: 12px;">
          Cámara en mano, recitales y aprender haciendo sin presupuesto
        </h3>
        <p style="color: var(--fede-text-sub); line-height: 1.65; margin-bottom: 12px;">
          Mis primeros pasos en el mundo audiovisual fueron como <strong>filmmaker para bandas de rock</strong>. Sin contactos en la industria ni equipamiento costoso, aprendí la importancia de la narrativa visual, el ritmo de edición y la capacidad de captar la atención en segundos.
        </p>
        <p style="color: var(--fede-text-muted); font-size: 0.92rem; line-height: 1.6;">
          💡 <em>Aprendizaje clave:</em> Una cámara cara no te hace buen comunicador. Lo que engancha a la audiencia es la emoción, la claridad del mensaje y la autenticidad del creador.
        </p>
      </div>

      <!-- Etapa 2 -->
      <div class="fede-card" style="border-left: 4px solid var(--fede-fire-yellow); padding: 32px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 10px;">
          <span style="font-size: 0.8rem; font-weight: 800; color: var(--fede-fire-yellow); text-transform: uppercase; letter-spacing: 0.05em;">Etapa 02 • Escalamiento</span>
          <span style="font-size: 0.85rem; color: var(--fede-text-muted); background: var(--fede-bg-dark); padding: 4px 12px; border-radius: 999px; border: 1px solid var(--fede-border);">Agencia Digital</span>
        </div>
        <h3 style="font-family: var(--fede-font-heading); font-size: 1.4rem; color: #fff; margin-bottom: 12px;">
          De trabajar solo a liderar un equipo de 9 personas y 35 clientes
        </h3>
        <p style="color: var(--fede-text-sub); line-height: 1.65; margin-bottom: 12px;">
          Con la experiencia acumulada fundé mi propia agencia de contenido. Pasé de ser un freelancer saturado a construir un equipo multidisciplinario de <strong>9 profesionales</strong>, gestionando la comunicación digital y campañas para más de <strong>35 marcas y empresas</strong> simultáneas.
        </p>
        <p style="color: var(--fede-text-muted); font-size: 0.92rem; line-height: 1.6;">
          💡 <em>Aprendizaje clave:</em> Para escalar necesitás procesos repetibles, sistemas de delegación y una propuesta de valor irresistible que no dependa de cobrar por horas.
        </p>
      </div>

      <!-- Etapa 3 -->
      <div class="fede-card" style="border-left: 4px solid #38bdf8; padding: 32px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 10px;">
          <span style="font-size: 0.8rem; font-weight: 800; color: #38bdf8; text-transform: uppercase; letter-spacing: 0.05em;">Etapa 03 • Gran Escala</span>
          <span style="font-size: 0.85rem; color: var(--fede-text-muted); background: var(--fede-bg-dark); padding: 4px 12px; border-radius: 999px; border: 1px solid var(--fede-border);">Productor Ejecutivo</span>
        </div>
        <h3 style="font-family: var(--fede-font-heading); font-size: 1.4rem; color: #fff; margin-bottom: 12px;">
          Producción de Maxi Leguízamo, eventos para 25.000 personas y medios masivos
        </h3>
        <p style="color: var(--fede-text-sub); line-height: 1.65; margin-bottom: 12px;">
          Ese crecimiento me llevó al circuito de grandes producciones, asumiendo como <strong>productor de Maxi Leguízamo</strong>. Diseñamos y ejecutamos eventos masivos que convocaron hasta <strong>25.000 personas</strong>, coordinando transmisiones y obteniendo cobertura en medios de primer nivel nacional: <em>Canal 13, A24, Canal 9, Infobae y Diario Perfil</em>.
        </p>
        <p style="color: var(--fede-text-muted); font-size: 0.92rem; line-height: 1.6;">
          💡 <em>Aprendizaje clave:</em> La autoridad masiva no es un golpe de suerte; es el resultado de dominar la puesta en escena, la psicología de masas y la credibilidad pública.
        </p>
      </div>

      <!-- Etapa 4 -->
      <div class="fede-card" style="border-left: 4px solid #10b981; padding: 32px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 10px;">
          <span style="font-size: 0.8rem; font-weight: 800; color: #10b981; text-transform: uppercase; letter-spacing: 0.05em;">Etapa 04 • El Propósito Actual</span>
          <span style="font-size: 0.85rem; color: var(--fede-text-muted); background: var(--fede-bg-dark); padding: 4px 12px; border-radius: 999px; border: 1px solid var(--fede-border);">Mentoría & Campus Pro</span>
        </div>
        <h3 style="font-family: var(--fede-font-heading); font-size: 1.4rem; color: #fff; margin-bottom: 12px;">
          De estar detrás de cámara a enseñar a otros a liderar su nicho
        </h3>
        <p style="color: var(--fede-text-sub); line-height: 1.65; margin-bottom: 12px;">
          Después de haber estado más de 10 años detrás de cámara construyendo proyectos ajenos, decidí dar un paso al frente. Vi a cientos de profesionales extraordinarios (médicos, abogados, psicólogos, coaches, consultores, filmmakers) totalmente invisibles por no saber comunicar su valor.
        </p>
        <p style="color: var(--fede-text-sub); line-height: 1.65;">
          Hoy mi misión es clara: <strong>ayudarte a vencer el miedo a la cámara, estructurar tu mensaje único y transformar tu conocimiento en un negocio digital rentable y de alto impacto</strong>.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- Coberturas en Medios Nacionales -->
<section class="fede-section" style="padding: 60px 0; background: var(--fede-bg-dark);">
  <div class="fede-container">
    <div style="text-align: center; margin-bottom: 30px;">
      <span style="font-size: 0.78rem; font-weight: 800; color: var(--fede-text-muted); text-transform: uppercase; letter-spacing: 0.1em;">
        Proyectos y producciones cubiertas por medios nacionales
      </span>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; gap: 36px; flex-wrap: wrap; opacity: 0.75;">
      <span style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.3rem; color: #fff;">CANAL 13</span>
      <span style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.3rem; color: #fff;">A24</span>
      <span style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.3rem; color: #fff;">CANAL 9</span>
      <span style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.3rem; color: #fff;">INFOBAE</span>
      <span style="font-family: var(--fede-font-heading); font-weight: 900; font-size: 1.3rem; color: #fff;">DIARIO PERFIL</span>
    </div>
  </div>
</section>

<!-- Manifiesto de 5 Principios No Negociables -->
<section class="fede-section" style="background: rgba(255, 255, 255, 0.015); border-top: 1px solid var(--fede-border);">
  <div class="fede-container" style="max-width: 900px;">
    <div class="fede-sec-header">
      <span class="fede-sec-tag">Filosofía de Trabajo</span>
      <h2 class="fede-sec-title">El Manifiesto de Fede Nowback</h2>
      <p class="fede-sec-desc">5 principios sobre los que construimos marcas personales sólidas que venden sin perder la identidad.</p>
    </div>

    <div style="display: flex; flex-direction: column; gap: 20px;">
      
      <div class="fede-card">
        <h3 style="font-family: var(--fede-font-heading); font-size: 1.25rem; color: var(--fede-fire-orange); margin-bottom: 8px;">
          1. La viralidad vacía no paga las cuentas
        </h3>
        <p style="color: var(--fede-text-sub); font-size: 0.95rem; line-height: 1.6;">
          Tener 100.000 vistas en un video bailando o con memes no construye un negocio. Preferimos 500 reproducciones de clientes cualificados con presupuesto para contratar tus servicios antes que un millón de curiosos.
        </p>
      </div>

      <div class="fede-card">
        <h3 style="font-family: var(--fede-font-heading); font-size: 1.25rem; color: var(--fede-fire-yellow); margin-bottom: 8px;">
          2. Claridad de oferta antes que volumen ciego
        </h3>
        <p style="color: var(--fede-text-sub); font-size: 0.95rem; line-height: 1.6;">
          Antes de prender la cámara para grabar 30 reels al mes, tenés que tener 100% resuelto a quién ayudás, qué problema específico le solucionás y cuál es tu oferta de alto valor.
        </p>
      </div>

      <div class="fede-card">
        <h3 style="font-family: var(--fede-font-heading); font-size: 1.25rem; color: #38bdf8; margin-bottom: 8px;">
          3. Acción imperfecta vence al perfeccionismo paralizante
        </h3>
        <p style="color: var(--fede-text-sub); font-size: 0.95rem; line-height: 1.6;">
          Nadie nace con soltura escénica. La única forma de ganar confianza frente a la cámara es ejecutando con constancia. Diseñamos guiones y estructuras que te permiten grabar en minutos sin titubear.
        </p>
      </div>

      <div class="fede-card">
        <h3 style="font-family: var(--fede-font-heading); font-size: 1.25rem; color: #10b981; margin-bottom: 8px;">
          4. Ojo de Filmmaker aplicado a la retención
        </h3>
        <p style="color: var(--fede-text-sub); font-size: 0.95rem; line-height: 1.6;">
          No necesitás efectos de cine hollywoodense, pero sí entender cómo estructurar un gancho en los primeros 3 segundos, sostener la atención y cerrar con un llamado a la acción que convierta visualizadores en conversaciones por WhatsApp.
        </p>
      </div>

      <div class="fede-card">
        <h3 style="font-family: var(--fede-font-heading); font-size: 1.25rem; color: #f43f5e; margin-bottom: 8px;">
          5. Detrás de cada negocio hay una persona real
        </h3>
        <p style="color: var(--fede-text-sub); font-size: 0.95rem; line-height: 1.6;">
          No trabajamos con plantillas enlatadas. El proceso de mentoría se adapta a tu personalidad, tus tiempos y tus metas individuales. Cero humo, acompañamiento honesto y directo al grano.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- FAQ Específico sobre Fede (Schema FAQPage) -->
<section class="fede-section" id="faq" style="border-top: 1px solid var(--fede-border);">
  <div class="fede-container" style="max-width: 840px;">
    <div class="fede-sec-header">
      <span class="fede-sec-tag">Preguntas Clave</span>
      <h2 class="fede-sec-title">Preguntas Frecuentes sobre Fede Nowback</h2>
    </div>

    <div style="display: flex; flex-direction: column; gap: 14px;">
      
      <div class="fede-card" style="padding: 22px;">
        <h4 style="font-family: var(--fede-font-heading); font-weight: 800; color: #fff; margin-bottom: 8px;">
          ¿Quién es Fede Nowback y cuál es su trayectoria?
        </h4>
        <p style="color: var(--fede-text-sub); font-size: 0.94rem; line-height: 1.6;">
          Fede Nowback es estratega de marca personal, mentor y productor audiovisual con más de 10 años en medios de comunicación, dirección de agencias y producción de mega-eventos en Argentina. Ayuda a profesionales, creadores y emprendedores a posicionarse como referentes y monetizar su conocimiento.
        </p>
      </div>

      <div class="fede-card" style="padding: 22px;">
        <h4 style="font-family: var(--fede-font-heading); font-weight: 800; color: #fff; margin-bottom: 8px;">
          ¿Por qué su experiencia como filmmaker es diferencial para sus alumnos?
        </h4>
        <p style="color: var(--fede-text-sub); font-size: 0.94rem; line-height: 1.6;">
          A diferencia de consultores teóricos, Fede dominó la cámara, la iluminación, el guionaje y el montaje desde el barro. Esto le permite enseñar a sus alumnos cómo hablar con naturalidad, cómo armar encuadres atractivos con su propio celular y cómo editar videos de alta retención.
        </p>
      </div>

      <div class="fede-card" style="padding: 22px;">
        <h4 style="font-family: var(--fede-font-heading); font-weight: 800; color: #fff; margin-bottom: 8px;">
          ¿Cómo puedo trabajar directamente con Fede?
        </h4>
        <p style="color: var(--fede-text-sub); font-size: 0.94rem; line-height: 1.6;">
          Podés postularte a su <strong>Mentoría 1 a 1 de Marca Personal</strong> (con plazas limitadas por mes para asegurar feedback personalizado) o sumarte al <strong>Campus Pro</strong> para acceder a cursos, clases en vivo y comunidad de networking.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- Banner de Conversión Final -->
<section class="fede-section" style="padding-top: 20px;">
  <div class="fede-container">
    <div style="background: linear-gradient(135deg, #180800 0%, #2b0c03 100%); border: 2px solid var(--fede-fire-orange); border-radius: var(--fede-radius-xl); padding: 50px 30px; text-align: center;">
      <h2 style="font-family: var(--fede-font-heading); font-size: clamp(1.8rem, 4vw, 2.6rem); font-weight: 900; text-transform: uppercase; margin-bottom: 14px;">
        ¿Querés que audite tu marca personal y armemos tu plan?
      </h2>
      <p style="color: var(--fede-text-sub); font-size: 1.05rem; max-width: 600px; margin: 0 auto 28px;">
        Escribime por WhatsApp directo. Me contás a qué te dedicás y vemos juntos si la mentoría o el Campus es el mejor camino para tu objetivo.
      </p>
      <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
        <a href="<?= get_fede_wa('Hola Fede! Estuve leyendo sobre tu recorrido y quiero coordinar una sesión de Mentoría 1 a 1.') ?>" target="_blank" rel="noopener noreferrer" class="btn-fede-fire">
          💬 Hablar con Fede por WhatsApp
        </a>
        <a href="/comunidad" class="btn-fede-outline">
          ⚡ Ver Membresías del Campus
        </a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/layout/footer.php'; ?>
</body>
</html>
