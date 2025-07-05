<?php
/* Smarty version 5.5.1, created on 2025-07-04 17:54:54
  from 'file:utente/dettaglio_struttura.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6867f94eb4b219_37868329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfd75b2282e0837ec1cf63b7f521ed3f1de12c71' => 
    array (
      0 => 'utente/dettaglio_struttura.tpl',
      1 => 1751644491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6867f94eb4b219_37868329 (\Smarty\Template $_smarty_tpl) {
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
          <span class="breadcrumb"><a href="#">Home</a>  /  Struttura</span>
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



            <!-- Sono pulsanti per visualizzare più dettagli--------------------
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Best useful links ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor kinfolk tonx seitan crucifix 3 wolf moon bicycle rights keffiyeh snackwave wolf same vice, chillwave vexillologist incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How does this work ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor kinfolk tonx seitan crucifix 3 wolf moon bicycle rights keffiyeh snackwave wolf same vice, chillwave vexillologist incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Why is Villa the best ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor kinfolk tonx seitan crucifix 3 wolf moon bicycle rights keffiyeh snackwave wolf same vice, chillwave vexillologist incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
          </div>-->



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





<!--
  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Best Deal</h6>
            <h2>Find Your Best Deal Right Now!</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Appartment</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Villa House</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Penthouse</button>
                  </li>
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>540 m2</span></li>
                          <li>Floor number <span>3</span></li>
                          <li>Number of rooms <span>8</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="/Casette_Dei_Desideri/public/assets/images/deal-01.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>All Info About Apartment</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger poutine next level humblebrag swag franzen.</p>
                      <div class="icon-button">
                        <a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>250 m2</span></li>
                          <li>Floor number <span>26th</span></li>
                          <li>Number of rooms <span>5</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="/Casette_Dei_Desideri/public/assets/images/deal-02.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Detail Info About New Villa</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger poutine next level humblebrag swag franzen.</p>
                      <div class="icon-button">
                        <a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                  <div class="row">
                    





                    <div class="col-lg-6">
                      <img src="/Casette_Dei_Desideri/public/assets/images/deal-03.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Penthouse</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut Kinfolk tonx seitan crucifix 3 wolf moon bicycle rights keffiyeh snackwave wolf same vice, chillwave vexillologistlabore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger poutine next level humblebrag swag franzen.</p>
                      <div class="icon-button">
                        <a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->

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




  <?php echo '<script'; ?>
>
    // 1) Prepara i tuoi dati PHP/Smarty in JS
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
        { // Smarty copierà queste righe
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


<?php echo '<script'; ?>
>
  function isRangeContinuo(startStr, endStr) {
    const start = new Date(startStr);
    const end = new Date(endStr);

    for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
      const ds = d.toISOString().slice(0, 10);
      if (!isInIntervallo(ds) || isOccupata(ds)) {
        return false;
      }
    }
    return true;
  }

  document.querySelector('.prenotazione-form').addEventListener('submit', function(e) {
    const inputInizio = document.getElementById('dataInizio');
    const inputFine = document.getElementById('dataFine');

    const dataInizio = inputInizio._flatpickr.selectedDates[0];
    const dataFine = inputFine._flatpickr.selectedDates[0];

    // Controllo che entrambi i campi siano compilati
    if (!dataInizio || !dataFine) {
      alert("Devi selezionare sia la data di inizio che quella di fine.");
      e.preventDefault();
      return;
    }

    // Formatta le date nel formato YYYY-MM-DD
    const dataInizioStr = dataInizio.toISOString().slice(0, 10);
    const dataFineStr = dataFine.toISOString().slice(0, 10);

    // Controllo intervallo disponibile per inizio e fine
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

    // Controllo che data fine sia dopo o uguale a data inizio
    if (dataFine < dataInizio) {
      alert("La data di fine deve essere uguale o successiva a quella di inizio.");
      e.preventDefault();
      return;
    }

    // ✅ NUOVO controllo: range continuo senza buchi
    if (!isRangeContinuo(dataInizioStr, dataFineStr)) {
      alert("L'intervallo selezionato contiene giorni non prenotabili.");
      e.preventDefault();
      return;
    }
  });
<?php echo '</script'; ?>
>





  </body>
</html><?php }
}
