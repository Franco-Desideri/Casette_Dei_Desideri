<!DOCTYPE html>
<html lang="it">

  <head>

<!-- Bootstrap core CSS -->
<link href="/Casette_Dei_Desideri/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/fontawesome.css">
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/templatemo-villa-agency.css">
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/owl.css">
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/animate.css">
<link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style1.css"> 
</head>

<body>

{include file="partials/appbar_templateAdmin.tpl" paginaCorrente="strutture"}  


<div class="admin-content-container">

    <h2 class="admin-page-title">
        {if isset($prodotto)}Modifica prodotto a peso{else}Aggiungi nuovo prodotto a peso{/if}
    </h2>

    <form method="post" action="/Casette_Dei_Desideri/AdminProdotto/{if isset($prodotto)}salvaModifica{else}salva{/if}" enctype="multipart/form-data" class="admin-form-container">
        <input type="hidden" name="tipo" value="peso">
        {if isset($prodotto)}
            <input type="hidden" name="id" value="{$prodotto->getId()}">
        {/if}

        <div class="form-group-item">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required value="{if isset($prodotto)}{$prodotto->getNome()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="prezzoKg">Prezzo al kg (€):</label>
            <input type="number" id="prezzoKg" step="0.01" name="prezzoKg" required value="{if isset($prodotto)}{$prodotto->getPrezzoKg()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="rangePeso">Range di peso (es: 0.5 - 1.5 kg):</label>
            <input type="text" id="rangePeso" name="rangePeso" required value="{if isset($prodotto)}{$prodotto->getRangePeso()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="prezzoRange">Prezzo per range (€):</label>
            <input type="number" id="prezzoRange" step="0.01" name="prezzoRange" required value="{if isset($prodotto)}{$prodotto->getPrezzoRange()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="foto">Immagine del prodotto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" {if !isset($prodotto)}required{/if}>
            {if isset($prodotto)}
                <p>Immagine attuale: <br>
                    <img src="{$prodotto->getFoto()}" alt="{$prodotto->getNome()}" style="max-width: 200px; max-height: 200px;">
                </p>
            {/if}
        </div>

        <button type="submit" class="admin-form-button">{if isset($prodotto)}Salva modifiche{else}Aggiungi prodotto{/if}</button>
    </form>

</div>
          <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="/Casette_Dei_Desideri/public/vendor/jquery/jquery.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/isotope.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/owl-carousel.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/counter.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/custom.js"></script>



  </body>
</html>