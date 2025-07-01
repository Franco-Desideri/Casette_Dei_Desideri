<?php
/* Smarty version 5.5.1, created on 2025-07-01 18:01:43
  from 'file:utente/riepilogo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68640667d77617_11354442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9123da93b227ab46a7150e4aa42e1386f14762a' => 
    array (
      0 => 'utente/riepilogo.tpl',
      1 => 1751381893,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68640667d77617_11354442 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_192853426068640667c639d9_48338926', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_192853426068640667c639d9_48338926 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<h2 class="section-title">Riepilogo Ordine</h2>

<?php if ((true && (true && null !== ($_smarty_tpl->getValue('ordine')['prodotti'] ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('ordine')['prodotti']) > 0) {?>
<table class="order-summary-table">
    <thead>
        <tr>
            <th>Prodotto</th>
            <th>Quantità</th>
            <th>Prezzo Unitario</th>
            <th>Totale</th>
        </tr>
    </thead>
    <tbody>
        <?php $_smarty_tpl->assign('totale', 0, false, NULL);?>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('ordine')['prodotti'], 'prodotto');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach0DoElse = false;
?>
            <?php $_smarty_tpl->assign('quantita', $_smarty_tpl->getValue('prodotto')['quantita'], false, NULL);?>
            <?php $_smarty_tpl->assign('prezzoUnitario', $_smarty_tpl->getValue('prodotto')['prezzo'], false, NULL);?>
            <?php $_smarty_tpl->assign('totaleProdotto', $_smarty_tpl->getValue('quantita')*$_smarty_tpl->getValue('prezzoUnitario'), false, NULL);?>
            <?php $_smarty_tpl->assign('totale', $_smarty_tpl->getValue('totale')+$_smarty_tpl->getValue('totaleProdotto'), false, NULL);?>
            <tr>
                <td><?php echo $_smarty_tpl->getValue('prodotto')['nome'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('quantita');?>
</td>
                <td><?php echo sprintf("%.2f",$_smarty_tpl->getValue('prezzoUnitario'));?>
 &euro;</td>
                <td><?php echo sprintf("%.2f",$_smarty_tpl->getValue('totaleProdotto'));?>
 &euro;</td>
            </tr>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        <tr class="order-total-row">
            <td colspan="3">Totale Ordine:</td>
            <td><?php echo sprintf("%.2f",$_smarty_tpl->getValue('totale'));?>
 &euro;</td>
        </tr>
    </tbody>
</table>

<form action="/Casette_Dei_Desideri/Ordine/inviaOrdine" method="POST" class="order-form">
    <label for="taglio_banconota">Seleziona taglio banconota per pagamento:</label>
    <select id="taglio_banconota" name="taglio_banconota" required>
        <option value="">Seleziona un taglio</option>
        <option value="5">5 &euro;</option>
        <option value="10">10 &euro;</option>
        <option value="20">20 &euro;</option>
        <option value="50">50 &euro;</option>
        <option value="100">100 &euro;</option>
    </select>
    <button type="submit" class="main-button">Ordina</button>
</form>

<?php } else { ?>
<p>Non hai selezionato nessun prodotto.</p>
<?php }?>

<?php
}
}
/* {/block "contenuto"} */
}
