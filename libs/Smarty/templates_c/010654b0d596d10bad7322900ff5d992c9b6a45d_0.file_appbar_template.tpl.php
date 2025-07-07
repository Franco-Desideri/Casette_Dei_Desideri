<?php
/* Smarty version 5.5.1, created on 2025-07-06 15:05:30
  from 'file:partials/appbar_template.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686a749a22b878_78170760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '010654b0d596d10bad7322900ff5d992c9b6a45d' => 
    array (
      0 => 'partials/appbar_template.tpl',
      1 => 1751807127,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686a749a22b878_78170760 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\partials';
?><!-- ***** Animazione di Caricamento ***** -->
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
          <a href="/Casette_Dei_Desideri/User/home" class="logo" style="white-space: nowrap;">
            <h1>Casette Dei Desideri</h1>
          </a>
            <ul class="nav">
              <li><a href="/Casette_Dei_Desideri/User/home"<?php if ($_SERVER['REQUEST_URI'] == '/Casette_Dei_Desideri/User/home') {?> class="active"<?php }?>>Home</a></li>
              <li><a href="/Casette_Dei_Desideri/Struttura/lista"<?php if ($_SERVER['REQUEST_URI'] == '/Casette_Dei_Desideri/Struttura/lista') {?> class="active"<?php }?>>Strutture</a></li>
              <li><a href="/Casette_Dei_Desideri/Ordine/listaProdotti"<?php if ($_SERVER['REQUEST_URI'] == '/Casette_Dei_Desideri/Ordine/listaProdotti') {?>class="active"<?php }?>>Servizi</a></li>
              <li><a href="/Casette_Dei_Desideri/User/profilo"<?php if ($_SERVER['REQUEST_URI'] == '/Casette_Dei_Desideri/User/profilo') {?>class="active"<?php }?>>Profilo</a></li>
            </ul>
          <a class='menu-trigger'><span>Menu</span></a>
        </nav>
      </div>
    </div>
  </div>
</header>

<?php }
}
