<?php
/* Smarty version 5.5.1, created on 2025-06-28 16:45:48
  from 'file:utente/ordine_riepilogo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6860001cdc9ff3_23805619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6cd1ced2494052cd5254154af868459a93652169' => 
    array (
      0 => 'utente/ordine_riepilogo.tpl',
      1 => 1751121934,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar.tpl' => 1,
  ),
))) {
function content_6860001cdc9ff3_23805619 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4353056796860001cdb5b45_12071916', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_4353056796860001cdb5b45_12071916 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Riepilogo del tuo Ordine</h2>

<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('ordine')['prodotti']) > 0) {?>
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Prodotto</th>
                <th>Quantità</th>
                <th>Prezzo</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('ordine')['prodotti'], 'prodotto');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('prodotto')['nome'];?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->getValue('prodotto')['tipo'] == 'peso') {?>
                            <?php echo $_smarty_tpl->getValue('prodotto')['quantita'];?>
 g
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->getValue('prodotto')['quantita'];?>
 pz
                        <?php }?>
                    </td>
                    <td>€ <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('prodotto')['prezzo'],2,",",".");?>
</td>
                </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: right;"><strong>Totale:</strong></td>
                <td><strong>€ <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('ordine')['prezzo'],2,",",".");?>
</strong></td>
            </tr>
        </tfoot>
    </table>

    <br>

    <form action="/Casette_Dei_Desideri/Ordine/conferma" method="post">
        <label for="contanti">
            Cifra che intendi lasciare in contanti alla consegna:
        </label><br>
        <input type="number" name="contanti" step="0.01" min="0" required>
        <br><br>
        <button type="submit">Conferma Ordine</button>
    </form>

<?php } else { ?>
    <p>Nessun prodotto selezionato. <a href="/Casette_Dei_Desideri/Ordine/listaProdotti">Torna al listino</a></p>
<?php }?>

<?php
}
}
/* {/block "contenuto"} */
}
