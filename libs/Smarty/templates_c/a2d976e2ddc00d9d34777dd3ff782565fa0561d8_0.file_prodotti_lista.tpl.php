<?php
/* Smarty version 5.5.1, created on 2025-07-05 11:18:45
  from 'file:admin/prodotti_lista.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6868edf524efd1_04456187',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2d976e2ddc00d9d34777dd3ff782565fa0561d8' => 
    array (
      0 => 'admin/prodotti_lista.tpl',
      1 => 1751707120,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header_admin.tpl' => 1,
  ),
))) {
function content_6868edf524efd1_04456187 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5118156926868edf5205a03_25062946', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_5118156926868edf5205a03_25062946 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/header_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>


<div class="admin-content-container">

    <h2 class="admin-page-title">Gestione Prodotti</h2> <div class="admin-action-links">
        <a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiQuantita" class="admin-action-link"> Nuovo prodotto a pezzi</a>
        <a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiPeso" class="admin-action-link"> Nuovo prodotto a peso</a>
    </div>

    <section>
        <h3 class="admin-section-title">Prodotti a Quantità (visibili)</h3>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiQuantita_v')) > 0) {?>
            <ul class="admin-item-list"> <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiQuantita_v'), 'prodotto');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach0DoElse = false;
?>
                    <li>
                        <img src="/Casette_Dei_Desideri/public/uploads/prodotti/<?php echo $_smarty_tpl->getValue('prodotto')->getFoto();?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image"> <div class="admin-item-details">
                            <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong> - <?php echo $_smarty_tpl->getValue('prodotto')->getPeso();?>
g - €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzo();?>

                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">✏️ Modifica</a>
                            <form method="POST" action="/Casette_Dei_Desideri/AdminProdotto/disattiva" style="display:inline;" onsubmit="return confirm('Nascondere il prodotto?');">
                               <input type="hidden" name="idProdotto" value="<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">
                               <button type="submit" style="background:none; border:none; padding:0;font:inherit; color:inherit; cursor:pointer;">🚫 Disattiva</button>
                            </form>
                        </div>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p class="admin-no-items-message">Nessun prodotto a quantità presente.</p> <?php }?>
    </section>

    <section>
        <h3 class="admin-section-title">Prodotti a Peso (visibili)</h3>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiPeso_v')) > 0) {?>
            <ul class="admin-item-list"> <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiPeso_v'), 'prodotto');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach1DoElse = false;
?>
                    <li>
                        <img src="/Casette_Dei_Desideri/public/uploads/prodotti/<?php echo $_smarty_tpl->getValue('prodotto')->getFoto();?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image"> <div class="admin-item-details">
                            <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong> - €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzoKg();?>
/kg
                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">✏️ Modifica</a>
                            <form method="POST" action="/Casette_Dei_Desideri/AdminProdotto/disattiva" style="display:inline;" onsubmit="return confirm('Nascondere il prodotto?');">
                               <input type="hidden" name="idProdotto" value="<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">
                               <button type="submit" style="background:none; border:none; padding:0; font:inherit; color:inherit; cursor:pointer;">🚫 Disattiva</button>
                            </form>
                        </div>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p class="admin-no-items-message">Nessun prodotto a peso presente.</p> <?php }?>
    </section>

    <section>
        <h3 class="admin-section-title">Prodotti a Quantità (nascosti)</h3>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiQuantita_n')) > 0) {?>
            <ul class="admin-item-list"> <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiQuantita_n'), 'prodotto');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach2DoElse = false;
?>
                    <li>
                        <img src="/Casette_Dei_Desideri/public/uploads/prodotti/<?php echo $_smarty_tpl->getValue('prodotto')->getFoto();?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image"> <div class="admin-item-details">
                            <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong> - <?php echo $_smarty_tpl->getValue('prodotto')->getPeso();?>
g - €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzo();?>

                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">✏️ Modifica</a>
                            <a href="/Casette_Dei_Desideri/AdminProdotto/attiva/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
" onclick="return confirm('Rendere visibile il prodotto?')">✅ Attiva</a>
                        </div>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p class="admin-no-items-message">Nessun prodotto a quantità presente.</p> <?php }?>
    </section>

    <section>
        <h3 class="admin-section-title">Prodotti a Peso (nascosti)</h3>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiPeso_n')) > 0) {?>
            <ul class="admin-item-list"> <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiPeso_n'), 'prodotto');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach3DoElse = false;
?>
                    <li>
                        <img src="/Casette_Dei_Desideri/public/uploads/prodotti/<?php echo $_smarty_tpl->getValue('prodotto')->getFoto();?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image"> <div class="admin-item-details">
                            <strong><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</strong> - <?php echo $_smarty_tpl->getValue('prodotto')->getRangePeso();?>
g - €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzoRange();?>
 (o €<?php echo $_smarty_tpl->getValue('prodotto')->getPrezzoKg();?>
/kg)
                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">✏️ Modifica</a>
                            <a href="/Casette_Dei_Desideri/AdminProdotto/attiva/<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
" onclick="return confirm('Rendere visibile il prodotto?')">✅ Attiva</a>
                        </div>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p class="admin-no-items-message">Nessun prodotto a peso presente.</p> <?php }?>
    </section>

</div> <?php
}
}
/* {/block "contenuto"} */
}
