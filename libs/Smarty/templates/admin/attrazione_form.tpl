<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>{if $attrazione !== null}Modifica Attrazione{else}Aggiungi Attrazione{/if} - Admin</title>

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
  <div class="admin-form">
    <h2>{if $attrazione !== null}Modifica Attrazione{else}Aggiungi Attrazione{/if}</h2>

    <form action="{if $attrazione !== null}/Casette_Dei_Desideri/AdminContenuti/salvaModificaAttrazione{else}/Casette_Dei_Desideri/AdminContenuti/salvaAttrazione{/if}" method="post" enctype="multipart/form-data">

        {if $attrazione !== null}
            <input type="hidden" name="id" value="{$attrazione->getId()}">
        {/if}

        <div class="mb-3">
          <label for="immagine">Carica un'immagine</label>
          <input type="file" class="form-control" name="immagine" accept="image/*" {if $attrazione === null}required{/if}>
        </div>

        {if $attrazione !== null && $attrazione->getImmagine()}
          <p>Immagine attuale:</p>
          <img src="{$attrazione->base64img}" alt="Immagine attuale">
        {/if}

        <div class="mb-3">
          <label for="descrizione">Descrizione</label>
          <textarea name="descrizione" class="form-control" rows="4" required>{if $attrazione !== null}{$attrazione->getDescrizione()}{/if}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salva</button>
    </form>
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
