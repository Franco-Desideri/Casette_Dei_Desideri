function inizializzaAdminStrutturaForm() {
  const selector = document.getElementById('foto-upload');
  const form = selector.closest('form');
  const container = document.getElementById('preview-images');
  const addedKeys = new Set();

  selector.addEventListener('change', function(e) {
    const files = Array.from(e.target.files);
    files.forEach(file => {
      if (!file.type.startsWith('image/')) return;
      const key = `${file.name}|${file.size}|${file.lastModified}`;
      if (addedKeys.has(key)) return;
      addedKeys.add(key);

      const reader = new FileReader();
      reader.onload = function(ev) {
        const wrapper = document.createElement('div');
        wrapper.className = 'preview-item';

        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'remove-photo-btn';
        btn.innerHTML = '&times;';
        wrapper.appendChild(btn);

        const img = document.createElement('img');
        img.src = ev.target.result;
        wrapper.appendChild(img);

        const dt = new DataTransfer();
        dt.items.add(file);
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'file';
        hiddenInput.name = 'foto[]';
        hiddenInput.files = dt.files;
        hiddenInput.style.display = 'none';
        wrapper.appendChild(hiddenInput);

        container.appendChild(wrapper);
      };
      reader.readAsDataURL(file);
    });

    selector.value = '';
  });

  container.addEventListener('click', function(e) {
    if (!e.target.classList.contains('remove-photo-btn')) return;
    const item = e.target.closest('.preview-item');
    const existingInput = item.querySelector('input[name="existing_foto_id[]"]');
    if (existingInput) {
      const marker = document.createElement('input');
      marker.type = 'hidden';
      marker.name = 'delete_foto_id[]';
      marker.value = existingInput.value;
      form.appendChild(marker);
    }
    item.remove();
  });

  // Funzione per aggiungere intervallo
  window.aggiungiIntervallo = function () {
    const wrapper = document.getElementById('intervalli-wrapper');
    const div = document.createElement('div');
    div.className = 'intervallo row gx-3 gy-2 align-items-end p-3 mb-3 border rounded bg-light';
    div.innerHTML = `
      <input type="hidden" name="intervallo_id[]" value="">
      <div class="col-sm-4">
          <label class="form-label">Inizio</label>
          <input type="date" name="intervallo_inizio[]" class="form-control">
      </div>
      <div class="col-sm-4">
          <label class="form-label">Fine</label>
          <input type="date" name="intervallo_fine[]" class="form-control">
      </div>
      <div class="col-sm-3">
          <label class="form-label">Prezzo (€)</label>
          <input type="number" step="0.01" name="intervallo_prezzo[]" class="form-control">
      </div>
      <div class="col-sm-1 text-end">
          <button type="button" class="btn btn-sm btn-outline-danger remove-intervallo" title="Rimuovi questo intervallo">✖</button>
      </div>`;
    wrapper.appendChild(div);
  };

  // Rimuove intervallo su click
  document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-intervallo')) {
      const intervallo = e.target.closest('.intervallo');
      if (intervallo) intervallo.remove();
    }
  });
}
