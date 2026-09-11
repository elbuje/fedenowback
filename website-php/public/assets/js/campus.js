/**
 * CAMPUS FEDE NOWBACK PRO — Interactive Client Controller
 * Lightweight Vanilla JS Controller with AJAX Sync
 */

document.addEventListener('DOMContentLoaded', () => {
  const API_ENDPOINT = '/fedenowback/comunidad_api.php';
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

  // Tab Navigation
  const navItems = document.querySelectorAll('.campus-nav-item');
  const tabPanes = document.querySelectorAll('.campus-tab-pane');

  function switchTab(tabId) {
    navItems.forEach(item => {
      item.classList.toggle('active', item.dataset.tab === tabId);
    });
    tabPanes.forEach(pane => {
      pane.style.display = (pane.id === `tab-${tabId}`) ? 'block' : 'none';
    });
    // Update URL hash without scroll
    history.replaceState(null, null, `#${tabId}`);
  }

  navItems.forEach(item => {
    item.addEventListener('click', (e) => {
      e.preventDefault();
      const targetTab = item.dataset.tab;
      if (targetTab) switchTab(targetTab);
    });
  });

  // Handle initial tab from URL hash
  const initialHash = window.location.hash.replace('#', '');
  if (initialHash && document.getElementById(`tab-${initialHash}`)) {
    switchTab(initialHash);
  } else {
    switchTab('community');
  }

  // Role Switcher Modal / Trigger
  const roleBtn = document.getElementById('btnRoleSwitch');
  if (roleBtn) {
    roleBtn.addEventListener('click', async () => {
      const currentRole = roleBtn.dataset.currentRole;
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

  // Category Filter Pills in Community Feed
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

  // Create Post Submission
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
          // Reset Form
          titleInput.value = '';
          bodyInput.value = '';
          submitBtn.disabled = false;
          submitBtn.textContent = '🔥 Publicar en el Muro';
          window.location.reload();
        } else {
          alert(data.error || 'Ocurrió un error al publicar.');
          submitBtn.disabled = false;
          submitBtn.textContent = '🔥 Publicar en el Muro';
        }
      } catch (err) {
        console.error(err);
        submitBtn.disabled = false;
        submitBtn.textContent = '🔥 Publicar en el Muro';
      }
    });
  }

  // Like / Fire Reactions
  document.addEventListener('click', async (e) => {
    const likeBtn = e.target.closest('.btn-reaction');
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
          likeBtn.classList.toggle('reacted', data.liked);
          const counterSpan = likeBtn.querySelector('.reaction-count');
          if (counterSpan) counterSpan.textContent = data.likes;

          // Update header points pill
          const pointsPill = document.getElementById('userPointsDisplay');
          if (pointsPill && data.user) {
            pointsPill.textContent = `🔥 ${data.user.points} Fuego`;
          }
        }
      } catch (err) {
        console.error(err);
      }
    }
  });

  // Comments Toggle & Submission
  document.addEventListener('click', (e) => {
    const toggleBtn = e.target.closest('.btn-comments-toggle');
    if (toggleBtn) {
      const postId = toggleBtn.dataset.postId;
      const thread = document.getElementById(`comments-${postId}`);
      if (thread) {
        thread.style.display = (thread.style.display === 'none' || thread.style.display === '') ? 'flex' : 'none';
      }
    }
  });

  document.addEventListener('submit', async (e) => {
    const commentForm = e.target.closest('.form-add-comment');
    if (commentForm) {
      e.preventDefault();
      const postId = commentForm.dataset.postId;
      const input = commentForm.querySelector('.comment-input');
      const text = input.value.trim();
      if (!text) return;

      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({ action: 'add_comment', post_id: postId, content: text, csrf_token: csrfToken })
        });
        const data = await res.json();
        if (data.success) {
          input.value = '';
          const thread = document.getElementById(`comments-list-${postId}`);
          if (thread) {
            const newCommentHtml = `
              <div class="comment-item">
                <img src="${data.comment.author.avatar}" alt="${data.comment.author.name}" class="comment-avatar">
                <div class="comment-body">
                  <div class="comment-author-name">${data.comment.author.name}</div>
                  <div class="comment-text">${data.comment.content}</div>
                </div>
              </div>
            `;
            thread.insertAdjacentHTML('beforeend', newCommentHtml);
          }
        }
      } catch (err) {
        console.error(err);
      }
    }
  });

  // Classroom Course Selection & Lesson Player
  const courseCards = document.querySelectorAll('.course-card');
  const coursesCatalogView = document.getElementById('coursesCatalogView');
  const coursePlayerView = document.getElementById('coursePlayerView');
  const btnBackToCatalog = document.getElementById('btnBackToCourses');

  courseCards.forEach(card => {
    card.addEventListener('click', () => {
      const courseId = card.dataset.courseId;
      if (coursesCatalogView && coursePlayerView) {
        coursesCatalogView.style.display = 'none';
        coursePlayerView.style.display = 'block';
      }
    });
  });

  if (btnBackToCatalog) {
    btnBackToCatalog.addEventListener('click', () => {
      if (coursesCatalogView && coursePlayerView) {
        coursePlayerView.style.display = 'none';
        coursesCatalogView.style.display = 'block';
      }
    });
  }

  // Lesson Complete Toggle
  const btnCompleteLesson = document.getElementById('btnToggleCompleteLesson');
  if (btnCompleteLesson) {
    btnCompleteLesson.addEventListener('click', async () => {
      const lessonId = btnCompleteLesson.dataset.lessonId;
      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({ action: 'complete_lesson', lesson_id: lessonId, csrf_token: csrfToken })
        });
        const data = await res.json();
        if (data.success) {
          btnCompleteLesson.classList.toggle('completed', data.completed);
          btnCompleteLesson.innerHTML = data.completed ? '✅ Clase Completada (+20 Fuego)' : '⭕ Marcar como Completada';

          // Update header points
          const pointsPill = document.getElementById('userPointsDisplay');
          if (pointsPill && data.user) {
            pointsPill.textContent = `🔥 ${data.user.points} Fuego`;
          }
        }
      } catch (err) {
        console.error(err);
      }
    });
  }

  // Chat Messenger
  const chatForm = document.getElementById('formSendChat');
  const chatScroll = document.getElementById('chatMessagesScroll');
  if (chatForm && chatScroll) {
    chatScroll.scrollTop = chatScroll.scrollHeight;

    chatForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const chatInput = document.getElementById('chatTextInput');
      const text = chatInput.value.trim();
      if (!text) return;

      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({ action: 'send_chat', content: text, csrf_token: csrfToken })
        });
        const data = await res.json();
        if (data.success) {
          chatInput.value = '';
          const msgHtml = `
            <div class="chat-bubble-row">
              <img src="${data.message.avatar}" alt="${data.message.author}" class="comment-avatar">
              <div class="chat-bubble-content ${data.message.is_host ? 'host-msg' : ''}">
                <div style="font-size: 0.78rem; font-weight: 700; color: var(--c-text-muted); margin-bottom: 2px;">
                  ${data.message.author} • ${data.message.time}
                </div>
                <div style="font-size: 0.9rem; color: var(--c-text-main);">
                  ${data.message.content}
                </div>
              </div>
            </div>
          `;
          chatScroll.insertAdjacentHTML('beforeend', msgHtml);
          chatScroll.scrollTop = chatScroll.scrollHeight;
        }
      } catch (err) {
        console.error(err);
      }
    });
  }

  // Schedule Meet Form (Admin Only)
  const formCreateMeet = document.getElementById('formCreateMeet');
  if (formCreateMeet) {
    formCreateMeet.addEventListener('submit', async (e) => {
      e.preventDefault();
      const title = document.getElementById('meetTitleInput').value.trim();
      const dateStr = document.getElementById('meetDateInput').value.trim();
      const timeStr = document.getElementById('meetTimeInput').value.trim();
      const zoomUrl = document.getElementById('meetZoomInput').value.trim();

      if (!title || !dateStr) return;

      try {
        const res = await fetch(API_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
          body: JSON.stringify({
            action: 'create_meet',
            title: title,
            date: dateStr,
            time: timeStr,
            zoom_url: zoomUrl,
            csrf_token: csrfToken
          })
        });
        const data = await res.json();
        if (data.success) {
          alert('¡Meet programado con éxito!');
          window.location.reload();
        } else {
          alert(data.error || 'Error al programar meet.');
        }
      } catch (err) {
        console.error(err);
      }
    });
  }

  // Login Form Submission
  const formLogin = document.getElementById('formCampusLogin');
  if (formLogin) {
    formLogin.addEventListener('submit', async (e) => {
      e.preventDefault();
      const email = document.getElementById('loginEmailInput').value.trim();
      const password = document.getElementById('loginPasswordInput').value;
      const feedback = document.getElementById('loginFeedbackMsg');
      const submitBtn = document.getElementById('btnLoginSubmit');

      if (!email || !password) return;

      submitBtn.disabled = true;
      submitBtn.textContent = 'Verificando...';
      feedback.style.display = 'none';

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
          feedback.style.background = '#dcfce7';
          feedback.style.color = '#15803d';
          feedback.textContent = data.message || 'Ingreso exitoso.';
          setTimeout(() => {
            window.location.reload();
          }, 600);
        } else {
          feedback.style.display = 'block';
          feedback.style.background = '#fee2e2';
          feedback.style.color = '#b91c1c';
          feedback.textContent = data.error || 'Error al ingresar.';
          submitBtn.disabled = false;
          submitBtn.textContent = '🚀 Ingresar al Campus';
        }
      } catch (err) {
        console.error(err);
        submitBtn.disabled = false;
        submitBtn.textContent = '🚀 Ingresar al Campus';
      }
    });
  }
});
