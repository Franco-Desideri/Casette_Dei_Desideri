<?php
/* Smarty version 5.5.1, created on 2025-06-24 03:11:08
  from 'file:utente/home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6859fb2c6102a3_67992253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '574c33d7c29324b299af6b9ad213bf5d0238be39' => 
    array (
      0 => 'utente/home.tpl',
      1 => 1750707459,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6859fb2c6102a3_67992253 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4588870236859fb2c5facd5_52016004', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_4588870236859fb2c5facd5_52016004 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>

    <h2>Benvenuto nella tua area utente</h2>

    <section>
        <h3>Attrazioni disponibili</h3>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('attrazioni')) > 0) {?>
            <ul class="attrazioni">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('attrazioni'), 'attr');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('attr')->value) {
$foreach0DoElse = false;
?>
                    <li>
                        <img src="<?php echo $_smarty_tpl->getValue('attr')->getImmagine();?>
" alt="Attrazione" width="200">
                        <p><?php echo $_smarty_tpl->getValue('attr')->getDescrizione();?>
</p>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p>Nessuna attrazione disponibile al momento.</p>
        <?php }?>
    </section>

    <section>
        <h3>Eventi in programma</h3>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('eventi')) > 0) {?>
            <ul class="eventi">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('eventi'), 'evento');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('evento')->value) {
$foreach1DoElse = false;
?>
                    <li>
                        <img src="<?php echo $_smarty_tpl->getValue('evento')->getImmagine();?>
" alt="Evento" width="200">
                        <h4><?php echo $_smarty_tpl->getValue('evento')->getTitolo();?>
</h4>
                        <p>Dal <?php echo $_smarty_tpl->getValue('evento')->getDataInizioString();?>
 al <?php echo $_smarty_tpl->getValue('evento')->getDataFineString();?>
</p>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p>Nessun evento disponibile al momento.</p>
        <?php }?>
    </section>
<?php
}
}
/* {/block "contenuto"} */
}
