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
        {if isset($prodotto)}Modifica prodotto a pezzi{else}Aggiungi nuovo prodotto a pezzi{/if}
    </h2>

    <form method="post" action="/Casette_Dei_Desideri/AdminProdotto/{if isset($prodotto)}salvaModifica{else}salva{/if}" enctype="multipart/form-data" class="admin-form-container">
        <input type="hidden" name="tipo" value="quantita">
        {if isset($prodotto)}
            <input type="hidden" name="id" value="{$prodotto->getId()}">
        {/if}

        <div class="form-group-item">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required value="{if isset($prodotto)}{$prodotto->getNome()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="prezzo">Prezzo (€):</label>
            <input type="number" id="prezzo" step="0.01" name="prezzo" required value="{if isset($prodotto)}{$prodotto->getPrezzo()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="quantita">Peso pacco :</label>
            <input type="number" id="quantita" name="peso" required value="{if isset($prodotto)}{$prodotto->getPeso()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="unita_misura" >Unità di misura:</label>
            <select id="unita_misura" name="unita_misura" class="delivery-time-select" required>
                <option value="">-- Seleziona --</option>
                <option value="g" {if isset($prodotto) && $prodotto->getUnitaMisura() == 'g'}selected{/if}>g</option>
                <option value="Kg" {if isset($prodotto) && $prodotto->getUnitaMisura() == 'Kg'}selected{/if}>Kg</option>
                <option value="L" {if isset($prodotto) && $prodotto->getUnitaMisura() == 'L'}selected{/if}>L</option>
                <option value="ml" {if isset($prodotto) && $prodotto->getUnitaMisura() == 'ml'}selected{/if}>ml</option>
                <option value="pezzi" {if isset($prodotto) && $prodotto->getUnitaMisura() == 'pezzi'}selected{/if}>pezzi</option>
            </select>
        </div>

        <div class="form-group-item">
            <label for="foto">Immagine del prodotto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" {if !isset($prodotto)}required{/if}>
            {if isset($prodotto)}
                <p>Immagine attuale: <br>
                    <img src="{$prodotto->fotoBase64}" alt="{$prodotto->getNome()}" style="max-width: 200px; max-height: 200px;">

                </p>
            {/if}
        </div>

        <div style="height: 10px;"></div>

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
