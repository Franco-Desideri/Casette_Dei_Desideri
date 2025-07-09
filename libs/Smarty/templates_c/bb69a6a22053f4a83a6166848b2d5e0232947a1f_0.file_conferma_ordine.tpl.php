<?php
/* Smarty version 5.5.1, created on 2025-07-09 12:27:12
  from 'file:libs/Smarty/templates/utente/conferma_ordine.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686e4400332b46_70956223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb69a6a22053f4a83a6166848b2d5e0232947a1f' => 
    array (
      0 => 'libs/Smarty/templates/utente/conferma_ordine.tpl',
      1 => 1751711088,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686e4400332b46_70956223 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_926386805686e4400128334_24174236', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_926386805686e4400128334_24174236 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<div class="confirmation-page-wrapper">
    <div class="main-content container" style="text-align: center; padding: 50px;">
        <div class="popup-confirmation">
            <h2>Ordine Inviato!</h2>
            <p>Grazie per il tuo ordine. Valuteremo la disponibilità e le faremo sapere al più presto.</p>
            <a href="/Casette_Dei_Desideri/Home" class="main-button" style="margin-top: 20px;">Torna alla Home</a>
        </div>
    </div>
</div>

<?php
}
}
/* {/block "contenuto"} */
}
