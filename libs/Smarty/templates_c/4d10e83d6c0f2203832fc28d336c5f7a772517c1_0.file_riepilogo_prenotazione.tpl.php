<?php
/* Smarty version 5.5.1, created on 2025-07-10 17:03:44
  from 'file:utente/riepilogo_prenotazione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686fd650265081_72561196',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d10e83d6c0f2203832fc28d336c5f7a772517c1' => 
    array (
      0 => 'utente/riepilogo_prenotazione.tpl',
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
function content_686fd650265081_72561196 (\Smarty\Template $_smarty_tpl) {
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
          <span class="breadcrumb"><a href="#">Home</a>  /  Riepilogo</span>
          <h3>Riepilogo prenotazione</h3>
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
            Struttura: <span style="color: #28a745;"><?php echo $_smarty_tpl->getValue('struttura')->getTitolo();?>
</span>
          </h1>


          <!-- Dati della prenotazione -->
          <p class="info">
            <i class="fa fa-calendar" style="font-size: 1.8rem; color: #1e90ff; margin-right: 22px;"></i>
            <strong>Periodo:</strong>&nbsp;<?php echo $_smarty_tpl->getValue('dataInizio');?>
 → <?php echo $_smarty_tpl->getValue('dataFine');?>

          </p>

          <p class="info">
            <i class="fas fa-users" style="font-size: 1.8rem; color: #1e90ff; margin-right: 12px;"></i>
            <strong>Numero Ospiti:</strong>&nbsp;<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('ospiti'));?>

          </p>

          <p class="info">
            <i class="fa-solid fa-coins" style="font-size: 1.8rem; color: #28a745; margin-right: 20px;"></i>
            <strong>Prezzo Totale:</strong>&nbsp;€ <?php echo $_smarty_tpl->getValue('totale');?>

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

        <h3 class="mb-4" style="font-weight: 700; font-size: 2rem;">RIEPILOGO DATI OSPITI:</h3>
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('ospiti'), 'ospite', false, NULL, 'ospitiLoop', array (
  'iteration' => true,
));
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('ospite')->value) {
$foreach0DoElse = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_ospitiLoop']->value['iteration']++;
?>
          <div class="card ospite-card mb-4 rounded">
            <h4 class="ospite-title mb-4">
              Ospite <?php echo ($_smarty_tpl->getValue('__smarty_foreach_ospitiLoop')['iteration'] ?? null);?>

            </h4>

            <div class="row mb-3">
              <div class="col-md-6">
                <p class="ospite-info">
                  <strong>Nome:</strong>&nbsp;<?php echo $_smarty_tpl->getValue('ospite')['nome'];?>

                </p>
              </div>
              <div class="col-md-6">
                <p class="ospite-info">
                  <strong>Cognome:</strong>&nbsp;<?php echo $_smarty_tpl->getValue('ospite')['cognome'];?>

                </p>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <p class="ospite-info">
                  <strong>Telefono:</strong>&nbsp;<?php echo $_smarty_tpl->getValue('ospite')['tell'];?>

                </p>
              </div>
              <div class="col-md-6">
                <p class="ospite-info">
                  <strong>Codice Fiscale:</strong>&nbsp;<?php echo $_smarty_tpl->getValue('ospite')['codiceFiscale'];?>

                </p>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <p class="ospite-info">
                  <strong>Sesso:</strong>&nbsp;<?php echo $_smarty_tpl->getValue('ospite')['sesso'];?>

                </p>
              </div>
              <div class="col-md-6">
                <p class="ospite-info">
                  <strong>Data di Nascita:</strong>&nbsp;<?php echo $_smarty_tpl->getValue('ospite')['dataNascita'];?>

                </p>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <p class="ospite-info">
                  <strong>Luogo di Nascita:</strong>&nbsp;<?php echo $_smarty_tpl->getValue('ospite')['luogoNascita'];?>

                </p>
              </div>
              <?php if ((true && (true && null !== ($_smarty_tpl->getValue('ospite')['documento'] ?? null))) && $_smarty_tpl->getValue('ospite')['documento'] != '') {?>
                <div class="col-md-6">
                  <p class="ospite-info documento-link">
                    <strong>Documento:</strong>
                    <a href="data:<?php echo $_smarty_tpl->getValue('ospite')['documento_mime'];?>
;base64,<?php echo $_smarty_tpl->getValue('ospite')['documento'];?>
"
                      target="_blank" 
                      download="documento_ospite.<?php echo $_smarty_tpl->getValue('ospite')['documento_ext'];?>
">📄 Visualizza documento</a>
                  </p>
                </div>
              <?php }?>
            </div>
          </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
      </form>

      <form method="post" action="/Casette_Dei_Desideri/Prenotazione/pagamento">
        <div class="text-center" style="margin-top: 100px; margin-bottom: 20px;">
          <input type="hidden" name="conferma" value="1">
          <button type="submit" class="btn salva-btn">Conferma Prenotazione</button>
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

  </body><?php }
}
