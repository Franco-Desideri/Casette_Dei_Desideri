<?php
/* Smarty version 5.5.1, created on 2025-07-10 11:33:50
  from 'file:utente/inserimento_dati_prenotazione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686f88fe4ff8d6_76658092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ca9d16a9cef41f46ff5a1f03eb45fa167ba8283' => 
    array (
      0 => 'utente/inserimento_dati_prenotazione.tpl',
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
function content_686f88fe4ff8d6_76658092 (\Smarty\Template $_smarty_tpl) {
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
          <span class="breadcrumb"><a href="#">Home</a>  /  Prenotazione</span>
          <h3>inserisci i dati della prenotazione</h3>
        </div>
      </div>
    </div>
  </div>

<div class="single-property section pt-4">
  <div class="container-fluid px-5">
    <div class="row justify-content-center">
     <div class="col-12" style="padding-left: 80px; padding-right: 80px;">

        <div class="card-box">
          <!-- Titolo principale -->
          <h1 class="title">
            Prenotazione per: <span style="color: #28a745;"><?php echo $_smarty_tpl->getValue('struttura')->getTitolo();?>
</span>
          </h1>

          <!-- Dati della prenotazione -->
          <p class="info">
            <i class="fa fa-calendar" style="font-size: 1.8rem; color: #1e90ff; margin-right: 22px;"></i>
            <strong>Periodo:</strong>&nbsp;<?php echo $_SESSION['prenotazione_temp']['data_inizio'];?>
 → <?php echo $_SESSION['prenotazione_temp']['data_fine'];?>

          </p>

          <p class="info">
            <i class="fa-solid fa-coins" style="font-size: 1.8rem; color: #28a745; margin-right: 12px;"></i>
            <strong>Prezzo Totale:</strong>&nbsp;€ <?php echo $_SESSION['prenotazione_temp']['totale'];?>

          </p>
        </div>

      </div>
    </div>
  </div>
</div>


<hr class="my-5">

<div class="container-fluid px-5">
  <div class="row justify-content-center">
    <div class="col-12" style="padding-left: 80px; padding-right: 80px;">
      
      <form method="post" action="/Casette_Dei_Desideri/Prenotazione/riepilogoCompleto" enctype="multipart/form-data">

        <h3 class="mb-4" style="font-weight: 700; font-size: 2rem;">DATI DEGLI OSPITI:</h3>
        <?php
$__section_ospite_0_loop = (is_array(@$_loop=$_SESSION['prenotazione_temp']['num_ospiti']) ? count($_loop) : max(0, (int) $_loop));
$__section_ospite_0_total = $__section_ospite_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_ospite'] = new \Smarty\Variable(array());
if ($__section_ospite_0_total !== 0) {
for ($__section_ospite_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_ospite']->value['index'] = 0; $__section_ospite_0_iteration <= $__section_ospite_0_total; $__section_ospite_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_ospite']->value['index']++){
?>

          <div class="card mb-4 rounded" style="background-color: #f8f9fa; border: 1px solid #ddd; padding: 20px; width: 100%;">
          <h4 class="ospite-title mb-4">
            Ospite <?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null)+1;?>

          </h4>
          
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="nome_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
">Nome:</label>
              <input type="text" id="nome_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][nome]" class="form-control" required placeholder="nome">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="cognome_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
">Cognome:</label>
              <input type="text" id="cognome_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][cognome]" class="form-control" required placeholder="cognome">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="documento_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
">Documento (PDF o immagine):</label>
              <input type="file" id="documento_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][documento]" accept=".pdf,image/*" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="telefono_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
">Telefono:</label>
              <input type="tel" id="telefono_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][tell]" class="form-control" required placeholder="numero di telefono">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="codiceFiscale_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
">Codice Fiscale:</label>
              <input type="text" id="codiceFiscale_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][codiceFiscale]" class="form-control" required placeholder="XXXXXX00A00A000A">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="sesso_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
">Sesso:</label>
              <select id="sesso_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][sesso]" class="form-select" required>
                <option value="" selected disabled>-- seleziona --</option>
                <option value="M">Maschio</option>
                <option value="F">Femmina</option>
                <option value="Altro">Altro</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="dataNascita_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
">Data di nascita:</label>
              <input type="date" id="dataNascita_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][dataNascita]" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="luogoNascita_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
">Luogo di nascita:</label>
              <input type="text" id="luogoNascita_<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][luogoNascita]" class="form-control" required placeholder="luogo di nascita">
            </div>
          </div>
        </div>
        <?php
}
}
?>

          <div class="text-center" style="margin-top: 100px; margin-bottom: 20px;">
            <button type="submit" class="btn salva-btn">Continua al riepilogo</button>
          </div>
      </form>

    </div>
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

  </body>
</html><?php }
}
