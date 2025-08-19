document.addEventListener('click', function (e) {
    const trigger = e.target.closest('.has-submenu > .cf-link');
    const openMenus = document.querySelectorAll('.has-submenu.open');
  
    // fermer si clic en dehors
    if (!trigger && !e.target.closest('.cf-submenu')) {
      openMenus.forEach(n => n.classList.remove('open'));
      return;
    }
    // toggle au clic mobile/desktop
    if (trigger) {
      e.preventDefault();
      const li = trigger.parentElement;
      const isOpen = li.classList.contains('open');
      openMenus.forEach(n => n.classList.remove('open'));
      li.classList.toggle('open', !isOpen);
      // afficher/cacher
      li.querySelector('.cf-submenu').style.display = (!isOpen) ? 'block' : 'none';
    }
  });
  // Aperçu photo
function previewImage(event, index) {
    const input = event.target;
    const file = input.files[0];
    const preview = document.getElementById(`preview-photo${index}`);

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
}

// Attacher automatiquement l’événement aux inputs photo
document.querySelectorAll('.photo-placeholder input[type="file"]').forEach((input, idx) => {
    input.addEventListener('change', (e) => previewImage(e, idx + 1));
});

// Boutons de choix
document.querySelectorAll('.btn-choice').forEach(button => {
    button.addEventListener('click', function () {
        const siblings = this.parentNode.querySelectorAll('.btn-choice');
        siblings.forEach(sib => sib.classList.remove('active'));
        this.classList.add('active');
        const hiddenInput = this.parentNode.querySelector('input[type="hidden"]');
        hiddenInput.value = this.getAttribute('data-value');
    });
});
// Boutons .btn-choice : applique l'état "active" sur le bouton cliqué
document.addEventListener('click', (e) => {
    const btn = e.target.closest('.btn-choice');
    if (!btn) return;
  
    document.querySelectorAll('.btn-choice').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
  });
  