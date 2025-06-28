<?php
/* Smarty version 5.5.1, created on 2025-06-28 11:54:33
  from 'file:utente/prenotazione_ospiti.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685fbbd9e20059_47211690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f2bbad06f1e6c54dbeeff4b4b5dd094270469c1' => 
    array (
      0 => 'utente/prenotazione_ospiti.tpl',
      1 => 1751104431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar.tpl' => 1,
  ),
))) {
function content_685fbbd9e20059_47211690 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1359409849685fbbd9dffbf7_81071166', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_1359409849685fbbd9dffbf7_81071166 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Prenotazione: <?php echo $_smarty_tpl->getValue('struttura')->getTitolo();?>
</h2>

<p><strong>Periodo:</strong> <?php echo $_SESSION['prenotazione_temp']['data_inizio'];?>
 → <?php echo $_SESSION['prenotazione_temp']['data_fine'];?>
</p>
<p><strong>Ospiti:</strong> <?php echo $_SESSION['prenotazione_temp']['num_ospiti'];?>
</p>
<p><strong>Totale stimato:</strong> € <?php echo $_SESSION['prenotazione_temp']['totale'];?>
</p>

<hr>

<form method="post" action="/Casette_Dei_Desideri/Prenotazione/riepilogoCompleto" enctype="multipart/form-data">
    <h3>Dati degli ospiti</h3>

    <?php
$__section_ospite_0_loop = (is_array(@$_loop=$_SESSION['prenotazione_temp']['num_ospiti']) ? count($_loop) : max(0, (int) $_loop));
$__section_ospite_0_total = $__section_ospite_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_ospite'] = new \Smarty\Variable(array());
if ($__section_ospite_0_total !== 0) {
for ($__section_ospite_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_ospite']->value['index'] = 0; $__section_ospite_0_iteration <= $__section_ospite_0_total; $__section_ospite_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_ospite']->value['index']++){
?>
        <fieldset style="margin-bottom: 25px; border: 1px solid #ccc; padding: 15px;">
            <legend>Ospite <?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null)+1;?>
</legend>

            <label>Nome:</label>
            <input type="text" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][nome]" required>

            <label>Cognome:</label>
            <input type="text" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][cognome]" required>

            <label>Documento (PDF o immagine):</label>
            <input type="file" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][documento]" accept=".pdf,image/*" required>

            <label>Telefono:</label>
            <input type="tel" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][tell]" required>

            <label>Codice Fiscale:</label>
            <input type="text" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][codiceFiscale]" required>

            <label>Sesso:</label>
            <select name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][sesso]" required>
                <option value="">-- seleziona --</option>
                <option value="M">Maschio</option>
                <option value="F">Femmina</option>
                <option value="Altro">Altro</option>
            </select>

            <label>Data di nascita:</label>
            <input type="date" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][dataNascita]" required>

            <label>Luogo di nascita:</label>
            <input type="text" name="ospiti[<?php echo ($_smarty_tpl->getValue('__smarty_section_ospite')['index'] ?? null);?>
][luogoNascita]" required>
        </fieldset>
    <?php
}
}
?>

    <button type="submit">Continua al riepilogo</button>
</form>

<?php
}
}
/* {/block "contenuto"} */
}
