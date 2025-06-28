<?php
/* Smarty version 5.5.1, created on 2025-06-28 19:02:48
  from 'file:utente/ordine_lista.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686020383483c2_41470912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ce4b5e0ea8bf424270d9ee9dbe12a1a87438867' => 
    array (
      0 => 'utente/ordine_lista.tpl',
      1 => 1751124881,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar.tpl' => 1,
  ),
))) {
function content_686020383483c2_41470912 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_125564348668602038329287_75198605', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_125564348668602038329287_75198605 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Servizio Spesa in Struttura</h2>

<form action="/Casette_Dei_Desideri/Ordine/riepilogo" method="post">

<section>
    <h3>Prodotti a Quantità</h3>
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiQuantita')) > 0) {?>
        <ul style="list-style: none; padding: 0;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiQuantita'), 'prodotto');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach0DoElse = false;
?>
                <li style="margin-bottom: 20px;">
                    <?php if ((true && (true && null !== ($_smarty_tpl->getValue('prodotto')->base64img ?? null)))) {?>
                        <img src="<?php echo $_smarty_tpl->getValue('prodotto')->base64img;?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" style="max-height: 120px;"><br>
                    <?php }?>
                    <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong><br>
                    Prezzo: €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzo();?>
<br>
                    Quantità:
                    <select name="quantitaQ[<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
]">
                        <?php
$_smarty_tpl->tpl_vars['__smarty_section_q'] = new \Smarty\Variable(array());
if (true) {
for ($__section_q_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_q']->value['index'] = 0; $__section_q_0_iteration <= 11; $__section_q_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_q']->value['index']++){
?>
                            <option value="<?php echo ($_smarty_tpl->getValue('__smarty_section_q')['index'] ?? null);?>
"><?php echo ($_smarty_tpl->getValue('__smarty_section_q')['index'] ?? null);?>
</option>
                        <?php
}
}
?>
                    </select>
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
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiPeso')) > 0) {?>
        <ul style="list-style: none; padding: 0;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiPeso'), 'prodotto');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach1DoElse = false;
?>
                <li style="margin-bottom: 20px;">
                    <?php if ((true && (true && null !== ($_smarty_tpl->getValue('prodotto')->base64img ?? null)))) {?>
                        <img src="<?php echo $_smarty_tpl->getValue('prodotto')->base64img;?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" style="max-height: 120px;"><br>
                    <?php }?>
                    <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong><br>
                    Prezzo al kg: €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzoKg();?>
<br>
                    Quantità (grammi):
                    <?php $_smarty_tpl->assign('range', $_smarty_tpl->getValue('prodotto')->getRangeValore(), false, NULL);?>
                    <select name="quantitaP[<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
]">
                        <?php
$__section_g_0_step = ((int)@$_smarty_tpl->getValue('range')) === 0 ? 1 : (int)@$_smarty_tpl->getValue('range');
$__section_g_0_start = (int)@$_smarty_tpl->getValue('range') < 0 ? max($__section_g_0_step > 0 ? 0 : -1, (int)@$_smarty_tpl->getValue('range') + 1100) : min((int)@$_smarty_tpl->getValue('range'), $__section_g_0_step > 0 ? 1100 : 1099);
$__section_g_0_total = min(ceil(($__section_g_0_step > 0 ? 1100 - $__section_g_0_start : $__section_g_0_start+ 1)/ abs($__section_g_0_step)), 1100);
$_smarty_tpl->tpl_vars['__smarty_section_g'] = new \Smarty\Variable(array());
if ($__section_g_0_total !== 0) {
for ($__section_g_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_g']->value['index'] = $__section_g_0_start; $__section_g_0_iteration <= $__section_g_0_total; $__section_g_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_g']->value['index'] += $__section_g_0_step){
?>
                            <option value="<?php echo ($_smarty_tpl->getValue('__smarty_section_g')['index'] ?? null);?>
"><?php echo ($_smarty_tpl->getValue('__smarty_section_g')['index'] ?? null);?>
 g</option>
                        <?php
}
}
?>
                        <option value="0" selected>0 g</option>
                    </select>
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
    <select name="fascia_oraria" required>
        <option value="">-- Seleziona una fascia --</option>
        <option value="9-11">9:00 - 11:00</option>
        <option value="11-13">11:00 - 13:00</option>
        <option value="14-16">14:00 - 16:00</option>
        <option value="16-18">16:00 - 18:00</option>
    </select>
</section>

<br><br>
<button type="submit">Vai al carrello</button>

</form>

<?php
}
}
/* {/block "contenuto"} */
}
