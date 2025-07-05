<?php
/* Smarty version 5.5.1, created on 2025-07-02 18:08:28
  from 'file:utente/home1.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6865597cc847b4_46687948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df40d785121db716158d42fd12e217ced7e28e9e' => 
    array (
      0 => 'utente/home1.tpl',
      1 => 1751472503,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6865597cc847b4_46687948 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
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
              <li><a href="/Casette_Dei_Desideri/User/home" class="active">Home</a></li>
              <li><a href="/Casette_Dei_Desideri/Struttura/lista">Strutture</a></li>
              <li><a href="/Casette_Dei_Desideri/Ordine/listaProdotti">Servizi</a></li>
              <li><a href="/Casette_Dei_Desideri/User/profilo">Profilo</a></li>
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

  <div class="hero-card">
    <img src="/Casette_Dei_Desideri/public/assets/immagini/hero.jpg" alt="B&B Casette Dei Desideri">
    <div class="hero-text">
      <div class="hero-title">B&amp;B Casette Dei Desideri</div>
      <div class="hero-subtitle">"Buon giorno buona gente"...</div>
      <div class="hero-subtitle">Il vostro soggiorno a Pogio Bustone presso Le Casette Dei Desideri vi aspetta.</div>
      <div class="hero-subtitle">Venite a scoprire i nostri servizi e le meraviglie che vi riserva il nostro paese!</div>
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


  <div class="section-divider"></div>

  <h2 class="section-title">Perchè venire a trovarci?</h2>
  

  <div class="card-container">
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('attrazioni')) > 0) {?>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('attrazioni'), 'attrazione');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('attrazione')->value) {
$foreach0DoElse = false;
?>
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
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
        <p>Non ci sono attrazioni disponibili</p>
    <?php }?>
  </div>


  <div class="section-divider"></div>

  <h2 class="section-title">Eventi da non perdere</h2>


  <div class="card-list-info">
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('eventi')) > 0) {?>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('eventi'), 'evento');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('evento')->value) {
$foreach1DoElse = false;
?>
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
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
        <p>Non ci sono attrazioni disponibili</p>
    <?php }?>





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
