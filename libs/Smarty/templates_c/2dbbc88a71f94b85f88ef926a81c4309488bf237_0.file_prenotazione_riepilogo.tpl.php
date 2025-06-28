<?php
/* Smarty version 5.5.1, created on 2025-06-28 12:15:33
  from 'file:utente/prenotazione_riepilogo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685fc0c577c399_48089237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2dbbc88a71f94b85f88ef926a81c4309488bf237' => 
    array (
      0 => 'utente/prenotazione_riepilogo.tpl',
      1 => 1751104854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar.tpl' => 1,
  ),
))) {
function content_685fc0c577c399_48089237 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_965389959685fc0c54a8727_73969808', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_965389959685fc0c54a8727_73969808 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Riepilogo Prenotazione</h2>

<h3>Struttura</h3>
<p><strong><?php echo $_smarty_tpl->getValue('struttura')->getTitolo();?>
</strong></p>
<p><em>Luogo:</em> <?php echo $_smarty_tpl->getValue('struttura')->getLuogo();?>
</p>
<p><?php echo $_smarty_tpl->getValue('struttura')->getDescrizione();?>
</p>

<hr>

<h3>Periodo del soggiorno</h3>
<p>Dal <strong><?php echo $_smarty_tpl->getValue('dataInizio');?>
</strong> al <strong><?php echo $_smarty_tpl->getValue('dataFine');?>
</strong></p>

<hr>

<h3>Ospiti</h3>
<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('ospiti')) > 0) {?>
    <ul style="list-style: none; padding: 0;">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('ospiti'), 'ospite', false, NULL, 'ospitiLoop', array (
  'iteration' => true,
));
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('ospite')->value) {
$foreach0DoElse = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_ospitiLoop']->value['iteration']++;
?>
            <li style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #ccc;">
                <strong>Ospite <?php echo ($_smarty_tpl->getValue('__smarty_foreach_ospitiLoop')['iteration'] ?? null);?>
:</strong><br>
                Nome: <?php echo $_smarty_tpl->getValue('ospite')['nome'];?>
 <?php echo $_smarty_tpl->getValue('ospite')['cognome'];?>
<br>
                Documento: <em><?php if ((true && (true && null !== ($_smarty_tpl->getValue('ospite')['documento'] ?? null)))) {?>📎 Documento caricato<?php } else { ?>❌ Non caricato<?php }?></em><br>
                Telefono: <?php echo $_smarty_tpl->getValue('ospite')['tell'];?>
<br>
                Codice Fiscale: <?php echo $_smarty_tpl->getValue('ospite')['codiceFiscale'];?>
<br>
                Sesso: <?php echo $_smarty_tpl->getValue('ospite')['sesso'];?>
<br>
                Data di nascita: <?php echo $_smarty_tpl->getValue('ospite')['dataNascita'];?>
<br>
                Luogo di nascita: <?php echo $_smarty_tpl->getValue('ospite')['luogoNascita'];?>

            </li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
<?php } else { ?>
    <p>Nessun ospite specificato.</p>
<?php }?>

<hr>

<h3>Prezzo Totale</h3>
<p style="font-size: 18px;"><strong>€ <?php echo $_smarty_tpl->getValue('totale');?>
</strong></p>

<br>

<form method="post" action="/Casette_Dei_Desideri/Prenotazione/pagamento">
    <button type="submit">Procedi al pagamento</button>
</form>

<?php
}
}
/* {/block "contenuto"} */
}
