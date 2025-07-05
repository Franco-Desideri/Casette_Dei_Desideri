<?php
/* Smarty version 5.5.1, created on 2025-07-04 18:46:01
  from 'file:utente/profilo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68680549823440_78868671',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20926279abb68d6ab641a8fc2e6f3b6e52f3966a' => 
    array (
      0 => 'utente/profilo.tpl',
      1 => 1751647532,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68680549823440_78868671 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>Villa Agency - Real Estate HTML5 Template</title>

  <!-- Bootstrap core CSS -->
  <link href="/Casette_Dei_Desideri/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/fontawesome.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/templatemo-villa-agency.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/owl.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/animate.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style.css?v=1">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
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
        <div class="col-lg-12 col-md-12">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> <?php echo $_smarty_tpl->getValue('email_admin');?>
</li>
            <li><i class="fa fa-map"></i> Poggio Bustone, RI 02018</li>
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
          <nav class="main-nav d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a href="index.html" class="logo">
              <h1 style="white-space: nowrap; font-size: 24px;">Casetta dei Desideri</h1>
            </a>

            <!-- Menu -->
            <div class="d-flex align-items-center" style="gap: 20px;">
              <ul class="nav mb-0">
                <li><a href="/Casette_Dei_Desideri/User/home">Home</a></li>
                <li><a href="/Casette_Dei_Desideri/Struttura/lista">Strutture</a></li>
                <li><a href="/Casette_Dei_Desideri/Ordine/listaProdotti">Servizi</a></li>
                <li><a href="/Casette_Dei_Desideri/User/profilo" class="active">Profilo</a></li>
              </ul>
            </div>
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
          <h3>Il tuo Profilo</h3>
        </div>
      </div>
    </div>
  </div>

<section class="profile-card-container">
  <div class="profile-card">
    <h3 class="profile-card-title">Dati utente</h3>
    <ul class="profile-user-data">
      <li><i class="fa fa-user"></i> <strong>Nome:</strong> <?php echo $_smarty_tpl->getValue('utente')->getNome();?>
</li><hr>
      <li><i class="fa fa-user"></i> <strong>Cognome:</strong> <?php echo $_smarty_tpl->getValue('utente')->getCognome();?>
</li><hr>
      <li>
        <i class="fa fa-envelope"></i> 
        <strong>Email:</strong> 
        <span style="cursor: pointer; color: #0d6efd;" data-bs-toggle="modal" data-bs-target="#modificaEmailModal">
          <?php echo $_smarty_tpl->getValue('utente')->getEmail();?>

        </span>
      </li>
      <hr>
      <li><i class="fa fa-id-card"></i> <strong>Codice Fiscale:</strong> <?php echo $_smarty_tpl->getValue('utente')->getCodicefisc();?>
</li><hr>
      <li><i class="fa fa-venus-mars"></i> <strong>Sesso:</strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('utente')->getSesso());?>
</li><hr>
      <li><i class="fa fa-calendar"></i> <strong>Data di nascita:</strong> <?php echo $_smarty_tpl->getValue('utente')->getDataN()->format('d/m/Y');?>
</li><hr>
      <li><i class="fa fa-map-marker-alt"></i> <strong>Luogo di nascita:</strong> <?php echo $_smarty_tpl->getValue('utente')->getLuogoN();?>
</li><hr>
      <?php if ($_smarty_tpl->getValue('utente')->getTell()) {?>
        <li>
          <i class="fa fa-phone"></i>
          <strong>Telefono:</strong>
          <span style="cursor: pointer; color: #0d6efd;" data-bs-toggle="modal" data-bs-target="#modificaTelefonoModal">
            <?php echo $_smarty_tpl->getValue('utente')->getTell();?>

          </span>
        </li>
        <hr>
      <?php }?>
    </ul>
    <div class="text-center mt-4">
      <button type="button" class="btn btn-danger rounded-circle p-3" data-bs-toggle="modal" data-bs-target="#logoutModal" title="Logout">
        <i class="fa fa-sign-out-alt fa-2x"></i>
      </button>
    </div>
  </div>
</section>


<div class="modal fade" id="modificaEmailModal" tabindex="-1" aria-labelledby="modificaEmailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/Casette_Dei_Desideri/User/modificaEmail" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="modificaEmailLabel">Modifica Email</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
        </div>
        <div class="modal-body">
          <label for="newEmail" class="form-label">Nuova email</label>
          <input type="email" class="form-control" id="newEmail" name="email" value="<?php echo $_smarty_tpl->getValue('utente')->getEmail();?>
" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <button type="submit" class="btn btn-success">Salva</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="modificaTelefonoModal" tabindex="-1" aria-labelledby="modificaTelefonoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/Casette_Dei_Desideri/User/modificaTelefono" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="modificaTelefonoLabel">Modifica Numero di Telefono</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
        </div>
        <div class="modal-body">
          <label for="newTelefono" class="form-label">Nuovo numero</label>
          <input type="tel" class="form-control" id="newTelefono" name="telefono" value="<?php echo $_smarty_tpl->getValue('utente')->getTell();?>
" pattern="[0-9+ ]+" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <button type="submit" class="btn btn-success">Salva</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Conferma Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler effettuare il logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <form action="/Casette_Dei_Desideri/User/logout" method="post" class="d-inline">
          <button type="submit" class="btn btn-danger">Conferma Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>





<section class="profile-card-container">
  <div class="profile-card">
    <h3 class="profile-card-title">Le tue prenotazioni</h3>

    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('prenotazioni')) > 0) {?>
      <ul class="profile-card-list">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prenotazioni'), 'prenotazione');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prenotazione')->value) {
$foreach0DoElse = false;
?>
          <li class="profile-card-item with-image">
            <a href="/Casette_Dei_Desideri/User/riepilogo/<?php echo $_smarty_tpl->getValue('prenotazione')->getId();?>
" class="profile-card-link">
              <div class="prenotazione-image small">
                <img src="<?php echo $_smarty_tpl->getValue('prenotazione')->getStruttura()->getImmaginePrincipaleBase64();?>
" alt="Immagine struttura">
              </div>
              <div class="prenotazione-info">
                <p><strong>Struttura:</strong> <?php echo $_smarty_tpl->getValue('prenotazione')->getStruttura()->getTitolo();?>
</p>
                <p><strong>Periodo:</strong> dal <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('prenotazione')->getPeriodo()->getDataI(),"%d/%m/%Y");?>
 al <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('prenotazione')->getPeriodo()->getDataF(),"%d/%m/%Y");?>
</p>
                <p><strong>Numero ospiti:</strong> <?php echo $_smarty_tpl->getValue('prenotazione')->getOspiti();?>
</p>
              </div>
            </a>
          </li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
      </ul>
    <?php } else { ?>
      <p class="profile-no-data">Non hai ancora effettuato prenotazioni.</p>
    <?php }?>
  </div>
</section>


  <!-- Scripts -->
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

</body>
</html>
<?php }
}
