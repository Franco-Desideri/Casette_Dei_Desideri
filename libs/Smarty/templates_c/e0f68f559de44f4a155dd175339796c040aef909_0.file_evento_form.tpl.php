<?php
/* Smarty version 5.5.1, created on 2025-06-28 17:12:30
  from 'file:admin/evento_form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6860065eb8abe6_13286917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0f68f559de44f4a155dd175339796c040aef909' => 
    array (
      0 => 'admin/evento_form.tpl',
      1 => 1751034638,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_admin.tpl' => 1,
  ),
))) {
function content_6860065eb8abe6_13286917 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9724647756860065eb7dbd1_00573854', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_9724647756860065eb7dbd1_00573854 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2><?php if ($_smarty_tpl->getValue('evento') !== null) {?>Modifica Evento<?php } else { ?>Aggiungi Evento<?php }?></h2>

<form action="<?php if ($_smarty_tpl->getValue('evento') !== null) {?>/Casette_Dei_Desideri/AdminContenuti/salvaModificaEvento<?php } else { ?>/Casette_Dei_Desideri/AdminContenuti/salvaEvento<?php }?>" method="post">
    
    <?php if ($_smarty_tpl->getValue('evento') !== null) {?>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('evento')->getId();?>
">
    <?php }?>

    <label>Immagine (URL):</label><br>
    <input type="text" name="immagine" value="<?php if ($_smarty_tpl->getValue('evento') !== null) {
echo $_smarty_tpl->getValue('evento')->getImmagine();
}?>" required><br><br>

    <label>Titolo:</label><br>
    <input type="text" name="titolo" value="<?php if ($_smarty_tpl->getValue('evento') !== null) {
echo $_smarty_tpl->getValue('evento')->getTitolo();
}?>" required><br><br>

    <label>Data inizio:</label><br>
    <input type="date" name="dataInizio" value="<?php if ($_smarty_tpl->getValue('evento') !== null) {
echo $_smarty_tpl->getValue('evento')->getDataInizioString('Y-m-d');
}?>" required><br><br>

    <label>Data fine:</label><br>
    <input type="date" name="dataFine" value="<?php if ($_smarty_tpl->getValue('evento') !== null) {
echo $_smarty_tpl->getValue('evento')->getDataFineString('Y-m-d');
}?>" required><br><br>

    <button type="submit">Salva</button>
</form>

<?php
}
}
/* {/block "contenuto"} */
}
