<?php
/* Smarty version 5.5.1, created on 2025-07-02 12:44:54
  from 'file:utente/listino_prodotti.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68650da62c90d2_86794290',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4e94755849c384079fe32e7e9bdcaf4d3ed857c' => 
    array (
      0 => 'utente/listino_prodotti.tpl',
      1 => 1751453086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68650da62c90d2_86794290 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_123923467768650da621d202_14270673', "contenuto");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_148336000768650da62c85f3_22712462', "scripts");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_123923467768650da621d202_14270673 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<main class="main-content container">

    <section class="hero-section">
        <img src="/Casette_Dei_Desideri/public/assets/images/spesa_domicilio.jpg" class="hero-image" alt="Spesa a domicilio">
        <div class="hero-overlay">
            <h2>I NOSTRI SERVIZI</h2>
            <p>Il soggiorno presso le nostre strutture è contornato dalla possibilità di ordinare spesa a domicilio.</p>
        </div>
    </section>

    


    <section class="intro-text">
        <p>Seleziona i prodotti che desideri ricevere, te li portiamo noi!</p>
    </section>

    <form action="/Casette_Dei_Desideri/Ordine/riepilogo" method="POST">

        <?php if ((true && ($_smarty_tpl->hasVariable('prodottiQ') && null !== ($_smarty_tpl->getValue('prodottiQ') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiQ')) > 0) {?>
            <h3 class="section-subtitle">Prodotti a Quantità</h3>
            <section class="product-list">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiQ'), 'prodotto');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach0DoElse = false;
?>
                    <div class="product-card">
                        <img src="<?php echo $_smarty_tpl->getValue('prodotto')->getImmagine();?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image">
                        <div class="product-details">
                            <h4 class="product-name"><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</h4>
                            <p class="product-description"><?php echo $_smarty_tpl->getValue('prodotto')->getDescrizione();?>
</p>
                            <p class="product-price">Prezzo: <?php echo sprintf("%.2f",$_smarty_tpl->getValue('prodotto')->getPrezzo());?>
 &euro; (<?php echo $_smarty_tpl->getValue('prodotto')->getUnitaMisura();?>
)</p>
                            
                            <div class="quantity-control">
                                <button type="button" class="qty-btn" data-action="minus">-</button>
                                <input type="number" name="quantitaQ[<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
]" min="0" value="0" class="product-quantity-input" readonly>
                                <button type="button" class="qty-btn" data-action="plus">+</button>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </section>
        <?php } else { ?>
            <h3 class="section-subtitle">Prodotti a Quantità</h3>
            <p class="no-products-message">Nessun prodotto a quantità disponibile al momento.</p>
        <?php }?>

        <?php if ((true && ($_smarty_tpl->hasVariable('prodottiP') && null !== ($_smarty_tpl->getValue('prodottiP') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiP')) > 0) {?>
            <h3 class="section-subtitle">Prodotti a Peso</h3>
            <section class="product-list">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiP'), 'prodotto');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach1DoElse = false;
?>
                    <div class="product-card">
                        <img src="<?php echo $_smarty_tpl->getValue('prodotto')->getImmagine();?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image">
                        <div class="product-details">
                            <h4 class="product-name"><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</h4>
                            <p class="product-description"><?php echo $_smarty_tpl->getValue('prodotto')->getDescrizione();?>
</p>
                            <p class="product-price-per-unit">Prezzo: <?php echo sprintf("%.2f",$_smarty_tpl->getValue('prodotto')->getPrezzoKg());?>
 &euro;/Kg</p>
                            
                            <div class="weight-input-group">
                                <input type="number" name="quantitaP[<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
]" min="0" step="50" value="0" class="product-weight-input"> Grammi
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </section>
        <?php } else { ?>
            <h3 class="section-subtitle">Prodotti a Peso</h3>
            <p class="no-products-message">Nessun prodotto a peso disponibile al momento.</p>
        <?php }?>

        <section class="delivery-time-section">
            <h3 class="section-subtitle">Scegli l'orario di consegna</h3>
            <div class="form-group">
                <label for="fascia_oraria">Orario preferito:</label>
                <select id="fascia_oraria" name="fascia_oraria" class="delivery-time-select" required>
                    <option value="">Seleziona un orario</option>
                    <option value="09-10">09:00 - 10:00</option>
                    <option value="10-11">10:00 - 11:00</option>
                    <option value="11-12">11:00 - 12:00</option>
                    <option value="16-17">16:00 - 17:00</option>
                    <option value="17-18">17:00 - 18:00</option>
                </select>
            </div>
        </section>

        <section class="cart-button-section">
            <button type="submit" class="main-button">Vai al Riepilogo</button>
        </section>

    </form>

</main>

<?php
}
}
/* {/block "contenuto"} */
/* {block "scripts"} */
class Block_148336000768650da62c85f3_22712462 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>

    <?php echo '<script'; ?>
 src="/public/assets/js/product_quantity.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        // Piccolo script per gestire la quantità dei prodotti (come prima)
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.quantity-control').forEach(function(control) {
                const minusBtn = control.querySelector('[data-action="minus"]');
                const plusBtn = control.querySelector('[data-action="plus"]');
                const input = control.querySelector('.product-quantity-input');

                minusBtn.addEventListener('click', function() {
                    let value = parseInt(input.value);
                    if (value > input.min) {
                        input.value = value - 1;
                    }
                });

                plusBtn.addEventListener('click', function() {
                    let value = parseInt(input.value);
                    input.value = value + 1;
                });
            });
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "scripts"} */
}
