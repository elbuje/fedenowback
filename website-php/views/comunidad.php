<?php
/**
 * CAMPUS FEDE NOWBACK PRO — Vista Principal de Comunidad & Academia
 * Fede Nowback | Plataforma Propia en Modo Día
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/community_store.php';

$user = &$_SESSION['fede_user'];
$data = fede_load_community_data();
$page_title = "Campus Fede Nowback Pro | Comunidad Oficial & Academia — Fede Nowback";
$page_desc = "Campus privado de alto rendimiento para creadores y emprendedores. Cursos de marca personal, mentorías grupales en vivo, debates y ranking.";
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?= htmlspecialchars(fede_csrf_token()) ?>">
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta name="robots" content="noindex, nofollow">
  <!-- Open Graph / WhatsApp Preview -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_AR">
  <meta property="og:site_name" content="Campus Fede Nowback Pro">
  <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta property="og:url" content="https://fedenowback.com.ar/comunidad">
  <meta property="og:image" content="https://fedenowback.com.ar/assets/img/fede_nowback_hero.jpg?v=3">
  <meta property="og:image:secure_url" content="https://fedenowback.com.ar/assets/img/fede_nowback_hero.jpg?v=3">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="682">
  <meta property="og:image:height" content="1024">
  <meta property="og:image:alt" content="Campus Fede Nowback Pro">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta name="twitter:image" content="https://fedenowback.com.ar/assets/img/fede_nowback_hero.jpg?v=3">

  <!-- Google Fonts: Montserrat (Titulares con pegada) + Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

  <!-- CSS Custom Campus Fede Nowback Pro -->
  <link rel="stylesheet" href="/assets/css/campus.css?v=2.1">
</head>
<body>

  <!-- Top Sticky Header -->
  <header class="campus-header">
    <div class="campus-container">
      <div class="campus-header-wrap">
        
        <!-- Brand Area -->
        <a href="/comunidad" class="campus-brand-area">
          <div class="campus-logo-badge">🔥</div>
          <div class="campus-brand-titles">
            <span class="campus-brand-main">CAMPUS NOWBACK <span style="font-size: 0.72rem; background: var(--c-fire-light); color: var(--c-fire-primary); padding: 2px 6px; border-radius: 4px; font-weight: 800;">PRO</span></span>
            <span class="campus-brand-sub">Por Fede Nowback • <?= count($data['members']) + 338 ?> Miembros</span>
          </div>
        </a>

        <!-- Search Bar -->
        <div class="campus-search-box">
          <span class="campus-search-icon">🔍</span>
          <input type="text" class="campus-search-input" placeholder="Buscar debates, clases, miembros...">
        </div>

        <!-- Right User & Role Actions -->
        <div class="campus-header-actions">
          
          <!-- 1-Click Role Switcher -->
          <button id="btnRoleSwitch" class="campus-role-switcher" data-current-role="<?= htmlspecialchars($user['role']) ?>" title="Alternar entre Administrador y Alumno">
            <span>⚡ <strong><?= $user['role'] === 'admin' ? '👑 Admin' : '👤 Alumno' ?></strong></span>
          </button>

          <!-- Login Modal Trigger -->
          <button id="btnOpenLoginModal" class="btn-reaction" style="font-size: 0.78rem; font-weight: 700; background: #fff; padding: 5px 10px;" onclick="document.getElementById('modalLogin').style.display='block';">
            🔐 <?= !empty($user['is_logged_in']) && $user['role'] === 'admin' ? 'Admin' : 'Ingresar' ?>
          </button>

          <!-- Points / Fuego Display -->
          <div id="userPointsDisplay" class="campus-points-pill">
            🔥 <?= $user['points'] ?> <span class="points-word">Fuego</span>
          </div>

          <!-- User Avatar -->
          <img src="<?= htmlspecialchars($user['avatar']) ?>" alt="<?= htmlspecialchars($user['name']) ?>" class="campus-user-avatar" title="<?= htmlspecialchars($user['name']) ?> (<?= htmlspecialchars($user['level_name']) ?>)">

          <!-- High Visibility Website Button -->
          <a href="/" class="campus-btn-website" title="Ir al Sitio Web Oficial de Fede Nowback">
            <span>🌐</span>
            <span>Sitio Web ↗</span>
          </a>
        </div>

      </div>
    </div>
  </header>

  <!-- Navigation Tabs Bar -->
  <nav class="campus-nav-bar">
    <div class="campus-container">
      <ul class="campus-nav-list">
        <li><a class="campus-nav-item active" data-tab="community">💬 Muro</a></li>
        <li><a class="campus-nav-item" data-tab="classroom">🎓 Academia</a></li>
        <li><a class="campus-nav-item" data-tab="calendar">📅 Meets en Vivo</a></li>
        <li><a class="campus-nav-item" data-tab="chat">💬 Chat</a></li>
        <li><a class="campus-nav-item" data-tab="leaderboard">🏆 Ranking</a></li>
        <li><a class="campus-nav-item" data-tab="members">👥 Miembros</a></li>
        <li><a class="campus-nav-item" data-tab="about">ℹ️ Acerca</a></li>
        <li style="margin-left: auto;"><a href="/" class="campus-nav-item" style="color: #0284c7; font-weight: 800; border: 1px solid rgba(2, 132, 199, 0.3); background: rgba(2, 132, 199, 0.08); border-radius: var(--c-radius-full); padding: 6px 14px; font-size: 0.85rem;">🌐 Ir al Sitio Web ↗</a></li>
      </ul>
    </div>
  </nav>

  <!-- Main Content Layout -->
  <main class="campus-main">
    <div class="campus-container">

      <!-- TAB 1: COMUNIDAD (FEED) -->
      <section id="tab-community" class="campus-tab-pane">
        <div class="campus-layout-2col">
          
          <!-- Columna Izquierda: Publicador + Posts -->
          <div>
            
            <!-- Category Filter Pills -->
            <div class="campus-filter-pills">
              <?php foreach ($data['categories'] as $cat): ?>
                <button class="filter-pill <?= $cat['id'] === 'todos' ? 'active' : '' ?>" data-category="<?= htmlspecialchars($cat['id']) ?>">
                  <?= $cat['icon'] ?> <?= htmlspecialchars($cat['name']) ?>
                </button>
              <?php endforeach; ?>
            </div>

            <!-- Post Creator Box -->
            <div class="campus-creator-card">
              <form id="formCreatePost">
                <div class="creator-top-row">
                  <img src="<?= htmlspecialchars($user['avatar']) ?>" alt="Avatar" class="creator-avatar">
                  <div class="creator-inputs">
                    <input type="text" id="postTitleInput" class="creator-title-input" placeholder="Título de tu aporte, pregunta o victoria..." required>
                    <textarea id="postBodyInput" class="creator-body-input" placeholder="Escribí acá tu mensaje. Compartí contexto, aprendizajes o dudas para que la comunidad y Fede te respondan..." required></textarea>
                  </div>
                </div>
                <div class="creator-bottom-row">
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <label for="postCategorySelect" style="font-size: 0.8rem; font-weight: 700; color: var(--c-text-muted);">Canal:</label>
                    <select id="postCategorySelect" class="creator-category-select">
                      <option value="general">💬 Debate General</option>
                      <option value="victorias">🏆 Victorias & Facturación</option>
                      <option value="feedback">🎯 Feedback de Contenido</option>
                      <option value="preguntas">💡 Preguntas al Mentor</option>
                      <option value="recursos">📂 Plantillas & Recursos</option>
                      <?php if ($user['role'] === 'admin'): ?>
                        <option value="comunicados">📢 Comunicados de Fede (Solo Host)</option>
                      <?php endif; ?>
                    </select>
                  </div>
                  <button type="submit" class="btn-post-submit">🔥 Publicar en el Muro</button>
                </div>
              </form>
            </div>

            <!-- Posts Stream Feed -->
            <div id="postsFeedContainer">
              <?php foreach ($data['posts'] as $post): ?>
                <article class="post-card <?= !empty($post['pinned']) ? 'pinned' : '' ?>" data-category="<?= htmlspecialchars($post['category']) ?>">
                  
                  <!-- Post Header -->
                  <div class="post-header">
                    <div class="post-author">
                      <img src="<?= htmlspecialchars($post['author']['avatar']) ?>" alt="<?= htmlspecialchars($post['author']['name']) ?>" class="post-author-img">
                      <div>
                        <div class="post-author-name">
                          <?= htmlspecialchars($post['author']['name']) ?>
                          <?php if (!empty($post['author']['is_host'])): ?>
                            <span style="font-size: 0.72rem; background: var(--c-fire-gradient); color: #fff; padding: 2px 7px; border-radius: 4px; font-weight: 800;">👑 HOST</span>
                          <?php else: ?>
                            <span style="font-size: 0.72rem; background: var(--c-bg-subtle); color: var(--c-text-muted); padding: 2px 7px; border-radius: 4px; font-weight: 700;"><?= htmlspecialchars($post['author']['badge'] ?? 'Rango') ?></span>
                          <?php endif; ?>
                        </div>
                        <div class="post-author-role"><?= htmlspecialchars($post['created_at']) ?> • en <span style="color: var(--c-fire-primary); font-weight: 700;">#<?= htmlspecialchars($post['category']) ?></span></div>
                      </div>
                    </div>

                    <?php if (!empty($post['pinned'])): ?>
                      <span class="post-tag" style="background: rgba(255, 85, 0, 0.1); color: var(--c-fire-primary);">📌 FIJADO</span>
                    <?php endif; ?>
                  </div>

                  <!-- Post Body -->
                  <h3 class="post-title"><?= htmlspecialchars($post['title']) ?></h3>
                  <div class="post-content"><?= nl2br(htmlspecialchars($post['content'])) ?></div>

                  <!-- Post Footer & Actions -->
                  <div class="post-footer">
                    <?php 
                      $is_liked = in_array($user['id'], $post['liked_by'] ?? []);
                    ?>
                    <button class="btn-reaction <?= $is_liked ? 'reacted' : '' ?>" data-post-id="<?= htmlspecialchars($post['id']) ?>">
                      <span>🔥 Fuego</span>
                      <span class="reaction-count"><?= (int)$post['likes'] ?></span>
                    </button>

                    <button class="btn-comments-toggle" data-post-id="<?= htmlspecialchars($post['id']) ?>">
                      💬 <span><?= count($post['comments'] ?? []) ?> Comentarios</span>
                    </button>
                  </div>

                  <!-- Comments Thread Drawer -->
                  <div id="comments-<?= htmlspecialchars($post['id']) ?>" class="comments-thread" style="display: none;">
                    <div id="comments-list-<?= htmlspecialchars($post['id']) ?>" style="display: flex; flex-direction: column; gap: 8px;">
                      <?php foreach ($post['comments'] as $comm): ?>
                        <div class="comment-item">
                          <img src="<?= htmlspecialchars($comm['author']['avatar']) ?>" alt="Avatar" class="comment-avatar">
                          <div class="comment-body">
                            <div class="comment-author-name"><?= htmlspecialchars($comm['author']['name']) ?> <span style="font-size: 0.72rem; color: var(--c-text-muted); font-weight: 500;">• <?= htmlspecialchars($comm['created_at']) ?></span></div>
                            <div class="comment-text"><?= nl2br(htmlspecialchars($comm['content'])) ?></div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>

                    <!-- Add Comment Input -->
                    <form class="form-add-comment comment-input-row" data-post-id="<?= htmlspecialchars($post['id']) ?>">
                      <input type="text" class="comment-input" placeholder="Escribir una respuesta..." required>
                      <button type="submit" class="btn-comment-send">Responder</button>
                    </form>
                  </div>

                </article>
              <?php endforeach; ?>
            </div>

          </div>

          <!-- Columna Derecha: Widgets & Próximo Meet -->
          <aside>
            
            <!-- Widget Próximo Meet -->
            <?php $next_meet = $data['meets'][0] ?? null; ?>
            <?php if ($next_meet): ?>
              <div class="sidebar-widget">
                <div class="widget-title">🔥 Próxima Sesión en Vivo</div>
                <div class="meet-next-card">
                  <span class="meet-badge-live">🔴 EN DIRECTO ESTA SEMANA</span>
                  <div class="meet-next-title"><?= htmlspecialchars($next_meet['title']) ?></div>
                  <div class="meet-next-date">📅 <?= htmlspecialchars($next_meet['date']) ?><br>⏰ <?= htmlspecialchars($next_meet['time']) ?></div>
                  <a href="<?= htmlspecialchars($next_meet['zoom_url']) ?>" target="_blank" rel="noopener noreferrer" class="btn-join-meet">
                    🚀 Unirse al Meet (Zoom)
                  </a>
                </div>
              </div>
            <?php endif; ?>

            <!-- Mini Leaderboard Widget -->
            <div class="sidebar-widget">
              <div class="widget-title">🏆 Top Creadores de la Semana</div>
              <div style="display: flex; flex-direction: column; gap: 10px;">
                <?php foreach (array_slice($data['leaderboard'], 0, 4) as $item): ?>
                  <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                      <span style="font-family: var(--c-font-head); font-weight: 900; font-size: 0.85rem; color: var(--c-fire-primary);">#<?= $item['rank'] ?></span>
                      <img src="<?= htmlspecialchars($item['avatar']) ?>" alt="Avatar" style="width: 28px; height: 28px; border-radius: 50%;">
                      <span style="font-size: 0.85rem; font-weight: 700; color: var(--c-text-main);"><?= htmlspecialchars($item['name']) ?></span>
                    </div>
                    <span style="font-size: 0.8rem; font-weight: 800; color: var(--c-text-muted);">🔥 <?= $item['points'] ?></span>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- Reglas Rápidas del Campus -->
            <div class="sidebar-widget">
              <div class="widget-title">📜 Reglas de la Comunidad</div>
              <ul style="font-size: 0.84rem; color: var(--c-text-sub); list-style: none; display: flex; flex-direction: column; gap: 8px;">
                <li>🔥 <strong>1. Cero ego:</strong> Todos empezamos desde cero. Ayudá y dejate ayudar.</li>
                <li>🚀 <strong>2. Aporte de valor:</strong> Comparte aprendizajes reales y números transparentes.</li>
                <li>🎯 <strong>3. Acción masiva:</strong> Cada clase vista debe tener una acción ejecutada.</li>
              </ul>
            </div>

          </aside>

        </div>
      </section>

      <!-- TAB 2: CLASSROOM / ACADEMIA -->
      <section id="tab-classroom" class="campus-tab-pane" style="display: none;">
        
        <!-- Vista Catálogo de Cursos -->
        <div id="coursesCatalogView">
          <div style="margin-bottom: 28px;">
            <h2 style="font-family: var(--c-font-head); font-size: 1.6rem; font-weight: 900; margin-bottom: 6px;">🎓 Academia de Cursos & Masterclasses</h2>
            <p style="color: var(--c-text-muted); font-size: 0.95rem;">Contenido estructurado paso a paso para dominar tu marca personal y tus ventas digitales.</p>
          </div>

          <div class="courses-grid">
            <?php foreach ($data['courses'] as $course): ?>
              <?php 
                $is_unlocked = ($user['level'] >= $course['level_required']) || ($user['role'] === 'admin');
              ?>
              <div class="course-card" data-course-id="<?= htmlspecialchars($course['id']) ?>" style="cursor: pointer;">
                <div class="course-thumb-box">
                  <img src="<?= htmlspecialchars($course['thumbnail']) ?>" alt="<?= htmlspecialchars($course['title']) ?>" class="course-thumb-img">
                  <span class="course-level-badge">
                    <?= $is_unlocked ? '🔓 Desbloqueado' : '🔒 Requiere ' . htmlspecialchars($course['level_name']) ?>
                  </span>
                </div>
                <div class="course-card-body">
                  <h3 class="course-title"><?= htmlspecialchars($course['title']) ?></h3>
                  <p class="course-desc"><?= htmlspecialchars($course['description']) ?></p>
                  
                  <div class="course-progress-bar">
                    <div class="course-progress-fill" style="width: <?= $is_unlocked ? '45%' : '0%' ?>;"></div>
                  </div>

                  <div class="course-meta-row">
                    <span>⏱️ <?= htmlspecialchars($course['duration']) ?></span>
                    <span>📚 <?= (int)$course['total_lessons'] ?> Clases</span>
                    <span style="color: var(--c-fire-primary); font-weight: 800;">Ver Curso →</span>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Vista Reproductor Interactivo de Clase -->
        <div id="coursePlayerView" style="display: none;">
          <div style="margin-bottom: 18px;">
            <button id="btnBackToCourses" class="btn-reaction" style="font-size: 0.85rem;">
              ← Volver al Catálogo de Cursos
            </button>
          </div>

          <div class="lesson-player-container">
            
            <!-- Video & Detalles de Lección -->
            <div>
              <div class="video-frame-box">
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Reproductor de Clase" allowfullscreen></iframe>
              </div>

              <div class="lesson-details-card">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                  <h2 style="font-family: var(--c-font-head); font-size: 1.3rem; font-weight: 900;">
                    1.1 La Regla de Oro: Por qué la viralidad sin oferta es una trampa
                  </h2>
                  <button id="btnToggleCompleteLesson" class="btn-complete-lesson" data-lesson-id="lesson_1_1">
                    ⭕ Marcar como Completada (+20 Fuego)
                  </button>
                </div>

                <p style="color: var(--c-text-sub); line-height: 1.6; margin-bottom: 20px;">
                  En esta lección fundamental desarmamos el mito de que necesitás miles de seguidores para facturar. Vas a aprender a definir tu propuesta de alto valor y crear un filtro que atraiga clientes calificados con capacidad de pago.
                </p>

                <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 0.95rem; margin-bottom: 10px;">📋 Plan de Acción de la Clase:</h4>
                <ul style="font-size: 0.9rem; color: var(--c-text-sub); margin-left: 20px; line-height: 1.6; margin-bottom: 20px;">
                  <li>Definir en 1 sola oración a quién ayudás y cuál es el resultado medible que prometés.</li>
                  <li>Eliminar enlaces genéricos de tu biografía y colocar un llamado claro al DM o WhatsApp.</li>
                </ul>

                <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 0.95rem; margin-bottom: 10px;">📂 Recursos Descargables:</h4>
                <div style="display: flex; gap: 10px;">
                  <a href="#" class="btn-reaction" style="text-decoration: none;">📄 Guía de Nicho High-Ticket (PDF)</a>
                  <a href="#" class="btn-reaction" style="text-decoration: none;">📊 Plantilla Notion de Posicionamiento</a>
                </div>
              </div>
            </div>

            <!-- Curriculum Lateral -->
            <div class="curriculum-sidebar">
              <h3 style="font-family: var(--c-font-head); font-size: 1.05rem; font-weight: 900; margin-bottom: 14px;">Módulos del Curso</h3>
              
              <div class="module-title-h4">Módulo 1: Fundamentos de Autoridad</div>
              <div class="lesson-list-item active">
                <span>▶️ 1.1 La Regla de Oro</span>
                <span>18:45</span>
              </div>
              <div class="lesson-list-item">
                <span>▶️ 1.2 Perfil de Instagram</span>
                <span>24:10</span>
              </div>
              <div class="lesson-list-item">
                <span>▶️ 1.3 Oferta Irresistible</span>
                <span>32:00</span>
              </div>

              <div class="module-title-h4">Módulo 2: Fábrica de Contenidos</div>
              <div class="lesson-list-item">
                <span>▶️ 2.1 5 Ganchos Psicológicos</span>
                <span>22:15</span>
              </div>
              <div class="lesson-list-item">
                <span>▶️ 2.2 Guion de Reels en 3 partes</span>
                <span>28:50</span>
              </div>
            </div>

          </div>
        </div>

      </section>

      <!-- TAB 3: CALENDARIO / MEETS -->
      <section id="tab-calendar" class="campus-tab-pane" style="display: none;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
          <div>
            <h2 style="font-family: var(--c-font-head); font-size: 1.6rem; font-weight: 900; margin-bottom: 6px;">📅 Sesiones en Vivo & Hot Seats con Fede</h2>
            <p style="color: var(--c-text-muted); font-size: 0.95rem;">Mentorías grupales semanales, talleres prácticos de contenido y auditorías en tiempo real.</p>
          </div>
          <?php if ($user['role'] === 'admin'): ?>
            <button class="btn-post-submit" onclick="document.getElementById('modalNewMeet').style.display='block';">
              ➕ Programar Nuevo Meet (Host)
            </button>
          <?php endif; ?>
        </div>

        <div class="meets-list">
          <?php foreach ($data['meets'] as $meet): ?>
            <div class="meet-card-full">
              <div class="meet-date-block">
                <div class="meet-month"><?= explode(' ', $meet['date'])[0] ?? 'SEP' ?></div>
                <div class="meet-day"><?= preg_replace('/[^0-9]/', '', $meet['date']) ?: '18' ?></div>
              </div>

              <div class="meet-info">
                <h3 class="meet-title-h3"><?= htmlspecialchars($meet['title']) ?></h3>
                <div class="meet-desc"><?= htmlspecialchars($meet['description']) ?></div>
                <div style="font-size: 0.85rem; color: var(--c-text-sub); font-weight: 600;">
                  ⏰ <strong>Horario:</strong> <?= htmlspecialchars($meet['time']) ?> • 💻 <strong>Plataforma:</strong> <?= htmlspecialchars($meet['platform']) ?>
                </div>
              </div>

              <div class="meet-actions">
                <a href="<?= htmlspecialchars($meet['zoom_url']) ?>" target="_blank" rel="noopener noreferrer" class="btn-join-meet" style="padding: 10px 22px;">
                  🚀 Entrar a la Sala
                </a>
                <a href="<?= htmlspecialchars($meet['google_cal_url'] ?? '#') ?>" target="_blank" rel="noopener noreferrer" class="btn-reaction" style="text-decoration: none; padding: 10px 18px;">
                  📅 Google Cal
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Modal Admin Programar Meet -->
        <?php if ($user['role'] === 'admin'): ?>
          <div id="modalNewMeet" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 2000; padding: 20px;">
            <div style="max-width: 500px; margin: 60px auto; background: #fff; padding: 24px; border-radius: var(--c-radius-lg); box-shadow: var(--c-shadow-lg);">
              <h3 style="font-family: var(--c-font-head); font-weight: 800; margin-bottom: 16px;">Programar Nueva Sesión en Vivo</h3>
              <form id="formCreateMeet">
                <div style="margin-bottom: 12px;">
                  <label style="font-size: 0.82rem; font-weight: 700;">Título del Meet:</label>
                  <input type="text" id="meetTitleInput" class="creator-title-input" placeholder="Ej: Taller de Reels de Cierre" required>
                </div>
                <div style="margin-bottom: 12px;">
                  <label style="font-size: 0.82rem; font-weight: 700;">Fecha:</label>
                  <input type="text" id="meetDateInput" class="creator-title-input" placeholder="Ej: Viernes 25 de Septiembre, 2026" required>
                </div>
                <div style="margin-bottom: 12px;">
                  <label style="font-size: 0.82rem; font-weight: 700;">Horario:</label>
                  <input type="text" id="meetTimeInput" class="creator-title-input" placeholder="Ej: 19:00 hs (Buenos Aires)">
                </div>
                <div style="margin-bottom: 16px;">
                  <label style="font-size: 0.82rem; font-weight: 700;">Enlace Zoom / Meet:</label>
                  <input type="url" id="meetZoomInput" class="creator-title-input" placeholder="https://zoom.us/j/12345678">
                </div>
                <div style="display: flex; justify-content: flex-end; gap: 10px;">
                  <button type="button" class="btn-reaction" onclick="document.getElementById('modalNewMeet').style.display='none';">Cancelar</button>
                  <button type="submit" class="btn-post-submit">Publicar Meet</button>
                </div>
              </form>
            </div>
          </div>
        <?php endif; ?>

      </section>

      <!-- TAB 4: CHAT EN TIEMPO REAL -->
      <section id="tab-chat" class="campus-tab-pane" style="display: none;">
        <div class="chat-container-layout">
          
          <!-- Canales de Chat -->
          <div class="chat-rooms-list">
            <h4 style="font-family: var(--c-font-head); font-size: 0.82rem; text-transform: uppercase; color: var(--c-text-muted); margin-bottom: 12px;">Salas de Chat</h4>
            <div class="chat-room-item active">💬 #sala-general</div>
            <div class="chat-room-item">🏆 #victorias-y-cierres</div>
            <div class="chat-room-item">🎯 #feedback-en-vivo</div>
            <div class="chat-room-item">💡 #dudas-de-alumnos</div>
          </div>

          <!-- Mensajes y Entrada -->
          <div class="chat-main-area">
            <div id="chatMessagesScroll" class="chat-messages-scroll">
              <?php foreach ($data['chat_messages'] as $msg): ?>
                <div class="chat-bubble-row">
                  <img src="<?= htmlspecialchars($msg['avatar']) ?>" alt="<?= htmlspecialchars($msg['author']) ?>" class="comment-avatar">
                  <div class="chat-bubble-content <?= !empty($msg['is_host']) ? 'host-msg' : '' ?>">
                    <div style="font-size: 0.78rem; font-weight: 700; color: var(--c-text-muted); margin-bottom: 2px;">
                      <?= htmlspecialchars($msg['author']) ?> • <?= htmlspecialchars($msg['time']) ?>
                      <?php if (!empty($msg['is_host'])): ?>
                        <span style="font-size: 0.68rem; background: var(--c-fire-primary); color: #fff; padding: 1px 4px; border-radius: 3px;">HOST</span>
                      <?php endif; ?>
                    </div>
                    <div style="font-size: 0.9rem; color: var(--c-text-main);"><?= htmlspecialchars($msg['content']) ?></div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

            <!-- Chat Input Bar -->
            <form id="formSendChat" class="chat-input-bar">
              <input type="text" id="chatTextInput" class="chat-text-input" placeholder="Escribir un mensaje en #sala-general..." required>
              <button type="submit" class="btn-post-submit">Enviar</button>
            </form>
          </div>

        </div>
      </section>

      <!-- TAB 5: LEADERBOARD / GAMIFICACIÓN -->
      <section id="tab-leaderboard" class="campus-tab-pane" style="display: none;">
        <div style="max-width: 840px; margin: 0 auto;">
          
          <div style="text-align: center; margin-bottom: 32px;">
            <span style="font-size: 0.8rem; font-weight: 800; text-transform: uppercase; color: var(--c-fire-primary); letter-spacing: 0.05em;">SISTEMA DE GAMIFICACIÓN</span>
            <h2 style="font-family: var(--c-font-head); font-size: 1.8rem; font-weight: 900; margin-top: 4px;">🏆 Ranking de Fuego & Niveles de Creadores</h2>
            <p style="color: var(--c-text-muted); font-size: 0.95rem; max-width: 600px; margin: 8px auto 0;">
              Ganá <strong>Fuego (Puntos)</strong> cada vez que publicás aportes, recibís likes de la comunidad y completás lecciones en la Academia para desbloquear mentorías VIP.
            </p>
          </div>

          <table class="leaderboard-table">
            <thead>
              <tr>
                <th style="width: 70px;">Posición</th>
                <th>Miembro</th>
                <th>Rango / Nivel</th>
                <th>Fuego Acumulado</th>
                <th>Recompensa Desbloqueada</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data['leaderboard'] as $row): ?>
                <tr class="<?= !empty($row['is_current_user']) ? 'current-user-row' : '' ?>">
                  <td>
                    <div class="rank-badge rank-<?= $row['rank'] ?>">
                      <?= $row['rank'] <= 3 ? ($row['rank'] === 1 ? '🥇' : ($row['rank'] === 2 ? '🥈' : '🥉')) : '#' . $row['rank'] ?>
                    </div>
                  </td>
                  <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                      <img src="<?= htmlspecialchars($row['avatar']) ?>" alt="Avatar" style="width: 34px; height: 34px; border-radius: 50%;">
                      <div>
                        <div style="font-weight: 800; font-size: 0.92rem;"><?= htmlspecialchars($row['name']) ?></div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span style="font-size: 0.78rem; font-weight: 700; background: var(--c-bg-subtle); padding: 3px 8px; border-radius: 4px;">
                      <?= htmlspecialchars($row['badge']) ?>
                    </span>
                  </td>
                  <td>
                    <strong style="font-family: var(--c-font-head); font-size: 1rem; color: var(--c-fire-primary);">🔥 <?= $row['points'] ?></strong>
                  </td>
                  <td style="font-size: 0.82rem; color: var(--c-text-muted);">
                    <?= htmlspecialchars($row['perk'] ?? '-') ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
      </section>

      <!-- TAB 6: MIEMBROS -->
      <section id="tab-members" class="campus-tab-pane" style="display: none;">
        <div style="margin-bottom: 24px;">
          <h2 style="font-family: var(--c-font-head); font-size: 1.6rem; font-weight: 900; margin-bottom: 6px;">👥 Directorio de Miembros del Campus</h2>
          <p style="color: var(--c-text-muted); font-size: 0.95rem;">Conectá con otros creadores, armá alianzas y hacé networking de alto impacto.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
          <?php foreach ($data['members'] as $mem): ?>
            <div class="campus-card" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
              <img src="<?= htmlspecialchars($mem['avatar']) ?>" alt="<?= htmlspecialchars($mem['name']) ?>" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover; margin-bottom: 12px; border: 3px solid var(--c-border);">
              <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.05rem; margin-bottom: 2px;"><?= htmlspecialchars($mem['name']) ?></h4>
              <div style="font-size: 0.78rem; color: var(--c-text-muted); margin-bottom: 8px;"><?= htmlspecialchars($mem['handle']) ?></div>
              
              <span style="font-size: 0.75rem; font-weight: 800; background: var(--c-fire-light); color: var(--c-fire-primary); padding: 2px 8px; border-radius: 4px; margin-bottom: 12px;">
                <?= htmlspecialchars($mem['role_badge']) ?>
              </span>

              <p style="font-size: 0.85rem; color: var(--c-text-sub); line-height: 1.4; margin-bottom: 16px; flex: 1;">
                <?= htmlspecialchars($mem['bio']) ?>
              </p>

              <button class="btn-reaction" style="width: 100%; justify-content: center;" onclick="alert('Iniciando chat directo con <?= htmlspecialchars($mem['name']) ?>');">
                💬 Enviar Mensaje
              </button>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- TAB 7: ACERCA DEL CAMPUS -->
      <section id="tab-about" class="campus-tab-pane" style="display: none;">
        <div style="max-width: 800px; margin: 0 auto;">
          <div class="campus-card">
            <h2 style="font-family: var(--c-font-head); font-size: 1.6rem; font-weight: 900; margin-bottom: 12px;">🔥 Acerca de Campus Fede Nowback Pro</h2>
            <p style="color: var(--c-text-sub); line-height: 1.7; font-size: 0.98rem; margin-bottom: 20px;">
              Campus Fede Nowback Pro es el centro de formación y comunidad privada creado por <strong>Fede Nowback</strong> para emprendedores, consultores y creadores que buscan construir una marca personal con intención de venta, alta autoridad y ejecución constante.
            </p>

            <h3 style="font-family: var(--c-font-head); font-size: 1.15rem; font-weight: 800; margin-bottom: 10px;">Pilares del Campus:</h3>
            <ul style="color: var(--c-text-sub); line-height: 1.7; margin-left: 20px; margin-bottom: 24px;">
              <li><strong>Mentalidad de Acción:</strong> Dejar la parálisis por análisis y publicar con confianza.</li>
              <li><strong>Estrategia de Contenido:</strong> Guiones y estructuras probadas para reels y carruseles.</li>
              <li><strong>Monetización Directa:</strong> Cierre de ventas por mensajes privados y WhatsApp sin depender de la viralidad.</li>
            </ul>

            <div style="background: var(--c-bg-subtle); border-radius: var(--c-radius); padding: 18px; display: flex; justify-content: space-between; align-items: center;">
              <div>
                <div style="font-weight: 800; font-size: 0.95rem;">¿Tenés dudas o necesitás soporte?</div>
                <div style="font-size: 0.82rem; color: var(--c-text-muted);">Escribí directo a Fede por WhatsApp (+54 9 11 3820-5570)</div>
              </div>
              <a href="https://wa.me/5491138205570?text=Hola%20Fede,%20tengo%20una%20consulta%20sobre%20el%20Campus%20Fede%20Nowback" target="_blank" rel="noopener noreferrer" class="btn-post-submit" style="text-decoration: none;">
                💬 WhatsApp
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- Modal de Login y Credenciales -->
      <div id="modalLogin" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(6px); z-index: 3000; padding: 20px;">
        <div style="max-width: 440px; margin: 60px auto; background: #ffffff; padding: 28px; border-radius: var(--c-radius-lg); box-shadow: var(--c-shadow-lg); border: 1px solid var(--c-border);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
            <div style="display: flex; align-items: center; gap: 8px;">
              <span style="font-size: 1.4rem;">🔥</span>
              <h3 style="font-family: var(--c-font-head); font-weight: 900; font-size: 1.2rem; color: var(--c-text-main);">Acceso al Campus</h3>
            </div>
            <button type="button" onclick="document.getElementById('modalLogin').style.display='none';" style="background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--c-text-muted);">&times;</button>
          </div>

          <form id="formCampusLogin">
            <div style="margin-bottom: 14px;">
              <label for="loginEmailInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Email:</label>
              <input type="email" id="loginEmailInput" class="creator-title-input" placeholder="tu@email.com" value="<?= htmlspecialchars($user['email'] ?? 'mfmujic@gmail.com') ?>" required>
            </div>
            <div style="margin-bottom: 16px;">
              <label for="loginPasswordInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Contraseña:</label>
              <input type="password" id="loginPasswordInput" class="creator-title-input" placeholder="••••••••" value="marcelito" required>
            </div>

            <div id="loginFeedbackMsg" style="display: none; font-size: 0.85rem; padding: 8px 12px; border-radius: 6px; margin-bottom: 14px;"></div>

            <button type="submit" id="btnLoginSubmit" class="btn-post-submit" style="width: 100%; text-align: center; padding: 11px 0; font-size: 0.95rem; margin-bottom: 12px;">
              🚀 Ingresar al Campus
            </button>

            <!-- Quick Auto-Fill Buttons -->
            <div style="border-top: 1px dashed var(--c-border); padding-top: 14px; display: flex; flex-direction: column; gap: 8px;">
              <div style="font-size: 0.75rem; font-weight: 800; color: var(--c-text-muted); text-transform: uppercase;">Accesos Rápidos Demo:</div>
              <button type="button" class="btn-reaction" style="width: 100%; justify-content: center; font-size: 0.82rem;" onclick="document.getElementById('loginEmailInput').value='mfmujic@gmail.com'; document.getElementById('loginPasswordInput').value='marcelito';">
                👑 Cargar Admin (mfmujic@gmail.com)
              </button>
              <button type="button" class="btn-reaction" style="width: 100%; justify-content: center; font-size: 0.82rem;" onclick="document.getElementById('loginEmailInput').value='alumno@fedenowback.com'; document.getElementById('loginPasswordInput').value='alumno123';">
                👤 Cargar Alumno (alumno@fedenowback.com)
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </main>

  <!-- JS Controller -->
  <script src="/assets/js/campus.js?v=1.0"></script>
</body>
</html>
