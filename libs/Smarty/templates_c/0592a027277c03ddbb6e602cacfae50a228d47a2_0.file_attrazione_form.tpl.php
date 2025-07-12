<?php
/* Smarty version 5.5.1, created on 2025-07-12 03:33:36
  from 'file:admin/attrazione_form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6871bb70268273_74657089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0592a027277c03ddbb6e602cacfae50a228d47a2' => 
    array (
      0 => 'admin/attrazione_form.tpl',
      1 => 1752240128,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_6871bb70268273_74657089 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
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
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style.css?v=1">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>

<body>
<div class="Sfondo-bg-wrapper">
  <div class="admin-form">
  
    <h2><?php if ($_smarty_tpl->getValue('attrazione') !== null) {?>Modifica Attrazione<?php } else { ?>Aggiungi Attrazione<?php }?></h2>

    <form action="<?php if ($_smarty_tpl->getValue('attrazione') !== null) {?>/Casette_Dei_Desideri/AdminContenuti/salvaModificaAttrazione<?php } else { ?>/Casette_Dei_Desideri/AdminContenuti/salvaAttrazione<?php }?>" method="post" enctype="multipart/form-data">

        <?php if ($_smarty_tpl->getValue('attrazione') !== null) {?>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('attrazione')->getId();?>
">
        <?php }?>

        <div class="mb-3">
          <label for="immagine">Carica un'immagine</label>
          <input type="file" class="form-control" name="immagine" accept="image/*" <?php if ($_smarty_tpl->getValue('attrazione') === null) {?>required<?php }?>>
        </div>

        <?php if ($_smarty_tpl->getValue('attrazione') !== null && $_smarty_tpl->getValue('attrazione')->getImmagine()) {?>
          <p>Immagine attuale:</p>
          <img src="<?php echo $_smarty_tpl->getValue('attrazione')->base64img;?>
" alt="Immagine attuale">
        <?php }?>

        <div class="mb-3">
          <label for="descrizione">Descrizione</label>
          <textarea name="descrizione" class="form-control" rows="4" required><?php if ($_smarty_tpl->getValue('attrazione') !== null) {
echo $_smarty_tpl->getValue('attrazione')->getDescrizione();
}?></textarea>
        </div>

        <button type="submit" class="btn salva-btn">Salva</button>
    </form>
  </div>
</div>

<?php $_smarty_tpl->renderSubTemplate("file:partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('paginaCorrente'=>"strutture"), (int) 0, $_smarty_current_dir);
?>  

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
