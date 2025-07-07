<?php
/* Smarty version 5.5.1, created on 2025-07-07 13:05:15
  from 'file:utente/home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686ba9ebedc795_48742346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '574c33d7c29324b299af6b9ad213bf5d0238be39' => 
    array (
      0 => 'utente/home.tpl',
      1 => 1751886284,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_template.tpl' => 1,
  ),
))) {
function content_686ba9ebedc795_48742346 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?><!DOCTYPE html>
<html lang="it">

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

  <?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_template.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('paginaCorrente'=>"strutture"), (int) 0, $_smarty_current_dir);
?>

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
