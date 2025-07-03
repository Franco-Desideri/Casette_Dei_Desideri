<?php
/* Smarty version 5.5.1, created on 2025-07-03 20:36:47
  from 'file:admin/admin_home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6866cdbfcd5897_78797354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '509dc5e7b7d9442af37f0333ad895bbc51c60413' => 
    array (
      0 => 'admin/admin_home.tpl',
      1 => 1751567804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6866cdbfcd5897_78797354 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>Villa Agency - Real Estate HTML5 Template</title>

  <!-- Bootstrap core CSS -->
  <link href="/Casette_Dei_Desideri/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/fontawesome.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/templatemo-villa-agency.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/owl.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/animate.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style.css?v=1">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
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
        <div class="col-lg-12 col-md-12">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> <?php echo $_smarty_tpl->getValue('email_admin');?>
</li>
            <li><i class="fa fa-map"></i> Poggio Bustone, RI 02018</li>
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
            <a href="index.html" class="logo" style="text-align: left; width: 100%;">
            <h1 style="white-space: nowrap; font-size: 24px;">Casetta dei Desideri</h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="/Casette_Dei_Desideri/AdminContenuti/home" class="active">Home</a></li>
              <li><a href="/Casette_Dei_Desideri/AdminStruttura/lista">Strutture</a></li>
              <li><a href="/Casette_Dei_Desideri/AdminProdotto/lista">Servizi</a></li>
              <li><a href="/Casette_Dei_Desideri/Admin/profilo">Profilo</a></li>
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

  <div class="hero-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="hero-title">B&amp;B Casette Dei Desideri</h3>
          <p class="hero-subtitle">"Buon giorno buona gente"...</p>
          <p class="hero-subtitle">Il vostro soggiorno a Poggio Bustone presso Le Casette Dei Desideri vi aspetta.</p>
          <p class="hero-subtitle">Venite a scoprire i nostri servizi e le meraviglie che vi riserva il nostro paese!</p>
        </div>
      </div>
    </div>
  </div>


  <section class="story-section">
    <h2 class="story-title">La nostra Storia</h2>
    <p class="story-text">
      Le nostre strutture nascono in antiche case nel borgo di Poggio Bustone e ormai da 10 anni ospitano tutti coloro che vogliono ammirare le bellezze della nostra terra.
      Le strutture preservano il carattere rustico ma accogliente delle originarie abitazioni dei borghi di montagna.
      Il nostro obiettivo è sempre stato quello di farvi sentire accolti grazie allo spirito genuino che conservano gli appartamenti e che rispetta la storia del posto.
    </p>
  </section>


 <!-- Sezione ATTRAZIONI -->
<div class="section-divider"></div>
<h2 class="section-title">Modifica, aggiungi ed elimina attrazioni</h2>

<!-- Pulsante aggiungi attrazione -->
<form action="/Casette_Dei_Desideri/AdminContenuti/aggiungiAttrazione" method="post" style="margin-bottom: 20px;">
  <button type="submit" class="btn btn-primary">Aggiungi Attrazione</button>
</form>

<div class="card-container">
  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('attrazioni')) > 0) {?>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('attrazioni'), 'attrazione');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('attrazione')->value) {
$foreach0DoElse = false;
?>
      <div class="card-wrapper">
        <a href="/Casette_Dei_Desideri/AdminContenuti/modificaAttrazione/<?php echo $_smarty_tpl->getValue('attrazione')->getId();?>
" class="card-link">
          <div class="card">
            <div class="card-text">
              <p><?php echo $_smarty_tpl->getValue('attrazione')->getDescrizione();?>
</p>
            </div>
            <div class="card-image">
              <img src="<?php echo $_smarty_tpl->getValue('attrazione')->base64img;?>
" alt="Immagine attrazione">
            </div>
          </div>
        </a>
        <form action="/Casette_Dei_Desideri/AdminContenuti/eliminaAttrazione/<?php echo $_smarty_tpl->getValue('attrazione')->getId();?>
" method="post" style="margin-top: 10px;">
          <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa attrazione?');">Elimina</button>
        </form>
      </div>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
  <?php } else { ?>
    <p>Non ci sono attrazioni disponibili</p>
  <?php }?>
</div>

<!-- Sezione EVENTI -->
<div class="section-divider"></div>
<h2 class="section-title">Modifica, aggiungi ed elimina eventi</h2>

<!-- Pulsante aggiungi evento -->
<form action="/Casette_Dei_Desideri/AdminContenuti/aggiungiEvento" method="post" style="margin-bottom: 20px;">
  <button type="submit" class="btn btn-primary">Aggiungi Evento</button>
</form>

<div class="card-list-info">
  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('eventi')) > 0) {?>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('eventi'), 'evento');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('evento')->value) {
$foreach1DoElse = false;
?>
      <div class="card-wrapper">
        <a href="/Casette_Dei_Desideri/AdminContenuti/modificaEvento/<?php echo $_smarty_tpl->getValue('evento')->getId();?>
" class="card-link">
          <div class="card-info">
            <h3 class="card-title"><?php echo $_smarty_tpl->getValue('evento')->getTitolo();?>
</h3>
            <p class="card-dates">Dal <?php echo $_smarty_tpl->getValue('evento')->getDataInizioString('Y-m-d');?>
 al <?php echo $_smarty_tpl->getValue('evento')->getDataFineString('Y-m-d');?>
</p>
            <div class="card-info-image">
              <img src="<?php echo $_smarty_tpl->getValue('evento')->base64img;?>
" alt="Immagine evento">
            </div>
          </div>
        </a>
        <form action="/Casette_Dei_Desideri/AdminContenuti/eliminaEvento/<?php echo $_smarty_tpl->getValue('evento')->getId();?>
" method="post" style="margin-top: 10px;">
          <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo evento?');">Elimina</button>
        </form>
      </div>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
  <?php } else { ?>
    <p>Non ci sono eventi disponibili</p>
  <?php }?>
</div>


  <!-- Scripts -->
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
</html>
<?php }
}
