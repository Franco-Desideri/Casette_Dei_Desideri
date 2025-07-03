<?php
/* Smarty version 5.5.1, created on 2025-07-02 18:59:49
  from 'file:admin/prodotto_form_peso.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68656585632053_84399437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0eda0ff72447569f4038dad36a6a06b6a93e31a5' => 
    array (
      0 => 'admin/prodotto_form_peso.tpl',
      1 => 1751475583,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header_admin.tpl' => 1,
  ),
))) {
function content_68656585632053_84399437 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19541705966865658560bc77_22600314', "contenuto");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_19541705966865658560bc77_22600314 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/header_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<div class="admin-content-container">

    <h2 class="admin-page-title">
        <?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>Modifica prodotto a peso<?php } else { ?>Aggiungi nuovo prodotto a peso<?php }?>
    </h2>

    <form method="post" action="/Casette_Dei_Desideri/AdminProdotto/<?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>salvaModifica<?php } else { ?>salva<?php }?>" class="admin-form-container">
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
            <label for="prezzoRange">Prezzo per range (€):</label>
            <input type="number" id="prezzoRange" step="0.01" name="prezzoRange" required value="<?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {
echo $_smarty_tpl->getValue('prodotto')->getPrezzoRange();
}?>">
        </div>

        <div class="form-group-item">
            <label for="foto">URL immagine:</label>
            <input type="text" id="foto" name="foto" value="<?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {
echo $_smarty_tpl->getValue('prodotto')->getFoto();
}?>">
        </div>

        <button type="submit" class="admin-form-button"><?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>Salva modifiche<?php } else { ?>Aggiungi prodotto<?php }?></button>
    </form>

</div> <?php
}
}
/* {/block "contenuto"} */
}
