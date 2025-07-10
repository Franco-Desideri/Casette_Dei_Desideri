<!DOCTYPE html>
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

{include file="partials/appbar_templateAdmin.tpl" paginaCorrente="strutture"}  

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>La tua area Admin</h3>
        </div>
      </div>
    </div>
  </div>

<section class="profile-card-container">
  <div class="profile-card">
    <h3 class="profile-card-title">Dati admin</h3>
    <ul class="profile-user-data">
      <li><i class="fa fa-user"></i> <strong>Nome:</strong> {$admin->getNome()}</li><hr>
      <li><i class="fa fa-user"></i> <strong>Cognome:</strong> {$admin->getCognome()}</li><hr>
      <li>
        <i class="fa fa-envelope"></i> 
        <strong>Email:</strong> 
        <span style="cursor: pointer; color: #0d6efd;" data-bs-toggle="modal" data-bs-target="#modificaEmailModal">
          {$admin->getEmail()}
        </span>
      </li>
      <hr>
      <li><i class="fa fa-id-card"></i> <strong>Codice Fiscale:</strong> {$admin->getCodicefisc()}</li><hr>
      <li><i class="fa fa-venus-mars"></i> <strong>Sesso:</strong> {$admin->getSesso()|capitalize}</li><hr>
      <li><i class="fa fa-calendar"></i> <strong>Data di nascita:</strong> {$admin->getDataN()->format('d/m/Y')}</li><hr>
      <li><i class="fa fa-map-marker-alt"></i> <strong>Luogo di nascita:</strong> {$admin->getLuogoN()}</li><hr>
      {if $admin->getTell()}
        <li>
          <i class="fa fa-phone"></i>
          <strong>Telefono:</strong>
          <span style="cursor: pointer; color: #0d6efd;" data-bs-toggle="modal" data-bs-target="#modificaTelefonoModal">
            {$admin->getTell()}
          </span>
        </li>
        <hr>
      {/if}
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
          <input type="email" class="form-control" id="newEmail" name="email" value="{$admin->getEmail()}" required>
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
          <input type="tel" class="form-control" id="newTelefono" name="telefono" value="{$admin->getTell()}" pattern="[0-9+ ]+" required>
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
    <h3 class="profile-card-title">Tutte le prenotazioni</h3>

    {if $prenotazioni|@count > 0}
      <ul class="profile-card-list">
        {foreach from=$prenotazioni item=prenotazione}
          <li class="profile-card-item with-image">
            <a href="/Casette_Dei_Desideri/User/riepilogo/{$prenotazione->getId()}" class="profile-card-link">
              <div class="prenotazione-card-flex">            
                <div class="prenotazione-image small">
                    <img src="{$prenotazione->getStruttura()->getImmaginePrincipaleBase64()}" alt="Immagine struttura">
                </div>
                <div class="prenotazione-info">
                  <p><strong>Struttura:</strong> {$prenotazione->getStruttura()->getTitolo()}</p>
                  <p><strong>Periodo:</strong> dal {$prenotazione->getPeriodo()->getDataI()|date_format:"%d/%m/%Y"} al {$prenotazione->getPeriodo()->getDataF()|date_format:"%d/%m/%Y"}</p>
                  <p><strong>Numero ospiti:</strong> {$prenotazione->getOspiti()}</p>
                </div>
              </div>
            </a>
          </li>
        {/foreach}
      </ul>
    {else}
      <p class="profile-no-data">Non hai ancora effettuato prenotazioni.</p>
    {/if}
  </div>
</section>


{include file="partials/footer.tpl" paginaCorrente="strutture"}  


  <!-- Scripts -->
  <script src="/Casette_Dei_Desideri/public/vendor/jquery/jquery.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/isotope.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/owl-carousel.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/counter.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/custom.js"></script>

</body>
</html>
