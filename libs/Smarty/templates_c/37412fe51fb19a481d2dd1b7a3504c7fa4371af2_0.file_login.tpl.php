<?php
/* Smarty version 5.5.1, created on 2025-06-26 20:57:12
  from 'file:utente/login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685d9808173532_80323276',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37412fe51fb19a481d2dd1b7a3504c7fa4371af2' => 
    array (
      0 => 'utente/login.tpl',
      1 => 1750707378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_685d9808173532_80323276 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1373934533685d980816bf94_77585560', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_1373934533685d980816bf94_77585560 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>

    <h2>Login</h2>

    <?php if ((true && ($_smarty_tpl->hasVariable('errore') && null !== ($_smarty_tpl->getValue('errore') ?? null)))) {?>
        <div class="errore"><?php echo $_smarty_tpl->getValue('errore');?>
</div>
    <?php }?>

    <form method="post" action="/Casette_Dei_Desideri/User/login">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Accedi</button>
    </form>

    <p>Non hai un account? <a href="/Casette_Dei_Desideri/User/registrazione">Registrati</a></p>
<?php
}
}
/* {/block "contenuto"} */
}
