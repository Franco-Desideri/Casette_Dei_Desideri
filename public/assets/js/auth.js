document.querySelectorAll('.tab-btn').forEach(button => {
  button.addEventListener('click', () => {
    const tab = button.getAttribute('data-tab');

    // Attiva tab
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');

    // Mostra contenuto corretto
    document.querySelectorAll('.tab-content').forEach(section => {
      section.classList.remove('active');
      if (section.id === tab) {
        section.classList.add('active');
      }
    });
  });
});
