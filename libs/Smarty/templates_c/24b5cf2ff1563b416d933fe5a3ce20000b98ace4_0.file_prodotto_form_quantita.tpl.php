<?php
/* Smarty version 5.5.1, created on 2025-07-05 23:06:22
  from 'file:admin/prodotto_form_quantita.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686993ce3f41e7_83125343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24b5cf2ff1563b416d933fe5a3ce20000b98ace4' => 
    array (
      0 => 'admin/prodotto_form_quantita.tpl',
      1 => 1751749578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header_admin.tpl' => 1,
  ),
))) {
function content_686993ce3f41e7_83125343 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2129866771686993ce3e4db6_94367826', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_2129866771686993ce3e4db6_94367826 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/header_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<div class="admin-content-container">

    <h2 class="admin-page-title">
        <?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>Modifica prodotto a pezzi<?php } else { ?>Aggiungi nuovo prodotto a pezzi<?php }?>
    </h2>

        <form method="post" action="/Casette_Dei_Desideri/AdminProdotto/<?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>salvaModifica<?php } else { ?>salva<?php }?>" enctype="multipart/form-data" class="admin-form-container">
        <input type="hidden" name="tipo" value="quantita">
        <?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
">
        <?php }?>

        <div class="form-group-item">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required value="<?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {
echo $_smarty_tpl->getValue('prodotto')->getNome();
}?>">
        </div>

        <div class="form-group-item">
            <label for="prezzo">Prezzo (€):</label>
            <input type="number" id="prezzo" step="0.01" name="prezzo" required value="<?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {
echo $_smarty_tpl->getValue('prodotto')->getPrezzo();
}?>">
        </div>

        <div class="form-group-item">
            <label for="quantita">Peso pacco :</label>
            <input type="number" id="quantita" name="peso" required value="<?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {
echo $_smarty_tpl->getValue('prodotto')->getPeso();
}?>">
        </div>

        <div class="form-group-item">
            <label for="unita_misura" >Unità di misura:</label>
            <select id="unita_misura" name="unita_misura" class="delivery-time-select" required>
                <option value="">-- Seleziona --</option>
                <option value="g" <?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null))) && $_smarty_tpl->getValue('prodotto')->getUnitaMisura() == 'g') {?>selected<?php }?>>g</option>
                <option value="Kg" <?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null))) && $_smarty_tpl->getValue('prodotto')->getUnitaMisura() == 'Kg') {?>selected<?php }?>>Kg</option>
                <option value="L" <?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null))) && $_smarty_tpl->getValue('prodotto')->getUnitaMisura() == 'L') {?>selected<?php }?>>L</option>
                <option value="ml" <?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null))) && $_smarty_tpl->getValue('prodotto')->getUnitaMisura() == 'ml') {?>selected<?php }?>>ml</option>
                            </select>
        </div>

                <div class="form-group-item">
            <label for="foto">Immagine del prodotto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" <?php if (!(true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>required<?php }?>>
            <?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>
                <p>Immagine attuale: <br>
                    <img src="<?php echo $_smarty_tpl->getValue('prodotto')->fotoBase64;?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" style="max-width: 200px; max-height: 200px;">

                </p>
            <?php }?>
        </div>

        <button type="submit" class="admin-form-button"><?php if ((true && ($_smarty_tpl->hasVariable('prodotto') && null !== ($_smarty_tpl->getValue('prodotto') ?? null)))) {?>Salva modifiche<?php } else { ?>Aggiungi prodotto<?php }?></button>
    </form>

</div>

<?php
}
}
/* {/block "contenuto"} */
}
