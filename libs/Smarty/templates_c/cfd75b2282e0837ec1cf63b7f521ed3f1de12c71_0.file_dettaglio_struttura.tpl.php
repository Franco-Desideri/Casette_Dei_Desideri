<?php
/* Smarty version 5.5.1, created on 2025-07-10 17:02:17
  from 'file:utente/dettaglio_struttura.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686fd5f98b6ee3_27940434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfd75b2282e0837ec1cf63b7f521ed3f1de12c71' => 
    array (
      0 => 'utente/dettaglio_struttura.tpl',
      1 => 1752145144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_template.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_686fd5f98b6ee3_27940434 (\Smarty\Template $_smarty_tpl) {
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
          <h3><?php echo $_smarty_tpl->getValue('struttura')->getTitolo();?>
</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="single-property section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

          <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('foto')) > 0) {?>
            <div class="owl-carousel owl-banner">
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('foto'), 'f');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('f')->value) {
$foreach0DoElse = false;
?>
                <?php if ((true && (true && null !== ($_smarty_tpl->getValue('f')->base64img ?? null)))) {?>
                  <div class="item">
                    <img src="<?php echo $_smarty_tpl->getValue('f')->base64img;?>
" alt="foto" class="img-fluid">
                  </div>
                <?php }?>
              <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
          <?php } else { ?>
            <p>Nessuna immagine disponibile.</p>
          <?php }?>


          <!--Visualizzazione foto
          <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('foto')) > 0) {?>
              <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('foto'), 'f');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('f')->value) {
$foreach1DoElse = false;
?>
                      <?php if ((true && (true && null !== ($_smarty_tpl->getValue('f')->base64img ?? null)))) {?>
                          <img src="<?php echo $_smarty_tpl->getValue('f')->base64img;?>
" alt="foto">
                      <?php }?>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
              </div>
          <?php } else { ?>
              <p>Nessuna immagine disponibile.</p>
          <?php }?>-->


          <div class="main-content">
            <span class="category"><?php echo $_smarty_tpl->getValue('struttura')->getTitolo();?>
</span>
            <h4><?php echo $_smarty_tpl->getValue('struttura')->getLuogo();?>
</h4>
            <p><?php echo $_smarty_tpl->getValue('struttura')->getDescrizione();?>
</p>
          </div> 


        </div>    
        <div class="col-lg-4">
          <div class="info-table">
                <!--tabella informativa-->
                <ul>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/m2.png" alt="" style="max-width: 52px;">
                    <h4>m2<br><span><?php echo $_smarty_tpl->getValue('struttura')->getM2();?>
</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/ospiti.png" alt="" style="max-width: 52px;">
                    <h4>Numero Ospiti<br><span><?php echo $_smarty_tpl->getValue('struttura')->getNumOspiti();?>
</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/bagno.png" alt="" style="max-width: 52px;">
                    <h4>Numero Bagni<br><span><?php echo $_smarty_tpl->getValue('struttura')->getNBagni();?>
</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/letto.png" alt="" style="max-width: 52px;">
                    <h4>Numero Letti<br><span><?php echo $_smarty_tpl->getValue('struttura')->getNLetti();?>
</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/colazione.png" alt="" style="max-width: 52px;">
                    <h4>Colazione<br><span><?php if ($_smarty_tpl->getValue('struttura')->getColazione()) {?>Sì<?php } else { ?>No<?php }?></span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/wifi.png" alt="" style="max-width: 52px;">
                    <h4>Wi-Fi<br><span><?php if ($_smarty_tpl->getValue('struttura')->getWifi()) {?>Sì<?php } else { ?>No<?php }?></span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/balcone.png" alt="" style="max-width: 52px;">
                    <h4>Balcone<br><span><?php if ($_smarty_tpl->getValue('struttura')->getBalcone()) {?>Sì<?php } else { ?>No<?php }?></span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/animali.png" alt="" style="max-width: 52px;">
                    <h4>Animali<br><span><?php if ($_smarty_tpl->getValue('struttura')->getAnimali()) {?>Sì<?php } else { ?>No<?php }?></span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/parcheggio.png" alt="" style="max-width: 52px;">
                    <h4>Parcheggio<br><span><?php if ($_smarty_tpl->getValue('struttura')->getParcheggio()) {?>Sì<?php } else { ?>No<?php }?></span></h4>
                </li>
                </ul>  
            </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Sezione Prenotazione -->
  <div class="prenotazione-wrapper section">
    <div class="container">
      <hr class="my-5">
      <h3 class="mb-4">Prenota il tuo soggiorno</h3>

      <!-- FORM completo con method POST e action -->
      <form method="post" action="/Casette_Dei_Desideri/Prenotazione/calcola" class="prenotazione-form prenotazione-box">
        
        <!-- Campo nascosto per inviare l'ID della struttura -->
        <input type="hidden" name="idStruttura" value="<?php echo $_smarty_tpl->getValue('struttura')->getId();?>
">

        <div class="mb-3 input-with-icon">
          <label for="dataInizio" class="form-label">Data inizio</label>
            <input type="text" class="form-control" id="dataInizio" name="dataInizio" required readonly placeholder="gg/mm/aaaa">
        </div>


        <div class="mb-3">
          <label for="dataFine" class="form-label">Data fine</label>
            <input type="text" class="form-control" id="dataFine" name="dataFine" required readonly placeholder="gg/mm/aaaa">
        </div>

        <div class="mb-3">
          <label for="numOspiti" class="form-label">Numero ospiti (max <?php echo $_smarty_tpl->getValue('struttura')->getNumOspiti();?>
)</label>
          <select class="form-select" id="numOspiti" name="numOspiti" required>
            <?php $_smarty_tpl->assign('maxOspiti', $_smarty_tpl->getValue('struttura')->getNumOspiti(), false, NULL);?>
            <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('maxOspiti')+1) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_start = min(1, $__section_i_0_loop);
$__section_i_0_total = min(($__section_i_0_loop - $__section_i_0_start), $__section_i_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new \Smarty\Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = $__section_i_0_start; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
              <option value="<?php echo ($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null);?>
">
                <?php echo ($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null);?>

              </option>
            <?php
}
}
?>
          </select>
        </div>

        <div class="d-flex justify-content-end mt-4">
          <button type="submit" class="btn prenota-btn">Procedi alla prenotazione</button>
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
    // 1) Prepara i dati PHP/Smarty in JS
    const intervalliDisponibili = [
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('intervalli'), 'i', true);
$_smarty_tpl->getVariable('i')->iteration = 0;
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('i')->value) {
$foreach2DoElse = false;
$_smarty_tpl->getVariable('i')->iteration++;
$_smarty_tpl->getVariable('i')->last = $_smarty_tpl->getVariable('i')->iteration === $_smarty_tpl->getVariable('i')->total;
$foreach2Backup = clone $_smarty_tpl->getVariable('i');
?>
        {
          inizio: '<?php echo $_smarty_tpl->getValue('i')->getDataI()->format("Y-m-d");?>
',
          fine:   '<?php echo $_smarty_tpl->getValue('i')->getDataF()->format("Y-m-d");?>
'
        }<?php if (!$_smarty_tpl->getVariable('i')->last) {?>,<?php }?>
      <?php
$_smarty_tpl->setVariable('i', $foreach2Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    ];

    const dateOccupate = [
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prenotazioni'), 'p', true);
$_smarty_tpl->getVariable('p')->iteration = 0;
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('p')->value) {
$foreach3DoElse = false;
$_smarty_tpl->getVariable('p')->iteration++;
$_smarty_tpl->getVariable('p')->last = $_smarty_tpl->getVariable('p')->iteration === $_smarty_tpl->getVariable('p')->total;
$foreach3Backup = clone $_smarty_tpl->getVariable('p');
?>
        {
          inizio: '<?php echo $_smarty_tpl->getValue('p')->getPeriodo()->getDataI()->format("Y-m-d");?>
',
          fine:   '<?php echo $_smarty_tpl->getValue('p')->getPeriodo()->getDataF()->format("Y-m-d");?>
'
        }<?php if (!$_smarty_tpl->getVariable('p')->last) {?>,<?php }?>
      <?php
$_smarty_tpl->setVariable('p', $foreach3Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    ];
  <?php echo '</script'; ?>
>
  
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/assets/js/prenotazione.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
    inizializzaPrenotazione();
  <?php echo '</script'; ?>
>

  </body>
</html><?php }
}
