<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>{if $evento !== null}Modifica Evento{else}Aggiungi Evento{/if} - Admin</title>

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
  <div class="Sfondo-bg-wrapper">
  <div class="admin-form">
    <h2>{if $evento !== null}Modifica Evento{else}Aggiungi Evento{/if}</h2>

    <form action="{if $evento !== null}/Casette_Dei_Desideri/AdminContenuti/salvaModificaEvento{else}/Casette_Dei_Desideri/AdminContenuti/salvaEvento{/if}" method="post" enctype="multipart/form-data">

        {if $evento !== null}
            <input type="hidden" name="id" value="{$evento->getId()}">
        {/if}

        <div class="mb-3">
          <label for="immagine">Carica un'immagine</label>
          <input type="file" class="form-control" name="immagine" accept="image/*" {if $evento === null}required{/if}>
        </div>

        {if $evento !== null && $evento->getImmagine()}
          <p>Immagine attuale:</p>
          <img src="{$evento->base64img}" alt="Immagine attuale">
        {/if}

        <div class="mb-3">
          <label for="titolo">Titolo</label>
          <input type="text" class="form-control" name="titolo" value="{if $evento !== null}{$evento->getTitolo()}{/if}" required>
        </div>

        <div class="mb-3">
          <label for="dataInizio">Data inizio</label>
          <input type="date" class="form-control" name="dataInizio" value="{if $evento !== null}{$evento->getDataInizioString('Y-m-d')}{/if}" required>
        </div>

        <div class="mb-3">
          <label for="dataFine">Data fine</label>
          <input type="date" class="form-control" name="dataFine" value="{if $evento !== null}{$evento->getDataFineString('Y-m-d')}{/if}" required>
        </div>

        <button type="submit" class="btn btn-success">Salva</button>
    </form>
  </div>
</div>

  <!-- Scripts -->
  <script src="/Casette_Dei_Desideri/public/vendor/jquery/jquery.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/isotope.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/owl-carousel.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/counter.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/custom.js"></script>
</body>
</html>