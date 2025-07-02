<?php
/* Smarty version 5.5.1, created on 2025-07-01 12:54:02
  from 'file:utente/lista_strutture.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6863be4a6fa181_85591662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b65fb2cd8fec660f00928285dcf98c5913e47f07' => 
    array (
      0 => 'utente/lista_strutture.tpl',
      1 => 1751366973,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6863be4a6fa181_85591662 (\Smarty\Template $_smarty_tpl) {
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
<!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
  </head>

<body>

  <!-- ***** Animazione di Caricamento ***** -->
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
  <!-- ***** Barra Superiore ***** -->

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

  <!-- ***** Header principale e Menù di navigazione ***** -->
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
                      <li><a href="/Casette_Dei_Desideri/Struttura/lista" class="active">Strutture</a></li>
                      <li><a href="contatti.tpl">Contatti</a></li>
                      <li><a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Fine Menù ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Intestazione della pagina ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a> / Strutture</span>
          <h3>Strutture</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="section properties">
    <div class="container">
      
    
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('strutture')) > 0) {?>
        <div class="row properties-box">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('strutture'), 'struttura');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('struttura')->value) {
$foreach0DoElse = false;
?>
            <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 str">
                <div class="item">
                <a href="/Casette_Dei_Desideri/Struttura/dettaglio/<?php echo $_smarty_tpl->getValue('struttura')->getId();?>
">
                    <?php if ($_smarty_tpl->getValue('struttura')->immaginePrincipale) {?>
                      <img src="<?php echo $_smarty_tpl->getValue('struttura')->immaginePrincipale;?>
" alt="Struttura" />
                    <?php }?>


                </a>
                <span class="category"><?php echo $_smarty_tpl->getValue('struttura')->getTitolo();?>
</span>
                <h4><a href="/Casette_Dei_Desideri/Struttura/dettaglio/<?php echo $_smarty_tpl->getValue('struttura')->getId();?>
"><?php echo $_smarty_tpl->getValue('struttura')->getLuogo();?>
</a></h4>
                <ul>
                  <li>
                    <span class="prop-label">Bagni:</span>
                    <span class="prop-value"><strong><?php echo $_smarty_tpl->getValue('struttura')->getNBagni();?>
</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Letti:</span>
                    <span class="prop-value"><strong><?php echo $_smarty_tpl->getValue('struttura')->getNLetti();?>
</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Metri quadri:</span>
                    <span class="prop-value"><strong><?php echo $_smarty_tpl->getValue('struttura')->getM2();?>
</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Ospiti:</span>
                    <span class="prop-value"><strong><?php echo $_smarty_tpl->getValue('struttura')->getNumOspiti();?>
</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Parcheggio:</span>
                    <span class="prop-value"><strong><?php if ($_smarty_tpl->getValue('struttura')->getParcheggio()) {?>Sì<?php } else { ?>No<?php }?></strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Colazione:</span>
                    <span class="prop-value"><strong><?php if ($_smarty_tpl->getValue('struttura')->getColazione()) {?>Sì<?php } else { ?>No<?php }?></strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Wifi:</span>
                    <span class="prop-value"><strong><?php if ($_smarty_tpl->getValue('struttura')->getWifi()) {?>Sì<?php } else { ?>No<?php }?></strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Animali ammessi:</span>
                    <span class="prop-value"><strong><?php if ($_smarty_tpl->getValue('struttura')->getAnimali()) {?>Sì<?php } else { ?>No<?php }?></strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Balcone:</span>
                    <span class="prop-value"><strong><?php if ($_smarty_tpl->getValue('struttura')->getBalcone()) {?>Sì<?php } else { ?>No<?php }?></strong></span>
                  </li>

                </ul>
                <div class="main-button">
                    <a href="/Casette_Dei_Desideri/Struttura/dettaglio/<?php echo $_smarty_tpl->getValue('struttura')->getId();?>
">Prenota</a>
                </div>
                </div>
            </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
        <?php } else { ?>
        <p>Nessuna struttura trovata.</p>
        <?php }?>
  

    <!--
      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
            <li><a href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">>></a></li>
          </ul>
        </div>
      </div>-->
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Casette Dei Desideri ..... 
        
        Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
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

  </body>
</html><?php }
}
