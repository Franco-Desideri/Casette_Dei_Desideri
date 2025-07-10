<?php
/* Smarty version 5.5.1, created on 2025-07-10 19:11:43
  from 'file:admin/prodotti_lista.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686ff44fa1d8e2_25841354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2d976e2ddc00d9d34777dd3ff782565fa0561d8' => 
    array (
      0 => 'admin/prodotti_lista.tpl',
      1 => 1752139402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_templateAdmin.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_686ff44fa1d8e2_25841354 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?><!DOCTYPE html>
<html lang="it">

  <head>

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

    <section class="hero-section">
        <img src="/Casette_Dei_Desideri/public/assets/images/spesa_domicilio.jpg" class="hero-image" alt="Spesa a domicilio">
        <div class="hero-overlay">
            <h2>Gestione Dei Prodotti</h2>
        </div>
    </section>


    <div class="admin-content-container">
        <h2 class="admin-page-title">Aggiungi Prodotti</h2> <div class="admin-action-links">
            <a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiQuantita" class="btn salva-btn"> Nuovo prodotto a pezzi</a>
            <a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiPeso" class="btn salva-btn"> Nuovo prodotto a peso</a>
    </div>

    <section>
        <h3 class="admin-section-title">Prodotti a Quantità (visibili)</h3>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiQuantita_v')) > 0) {?>
            <ul class="admin-item-list"> <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiQuantita_v'), 'prodotto');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach0DoElse = false;
?>
                    <li>

                        <img src="<?php echo $_smarty_tpl->getValue('prodotto')->fotoBase64;?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image"> <div class="admin-item-details">
                            <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong> - <?php echo $_smarty_tpl->getValue('prodotto')->getPeso();?>
 <?php echo $_smarty_tpl->getValue('prodotto')->getUnitaMisura();?>
 - €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzo();?>



                        </div>
                        <div class="admin-item-actions">
                        <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
"
                            class="btn-edit">✏️ Modifica</a>
                        <form method="POST"
                                action="/Casette_Dei_Desideri/AdminProdotto/disattiva"
                                class="d-inline"
                                onsubmit="return confirm('Nascondere il prodotto?');">
                            <input type="hidden" name="idProdotto" value="<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">
                            <button type="submit" class="btn-delete">🚫 Disattiva</button>
                        </form>
                        </div>

                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p class="admin-no-items-message">Nessun prodotto a quantità presente.</p> <?php }?>
    </section>

    <section>
        <h3 class="admin-section-title">Prodotti a Peso (visibili)</h3>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiPeso_v')) > 0) {?>
            <ul class="admin-item-list"> <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiPeso_v'), 'prodotto');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach1DoElse = false;
?>
                    <li>
                        <img src="<?php echo $_smarty_tpl->getValue('prodotto')->fotoBase64;?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image"> <div class="admin-item-details">
                            <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong> - €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzoKg();?>
/kg
                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
"
                                class="btn-edit">✏️ Modifica</a>
                            <form method="POST" action="/Casette_Dei_Desideri/AdminProdotto/disattiva" 
                                class = "btn-delate"
                                onsubmit="return confirm('Nascondere il prodotto?');">
                               <input type="hidden" name="idProdotto" value="<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">
                               <button type="submit" class="btn-delete">🚫 Disattiva</button>
                            </form>
                        </div>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p class="admin-no-items-message">Nessun prodotto a peso presente.</p> <?php }?>
    </section>

    <section>
        <h3 class="admin-section-title">Prodotti a Quantità (nascosti)</h3>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiQuantita_n')) > 0) {?>
            <ul class="admin-item-list"> <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiQuantita_n'), 'prodotto');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach2DoElse = false;
?>
                    <li>
                        <img src="<?php echo $_smarty_tpl->getValue('prodotto')->fotoBase64;?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image"> <div class="admin-item-details">
                            <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong> - <?php echo $_smarty_tpl->getValue('prodotto')->getPeso();?>
 <?php echo $_smarty_tpl->getValue('prodotto')->getUnitaMisura();?>
 - €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzo();?>

                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
" class="btn-edit">✏️ Modifica</a>
                            <a href="/Casette_Dei_Desideri/AdminProdotto/attiva/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
" onclick="return confirm('Rendere visibile il prodotto?')" class="btn-edit">✅ Attiva</a>
                        </div>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p class="admin-no-items-message">Nessun prodotto a quantità presente.</p> <?php }?>
    </section>

    <section>
        <h3 class="admin-section-title">Prodotti a Peso (nascosti)</h3>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiPeso_n')) > 0) {?>
            <ul class="admin-item-list"> <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiPeso_n'), 'prodotto');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach3DoElse = false;
?>
                    <li>
                        <img src="<?php echo $_smarty_tpl->getValue('prodotto')->fotoBase64;?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image"> <div class="admin-item-details">
                            <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong> - <?php echo $_smarty_tpl->getValue('prodotto')->getRangePeso();?>
g - €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzoKg();?>
 (o €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzoKg();?>
/kg)
                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
"class="btn-edit">✏️ Modifica</a>
                            <a href="/Casette_Dei_Desideri/AdminProdotto/attiva/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
" onclick="return confirm('Rendere visibile il prodotto?')"class="btn-edit">✅ Attiva</a>
                        </div>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p class="admin-no-items-message">Nessun prodotto a peso presente.</p> <?php }?>
    </section>
</div>

    <?php $_smarty_tpl->renderSubTemplate("file:partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('paginaCorrente'=>"strutture"), (int) 0, $_smarty_current_dir);
?>  

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
</html>

<?php }
}
