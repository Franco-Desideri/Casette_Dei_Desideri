<?php
/* Smarty version 5.5.1, created on 2025-07-12 04:04:00
  from 'file:admin/prodotto_form_peso.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6871c290bb4bb2_15291699',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0eda0ff72447569f4038dad36a6a06b6a93e31a5' => 
    array (
      0 => 'admin/prodotto_form_peso.tpl',
      1 => 1752240284,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_templateAdmin.tpl' => 1,
  ),
))) {
function content_6871c290bb4bb2_15291699 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?><!DOCTYPE html>
<html lang="it">

  <head>

<title>Casette Dei Desideri</title>

<!-- Bootstrap core CSS -->
<link href="/Casette_Dei_Desideri/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/fontawesome.css">
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/templatemo-villa-agency.css">
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/owl.css">
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/animate.css">
<link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style1.css"> 
</head>

<body>

<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_templateAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('paginaCorrente'=>"strutture"), (int) 0, $_smarty_current_dir);
?>  


<div class="admin-content-container">

    <h2 class="admin-page-title">
        <?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>Modifica prodotto a peso<?php } else { ?>Aggiungi nuovo prodotto a peso<?php }?>
    </h2>

    <form method="post" action="/Casette_Dei_Desideri/AdminProdotto/<?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>salvaModifica<?php } else { ?>salva<?php }?>" enctype="multipart/form-data" class="admin-form-container">
        <input type="hidden" name="tipo" value="peso">
        <?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">
        <?php }?>

        <div class="form-group-item">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required value="<?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {
echo $_smarty_tpl->getValue('prodotto')->getNome();
}?>">
        </div>

        <div class="form-group-item">
            <label for="prezzoKg">Prezzo al kg (€):</label>
            <input type="number" id="prezzoKg" step="0.01" name="prezzoKg" required value="<?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {
echo $_smarty_tpl->getValue('prodotto')->getPrezzoKg();
}?>">
        </div>

        <div class="form-group-item">
            <label for="rangePeso">Range di peso (es: 0.5 - 1.5 kg):</label>
            <input type="text" id="rangePeso" name="rangePeso" required value="<?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {
echo $_smarty_tpl->getValue('prodotto')->getRangePeso();
}?>">
        </div>


        <div class="form-group-item">
            <label for="foto">Immagine del prodotto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" <?php if (!(true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>required<?php }?>>
            <?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>
                <p>Immagine attuale: <br>
                    <img src="<?php echo $_smarty_tpl->getValue('prodotto')->fotoBase64;?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" style="max-width: 200px; max-height: 200px;">

                </p>
            <?php }?>
        </div>

        <button type="submit" class="admin-form-button"><?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>Salva modifiche<?php } else { ?>Aggiungi prodotto<?php }?></button>
    </form>

</div>
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
