<?php
/* Smarty version 5.5.1, created on 2025-07-07 12:56:26
  from 'file:utente/lista_strutture.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686ba7da87d122_60378635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b65fb2cd8fec660f00928285dcf98c5913e47f07' => 
    array (
      0 => 'utente/lista_strutture.tpl',
      1 => 1751883573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_template.tpl' => 1,
  ),
))) {
function content_686ba7da87d122_60378635 (\Smarty\Template $_smarty_tpl) {
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


  </head>

<body>

  <?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_template.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('paginaCorrente'=>"strutture"), (int) 0, $_smarty_current_dir);
?>

  <!-- ***** Intestazione della pagina ***** -->
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
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
