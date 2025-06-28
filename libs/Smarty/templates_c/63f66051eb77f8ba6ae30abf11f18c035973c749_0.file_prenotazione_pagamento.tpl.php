<?php
/* Smarty version 5.5.1, created on 2025-06-28 12:55:32
  from 'file:utente/prenotazione_pagamento.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685fca24cd5dc7_73430687',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63f66051eb77f8ba6ae30abf11f18c035973c749' => 
    array (
      0 => 'utente/prenotazione_pagamento.tpl',
      1 => 1751108117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar.tpl' => 1,
  ),
))) {
function content_685fca24cd5dc7_73430687 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1838923413685fca24cd0b06_33997864', "contenuto");
?>



<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_1838923413685fca24cd0b06_33997864 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Pagamento</h2>

<p>Completa il pagamento per confermare la prenotazione.</p>

<form method="post" action="/Casette_Dei_Desideri/Prenotazione/salvaDatiPagamento">
    <label>Nome del titolare:</label>
    <input type="text" name="nomeCarta" required>

    <label>Cognome del titolare:</label>
    <input type="text" name="cognomeCarta" required>

    <label>Numero carta:</label>
    <input type="text" name="numeroCarta" maxlength="19" required placeholder="1234567812345678">

    <label>Data di scadenza:</label>
    <input type="month" name="scadenza" required>

    <label>CVV:</label>
    <input type="text" name="cvv" maxlength="4" required>

    <br><br>
    <button type="submit">Conferma e paga</button>
</form>

<?php
}
}
/* {/block "contenuto"} */
}
