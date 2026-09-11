/**
 * CAMPUS FEDE NOWBACK PRO — Interactive Client Controller
 * Lightweight Vanilla JS Controller with AJAX Sync & Full Admin ABM
 */

const API_ENDPOINT = '/comunidad_api.php';
let csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

// Global Tab Switcher
function switchTab(tabId) {
  const navItems = document.querySelectorAll('.campus-nav-item');
  const tabPanes = document.querySelectorAll('.campus-tab-pane');

  navItems.forEach(item => {
    item.classList.toggle('active', item.dataset.tab === tabId);
  });
  tabPanes.forEach(pane => {
    pane.style.display = (pane.id === `tab-${tabId}`) ? 'block' : 'none';
  });
  // Update URL hash without scroll
  history.replaceState(null, null, `#${tabId}`);
}

// Global Avatar Dropdown Helpers
function toggleAvatarDropdown(e) {
  if (e) e.stopPropagation();
  const dropdown = document.getElementById('campusAvatarDropdown');
  if (dropdown) {
    dropdown.classList.toggle('active');
  }
}

function closeAvatarDropdown() {
  const dropdown = document.getElementById('campusAvatarDropdown');
  if (dropdown) {
    dropdown.classList.remove('active');
  }
}

// Modal Helpers
function openAdminModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) modal.style.display = 'block';
}

function closeAdminModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) modal.style.display = 'none';
}

// Global Login Modal Helpers
window.openLoginModal = function(msg) {
  const modal = document.getElementById('modalLogin');
  if (modal) {
    modal.style.display = 'block';
    const feedback = document.getElementById('loginFeedbackMsg');
    if (feedback) {
      if (msg) {
        feedback.style.display = 'block';
        feedback.style.background = 'rgba(255, 85, 0, 0.12)';
        feedback.style.color = '#ea580c';
        feedback.textContent = '🔒 ' + msg;
      } else {
        feedback.style.display = 'none';
        feedback.textContent = '';
      }
    }
  }
};

window.closeLoginModal = function() {
  const modal = document.getElementById('modalLogin');
  if (modal) modal.style.display = 'none';
};

// Lesson Player Modal
function playLessonModal(title, videoUrl, desc) {
  document.getElementById('playerLessonTitle').textContent = title || 'Clase de la Academia';
  document.getElementById('playerLessonIframe').src = videoUrl || '';
  document.getElementById('playerLessonDesc').textContent = desc || '';
  openAdminModal('modalLessonPlayer');
}

function closeLessonPlayerModal() {
  document.getElementById('playerLessonIframe').src = '';
  closeAdminModal('modalLessonPlayer');
}

// Admin ABM Modal Openers
function openAdminUserModal(id, name = '', email = '', role = 'member', points = 10) {
  document.getElementById('modalUserTitle').textContent = (id > 0) ? 'Editar Usuario' : 'Nuevo Usuario';
  document.getElementById('adminUserIdInput').value = id || 0;
  document.getElementById('adminUserNameInput').value = name || '';
  document.getElementById('adminUserEmailInput').value = email || '';
  document.getElementById('adminUserPasswordInput').value = '';
  document.getElementById('adminUserRoleInput').value = role || 'member';
  document.getElementById('adminUserPointsInput').value = points || 10;
  openAdminModal('modalAdminUser');
}

function openAdminCourseModal(id, title = '', slug = '', desc = '', duration = '3h 00m', thumb = '/assets/img/fede_nowback_hero.jpg', level = 1) {
  document.getElementById('modalCourseTitle').textContent = (id > 0) ? 'Editar Curso' : 'Nuevo Curso';
  document.getElementById('adminCourseIdInput').value = id || 0;
  document.getElementById('adminCourseTitleInput').value = title || '';
  document.getElementById('adminCourseSlugInput').value = slug || '';
  document.getElementById('adminCourseDescInput').value = desc || '';
  document.getElementById('adminCourseDurationInput').value = duration || '3h 00m';
  document.getElementById('adminCourseThumbnailInput').value = thumb || '/assets/img/fede_nowback_hero.jpg';
  openAdminModal('modalAdminCourse');
}

