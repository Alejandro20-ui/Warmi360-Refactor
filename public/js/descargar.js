// public/js/descargar.js

// Mobile menu toggle (si tu header usa #mobile-menu-button)
document.addEventListener('DOMContentLoaded', function() {
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
  }

  // IntersectionObserver para animaciones "reveal"
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) entry.target.classList.add('visible');
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

  // Chatbot toggle (si existe)
  const chatbotWindow = document.getElementById('chatbot-window');
  window.toggleChatbot = function() {
    if (!chatbotWindow) return;
    chatbotWindow.classList.toggle('hidden');
    chatbotWindow.classList.toggle('flex');
  };

  window.sendMessage = function() {
    const input = document.getElementById('user-input');
    const chatBody = document.getElementById('chat-body');
    if (!input || !chatBody) return;
    const message = input.value.trim();
    if (!message) return;
    const userMsg = document.createElement('div');
    userMsg.className = 'flex justify-end mb-3 chat-bubble';
    userMsg.innerHTML = `<div class="bg-primary text-white p-3 rounded-lg max-w-xs shadow">${escapeHtml(message)}</div>`;
    chatBody.appendChild(userMsg);
    setTimeout(()=> userMsg.classList.add('visible'), 30);
    input.value = '';
    chatBody.scrollTop = chatBody.scrollHeight;

    setTimeout(() => {
      const botMsg = document.createElement('div');
      botMsg.className = 'flex justify-start mb-3 chat-bubble';
      botMsg.innerHTML = `<div class="bg-background-light text-text-dark p-3 rounded-lg max-w-xs shadow">Gracias por tu mensaje. Un especialista se pondrá en contacto contigo pronto.</div>`;
      chatBody.appendChild(botMsg);
      setTimeout(()=> botMsg.classList.add('visible'), 30);
      chatBody.scrollTop = chatBody.scrollHeight;
    }, 1200);
  };

  // Send on Enter
  const userInput = document.getElementById('user-input');
  if (userInput) userInput.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') { e.preventDefault(); window.sendMessage(); }
  });

  // Toggle Dije / App
  const dijeBtn = document.getElementById('dije-btn');
  const appBtn = document.getElementById('app-btn');
  const dijeContent = document.getElementById('dije-content');
  const appContent = document.getElementById('app-content');

  if (dijeBtn && appBtn && dijeContent && appContent) {
    dijeBtn.addEventListener('click', () => {
      dijeBtn.classList.add('active'); dijeBtn.classList.remove('inactive');
      appBtn.classList.remove('active'); appBtn.classList.add('inactive');
      dijeContent.classList.remove('hidden');
      appContent.classList.add('hidden');
    });
    appBtn.addEventListener('click', () => {
      appBtn.classList.add('active'); appBtn.classList.remove('inactive');
      dijeBtn.classList.remove('active'); dijeBtn.classList.add('inactive');
      appContent.classList.remove('hidden');
      dijeContent.classList.add('hidden');
    });
  }

  // Small helper: escape HTML
  function escapeHtml(str) {
    return str.replace(/[&<>"']/g, function(m) { return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]); });
  }
});
