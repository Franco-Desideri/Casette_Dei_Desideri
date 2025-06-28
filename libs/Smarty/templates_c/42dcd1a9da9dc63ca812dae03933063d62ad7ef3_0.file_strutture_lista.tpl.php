<?php
/* Smarty version 5.5.1, created on 2025-06-28 18:38:24
  from 'file:admin/strutture_lista.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68601a80e263d9_66773607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42dcd1a9da9dc63ca812dae03933063d62ad7ef3' => 
    array (
      0 => 'admin/strutture_lista.tpl',
      1 => 1751127419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_admin.tpl' => 1,
  ),
))) {
function content_68601a80e263d9_66773607 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_44241809268601a80e13077_31470684', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_44241809268601a80e13077_31470684 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Gestione Strutture</h2>

<a href="/Casette_Dei_Desideri/AdminStruttura/aggiungi" style="margin-bottom: 15px; display: inline-block;">
    ➕ Aggiungi nuova struttura
</a>

<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('strutture')) > 0) {?>
    <ul class="strutture" style="list-style: none; padding: 0;">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('strutture'), 'struttura');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('struttura')->value) {
$foreach0DoElse = false;
?>
            <li style="margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                
                <?php if ($_smarty_tpl->getValue('struttura')->immaginePrincipale) {?>
                    <img src="<?php echo $_smarty_tpl->getValue('struttura')->immaginePrincipale;?>
" alt="Struttura" style="max-width: 200px; display: block; margin-bottom: 10px;">
                <?php }?>

                <h3><?php echo $_smarty_tpl->getValue('struttura')->getTitolo();?>
</h3>
                <p><strong>Descrizione:</strong> <?php echo $_smarty_tpl->getValue('struttura')->getDescrizione();?>
</p>

                <a href="/Casette_Dei_Desideri/AdminStruttura/modifica/<?php echo $_smarty_tpl->getValue('struttura')->getId();?>
" style="margin-right: 10px;">
                    ✏️ Modifica
                </a>

                <a href="/Casette_Dei_Desideri/AdminStruttura/elimina/<?php echo $_smarty_tpl->getValue('struttura')->getId();?>
" onclick="return confirm('Sei sicuro di voler eliminare questa struttura?');">
                    🗑️ Elimina
                </a>
            </li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
<?php } else { ?>
    <p>Nessuna struttura disponibile al momento.</p>
<?php }?>

<?php
}
}
/* {/block "contenuto"} */
}
