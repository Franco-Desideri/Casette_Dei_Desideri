<?php
/* Smarty version 5.5.1, created on 2025-07-02 15:43:12
  from 'file:utente/registrazione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68653770935472_57056646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e98ac06f13b5bcbe5c50c96510f5f40af1470d4b' => 
    array (
      0 => 'utente/registrazione.tpl',
      1 => 1750772571,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68653770935472_57056646 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_76327068868653770926f03_77159499', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_76327068868653770926f03_77159499 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>

    <h2>Registrazione</h2>

    <?php if ((true && ($_smarty_tpl->hasVariable('errore') && null !== ($_smarty_tpl->getValue('errore') ?? null)))) {?>
        <div class="errore"><?php echo $_smarty_tpl->getValue('errore');?>
</div>
    <?php }?>

    <form method="post" action="/Casette_Dei_Desideri/User/registrazione">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="conferma_password">Conferma Password:</label>
        <input type="password" name="conferma_password" required>

        <label for="codicefisc">Codice Fiscale:</label>
        <input type="text" name="codicefisc" maxlength="16" required>

        <label for="sesso">Sesso:</label>
        <select name="sesso" required>
            <option value="">Seleziona</option>
            <option value="M">Maschio</option>
            <option value="F">Femmina</option>
        </select>

        <label for="dataN">Data di Nascita:</label>
        <input type="date" name="dataN" required>

        <label for="luogoN">Luogo di Nascita:</label>
        <input type="text" name="luogoN" required>

        <label for="tell">Telefono:</label>
        <input type="text" name="tell" required>

        <button type="submit">Registrati</button>
    </form>

    <p>Hai già un account? <a href="/Casette_Dei_Desideri/User/login">Accedi</a></p>
<?php
}
}
/* {/block "contenuto"} */
}
