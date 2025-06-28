<?php
/* Smarty version 5.5.1, created on 2025-06-28 19:01:48
  from 'file:admin/admin_home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68601ffc44e901_30504336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '509dc5e7b7d9442af37f0333ad895bbc51c60413' => 
    array (
      0 => 'admin/admin_home.tpl',
      1 => 1751125849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_admin.tpl' => 1,
  ),
))) {
function content_68601ffc44e901_30504336 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_51835938668601ffc439ce0_36172505', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_51835938668601ffc439ce0_36172505 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Dashboard Amministratore</h2>

<section>
    <h3>Attrazioni disponibili</h3>

    <!-- Pulsante aggiungi -->
    <form action="/Casette_Dei_Desideri/AdminContenuti/aggiungiAttrazione" method="post" style="margin-bottom: 20px;">
        <button type="submit">Aggiungi Attrazione</button>
    </form>

    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('attrazioni')) > 0) {?>
        <ul class="attrazioni">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('attrazioni'), 'attr');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('attr')->value) {
$foreach0DoElse = false;
?>
                <li style="margin-bottom: 20px;">
                    <a href="/Casette_Dei_Desideri/AdminContenuti/modificaAttrazione/<?php echo $_smarty_tpl->getValue('attr')->getId();?>
" style="text-decoration: none; color: inherit;">
                        <?php if ((true && (true && null !== ($_smarty_tpl->getValue('attr')->base64img ?? null)))) {?>
                            <img src="<?php echo $_smarty_tpl->getValue('attr')->base64img;?>
" alt="Attrazione" width="200">
                        <?php }?>
                        <p><?php echo $_smarty_tpl->getValue('attr')->getDescrizione();?>
</p>
                    </a>
                    <form action="/Casette_Dei_Desideri/AdminContenuti/eliminaAttrazione/<?php echo $_smarty_tpl->getValue('attr')->getId();?>
" method="post" style="margin-top: 5px;">
                        <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questa attrazione?');">Elimina</button>
                    </form>
                </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php } else { ?>
        <p>Nessuna attrazione presente.</p>
    <?php }?>
</section>

<section>
    <h3>Eventi programmati</h3>

    <!-- Pulsante aggiungi -->
    <form action="/Casette_Dei_Desideri/AdminContenuti/aggiungiEvento" method="post" style="margin-bottom: 20px;">
        <button type="submit">Aggiungi Evento</button>
    </form>

    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('eventi')) > 0) {?>
        <ul class="eventi">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('eventi'), 'evento');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('evento')->value) {
$foreach1DoElse = false;
?>
                <li style="margin-bottom: 20px;">
                    <a href="/Casette_Dei_Desideri/AdminContenuti/modificaEvento/<?php echo $_smarty_tpl->getValue('evento')->getId();?>
" style="text-decoration: none; color: inherit;">
                        <?php if ((true && (true && null !== ($_smarty_tpl->getValue('evento')->base64img ?? null)))) {?>
                            <img src="<?php echo $_smarty_tpl->getValue('evento')->base64img;?>
" alt="Evento" width="200">
                        <?php }?>
                        <h4><?php echo $_smarty_tpl->getValue('evento')->getTitolo();?>
</h4>
                        <p>Dal <?php echo $_smarty_tpl->getValue('evento')->getDataInizioString('Y-m-d');?>
 al <?php echo $_smarty_tpl->getValue('evento')->getDataFineString('Y-m-d');?>
</p>
                    </a>
                    <form action="/Casette_Dei_Desideri/AdminContenuti/eliminaEvento/<?php echo $_smarty_tpl->getValue('evento')->getId();?>
" method="post" style="margin-top: 5px;">
                        <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo evento?');">Elimina</button>
                    </form>
                </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php } else { ?>
        <p>Nessun evento programmato.</p>
    <?php }?>
</section>

<?php
}
}
/* {/block "contenuto"} */
}
