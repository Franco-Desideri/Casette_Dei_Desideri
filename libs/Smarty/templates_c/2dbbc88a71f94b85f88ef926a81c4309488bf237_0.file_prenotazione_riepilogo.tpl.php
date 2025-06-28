<?php
/* Smarty version 5.5.1, created on 2025-06-28 19:00:52
  from 'file:utente/prenotazione_riepilogo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68601fc4be19e3_39581887',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2dbbc88a71f94b85f88ef926a81c4309488bf237' => 
    array (
      0 => 'utente/prenotazione_riepilogo.tpl',
      1 => 1751130047,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar.tpl' => 1,
  ),
))) {
function content_68601fc4be19e3_39581887 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_56110000868601fc4bcc957_36935050', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_56110000868601fc4bcc957_36935050 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Riepilogo Prenotazione</h2>

<p><strong>Struttura:</strong> <?php echo $_smarty_tpl->getValue('struttura')->getTitolo();?>
</p>
<p><strong>Periodo:</strong> <?php echo $_smarty_tpl->getValue('dataInizio');?>
 → <?php echo $_smarty_tpl->getValue('dataFine');?>
</p>
<p><strong>Numero Ospiti:</strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('ospiti'));?>
</p>
<p><strong>Totale:</strong> € <?php echo $_smarty_tpl->getValue('totale');?>
</p>

<hr>

<h3>Ospiti</h3>
<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('ospiti'), 'ospite', false, NULL, 'ospitiLoop', array (
  'iteration' => true,
));
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('ospite')->value) {
$foreach0DoElse = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_ospitiLoop']->value['iteration']++;
?>
    <fieldset style="margin-bottom: 25px; border: 1px solid #ccc; padding: 15px;">
        <legend>Ospite <?php echo ($_smarty_tpl->getValue('__smarty_foreach_ospitiLoop')['iteration'] ?? null);?>
</legend>

        <p><strong>Nome:</strong> <?php echo $_smarty_tpl->getValue('ospite')['nome'];?>
</p>
        <p><strong>Cognome:</strong> <?php echo $_smarty_tpl->getValue('ospite')['cognome'];?>
</p>
        <p><strong>Telefono:</strong> <?php echo $_smarty_tpl->getValue('ospite')['tell'];?>
</p>
        <p><strong>Codice Fiscale:</strong> <?php echo $_smarty_tpl->getValue('ospite')['codiceFiscale'];?>
</p>
        <p><strong>Sesso:</strong> <?php echo $_smarty_tpl->getValue('ospite')['sesso'];?>
</p>
        <p><strong>Data di nascita:</strong> <?php echo $_smarty_tpl->getValue('ospite')['dataNascita'];?>
</p>
        <p><strong>Luogo di nascita:</strong> <?php echo $_smarty_tpl->getValue('ospite')['luogoNascita'];?>
</p>

        <?php if ((true && (true && null !== ($_smarty_tpl->getValue('ospite')['documento_base64'] ?? null))) && $_smarty_tpl->getValue('ospite')['documento_base64'] != '') {?>
            <p>
                <strong>Documento:</strong>
                <a href="data:application/octet-stream;base64,<?php echo $_smarty_tpl->getValue('ospite')['documento_base64'];?>
" target="_blank">
                    📄 Visualizza documento
                </a>
            </p>
        <?php }?>
    </fieldset>
<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

<hr>

<form method="post" action="/Casette_Dei_Desideri/Prenotazione/pagamento">
    <input type="hidden" name="conferma" value="1">
    <button type="submit">Conferma Prenotazione</button>
</form>

<?php
}
}
/* {/block "contenuto"} */
}