function openAdminLessonModal(id, courseId = 0, title = '', videoUrl = '', duration = '15:00', desc = '', isFree = 0) {
  document.getElementById('modalLessonTitle').textContent = (id > 0) ? 'Editar Lección' : 'Nueva Lección';
  document.getElementById('adminLessonIdInput').value = id || 0;
  if (courseId > 0) {
    document.getElementById('adminLessonCourseSelect').value = courseId;
  }
  document.getElementById('adminLessonTitleInput').value = title || '';
  document.getElementById('adminLessonVideoInput').value = videoUrl || '';
  document.getElementById('adminLessonDurationInput').value = duration || '15:00';
  document.getElementById('adminLessonDescInput').value = desc || '';
  const freeCheck = document.getElementById('adminLessonIsFreeInput');
  if (freeCheck) freeCheck.checked = !!isFree;
  openAdminModal('modalAdminLesson');
}

function openAdminPlanModal(id, name = '', slug = '', badge = 'Recomendado', ars = 35000, usd = 29, period = 'mensual', desc = '', checkout = '') {
  document.getElementById('modalPlanTitle').textContent = (id > 0) ? 'Editar Plan' : 'Nuevo Plan';
  document.getElementById('adminPlanIdInput').value = id || 0;
  document.getElementById('adminPlanNameInput').value = name || '';
  document.getElementById('adminPlanBadgeInput').value = badge || 'Recomendado';
  document.getElementById('adminPlanPriceArsInput').value = ars || 0;
  document.getElementById('adminPlanPriceUsdInput').value = usd || 0;
  document.getElementById('adminPlanPeriodInput').value = period || 'mensual';
  document.getElementById('adminPlanDescInput').value = desc || '';
  document.getElementById('adminPlanCheckoutInput').value = checkout || '';
  openAdminModal('modalAdminPlan');
}

function openAdminMeetModal(id, title = '', desc = '', date = '', time = '', platform = 'Zoom Pro', zoom = '', cal = '') {
  document.getElementById('modalMeetTitle').textContent = (id > 0) ? 'Editar Meet' : 'Programar Meet en Vivo';
  document.getElementById('adminMeetIdInput').value = id || 0;
  document.getElementById('adminMeetTitleInput').value = title || '';
  document.getElementById('adminMeetDescInput').value = desc || '';
  document.getElementById('adminMeetDateInput').value = date || '';
  document.getElementById('adminMeetTimeInput').value = time || '';
  document.getElementById('adminMeetPlatformInput').value = platform || 'Zoom Pro';
  document.getElementById('adminMeetZoomInput').value = zoom || '';
  document.getElementById('adminMeetCalInput').value = cal || '';
  openAdminModal('modalAdminMeet');
}

// Delete & Moderation Helpers (Exposed Globally)
window.deletePost = async function(id) {
  if (!confirm('¿Estás seguro de eliminar esta publicación del muro?')) return;
  try {
    const res = await fetch(API_ENDPOINT, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
      body: JSON.stringify({ action: 'delete_post', post_id: id, csrf_token: csrfToken })
    });
    const data = await res.json();
    if (data.success) {
      const postCard = document.querySelector(`.post-card[data-post-id="${id}"]`);
      if (postCard) {
        postCard.style.transition = 'opacity 0.3s, transform 0.3s';
        postCard.style.opacity = '0';
        postCard.style.transform = 'translateY(-10px)';
        setTimeout(() => postCard.remove(), 300);
      } else {
        window.location.reload();
      }
    } else {
      alert(data.error || 'Error al eliminar la publicación');
    }
  } catch (err) {
    console.error('Error deleting post:', err);
    alert('Error al conectar con el servidor.');
  }
};

