
    // 2) Utility per costruire stringa data YYYY-MM-DD
    function formatDateToString(date) {
      const year = date.getFullYear();
      const month = String(date.getMonth() + 1).padStart(2, '0');
      const day = String(date.getDate()).padStart(2, '0');
      return year + "-" + month + "-" + day;
    }

    // 3) Funzioni di disponibilità
    function isInIntervallo(dateStr) {
      return intervalliDisponibili.some(function(i) {
        return dateStr >= i.inizio && dateStr <= i.fine;
      });
    }

    function isOccupata(dateStr) {
      return dateOccupate.some(function(p) {
        return dateStr >= p.inizio && dateStr <= p.fine;
      });
    }

    // 4) Disabilita date non valide
    function disableDates(date) {
      const ds = formatDateToString(date);
      return !isInIntervallo(ds) || isOccupata(ds);
    }

    // 5) Inizializza Flatpickr
    const dataFinePicker = flatpickr("#dataFine", {
      dateFormat: "d-m-Y",
      minDate: "today",
      disable: [disableDates],
      disableMobile: true,
      defaultHour: 12,
      onDayCreate: function(dObj, dStr, fp, dayElem) {
        const dataInizioDate = flatpickr.parseDate(document.getElementById('dataInizio').value, "d-m-Y");
        if (dataInizioDate && formatDateToString(dayElem.dateObj) === formatDateToString(dataInizioDate)) {
          dayElem.classList.add('highlight-day');
        }
      }
    });

    flatpickr("#dataInizio", {
      dateFormat: "d-m-Y",
      minDate: "today",
      disable: [disableDates],
      disableMobile: true,
      defaultHour: 12,
      onChange: function(selectedDates, dateStr) {
        if (dateStr) {
          dataFinePicker.set('minDate', dateStr);
        }
      }
    });

    // 6) Verifica che l'intervallo selezionato sia continuo e valido
    function isRangeContinuo(startStr, endStr) {
      const start = new Date(startStr);
      const end = new Date(endStr);

      for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
        const giornoStr = formatDateToString(d);
        if (!isInIntervallo(giornoStr) || isOccupata(giornoStr)) {
          return false;
        }
      }

      return true;
    }

    // 7) Validazione lato client prima dell'invio
    document.querySelector('.prenotazione-form').addEventListener('submit', function(e) {
      const inputInizio = document.getElementById('dataInizio');
      const inputFine = document.getElementById('dataFine');

      const dataInizio = inputInizio._flatpickr.selectedDates[0];
      const dataFine = inputFine._flatpickr.selectedDates[0];

      if (!dataInizio || !dataFine) {
        alert("Devi selezionare sia la data di inizio che quella di fine.");
        e.preventDefault();
        return;
      }

      const dataInizioStr = formatDateToString(dataInizio);
      const dataFineStr = formatDateToString(dataFine);

      if (!isInIntervallo(dataInizioStr) || isOccupata(dataInizioStr)) {
        alert("La data di inizio non è disponibile.");
        e.preventDefault();
        return;
      }

      if (!isInIntervallo(dataFineStr) || isOccupata(dataFineStr)) {
        alert("La data di fine non è disponibile.");
        e.preventDefault();
        return;
      }

      if (dataFine < dataInizio) {
        alert("La data di fine deve essere uguale o successiva a quella di inizio.");
        e.preventDefault();
        return;
      }

      if (!isRangeContinuo(dataInizioStr, dataFineStr)) {
        alert("L'intervallo selezionato contiene giorni non prenotabili.");
        e.preventDefault();
        return;
      }
    });
