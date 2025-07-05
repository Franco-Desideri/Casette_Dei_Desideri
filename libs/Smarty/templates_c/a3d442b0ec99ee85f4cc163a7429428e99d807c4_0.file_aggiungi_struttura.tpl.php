<?php
/* Smarty version 5.5.1, created on 2025-07-03 16:11:48
  from 'file:admin/aggiungi_struttura.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68668fa49e76c7_76453962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3d442b0ec99ee85f4cc163a7429428e99d807c4' => 
    array (
      0 => 'admin/aggiungi_struttura.tpl',
      1 => 1751551906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68668fa49e76c7_76453962 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\admin';
?><!DOCTYPE html>
<html lang="it">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Casette Dei Desideri</title>

    <!-- Bootstrap core CSS -->
    <link href="/Casette_Dei_Desideri/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/owl.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    
<!--
https://templatemo.com/tm-591-villa-agency

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> CasetteDeiDesideri@gmail.com</li>
            <li><i class="fa-solid fa-location-dot"></i> Poggio Bustone, RI 057051</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/Casette_Dei_Desideri/User/home" class="logo" style="white-space: nowrap;">
                        <h1>Cassette Dei Desideri</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="/Casette_Dei_Desideri/User/home">Home</a></li>
                      <li><a href="/Casette_Dei_Desideri/AdminStruttura/lista"class="active">Strutture</a></li>
                      <li><a href="contact.html">Contatti</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a>  /  Struttura</span>
          <h3>Aggiungi Struttura</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="single-property section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <form method="post"
              action="/Casette_Dei_Desideri/AdminStruttura/<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>salvaModificata<?php } else { ?>salvaNuova<?php }?>"
              enctype="multipart/form-data">
            
            <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>
              <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('struttura')->getId();?>
">
            <?php }?>


          <!-- Pulsante grande per inserire nuove foto -->
          <label for="foto-upload"
                class="owl-carousel no-foto d-flex align-items-center justify-content-center"
                style="height: 400px; width: 100%; background-color: #f8f9fa; border: 2px dashed #ccc; border-radius: 10px; cursor: pointer; color: #888; text-decoration: none;">
            <i class="fa fa-camera" style="font-size: 3rem; margin-right: 15px;"></i>
            <span>Inserisci foto</span>
          </label>
          <input id="foto-upload" type="file" name="foto[]" multiple accept="image/*" style="display:none;">

          <!-- Contenitore per tutte le anteprime -->
          <div id="preview-images" class="d-flex flex-wrap gap-2 mt-3">
            <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getFoto()->count() > 0) {?>
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('struttura')->getFoto(), 'foto');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('foto')->value) {
$foreach0DoElse = false;
?>
                <?php if ((true && (true && null !== ($_smarty_tpl->getValue('foto')->base64img ?? null)))) {?>
                  <div style="width:120px; height:120px; overflow:hidden; border:1px solid #ccc; border-radius:4px; display:flex; align-items:center; justify-content:center; background:#fff;">
                    <img src="<?php echo $_smarty_tpl->getValue('foto')->base64img;?>
" alt="foto" style="max-width: 100%; max-height: 100%;">
                  </div>
                <?php }?>
              <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php }?>
          </div>


          <div class="main-content">
            <div class="form-group">
              <label for="titolo">Titolo</label>
              <input type="text" id="titolo" name="titolo" class="form-control" required
                value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getTitolo();
}?>">
            </div>
            <div class="form-group">
              <label for="luogo">Luogo</label>
              <input type="text" id="luogo" name="luogo" class="form-control" required
                value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getLuogo();
}?>">
            </div>
            <div class="form-group">
              <label for="descrizione">Descrizione</label>
              <textarea id="descrizione" name="descrizione" class="form-control" rows="5" 
                required><?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getDescrizione();
}?></textarea>

            </div>
          </div>


          <h3 class="mt-5 mb-4">Intervalli disponibilità</h3>
          <div id="intervalli-wrapper">
            <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('struttura')->getIntervalli()) > 0) {?>
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('struttura')->getIntervalli(), 'intervallo');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('intervallo')->value) {
$foreach1DoElse = false;
?>
                <div class="intervallo row gx-3 gy-2 align-items-end p-3 mb-3 border rounded bg-light">
                  <div class="col-sm-4">
                    <label class="form-label">Inizio</label>
                    <input type="hidden" name="intervallo_id[]" value="<?php echo $_smarty_tpl->getValue('intervallo')->getId();?>
">
                    <input type="date" name="intervallo_inizio[]" class="form-control" value="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('intervallo')->getDataI(),'%Y-%m-%d');?>
">

                  </div>
                  <div class="col-sm-4">
                    <label class="form-label">Fine</label>
                    <input type="date" name="intervallo_fine[]" class="form-control" value="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('intervallo')->getDataF(),'%Y-%m-%d');?>
">
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label">Prezzo (€)</label>
                    <input type="number" step="0.01" name="intervallo_prezzo[]" class="form-control" value="<?php echo $_smarty_tpl->getValue('intervallo')->getPrezzo();?>
">
                  </div>
                  <div class="col-sm-1 text-end">
                    <button type="button" class="btn btn-sm btn-outline-danger remove-intervallo" title="Rimuovi questo intervallo">✖</button>
                  </div>
                </div>
              <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
              <!-- Se non ci sono intervalli, puoi mostrare un intervallo vuoto di default -->
              <div class="intervallo row gx-3 gy-2 align-items-end p-3 mb-3 border rounded bg-light">
                <div class="col-sm-4">
                  <label class="form-label">Inizio</label>
                  <input type="date" name="intervallo_inizio[]" class="form-control">
                </div>
                <div class="col-sm-4">
                  <label class="form-label">Fine</label>
                  <input type="date" name="intervallo_fine[]" class="form-control">
                </div>
                <div class="col-sm-3">
                  <label class="form-label">Prezzo (€)</label>
                  <input type="number" step="0.01" name="intervallo_prezzo[]" class="form-control">
                </div>
                <div class="col-sm-1 text-end">
                  <button type="button" class="btn btn-sm btn-outline-danger remove-intervallo" title="Rimuovi questo intervallo">✖</button>
                </div>
              </div>
            <?php }?>
          </div>
          <button type="button" class="btn btn-outline-primary" onclick="aggiungiIntervallo()">+ Aggiungi intervallo</button>

        </div>    

        <div class="col-lg-4">
          <div class="info-table">
            <ul>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/m2.png" alt="" style="max-width: 52px;">
                <h4>m2<br>
                  <input type="number" name="m2" class="form-control" required
                    value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getM2();
}?>">
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/ospiti.png" alt="" style="max-width: 52px;">
                <h4>Numero Ospiti<br>
                  <input type="number" name="numOspiti" class="form-control" required
                    value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getNumOspiti();
}?>">
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/bagno.png" alt="" style="max-width: 52px;">
                <h4>Numero Bagni<br>
                  <input type="number" name="nBagni" class="form-control" required
                    value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getNBagni();
}?>">
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/letto.png" alt="" style="max-width: 52px;">
                <h4>Numero Letti<br>
                  <input type="number" name="nLetti" class="form-control" required
                    value="<?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {
echo $_smarty_tpl->getValue('struttura')->getNLetti();
}?>">
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/colazione.png" alt="" style="max-width: 52px;">
                <h4>Colazione<br>
                  <select name="colazione" class="form-control" required>
                    <option value="" disabled <?php if (!(true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>selected<?php }?>>Seleziona</option>
                    <option value="1" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getColazione() == 1) {?>selected<?php }?>>Sì</option>
                    <option value="0" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getColazione() == 0) {?>selected<?php }?>>No</option>
                  </select>
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/wifi.png" alt="" style="max-width: 52px;">
                <h4>Wi-Fi<br>
                  <select name="wifi" class="form-control" required>
                    <option value="" disabled <?php if (!(true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>selected<?php }?>>Seleziona</option>
                    <option value="1" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getWifi() == 1) {?>selected<?php }?>>Sì</option>
                    <option value="0" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getWifi() == 0) {?>selected<?php }?>>No</option>
                  </select>
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/balcone.png" alt="" style="max-width: 52px;">
                <h4>Balcone<br>
                  <select name="balcone" class="form-control" required>
                    <option value="" disabled <?php if (!(true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>selected<?php }?>>Seleziona</option>
                    <option value="1" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getBalcone() == 1) {?>selected<?php }?>>Sì</option>
                    <option value="0" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getBalcone() == 0) {?>selected<?php }?>>No</option>
                  </select>
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/animali.png" alt="" style="max-width: 52px;">
                <h4>Animali<br>
                  <select name="animali" class="form-control" required>
                    <option value="" disabled <?php if (!(true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>selected<?php }?>>Seleziona</option>
                    <option value="1" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getAnimali() == 1) {?>selected<?php }?>>Sì</option>
                    <option value="0" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getAnimali() == 0) {?>selected<?php }?>>No</option>
                  </select>
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/parcheggio.png" alt="" style="max-width: 52px;">
                <h4>Parcheggio<br>
                  <select name="parcheggio" class="form-control" required>
                    <option value="" disabled <?php if (!(true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>selected<?php }?>>Seleziona</option>
                    <option value="1" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getParcheggio() == 1) {?>selected<?php }?>>Sì</option>
                    <option value="0" <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null))) && $_smarty_tpl->getValue('struttura')->getParcheggio() == 0) {?>selected<?php }?>>No</option>
                  </select>
                </h4>
              </li>
            </ul>
          </div>
        </div>


          <div class="text-center mt-4">
            <button type="submit" class="btn salva-btn">
              <?php if ((true && ($_smarty_tpl->hasVariable('struttura') && null !== ($_smarty_tpl->getValue('struttura') ?? null)))) {?>Salva modifiche<?php } else { ?>Salva struttura<?php }?>
            </button>
            <a href="/Casette_Dei_Desideri/AdminStruttura/lista" class="btn annulla-btn" style="margin-left:10px;">Annulla</a>
          </div>
        </form>

        <footer class="footer-no-gap">
          <div class="container">
            <div class="col-lg-12">
              <p>Copyright © 2025 Casette Dei Desideri. 
            </div>
          </div>
        </footer>
      </div>
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
  <!-- Flatpickr JS -->
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/flatpickr"><?php echo '</script'; ?>
>






<?php echo '<script'; ?>
>
  const selector = document.getElementById('foto-upload');
  const form = selector.closest('form');
  const container = document.getElementById('preview-images');

  const addedKeys = new Set();

  selector.addEventListener('change', function(e) {
    const files = Array.from(e.target.files);

    files.forEach(file => {
      if (!file.type.startsWith('image/')) return;

      const key = `${file.name}|${file.size}|${file.lastModified}`;
      if (addedKeys.has(key)) return;
      addedKeys.add(key);

      // Mostra anteprima
      const reader = new FileReader();
      reader.onload = function(ev) {
        const wrapper = document.createElement('div');
        Object.assign(wrapper.style, {
          width: '120px',
          height: '120px',
          overflow: 'hidden',
          border: '1px solid #ccc',
          borderRadius: '4px',
          display: 'flex',
          alignItems: 'center',
          justifyContent: 'center',
          background: '#fff',
          marginRight: '8px',
          marginBottom: '8px'
        });
        const img = document.createElement('img');
        img.src = ev.target.result;
        img.style.maxWidth = '100%';
        img.style.maxHeight = '100%';
        wrapper.appendChild(img);
        container.appendChild(wrapper);
      };
      reader.readAsDataURL(file);

      // Crea input file nascosto per ogni immagine
      const dt = new DataTransfer();
      dt.items.add(file);
      const hiddenInput = document.createElement('input');
      hiddenInput.type = 'file';
      hiddenInput.name = 'foto[]';
      hiddenInput.files = dt.files;
      hiddenInput.style.display = 'none';
      form.appendChild(hiddenInput);
    });

    // Reset input per consentire nuova selezione
    selector.value = '';
  });
<?php echo '</script'; ?>
>






<?php echo '<script'; ?>
>
function aggiungiIntervallo() {
    const wrapper = document.getElementById('intervalli-wrapper');
    const div = document.createElement('div');
    div.className = 'intervallo row gx-3 gy-2 align-items-end p-3 mb-3 border rounded bg-light';
    div.innerHTML = `
    <input type="hidden" name="intervallo_id[]" value="">
    <div class="col-sm-4">
        <label class="form-label">Inizio</label>
        <input type="date" name="intervallo_inizio[]" class="form-control">
    </div>
    <div class="col-sm-4">
        <label class="form-label">Fine</label>
        <input type="date" name="intervallo_fine[]" class="form-control">
    </div>
    <div class="col-sm-3">
        <label class="form-label">Prezzo (€)</label>
        <input type="number" step="0.01" name="intervallo_prezzo[]" class="form-control">
    </div>
    <div class="col-sm-1 text-end">
        <button type="button" class="btn btn-sm btn-outline-danger remove-intervallo" title="Rimuovi questo intervallo">✖</button>
    </div>
`;

    wrapper.appendChild(div);
}
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
// Ascolta i click su tutti i pulsanti "✖" (anche quelli aggiunti dinamicamente)
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-intervallo')) {
        const intervallo = e.target.closest('.intervallo');
        if (intervallo) intervallo.remove();
    }
});
<?php echo '</script'; ?>
>








  </body>
</html><?php }
}