window.deleteComment = async function(id) {
  if (!confirm('¿Estás seguro de eliminar este comentario?')) return;
  try {
    const res = await fetch(API_ENDPOINT, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
      body: JSON.stringify({ action: 'delete_comment', comment_id: id, csrf_token: csrfToken })
    });
    const data = await res.json();
    if (data.success) {
      const commentRow = document.querySelector(`.comment-row[data-comment-id="${id}"]`);
      if (commentRow) {
        commentRow.remove();
      } else {
        window.location.reload();
      }
    } else {
      alert(data.error || 'Error al eliminar el comentario');
    }
  } catch (err) {
    console.error('Error deleting comment:', err);
  }
};

window.deleteChatMessage = async function(id) {
  if (!confirm('¿Estás seguro de eliminar este mensaje del chat?')) return;
  try {
    const res = await fetch(API_ENDPOINT, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
      body: JSON.stringify({ action: 'delete_chat', chat_id: id, csrf_token: csrfToken })
    });
    const data = await res.json();
    if (data.success) {
      window.location.reload();
    } else {
      alert(data.error || 'Error al eliminar el mensaje');
    }
  } catch (err) {
    console.error('Error deleting chat message:', err);
  }
};

window.deleteAdminLesson = async function(id) {
  if (!confirm('¿Estás seguro de eliminar esta lección/video?')) return;
  try {
    const res = await fetch(API_ENDPOINT, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
      body: JSON.stringify({ action: 'admin_delete_lesson', lesson_id: id, csrf_token: csrfToken })
    });
    const data = await res.json();
    if (data.success) {
      alert('Lección eliminada correctamente');
      window.location.reload();
    } else {
      alert(data.error || 'Error al eliminar lección');
    }
  } catch (err) {
    console.error(err);
  }
};

window.deleteAdminUser = async function(id) {
  if (!confirm('¿Estás seguro de eliminar este usuario?')) return;
  try {
    const res = await fetch(API_ENDPOINT, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
      body: JSON.stringify({ action: 'admin_delete_user', user_id: id, csrf_token: csrfToken })
    });
    const data = await res.json();
    if (data.success) {
      alert('Usuario eliminado correctamente');
      window.location.reload();
    } else {
      alert(data.error || 'Error al eliminar usuario');
    }
  } catch (err) {
    console.error(err);
  }
};

window.deleteAdminCourse = async function(id) {
  if (!confirm('¿Estás seguro de eliminar este curso y sus lecciones?')) return;
  try {
    const res = await fetch(API_ENDPOINT, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
      body: JSON.stringify({ action: 'admin_delete_course', course_id: id, csrf_token: csrfToken })
    });
    const data = await res.json();
    if (data.success) {
      alert('Curso eliminado');
      window.location.reload();
    } else {
      alert(data.error || 'Error al eliminar');
    }
  } catch (err) {
    console.error(err);
  }
};

window.deleteAdminPlan = async function(id) {
  if (!confirm('¿Estás seguro de eliminar este plan?')) return;
  try {
    const res = await fetch(API_ENDPOINT, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
      body: JSON.stringify({ action: 'admin_delete_plan', plan_id: id, csrf_token: csrfToken })
    });
    const data = await res.json();
    if (data.success) {
      alert('Plan eliminado');
      window.location.reload();
    } else {
      alert(data.error || 'Error al eliminar');
    }
  } catch (err) {
    console.error(err);
  }
};

window.deleteAdminMeet = async function(id) {
  if (!confirm('¿Estás seguro de eliminar este Meet?')) return;
  try {
    const res = await fetch(API_ENDPOINT, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
      body: JSON.stringify({ action: 'admin_delete_meet', meet_id: id, csrf_token: csrfToken })
    });
    const data = await res.json();
    if (data.success) {
      alert('Sesión eliminada');
      window.location.reload();
    } else {
      alert(data.error || 'Error al eliminar');
    }
  } catch (err) {
    console.error(err);
  }
};

// Helper: Normalize YouTube URL to /embed/ format
function formatYouTubeEmbedUrl(url) {
  if (!url) return '';
  url = url.trim();
  // Standard youtube watch URL: https://www.youtube.com/watch?v=VIDEO_ID
  const watchMatch = url.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i);
  if (watchMatch && watchMatch[1]) {
    return `https://www.youtube.com/embed/${watchMatch[1]}`;
  }
  return url;
}

