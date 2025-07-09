<?php
/* Smarty version 5.5.1, created on 2025-07-08 22:48:37
  from 'file:utente/listino_prodotti.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686d842500d793_55957410',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4e94755849c384079fe32e7e9bdcaf4d3ed857c' => 
    array (
      0 => 'utente/listino_prodotti.tpl',
      1 => 1752007708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_template.tpl' => 1,
  ),
))) {
function content_686d842500d793_55957410 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1916215574686d8424f11cd4_10770682', "contenuto");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_137408443686d842500c386_94546113', "scripts");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_1916215574686d8424f11cd4_10770682 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


    <!-- Bootstrap core CSS -->
    <link href="/Casette_Dei_Desideri/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/owl.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>


    <?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_template.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('paginaCorrente'=>"strutture"), (int) 0, $_smarty_current_dir);
?>


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

        <?php if ((true && ($_smarty_tpl->hasVariable('prodottiQuantita') && null !== ($_smarty_tpl->getValue('prodottiQuantita') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiQuantita')) > 0) {?>
            <h3 class="section-subtitle">Prodotti a quantità</h3>
            <section class="product-list">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiQuantita'), 'prodotto');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach0DoElse = false;
?>
                    <div class="product-card">
                        <img src="<?php echo $_smarty_tpl->getValue('prodotto')->fotoBase64;?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image">
                        <div class="product-details">
                            <h4 class="product-name"><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</h4>
                            <p class="product-description"><?php echo $_smarty_tpl->getValue('prodotto')->getPeso();?>
 <?php echo $_smarty_tpl->getValue('prodotto')->getUnitaMisura();?>
</p>
                            <p class="product-price">Prezzo: <?php echo sprintf("%.2f",$_smarty_tpl->getValue('prodotto')->getPrezzo());?>
 &euro;</p>
                            
                            <div class="quantity-control">
                                <button type="button" class="qty-btn" data-action="minus">-</button>
                                <input type="number" name="quantitaQ[<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
]" min="0" step="1" value="0" class="product-quantity-input" readonly>
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

        <?php if ((true && ($_smarty_tpl->hasVariable('prodottiPeso') && null !== ($_smarty_tpl->getValue('prodottiPeso') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prodottiPeso')) > 0) {?>
            <h3 class="section-subtitle">Prodotti a Peso</h3>
            <section class="product-list">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodottiPeso'), 'prodotto');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prodotto')->value) {
$foreach1DoElse = false;
?>
                    <div class="product-card">
                        <img src="<?php echo $_smarty_tpl->getValue('prodotto')->fotoBase64;?>
" alt="<?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
" class="product-image">
                        <div class="product-details">
                            <h4 class="product-name"><?php echo $_smarty_tpl->getValue('prodotto')->getNome();?>
</h4>
                            
                            <p class="product-price-per-unit">Prezzo: <?php echo sprintf("%d",$_smarty_tpl->getValue('prodotto')->getPrezzoKg());?>
 &euro;/Kg</p>
                            
                            <div class="quantity-control" data-step="<?php echo $_smarty_tpl->getValue('prodotto')->getRangePeso();?>
">
                                <button type="button" class="qty-btn" data-action="minus">-</button>
                                <input type="number" name="quantitaP[<?php echo $_smarty_tpl->getValue('prodotto')->getId();?>
]" min="0" step="<?php echo $_smarty_tpl->getValue('prodotto')->getRangePeso();?>
" value="0" class="product-quantity-input" data-tipo="peso"> g
                                <button type="button" class="qty-btn" data-action="plus">+</button>
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



  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/vendor/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/assets/js/isotope.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/assets/js/owl-carousel.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/assets/js/counter.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/assets/js/custom.js"><?php echo '</script'; ?>
>

<?php
}
}
/* {/block "contenuto"} */
/* {block "scripts"} */
class Block_137408443686d842500c386_94546113 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>

    <?php echo '<script'; ?>
>
document.querySelectorAll('.quantity-control').forEach(control => {
    const minusBtn = control.querySelector('[data-action="minus"]');
    const plusBtn = control.querySelector('[data-action="plus"]');
    const input = control.querySelector('.product-quantity-input');

    // Prende il tipo (peso o quantità)
    const tipo = input.dataset.tipo;
    
    const step = tipo === 'peso' ? parseInt(control.dataset.step) || 100 : 1;

    plusBtn.addEventListener('click', () => {
        let current = parseInt(input.value) || 0;
        input.value = (current + step);
    });

    minusBtn.addEventListener('click', () => {
        let current = parseInt(input.value) || 0;
        input.value = Math.max(0, current - step);
    });
});
<?php echo '</script'; ?>
>



<?php
}
}
/* {/block "scripts"} */
}
