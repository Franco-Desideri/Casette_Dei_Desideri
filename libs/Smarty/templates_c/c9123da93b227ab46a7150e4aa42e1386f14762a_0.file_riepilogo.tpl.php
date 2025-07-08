<?php
/* Smarty version 5.5.1, created on 2025-07-08 16:41:28
  from 'file:utente/riepilogo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686d2e18cf4763_96851075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9123da93b227ab46a7150e4aa42e1386f14762a' => 
    array (
      0 => 'utente/riepilogo.tpl',
      1 => 1751985682,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686d2e18cf4763_96851075 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_844039667686d2e18cb3465_37024084', "contenuto");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_844039667686d2e18cb3465_37024084 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<?php if ((true && ($_smarty_tpl->hasVariable('errore_contanti') && null !== ($_smarty_tpl->getValue('errore_contanti') ?? null)))) {?>
  <div class="alert-custom">
    <strong>Attenzione:</strong> <?php echo $_smarty_tpl->getValue('errore_contanti');?>

  </div>
<?php }?>




<div class="main-content container">
    <h2 class="page-title">Riepilogo Ordine</h2>

    <?php if ((true && (true && null !== ($_smarty_tpl->getValue('ordine')['prodotti'] ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('ordine')['prodotti']) > 0) {?>
    <section class="order-summary-section">
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
                                                                                
                    <?php $_smarty_tpl->assign('totale', $_smarty_tpl->getValue('totale')+$_smarty_tpl->getValue('prodotto')['prezzo_totale_riga'], false, NULL);?>                     <tr>
                        <td><?php echo $_smarty_tpl->getValue('prodotto')['nome'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('prodotto')['quantita'];?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->getValue('prodotto')['tipo'] == 'quantita') {?>
                                <?php echo sprintf("%.2f",$_smarty_tpl->getValue('prodotto')['prezzo_unitario']);?>
 &euro;                             <?php } elseif ($_smarty_tpl->getValue('prodotto')['tipo'] == 'peso') {?>
                                <?php echo sprintf("%.2f",$_smarty_tpl->getValue('prodotto')['prezzo_unitario_kg']);?>
 &euro;/Kg                             <?php }?>
                        </td>
                        <td><?php echo sprintf("%.2f",$_smarty_tpl->getValue('prodotto')['prezzo_totale_riga']);?>
 &euro;</td>                     </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
            <tfoot>
                <tr class="order-total-row">
                    <td colspan="3">Totale Ordine:</td>
                    <td class="total-amount"><?php echo sprintf("%.2f",$_smarty_tpl->getValue('totale'));?>
 &euro;</td>
                </tr>
            </tfoot>
        </table>
    </section>

    <form action="/Casette_Dei_Desideri/Ordine/conferma" method="POST" class="order-form" style="text-align: center; margin-top: 30px;">
        <div class="form-group">
            <label for="contanti">Cifra con la quale si intende pagare alla consegna:</label>
            <input type= "number" id="contanti" name="contanti" class="cash-amount-input" step = "0.1" min="0" required>
        </div>
        <button type="submit" class="main-button">Ordina</button>
    </form>

    <?php } else { ?>
    <p class="no-products-message">Non hai selezionato nessun prodotto.</p>
    <?php }?>

</div>

<?php
}
}
/* {/block "contenuto"} */
}
