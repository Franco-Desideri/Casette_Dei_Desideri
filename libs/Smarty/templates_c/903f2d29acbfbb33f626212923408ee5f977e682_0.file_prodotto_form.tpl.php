<?php
/* Smarty version 5.5.1, created on 2025-06-27 15:13:17
  from 'file:admin/prodotto_form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685e98ed87e274_91109183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '903f2d29acbfbb33f626212923408ee5f977e682' => 
    array (
      0 => 'admin/prodotto_form.tpl',
      1 => 1751029992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_admin.tpl' => 1,
  ),
))) {
function content_685e98ed87e274_91109183 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_875036396685e98ed865c82_77326827', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_875036396685e98ed865c82_77326827 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2><?php if ($_smarty_tpl->getValue('prodotto')) {?>Modifica prodotto<?php } else { ?>Aggiungi nuovo prodotto<?php }?></h2>

<form method="post" action="/Casette_Dei_Desideri/AdminProdotto/<?php if ($_smarty_tpl->getValue('prodotto')) {?>salvaModifica<?php } else { ?>salva<?php }?>">
    <?php if ($_smarty_tpl->getValue('prodotto')) {?>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">
    <?php }?>

    <label for="tipo">Tipo prodotto:</label>
    <select name="tipo" id="tipo" required>
        <option value="quantita" <?php if ($_smarty_tpl->getValue('tipo') == 'quantita') {?>selected<?php }?>>A pezzi</option>
        <option value="peso" <?php if ($_smarty_tpl->getValue('tipo') == 'peso') {?>selected<?php }?>>A peso</option>
    </select>

    <label>Nome:</label>
    <input type="text" name="nome" required value="<?php if ($_smarty_tpl->getValue('prodotto')) {
echo $_smarty_tpl->getValue('prodotto')->getNome();
}?>">

    <label>Foto (URL):</label>
    <input type="text" name="foto" required value="<?php if ($_smarty_tpl->getValue('prodotto')) {
echo $_smarty_tpl->getValue('prodotto')->getFoto();
}?>">

    <?php if ($_smarty_tpl->getValue('tipo') == 'quantita') {?>
        <label>Prezzo:</label>
        <input type="number" step="0.01" name="prezzo" value="<?php if ($_smarty_tpl->getValue('prodotto')) {
echo $_smarty_tpl->getValue('prodotto')->getPrezzo();
}?>">

        <label>Peso per pezzo (g):</label>
        <input type="number" name="peso" value="<?php if ($_smarty_tpl->getValue('prodotto')) {
echo $_smarty_tpl->getValue('prodotto')->getPeso();
}?>">
    <?php } elseif ($_smarty_tpl->getValue('tipo') == 'peso') {?>
        <label>Prezzo al Kg:</label>
        <input type="number" step="0.01" name="prezzoKg" value="<?php if ($_smarty_tpl->getValue('prodotto')) {
echo $_smarty_tpl->getValue('prodotto')->getPrezzoKg();
}?>">

        <label>Range peso (es. 500g - 1kg):</label>
        <input type="text" name="rangePeso" value="<?php if ($_smarty_tpl->getValue('prodotto')) {
echo $_smarty_tpl->getValue('prodotto')->getRangePeso();
}?>">

        <label>Prezzo per il range:</label>
        <input type="number" step="0.01" name="prezzoRange" value="<?php if ($_smarty_tpl->getValue('prodotto')) {
echo $_smarty_tpl->getValue('prodotto')->getPrezzoRange();
}?>">
    <?php }?>

    <br><br>
    <button type="submit"><?php if ($_smarty_tpl->getValue('prodotto')) {?>Salva modifiche<?php } else { ?>Aggiungi prodotto<?php }?></button>
</form>

<?php
}
}
/* {/block "contenuto"} */
}
