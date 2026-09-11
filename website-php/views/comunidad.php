<?php
/**
 * CAMPUS FEDE NOWBACK PRO — Vista Principal de Comunidad & Academia
 * Fede Nowback | Plataforma Propia con Gestión MySQL y Panel Admin ABM
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/community_store.php';

$user = &$_SESSION['fede_user'];
$is_logged_in = !empty($user['is_logged_in']) && !empty($user['role']) && $user['role'] !== 'guest';
$is_admin = $is_logged_in && ($user['role'] === 'admin');
$data = fede_load_community_data();
$settings = $data['settings'] ?? [];
$gamification_enabled = !empty($settings['enable_gamification']) && $settings['enable_gamification'] === '1';

$page_title = "Campus Fede Nowback Pro | Comunidad Oficial & Academia — Fede Nowback";
$page_desc = "Campus privado de alto rendimiento para creadores y emprendedores. Cursos de marca personal, mentorías grupales en vivo, debates y networking.";
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

  <!-- Favicons Oficiales Fede Nowback -->
  <link rel="icon" type="image/x-icon" href="/favicon.ico?v=6">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png?v=6">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon-180x180.png?v=6">

  <!-- Open Graph / WhatsApp Preview -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_AR">
  <meta property="og:site_name" content="Campus Fede Nowback Pro">
  <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta property="og:url" content="https://fedenowback.com.ar/comunidad">
  <meta property="og:image" content="https://fedenowback.com.ar/assets/img/fede_nowback_hero.jpg?v=6">
  <meta property="og:image:secure_url" content="https://fedenowback.com.ar/assets/img/fede_nowback_hero.jpg?v=6">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="682">
  <meta property="og:image:height" content="1024">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta name="twitter:image" content="https://fedenowback.com.ar/assets/img/fede_nowback_hero.jpg?v=6">

  <!-- Google Fonts: Montserrat + Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

  <!-- CSS Custom Campus Fede Nowback Pro -->
  <link rel="stylesheet" href="/assets/css/campus.css?v=6.0">
</head>
<body>

  <!-- Top Sticky Header (Branding unificado con el sitio web) -->
  <header class="campus-header">
    <div class="campus-container">
      <div class="campus-header-wrap">
        
        <!-- Brand Area -->
        <a href="/comunidad" class="campus-brand-area">
          <span class="campus-brand-badge">NOWBACK</span>
          <span class="campus-brand-name">FEDE NOWBACK</span>
          <span class="campus-tag-pro">CAMPUS PRO</span>
        </a>

        <!-- Search Bar -->
        <div class="campus-search-box">
          <span class="campus-search-icon">🔍</span>
          <input type="text" class="campus-search-input" placeholder="Buscar debates, clases, miembros...">
        </div>

        <!-- Right User Avatar Dropdown & Login Trigger -->
        <div class="campus-header-actions">
          
          <?php if ($is_logged_in): ?>
            <!-- Trigger del Avatar Dropdown -->
            <div id="campusAvatarTrigger" class="campus-avatar-trigger" title="Menú de tu cuenta (<?= htmlspecialchars($user['name']) ?>)">
              <img src="<?= htmlspecialchars($user['avatar'] ?: '/assets/img/fede_avatar_mini.png') ?>" alt="<?= htmlspecialchars($user['name']) ?>" class="campus-user-avatar" onerror="this.src='/assets/img/fede_avatar_mini.png'">
              <span class="campus-avatar-role-dot">
                <?= $user['role'] === 'admin' ? '👑 Admin' : '👤 ' . htmlspecialchars(explode(' ', $user['name'])[0]) ?> ▾
              </span>
            </div>

            <!-- Menú Flotante del Avatar del Alumno / Admin -->
            <div id="campusAvatarDropdown" class="campus-avatar-dropdown">
              <div class="dropdown-user-header">
                <img src="<?= htmlspecialchars($user['avatar'] ?: '/assets/img/fede_avatar_mini.png') ?>" alt="Avatar" class="dropdown-avatar-lg" onerror="this.src='/assets/img/fede_avatar_mini.png'">
                <div class="dropdown-user-info">
                  <div class="dropdown-user-name"><?= htmlspecialchars($user['name']) ?></div>
                  <div class="dropdown-user-handle"><?= htmlspecialchars($user['handle']) ?></div>
                  <span class="dropdown-role-badge <?= $user['role'] === 'admin' ? 'admin' : 'member' ?>">
                    <?= $user['role'] === 'admin' ? '👑 Administrador' : '👤 Alumno Pro' ?>
                  </span>
                </div>
              </div>

              <?php if ($gamification_enabled): ?>
                <!-- Fuego / Nivel del Alumno (si está habilitada la gamificación) -->
                <div class="dropdown-fuego-card">
                  <div class="dropdown-fuego-row">
                    <span>🔥 Fuego Acumulado:</span>
                    <span style="color: var(--c-fire-primary); font-size: 0.95rem;"><?= (int)$user['points'] ?> pts</span>
                  </div>
                  <div style="font-size: 0.75rem; color: #94a3b8; margin-top: 4px;">
                    Rango actual: <strong><?= htmlspecialchars($user['level_name'] ?? 'Creador') ?></strong>
                  </div>
                </div>
              <?php endif; ?>

              <ul class="dropdown-menu-links">
                <?php if ($is_admin): ?>
                  <li>
                    <a href="#admin" class="dropdown-admin-highlight" onclick="switchTab('admin'); closeAvatarDropdown();">
                      <span>👑</span> <span>Panel de Administración (ABM)</span>
                    </a>
                  </li>
                <?php endif; ?>
                <li>
                  <a href="#classroom" onclick="switchTab('classroom'); closeAvatarDropdown();">
                    <span>🎓</span> <span>Mi Academia & Cursos</span>
                  </a>
                </li>
                <li>
                  <a href="#calendar" onclick="switchTab('calendar'); closeAvatarDropdown();">
                    <span>📅</span> <span>Meets en Vivo (Zoom)</span>
                  </a>
                </li>
                <li>
                  <button type="button" id="btnDropdownRoleSwitch" data-current-role="<?= htmlspecialchars($user['role']) ?>">
                    <span>⚡</span> <span>Alternar a <?= $user['role'] === 'admin' ? 'Vista Alumno' : 'Vista Admin' ?></span>
                  </button>
                </li>
                <li>
                  <a href="/" target="_blank">
                    <span>🌐</span> <span>Ir al Sitio Web Oficial ↗</span>
                  </a>
                </li>
              </ul>

              <div class="dropdown-divider"></div>

              <ul class="dropdown-menu-links" style="margin-bottom: 0;">
                <li>
                  <button type="button" id="btnDropdownLogout" style="color: #f87171;">
                    <span>🚪</span> <span>Cerrar Sesión</span>
                  </button>
                </li>
              </ul>
            </div>

          <?php else: ?>
            <!-- Botón de Ingreso cuando es Invitado -->
            <button id="btnOpenLoginModal" class="btn-post-submit" style="padding: 7px 16px; font-size: 0.88rem;" onclick="openLoginModal()">
              🔑 Ingresar al Campus
            </button>
          <?php endif; ?>

        </div>

      </div>
    </div>
  </header>

  <!-- Navigation Tabs Bar (Wrap responsive sin scroll horizontal forzado) -->
  <nav class="campus-nav-bar">
    <div class="campus-container">
      <ul class="campus-nav-list">
        <li><a class="campus-nav-item active" data-tab="community">💬 Muro</a></li>
        <li><a class="campus-nav-item" data-tab="classroom">🎓 Academia</a></li>
        <li><a class="campus-nav-item" data-tab="calendar">📅 Meets en Vivo</a></li>
        <li><a class="campus-nav-item" data-tab="chat">💬 Chat</a></li>
        <?php if ($gamification_enabled): ?>
          <li><a class="campus-nav-item" data-tab="leaderboard">🏆 Ranking</a></li>
        <?php endif; ?>
        <li><a class="campus-nav-item" data-tab="members">👥 Miembros</a></li>
        <li><a class="campus-nav-item" data-tab="about">ℹ️ Acerca</a></li>

        <?php if ($is_admin): ?>
          <!-- PESTAÑA VISIBLE EXCLUSIVAMENTE PARA ADMINISTRADORES -->
          <li><a class="campus-nav-item admin-badge-highlight" data-tab="admin">👑 Panel Admin (ABM)</a></li>
        <?php endif; ?>

        <li><a href="/" class="campus-nav-item" style="color: #0284c7; font-weight: 700; border: 1px solid rgba(2, 132, 199, 0.25); background: rgba(2, 132, 199, 0.06); border-radius: 8px;">🌐 Ir al Sitio Web ↗</a></li>
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

            <?php if ($is_logged_in): ?>
              <!-- Post Creator Box -->
              <div class="campus-creator-card">
                <form id="formCreatePost">
                  <div class="post-creator-header">
                    <img src="<?= htmlspecialchars($user['avatar'] ?: '/assets/img/fede_avatar_mini.png') ?>" alt="Avatar" class="creator-avatar" onerror="this.src='/assets/img/fede_avatar_mini.png'">
                    <div class="creator-inputs">
                      <input type="text" id="postTitleInput" class="creator-title-input" placeholder="Título de tu aporte, pregunta o victoria..." required>
                      <textarea id="postBodyInput" class="creator-body-input" placeholder="Escribí acá tu mensaje. Compartí contexto, aprendizajes o dudas para que la comunidad y Fede te respondan..." required></textarea>
                    </div>
                  </div>

                  <div class="creator-bottom-bar">
                    <select id="postCategorySelect" class="creator-category-select">
                      <?php foreach ($data['categories'] as $cat): ?>
                        <?php if ($cat['id'] === 'todos') continue; ?>
                        <?php if (!empty($cat['admin_only']) && !$is_admin) continue; ?>
                        <option value="<?= htmlspecialchars($cat['id']) ?>">
                          <?= $cat['icon'] ?> <?= htmlspecialchars($cat['name']) ?>
                        </option>
                      <?php endforeach; ?>
                    </select>

                    <button type="submit" class="btn-post-submit">Publicar en el Muro</button>
                  </div>
                </form>
              </div>
            <?php else: ?>
              <!-- Guest Welcome CTA Box -->
              <div class="guest-cta-card">
                <div class="guest-cta-icon">🔥</div>
                <h3 class="guest-cta-title">Comunidad Privada de Creadores & Emprendedores</h3>
                <p class="guest-cta-desc">Iniciá sesión para publicar tus avances, hacerle preguntas directas a Fede y debatir con la comunidad.</p>
                <div class="guest-cta-actions">
                  <button type="button" class="btn-post-submit" onclick="openLoginModal('Iniciá sesión para publicar en el muro.')">
                    🔑 Ingresar al Campus
                  </button>
                  <button type="button" class="btn-reaction" onclick="document.getElementById('plansWidgetBox').scrollIntoView({behavior:'smooth'})">
                    💳 Ver Membresías & Planes
                  </button>
                </div>
              </div>
            <?php endif; ?>

            <!-- Posts Stream Container -->
            <div id="postsStreamContainer">
              <?php foreach ($data['posts'] as $post): ?>
                <article class="campus-card post-card" data-category="<?= htmlspecialchars($post['category']) ?>" id="post-<?= htmlspecialchars($post['id']) ?>">
                  
                  <?php if (!empty($post['pinned'])): ?>
                    <div class="post-pinned-tag">📌 COMUNICADO FIJADO POR FEDE</div>
                  <?php endif; ?>

                  <div class="post-header-row">
                    <img src="<?= htmlspecialchars($post['author']['avatar']) ?>" alt="<?= htmlspecialchars($post['author']['name']) ?>" class="post-author-avatar" onerror="this.src='/assets/img/fede_avatar_mini.png'">
                    <div>
                      <div style="display: flex; align-items: center; gap: 8px;">
                        <span class="post-author-name"><?= htmlspecialchars($post['author']['name']) ?></span>
                        <span class="badge-role <?= !empty($post['author']['is_host']) ? 'host' : '' ?>"><?= htmlspecialchars($post['author']['badge'] ?? 'Miembro') ?></span>
                      </div>
                      <div class="post-date-line"><?= htmlspecialchars($post['author']['handle']) ?> • <?= htmlspecialchars($post['created_at']) ?></div>
                    </div>
                  </div>

                  <h3 class="post-card-title"><?= htmlspecialchars($post['title']) ?></h3>
                  <div class="post-card-body"><?= nl2br(htmlspecialchars($post['content'])) ?></div>

                  <div class="post-actions-bar">
                    <?php 
                      $is_liked = in_array($user['id'] ?? '', $post['liked_by'] ?? []);
                    ?>
                    <button class="btn-reaction btn-like <?= $is_liked ? 'liked' : '' ?>" data-post-id="<?= htmlspecialchars($post['id']) ?>">
                      <span class="reaction-icon">🔥</span>
                      <span class="like-count"><?= (int)$post['likes'] ?></span> Fuego
                    </button>

                    <button class="btn-reaction btn-toggle-comments" data-post-id="<?= htmlspecialchars($post['id']) ?>">
                      <span class="reaction-icon">💬</span>
                      <span><?= count($post['comments'] ?? []) ?> Respuestas</span>
                    </button>
                  </div>

                  <!-- Comments Container -->
                  <div class="post-comments-container" id="comments-<?= htmlspecialchars($post['id']) ?>">
                    <div class="comments-list">
                      <?php foreach ($post['comments'] as $comm): ?>
                        <div class="comment-bubble">
                          <img src="<?= htmlspecialchars($comm['author']['avatar']) ?>" alt="Avatar" class="comment-avatar" onerror="this.src='/assets/img/fede_avatar_mini.png'">
                          <div class="comment-body">
                            <div class="comment-author-title">
                              <?= htmlspecialchars($comm['author']['name']) ?> • <span style="color: var(--c-text-light); font-weight: 400;"><?= htmlspecialchars($comm['created_at']) ?></span>
                            </div>
                            <div class="comment-text"><?= nl2br(htmlspecialchars($comm['content'])) ?></div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>

                    <?php if ($is_logged_in): ?>
                      <!-- Comment Input -->
                      <form class="form-add-comment" data-post-id="<?= htmlspecialchars($post['id']) ?>">
                        <input type="text" class="comment-input" placeholder="Escribí una respuesta a este debate..." required>
                        <button type="submit" class="btn-comment-send">Responder</button>
                      </form>
                    <?php else: ?>
                      <div style="padding: 10px; background: var(--c-bg-subtle); border-radius: 8px; text-align: center; margin-top: 10px; border: 1px solid var(--c-border); font-size: 0.82rem; color: var(--c-text-muted);">
                        🔒 <strong>Iniciá sesión</strong> para responder a este debate.
                        <button type="button" onclick="openLoginModal('Iniciá sesión para responder a este debate.')" style="color: var(--c-fire-primary); font-weight: 700; background: none; border: none; cursor: pointer; text-decoration: underline; margin-left: 4px;">Ingresar</button>
                      </div>
                    <?php endif; ?>
                  </div>

                </article>
              <?php endforeach; ?>
            </div>

          </div>

          <!-- Columna Derecha: Próximo Meet, Membresía & Reglas -->
          <div>
            
            <!-- Widget Próximo Meet en Vivo -->
            <?php if (!empty($data['meets'][0])): $next_meet = $data['meets'][0]; ?>
              <div class="campus-card" style="border: 2px solid rgba(255, 85, 0, 0.25); background: linear-gradient(180deg, rgba(255, 85, 0, 0.04) 0%, rgba(255, 255, 255, 1) 100%); margin-bottom: 20px;">
                <div style="font-size: 0.75rem; font-weight: 800; color: var(--c-fire-primary); text-transform: uppercase; margin-bottom: 6px;">
                  🔴 PRÓXIMA SESIÓN EN DIRECTO
                </div>
                <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.05rem; margin-bottom: 8px;">
                  <?= htmlspecialchars($next_meet['title']) ?>
                </h4>
                <p style="font-size: 0.85rem; color: var(--c-text-sub); margin-bottom: 12px; line-height: 1.4;">
                  <?= htmlspecialchars($next_meet['description']) ?>
                </p>
                <div style="font-size: 0.82rem; font-weight: 700; color: var(--c-text-main); margin-bottom: 14px;">
                  🗓️ <?= htmlspecialchars($next_meet['date']) ?> • ⏰ <?= htmlspecialchars($next_meet['time']) ?>
                </div>
                <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                  <?php if ($is_logged_in): ?>
                    <a href="<?= htmlspecialchars($next_meet['zoom_url'] ?: '#') ?>" target="_blank" rel="noopener" class="btn-post-submit" style="flex: 1; text-align: center; text-decoration: none; font-size: 0.85rem;">
                      🚀 Entrar a <?= htmlspecialchars($next_meet['platform'] ?? 'Zoom') ?>
                    </a>
                  <?php else: ?>
                    <button type="button" class="btn-post-submit" style="flex: 1; text-align: center; font-size: 0.85rem;" onclick="openLoginModal('Las sesiones de Zoom son exclusivas para miembros activos.')">
                      🔒 Acceso Alumnos
                    </button>
                  <?php endif; ?>
                  <a href="<?= htmlspecialchars($next_meet['google_cal_url'] ?: '#') ?>" target="_blank" rel="noopener" class="btn-reaction" style="font-size: 0.82rem; text-decoration: none;">
                    📅 Agendar
                  </a>
                </div>
              </div>
            <?php endif; ?>

            <!-- Planes & Precios Box -->
            <div id="plansWidgetBox" class="campus-card" style="margin-bottom: 20px;">
              <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.05rem; margin-bottom: 10px;">
                💳 Membresías & Planes
              </h4>
              <p style="font-size: 0.84rem; color: var(--c-text-sub); margin-bottom: 14px; line-height: 1.4;">
                Elegí el plan que mejor se adapte a tu nivel de escalado:
              </p>
              <div style="display: flex; flex-direction: column; gap: 10px;">
                <?php foreach ($data['plans'] as $plan): ?>
                  <div style="padding: 10px 12px; border-radius: 8px; border: 1px solid var(--c-border); background: var(--c-bg-subtle);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                      <strong style="font-size: 0.88rem;"><?= htmlspecialchars($plan['name']) ?></strong>
                      <span style="font-size: 0.72rem; font-weight: 800; background: var(--c-fire-light); color: var(--c-fire-primary); padding: 2px 6px; border-radius: 4px;"><?= htmlspecialchars($plan['badge']) ?></span>
                    </div>
                    <div style="font-size: 0.85rem; font-weight: 800; color: var(--c-fire-primary);">
                      $<?= number_format($plan['price_ars'], 0, ',', '.') ?> ARS <span style="font-size: 0.75rem; color: var(--c-text-muted); font-weight: normal;">($<?= $plan['price_usd'] ?> USD)</span>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- Reglas de Oro -->
            <div class="campus-card">
              <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 0.95rem; margin-bottom: 10px;">
                ⚡ Reglas de Alto Rendimiento
              </h4>
              <ul style="font-size: 0.82rem; color: var(--c-text-sub); line-height: 1.6; margin-left: 16px;">
                <li>Ejecutá antes de pedir perfección.</li>
                <li>Publicá tus dudas y victorias con contexto.</li>
                <li>Conectá y aportá valor a los demás miembros.</li>
              </ul>
            </div>

          </div>

        </div>
      </section>

      <!-- TAB 2: ACADEMIA / CLASES -->
      <section id="tab-classroom" class="campus-tab-pane" style="display: none;">
        <div style="margin-bottom: 24px;">
          <h2 style="font-family: var(--c-font-head); font-size: 1.8rem; font-weight: 900; margin-bottom: 6px;">🎓 Academia Fede Nowback</h2>
          <p style="color: var(--c-text-muted); font-size: 0.95rem;">Masterclasses, estructuras paso a paso y guiones probados para monetizar tu marca personal.</p>
        </div>

        <div class="classroom-grid courses-grid">
          <?php foreach ($data['courses'] as $course): ?>
            <div class="campus-card course-card">
              <div class="course-thumb-wrap">
                <img src="<?= htmlspecialchars($course['thumbnail']) ?>" alt="<?= htmlspecialchars($course['title']) ?>" class="course-thumb-img">
                <div class="course-level-badge"><?= htmlspecialchars($course['level_name']) ?></div>
              </div>

              <div class="course-content-wrap">
                <h3 class="course-title"><?= htmlspecialchars($course['title']) ?></h3>
                <p class="course-desc"><?= htmlspecialchars($course['description']) ?></p>

                <div class="course-meta-row">
                  <span>⏱️ <?= htmlspecialchars($course['duration']) ?></span>
                  <span>📚 <?= (int)$course['total_lessons'] ?> Lecciones</span>
                </div>

                <!-- Acordeón de Módulos y Lecciones -->
                <div class="course-modules-list" style="margin-top: 16px;">
                  <?php foreach ($course['modules'] as $mod): ?>
                    <div class="module-group" style="margin-bottom: 12px; border: 1px solid var(--c-border); border-radius: 8px; overflow: hidden;">
                      <div style="background: var(--c-bg-subtle); padding: 8px 12px; font-weight: 700; font-size: 0.84rem;">
                        <?= htmlspecialchars($mod['title']) ?>
                      </div>
                      <div class="module-lessons">
                        <?php foreach ($mod['lessons'] as $les): 
                          $is_free = !empty($les['is_free']);
                          $can_view = $is_logged_in || $is_free;
                        ?>
                          <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 14px; border-top: 1px solid var(--c-border); font-size: 0.84rem;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                              <span><?= $can_view ? '🎬' : '🔒' ?></span>
                              <div>
                                <span style="font-weight: 600; color: var(--c-text-main);"><?= htmlspecialchars($les['title']) ?></span>
                                <small style="color: var(--c-text-muted); margin-left: 4px;">(<?= htmlspecialchars($les['duration']) ?>)</small>
                                <?php if ($is_free): ?>
                                  <span style="font-size: 0.7rem; font-weight: 800; background: #dcfce7; color: #15803d; padding: 2px 6px; border-radius: 4px; margin-left: 6px;">GRATIS</span>
                                <?php endif; ?>
                              </div>
                            </div>

                            <?php if ($can_view): ?>
                              <button type="button" class="btn-reaction btn-play-lesson" style="padding: 4px 10px; font-size: 0.78rem; font-weight: 700; color: var(--c-fire-primary);" onclick="playLessonModal('<?= htmlspecialchars(addslashes($les['title'])) ?>', '<?= htmlspecialchars($les['video_url']) ?>', '<?= htmlspecialchars(addslashes($les['description'])) ?>')">
                                ▶️ Ver Clase
                              </button>
                            <?php else: ?>
                              <button type="button" class="btn-reaction" style="padding: 4px 10px; font-size: 0.78rem; color: #64748b; background: #f1f5f9;" onclick="openLoginModal('Esta lección es exclusiva para miembros Pro. Iniciá sesión o suscribite para acceder.')">
                                🔒 Desbloquear
                              </button>
                            <?php endif; ?>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>

              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- TAB 3: CALENDARIO / MEETS -->
      <section id="tab-calendar" class="campus-tab-pane" style="display: none;">
        <div style="margin-bottom: 24px;">
          <h2 style="font-family: var(--c-font-head); font-size: 1.8rem; font-weight: 900; margin-bottom: 6px;">📅 Calendario de Sesiones en Vivo</h2>
          <p style="color: var(--c-text-muted); font-size: 0.95rem;">Auditorías 1 a 1, Hot Seats y sesiones grupales en directo con Fede Nowback.</p>
        </div>

        <div style="display: flex; flex-direction: column; gap: 16px;">
          <?php foreach ($data['meets'] as $meet): ?>
            <div class="campus-card meet-card-full" style="display: flex; justify-content: space-between; align-items: center; gap: 20px;">
              <div>
                <span style="font-size: 0.75rem; font-weight: 800; background: var(--c-fire-light); color: var(--c-fire-primary); padding: 3px 8px; border-radius: 4px;">
                  <?= htmlspecialchars($meet['platform'] ?? 'Zoom Pro') ?>
                </span>
                <h3 style="font-family: var(--c-font-head); font-size: 1.25rem; font-weight: 800; margin: 8px 0 6px;">
                  <?= htmlspecialchars($meet['title']) ?>
                </h3>
                <p style="color: var(--c-text-sub); font-size: 0.9rem; margin-bottom: 10px;">
                  <?= htmlspecialchars($meet['description']) ?>
                </p>
                <div style="font-weight: 700; font-size: 0.88rem; color: var(--c-text-main);">
                  🗓️ <?= htmlspecialchars($meet['date']) ?> • ⏰ <?= htmlspecialchars($meet['time']) ?>
                </div>
              </div>

              <div style="display: flex; flex-direction: column; gap: 8px; min-width: 180px;">
                <?php if ($is_logged_in): ?>
                  <a href="<?= htmlspecialchars($meet['zoom_url'] ?: '#') ?>" target="_blank" rel="noopener" class="btn-post-submit" style="text-align: center; text-decoration: none;">
                    🚀 Entrar a la Sesión
                  </a>
                <?php else: ?>
                  <button type="button" class="btn-post-submit" style="text-align: center;" onclick="openLoginModal('Las sesiones en directo son exclusivas para miembros activos.')">
                    🔒 Acceso Alumnos
                  </button>
                <?php endif; ?>
                <a href="<?= htmlspecialchars($meet['google_cal_url'] ?: '#') ?>" target="_blank" rel="noopener" class="btn-reaction" style="justify-content: center; text-decoration: none;">
                  📅 Guardar en Calendario
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- TAB 4: CHAT EN VIVO -->
      <section id="tab-chat" class="campus-tab-pane" style="display: none;">
        <div class="campus-card chat-container-layout">
          
          <!-- Canales del Chat -->
          <div class="chat-sidebar">
            <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 0.95rem; margin-bottom: 12px; color: var(--c-text-sub);">Salas de Chat</h4>
            <div class="chat-channel-item active"># sala-general</div>
            <div class="chat-channel-item"># consultas-fede</div>
            <div class="chat-channel-item"># colaboraciones</div>
          </div>

          <!-- Mensajes y Entrada -->
          <div class="chat-main-area">
            <div id="chatMessagesScroll" class="chat-messages-scroll">
              <?php foreach ($data['chat_messages'] as $msg): ?>
                <div class="chat-bubble-row">
                  <img src="<?= htmlspecialchars($msg['avatar']) ?>" alt="<?= htmlspecialchars($msg['author']) ?>" class="comment-avatar" onerror="this.src='/assets/img/fede_avatar_mini.png'">
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

            <?php if ($is_logged_in): ?>
              <!-- Chat Input Bar -->
              <form id="formSendChat" class="chat-input-bar">
                <input type="text" id="chatTextInput" class="chat-text-input" placeholder="Escribir un mensaje en #sala-general..." required>
                <button type="submit" class="btn-post-submit">Enviar</button>
              </form>
            <?php else: ?>
              <div class="chat-guest-lock-bar">
                <span style="font-size: 0.88rem; color: var(--c-text-sub); font-weight: 500;">🔒 El chat en vivo es exclusivo para miembros del Campus.</span>
                <button type="button" class="btn-post-submit" onclick="openLoginModal('Iniciá sesión para chatear en la comunidad.')" style="padding: 6px 14px; font-size: 0.82rem;">
                  🔑 Ingresar al Campus
                </button>
              </div>
            <?php endif; ?>
          </div>

        </div>
      </section>

      <?php if ($gamification_enabled): ?>
        <!-- TAB 5: LEADERBOARD / GAMIFICACIÓN (Solo visible si el admin activó gamificación) -->
        <section id="tab-leaderboard" class="campus-tab-pane" style="display: none;">
          <div style="max-width: 840px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 32px;">
              <span style="font-size: 0.8rem; font-weight: 800; text-transform: uppercase; color: var(--c-fire-primary); letter-spacing: 0.05em;">SISTEMA DE GAMIFICACIÓN</span>
              <h2 style="font-family: var(--c-font-head); font-size: 1.8rem; font-weight: 900; margin-top: 4px;">🏆 Ranking de Fuego & Niveles de Creadores</h2>
              <p style="color: var(--c-text-muted); font-size: 0.95rem; max-width: 600px; margin: 8px auto 0;">
                Ganá <strong>Fuego (Puntos)</strong> interactuando en la comunidad y completando lecciones para desbloquear rangos de honor.
              </p>
            </div>

            <table class="leaderboard-table">
              <thead>
                <tr>
                  <th style="width: 70px;">Posición</th>
                  <th>Miembro</th>
                  <th>Rango / Nivel</th>
                  <th>Fuego Acumulado</th>
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
                          <div style="font-size: 0.78rem; color: var(--c-text-muted);"><?= htmlspecialchars($row['email']) ?></div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span style="font-size: 0.78rem; font-weight: 700; background: var(--c-bg-subtle); padding: 3px 8px; border-radius: 4px;">
                        <?= htmlspecialchars($row['badge']) ?>
                      </span>
                    </td>
                    <td>
                      <strong style="font-family: var(--c-font-head); font-size: 1rem; color: var(--c-fire-primary);">🔥 <?= (int)$row['points'] ?></strong>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </section>
      <?php endif; ?>

      <!-- TAB 6: MIEMBROS -->
      <section id="tab-members" class="campus-tab-pane" style="display: none;">
        <div style="margin-bottom: 24px;">
          <h2 style="font-family: var(--c-font-head); font-size: 1.6rem; font-weight: 900; margin-bottom: 6px;">👥 Directorio de Miembros del Campus</h2>
          <p style="color: var(--c-text-muted); font-size: 0.95rem;">Conectá con otros creadores, armá alianzas y hacé networking de alto impacto.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
          <?php foreach ($data['members'] as $mem): ?>
            <div class="campus-card" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
              <img src="<?= htmlspecialchars($mem['avatar'] ?: '/assets/img/fede_avatar_mini.png') ?>" alt="<?= htmlspecialchars($mem['name']) ?>" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover; margin-bottom: 12px; border: 3px solid var(--c-border);" onerror="this.src='/assets/img/fede_avatar_mini.png'">
              <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.05rem; margin-bottom: 2px;"><?= htmlspecialchars($mem['name']) ?></h4>
              <div style="font-size: 0.78rem; color: var(--c-text-muted); margin-bottom: 8px;"><?= htmlspecialchars($mem['handle']) ?></div>
              
              <span style="font-size: 0.75rem; font-weight: 800; background: var(--c-fire-light); color: var(--c-fire-primary); padding: 2px 8px; border-radius: 4px; margin-bottom: 12px;">
                <?= $mem['role'] === 'admin' ? '👑 MENTOR & HOST' : '👤 Alumno Pro' ?>
              </span>

              <p style="font-size: 0.85rem; color: var(--c-text-sub); line-height: 1.4; margin-bottom: 16px; flex: 1;">
                <?= htmlspecialchars($mem['bio'] ?: 'Creador de contenido y emprendedor digital en el Campus Fede Nowback.') ?>
              </p>
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

            <div style="background: var(--c-bg-subtle); border-radius: var(--c-radius); padding: 18px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
              <div>
                <div style="font-weight: 800; font-size: 0.95rem;">¿Tenés dudas o necesitás soporte?</div>
                <div style="font-size: 0.82rem; color: var(--c-text-muted);">Escribí directo a Fede por WhatsApp (+54 9 11 3820-5570)</div>
              </div>
              <a href="https://wa.me/5491138205570?text=Hola%20Fede,%20tengo%20una%20consulta%20sobre%20el%20Campus%20Fede%20Nowback" target="_blank" rel="noopener noreferrer" class="btn-post-submit" style="text-decoration: none;">
                💬 WhatsApp Directo
              </a>
            </div>
          </div>
        </div>
      </section>

      <?php if (!empty($user['is_logged_in']) && $user['role'] === 'admin'): ?>
        <!-- ========================================================================= -->
        <!-- 👑 TAB 8: PANEL DE ADMINISTRACIÓN COMPLETO (ABM) — SOLO PARA ADMINS -->
        <!-- ========================================================================= -->
        <section id="tab-admin" class="campus-tab-pane" style="display: none;">
          
          <!-- Header Banner del Admin -->
          <div class="admin-header-card">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
              <div>
                <span style="font-size: 0.78rem; font-weight: 800; color: #fbbf24; letter-spacing: 0.05em; text-transform: uppercase;">PANEL DE CONTROL CENTRAL</span>
                <h2 style="font-family: var(--c-font-head); font-size: 1.8rem; font-weight: 900; margin-top: 4px;">👑 Gestión & ABM del Campus Nowback Pro</h2>
                <p style="color: #94a3b8; font-size: 0.88rem; margin-top: 4px;">Administrá de forma autónoma usuarios, cursos, lecciones, planes, precios y el calendario en vivo.</p>
              </div>
              <div style="background: rgba(245, 158, 11, 0.15); border: 1px solid rgba(245, 158, 11, 0.3); padding: 8px 14px; border-radius: 8px; font-size: 0.82rem; font-weight: 700; color: #fef08a;">
                🟢 Conexión MySQL Activa
              </div>
            </div>

            <!-- Métricas Rápidas -->
            <div class="admin-stats-grid">
              <div class="admin-stat-item">
                <div class="admin-stat-val" id="adminStatUsers"><?= count($data['members']) ?></div>
                <div class="admin-stat-lbl">👥 Usuarios Totales</div>
              </div>
              <div class="admin-stat-item">
                <div class="admin-stat-val" id="adminStatCourses"><?= count($data['courses']) ?></div>
                <div class="admin-stat-lbl">🎓 Cursos Creados</div>
              </div>
              <div class="admin-stat-item">
                <div class="admin-stat-val" id="adminStatPlans"><?= count($data['plans']) ?></div>
                <div class="admin-stat-lbl">💳 Planes Activos</div>
              </div>
              <div class="admin-stat-item">
                <div class="admin-stat-val" id="adminStatMeets"><?= count($data['meets']) ?></div>
                <div class="admin-stat-lbl">📅 Meets Programados</div>
              </div>
            </div>
          </div>

          <!-- Subtabs de Navegación del Admin -->
          <div class="admin-subtabs-nav">
            <button type="button" class="admin-subtab-btn active" data-admin-subtab="users">👥 Gestión de Usuarios</button>
            <button type="button" class="admin-subtab-btn" data-admin-subtab="courses">🎓 Cursos & Lecciones</button>
            <button type="button" class="admin-subtab-btn" data-admin-subtab="plans">💳 Planes & Precios</button>
            <button type="button" class="admin-subtab-btn" data-admin-subtab="meets">📅 Calendario & Meets</button>
            <button type="button" class="admin-subtab-btn" data-admin-subtab="settings">⚙️ Configuración & Fuegos</button>
          </div>

          <!-- SUBTAB 1: USUARIOS (ABM) -->
          <div id="admin-subtab-users" class="admin-subtab-content">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
              <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem;">Directorio de Usuarios</h3>
              <button type="button" class="admin-btn-add" onclick="openAdminUserModal(0)">➕ Nuevo Usuario / Alumno</button>
            </div>

            <table class="admin-table">
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Email</th>
                  <th>Rol</th>
                  <th>Fuego</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody id="adminUsersTableBody">
                <?php foreach ($data['members'] as $u_row): ?>
                  <tr id="admin-user-row-<?= htmlspecialchars($u_row['id']) ?>">
                    <td>
                      <div style="display: flex; align-items: center; gap: 8px;">
                        <img src="<?= htmlspecialchars($u_row['avatar'] ?: '/assets/img/fede_avatar_mini.png') ?>" alt="" style="width: 28px; height: 28px; border-radius: 50%;">
                        <strong><?= htmlspecialchars($u_row['name']) ?></strong>
                      </div>
                    </td>
                    <td><?= htmlspecialchars($u_row['email']) ?></td>
                    <td>
                      <span class="dropdown-role-badge <?= $u_row['role'] === 'admin' ? 'admin' : 'member' ?>">
                        <?= $u_row['role'] === 'admin' ? '👑 Admin' : '👤 Alumno' ?>
                      </span>
                    </td>
                    <td>🔥 <?= (int)$u_row['points'] ?></td>
                    <td>
                      <button class="admin-btn-action admin-btn-edit" onclick="openAdminUserModal(<?= (int)$u_row['id'] ?>, '<?= htmlspecialchars(addslashes($u_row['name'])) ?>', '<?= htmlspecialchars(addslashes($u_row['email'])) ?>', '<?= htmlspecialchars($u_row['role']) ?>', <?= (int)$u_row['points'] ?>)">✏️ Editar</button>
                      <?php if ($u_row['email'] !== 'mfmujic@gmail.com'): ?>
                        <button class="admin-btn-action admin-btn-del" onclick="deleteAdminUser(<?= (int)$u_row['id'] ?>)">🗑️ Borrar</button>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- SUBTAB 2: CURSOS Y LECCIONES (ABM) -->
          <div id="admin-subtab-courses" class="admin-subtab-content" style="display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
              <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem;">Cursos & Contenidos de la Academia</h3>
              <div style="display: flex; gap: 8px;">
                <button type="button" class="admin-btn-add" onclick="openAdminCourseModal(0)">➕ Nuevo Curso</button>
                <button type="button" class="btn-reaction" onclick="openAdminLessonModal(0)">➕ Nueva Lección</button>
              </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 16px;">
              <?php foreach ($data['courses'] as $c_item): ?>
                <div class="campus-card" style="display: flex; justify-content: space-between; align-items: center; gap: 16px;">
                  <div style="display: flex; align-items: center; gap: 16px;">
                    <img src="<?= htmlspecialchars($c_item['thumbnail']) ?>" alt="" style="width: 80px; height: 50px; border-radius: 8px; object-fit: cover;">
                    <div>
                      <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.05rem; margin-bottom: 4px;"><?= htmlspecialchars($c_item['title']) ?></h4>
                      <div style="font-size: 0.8rem; color: var(--c-text-muted);">
                        Slug: <code>/<?= htmlspecialchars($c_item['slug']) ?></code> • <?= (int)$c_item['total_lessons'] ?> Lecciones • Duración: <?= htmlspecialchars($c_item['duration']) ?>
                      </div>
                    </div>
                  </div>
                  <div style="display: flex; gap: 8px;">
                    <button class="admin-btn-action admin-btn-edit" onclick="openAdminCourseModal(<?= (int)$c_item['id'] ?>, '<?= htmlspecialchars(addslashes($c_item['title'])) ?>', '<?= htmlspecialchars(addslashes($c_item['slug'])) ?>', '<?= htmlspecialchars(addslashes($c_item['description'])) ?>', '<?= htmlspecialchars(addslashes($c_item['duration'])) ?>', '<?= htmlspecialchars(addslashes($c_item['thumbnail'])) ?>', <?= (int)$c_item['level_required'] ?>)">✏️ Editar</button>
                    <button class="admin-btn-action admin-btn-del" onclick="deleteAdminCourse(<?= (int)$c_item['id'] ?>)">🗑️ Borrar</button>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- SUBTAB 3: PLANES Y PRECIOS (ABM) -->
          <div id="admin-subtab-plans" class="admin-subtab-content" style="display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
              <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem;">Planes de Membresía & Precios</h3>
              <button type="button" class="admin-btn-add" onclick="openAdminPlanModal(0)">➕ Nuevo Plan</button>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 16px;">
              <?php foreach ($data['plans'] as $p_item): ?>
                <div class="campus-card" style="border: 2px solid var(--c-border); display: flex; flex-direction: column; justify-content: space-between;">
                  <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                      <span style="font-size: 0.75rem; font-weight: 800; background: var(--c-fire-light); color: var(--c-fire-primary); padding: 3px 8px; border-radius: 4px;"><?= htmlspecialchars($p_item['badge']) ?></span>
                      <small style="color: var(--c-text-muted);">ID: <?= htmlspecialchars($p_item['id']) ?></small>
                    </div>
                    <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.15rem; margin-bottom: 6px;"><?= htmlspecialchars($p_item['name']) ?></h4>
                    <div style="font-size: 1.3rem; font-weight: 900; color: var(--c-fire-primary); margin-bottom: 8px;">
                      $<?= number_format($p_item['price_ars'], 0, ',', '.') ?> ARS <span style="font-size: 0.85rem; color: var(--c-text-muted); font-weight: 600;">($<?= $p_item['price_usd'] ?> USD)</span>
                    </div>
                    <p style="font-size: 0.85rem; color: var(--c-text-sub); margin-bottom: 12px;"><?= htmlspecialchars($p_item['description']) ?></p>
                  </div>
                  <div style="display: flex; gap: 8px; border-top: 1px solid var(--c-border); padding-top: 12px;">
                    <button class="admin-btn-action admin-btn-edit" style="flex: 1; text-align: center;" onclick="openAdminPlanModal(<?= (int)$p_item['id'] ?>, '<?= htmlspecialchars(addslashes($p_item['name'])) ?>', '<?= htmlspecialchars(addslashes($p_item['slug'])) ?>', '<?= htmlspecialchars(addslashes($p_item['badge'])) ?>', <?= (int)$p_item['price_ars'] ?>, <?= (int)$p_item['price_usd'] ?>, '<?= htmlspecialchars(addslashes($p_item['period'])) ?>', '<?= htmlspecialchars(addslashes($p_item['description'])) ?>', '<?= htmlspecialchars(addslashes($p_item['checkout_url'])) ?>')">✏️ Editar Plan</button>
                    <button class="admin-btn-action admin-btn-del" onclick="deleteAdminPlan(<?= (int)$p_item['id'] ?>)">🗑️</button>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- SUBTAB 4: CALENDARIO Y MEETS (ABM) -->
          <div id="admin-subtab-meets" class="admin-subtab-content" style="display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
              <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem;">Sesiones en Vivo & Meets</h3>
              <button type="button" class="admin-btn-add" onclick="openAdminMeetModal(0)">➕ Programar Nuevo Meet</button>
            </div>

            <div style="display: flex; flex-direction: column; gap: 14px;">
              <?php foreach ($data['meets'] as $m_row): ?>
                <div class="campus-card" style="display: flex; justify-content: space-between; align-items: center; gap: 16px;">
                  <div>
                    <span style="font-size: 0.72rem; font-weight: 800; background: var(--c-fire-light); color: var(--c-fire-primary); padding: 2px 6px; border-radius: 4px;"><?= htmlspecialchars($m_row['platform']) ?></span>
                    <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.05rem; margin: 4px 0;"><?= htmlspecialchars($m_row['title']) ?></h4>
                    <div style="font-size: 0.82rem; color: var(--c-text-main); font-weight: 700;">🗓️ <?= htmlspecialchars($m_row['date']) ?> • ⏰ <?= htmlspecialchars($m_row['time']) ?></div>
                  </div>
                  <div style="display: flex; gap: 8px;">
                    <button class="admin-btn-action admin-btn-edit" onclick="openAdminMeetModal(<?= (int)$m_row['id'] ?>, '<?= htmlspecialchars(addslashes($m_row['title'])) ?>', '<?= htmlspecialchars(addslashes($m_row['description'])) ?>', '<?= htmlspecialchars(addslashes($m_row['date'])) ?>', '<?= htmlspecialchars(addslashes($m_row['time'])) ?>', '<?= htmlspecialchars(addslashes($m_row['platform'])) ?>', '<?= htmlspecialchars(addslashes($m_row['zoom_url'])) ?>', '<?= htmlspecialchars(addslashes($m_row['google_cal_url'])) ?>')">✏️ Editar</button>
                    <button class="admin-btn-action admin-btn-del" onclick="deleteAdminMeet(<?= (int)$m_row['id'] ?>)">🗑️ Borrar</button>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- SUBTAB 5: CONFIGURACIÓN & GAMIFICACIÓN -->
          <div id="admin-subtab-settings" class="admin-subtab-content" style="display: none;">
            <div class="campus-card" style="max-width: 650px;">
              <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem; margin-bottom: 16px;">Configuración de la Plataforma</h3>

              <form id="formAdminSettings">
                
                <!-- Toggle Gamificación / Fuegos -->
                <div style="background: var(--c-bg-subtle); padding: 18px; border-radius: var(--c-radius); margin-bottom: 20px; border: 1px solid var(--c-border);">
                  <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 14px;">
                    <div>
                      <strong style="font-size: 0.95rem; display: block; margin-bottom: 4px;">🎮 Sistema de Fuegos & Ranking (Gamificación)</strong>
                      <p style="font-size: 0.82rem; color: var(--c-text-muted); line-height: 1.5;">
                        Si está <strong>desactivado</strong>, la plataforma no muestra puntos de fuego ni rankings, permitiendo una experiencia limpia y directa sin requerir tiempo de administración del mentor.
                      </p>
                    </div>
                    <label class="admin-switch">
                      <input type="checkbox" id="settingGamificationInput" <?= $gamification_enabled ? 'checked' : '' ?>>
                      <span class="admin-slider"></span>
                    </label>
                  </div>
                </div>

                <div class="admin-form-group">
                  <label for="settingCommunityName">Nombre de la Comunidad:</label>
                  <input type="text" id="settingCommunityName" class="admin-form-input" value="<?= htmlspecialchars($settings['community_name'] ?? 'Campus Fede Nowback Pro') ?>" required>
                </div>

                <div class="admin-form-group">
                  <label for="settingWhatsapp">Número WhatsApp de Soporte / Mentor (formato internacional sin +):</label>
                  <input type="text" id="settingWhatsapp" class="admin-form-input" value="<?= htmlspecialchars($settings['admin_whatsapp'] ?? '5491138205570') ?>" required>
                </div>

                <div id="settingsFeedbackMsg" style="display: none; padding: 8px 12px; border-radius: 6px; font-size: 0.85rem; margin-bottom: 14px;"></div>

                <button type="submit" class="admin-btn-add" style="width: 100%; justify-content: center; padding: 12px 0;">💾 Guardar Cambios de Configuración</button>
              </form>
            </div>
          </div>

        </section>
      <?php endif; ?>

      <!-- ========================================================================= -->
      <!-- MODALES DE GESTIÓN Y REPRODUCTOR -->
      <!-- ========================================================================= -->

      <!-- 1. Modal Reproductor de Lecciones -->
      <div id="modalLessonPlayer" class="admin-modal-overlay">
        <div class="admin-modal-box" style="max-width: 720px; padding: 20px;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
            <h3 id="playerLessonTitle" style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.15rem;">Reproductor de Clase</h3>
            <button type="button" onclick="closeLessonPlayerModal()" style="background: none; border: none; font-size: 1.4rem; cursor: pointer;">&times;</button>
          </div>
          <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 8px; background: #000; margin-bottom: 14px;">
            <iframe id="playerLessonIframe" src="" style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border:0;" allowfullscreen></iframe>
          </div>
          <p id="playerLessonDesc" style="font-size: 0.88rem; color: var(--c-text-sub); line-height: 1.5;"></p>
        </div>
      </div>

      <!-- 2. Modal Admin: Usuario -->
      <div id="modalAdminUser" class="admin-modal-overlay">
        <div class="admin-modal-box">
          <h3 id="modalUserTitle" style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem; margin-bottom: 16px;">Nuevo Usuario</h3>
          <form id="formAdminUser">
            <input type="hidden" id="adminUserIdInput" value="0">
            <div class="admin-form-group">
              <label for="adminUserNameInput">Nombre Completo:</label>
              <input type="text" id="adminUserNameInput" class="admin-form-input" required>
            </div>
            <div class="admin-form-group">
              <label for="adminUserEmailInput">Email:</label>
              <input type="email" id="adminUserEmailInput" class="admin-form-input" required>
            </div>
            <div class="admin-form-group">
              <label for="adminUserPasswordInput">Contraseña (dejar en blanco para no cambiar):</label>
              <input type="password" id="adminUserPasswordInput" class="admin-form-input" placeholder="••••••••">
            </div>
            <div class="admin-form-group">
              <label for="adminUserRoleInput">Rol:</label>
              <select id="adminUserRoleInput" class="admin-form-select">
                <option value="member">👤 Alumno (Member)</option>
                <option value="admin">👑 Administrador (Admin)</option>
              </select>
            </div>
            <div class="admin-form-group">
              <label for="adminUserPointsInput">Puntos de Fuego Iniciales:</label>
              <input type="number" id="adminUserPointsInput" class="admin-form-input" value="10">
            </div>
            <div class="admin-modal-actions">
              <button type="button" class="btn-reaction" onclick="closeAdminModal('modalAdminUser')">Cancelar</button>
              <button type="submit" class="admin-btn-add">Guardar Usuario</button>
            </div>
          </form>
        </div>
      </div>

      <!-- 3. Modal Admin: Curso -->
      <div id="modalAdminCourse" class="admin-modal-overlay">
        <div class="admin-modal-box">
          <h3 id="modalCourseTitle" style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem; margin-bottom: 16px;">Curso de la Academia</h3>
          <form id="formAdminCourse">
            <input type="hidden" id="adminCourseIdInput" value="0">
            <div class="admin-form-group">
              <label for="adminCourseTitleInput">Título del Curso:</label>
              <input type="text" id="adminCourseTitleInput" class="admin-form-input" required>
            </div>
            <div class="admin-form-group">
              <label for="adminCourseSlugInput">Slug URL (ej: metodo-nowback):</label>
              <input type="text" id="adminCourseSlugInput" class="admin-form-input">
            </div>
            <div class="admin-form-group">
              <label for="adminCourseDurationInput">Duración (ej: 4h 30m):</label>
              <input type="text" id="adminCourseDurationInput" class="admin-form-input" value="3h 00m">
            </div>
            <div class="admin-form-group">
              <label for="adminCourseThumbnailInput">URL Imagen de Portada:</label>
              <input type="text" id="adminCourseThumbnailInput" class="admin-form-input" value="/assets/img/fede_nowback_hero.jpg">
            </div>
            <div class="admin-form-group">
              <label for="adminCourseDescInput">Descripción:</label>
              <textarea id="adminCourseDescInput" class="admin-form-textarea" rows="3"></textarea>
            </div>
            <div class="admin-modal-actions">
              <button type="button" class="btn-reaction" onclick="closeAdminModal('modalAdminCourse')">Cancelar</button>
              <button type="submit" class="admin-btn-add">Guardar Curso</button>
            </div>
          </form>
        </div>
      </div>

      <!-- 4. Modal Admin: Lección -->
      <div id="modalAdminLesson" class="admin-modal-overlay">
        <div class="admin-modal-box">
          <h3 id="modalLessonTitle" style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem; margin-bottom: 16px;">Lección de Clase</h3>
          <form id="formAdminLesson">
            <input type="hidden" id="adminLessonIdInput" value="0">
            <div class="admin-form-group">
              <label for="adminLessonCourseSelect">Curso al que pertenece:</label>
              <select id="adminLessonCourseSelect" class="admin-form-select">
                <?php foreach ($data['courses'] as $c_opt): ?>
                  <option value="<?= htmlspecialchars($c_opt['id']) ?>"><?= htmlspecialchars($c_opt['title']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="admin-form-group">
              <label for="adminLessonTitleInput">Título de la Lección:</label>
              <input type="text" id="adminLessonTitleInput" class="admin-form-input" placeholder="Ej: 1.1 La Regla de Oro..." required>
            </div>
            <div class="admin-form-group">
              <label for="adminLessonVideoInput">URL Video (YouTube / Vimeo Embed / MP4):</label>
              <input type="text" id="adminLessonVideoInput" class="admin-form-input" placeholder="https://www.youtube.com/embed/..." required>
            </div>
            <div class="admin-form-group">
              <label for="adminLessonDurationInput">Duración (ej: 18:45):</label>
              <input type="text" id="adminLessonDurationInput" class="admin-form-input" value="15:00">
            </div>
            <div class="admin-form-group">
              <label for="adminLessonDescInput">Descripción / Tareas:</label>
              <textarea id="adminLessonDescInput" class="admin-form-textarea" rows="3"></textarea>
            </div>
            <div class="admin-form-group" style="display: flex; align-items: center; gap: 8px; margin-top: 8px;">
              <input type="checkbox" id="adminLessonIsFreeInput" style="width: 18px; height: 18px; accent-color: var(--c-fire-primary);">
              <label for="adminLessonIsFreeInput" style="font-size: 0.88rem; font-weight: 700; color: var(--c-text-main); margin: 0; cursor: pointer;">
                🟢 Clase Abierta / Gratis (Visible para visitantes sin login)
              </label>
            </div>
            <div class="admin-modal-actions">
              <button type="button" class="btn-reaction" onclick="closeAdminModal('modalAdminLesson')">Cancelar</button>
              <button type="submit" class="admin-btn-add">Guardar Lección</button>
            </div>
          </form>
        </div>
      </div>

      <!-- 5. Modal Admin: Plan -->
      <div id="modalAdminPlan" class="admin-modal-overlay">
        <div class="admin-modal-box">
          <h3 id="modalPlanTitle" style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem; margin-bottom: 16px;">Plan de Membresía</h3>
          <form id="formAdminPlan">
            <input type="hidden" id="adminPlanIdInput" value="0">
            <div class="admin-form-group">
              <label for="adminPlanNameInput">Nombre del Plan:</label>
              <input type="text" id="adminPlanNameInput" class="admin-form-input" required>
            </div>
            <div class="admin-form-group">
              <label for="adminPlanBadgeInput">Etiqueta Badge (ej: 🔥 Más Popular):</label>
              <input type="text" id="adminPlanBadgeInput" class="admin-form-input" value="Recomendado">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
              <div class="admin-form-group">
                <label for="adminPlanPriceArsInput">Precio ARS ($):</label>
                <input type="number" id="adminPlanPriceArsInput" class="admin-form-input" required>
              </div>
              <div class="admin-form-group">
                <label for="adminPlanPriceUsdInput">Precio USD ($):</label>
                <input type="number" id="adminPlanPriceUsdInput" class="admin-form-input" required>
              </div>
            </div>
            <div class="admin-form-group">
              <label for="adminPlanPeriodInput">Frecuencia / Periodicidad:</label>
              <select id="adminPlanPeriodInput" class="admin-form-select">
                <option value="mensual">Mensual</option>
                <option value="trimestral">Trimestral</option>
                <option value="anual">Anual</option>
                <option value="único">Pago Único</option>
              </select>
            </div>
            <div class="admin-form-group">
              <label for="adminPlanDescInput">Descripción Corta:</label>
              <textarea id="adminPlanDescInput" class="admin-form-textarea" rows="2"></textarea>
            </div>
            <div class="admin-form-group">
              <label for="adminPlanCheckoutInput">Link de Pago / WhatsApp Checkout:</label>
              <input type="text" id="adminPlanCheckoutInput" class="admin-form-input" placeholder="https://wa.me/5491138205570?text=...">
            </div>
            <div class="admin-modal-actions">
              <button type="button" class="btn-reaction" onclick="closeAdminModal('modalAdminPlan')">Cancelar</button>
              <button type="submit" class="admin-btn-add">Guardar Plan</button>
            </div>
          </form>
        </div>
      </div>

      <!-- 6. Modal Admin: Meet -->
      <div id="modalAdminMeet" class="admin-modal-overlay">
        <div class="admin-modal-box">
          <h3 id="modalMeetTitle" style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem; margin-bottom: 16px;">Programar Meet en Vivo</h3>
          <form id="formAdminMeet">
            <input type="hidden" id="adminMeetIdInput" value="0">
            <div class="admin-form-group">
              <label for="adminMeetTitleInput">Título de la Sesión:</label>
              <input type="text" id="adminMeetTitleInput" class="admin-form-input" required>
            </div>
            <div class="admin-form-group">
              <label for="adminMeetDateInput">Fecha (ej: Viernes 18 de Septiembre):</label>
              <input type="text" id="adminMeetDateInput" class="admin-form-input" required>
            </div>
            <div class="admin-form-group">
              <label for="adminMeetTimeInput">Hora (ej: 19:00 hs Buenos Aires):</label>
              <input type="text" id="adminMeetTimeInput" class="admin-form-input" required>
            </div>
            <div class="admin-form-group">
              <label for="adminMeetPlatformInput">Plataforma:</label>
              <input type="text" id="adminMeetPlatformInput" class="admin-form-input" value="Zoom Pro">
            </div>
            <div class="admin-form-group">
              <label for="adminMeetZoomInput">Link de la Reunión:</label>
              <input type="text" id="adminMeetZoomInput" class="admin-form-input" placeholder="https://zoom.us/j/...">
            </div>
            <div class="admin-form-group">
              <label for="adminMeetCalInput">Link de Google Calendar:</label>
              <input type="text" id="adminMeetCalInput" class="admin-form-input" placeholder="https://calendar.google.com/...">
            </div>
            <div class="admin-form-group">
              <label for="adminMeetDescInput">Descripción de la Sesión:</label>
              <textarea id="adminMeetDescInput" class="admin-form-textarea" rows="2"></textarea>
            </div>
            <div class="admin-modal-actions">
              <button type="button" class="btn-reaction" onclick="closeAdminModal('modalAdminMeet')">Cancelar</button>
              <button type="submit" class="admin-btn-add">Guardar Meet</button>
            </div>
          </form>
        </div>
      </div>

      <!-- 7. Modal de Login y Credenciales -->
      <!-- 7. Modal de Login y Credenciales -->
      <div id="modalLogin" class="admin-modal-overlay">
        <div class="admin-modal-box" style="max-width: 440px;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
            <div style="display: flex; align-items: center; gap: 8px;">
              <span style="font-size: 1.4rem;">🔥</span>
              <h3 style="font-family: var(--c-font-head); font-weight: 900; font-size: 1.2rem; color: var(--c-text-main);">Acceso al Campus</h3>
            </div>
            <button type="button" onclick="closeLoginModal()" style="background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--c-text-muted);">&times;</button>
          </div>

          <form id="formCampusLogin">
            <div style="margin-bottom: 14px;">
              <label for="loginEmailInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Email:</label>
              <input type="email" id="loginEmailInput" class="admin-form-input" placeholder="tu@email.com" value="" required>
            </div>
            <div style="margin-bottom: 16px;">
              <label for="loginPasswordInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Contraseña:</label>
              <input type="password" id="loginPasswordInput" class="admin-form-input" placeholder="••••••••" value="" required>
            </div>

            <div id="loginFeedbackMsg" style="display: none; font-size: 0.85rem; padding: 8px 12px; border-radius: 6px; margin-bottom: 14px;"></div>

            <button type="submit" id="btnLoginSubmit" class="admin-btn-add" style="width: 100%; justify-content: center; padding: 11px 0; font-size: 0.95rem; margin-bottom: 12px;">
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

  <!-- JS Controller con soporte completo de ABM y Avatar Dropdown -->
  <script src="/assets/js/campus.js?v=6.0"></script>
</body>
</html>
