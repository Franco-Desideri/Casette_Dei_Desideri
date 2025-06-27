<?php
/* Smarty version 5.5.1, created on 2025-06-26 20:57:22
  from 'file:admin/profilo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685d981248d4c1_45278179',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '201fdcfbb3927db3b5a2fdc7c83673bfd3446c25' => 
    array (
      0 => 'admin/profilo.tpl',
      1 => 1750961244,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_admin.tpl' => 1,
  ),
))) {
function content_685d981248d4c1_45278179 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1417027410685d9812479f49_25203012', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_1417027410685d9812479f49_25203012 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Profilo Amministratore</h2>

<section>
    <h3>Dati amministratore</h3>
    <ul>
        <li><strong>Nome:</strong> <?php echo $_smarty_tpl->getValue('admin')->getNome();?>
</li>
        <li><strong>Cognome:</strong> <?php echo $_smarty_tpl->getValue('admin')->getCognome();?>
</li>
        <li><strong>Email:</strong> <?php echo $_smarty_tpl->getValue('admin')->getEmail();?>
</li>
        <?php if ($_smarty_tpl->getValue('admin')->getTell()) {?>
            <li><strong>Telefono:</strong> <?php echo $_smarty_tpl->getValue('admin')->getTell();?>
</li>
        <?php }?>
    </ul>
</section>

<section>
    <h3>Tutte le prenotazioni</h3>
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prenotazioni')) > 0) {?>
        <ul class="prenotazioni" style="list-style: none; padding: 0;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prenotazioni'), 'prenotazione');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prenotazione')->value) {
$foreach0DoElse = false;
?>
                <li style="margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                    <p><strong>Utente:</strong> <?php echo $_smarty_tpl->getValue('prenotazione')->getUtente()->getNome();?>
 <?php echo $_smarty_tpl->getValue('prenotazione')->getUtente()->getCognome();?>
</p>
                    <p><strong>Struttura:</strong> <?php echo $_smarty_tpl->getValue('prenotazione')->getStruttura()->getNome();?>
</p>
                    <p><strong>Dal:</strong> <?php echo $_smarty_tpl->getValue('prenotazione')->getDataInizio();?>
 <strong>al:</strong> <?php echo $_smarty_tpl->getValue('prenotazione')->getDataFine();?>
</p>
                    <p><strong>Ospiti:</strong> <?php echo $_smarty_tpl->getValue('prenotazione')->getNumeroOspiti();?>
</p>
                </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php } else { ?>
        <p>Nessuna prenotazione presente.</p>
    <?php }?>
</section>

<section style="margin-top: 30px;">
    <form action="/Casette_Dei_Desideri/User/logout" method="post">
        <button type="submit" style="padding: 10px 20px; font-weight: bold; background-color: #f44336; color: white; border: none; border-radius: 5px;">
            Logout
        </button>
    </form>
</section>

<?php
}
}
/* {/block "contenuto"} */
}
