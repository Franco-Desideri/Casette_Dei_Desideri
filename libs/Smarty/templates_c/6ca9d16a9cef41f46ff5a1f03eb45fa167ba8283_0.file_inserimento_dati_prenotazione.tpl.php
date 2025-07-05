<?php
/* Smarty version 5.5.1, created on 2025-07-04 16:07:06
  from 'file:utente/inserimento_dati_prenotazione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6867e00a87ec29_14495831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ca9d16a9cef41f46ff5a1f03eb45fa167ba8283' => 
    array (
      0 => 'utente/inserimento_dati_prenotazione.tpl',
      1 => 1751638025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6867e00a87ec29_14495831 (\Smarty\Template $_smarty_tpl) {
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


    
<!--
https://templatemo.com/tm-591-villa-agency

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> CasetteDeiDesideri@gmail.com</li>
            <li><i class="fa-solid fa-location-dot"></i> Poggio Bustone, RI 057051</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/Casette_Dei_Desideri/User/home" class="logo" style="white-space: nowrap;">
                        <h1>Cassette Dei Desideri</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="/Casette_Dei_Desideri/User/home">Home</a></li>
                      <li><a href="/Casette_Dei_Desideri/Struttura/lista"class="active">Strutture</a></li>
                      <li><a href="contact.html">Contatti</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

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


  <footer class="footer-no-gap">
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2025 Casette Dei Desideri. 
      </div>
    </div>
  </footer>

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
