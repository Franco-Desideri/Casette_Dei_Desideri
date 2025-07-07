<?php
/* Smarty version 5.5.1, created on 2025-07-07 11:30:16
  from 'file:admin/evento_form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686b93a86289d5_94481965',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0f68f559de44f4a155dd175339796c040aef909' => 
    array (
      0 => 'admin/evento_form.tpl',
      1 => 1751880611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686b93a86289d5_94481965 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title><?php if ($_smarty_tpl->getValue('evento') !== null) {?>Modifica Evento<?php } else { ?>Aggiungi Evento<?php }?> - Admin</title>

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
    <h2><?php if ($_smarty_tpl->getValue('evento') !== null) {?>Modifica Evento<?php } else { ?>Aggiungi Evento<?php }?></h2>

    <form action="<?php if ($_smarty_tpl->getValue('evento') !== null) {?>/Casette_Dei_Desideri/AdminContenuti/salvaModificaEvento<?php } else { ?>/Casette_Dei_Desideri/AdminContenuti/salvaEvento<?php }?>" method="post" enctype="multipart/form-data">

        <?php if ($_smarty_tpl->getValue('evento') !== null) {?>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('evento')->getId();?>
">
        <?php }?>

        <div class="mb-3">
          <label for="immagine">Carica un'immagine</label>
          <input type="file" class="form-control" name="immagine" accept="image/*" <?php if ($_smarty_tpl->getValue('evento') === null) {?>required<?php }?>>
        </div>

        <?php if ($_smarty_tpl->getValue('evento') !== null && $_smarty_tpl->getValue('evento')->getImmagine()) {?>
          <p>Immagine attuale:</p>
          <img src="<?php echo $_smarty_tpl->getValue('evento')->base64img;?>
" alt="Immagine attuale">
        <?php }?>

        <div class="mb-3">
          <label for="titolo">Titolo</label>
          <input type="text" class="form-control" name="titolo" value="<?php if ($_smarty_tpl->getValue('evento') !== null) {
echo $_smarty_tpl->getValue('evento')->getTitolo();
}?>" required>
        </div>

        <div class="mb-3">
          <label for="dataInizio">Data inizio</label>
          <input type="date" class="form-control" name="dataInizio" value="<?php if ($_smarty_tpl->getValue('evento') !== null) {
echo $_smarty_tpl->getValue('evento')->getDataInizioString('Y-m-d');
}?>" required>
        </div>

        <div class="mb-3">
          <label for="dataFine">Data fine</label>
          <input type="date" class="form-control" name="dataFine" value="<?php if ($_smarty_tpl->getValue('evento') !== null) {
echo $_smarty_tpl->getValue('evento')->getDataFineString('Y-m-d');
}?>" required>
        </div>

        <button type="submit" class="btn btn-success">Salva</button>
    </form>
  </div>
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
</html><?php }
}
