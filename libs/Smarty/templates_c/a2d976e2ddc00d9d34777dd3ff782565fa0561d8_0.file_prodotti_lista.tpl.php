<?php
/* Smarty version 5.5.1, created on 2025-06-28 13:18:14
  from 'file:admin/prodotti_lista.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685fcf76dd5b02_83538506',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2d976e2ddc00d9d34777dd3ff782565fa0561d8' => 
    array (
      0 => 'admin/prodotti_lista.tpl',
      1 => 1751030522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_admin.tpl' => 1,
  ),
))) {
function content_685fcf76dd5b02_83538506 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_765746965685fcf76dbfba6_85229518', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_765746965685fcf76dbfba6_85229518 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Aggiungi un nuovo prodotto</h2>
<a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiQuantita">➕ Prodotto a pezzi</a><br>
<a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiPeso">➕ Prodotto a peso</a>


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
                <li style="margin-bottom: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                    <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong> - <?php echo $_smarty_tpl->getValue('prodotto')->getPeso();?>
g - €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzo();?>

                    <br>
                    <img src="<?php echo $_smarty_tpl->getValue('prodotto')->getFoto();?>
" alt="foto" width="100">
                    <br>
                    <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">✏️ Modifica</a> |
                    <a href="/Casette_Dei_Desideri/AdminProdotto/elimina/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
" onclick="return confirm('Eliminare il prodotto?')">🗑️ Elimina</a>
                </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php } else { ?>
        <p>Nessun prodotto a quantità presente.</p>
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
                <li style="margin-bottom: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                    <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong> - <?php echo $_smarty_tpl->getValue('prodotto')->getRangePeso();?>
g - €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzoRange();?>
 (o €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzoKg();?>
/kg)
                    <br>
                    <img src="<?php echo $_smarty_tpl->getValue('prodotto')->getFoto();?>
" alt="foto" width="100">
                    <br>
                    <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">✏️ Modifica</a> |
                    <a href="/Casette_Dei_Desideri/AdminProdotto/elimina/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
" onclick="return confirm('Eliminare il prodotto?')">🗑️ Elimina</a>
                </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php } else { ?>
        <p>Nessun prodotto a peso presente.</p>
    <?php }?>
</section>

<?php
}
}
/* {/block "contenuto"} */
}
