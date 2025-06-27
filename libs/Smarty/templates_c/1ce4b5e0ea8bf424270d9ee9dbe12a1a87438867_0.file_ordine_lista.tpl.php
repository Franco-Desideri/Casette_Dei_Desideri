<?php
/* Smarty version 5.5.1, created on 2025-06-27 14:45:03
  from 'file:utente/ordine_lista.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685e924f162ba8_74915824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ce4b5e0ea8bf424270d9ee9dbe12a1a87438867' => 
    array (
      0 => 'utente/ordine_lista.tpl',
      1 => 1750958433,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar.tpl' => 1,
  ),
))) {
function content_685e924f162ba8_74915824 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_299778986685e924f14cc83_97518445', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_299778986685e924f14cc83_97518445 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Servizio Spesa in Struttura</h2>

<section>
    <h3>Prodotti a Quantità</h3>
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiQ')) > 0) {?>
        <ul style="list-style: none; padding: 0;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiQ'), 'prodotto');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach0DoElse = false;
?>
                <li style="margin-bottom: 20px;">
                    <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong><br>
                    Prezzo: €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzo();?>
 <br>
                    <?php echo $_smarty_tpl->getValue('prodotto')->getDescrizione();?>

                </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php } else { ?>
        <p>Nessun prodotto a quantità disponibile.</p>
    <?php }?>
</section>

<section>
    <h3>Prodotti a Peso</h3>
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiP')) > 0) {?>
        <ul style="list-style: none; padding: 0;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiP'), 'prodotto');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach1DoElse = false;
?>
                <li style="margin-bottom: 20px;">
                    <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong><br>
                    Prezzo al kg: €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzo();?>
 <br>
                    <?php echo $_smarty_tpl->getValue('prodotto')->getDescrizione();?>

                </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php } else { ?>
        <p>Nessun prodotto a peso disponibile.</p>
    <?php }?>
</section>

<hr>

<section>
    <h3>Seleziona una fascia oraria per la consegna</h3>
    <form action="/Casette_Dei_Desideri/Ordine/riepilogo" method="post">
        <select name="fascia_oraria" required>
            <option value="">-- Seleziona una fascia --</option>
            <option value="9-11">9:00 - 11:00</option>
            <option value="11-13">11:00 - 13:00</option>
            <option value="14-16">14:00 - 16:00</option>
            <option value="16-18">16:00 - 18:00</option>
        </select>
        <br><br>
        <button type="submit">Vai al carrello</button>
    </form>
</section>

<?php
}
}
/* {/block "contenuto"} */
}
