<?php
/* Smarty version 5.5.1, created on 2025-06-27 14:44:52
  from 'file:utente/struttura_lista.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685e92443eb108_97755171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6ea33aa3e9beb3a07471bcdaef4eb037e972755' => 
    array (
      0 => 'utente/struttura_lista.tpl',
      1 => 1750957422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar.tpl' => 1,
  ),
))) {
function content_685e92443eb108_97755171 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_565250447685e92443cde06_83234124', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_565250447685e92443cde06_83234124 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Le nostre strutture</h2>

<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('strutture')) > 0) {?>
    <ul class="strutture" style="list-style: none; padding: 0;">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('strutture'), 'struttura');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('struttura')->value) {
$foreach0DoElse = false;
?>
            <li style="margin-bottom: 30px; border-bottom: 1px solid #ccc; padding-bottom: 20px;">
                <img src="<?php echo $_smarty_tpl->getValue('struttura')->getImmagine();?>
" alt="Struttura" width="250" style="display: block; margin-bottom: 10px;">
                <h3><?php echo $_smarty_tpl->getValue('struttura')->getNome();?>
</h3>
                <p><?php echo $_smarty_tpl->getValue('struttura')->getDescrizione();?>
</p>
            </li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
<?php } else { ?>
    <p>Nessuna struttura disponibile al momento.</p>
<?php }?>

<?php
}
}
/* {/block "contenuto"} */
}
