<?php
/* Smarty version 5.5.1, created on 2025-07-10 17:03:52
  from 'file:utente/pagamento_prenotazione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686fd6583d4657_71030953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4e11a554883c282606d2483ab0d7415e68c5c3d' => 
    array (
      0 => 'utente/pagamento_prenotazione.tpl',
      1 => 1752139402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_template.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_686fd6583d4657_71030953 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?><!DOCTYPE html>
<html lang="it">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Casette Dei Desideri</title>

    <!-- Bootstrap core CSS -->
    <link href="/Casette_Dei_Desideri/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/owl.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  </head>

<body>

  <?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_template.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('paginaCorrente'=>"strutture"), (int) 0, $_smarty_current_dir);
?>

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a>/ Struttura / Prenotazione / Riepilogo / Pagamento</span>
          <h3>Pagamento</h3>
        </div>
      </div>
    </div>
  </div>

<div class="fullpage-wrapper">
  <div class="form-card">

    <h2 class="text-center mb-5" style="font-weight: 700;">Pagamento</h2>

    <form method="post" action="/Casette_Dei_Desideri/Prenotazione/salvaDatiPagamento">

      <div class="mb-3">
        <label class="form-label fw-semibold">Nome del Titolare</label>
        <input type="text" name="nomeCarta" class="form-control" required placeholder="nome">
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Cognome del Titolare</label>
        <input type="text" name="cognomeCarta" class="form-control" required placeholder="cognome">
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Numero Carta</label>
        <input type="text" name="numeroCarta" maxlength="19" class="form-control" required placeholder="1234 5678 9012 3456">
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">CVV</label>
        <input type="text" name="cvv" maxlength="4" class="form-control" required placeholder="cvv">
      </div>

      <div class="mb-4">
        <label class="form-label fw-semibold">Scadenza</label>
        <input type="date" name="scadenza" class="form-control" required placeholder="gg/mm/aaaa">
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-success px-5">Conferma Pagamento</button>
      </div>

    </form>

  </div>
</div>




  <?php $_smarty_tpl->renderSubTemplate("file:partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('paginaCorrente'=>"strutture"), (int) 0, $_smarty_current_dir);
?> 

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/vendor/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/assets/js/isotope.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/assets/js/owl-carousel.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/assets/js/counter.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/assets/js/custom.js"><?php echo '</script'; ?>
>
  <!-- Flatpickr JS -->
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/flatpickr"><?php echo '</script'; ?>
>




  <?php echo '<script'; ?>
>
    // 1) Prepara i tuoi dati PHP/Smarty in JS
    const intervalliDisponibili = [
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('intervalli'), 'i', true);
$_smarty_tpl->getVariable('i')->iteration = 0;
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('i')->value) {
$foreach0DoElse = false;
$_smarty_tpl->getVariable('i')->iteration++;
$_smarty_tpl->getVariable('i')->last = $_smarty_tpl->getVariable('i')->iteration === $_smarty_tpl->getVariable('i')->total;
$foreach0Backup = clone $_smarty_tpl->getVariable('i');
?>
        { // Smarty copierà queste righe
          inizio: '<?php echo $_smarty_tpl->getValue('i')->getDataI()->format("Y-m-d");?>
',
          fine:   '<?php echo $_smarty_tpl->getValue('i')->getDataF()->format("Y-m-d");?>
'
        }<?php if (!$_smarty_tpl->getVariable('i')->last) {?>,<?php }?>
      <?php
$_smarty_tpl->setVariable('i', $foreach0Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    ];

    const dateOccupate = [
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prenotazioni'), 'p', true);
$_smarty_tpl->getVariable('p')->iteration = 0;
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('p')->value) {
$foreach1DoElse = false;
$_smarty_tpl->getVariable('p')->iteration++;
$_smarty_tpl->getVariable('p')->last = $_smarty_tpl->getVariable('p')->iteration === $_smarty_tpl->getVariable('p')->total;
$foreach1Backup = clone $_smarty_tpl->getVariable('p');
?>
        {
          inizio: '<?php echo $_smarty_tpl->getValue('p')->getPeriodo()->getDataI()->format("Y-m-d");?>
',
          fine:   '<?php echo $_smarty_tpl->getValue('p')->getPeriodo()->getDataF()->format("Y-m-d");?>
'
        }<?php if (!$_smarty_tpl->getVariable('p')->last) {?>,<?php }?>
      <?php
$_smarty_tpl->setVariable('p', $foreach1Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    ];

    // 2) Le tue funzioni di disponibilità
    function isInIntervallo(dateStr) {
      const d = new Date(dateStr);
      return intervalliDisponibili.some(i =>
        d >= new Date(i.inizio) && d <= new Date(i.fine)
      );
    }
    function isOccupata(dateStr) {
      const d = new Date(dateStr);
      return dateOccupate.some(p =>
        d >= new Date(p.inizio) && d <= new Date(p.fine)
      );
    }

    // 3) Funzione che Flatpickr userà per disabilitare le date
    function disableDates(date) {
      const ds = date.toISOString().slice(0,10); // "YYYY-MM-DD"
      return !isInIntervallo(ds) || isOccupata(ds);
    }

    // 4) Inizializzazione dei due datepickers
    const dataFinePicker = flatpickr("#dataFine", {
      dateFormat: "d-m-Y",
      minDate: "today",
      disable: [ disableDates ], //rende alcune date non selezionabili
      onDayCreate: function(dObj, dStr, fp, dayElem) {  //è chiamata per la creazione di ogni singolo giorno del calendario
        const dataInizioDate = flatpickr.parseDate(document.getElementById('dataInizio').value, "d-m-Y");
        if (dataInizioDate) {
          if (dayElem.dateObj.toDateString() === dataInizioDate.toDateString()) {
            dayElem.classList.add('highlight-day'); //se la data attuale di creazione del Cal. == dataInizio allora colora
          }
        }
      }
    });

    flatpickr("#dataInizio", {
      dateFormat: "d-m-Y",
      minDate: "today",
      disable: [ disableDates ],
      onChange: function(selectedDates, dateStr) {
        if (dateStr) {
          // non permettere a dataFine di essere precedente
          dataFinePicker.set('minDate', dateStr);
        }
      }
    });
  <?php echo '</script'; ?>
>

  </body>
</html><?php }
}
