<?php
/**
 * Página Principal / Sitio Completo - Fede Nowback | Marca Personal & Negocios Digitales
 * URL: https://fedenowback.com.ar
 * WhatsApp Oficial: +54 9 11 3820-5570
 */

$page_title = "Fede Nowback | Estrategia de Marca Personal, Mentalidad y Negocios Digitales";
$page_desc = "Te enseño a monetizar tu conocimiento y escalar tu negocio con tu marca personal. Estrategia de contenidos, mentalidad, hábitos y ventas sin depender de la viralidad.";
$canonical_url = "https://fedenowback.com.ar";
$og_image = "https://fedenowback.com.ar/assets/img/fede_nowback_hero.jpg";

function get_fede_wa($msg = '') {
    if (empty($msg)) {
        $msg = "Hola Fede! Vengo desde tu sitio web y quiero consultar sobre tus programas / mentorías de Marca Personal.";
    }
    return "https://wa.me/5491138205570?text=" . urlencode($msg);
}
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta name="keywords" content="fede nowback, marca personal, mentoría negocios digitales, creador de contenido, vender en instagram, monetizar redes, dejar de postergar, clases youtube fedenowback">
  <meta name="author" content="Fede Nowback">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <link rel="canonical" href="<?= htmlspecialchars($canonical_url) ?>">

  <!-- Favicons Oficiales Fede Nowback -->
  <link rel="icon" type="image/x-icon" href="/favicon.ico?v=6">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png?v=6">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon-180x180.png?v=6">

  <!-- Open Graph / WhatsApp Preview -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_AR">
  <meta property="og:site_name" content="Fede Nowback | Marca Personal">
  <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical_url) ?>">
  <meta property="og:image" content="<?= htmlspecialchars($og_image) ?>?v=3">
  <meta property="og:image:secure_url" content="<?= htmlspecialchars($og_image) ?>?v=3">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="682">
  <meta property="og:image:height" content="1024">
  <meta property="og:image:alt" content="Fede Nowback - Mentor de Marca Personal y Negocios Digitales">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($og_image) ?>?v=3">

  <!-- Google Fonts: Montserrat (Titulares sólidos) + Inter (Lectura limpia) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

  <!-- Schema.org JSON-LD -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Person",
        "@id": "https://fedenowback.com.ar#person",
        "name": "Fede Nowback",
        "alternateName": "Federico Nowback",
        "jobTitle": "Estratega de Marca Personal & Mentor de Negocios Digitales",
        "description": "Especialista en desarrollo de marca personal, creación de contenido con intención de compra y escalado de negocios para emprendedores y profesionales.",
        "url": "https://fedenowback.com.ar",
        "image": "https://fedenowback.com.ar/assets/img/fede_nowback_hero.jpg",
        "sameAs": [
          "https://www.instagram.com/fedenowback/",
          "https://www.tiktok.com/@fedenowback",
          "https://www.threads.com/@fedenowback",
          "https://www.youtube.com/@fedenowback6170"
        ]
      },
      {
        "@type": "WebSite",
        "@id": "https://fedenowback.com.ar#website",
        "url": "https://fedenowback.com.ar",
        "name": "Fede Nowback | Marca Personal & Negocios",
        "publisher": {
          "@id": "https://fedenowback.com.ar#person"
        }
      }
    ]
  }
  </script>

  <link rel="stylesheet" href="/assets/css/styles.css?v=3.2">
