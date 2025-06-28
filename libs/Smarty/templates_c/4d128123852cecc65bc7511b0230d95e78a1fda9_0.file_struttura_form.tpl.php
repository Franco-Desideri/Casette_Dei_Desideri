<?php
/* Smarty version 5.5.1, created on 2025-06-28 18:38:26
  from 'file:admin/struttura_form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68601a82cb9239_02876244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d128123852cecc65bc7511b0230d95e78a1fda9' => 
    array (
      0 => 'admin/struttura_form.tpl',
      1 => 1751127478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_admin.tpl' => 1,
  ),
))) {
function content_68601a82cb9239_02876244 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_84668807668601a82c9c892_83166546', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_84668807668601a82c9c892_83166546 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2><?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>Modifica struttura<?php } else { ?>Aggiungi nuova struttura<?php }?></h2>

<form method="post"
      action="/Casette_Dei_Desideri/AdminStruttura/<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>salvaModificata<?php } else { ?>salvaNuova<?php }?>"
      enctype="multipart/form-data">

    <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('struttura')->getId();?>
">
    <?php }?>

    <label>Titolo:</label>
    <input type="text" name="titolo" required value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getTitolo();
}?>">

    <label>Descrizione:</label>
    <textarea name="descrizione" required><?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getDescrizione();
}?></textarea>

    <label>Metri quadri:</label>
    <input type="number" name="m2" required value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getM2();
}?>">

    <label>Numero ospiti:</label>
    <input type="number" name="numOspiti" required value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getNumOspiti();
}?>">

    <label>Luogo:</label>
    <input type="text" name="luogo" required value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getLuogo();
}?>">

    <label>Numero letti:</label>
    <input type="number" name="nLetti" required value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getNLetti();
}?>">

    <label>Numero bagni:</label>
    <input type="number" name="nBagni" required value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getNBagni();
}?>">

    <label><input type="checkbox" name="colazione" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getColazione()) {?>checked<?php }?>> Colazione inclusa</label>
    <label><input type="checkbox" name="animali" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getAnimali()) {?>checked<?php }?>> Animali ammessi</label>
    <label><input type="checkbox" name="parcheggio" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getParcheggio()) {?>checked<?php }?>> Parcheggio disponibile</label>
    <label><input type="checkbox" name="wifi" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getWifi()) {?>checked<?php }?>> Wi-Fi</label>
    <label><input type="checkbox" name="balcone" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getBalcone()) {?>checked<?php }?>> Balcone</label>

    <hr>

    <h3>Foto struttura</h3>
    <label>Carica immagini:</label>
    <input type="file" name="foto[]" multiple accept="image/*"><br><br>

    <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getFoto()->count() > 0) {?>
        <p>Immagini esistenti:</p>
        <ul style="list-style: none; padding: 0;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('struttura')->getFoto(), 'foto');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('foto')->value) {
$foreach0DoElse = false;
?>
                <?php if ((true && (true && null !== ($_smarty_tpl->getValue('foto')->base64img ?? null)))) {?>
                    <li style="margin-bottom: 10px;">
                        <img src="<?php echo $_smarty_tpl->getValue('foto')->base64img;?>
" alt="foto" style="max-width: 200px;">
                    </li>
                <?php }?>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php }?>

    <hr>

    <h3>Intervalli disponibilità</h3>
    <div id="intervalli-wrapper">
        <div class="intervallo">
            <label>Inizio:</label>
            <input type="date" name="intervallo_inizio[]">
            <label>Fine:</label>
            <input type="date" name="intervallo_fine[]">
            <label>Prezzo (€):</label>
            <input type="number" step="0.01" name="intervallo_prezzo[]">
        </div>
    </div>
    <button type="button" onclick="aggiungiIntervallo()">➕ Aggiungi intervallo</button>

    <br><br>
    <button type="submit"><?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>Salva modifiche<?php } else { ?>Aggiungi struttura<?php }?></button>
</form>

<?php echo '<script'; ?>
>
function aggiungiIntervallo() {
    const wrapper = document.getElementById('intervalli-wrapper');
    const div = document.createElement('div');
    div.className = 'intervallo';
    div.style.marginTop = "10px";
    div.innerHTML = `
        <label>Inizio:</label>
        <input type="date" name="intervallo_inizio[]">
        <label>Fine:</label>
        <input type="date" name="intervallo_fine[]">
        <label>Prezzo (€):</label>
        <input type="number" step="0.01" name="intervallo_prezzo[]">
    `;
    wrapper.appendChild(div);
}
<?php echo '</script'; ?>
>

<?php
}
}
/* {/block "contenuto"} */
}
