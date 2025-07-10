<?php
/* Smarty version 5.5.1, created on 2025-07-10 21:32:22
  from 'file:libs/Smarty/templates/utente/conferma_prenotazione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68701546de3402_87010645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdba313106a4ab4ed185309a95ff2cc45bfa3678' => 
    array (
      0 => 'libs/Smarty/templates/utente/conferma_prenotazione.tpl',
      1 => 1752174910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68701546de3402_87010645 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19619736968701546d27e12_58553802', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_19619736968701546d27e12_58553802 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<div class="confirmation-page-wrapper">
    <div class="main-content container" style="text-align: center; padding: 50px;">
        <div class="popup-confirmation">
            <h2>Prenotazione effettuata con successo!</h2>
            <p>Grazie per la sua prenotazione. Le è stata inviata una mail di conferma.</p>
            <a href="/Casette_Dei_Desideri/Home" class="main-button" style="margin-top: 20px;">Torna alla Home</a>
        </div>
    </div>
</div>

<?php
}
}
/* {/block "contenuto"} */
}