</head>
<body>

  <!-- Header de Navegación Global -->
  <?php require __DIR__ . '/layout/header.php'; ?>

  <!-- Hero Section -->
  <section class="fede-hero">
    <div class="fede-hero-glow"></div>
    <div class="fede-container">
      <div class="fede-hero-grid">
        
        <!-- Copy Principal -->
        <div>
          <span class="fede-pill">🔥 Marca Personal • Mentalidad • Negocios Digitales</span>
          <h1 class="fede-h1">
            Dejá de ser uno más.<br>
            <span class="fire-grad">Aprendé a vender</span> siendo vos mismo.
          </h1>
          <p class="fede-lead">
            Te enseño el método estratégico para vencer el miedo a la cámara, crear contenido con intención de compra y transformar tus redes en un canal predecible de clientes.
          </p>

          <div style="display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 32px;">
            <a href="/comunidad" class="btn-fede-fire">
              ⚡ Entrar al Campus Nowback Pro
            </a>
            <a href="#youtube-videos" class="btn-fede-outline" style="border-color: #ff4444; color: #fff;">
              ▶️ Ver Clases en YouTube
            </a>
            <a href="<?= get_fede_wa('Hola Fede! Quiero postularme a una Mentoría 1 a 1 de Marca Personal.') ?>" target="_blank" rel="noopener noreferrer" class="btn-fede-outline">
              🚀 Mentoría 1 a 1
            </a>
          </div>

          <!-- Métricas de Autoridad -->
          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; background: var(--fede-bg-card); border: 1px solid var(--fede-border); border-radius: var(--fede-radius-lg); padding: 18px 20px;">
            <div>
              <div style="font-family: var(--fede-font-heading); font-size: 1.6rem; font-weight: 900; color: var(--fede-fire-yellow);">+65K</div>
              <div style="font-size: 0.78rem; color: var(--fede-text-muted); text-transform: uppercase; font-weight: 700;">Comunidad en Redes</div>
            </div>
            <div>
              <div style="font-family: var(--fede-font-heading); font-size: 1.6rem; font-weight: 900; color: var(--fede-fire-yellow);">+100</div>
              <div style="font-size: 0.78rem; color: var(--fede-text-muted); text-transform: uppercase; font-weight: 700;">Alumnos & Mentorías</div>
            </div>
            <div>
              <div style="font-family: var(--fede-font-heading); font-size: 1.6rem; font-weight: 900; color: #10b981;">100%</div>
              <div style="font-size: 0.78rem; color: var(--fede-text-muted); text-transform: uppercase; font-weight: 700;">Estrategia Aplicada</div>
            </div>
          </div>

        </div>

        <!-- Foto Principal -->
        <div style="position: relative;">
          <div style="border-radius: var(--fede-radius-xl); overflow: hidden; border: 2px solid var(--fede-border-fire); box-shadow: 0 15px 40px rgba(0,0,0,0.6);">
            <img src="/assets/img/fede_nowback_hero.jpg" alt="Fede Nowback Estratega de Marca Personal" style="width: 100%; height: auto; display: block;">
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Banner Destacado de Programas -->
  <section style="background: linear-gradient(135deg, #1f0800 0%, #3a0d02 100%); border-top: 1px solid var(--fede-fire-orange); border-bottom: 1px solid var(--fede-fire-orange); padding: 24px 0;">
    <div class="fede-container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
      <div>
        <span style="background: #ff5500; color: #fff; font-size: 0.75rem; font-weight: 900; padding: 3px 8px; border-radius: 4px; text-transform: uppercase;">Acompañamiento Exclusivo</span>
        <h3 style="font-family: var(--fede-font-heading); font-size: 1.3rem; font-weight: 900; margin-top: 4px;">
          "ENCENDÉ TU FUEGO" — 3 Formas de Trabajar y Escalar Conmigo
        </h3>
      </div>
      <a href="/mentorias" class="btn-fede-fire" style="padding: 10px 24px; font-size: 0.9rem;">
        ⚡ Ver Programas & Mentorías
      </a>
    </div>
  </section>

  <!-- Diagnóstico Real: Por qué tu negocio está estancado -->
  <section class="fede-section" id="diagnostico">
    <div class="fede-container">
      <div class="fede-sec-header">
        <span class="fede-sec-tag">El Problema de Fondo</span>
        <h2 class="fede-sec-title">¿Por qué tus redes no te generan ingresos?</h2>
        <p class="fede-sec-desc">La mayoría de los emprendedores y profesionales cometen los mismos 4 errores críticos.</p>
      </div>

      <div class="fede-grid-2">
        <div class="fede-card">
          <div class="fede-card-icon">❌</div>
          <h3 class="fede-card-h3">No vendés por no tener constancia al publicar</h3>
          <p class="fede-card-p">Subir contenidos sin una frecuencia sostenida ni una dirección clara hace que tu audiencia te olvide y nunca consolides tracción.</p>
        </div>

        <div class="fede-card">
          <div class="fede-card-icon">❌</div>
          <h3 class="fede-card-h3">Miedo a filmarte y que te critiquen</h3>
          <p class="fede-card-p">El temor a encender la cámara, a que te juzguen conocidos o a exponerte frena el 90% de los proyectos antes de despegar.</p>
        </div>

        <div class="fede-card">
          <div class="fede-card-icon">❌</div>
          <h3 class="fede-card-h3">Miedo a hacer valer tu servicio o tu conocimiento</h3>
          <p class="fede-card-p">Dudar de tus precios o rebajar tus tarifas por inseguridad destruye tu rentabilidad y te posiciona como una opción genérica.</p>
        </div>

        <div class="fede-card">
          <div class="fede-card-icon">❌</div>
          <h3 class="fede-card-h3">Creer que tener seguidores es igual a ventas</h3>
          <p class="fede-card-p">No necesitás 100.000 seguidores para facturar. Más vale una comunidad comprometida y cualificada que un millón de espectadores que nunca compran nada.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Los 3 Pilares del Método Nowback -->
  <section class="fede-section" id="metodo" style="background: rgba(255,255,255,0.01);">
    <div class="fede-container">
      <div class="fede-sec-header">
        <span class="fede-sec-tag">Metodología Comprobada</span>
        <h2 class="fede-sec-title">El Método Nowback en 3 Pasos</h2>
        <p class="fede-sec-desc">Un sistema simple, directo y sin vueltas para transformar tu presencia digital en un negocio rentable.</p>
      </div>

      <div class="fede-grid-3">
        
        <div class="fede-card">
          <div class="fede-card-icon">🎯</div>
          <h3 class="fede-card-h3">1. Posicionamiento Único</h3>
          <p class="fede-card-p">
            Definición quirúrgica de tu cliente ideal, optimización de perfil comercial y creación de una oferta irresistible que te diferencie de cualquier competidor.
          </p>
        </div>

        <div class="fede-card">
          <div class="fede-card-icon">🎬</div>
          <h3 class="fede-card-h3">2. Contenido con Intención</h3>
          <p class="fede-card-p">
            Estructuras de guiones probadas para Reels y Carruseles con ganchos magnéticos que atraen clientes listos para comprar, grabando en solo 4 horas al mes.
          </p>
        </div>

        <div class="fede-card">
          <div class="fede-card-icon">⚡</div>
          <h3 class="fede-card-h3">3. Mentalidad & Conversión</h3>
          <p class="fede-card-p">
            Gestión emocional ante la frustración, disciplina en hábitos diarios y embudos directos de mensajería (DM / WhatsApp) para cerrar ventas con naturalidad.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- YouTube Video Hub: Clases & Masterclasses -->
  <section class="fede-section" id="youtube-videos">
    <div class="fede-container">
      <div class="fede-sec-header">
        <span class="fede-sec-tag" style="background: rgba(229, 9, 20, 0.15); color: #ff4d4d; border-color: rgba(229, 9, 20, 0.35);">
          ▶️ Canal Oficial de YouTube
        </span>
        <h2 class="fede-sec-title">Aprende con Fede en YouTube</h2>
        <p class="fede-sec-desc">
          Clases completas y prácticas para crear tu propio negocio desde cero, generar tus primeros USD 1.000 y comunicar con autoridad.
        </p>
      </div>

      <!-- Visor de Video Principal -->
      <div class="fede-video-player-container">
        <div class="fede-video-responsive">
          <iframe id="mainYtPlayer" src="https://www.youtube-nocookie.com/embed/NGmRSA8aWAk?rel=0&modestbranding=1" title="CÓMO CREAR MI PROPIO NEGOCIO | PASO A PASO" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>

      <!-- Playlist Interactiva de Clases -->
      <div class="fede-video-playlist">
        
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
            <img src="https://img.youtube.com/vi/CpVRIFUo-Io/hqdefault.jpg" alt="Por qué no vendés en redes sociales">
            <span class="fede-video-badge-play">▶ Estrategia</span>
          </div>
          <div class="fede-video-card-title">Por qué NO vendés en redes sociales (y cómo solucionarlo)</div>
          <span style="font-size: 0.78rem; color: #ec4899; font-weight: 700;">⚡ Ventas Reales</span>
        </div>

        <div class="fede-video-card" onclick="loadFedeVideo('AfZtMCv2IX0', this)">
          <div class="fede-video-thumb-wrap">
            <img src="https://img.youtube.com/vi/AfZtMCv2IX0/hqdefault.jpg" alt="Cómo dejar de procrastinar">
            <span class="fede-video-badge-play">▶ Acción</span>
          </div>
          <div class="fede-video-card-title">Cómo dejar de procrastinar y pasar a la acción (explicado fácil)</div>
          <span style="font-size: 0.78rem; color: var(--fede-fire-yellow); font-weight: 700;">🧠 Mentalidad</span>
        </div>

      </div>

      <!-- Botón al Canal -->
      <div style="text-align: center; margin-top: 16px;">
        <a href="https://www.youtube.com/@fedenowback6170" target="_blank" rel="noopener noreferrer" class="btn-fede-fire" style="background: linear-gradient(135deg, #e50914 0%, #b81d24 100%); border-color: #ff3333; display: inline-flex; align-items: center; gap: 8px;">
          <span>🔴</span>
          <span>Ver Más Videos en YouTube (@fedenowback6170)</span>
          <span>↗</span>
        </a>
      </div>
    </div>
  </section>

  <!-- Programas & Servicios: Mentoría 1 a 1 y Comunidad -->
  <section class="fede-section" id="mentorias">
    <div class="fede-container">
      <div class="fede-sec-header">
        <span class="fede-sec-tag">Acompañamiento</span>
        <h2 class="fede-sec-title">¿Cómo podés trabajar conmigo?</h2>
        <p class="fede-sec-desc">Dos modalidades según tu objetivo y nivel de compromiso.</p>
      </div>

      <div class="fede-grid-2">
        
        <!-- Mentoría 1 a 1 -->
        <div class="fede-card" style="border: 2px solid var(--fede-fire-yellow); box-shadow: 0 0 35px rgba(255, 183, 3, 0.15); display: flex; flex-direction: column; justify-content: space-between;">
          <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
              <span style="background: var(--fede-fire-yellow); color: #000; font-family: var(--fede-font-heading); font-weight: 900; font-size: 0.75rem; padding: 3px 12px; border-radius: 9999px; text-transform: uppercase;">
                ⭐ Máximo Rendimiento
              </span>
              <span style="font-family: var(--fede-font-heading); font-size: 1.4rem; font-weight: 900; color: var(--fede-fire-yellow);">
                U$D 390
              </span>
            </div>
            <h3 class="fede-card-h3" style="font-size: 1.4rem;">Mentoría Privada 1 a 1</h3>
            <p class="fede-card-p">
              Trabajo mano a mano conmigo para convertir lo que sabés, tu experiencia y tu historia en una marca personal que conecte, genere confianza y venda.
            </p>
            <ul style="list-style: none; margin-bottom: 24px; display: flex; flex-direction: column; gap: 10px; font-size: 0.92rem; color: var(--fede-text-sub);">
              <li><strong style="color: #10b981;">✓</strong> Sesiones semanales individuales vía Zoom</li>
              <li><strong style="color: #10b981;">✓</strong> Auditoría total de tu bio, oferta y contenidos</li>
              <li><strong style="color: #10b981;">✓</strong> Creación de tus guiones de Reels y Carruseles</li>
              <li><strong style="color: #10b981;">✓</strong> Acompañamiento continuo y feedback por WhatsApp directo</li>
            </ul>
          </div>
          <a href="<?= get_fede_wa('Hola Fede! Quiero postularme a la Mentoría 1 a 1 de Marca Personal (U$D 390).') ?>" target="_blank" rel="noopener noreferrer" class="btn-fede-fire" style="width: 100%; text-align: center;">
            💬 Postular a Mentoría 1 a 1
          </a>
        </div>

        <!-- Comunidad Oficial Fede Nowback -->
        <div class="fede-card" id="comunidad" style="display: flex; flex-direction: column; justify-content: space-between;">
          <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
              <span style="background: rgba(255,255,255,0.1); color: #fff; font-family: var(--fede-font-heading); font-weight: 800; font-size: 0.75rem; padding: 3px 12px; border-radius: 9999px; text-transform: uppercase;">
                🚀 Networking & Clases
              </span>
              <span style="font-family: var(--fede-font-heading); font-size: 1.4rem; font-weight: 900; color: #ff8c00;">
                U$D 58 <span style="font-size: 0.82rem; font-weight: normal; color: var(--fede-text-muted);">/ mes</span>
              </span>
            </div>
            <h3 class="fede-card-h3" style="font-size: 1.4rem;">Comunidad & Campus Nowback</h3>
            <p class="fede-card-p">
              El espacio para emprendedores y profesionales que buscan rodearse de personas con su misma ambición. Clases en vivo, debates y motivación diaria.
            </p>
            <ul style="list-style: none; margin-bottom: 24px; display: flex; flex-direction: column; gap: 10px; font-size: 0.92rem; color: var(--fede-text-sub);">
              <li><strong style="color: #10b981;">✓</strong> Acceso al grupo exclusivo de emprendedores</li>
              <li><strong style="color: #10b981;">✓</strong> Clases periódicas sobre marketing y mentalidad</li>
              <li><strong style="color: #10b981;">✓</strong> Desafíos semanales de grabación y exposición</li>
              <li><strong style="color: #10b981;">✓</strong> Conexiones con profesionales de diversas industrias</li>
            </ul>
          </div>
          <div>
            <a href="/comunidad" class="btn-fede-outline" style="width: 100%; text-align: center; margin-bottom: 8px;">
              ⚡ Entrar al Campus Pro
            </a>
            <a href="<?= get_fede_wa('Hola Fede! Quiero consultar sobre la Membresía del Campus Nowback (U$D 58).') ?>" target="_blank" rel="noopener noreferrer" style="font-size: 0.85rem; color: var(--fede-fire-yellow); text-decoration: none; text-align: center; display: block;">
              💬 O consultá por WhatsApp
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Filosofía: Personas Reales, Procesos Reales -->
  <section class="fede-section" style="background: rgba(255,255,255,0.015);">
    <div class="fede-container">
      <div class="fede-sec-header">
        <span class="fede-sec-tag">Nuestra Filosofía</span>
        <h2 class="fede-sec-title">Personas reales. Procesos reales. Acompañamiento real.</h2>
        <p class="fede-sec-desc">Menos fórmulas mágicas. Más acompañamiento estratégico para que pases a la acción.</p>
      </div>

      <div class="fede-grid-3">
        <div class="fede-card">
          <div class="fede-card-icon">🤝</div>
          <h3 class="fede-card-h3">Detrás de cada negocio hay una persona</h3>
          <p class="fede-card-p">No trabajo solamente el contenido. Trabajo con la persona que está detrás: su identidad, su mensaje, su comunicación, sus creencias y su capacidad de sostenerlo.</p>
        </div>

        <div class="fede-card">
          <div class="fede-card-icon">🎯</div>
          <h3 class="fede-card-h3">No necesitás ser influencer</h3>
          <p class="fede-card-p">Necesitás aprender a comunicar el valor que ya tenés. Podés tener la mejor estrategia del mundo, pero si no te animás a mostrarte y comunicarlo, nadie va a descubrir tu valor.</p>
        </div>

        <div class="fede-card">
          <div class="fede-card-icon">⚡</div>
          <h3 class="fede-card-h3">No es una fórmula, es tu proceso</h3>
          <p class="fede-card-p">No te doy una fórmula enlatada. Te acompaño a construir la tuya. Sin humo, con estrategia y acompañamiento de verdad porque tu proceso es único.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Galería de Fotos Reales (Sin marcas de agua, fotos nuevas) -->
  <section class="fede-section">
    <div class="fede-container">
      <div class="fede-sec-header">
        <span class="fede-sec-tag">En Acción</span>
        <h2 class="fede-sec-title">Fede Nowback en Acción</h2>
        <p class="fede-sec-desc">Más de 10 años creando contenidos, liderando proyectos y acompañando a referentes.</p>
      </div>

      <div class="fede-gallery" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
        <div class="fede-gallery-item">
          <img src="/assets/img/fede_nowback_hero.jpg" alt="Fede Nowback Estrategia de Marca Personal">
          <div class="fede-gallery-info">
            <strong style="color: #fff;">Fede Nowback</strong>
            <span style="font-size: 0.8rem; color: var(--fede-fire-yellow);">Estrategia de Marca Personal</span>
          </div>
        </div>

        <div class="fede-gallery-item">
          <img src="/assets/img/fede_nowback_street.jpg" alt="Fede Nowback en la ciudad">
          <div class="fede-gallery-info">
            <strong style="color: #fff;">Producción & Eventos</strong>
            <span style="font-size: 0.8rem; color: var(--fede-fire-yellow);">+10 Años en Medios & Comunicación</span>
          </div>
        </div>

        <div class="fede-gallery-item">
          <img src="/assets/img/fede_nowback_mentor.jpg" alt="Fede Nowback Mentoría y Negocios">
          <div class="fede-gallery-info">
            <strong style="color: #fff;">Mentoría 1 a 1</strong>
            <span style="font-size: 0.8rem; color: var(--fede-fire-yellow);">Acompañamiento Estratégico</span>
          </div>
        </div>

        <div class="fede-gallery-item">
          <img src="/assets/img/evento_encende_tu_fuego.jpg" alt="Flyer Evento Encendé tu Fuego">
          <div class="fede-gallery-info">
            <strong style="color: #fff;">Evento Presencial</strong>
            <span style="font-size: 0.8rem; color: var(--fede-fire-yellow);">12 de Septiembre en CABA</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sobre Fede Historia & Recorrido Real -->
  <section class="fede-section" id="sobre-fede" style="background: rgba(255,255,255,0.01);">
    <div class="fede-container">
      <div style="background: var(--fede-bg-card); border: 1px solid var(--fede-border); border-radius: var(--fede-radius-xl); padding: 40px; display: grid; grid-template-columns: 0.85fr 1.15fr; gap: 36px; align-items: center;">
        <div style="border-radius: var(--fede-radius-lg); overflow: hidden; border: 1px solid var(--fede-border-fire);">
          <img src="/assets/img/fede_nowback_street.jpg" alt="Fede Nowback Historia y Trayectoria" style="width: 100%; height: auto; display: block;">
        </div>
        <div>
          <span class="fede-sec-tag">Mi Recorrido</span>
          <h2 class="fede-sec-title" style="text-align: left; margin-bottom: 16px;">
            "Empecé de cero. Literalmente."
          </h2>
          <p style="color: var(--fede-text-sub); margin-bottom: 14px; line-height: 1.6;">
            Mis primeros pasos fueron como <strong>filmmaker para bandas de rock</strong>, cámara en mano, aprendiendo haciendo y sin imaginar hasta dónde me iba a llevar ese camino.
          </p>
          <p style="color: var(--fede-text-sub); margin-bottom: 14px; line-height: 1.6;">
            Con el tiempo formé mi propia agencia: pasé de trabajar solo a liderar un equipo de 9 personas y gestionar más de 35 clientes. Ese recorrido me llevó al mundo de la producción y a trabajar como <strong>productor de Maxi Leguízamo</strong>, creando eventos que llegaron a convocar hasta <strong>25.000 personas</strong> y proyectos con presencia en medios como <em>Canal 13, A24, Canal 9, Infobae y Perfil</em>.
          </p>
          <p style="color: var(--fede-text-sub); margin-bottom: 18px; line-height: 1.6;">
            Durante más de 10 años tuve que aprender a vender, comunicar, liderar equipos, negociar y reinventarme. <strong>Hoy no enseño desde un manual: enseño desde la experiencia</strong> para que conviertas lo que sabés en una marca personal que conecte y venda.
          </p>
          <div class="fede-quote">
            "Antes ayudaba a construir grandes proyectos detrás de escena. Hoy uso todo lo que aprendí para ayudarte a construir el tuyo."
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="fede-section" id="faq">
    <div class="fede-container">
      <div class="fede-sec-header">
        <span class="fede-sec-tag">Respuestas Claras</span>
        <h2 class="fede-sec-title">Preguntas Frecuentes</h2>
      </div>

      <div style="max-width: 760px; margin: 0 auto; display: flex; flex-direction: column; gap: 14px;">
        <div style="background: var(--fede-bg-card); border: 1px solid var(--fede-border); border-radius: var(--fede-radius-md); padding: 20px;">
          <h4 style="font-family: var(--fede-font-heading); font-weight: 800; margin-bottom: 8px; color: #fff;">¿Necesito tener muchos seguidores para vender?</h4>
          <p style="color: var(--fede-text-muted); font-size: 0.94rem;">No. El foco está en atraer a las personas correctas que valoran tu trabajo y pueden pagarlo, no en sumar números vacíos.</p>
        </div>

        <div style="background: var(--fede-bg-card); border: 1px solid var(--fede-border); border-radius: var(--fede-radius-md); padding: 20px;">
          <h4 style="font-family: var(--fede-font-heading); font-weight: 800; margin-bottom: 8px; color: #fff;">¿Qué pasa si me da vergüenza la cámara?</h4>
          <p style="color: var(--fede-text-muted); font-size: 0.94rem;">En la mentoría trabajamos con una metodología progresiva y plantillas de guiones que eliminan la improvisación para que hables con total seguridad en pocos días.</p>
        </div>

        <div style="background: var(--fede-bg-card); border: 1px solid var(--fede-border); border-radius: var(--fede-radius-md); padding: 20px;">
          <h4 style="font-family: var(--fede-font-heading); font-weight: 800; margin-bottom: 8px; color: #fff;">¿Cómo me contacto con Fede?</h4>
          <p style="color: var(--fede-text-muted); font-size: 0.94rem;">Podés escribir directo a su WhatsApp oficial al <strong>+54 9 11 3820-5570</strong> y coordinar tu sesión o despejar dudas.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Banner Final -->
  <section class="fede-section" style="padding-top: 0;">
    <div class="fede-container">
      <div style="background: linear-gradient(135deg, #180800 0%, #2b0c03 100%); border: 2px solid var(--fede-fire-orange); border-radius: var(--fede-radius-xl); padding: 48px 30px; text-align: center;">
        <h2 style="font-family: var(--fede-font-heading); font-size: clamp(1.8rem, 4vw, 2.6rem); font-weight: 900; text-transform: uppercase; margin-bottom: 12px;">
          ¿Listo para transformar tu marca personal?
        </h2>
        <p style="color: var(--fede-text-sub); font-size: 1.05rem; max-width: 580px; margin: 0 auto 28px;">
          Escribime por WhatsApp y armemos juntos la estrategia para que dejes de postergar y empieces a facturar.
        </p>
        <a href="<?= get_fede_wa('Hola Fede! Quiero iniciar mi proceso de transformación de Marca Personal.') ?>" target="_blank" rel="noopener noreferrer" class="btn-fede-fire">
          💬 Hablar con Fede por WhatsApp
        </a>
      </div>
    </div>
  </section>

  <!-- Footer con Interlinking -->
  <footer class="fede-hub-footer">
    <div class="fede-container">
      <div class="fede-footer-grid">
        <div class="fede-footer-col">
          <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
            <span class="fede-brand-badge">NOWBACK</span>
            <span class="fede-brand-name">FEDE NOWBACK</span>
          </div>
          <p style="color: var(--fede-text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 16px;">
            Estrategia de Marca Personal, Mentalidad y Negocios Digitales.
          </p>
          <p style="color: var(--fede-text-sub); font-size: 0.88rem;">
            📱 <strong>WhatsApp Oficial:</strong> <a href="<?= get_fede_wa() ?>" target="_blank" rel="noopener noreferrer" style="color: var(--fede-fire-yellow); text-decoration: none;">+54 9 11 3820-5570</a>
          </p>
        </div>

        <div class="fede-footer-col">
          <h4>Páginas & Contenido</h4>
          <ul class="fede-footer-links">
            <li><a href="/">🏠 Inicio</a></li>
            <li><a href="/fede-nowback-especialista-filmmaker">🎬 Mi Recorrido & Trayectoria</a></li>
            <li><a href="/metodologia-marca-personal">⚡ Metodología de 4 Fases</a></li>
            <li><a href="/clases-gratuitas-marca-personal">▶️ Clases en YouTube</a></li>
            <li><a href="/mentorias">🎯 Mentorías 1 a 1</a></li>
            <li><a href="/comunidad">⚡ Campus & Comunidad Nowback</a></li>
          </ul>
        </div>

        <div class="fede-footer-col">
          <h4>Canales Oficiales</h4>
          <ul class="fede-footer-links">
            <li><a href="https://www.youtube.com/@fedenowback6170" target="_blank" rel="noopener noreferrer">🔴 YouTube (@fedenowback6170)</a></li>
            <li><a href="https://www.instagram.com/fedenowback/" target="_blank" rel="noopener noreferrer">📸 Instagram (@fedenowback)</a></li>
            <li><a href="https://www.tiktok.com/@fedenowback" target="_blank" rel="noopener noreferrer">🎬 TikTok (@fedenowback)</a></li>
            <li><a href="https://www.threads.com/@fedenowback" target="_blank" rel="noopener noreferrer">🧵 Threads (@fedenowback)</a></li>
            <li><a href="<?= get_fede_wa() ?>" target="_blank" rel="noopener noreferrer">💬 Chat Directo WhatsApp</a></li>
          </ul>
        </div>
      </div>

      <div class="fede-footer-bottom">
        <p>&copy; <?= date('Y') ?> <strong>Fede Nowback</strong>. Todos los derechos reservados.</p>
      </div>
    </div>
  </footer>

  <!-- WhatsApp Flotante -->
  <a href="<?= get_fede_wa() ?>" target="_blank" rel="noopener noreferrer" class="fede-floating-wa" aria-label="WhatsApp Fede Nowback">
    <span style="font-size: 1.25rem;">💬</span>
    <span>WhatsApp</span>
  </a>

  <!-- Script para el Visor Interactivo de YouTube -->
  <script>
    function loadFedeVideo(videoId, cardEl) {
      var player = document.getElementById('mainYtPlayer');
      if (player) {
        player.src = 'https://www.youtube-nocookie.com/embed/' + videoId + '?autoplay=1&rel=0&modestbranding=1';
      }
      document.querySelectorAll('.fede-video-card').forEach(function(c) {
        c.classList.remove('active');
      });
      if (cardEl) {
        cardEl.classList.add('active');
      }
    }
  </script>

</body>
</html>