document.addEventListener('DOMContentLoaded', () => {

  // 1. Tab Navigation
  const navItems = document.querySelectorAll('.campus-nav-item');
  navItems.forEach(item => {
    item.addEventListener('click', (e) => {
      const targetTab = item.dataset.tab;
      if (targetTab) {
        e.preventDefault();
        switchTab(targetTab);
      }
    });
  });

  // Handle initial tab from URL hash
  const initialHash = window.location.hash.replace('#', '');
  if (initialHash && document.getElementById(`tab-${initialHash}`)) {
    switchTab(initialHash);
  } else {
    switchTab('community');
  }

  // 2. Avatar Dropdown Toggle
  const avatarTrigger = document.getElementById('campusAvatarTrigger');
  if (avatarTrigger) {
    avatarTrigger.addEventListener('click', toggleAvatarDropdown);
  }

  // Close dropdown on click outside
  document.addEventListener('click', (e) => {
    const dropdown = document.getElementById('campusAvatarDropdown');
    const trigger = document.getElementById('campusAvatarTrigger');
    if (dropdown && dropdown.classList.contains('active')) {
      if (!dropdown.contains(e.target) && !trigger?.contains(e.target)) {
        closeAvatarDropdown();
      }
    }
  });

  // 3. Dropdown Role Switcher
  const btnRoleSwitch = document.getElementById('btnDropdownRoleSwitch');
  if (btnRoleSwitch) {
    btnRoleSwitch.addEventListener('click', async () => {
      const currentRole = btnRoleSwitch.dataset.currentRole;
      const targetRole = currentRole === 'admin' ? 'member' : 'admin';
      
      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({ action: 'switch_role', role: targetRole, csrf_token: csrfToken })
        });
        const data = await res.json();
        if (data.success) {
          window.location.reload();
        }
      } catch (err) {
        console.error('Error switching role:', err);
      }
    });
  }

  // 4. Dropdown Logout
  const btnLogout = document.getElementById('btnDropdownLogout');
  if (btnLogout) {
    btnLogout.addEventListener('click', async () => {
      try {
        await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({ action: 'auth_logout', csrf_token: csrfToken })
        });
        window.location.reload();
      } catch (err) {
        console.error('Error logging out:', err);
      }
    });
  }

  // 5. Admin Subtabs Switching
  const adminSubtabBtns = document.querySelectorAll('.admin-subtab-btn');
  const adminSubtabContents = document.querySelectorAll('.admin-subtab-content');

  adminSubtabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      adminSubtabBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const targetSubtab = btn.dataset.adminSubtab;

      adminSubtabContents.forEach(content => {
        content.style.display = (content.id === `admin-subtab-${targetSubtab}`) ? 'block' : 'none';
      });
    });
  });

  // 6. Category Filter Pills in Community Feed
  const filterPills = document.querySelectorAll('.filter-pill');
  const postCards = document.querySelectorAll('.post-card');

  filterPills.forEach(pill => {
    pill.addEventListener('click', () => {
      filterPills.forEach(p => p.classList.remove('active'));
      pill.classList.add('active');
      const category = pill.dataset.category;

      postCards.forEach(card => {
        if (category === 'todos' || card.dataset.category === category) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // 7. Create Post Submission
  const postForm = document.getElementById('formCreatePost');
  if (postForm) {
    postForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const titleInput = document.getElementById('postTitleInput');
      const bodyInput = document.getElementById('postBodyInput');
      const categorySelect = document.getElementById('postCategorySelect');
      const submitBtn = postForm.querySelector('.btn-post-submit');

      const title = titleInput.value.trim();
      const content = bodyInput.value.trim();
      const category = categorySelect.value;

      if (!title || !content) return;

      submitBtn.disabled = true;
      submitBtn.textContent = 'Publicando...';

      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({
            action: 'create_post',
            title: title,
            content: content,
            category: category,
            csrf_token: csrfToken
          })
        });
        const data = await res.json();

        if (data.success) {
          titleInput.value = '';
          bodyInput.value = '';
          window.location.reload();
        } else {
          alert(data.error || 'Error al publicar');
        }
      } catch (err) {
        console.error('Error creating post:', err);
      } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Publicar en el Muro';
      }
    });
  }

  // 8. Like Post & Toggle Comments
  document.addEventListener('click', async (e) => {
    // Like button
    const likeBtn = e.target.closest('.btn-like');
    if (likeBtn) {
      const postId = likeBtn.dataset.postId;
      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({ action: 'like_post', post_id: postId, csrf_token: csrfToken })
        });
        const data = await res.json();
        if (data.success) {
          likeBtn.classList.toggle('liked', data.liked);
          const countSpan = likeBtn.querySelector('.like-count');
          if (countSpan) countSpan.textContent = data.likes;
        }
      } catch (err) {
        console.error('Error liking post:', err);
      }
      return;
    }

    // Toggle comments
    const toggleCommentsBtn = e.target.closest('.btn-toggle-comments');
    if (toggleCommentsBtn) {
      const postId = toggleCommentsBtn.dataset.postId;
      const commentsContainer = document.getElementById(`comments-${postId}`);
      if (commentsContainer) {
        const isVisible = commentsContainer.style.display === 'block';
        commentsContainer.style.display = isVisible ? 'none' : 'block';
      }
      return;
    }
  });

  // 9. Add Comment to Post
  document.addEventListener('submit', async (e) => {
    const commentForm = e.target.closest('.form-add-comment');
    if (commentForm) {
      e.preventDefault();
      const postId = commentForm.dataset.postId;
      const input = commentForm.querySelector('.comment-input');
      const content = input.value.trim();

      if (!content) return;

      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({ action: 'add_comment', post_id: postId, content: content, csrf_token: csrfToken })
        });
        const data = await res.json();
        if (data.success) {
          input.value = '';
          window.location.reload();
        }
      } catch (err) {
        console.error('Error adding comment:', err);
      }
    }
  });

  // 10. Send Chat Message
  const chatForm = document.getElementById('formSendChat');
  if (chatForm) {
    chatForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const input = document.getElementById('chatTextInput');
      const message = input.value.trim();
      if (!message) return;

      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({ action: 'send_chat', message: message, csrf_token: csrfToken })
        });
        const data = await res.json();
        if (data.success) {
          input.value = '';
          const scrollBox = document.getElementById('chatMessagesScroll');
          const newBubble = document.createElement('div');
          newBubble.className = 'chat-bubble-row';
          newBubble.innerHTML = `
            <img src="${data.message_item.avatar}" alt="" class="comment-avatar">
            <div class="chat-bubble-content ${data.message_item.is_host ? 'host-msg' : ''}">
              <div style="font-size: 0.78rem; font-weight: 700; color: var(--c-text-muted); margin-bottom: 2px;">
                ${data.message_item.author} • ${data.message_item.time}
              </div>
              <div style="font-size: 0.9rem; color: var(--c-text-main);">${data.message_item.content}</div>
            </div>
          `;
          scrollBox.appendChild(newBubble);
          scrollBox.scrollTop = scrollBox.scrollHeight;
        }
      } catch (err) {
        console.error('Error sending chat:', err);
      }
    });
  }

  // 11. Admin Form Submissions (ABM)
  
  // User Form
  const formAdminUser = document.getElementById('formAdminUser');
  if (formAdminUser) {
    formAdminUser.addEventListener('submit', async (e) => {
      e.preventDefault();
      const payload = {
        action: 'admin_save_user',
        user_id: document.getElementById('adminUserIdInput').value,
        name: document.getElementById('adminUserNameInput').value.trim(),
        email: document.getElementById('adminUserEmailInput').value.trim(),
        password: document.getElementById('adminUserPasswordInput').value,
        role: document.getElementById('adminUserRoleInput').value,
        points: document.getElementById('adminUserPointsInput').value,
        csrf_token: csrfToken
      };
      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify(payload)
        });
        const data = await res.json();
        if (data.success) {
          alert('Usuario guardado exitosamente');
          window.location.reload();
        } else {
          alert(data.error || 'Error al guardar usuario');
        }
      } catch (err) {
        console.error(err);
      }
    });
  }

  // Course Form
  const formAdminCourse = document.getElementById('formAdminCourse');
  if (formAdminCourse) {
    formAdminCourse.addEventListener('submit', async (e) => {
      e.preventDefault();
      const payload = {
        action: 'admin_save_course',
        course_id: document.getElementById('adminCourseIdInput').value,
        title: document.getElementById('adminCourseTitleInput').value.trim(),
        slug: document.getElementById('adminCourseSlugInput').value.trim(),
        duration: document.getElementById('adminCourseDurationInput').value.trim(),
        thumbnail: document.getElementById('adminCourseThumbnailInput').value.trim(),
        description: document.getElementById('adminCourseDescInput').value.trim(),
        csrf_token: csrfToken
      };
      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify(payload)
        });
        const data = await res.json();
        if (data.success) {
          alert('Curso guardado');
          window.location.reload();
        } else {
          alert(data.error || 'Error al guardar curso');
        }
      } catch (err) {
        console.error(err);
      }
    });
  }

  // Lesson Form
  const formAdminLesson = document.getElementById('formAdminLesson');
  const videoInput = document.getElementById('adminLessonVideoInput');
  if (videoInput) {
    videoInput.addEventListener('blur', () => {
      videoInput.value = formatYouTubeEmbedUrl(videoInput.value);
    });
  }

  if (formAdminLesson) {
    formAdminLesson.addEventListener('submit', async (e) => {
      e.preventDefault();
      const rawVideoUrl = document.getElementById('adminLessonVideoInput').value.trim();
      const formattedVideoUrl = formatYouTubeEmbedUrl(rawVideoUrl);

      const payload = {
        action: 'admin_save_lesson',
        lesson_id: document.getElementById('adminLessonIdInput').value,
        course_id: document.getElementById('adminLessonCourseSelect').value,
        title: document.getElementById('adminLessonTitleInput').value.trim(),
        video_url: formattedVideoUrl,
        duration: document.getElementById('adminLessonDurationInput').value.trim(),
        description: document.getElementById('adminLessonDescInput').value.trim(),
        is_free: document.getElementById('adminLessonIsFreeInput')?.checked ? 1 : 0,
        csrf_token: csrfToken
      };
      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify(payload)
        });
        const data = await res.json();
        if (data.success) {
          alert('Lección guardada');
          window.location.reload();
        } else {
          alert(data.error || 'Error al guardar');
        }
      } catch (err) {
        console.error(err);
      }
    });
  }

  // Plan Form
  const formAdminPlan = document.getElementById('formAdminPlan');
  if (formAdminPlan) {
    formAdminPlan.addEventListener('submit', async (e) => {
      e.preventDefault();
      const payload = {
        action: 'admin_save_plan',
        plan_id: document.getElementById('adminPlanIdInput').value,
        name: document.getElementById('adminPlanNameInput').value.trim(),
        badge: document.getElementById('adminPlanBadgeInput').value.trim(),
        price_ars: document.getElementById('adminPlanPriceArsInput').value,
        price_usd: document.getElementById('adminPlanPriceUsdInput').value,
        period: document.getElementById('adminPlanPeriodInput').value,
        description: document.getElementById('adminPlanDescInput').value.trim(),
        checkout_url: document.getElementById('adminPlanCheckoutInput').value.trim(),
        csrf_token: csrfToken
      };
      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify(payload)
        });
        const data = await res.json();
        if (data.success) {
          alert('Plan guardado exitosamente');
          window.location.reload();
        } else {
          alert(data.error || 'Error al guardar plan');
        }
      } catch (err) {
        console.error(err);
      }
    });
  }

  // Meet Form
  const formAdminMeet = document.getElementById('formAdminMeet');
  if (formAdminMeet) {
    formAdminMeet.addEventListener('submit', async (e) => {
      e.preventDefault();
      const payload = {
        action: 'admin_save_meet',
        meet_id: document.getElementById('adminMeetIdInput').value,
        title: document.getElementById('adminMeetTitleInput').value.trim(),
        date: document.getElementById('adminMeetDateInput').value.trim(),
        time: document.getElementById('adminMeetTimeInput').value.trim(),
        platform: document.getElementById('adminMeetPlatformInput').value.trim(),
        zoom_url: document.getElementById('adminMeetZoomInput').value.trim(),
        google_cal_url: document.getElementById('adminMeetCalInput').value.trim(),
        description: document.getElementById('adminMeetDescInput').value.trim(),
        csrf_token: csrfToken
      };
      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify(payload)
        });
        const data = await res.json();
        if (data.success) {
          alert('Sesión en vivo guardada');
          window.location.reload();
        } else {
          alert(data.error || 'Error al guardar');
        }
      } catch (err) {
        console.error(err);
      }
    });
  }

  // Settings Form (Gamificación Toggle & WhatsApp)
  const formAdminSettings = document.getElementById('formAdminSettings');
  if (formAdminSettings) {
    formAdminSettings.addEventListener('submit', async (e) => {
      e.preventDefault();
      const isGamification = document.getElementById('settingGamificationInput').checked;
      const commName = document.getElementById('settingCommunityName').value.trim();
      const waNumber = document.getElementById('settingWhatsapp').value.trim();
      const feedback = document.getElementById('settingsFeedbackMsg');

      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({
            action: 'admin_update_settings',
            enable_gamification: isGamification,
            community_name: commName,
            admin_whatsapp: waNumber,
            csrf_token: csrfToken
          })
        });
        const data = await res.json();
        if (data.success) {
          feedback.style.display = 'block';
          feedback.style.background = 'rgba(16, 185, 129, 0.15)';
          feedback.style.color = '#10b981';
          feedback.textContent = '✅ ' + data.message;
          setTimeout(() => window.location.reload(), 1000);
        } else {
          feedback.style.display = 'block';
          feedback.style.background = 'rgba(239, 68, 68, 0.15)';
          feedback.style.color = '#ef4444';
          feedback.textContent = '❌ ' + (data.error || 'Error al guardar');
        }
      } catch (err) {
        console.error(err);
      }
    });
  }

  // 12. Campus Login Submission
  const loginForm = document.getElementById('formCampusLogin');
  if (loginForm) {
    loginForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const email = document.getElementById('loginEmailInput').value.trim();
      const password = document.getElementById('loginPasswordInput').value;
      const feedback = document.getElementById('loginFeedbackMsg');
      const submitBtn = document.getElementById('btnLoginSubmit');

      if (!email || !password) return;

      submitBtn.disabled = true;
      submitBtn.textContent = 'Verificando...';

      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({
            action: 'auth_login',
            email: email,
            password: password,
            csrf_token: csrfToken
          })
        });
        const data = await res.json();

        if (data.success) {
          feedback.style.display = 'block';
          feedback.style.background = 'rgba(16, 185, 129, 0.15)';
          feedback.style.color = '#10b981';
          feedback.textContent = '✅ ' + data.message;
          setTimeout(() => window.location.reload(), 800);
        } else {
          feedback.style.display = 'block';
          feedback.style.background = 'rgba(239, 68, 68, 0.15)';
          feedback.style.color = '#ef4444';
          feedback.textContent = '❌ ' + (data.error || 'Error al iniciar sesión');
          submitBtn.disabled = false;
          submitBtn.textContent = '🚀 Ingresar al Campus';
        }
      } catch (err) {
        console.error('Error logging in:', err);
        feedback.style.display = 'block';
        feedback.style.background = 'rgba(239, 68, 68, 0.15)';
        feedback.style.color = '#ef4444';
        feedback.textContent = '❌ Error de conexión al servidor.';
        submitBtn.disabled = false;
        submitBtn.textContent = '🚀 Ingresar al Campus';
      }
    });
  }

});
