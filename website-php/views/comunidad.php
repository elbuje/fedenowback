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
              <img src="<?= htmlspecialchars($user['avatar'] ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80') ?>" alt="<?= htmlspecialchars($user['name']) ?>" class="campus-user-avatar" onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80'">
              <span class="campus-avatar-role-dot">
                <?= $user['role'] === 'admin' ? '👑 Admin' : '👤 ' . htmlspecialchars(explode(' ', $user['name'])[0]) ?> ▾
              </span>
            </div>

            <!-- Menú Flotante del Avatar del Alumno / Admin -->
            <div id="campusAvatarDropdown" class="campus-avatar-dropdown">
              <div class="dropdown-user-header">
                <img src="<?= htmlspecialchars($user['avatar'] ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80') ?>" alt="Avatar" class="dropdown-avatar-lg" onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80'">
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
                <li>
                  <button type="button" onclick="openMyProfileModal(); closeAvatarDropdown();" style="width: 100%; text-align: left; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1); padding: 9px 12px; font-size: 0.88rem; color: #ffffff; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 10px; border-radius: 6px;">
                    <span style="font-size: 1.05rem;">👤</span> <span>Mi Perfil & Avatar</span>
                  </button>
                </li>
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

        <?php if ($is_logged_in): ?>
          <!-- Acceso Directo de Perfil y Salir en Barra de Navegación -->
          <li style="margin-left: auto; display: flex; align-items: center; gap: 8px;">
            <button type="button" onclick="openMyProfileModal()" class="campus-nav-item" style="background: rgba(255, 85, 0, 0.08); color: var(--c-fire-primary); border: 1px solid rgba(255, 85, 0, 0.25); font-weight: 700; cursor: pointer;">
              👤 Mi Perfil
            </button>
            <button type="button" onclick="fedeLogout()" class="campus-nav-item" style="background: rgba(239, 68, 68, 0.08); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.25); font-weight: 700; cursor: pointer;">
              🚪 Salir
            </button>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  <?php if ($is_admin): ?>
    <!-- 👑 BARRA SUPERIOR DE ACCESO RÁPIDO PARA ADMINISTRADOR -->
    <div class="campus-admin-topbar">
      <div class="campus-container">
        <div class="admin-topbar-wrap" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
          <div class="admin-topbar-badge">
            <span>👑</span> <strong>MODO ADMINISTRADOR ACTIVO</strong>
          </div>
          <div class="admin-topbar-actions" style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <button type="button" class="btn-topbar-action" onclick="openAdminLessonModal(0)" title="Cargar nueva masterclass o video">
              🎬 + Cargar Video / Clase
            </button>
            <button type="button" class="btn-topbar-action" onclick="openAdminMeetModal(0)" title="Programar sesión en vivo de Zoom o Google Meet">
              📅 + Configurar Meet en Vivo
            </button>
            <button type="button" class="btn-topbar-action" onclick="openAdminCourseModal(0)" title="Crear un nuevo curso en la academia">
              🎓 + Nuevo Curso
            </button>
            <button type="button" class="btn-topbar-action btn-topbar-highlight" onclick="switchTab('admin')">
              ⚙️ Abrir Panel ABM
            </button>
            <button type="button" class="btn-topbar-action" onclick="openMyProfileModal()" title="Mi Perfil & Avatar" style="background: rgba(255,255,255,0.12); color: #fff;">
              👤 Mi Perfil
            </button>
            <button type="button" class="btn-topbar-action" onclick="fedeLogout()" title="Cerrar Sesión" style="background: rgba(239, 68, 68, 0.25); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.4);">
              🚪 Salir
            </button>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

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
              <!-- VIP WhatsApp Banner para Alumnos y Miembros Registrados -->
              <div class="campus-card" style="margin-bottom: 20px; border: 2px solid #22c55e; background: linear-gradient(135deg, rgba(34, 197, 94, 0.12) 0%, rgba(15, 23, 42, 0.02) 100%); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px; padding: 14px 18px; border-radius: 12px; box-shadow: 0 4px 14px rgba(34, 197, 94, 0.15);">
                <div style="display: flex; align-items: center; gap: 12px;">
                  <div style="width: 44px; height: 44px; border-radius: 50%; background: #22c55e; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; flex-shrink: 0; box-shadow: 0 4px 12px rgba(34, 197, 94, 0.35);">
                    💬
                  </div>
                  <div>
                    <div style="font-size: 0.75rem; font-weight: 800; color: #16a34a; text-transform: uppercase; letter-spacing: 0.04em;">GRUPO OFICIAL DE ALUMNOS & MIEMBROS</div>
                    <div style="font-size: 0.98rem; font-weight: 800; color: var(--c-text-main);">Comunidad Privada de WhatsApp</div>
                    <div style="font-size: 0.82rem; color: var(--c-text-sub);">Avisos de clases en vivo, links directos a Meets y networking exclusivo con Fede.</div>
                  </div>
                </div>
                <a href="https://chat.whatsapp.com/EUM0qZSn8l7EDkjA7GDq8F" target="_blank" rel="noopener noreferrer" class="btn-post-submit" style="background: #22c55e; color: #ffffff; text-decoration: none; font-weight: 800; font-size: 0.88rem; padding: 9px 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(34, 197, 94, 0.25);">
                  🟢 Unirme al Grupo de WhatsApp ↗
                </a>
              </div>
            <?php else: ?>
              <!-- VIP WhatsApp Banner Bloqueado para Visitantes -->
              <div class="campus-card" style="margin-bottom: 20px; border: 1px solid var(--c-border); background: linear-gradient(135deg, rgba(100, 116, 139, 0.08) 0%, rgba(15, 23, 42, 0.02) 100%); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px; padding: 14px 18px; border-radius: 12px;">
                <div style="display: flex; align-items: center; gap: 12px;">
                  <div style="width: 44px; height: 44px; border-radius: 50%; background: #64748b; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; flex-shrink: 0;">
                    🔒
                  </div>
                  <div>
                    <div style="font-size: 0.75rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em;">GRUPO PRIVADO DE ALUMNOS & MIEMBROS</div>
                    <div style="font-size: 0.98rem; font-weight: 800; color: var(--c-text-main);">Comunidad Privada en WhatsApp</div>
                    <div style="font-size: 0.82rem; color: var(--c-text-sub);">Acceso exclusivo para alumnos y miembros registrados con membresía activa.</div>
                  </div>
                </div>
                <button type="button" class="btn-post-submit" style="background: #475569; color: #ffffff; border: none; cursor: pointer; font-weight: 800; font-size: 0.88rem; padding: 9px 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);" onclick="openLoginModal('El grupo privado de WhatsApp es exclusivo para alumnos y miembros registrados.')">
                  🔒 Acceso Alumnos
                </button>
              </div>
            <?php endif; ?>

            <?php if ($is_logged_in): ?>
              <!-- Post Creator Box -->
              <div class="campus-creator-card">
                <form id="formCreatePost">
                  <div class="post-creator-header">
                    <img src="<?= htmlspecialchars($user['avatar'] ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80') ?>" alt="Avatar" class="creator-avatar" onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80'">
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

                  <div class="post-header-row" style="display: flex; justify-content: space-between; align-items: flex-start; gap: 12px;">
                    <div style="display: flex; align-items: center; gap: 12px; flex: 1;">
                      <img src="<?= htmlspecialchars($post['author']['avatar']) ?>" alt="<?= htmlspecialchars($post['author']['name']) ?>" class="post-author-avatar" onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80'">
                      <div>
                        <div style="display: flex; align-items: center; gap: 8px;">
                          <span class="post-author-name"><?= htmlspecialchars($post['author']['name']) ?></span>
                          <span class="badge-role <?= !empty($post['author']['is_host']) ? 'host' : '' ?>"><?= htmlspecialchars($post['author']['badge'] ?? 'Miembro') ?></span>
                        </div>
                        <div class="post-date-line"><?= htmlspecialchars($post['author']['handle']) ?> • <?= htmlspecialchars($post['created_at']) ?></div>
                      </div>
                    </div>

                    <?php if ($is_admin || ($is_logged_in && ($user['id'] ?? '') === ($post['author']['id'] ?? ''))): ?>
                      <button type="button" class="admin-btn-action admin-btn-del btn-delete-post" data-post-id="<?= htmlspecialchars($post['id']) ?>" onclick="deletePost('<?= htmlspecialchars($post['id']) ?>')" title="Eliminar este post">
                        🗑️ Borrar Post
                      </button>
                    <?php endif; ?>
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
                        <div class="comment-bubble" id="comment-<?= htmlspecialchars($comm['id']) ?>">
                          <img src="<?= htmlspecialchars($comm['author']['avatar']) ?>" alt="Avatar" class="comment-avatar" onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80'">
                          <div class="comment-body" style="width: 100%;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                              <div class="comment-author-title">
                                <?= htmlspecialchars($comm['author']['name']) ?> • <span style="color: var(--c-text-light); font-weight: 400;"><?= htmlspecialchars($comm['created_at']) ?></span>
                              </div>
                              <?php if ($is_admin): ?>
                                <button type="button" class="btn-delete-comment" onclick="deleteComment('<?= htmlspecialchars($comm['id']) ?>')" title="Eliminar este comentario" style="background: none; border: none; font-size: 0.85rem; cursor: pointer; opacity: 0.6; padding: 2px 6px;">
                                  🗑️
                                </button>
                              <?php endif; ?>
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
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                  <span style="font-size: 0.72rem; font-weight: 800; color: var(--c-fire-primary); text-transform: uppercase;">
                    🔴 <?= !empty($next_meet['is_recurring']) ? 'SESIÓN RECURRENTE' : 'PRÓXIMA SESIÓN' ?>
                  </span>
                  <span style="font-size: 0.7rem; font-weight: 800; background: #e0f2fe; color: #0369a1; padding: 2px 6px; border-radius: 4px;">
                    <?= htmlspecialchars($next_meet['platform'] ?? 'Google Meet') ?>
                  </span>
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
                      🚀 Entrar al <?= htmlspecialchars($next_meet['platform'] ?? 'Meet') ?>
                    </a>
                  <?php else: ?>
                    <button type="button" class="btn-post-submit" style="flex: 1; text-align: center; font-size: 0.85rem;" onclick="openLoginModal('Las sesiones de Meet en directo son exclusivas para miembros activos.')">
                      🔒 Acceso Alumnos
                    </button>
                  <?php endif; ?>
                  <a href="<?= htmlspecialchars($next_meet['google_cal_url'] ?: '#') ?>" target="_blank" rel="noopener" class="btn-reaction" style="font-size: 0.82rem; text-decoration: none;">
                    📅 Agendar
                  </a>
                  <?php if ($is_admin): ?>
                    <button type="button" class="admin-btn-action admin-btn-edit" style="width: 100%; justify-content: center; text-align: center; margin-top: 6px; padding: 6px 12px; font-size: 0.82rem;" onclick="openAdminMeetModal(<?= (int)$next_meet['id'] ?>, '<?= htmlspecialchars(addslashes($next_meet['title'])) ?>', '<?= htmlspecialchars(addslashes($next_meet['description'])) ?>', '<?= htmlspecialchars(addslashes($next_meet['date'])) ?>', '<?= htmlspecialchars(addslashes($next_meet['time'])) ?>', '<?= htmlspecialchars(addslashes($next_meet['platform'])) ?>', '<?= htmlspecialchars(addslashes($next_meet['zoom_url'])) ?>', '<?= htmlspecialchars(addslashes($next_meet['google_cal_url'])) ?>', <?= !empty($next_meet['is_recurring']) ? 1 : 0 ?>, '<?= htmlspecialchars(addslashes($next_meet['recurrence_type'] ?? 'semanal')) ?>', '<?= htmlspecialchars(addslashes($next_meet['recurrence_day'] ?? 'Viernes')) ?>')">
                      ✏️ Configurar / Editar Meet
                    </button>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>

            <!-- Comunidad WhatsApp Box -->
            <div class="campus-card" style="margin-bottom: 20px; border-left: 4px solid <?= $is_logged_in ? '#22c55e' : '#64748b' ?>; background: linear-gradient(135deg, <?= $is_logged_in ? 'rgba(34, 197, 94, 0.06)' : 'rgba(100, 116, 139, 0.06)' ?> 0%, var(--c-card) 100%);">
              <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                <span style="font-size: 1.3rem;"><?= $is_logged_in ? '💬' : '🔒' ?></span>
                <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.02rem; color: var(--c-text-main);">
                  Comunidad en WhatsApp
                </h4>
              </div>
              <p style="font-size: 0.84rem; color: var(--c-text-sub); margin-bottom: 14px; line-height: 1.45;">
                Sumate al grupo exclusivo de miembros para debates diarios, networking y avisos directos de Fede.
              </p>
              <?php if ($is_logged_in): ?>
                <a href="https://chat.whatsapp.com/EUM0qZSn8l7EDkjA7GDq8F" target="_blank" rel="noopener noreferrer" class="btn-post-submit" style="width: 100%; justify-content: center; background: #22c55e; text-decoration: none; padding: 10px 0; font-weight: 800; font-size: 0.88rem; box-shadow: 0 4px 12px rgba(34, 197, 94, 0.25);">
                  🚀 Unirme al Grupo de WhatsApp ↗
                </a>
              <?php else: ?>
                <button type="button" class="btn-post-submit" style="width: 100%; justify-content: center; background: #475569; color: #ffffff; border: none; cursor: pointer; padding: 10px 0; font-weight: 800; font-size: 0.88rem; box-shadow: 0 4px 12px rgba(0,0,0,0.15);" onclick="openLoginModal('El grupo privado de WhatsApp es exclusivo para alumnos y miembros registrados.')">
                  🔒 Acceso Alumnos / Miembros
                </button>
              <?php endif; ?>
            </div>

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
                  <div style="padding: 12px 14px; border-radius: 10px; border: 1px solid var(--c-border); background: var(--c-bg-subtle);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                      <strong style="font-size: 0.88rem;"><?= htmlspecialchars($plan['name']) ?></strong>
                      <span style="font-size: 0.72rem; font-weight: 800; background: var(--c-fire-light); color: var(--c-fire-primary); padding: 2px 6px; border-radius: 4px;"><?= htmlspecialchars($plan['badge']) ?></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 6px;">
                      <div style="font-size: 0.95rem; font-weight: 900; color: var(--c-fire-primary);">
                        Consultar
                      </div>
                      <a href="<?= htmlspecialchars($plan['checkout_url'] ?: ('https://wa.me/5491138205570?text=' . urlencode('Hola Fede! Quiero consultar sobre el plan ' . $plan['name']))) ?>" target="_blank" rel="noopener" class="btn-reaction" style="padding: 4px 10px; font-size: 0.76rem; font-weight: 700; color: #15803d; background: #dcfce7; text-decoration: none; border-color: #86efac;">
                        💬 Consultar
                      </a>
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
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
          <div>
            <h2 style="font-family: var(--c-font-head); font-size: 1.8rem; font-weight: 900; margin-bottom: 6px;">🎓 Academia Fede Nowback</h2>
            <p style="color: var(--c-text-muted); font-size: 0.95rem;">Masterclasses, estructuras paso a paso y guiones probados para monetizar tu marca personal.</p>
          </div>
          <?php if ($is_admin): ?>
            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
              <button type="button" class="admin-btn-add" onclick="openAdminCourseModal(0)">
                ➕ Cargar Nuevo Curso
              </button>
              <button type="button" class="admin-btn-action" style="background: #0f172a; color: #fff; padding: 10px 16px; font-size: 0.88rem; font-weight: 800; border-radius: 8px;" onclick="openAdminLessonModal(0)">
                🎬 + Cargar Nueva Clase / Video
              </button>
            </div>
          <?php endif; ?>
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

                            <div style="display: flex; align-items: center; gap: 6px;">
                              <?php if ($can_view): ?>
                                <button type="button" class="btn-reaction btn-play-lesson" style="padding: 4px 10px; font-size: 0.78rem; font-weight: 700; color: var(--c-fire-primary);" onclick="playLessonModal('<?= htmlspecialchars(addslashes($les['title'])) ?>', '<?= htmlspecialchars($les['video_url']) ?>', '<?= htmlspecialchars(addslashes($les['description'])) ?>')">
                                  ▶️ Ver Clase
                                </button>
                              <?php else: ?>
                                <button type="button" class="btn-reaction" style="padding: 4px 10px; font-size: 0.78rem; color: #64748b; background: #f1f5f9;" onclick="openLoginModal('Esta lección es exclusiva para miembros Pro. Iniciá sesión o suscribite para acceder.')">
                                  🔒 Desbloquear
                                </button>
                              <?php endif; ?>

                              <?php if ($is_admin): ?>
                                <button type="button" class="admin-btn-action admin-btn-edit" style="padding: 3px 7px; font-size: 0.75rem;" title="Editar clase / video" onclick="openAdminLessonModal(<?= (int)$les['id'] ?>, <?= (int)$course['id'] ?>, '<?= htmlspecialchars(addslashes($les['title'])) ?>', '<?= htmlspecialchars(addslashes($les['video_url'])) ?>', '<?= htmlspecialchars(addslashes($les['duration'])) ?>', '<?= htmlspecialchars(addslashes($les['description'])) ?>', <?= !empty($les['is_free']) ? 1 : 0 ?>)">
                                  ✏️
                                </button>
                                <button type="button" class="admin-btn-action admin-btn-del" style="padding: 3px 7px; font-size: 0.75rem;" title="Eliminar lección" onclick="deleteAdminLesson(<?= (int)$les['id'] ?>)">
                                  🗑️
                                </button>
                              <?php endif; ?>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>

                <?php if ($is_admin): ?>
                  <div style="display: flex; gap: 8px; margin-top: 14px; padding-top: 12px; border-top: 1px dashed var(--c-border);">
                    <button type="button" class="admin-btn-action admin-btn-edit" style="flex: 1; text-align: center;" onclick="openAdminCourseModal(<?= (int)$course['id'] ?>, '<?= htmlspecialchars(addslashes($course['title'])) ?>', '<?= htmlspecialchars(addslashes($course['slug'])) ?>', '<?= htmlspecialchars(addslashes($course['description'])) ?>', '<?= htmlspecialchars(addslashes($course['duration'])) ?>', '<?= htmlspecialchars(addslashes($course['thumbnail'])) ?>', <?= (int)$course['level_required'] ?>)">
                      ✏️ Editar Curso
                    </button>
                    <button type="button" class="admin-btn-action" style="background: #f0fdf4; color: #166534; border-color: #bbf7d0;" onclick="openAdminLessonModal(0, <?= (int)$course['id'] ?>)">
                      ➕ Cargar Clase
                    </button>
                    <button type="button" class="admin-btn-action admin-btn-del" onclick="deleteAdminCourse(<?= (int)$course['id'] ?>)">
                      🗑️
                    </button>
                  </div>
                <?php endif; ?>

              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- TAB 3: CALENDARIO / MEETS -->
      <section id="tab-calendar" class="campus-tab-pane" style="display: none;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
          <div>
            <h2 style="font-family: var(--c-font-head); font-size: 1.8rem; font-weight: 900; margin-bottom: 6px;">📅 Calendario de Sesiones en Vivo</h2>
            <p style="color: var(--c-text-muted); font-size: 0.95rem;">Auditorías 1 a 1, Hot Seats y sesiones grupales en directo con Fede Nowback.</p>
          </div>
          <?php if ($is_admin): ?>
            <button type="button" class="admin-btn-add" onclick="openAdminMeetModal(0)">
              📅 + Programar Nuevo Meet / Zoom
            </button>
          <?php endif; ?>
        </div>

        <div style="display: flex; flex-direction: column; gap: 16px;">
          <?php foreach ($data['meets'] as $meet): ?>
            <div class="campus-card meet-card-full" style="display: flex; justify-content: space-between; align-items: center; gap: 20px;">
              <div>
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
                  <span style="font-size: 0.75rem; font-weight: 800; background: var(--c-fire-light); color: var(--c-fire-primary); padding: 3px 8px; border-radius: 4px;">
                    <?= htmlspecialchars($meet['platform'] ?? 'Google Meet') ?>
                  </span>
                  <?php if (!empty($meet['is_recurring'])): ?>
                    <span style="font-size: 0.72rem; font-weight: 800; background: #fef3c7; color: #b45309; padding: 2px 8px; border-radius: 4px; border: 1px solid #fde68a;">
                      🔄 Recurrente <?= htmlspecialchars(ucfirst($meet['recurrence_type'] ?? 'semanal')) ?> (<?= htmlspecialchars($meet['recurrence_day'] ?? 'Viernes') ?>)
                    </span>
                  <?php else: ?>
                    <span style="font-size: 0.72rem; font-weight: 800; background: #e0f2fe; color: #0369a1; padding: 2px 8px; border-radius: 4px;">
                      📅 Sesión Puntual
                    </span>
                  <?php endif; ?>
                </div>
                <h3 style="font-family: var(--c-font-head); font-size: 1.25rem; font-weight: 800; margin: 6px 0;">
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
                    🚀 Entrar a la Sesión (<?= htmlspecialchars($meet['platform'] ?? 'Meet') ?>)
                  </a>
                <?php else: ?>
                  <button type="button" class="btn-post-submit" style="text-align: center;" onclick="openLoginModal('Las sesiones en directo son exclusivas para miembros activos.')">
                    🔒 Acceso Alumnos
                  </button>
                <?php endif; ?>
                <a href="<?= htmlspecialchars($meet['google_cal_url'] ?: '#') ?>" target="_blank" rel="noopener" class="btn-reaction" style="justify-content: center; text-decoration: none;">
                  📅 Guardar en Google Calendar
                </a>
                <?php if ($is_admin): ?>
                  <div style="display: flex; gap: 6px; margin-top: 4px;">
                    <button type="button" class="admin-btn-action admin-btn-edit" style="flex: 1; text-align: center;" onclick="openAdminMeetModal(<?= (int)$meet['id'] ?>, '<?= htmlspecialchars(addslashes($meet['title'])) ?>', '<?= htmlspecialchars(addslashes($meet['description'])) ?>', '<?= htmlspecialchars(addslashes($meet['date'])) ?>', '<?= htmlspecialchars(addslashes($meet['time'])) ?>', '<?= htmlspecialchars(addslashes($meet['platform'])) ?>', '<?= htmlspecialchars(addslashes($meet['zoom_url'])) ?>', '<?= htmlspecialchars(addslashes($meet['google_cal_url'])) ?>', <?= !empty($meet['is_recurring']) ? 1 : 0 ?>, '<?= htmlspecialchars(addslashes($meet['recurrence_type'] ?? 'semanal')) ?>', '<?= htmlspecialchars(addslashes($meet['recurrence_day'] ?? 'Viernes')) ?>')">
                      ✏️ Editar
                    </button>
                    <button type="button" class="admin-btn-action admin-btn-del" onclick="deleteAdminMeet(<?= (int)$meet['id'] ?>)">
                      🗑️
                    </button>
                  </div>
                <?php endif; ?>
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
                <div class="chat-bubble-row" id="chat-msg-<?= htmlspecialchars($msg['id']) ?>">
                  <img src="<?= htmlspecialchars($msg['avatar']) ?>" alt="<?= htmlspecialchars($msg['author']) ?>" class="comment-avatar" onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80'">
                  <div class="chat-bubble-content <?= !empty($msg['is_host']) ? 'host-msg' : '' ?>" style="position: relative;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2px;">
                      <div style="font-size: 0.78rem; font-weight: 700; color: var(--c-text-muted);">
                        <?= htmlspecialchars($msg['author']) ?> • <?= htmlspecialchars($msg['time']) ?>
                        <?php if (!empty($msg['is_host'])): ?>
                          <span style="font-size: 0.68rem; background: var(--c-fire-primary); color: #fff; padding: 1px 4px; border-radius: 3px;">HOST</span>
                        <?php endif; ?>
                      </div>
                      <?php if ($is_admin): ?>
                        <button type="button" onclick="deleteChatMessage('<?= htmlspecialchars($msg['id']) ?>')" title="Eliminar mensaje" style="background: none; border: none; font-size: 0.75rem; cursor: pointer; opacity: 0.6; padding: 0 4px;">
                          🗑️
                        </button>
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
              <img src="<?= htmlspecialchars($mem['avatar'] ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80') ?>" alt="<?= htmlspecialchars($mem['name']) ?>" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover; margin-bottom: 12px; border: 3px solid var(--c-border);" onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80'">
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
                <div style="font-size: 0.82rem; color: var(--c-text-muted);">Escribí directo a Fede por WhatsApp</div>
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
                <div class="admin-stat-val" id="adminStatPlans"><?= count($data['plans'] ?? []) ?></div>
                <div class="admin-stat-lbl">💳 Planes Activos</div>
              </div>
            </div>

          <!-- Subtabs de Navegación del Admin -->
          <div class="admin-subtabs-nav">
            <button type="button" class="admin-subtab-btn active" data-admin-subtab="courses">🎓 Cursos & Videos / Clases</button>
            <button type="button" class="admin-subtab-btn" data-admin-subtab="meets">📅 Meets & Zooms en Vivo</button>
            <button type="button" class="admin-subtab-btn" data-admin-subtab="moderation">💬 Moderación de Muro & Posts</button>
            <button type="button" class="admin-subtab-btn" data-admin-subtab="users">👥 Gestión de Usuarios</button>
            <button type="button" class="admin-subtab-btn" data-admin-subtab="plans">💳 Planes & Precios</button>
            <button type="button" class="admin-subtab-btn" data-admin-subtab="settings">⚙️ Configuración & Fuegos</button>
          </div>

          <!-- SUBTAB 1: CURSOS Y LECCIONES / VIDEOS (ABM) -->
          <div id="admin-subtab-courses" class="admin-subtab-content">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
              <div>
                <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem;">Cursos & Contenidos de la Academia</h3>
                <p style="font-size: 0.82rem; color: var(--c-text-muted);">Cargá videos de YouTube (se embeben automáticamente), Vimeo o MP4 con títulos y recursos.</p>
              </div>
              <div style="display: flex; gap: 8px;">
                <button type="button" class="admin-btn-add" onclick="openAdminCourseModal(0)">➕ Nuevo Curso</button>
                <button type="button" class="admin-btn-action" style="background: #0f172a; color: #fff; font-weight: 700; padding: 10px 16px;" onclick="openAdminLessonModal(0)">🎬 + Cargar Clase / Video</button>
              </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 20px;">
              <?php foreach ($data['courses'] as $c_item): ?>
                <div class="campus-card" style="border: 1px solid var(--c-border); padding: 20px;">
                  <!-- Course Header -->
                  <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; flex-wrap: wrap; border-bottom: 1px dashed var(--c-border); padding-bottom: 16px; margin-bottom: 14px;">
                    <div style="display: flex; align-items: center; gap: 16px;">
                      <img src="<?= htmlspecialchars($c_item['thumbnail']) ?>" alt="" style="width: 100px; height: 62px; border-radius: 8px; object-fit: cover; border: 1px solid var(--c-border);">
                      <div>
                        <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.15rem; margin-bottom: 4px; color: var(--c-text-main);"><?= htmlspecialchars($c_item['title']) ?></h4>
                        <div style="font-size: 0.82rem; color: var(--c-text-muted);">
                          Slug: <code>/<?= htmlspecialchars($c_item['slug']) ?></code> • <?= (int)$c_item['total_lessons'] ?> Lecciones • Duración: <?= htmlspecialchars($c_item['duration']) ?>
                        </div>
                      </div>
                    </div>
                    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                      <button type="button" class="admin-btn-action" style="background: #f0fdf4; color: #166534; border-color: #bbf7d0; font-weight: 700;" onclick="openAdminLessonModal(0, <?= (int)$c_item['id'] ?>)">
                        ➕ Cargar Clase a este Curso
                      </button>
                      <button type="button" class="admin-btn-action admin-btn-edit" onclick="openAdminCourseModal(<?= (int)$c_item['id'] ?>, '<?= htmlspecialchars(addslashes($c_item['title'])) ?>', '<?= htmlspecialchars(addslashes($c_item['slug'])) ?>', '<?= htmlspecialchars(addslashes($c_item['description'])) ?>', '<?= htmlspecialchars(addslashes($c_item['duration'])) ?>', '<?= htmlspecialchars(addslashes($c_item['thumbnail'])) ?>', <?= (int)$c_item['level_required'] ?>)">
                        ✏️ Editar Curso
                      </button>
                      <button type="button" class="admin-btn-action admin-btn-del" onclick="deleteAdminCourse(<?= (int)$c_item['id'] ?>)">
                        🗑️ Borrar
                      </button>
                    </div>
                  </div>

                  <!-- Lessons List inside this Course -->
                  <div>
                    <div style="font-size: 0.82rem; font-weight: 800; color: var(--c-text-muted); text-transform: uppercase; margin-bottom: 10px;">
                      🎬 Clases y Videos incluidos (<?= (int)$c_item['total_lessons'] ?>):
                    </div>
                    <?php 
                    $has_lessons = false;
                    if (!empty($c_item['modules'])): 
                      foreach ($c_item['modules'] as $mod_item):
                        if (!empty($mod_item['lessons'])):
                          $has_lessons = true;
                          foreach ($mod_item['lessons'] as $les_item):
                    ?>
                      <div style="display: flex; justify-content: space-between; align-items: center; background: var(--c-bg-subtle); border: 1px solid var(--c-border); border-radius: 8px; padding: 10px 14px; margin-bottom: 8px; gap: 10px; flex-wrap: wrap;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                          <span style="font-size: 1.1rem;">🎥</span>
                          <div>
                            <strong style="font-size: 0.9rem; color: var(--c-text-main); display: block;"><?= htmlspecialchars($les_item['title']) ?></strong>
                            <div style="font-size: 0.78rem; color: var(--c-text-muted);">
                              ⏱️ <?= htmlspecialchars($les_item['duration'] ?: '15:00') ?> 
                              <?php if (!empty($les_item['is_free'])): ?>
                                <span style="font-size: 0.7rem; font-weight: 800; background: #dcfce7; color: #15803d; padding: 2px 6px; border-radius: 4px; margin-left: 6px;">GRATIS</span>
                              <?php endif; ?>
                              <?php if (!empty($les_item['video_url'])): ?>
                                <span style="margin-left: 8px; color: #0284c7;">🔗 <?= htmlspecialchars(substr($les_item['video_url'], 0, 40)) ?>...</span>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                        <div style="display: flex; gap: 6px; align-items: center;">
                          <button type="button" class="btn-reaction" style="padding: 5px 12px; font-size: 0.8rem; font-weight: 800; color: var(--c-fire-primary); background: var(--c-card); border-color: var(--c-fire-primary);" onclick="playLessonModal('<?= htmlspecialchars(addslashes($les_item['title'])) ?>', '<?= htmlspecialchars($les_item['video_url']) ?>', '<?= htmlspecialchars(addslashes($les_item['description'])) ?>')">
                            ▶️ Ver / Probar Video
                          </button>
                          <button type="button" class="admin-btn-action admin-btn-edit" style="padding: 5px 10px; font-size: 0.8rem;" onclick="openAdminLessonModal(<?= (int)$les_item['id'] ?>, <?= (int)$c_item['id'] ?>, '<?= htmlspecialchars(addslashes($les_item['title'])) ?>', '<?= htmlspecialchars($les_item['video_url']) ?>', '<?= htmlspecialchars(addslashes($les_item['duration'])) ?>', '<?= htmlspecialchars(addslashes($les_item['description'])) ?>', <?= !empty($les_item['is_free']) ? 1 : 0 ?>)">
                            ✏️
                          </button>
                          <button type="button" class="admin-btn-action admin-btn-del" style="padding: 5px 10px; font-size: 0.8rem;" onclick="deleteAdminLesson(<?= (int)$les_item['id'] ?>)">
                            🗑️
                          </button>
                        </div>
                      </div>
                    <?php 
                          endforeach;
                        endif;
                      endforeach;
                    endif; 
                    if (!$has_lessons): ?>
                      <div style="padding: 14px; background: var(--c-bg-subtle); border-radius: 8px; border: 1px dashed var(--c-border); text-align: center; color: var(--c-text-muted); font-size: 0.85rem;">
                        No hay clases cargadas en este curso todavía. <a href="javascript:void(0)" onclick="openAdminLessonModal(0, <?= (int)$c_item['id'] ?>)" style="color: var(--c-fire-primary); font-weight: 700;">Hacé clic acá para cargar la primera clase</a>.
                      </div>
                    <?php endif; ?>
                  </div>

                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- SUBTAB 2: CALENDARIO Y MEETS (ABM) -->
          <div id="admin-subtab-meets" class="admin-subtab-content" style="display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
              <div>
                <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem;">Sesiones en Vivo & Zoom Meets</h3>
                <p style="font-size: 0.82rem; color: var(--c-text-muted);">Configurá las próximas sesiones de Hot Seats y mentorías con enlaces directos.</p>
              </div>
              <button type="button" class="admin-btn-add" onclick="openAdminMeetModal(0)">📅 + Programar Nuevo Meet / Zoom</button>
            </div>

            <div style="display: flex; flex-direction: column; gap: 14px;">
              <?php foreach ($data['meets'] as $m_row): ?>
                <div class="campus-card" style="display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap;">
                  <div>
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                      <span style="font-size: 0.72rem; font-weight: 800; background: var(--c-fire-light); color: var(--c-fire-primary); padding: 2px 6px; border-radius: 4px;"><?= htmlspecialchars($m_row['platform']) ?></span>
                      <?php if (!empty($m_row['is_recurring'])): ?>
                        <span style="font-size: 0.7rem; font-weight: 800; background: #fef3c7; color: #b45309; padding: 2px 6px; border-radius: 4px;">🔄 <?= htmlspecialchars(ucfirst($m_row['recurrence_type'] ?? 'semanal')) ?> (<?= htmlspecialchars($m_row['recurrence_day'] ?? 'Viernes') ?>)</span>
                      <?php endif; ?>
                    </div>
                    <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.05rem; margin: 4px 0;"><?= htmlspecialchars($m_row['title']) ?></h4>
                    <div style="font-size: 0.82rem; color: var(--c-text-main); font-weight: 700;">🗓️ <?= htmlspecialchars($m_row['date']) ?> • ⏰ <?= htmlspecialchars($m_row['time']) ?></div>
                    <?php if (!empty($m_row['zoom_url'])): ?>
                      <div style="font-size: 0.78rem; color: #0284c7; margin-top: 2px;">🔗 Link: <?= htmlspecialchars(substr($m_row['zoom_url'], 0, 45)) ?>...</div>
                    <?php endif; ?>
                  </div>
                  <div style="display: flex; gap: 8px;">
                    <button class="admin-btn-action admin-btn-edit" onclick="openAdminMeetModal(<?= (int)$m_row['id'] ?>, '<?= htmlspecialchars(addslashes($m_row['title'])) ?>', '<?= htmlspecialchars(addslashes($m_row['description'])) ?>', '<?= htmlspecialchars(addslashes($m_row['date'])) ?>', '<?= htmlspecialchars(addslashes($m_row['time'])) ?>', '<?= htmlspecialchars(addslashes($m_row['platform'])) ?>', '<?= htmlspecialchars(addslashes($m_row['zoom_url'])) ?>', '<?= htmlspecialchars(addslashes($m_row['google_cal_url'])) ?>', <?= !empty($m_row['is_recurring']) ? 1 : 0 ?>, '<?= htmlspecialchars(addslashes($m_row['recurrence_type'] ?? 'semanal')) ?>', '<?= htmlspecialchars(addslashes($m_row['recurrence_day'] ?? 'Viernes')) ?>')">✏️ Editar Meet</button>
                    <button class="admin-btn-action admin-btn-del" onclick="deleteAdminMeet(<?= (int)$m_row['id'] ?>)">🗑️ Borrar</button>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- SUBTAB 3: MODERACIÓN DE MURO & MENSAJES -->
          <div id="admin-subtab-moderation" class="admin-subtab-content" style="display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
              <div>
                <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem;">💬 Moderación de Publicaciones & Debates</h3>
                <p style="font-size: 0.82rem; color: var(--c-text-muted);">Revisá y eliminá cualquier publicación o mensaje indebido con 1 solo clic.</p>
              </div>
            </div>

            <table class="admin-table">
              <thead>
                <tr>
                  <th>Publicación</th>
                  <th>Autor</th>
                  <th>Categoría</th>
                  <th>Fecha</th>
                  <th>Respuestas</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody id="adminPostsTableBody">
                <?php foreach ($data['posts'] as $p_row): ?>
                  <tr id="admin-post-row-<?= htmlspecialchars($p_row['id']) ?>">
                    <td>
                      <strong><?= htmlspecialchars($p_row['title']) ?></strong>
                      <div style="font-size: 0.78rem; color: var(--c-text-muted); max-width: 320px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <?= htmlspecialchars(strip_tags($p_row['content'])) ?>
                      </div>
                    </td>
                    <td>
                      <div style="display: flex; align-items: center; gap: 6px;">
                        <img src="<?= htmlspecialchars($p_row['author']['avatar']) ?>" alt="" style="width: 24px; height: 24px; border-radius: 50%;">
                        <span><?= htmlspecialchars($p_row['author']['name']) ?></span>
                      </div>
                    </td>
                    <td><span style="font-size: 0.75rem; background: var(--c-bg-subtle); padding: 2px 6px; border-radius: 4px;"><?= htmlspecialchars($p_row['category']) ?></span></td>
                    <td><small style="color: var(--c-text-muted);"><?= htmlspecialchars($p_row['created_at']) ?></small></td>
                    <td>💬 <?= count($p_row['comments'] ?? []) ?></td>
                    <td>
                      <button class="admin-btn-action admin-btn-del" onclick="deletePost('<?= htmlspecialchars($p_row['id']) ?>')">
                        🗑️ Borrar Post
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- SUBTAB 4: USUARIOS (ABM CON BUSCADOR, PLANES Y ORDENAMIENTO) -->
          <div id="admin-subtab-users" class="admin-subtab-content" style="display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 12px;">
              <div>
                <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.25rem; margin-bottom: 4px;">Directorio de Usuarios & Alumnos</h3>
                <p style="font-size: 0.82rem; color: var(--c-text-muted);">
                  Gestioná cuentas en MySQL, planes contratados, vencimientos y compartí accesos por WhatsApp.
                </p>
              </div>
              <button type="button" class="admin-btn-add" onclick="openAdminUserModal(0)">➕ Nuevo Usuario / Alumno</button>
            </div>

            <!-- Toolbar con Buscador y Filtros -->
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 14px; flex-wrap: wrap;">
              <div style="position: relative; flex: 1; max-width: 420px;">
                <input type="text" id="adminUsersSearchInput" class="admin-form-input" placeholder="🔍 Buscar por nombre, email, plan o rol..." style="padding-left: 36px;">
                <span style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); font-size: 0.9rem; color: var(--c-text-muted);">🔍</span>
              </div>
              <div style="font-size: 0.84rem; color: var(--c-text-muted); font-weight: 700;" id="adminUsersCountLabel">
                Mostrando <?= count($data['members']) ?> usuarios
              </div>
            </div>

            <div style="overflow-x: auto;">
              <table class="admin-table" id="adminUsersTable">
                <thead>
                  <tr>
                    <th style="cursor: pointer;" onclick="sortAdminUsersTable('name')">Usuario <span class="sort-icon">↕️</span></th>
                    <th style="cursor: pointer;" onclick="sortAdminUsersTable('email')">Email <span class="sort-icon">↕️</span></th>
                    <th style="cursor: pointer;" onclick="sortAdminUsersTable('plan')">Plan Contratado <span class="sort-icon">↕️</span></th>
                    <th style="cursor: pointer;" onclick="sortAdminUsersTable('expiry')">Estado / Vencimiento <span class="sort-icon">↕️</span></th>
                    <th style="cursor: pointer;" onclick="sortAdminUsersTable('role')">Rol <span class="sort-icon">↕️</span></th>
                    <th style="cursor: pointer;" onclick="sortAdminUsersTable('points')">Fuego <span class="sort-icon">↕️</span></th>
                    <th style="text-align: right;">Acciones</th>
                  </tr>
                </thead>
                <tbody id="adminUsersTableBody">
                  <?php foreach ($data['members'] as $u_row): 
                    $uid = (int)($u_row['numeric_id'] ?? $u_row['id']);
                    $expiry_badge = '';
                    if ($u_row['expiry_status'] === 'lifetime') {
                      $expiry_badge = '<span style="font-size: 0.74rem; font-weight: 800; background: #e0f2fe; color: #0369a1; padding: 3px 8px; border-radius: 4px;">💎 Vitalicio</span>';
                    } elseif ($u_row['expiry_status'] === 'expired') {
                      $expiry_badge = '<span style="font-size: 0.74rem; font-weight: 800; background: #fee2e2; color: #b91c1c; padding: 3px 8px; border-radius: 4px;">🔴 Vencido (' . htmlspecialchars($u_row['plan_expires_at']) . ')</span>';
                    } elseif ($u_row['expiry_status'] === 'expiring_soon') {
                      $expiry_badge = '<span style="font-size: 0.74rem; font-weight: 800; background: #fef3c7; color: #b45309; padding: 3px 8px; border-radius: 4px;">🟡 Vence en ' . (int)$u_row['plan_days_left'] . 'd</span>';
                    } else {
                      $expiry_badge = '<span style="font-size: 0.74rem; font-weight: 800; background: #dcfce7; color: #15803d; padding: 3px 8px; border-radius: 4px;">🟢 Activo (' . htmlspecialchars($u_row['plan_expires_at']) . ')</span>';
                    }
                  ?>
                    <tr id="admin-user-row-<?= $uid ?>" 
                        data-name="<?= htmlspecialchars(strtolower($u_row['name'])) ?>" 
                        data-email="<?= htmlspecialchars(strtolower($u_row['email'])) ?>" 
                        data-plan="<?= htmlspecialchars(strtolower($u_row['plan_name'])) ?>" 
                        data-role="<?= htmlspecialchars(strtolower($u_row['role'])) ?>" 
                        data-points="<?= (int)$u_row['points'] ?>"
                        data-expiry="<?= htmlspecialchars($u_row['plan_expires_at'] ?: '9999-12-31') ?>">
                      <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                          <img src="<?= htmlspecialchars($u_row['avatar'] ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80') ?>" alt="" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 1px solid var(--c-border);">
                          <div>
                            <strong style="display: block; font-size: 0.9rem; color: var(--c-text-main);"><?= htmlspecialchars($u_row['name']) ?></strong>
                            <span style="font-size: 0.75rem; color: var(--c-text-muted);"><?= htmlspecialchars($u_row['handle']) ?></span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <a href="mailto:<?= htmlspecialchars($u_row['email']) ?>" style="color: var(--c-text-sub); text-decoration: none; font-size: 0.84rem;">
                          <?= htmlspecialchars($u_row['email']) ?>
                        </a>
                      </td>
                      <?php if ($u_row['role'] === 'admin'): ?>
                        <td>
                          <span style="font-size: 0.8rem; font-weight: 800; color: #b45309; background: #fef3c7; padding: 4px 10px; border-radius: 6px; border: 1px solid #fde68a; display: inline-block;">
                            👑 Acceso Total (Admin)
                          </span>
                        </td>
                        <td>
                          <span style="font-size: 0.74rem; font-weight: 800; background: #e0f2fe; color: #0369a1; padding: 3px 8px; border-radius: 4px;">💎 Ilimitado</span>
                        </td>
                      <?php else: ?>
                        <td>
                          <span style="font-size: 0.8rem; font-weight: 800; color: #0f172a; background: #e2e8f0; padding: 4px 10px; border-radius: 6px; border: 1px solid #cbd5e1; display: inline-block; box-shadow: 0 1px 2px rgba(0,0,0,0.06);">
                            <?= htmlspecialchars($u_row['plan_name'] ?: 'Campus Nowback Pro') ?>
                          </span>
                        </td>
                        <td><?= $expiry_badge ?></td>
                      <?php endif; ?>
                      <td>
                        <span class="dropdown-role-badge <?= $u_row['role'] === 'admin' ? 'admin' : 'member' ?>">
                          <?= $u_row['role'] === 'admin' ? '👑 Admin' : '👤 Alumno' ?>
                        </span>
                      </td>
                      <td>🔥 <?= (int)$u_row['points'] ?></td>
                      <td style="text-align: right; white-space: nowrap;">
                        <button type="button" class="admin-btn-action admin-btn-edit" style="padding: 4px 8px; font-size: 0.78rem;" title="Editar Usuario" onclick="openAdminUserModal(<?= $uid ?>, '<?= htmlspecialchars(addslashes($u_row['name'])) ?>', '<?= htmlspecialchars(addslashes($u_row['email'])) ?>', '<?= htmlspecialchars($u_row['role']) ?>', <?= (int)$u_row['points'] ?>, <?= (int)($u_row['plan_id'] ?? 0) ?>, '<?= htmlspecialchars(addslashes($u_row['plan_name'])) ?>', '<?= htmlspecialchars($u_row['plan_expires_at'] ?? '') ?>', '<?= htmlspecialchars(addslashes($u_row['handle'])) ?>')">
                          ✏️ Editar
                        </button>
                        <button type="button" class="admin-btn-action" style="padding: 4px 8px; font-size: 0.78rem; background: #dcfce7; color: #166534; border-color: #86efac;" title="Enviar accesos por WhatsApp" onclick="openWhatsAppModalForUser('<?= htmlspecialchars(addslashes($u_row['name'])) ?>', '<?= htmlspecialchars(addslashes($u_row['email'])) ?>', '<?= htmlspecialchars($u_row['role']) ?>', '<?= htmlspecialchars(addslashes($u_row['plan_name'])) ?>')">
                          📲 WhatsApp
                        </button>
                        <?php if ($uid > 1): ?>
                          <button type="button" class="admin-btn-action admin-btn-del" style="padding: 4px 8px; font-size: 0.78rem;" title="Eliminar Usuario" onclick="deleteAdminUser(<?= $uid ?>)">
                            🗑️
                          </button>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- SUBTAB 5: PLANES Y PRECIOS (ABM) -->
          <div id="admin-subtab-plans" class="admin-subtab-content" style="display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
              <div>
                <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem;">Planes de Suscripción & Precios</h3>
                <p style="font-size: 0.82rem; color: var(--c-text-muted);">Configurá los planes visibles para los alumnos en la web y checkout.</p>
              </div>
              <button type="button" class="admin-btn-add" onclick="openAdminPlanModal(0)">➕ Nuevo Plan</button>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
              <?php foreach ($data['plans'] as $plan): ?>
                <div class="campus-card" style="border: 1px solid var(--c-border); display: flex; flex-direction: column; justify-content: space-between;">
                  <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                      <span style="font-size: 0.72rem; font-weight: 800; background: var(--c-fire-light); color: var(--c-fire-primary); padding: 2px 6px; border-radius: 4px;"><?= htmlspecialchars($plan['badge']) ?></span>
                      <span style="font-size: 0.82rem; color: #16a34a; font-weight: 700;">Activo</span>
                    </div>
                    <h4 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.1rem;"><?= htmlspecialchars($plan['name']) ?></h4>
                    <div style="font-size: 1.3rem; font-weight: 900; color: var(--c-text-main); margin: 6px 0;">
                      $<?= number_format($plan['price_ars'], 0, ',', '.') ?> <span style="font-size: 0.8rem; color: var(--c-text-muted); font-weight: 600;">/ <?= htmlspecialchars($plan['period']) ?></span>
                      <span style="font-size: 0.85rem; color: #0284c7; font-weight: 700;">(U$D <?= (int)$plan['price_usd'] ?>)</span>
                    </div>
                    <p style="font-size: 0.82rem; color: var(--c-text-sub); margin-bottom: 12px;"><?= htmlspecialchars($plan['description']) ?></p>
                  </div>
                  <div style="display: flex; gap: 8px; border-top: 1px solid var(--c-border); padding-top: 10px;">
                    <button class="admin-btn-action admin-btn-edit" onclick="openAdminPlanModal(<?= (int)$plan['id'] ?>, '<?= htmlspecialchars(addslashes($plan['name'])) ?>', '<?= htmlspecialchars(addslashes($plan['badge'])) ?>', <?= (int)$plan['price_ars'] ?>, <?= (int)$plan['price_usd'] ?>, '<?= htmlspecialchars(addslashes($plan['period'])) ?>', '<?= htmlspecialchars(addslashes($plan['description'])) ?>', '<?= htmlspecialchars(addslashes($plan['checkout_url'])) ?>')">✏️ Editar Plan</button>
                    <button class="admin-btn-action admin-btn-del" onclick="deleteAdminPlan(<?= (int)$plan['id'] ?>)">🗑️ Borrar</button>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- SUBTAB 6: CONFIGURACIÓN GENERAL & GAMIFICACIÓN -->
          <div id="admin-subtab-settings" class="admin-subtab-content" style="display: none;">
            <div style="margin-bottom: 16px;">
              <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem;">⚙️ Configuración del Campus & Ecosistema</h3>
              <p style="font-size: 0.82rem; color: var(--c-text-muted);">Ajustá el nombre del campus, números de contacto y opciones globales.</p>
            </div>

            <form id="formAdminSettings" class="campus-card" style="max-width: 600px;">
              <div class="admin-form-group">
                <label for="settingCommunityName">Nombre de la Comunidad / Campus:</label>
                <input type="text" id="settingCommunityName" class="admin-form-input" value="<?= htmlspecialchars($data['settings']['community_name'] ?? 'Campus Fede Nowback Pro') ?>" required>
              </div>

              <div class="admin-form-group">
                <label for="settingAdminWhatsapp">WhatsApp de Soporte / Mentor (con código de país):</label>
                <input type="text" id="settingAdminWhatsapp" class="admin-form-input" value="<?= htmlspecialchars($data['settings']['admin_whatsapp'] ?? '5491138205570') ?>" required>
              </div>

              <div style="margin: 18px 0; padding: 14px; background: var(--c-bg-subtle); border-radius: 8px; border: 1px solid var(--c-border);">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                  <div>
                    <strong style="font-size: 0.95rem; color: var(--c-text-main);">Gamificación & Puntos de Fuego 🔥</strong>
                    <p style="font-size: 0.8rem; color: var(--c-text-muted); margin-top: 2px;">Permite que los alumnos sumen puntos con likes y desbloqueen rangos y cursos.</p>
                  </div>
                  <input type="checkbox" id="settingEnableGamification" style="width: 20px; height: 20px; accent-color: var(--c-fire-primary); cursor: pointer;" <?= $gamification_enabled ? 'checked' : '' ?>>
                </div>
              </div>

              <div id="adminSettingsFeedbackMsg" style="display: none; font-size: 0.85rem; padding: 8px 12px; border-radius: 6px; margin-bottom: 14px;"></div>

              <button type="submit" id="btnAdminSettingsSubmit" class="admin-btn-add" style="padding: 10px 20px;">
                💾 Guardar Configuración
              </button>
            </form>
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
        <div class="admin-modal-box" style="max-width: 520px;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h3 id="modalUserTitle" style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.25rem;">Nuevo Usuario / Alumno</h3>
            <button type="button" onclick="closeAdminModal('modalAdminUser')" style="background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--c-text-muted);">&times;</button>
          </div>

          <form id="formAdminUser">
            <input type="hidden" id="adminUserIdInput" value="0">
            <input type="hidden" id="adminUserPlanNameInput" value="Campus Nowback Pro (Mensual)">

            <div class="admin-form-group">
              <label for="adminUserNameInput">Nombre Completo <span style="color: #ef4444;">*</span>:</label>
              <input type="text" id="adminUserNameInput" class="admin-form-input" placeholder="Ej: Marcela Gómez" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
              <div class="admin-form-group" style="margin-bottom: 0;">
                <label for="adminUserEmailInput">Email de Acceso <span style="color: #ef4444;">*</span>:</label>
                <input type="email" id="adminUserEmailInput" class="admin-form-input" placeholder="alumno@correo.com" required>
              </div>
              <div class="admin-form-group" style="margin-bottom: 0;">
                <label for="adminUserHandleInput">Nombre de Usuario (@):</label>
                <input type="text" id="adminUserHandleInput" class="admin-form-input" placeholder="@usuario">
              </div>
            </div>

            <!-- Password with Eye Toggle -->
            <div class="admin-form-group">
              <label id="lblAdminUserPassword" for="adminUserPasswordInput">Contraseña <span style="color: #ef4444;">*</span>:</label>
              <div style="position: relative; display: flex; align-items: center;">
                <input type="password" id="adminUserPasswordInput" class="admin-form-input" placeholder="••••••••" style="padding-right: 42px;">
                <button type="button" class="btn-toggle-eye" onclick="togglePasswordEye('adminUserPasswordInput', this)" style="position: absolute; right: 8px; background: none; border: none; font-size: 1.1rem; cursor: pointer; padding: 4px 6px; color: var(--c-text-muted);" title="Mostrar/Ocultar contraseña">
                  👁️
                </button>
              </div>
            </div>

            <!-- Confirm Password with Eye Toggle -->
            <div class="admin-form-group">
              <label for="adminUserConfirmPasswordInput">Confirmar Contraseña:</label>
              <div style="position: relative; display: flex; align-items: center;">
                <input type="password" id="adminUserConfirmPasswordInput" class="admin-form-input" placeholder="••••••••" style="padding-right: 42px;">
                <button type="button" class="btn-toggle-eye" onclick="togglePasswordEye('adminUserConfirmPasswordInput', this)" style="position: absolute; right: 8px; background: none; border: none; font-size: 1.1rem; cursor: pointer; padding: 4px 6px; color: var(--c-text-muted);" title="Mostrar/Ocultar contraseña">
                  👁️
                </button>
              </div>
              <small id="passwordMatchIndicator" style="display: none; font-size: 0.78rem; font-weight: 700; margin-top: 4px;"></small>
            </div>

            <!-- Rol de Usuario y Puntos -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 16px;">
              <div class="admin-form-group">
                <label for="adminUserRoleInput">Rol de Usuario:</label>
                <select id="adminUserRoleInput" class="admin-form-select" onchange="handleAdminUserRoleChange(this.value)">
                  <option value="member">👤 Alumno (Member)</option>
                  <option value="admin">👑 Administrador (Admin)</option>
                </select>
              </div>
              <div class="admin-form-group">
                <label for="adminUserPointsInput">Puntos de Fuego:</label>
                <input type="number" id="adminUserPointsInput" class="admin-form-input" value="10">
              </div>
            </div>

            <!-- Aviso para Administradores (Sin Plan) -->
            <div id="adminUserRoleNotice" style="display: none; background: #fef3c7; border: 1px solid #fde68a; color: #92400e; padding: 12px 14px; border-radius: 8px; font-size: 0.84rem; font-weight: 700; margin-bottom: 16px; line-height: 1.45;">
              👑 <strong>Acceso Total de Administrador:</strong> No requiere asignación de plan ni fecha de caducidad. Cuenta con acceso libre y permanente a todos los módulos y salas.
            </div>

            <!-- Plan Selection & Expiration (Solo para Alumnos) -->
            <div id="adminUserPlanSection" style="background: var(--c-bg-subtle); padding: 14px; border-radius: 8px; border: 1px solid var(--c-border); margin-bottom: 16px;">
              <div class="admin-form-group" style="margin-bottom: 12px;">
                <label for="adminUserPlanSelect">Plan de Suscripción Contratado:</label>
                <select id="adminUserPlanSelect" class="admin-form-select" onchange="syncPlanSelection(this)">
                  <option value="0" data-plan-name="Campus Nowback Pro (Mensual)">Campus Nowback Pro (Mensual)</option>
                  <?php foreach ($data['plans'] as $pl): ?>
                    <option value="<?= (int)$pl['id'] ?>" data-plan-name="<?= htmlspecialchars($pl['name']) ?>">
                      <?= htmlspecialchars($pl['name']) ?> (U$D <?= (int)$pl['price_usd'] ?>)
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="admin-form-group" style="margin-bottom: 8px;">
                <label for="adminUserExpiresInput">Fecha de Caducidad / Vencimiento:</label>
                <input type="date" id="adminUserExpiresInput" class="admin-form-input" value="">
              </div>

              <!-- Quick Expiration Buttons -->
              <div style="display: flex; gap: 6px; flex-wrap: wrap; margin-top: 6px;">
                <button type="button" class="btn-reaction" style="font-size: 0.74rem; padding: 3px 8px;" onclick="setUserExpiryDays(30)">+30 días</button>
                <button type="button" class="btn-reaction" style="font-size: 0.74rem; padding: 3px 8px;" onclick="setUserExpiryDays(90)">+90 días</button>
                <button type="button" class="btn-reaction" style="font-size: 0.74rem; padding: 3px 8px;" onclick="setUserExpiryDays(365)">+1 año</button>
                <button type="button" class="btn-reaction" style="font-size: 0.74rem; padding: 3px 8px; font-weight: 800; color: #0369a1;" onclick="document.getElementById('adminUserExpiresInput').value = '';">💎 Vitalicio</button>
              </div>
            </div>

            <!-- Checkbox: Send Welcome Email -->
            <div style="display: flex; align-items: center; gap: 8px; margin: 12px 0 16px 0;">
              <input type="checkbox" id="adminUserSendEmailInput" checked style="width: 16px; height: 16px; accent-color: var(--c-fire-primary); cursor: pointer;">
              <label for="adminUserSendEmailInput" style="font-size: 0.84rem; color: var(--c-text-sub); cursor: pointer; font-weight: 600;">
                📧 Enviar correo de bienvenida con datos de acceso y link al campus
              </label>
            </div>

            <div id="adminUserFeedbackMsg" style="display: none; font-size: 0.85rem; padding: 8px 12px; border-radius: 6px; margin-bottom: 14px;"></div>

            <div class="admin-modal-actions" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
              <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                <button type="button" class="btn-reaction" style="color: #166534; background: #dcfce7; border-color: #86efac; font-weight: 700; font-size: 0.84rem;" onclick="openWhatsAppModalFromForm()">
                  📲 Mensaje WhatsApp
                </button>
                <button type="button" class="btn-reaction" style="color: #1d4ed8; background: #dbeafe; border-color: #93c5fd; font-weight: 700; font-size: 0.84rem;" onclick="copyModalUserWhatsApp()">
                  📋 Copiar
                </button>
              </div>
              <div style="display: flex; gap: 8px;">
                <button type="button" class="btn-reaction" onclick="closeAdminModal('modalAdminUser')">Cancelar</button>
                <button type="submit" id="btnAdminUserSubmit" class="admin-btn-add">💾 Guardar Usuario</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Modal: Generador / Copiador de Mensaje de WhatsApp -->
      <div id="modalWhatsAppShare" class="admin-modal-overlay">
        <div class="admin-modal-box" style="max-width: 540px;">
          <h3 style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.2rem; margin-bottom: 10px; color: #166534; display: flex; align-items: center; gap: 8px;">
            📲 Mensaje de Acceso para WhatsApp
          </h3>
          <p style="font-size: 0.85rem; color: var(--c-text-sub); margin-bottom: 14px; line-height: 1.45;">
            Copiá y pegá este mensaje directamente en el chat de WhatsApp del alumno o administrador:
          </p>

          <input type="hidden" id="waShareName">
          <input type="hidden" id="waShareEmail">
          <input type="hidden" id="waShareRole">
          <input type="hidden" id="waSharePlanName">

          <div class="admin-form-group" style="margin-bottom: 12px;">
            <label for="waSharePasswordInput" style="font-size: 0.82rem; font-weight: 700;">🔑 Contraseña asignada:</label>
            <input type="text" id="waSharePasswordInput" class="admin-form-input" placeholder="Escribí o modificá la contraseña para el mensaje" oninput="refreshWhatsAppPreviewText()">
          </div>

          <div class="admin-form-group" style="margin-bottom: 14px;">
            <label for="waShareMessagePreview" style="font-size: 0.82rem; font-weight: 700;">Texto para WhatsApp (Listo para copiar):</label>
            <textarea id="waShareMessagePreview" class="admin-form-input" rows="8" style="font-family: monospace; font-size: 0.85rem; line-height: 1.45; background: var(--c-bg-subtle); color: var(--c-text-main); white-space: pre-wrap;"></textarea>
          </div>

          <div id="waCopyAlert" style="display: none; background: #dcfce7; border: 1px solid #86efac; color: #166534; padding: 10px 14px; border-radius: 6px; font-size: 0.85rem; font-weight: 700; margin-bottom: 14px; text-align: center;">
            ✅ ¡Mensaje copiado al portapapeles! Listo para pegar en WhatsApp.
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px;">
            <button type="button" class="btn-reaction" onclick="closeAdminModal('modalWhatsAppShare')">Cerrar</button>
            <div style="display: flex; gap: 8px;">
              <button type="button" class="admin-btn-add" style="background: #2563eb; color: #fff;" onclick="copyWhatsAppGeneratedMessage()">
                📋 Copiar Mensaje
              </button>
              <button type="button" class="admin-btn-add" style="background: #16a34a; color: #fff;" onclick="openWhatsAppDirectLink()">
                🟢 Abrir en WhatsApp
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- 3. Modal Admin: Curso -->
      <div id="modalAdminCourse" class="admin-modal-overlay">
        <div class="admin-modal-box" style="max-width: 520px;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h3 id="modalCourseTitle" style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.25rem; color: var(--c-text-main);">Curso de la Academia</h3>
            <button type="button" onclick="closeAdminModal('modalAdminCourse')" style="background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--c-text-muted);">&times;</button>
          </div>
          <form id="formAdminCourse">
            <input type="hidden" id="adminCourseIdInput" value="0">
            <div class="admin-form-group">
              <label for="adminCourseTitleInput">Título del Curso <span style="color:#ef4444;">*</span>:</label>
              <input type="text" id="adminCourseTitleInput" class="admin-form-input" placeholder="ej: Método Nowback: De Cero a $1,000 USD" required>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
              <div>
                <label for="adminCourseSlugInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Slug URL:</label>
                <input type="text" id="adminCourseSlugInput" class="admin-form-input" placeholder="ej: metodo-nowback">
              </div>
              <div>
                <label for="adminCourseDurationInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Duración Total:</label>
                <input type="text" id="adminCourseDurationInput" class="admin-form-input" value="3h 00m" placeholder="ej: 4h 30m">
              </div>
            </div>

            <!-- Sección de Carga de Portada con Preview y Archivo -->
            <div class="admin-form-group" style="padding: 12px; background: var(--c-bg-subtle); border-radius: 10px; border: 1px solid var(--c-border);">
              <label style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-main); margin-bottom: 8px;">
                🖼️ Foto de Portada del Curso:
              </label>
              
              <div style="position: relative; margin-bottom: 10px; border-radius: 8px; overflow: hidden; background: #000; max-height: 150px; display: flex; align-items: center; justify-content: center; border: 1px solid var(--c-border);">
                <img id="adminCourseThumbnailPreview" src="/assets/img/fede_nowback_hero.jpg" alt="Preview Portada" style="width: 100%; height: 140px; object-fit: cover;" onerror="this.src='/assets/img/fede_nowback_hero.jpg'">
              </div>

              <div style="display: flex; gap: 8px; align-items: center; margin-bottom: 8px;">
                <label for="adminCourseFileInput" class="btn-post-submit" style="cursor: pointer; font-size: 0.82rem; padding: 7px 14px; background: var(--c-fire-primary); color: #fff; font-weight: 700; border-radius: 6px; display: inline-flex; align-items: center; gap: 6px;" title="Cargar imagen desde tu computadora o celular">
                  📁 Subir Foto de Portada
                </label>
                <input type="file" id="adminCourseFileInput" accept="image/*" style="display: none;">
                <span style="font-size: 0.74rem; color: var(--c-text-muted);">JPG, PNG o WEBP (se optimiza automáticamente)</span>
              </div>

              <div>
                <input type="text" id="adminCourseThumbnailInput" class="admin-form-input" value="/assets/img/fede_nowback_hero.jpg" placeholder="O ingresá URL externa o ruta interna...">
              </div>
            </div>

            <div class="admin-form-group">
              <label for="adminCourseDescInput">Descripción del Curso:</label>
              <textarea id="adminCourseDescInput" class="admin-form-textarea" rows="2" placeholder="Resumen y aprendizajes clave del curso..."></textarea>
            </div>
            
            <div class="admin-modal-actions" style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 18px;">
              <button type="button" class="btn-reaction" onclick="closeAdminModal('modalAdminCourse')">Cancelar</button>
              <button type="submit" class="admin-btn-add" style="padding: 9px 20px;">💾 Guardar Curso</button>
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
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h3 id="modalMeetTitle" style="font-family: var(--c-font-head); font-weight: 800; font-size: 1.25rem; color: var(--c-text-main);">Programar Meet en Vivo</h3>
            <button type="button" onclick="closeAdminModal('modalAdminMeet')" style="background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--c-text-muted);">&times;</button>
          </div>
          <form id="formAdminMeet">
            <input type="hidden" id="adminMeetIdInput" value="0">
            
            <div class="admin-form-group">
              <label for="adminMeetTitleInput">Título de la Sesión <span style="color:#ef4444;">*</span>:</label>
              <input type="text" id="adminMeetTitleInput" class="admin-form-input" placeholder="ej: Mentoría Grupal Semanal & Hot Seat" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
              <div>
                <label for="adminMeetRecurrenceTypeInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Tipo de Frecuencia:</label>
                <select id="adminMeetRecurrenceTypeInput" class="admin-form-input">
                  <option value="semanal">🔄 Recurrente Semanal</option>
                  <option value="quincenal">🔄 Recurrente Quincenal</option>
                  <option value="mensual">🔄 Recurrente Mensual</option>
                  <option value="unica">📅 Sesión Única (Puntual)</option>
                </select>
              </div>
              <div>
                <label for="adminMeetRecurrenceDayInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Día Habitual:</label>
                <select id="adminMeetRecurrenceDayInput" class="admin-form-input">
                  <option value="Viernes" selected>Todos los Viernes</option>
                  <option value="Jueves">Todos los Jueves</option>
                  <option value="Miércoles">Todos los Miércoles</option>
                  <option value="Martes">Todos los Martes</option>
                  <option value="Lunes">Todos los Lunes</option>
                  <option value="Sábado">Todos los Sábados</option>
                  <option value="Domingo">Todos los Domingos</option>
                </select>
              </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
              <div>
                <label for="adminMeetDateInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Fecha / Programación <span style="color:#ef4444;">*</span>:</label>
                <input type="text" id="adminMeetDateInput" class="admin-form-input" placeholder="ej: Viernes 18 de Septiembre" required>
              </div>
              <div>
                <label for="adminMeetTimeInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Hora <span style="color:#ef4444;">*</span>:</label>
                <input type="text" id="adminMeetTimeInput" class="admin-form-input" placeholder="ej: 10:00 hs (Buenos Aires)" required>
              </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; margin-bottom: 12px;">
              <div>
                <label for="adminMeetPlatformInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Plataforma:</label>
                <input type="text" id="adminMeetPlatformInput" class="admin-form-input" value="Google Meet" placeholder="Google Meet / Zoom">
              </div>
              <div>
                <label for="adminMeetZoomInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Link de la Reunión (Meet/Zoom) <span style="color:#ef4444;">*</span>:</label>
                <input type="text" id="adminMeetZoomInput" class="admin-form-input" placeholder="https://meet.google.com/ext-dsoq-hrz" required>
              </div>
            </div>

            <div class="admin-form-group">
              <label for="adminMeetCalInput">Link de Google Calendar (Opcional - Auto generado si está vacío):</label>
              <input type="text" id="adminMeetCalInput" class="admin-form-input" placeholder="https://calendar.google.com/calendar/render?...">
            </div>

            <div class="admin-form-group">
              <label for="adminMeetDescInput">Descripción / Temario de la Sesión:</label>
              <textarea id="adminMeetDescInput" class="admin-form-textarea" rows="2" placeholder="Explicá de qué tratará esta sesión en vivo para los alumnos..."></textarea>
            </div>

            <div class="admin-modal-actions" style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 18px;">
              <button type="button" class="btn-reaction" onclick="closeAdminModal('modalAdminMeet')">Cancelar</button>
              <button type="submit" class="admin-btn-add" style="padding: 9px 20px;">💾 Guardar Meet</button>
            </div>
          </form>
        </div>
      </div>

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
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
                <label for="loginEmailInput" style="font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub);">Email de Usuario:</label>
                <a href="https://wa.me/5491100000000?text=Hola%20Fede!%20Tengo%20problemas%20para%20recordar%20mi%20usuario%20o%20email%20de%20acceso%20al%20Campus" target="_blank" style="font-size: 0.73rem; color: var(--c-text-muted); text-decoration: underline; font-weight: 500;">¿Olvidaste tu usuario?</a>
              </div>
              <input type="email" id="loginEmailInput" class="admin-form-input" placeholder="tu@email.com" value="" required>
            </div>
            <div style="margin-bottom: 10px;">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
                <label for="loginPasswordInput" style="font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub);">Contraseña:</label>
                <a href="javascript:void(0)" onclick="openForgotPasswordModal()" style="font-size: 0.75rem; color: var(--c-fire-primary); text-decoration: none; font-weight: 700;">¿Olvidaste tu contraseña?</a>
              </div>
              <div style="position: relative; display: flex; align-items: center;">
                <input type="password" id="loginPasswordInput" class="admin-form-input" placeholder="••••••••" value="" style="padding-right: 46px;" required>
                <button type="button" class="btn-toggle-eye" onclick="togglePasswordEye('loginPasswordInput', this)" style="position: absolute; right: 6px; background: rgba(255,255,255,0.1); border: 1px solid var(--c-border); border-radius: 6px; font-size: 1.15rem; cursor: pointer; padding: 4px 8px; color: var(--c-text-main); display: flex; align-items: center; justify-content: center;" title="Mostrar/Ocultar contraseña">
                  👁️
                </button>
              </div>
            </div>

            <div id="loginFeedbackMsg" style="display: none; font-size: 0.85rem; padding: 8px 12px; border-radius: 6px; margin: 12px 0;"></div>

            <button type="submit" id="btnLoginSubmit" class="admin-btn-add" style="width: 100%; justify-content: center; padding: 11px 0; font-size: 0.95rem; margin-top: 10px;">
              🚀 Ingresar al Campus
            </button>
          </form>
        </div>
      </div>

      <!-- 8. Modal Recuperar Contraseña (Olvidé mi contraseña) -->
      <div id="modalForgotPassword" class="admin-modal-overlay">
        <div class="admin-modal-box" style="max-width: 440px;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
            <div style="display: flex; align-items: center; gap: 8px;">
              <span style="font-size: 1.3rem;">🔑</span>
              <h3 style="font-family: var(--c-font-head); font-weight: 900; font-size: 1.15rem; color: var(--c-text-main);">Recuperar Contraseña</h3>
            </div>
            <button type="button" onclick="closeAdminModal('modalForgotPassword')" style="background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--c-text-muted);">&times;</button>
          </div>

          <p style="font-size: 0.85rem; color: var(--c-text-muted); line-height: 1.5; margin-bottom: 16px;">
            Ingresá tu email registrado y te enviaremos un enlace seguro para restablecer tu contraseña.
          </p>

          <form id="formForgotPassword">
            <div style="margin-bottom: 14px;">
              <label for="forgotEmailInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Tu Email:</label>
              <input type="email" id="forgotEmailInput" class="admin-form-input" placeholder="tu@email.com" required>
            </div>

            <div id="forgotFeedbackMsg" style="display: none; font-size: 0.85rem; padding: 8px 12px; border-radius: 6px; margin-bottom: 14px;"></div>

            <button type="submit" id="btnForgotSubmit" class="admin-btn-add" style="width: 100%; justify-content: center; padding: 11px 0; font-size: 0.95rem; margin-bottom: 8px;">
              📩 Enviar Enlace de Recuperación
            </button>
            <button type="button" class="btn-reaction" style="width: 100%; justify-content: center; font-size: 0.82rem;" onclick="closeAdminModal('modalForgotPassword'); openLoginModal();">
              ⬅️ Volver al Inicio de Sesión
            </button>
          </form>
        </div>
      </div>

      <!-- 9. Modal Restablecer Nueva Contraseña -->
      <div id="modalResetPassword" class="admin-modal-overlay">
        <div class="admin-modal-box" style="max-width: 440px;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
            <div style="display: flex; align-items: center; gap: 8px;">
              <span style="font-size: 1.3rem;">🔐</span>
              <h3 style="font-family: var(--c-font-head); font-weight: 900; font-size: 1.15rem; color: var(--c-text-main);">Nueva Contraseña</h3>
            </div>
            <button type="button" onclick="closeAdminModal('modalResetPassword')" style="background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--c-text-muted);">&times;</button>
          </div>

          <form id="formResetPassword">
            <input type="hidden" id="resetTokenInput" value="">
            <input type="hidden" id="resetEmailInput" value="">

            <div class="admin-form-group">
              <label for="resetNewPasswordInput">Nueva Contraseña:</label>
              <div style="position: relative; display: flex; align-items: center;">
                <input type="password" id="resetNewPasswordInput" class="admin-form-input" placeholder="••••••••" style="padding-right: 42px;" required>
                <button type="button" class="btn-toggle-eye" onclick="togglePasswordEye('resetNewPasswordInput', this)" style="position: absolute; right: 8px; background: none; border: none; font-size: 1.1rem; cursor: pointer; padding: 4px 6px; color: var(--c-text-muted);">👁️</button>
              </div>
            </div>

            <div class="admin-form-group">
              <label for="resetConfirmPasswordInput">Confirmar Nueva Contraseña:</label>
              <div style="position: relative; display: flex; align-items: center;">
                <input type="password" id="resetConfirmPasswordInput" class="admin-form-input" placeholder="••••••••" style="padding-right: 42px;" required>
                <button type="button" class="btn-toggle-eye" onclick="togglePasswordEye('resetConfirmPasswordInput', this)" style="position: absolute; right: 8px; background: none; border: none; font-size: 1.1rem; cursor: pointer; padding: 4px 6px; color: var(--c-text-muted);">👁️</button>
              </div>
            </div>

            <div id="resetFeedbackMsg" style="display: none; font-size: 0.85rem; padding: 8px 12px; border-radius: 6px; margin-bottom: 14px;"></div>

            <button type="submit" id="btnResetSubmit" class="admin-btn-add" style="width: 100%; justify-content: center; padding: 11px 0; font-size: 0.95rem;">
              💾 Guardar Nueva Contraseña
            </button>
          </form>
        </div>
      </div>

      <!-- 10. Modal Mi Perfil & Avatar del Usuario -->
      <div id="modalMyProfile" class="admin-modal-overlay">
        <div class="admin-modal-box" style="max-width: 540px; max-height: 90vh; overflow-y: auto;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; position: sticky; top: 0; background: var(--c-card); z-index: 2; padding-bottom: 8px; border-bottom: 1px solid var(--c-border);">
            <div style="display: flex; align-items: center; gap: 8px;">
              <span style="font-size: 1.4rem;">👤</span>
              <h3 style="font-family: var(--c-font-head); font-weight: 900; font-size: 1.2rem; color: var(--c-text-main);">Mi Perfil en el Campus</h3>
            </div>
            <button type="button" onclick="closeAdminModal('modalMyProfile')" style="background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--c-text-muted);">&times;</button>
          </div>

          <form id="formMyProfile">
            <!-- Sección de Avatar -->
            <div style="display: flex; flex-direction: column; align-items: center; text-align: center; margin-bottom: 20px; padding: 14px; background: var(--c-bg-subtle); border-radius: 12px; border: 1px solid var(--c-border);">
              <div style="position: relative; margin-bottom: 12px;">
                <img id="myProfileAvatarPreview" src="<?= htmlspecialchars($user['avatar'] ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80') ?>" alt="Mi Avatar" style="width: 84px; height: 84px; border-radius: 50%; object-fit: cover; border: 3px solid var(--c-fire-primary); box-shadow: 0 4px 12px rgba(0,0,0,0.15);" onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80'">
                <label for="myProfileFileInput" style="position: absolute; bottom: 0; right: 0; background: var(--c-fire-primary); color: #fff; width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 0.85rem; box-shadow: 0 2px 6px rgba(0,0,0,0.2);" title="Subir foto desde tu dispositivo">
                  📷
                </label>
                <input type="file" id="myProfileFileInput" accept="image/*" style="display: none;">
              </div>
              <input type="hidden" id="myProfileAvatarInput" value="<?= htmlspecialchars($user['avatar'] ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80') ?>">
              
              <div style="font-size: 0.82rem; font-weight: 700; color: var(--c-text-main); margin-bottom: 6px;">Foto de Perfil / Avatar</div>
              <p style="font-size: 0.75rem; color: var(--c-text-muted); margin-bottom: 10px;">Subí tu propia foto o elegí un avatar predefinido:</p>
              
              <!-- Galería de Avatares Predefinidos -->
              <div style="display: flex; gap: 8px; flex-wrap: wrap; justify-content: center;">
                <button type="button" class="btn-avatar-preset" onclick="selectPresetAvatar('https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80')" title="Avatar Creadora 1" style="border: 2px solid transparent; border-radius: 50%; padding: 0; background: none; cursor: pointer;">
                  <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80" style="width: 34px; height: 34px; border-radius: 50%; object-fit: cover;">
                </button>
                <button type="button" class="btn-avatar-preset" onclick="selectPresetAvatar('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80')" title="Avatar Creador 2" style="border: 2px solid transparent; border-radius: 50%; padding: 0; background: none; cursor: pointer;">
                  <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80" style="width: 34px; height: 34px; border-radius: 50%; object-fit: cover;">
                </button>
                <button type="button" class="btn-avatar-preset" onclick="selectPresetAvatar('https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150&auto=format&fit=crop&q=80')" title="Avatar Creadora 3" style="border: 2px solid transparent; border-radius: 50%; padding: 0; background: none; cursor: pointer;">
                  <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150&auto=format&fit=crop&q=80" style="width: 34px; height: 34px; border-radius: 50%; object-fit: cover;">
                </button>
                <button type="button" class="btn-avatar-preset" onclick="selectPresetAvatar('https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80')" title="Avatar Creador 4" style="border: 2px solid transparent; border-radius: 50%; padding: 0; background: none; cursor: pointer;">
                  <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80" style="width: 34px; height: 34px; border-radius: 50%; object-fit: cover;">
                </button>
                <button type="button" class="btn-avatar-preset" onclick="selectPresetAvatar('https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&auto=format&fit=crop&q=80')" title="Avatar Creadora 5" style="border: 2px solid transparent; border-radius: 50%; padding: 0; background: none; cursor: pointer;">
                  <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&auto=format&fit=crop&q=80" style="width: 34px; height: 34px; border-radius: 50%; object-fit: cover;">
                </button>
                <button type="button" class="btn-avatar-preset" onclick="selectPresetAvatar('https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=150&auto=format&fit=crop&q=80')" title="Avatar Creador 6" style="border: 2px solid transparent; border-radius: 50%; padding: 0; background: none; cursor: pointer;">
                  <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=150&auto=format&fit=crop&q=80" style="width: 34px; height: 34px; border-radius: 50%; object-fit: cover;">
                </button>
              </div>
            </div>

            <!-- Datos Básicos -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
              <div>
                <label for="myProfileNameInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Nombre y Apellido <span style="color:#ef4444;">*</span>:</label>
                <input type="text" id="myProfileNameInput" class="admin-form-input" value="<?= htmlspecialchars($user['name'] ?? '') ?>" placeholder="Tu nombre" required>
              </div>
              <div>
                <label for="myProfileHandleInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Nombre de Usuario:</label>
                <input type="text" id="myProfileHandleInput" class="admin-form-input" value="<?= htmlspecialchars($user['handle'] ?? '') ?>" placeholder="@tu_usuario">
              </div>
            </div>

            <div style="margin-bottom: 12px;">
              <label for="myProfileEmailInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Email de Cuenta:</label>
              <input type="email" id="myProfileEmailInput" class="admin-form-input" value="<?= htmlspecialchars($user['email'] ?? '') ?>" disabled style="opacity: 0.75; cursor: not-allowed;">
            </div>

            <!-- Biografía y Presentación -->
            <div style="margin-bottom: 12px;">
              <label for="myProfileBioInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Biografía / ¿A qué te dedicás?:</label>
              <textarea id="myProfileBioInput" class="admin-form-input" style="height: 68px; resize: vertical;" placeholder="Ej: Especialista en diseño UX y creador de contenidos. Ayudo a marcas a mejorar su conversión."><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
            </div>

            <!-- Intereses y Nicho -->
            <div style="margin-bottom: 12px;">
              <label for="myProfileInterestsInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">Temas de Interés / Nicho:</label>
              <input type="text" id="myProfileInterestsInput" class="admin-form-input" value="<?= htmlspecialchars($user['interests'] ?? '') ?>" placeholder="Ej: Reels, Marca Personal, Hot Seats, Coaching, E-commerce">
            </div>

            <!-- Redes Sociales -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px;">
              <div>
                <label for="myProfileInstagramInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">📸 Instagram:</label>
                <input type="text" id="myProfileInstagramInput" class="admin-form-input" value="<?= htmlspecialchars($user['instagram'] ?? '') ?>" placeholder="@tu_instagram">
              </div>
              <div>
                <label for="myProfileLinkedinInput" style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--c-text-sub); margin-bottom: 5px;">💼 LinkedIn / Web:</label>
                <input type="text" id="myProfileLinkedinInput" class="admin-form-input" value="<?= htmlspecialchars($user['linkedin'] ?? '') ?>" placeholder="https://linkedin.com/in/...">
              </div>
            </div>

            <!-- Cambio de Contraseña (Opcional) -->
            <div style="margin-bottom: 16px; padding: 12px; background: var(--c-bg-subtle); border-radius: 8px; border: 1px dashed var(--c-border);">
              <div style="font-size: 0.84rem; font-weight: 700; color: var(--c-text-main); margin-bottom: 8px;">🔐 Cambiar Contraseña (opcional):</div>
              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div>
                  <div style="position: relative; display: flex; align-items: center;">
                    <input type="password" id="myProfileNewPassInput" class="admin-form-input" placeholder="Nueva clave" style="padding-right: 36px; font-size: 0.84rem;">
                    <button type="button" class="btn-toggle-eye" onclick="togglePasswordEye('myProfileNewPassInput', this)" style="position: absolute; right: 6px; background: none; border: none; font-size: 1rem; cursor: pointer; color: var(--c-text-muted);">👁️</button>
                  </div>
                </div>
                <div>
                  <div style="position: relative; display: flex; align-items: center;">
                    <input type="password" id="myProfileConfirmPassInput" class="admin-form-input" placeholder="Repetir nueva clave" style="padding-right: 36px; font-size: 0.84rem;">
                    <button type="button" class="btn-toggle-eye" onclick="togglePasswordEye('myProfileConfirmPassInput', this)" style="position: absolute; right: 6px; background: none; border: none; font-size: 1rem; cursor: pointer; color: var(--c-text-muted);">👁️</button>
                  </div>
                </div>
              </div>
            </div>

            <div id="myProfileFeedbackMsg" style="display: none; font-size: 0.85rem; padding: 8px 12px; border-radius: 6px; margin-bottom: 14px;"></div>

            <div class="admin-modal-actions">
              <button type="button" class="btn-reaction" onclick="closeAdminModal('modalMyProfile')">Cancelar</button>
              <button type="submit" id="btnMyProfileSubmit" class="admin-btn-add">💾 Guardar Cambios de Mi Perfil</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </main>

  <!-- JS Controller con soporte completo de ABM, Buscador y Recuperación -->
  <script src="/assets/js/campus.js?v=<?= time() ?>"></script>
</body>
</html>
