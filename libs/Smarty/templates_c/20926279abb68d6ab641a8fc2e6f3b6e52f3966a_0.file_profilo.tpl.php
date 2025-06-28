<?php
/* Smarty version 5.5.1, created on 2025-06-28 13:16:08
  from 'file:utente/profilo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685fcef8b9c966_26132290',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20926279abb68d6ab641a8fc2e6f3b6e52f3966a' => 
    array (
      0 => 'utente/profilo.tpl',
      1 => 1751109364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar.tpl' => 1,
  ),
))) {
function content_685fcef8b9c966_26132290 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2069669263685fcef8b7f0f7_80464377', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_2069669263685fcef8b7f0f7_80464377 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2>Il tuo profilo</h2>

<section>
    <h3>Dati utente</h3>
    <ul>
        <li><strong>Nome:</strong> <?php echo $_smarty_tpl->getValue('utente')->getNome();?>
</li>
        <li><strong>Cognome:</strong> <?php echo $_smarty_tpl->getValue('utente')->getCognome();?>
</li>
        <li><strong>Email:</strong> <?php echo $_smarty_tpl->getValue('utente')->getEmail();?>
</li>
        <?php if ($_smarty_tpl->getValue('utente')->getTell()) {?>
            <li><strong>Telefono:</strong> <?php echo $_smarty_tpl->getValue('utente')->getTell();?>
</li>
        <?php }?>

    </ul>
</section>

<section>
    <h3>Le tue prenotazioni</h3>
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prenotazioni')) > 0) {?>
        <ul class="prenotazioni" style="list-style: none; padding: 0;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prenotazioni'), 'prenotazione');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prenotazione')->value) {
$foreach0DoElse = false;
?>
                <li style="margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                    <p><strong>Struttura:</strong> <?php echo $_smarty_tpl->getValue('prenotazione')->getStruttura()->getTitolo();?>
</p>
                    <p><strong>Dal:</strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('prenotazione')->getPeriodo()->getDataI(),"%d/%m/%Y");?>
 <strong>al:</strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('prenotazione')->getPeriodo()->getDataF(),"%d/%m/%Y");?>
</p>
                    <p><strong>Ospiti:</strong> <?php echo $_smarty_tpl->getValue('prenotazione')->getOspiti();?>
</p>
                </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php } else { ?>
        <p>Non hai ancora effettuato prenotazioni.</p>
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
