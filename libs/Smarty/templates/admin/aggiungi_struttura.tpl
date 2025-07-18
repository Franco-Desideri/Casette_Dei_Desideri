<!DOCTYPE html>
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

  {include file="partials/appbar_templateAdmin.tpl" paginaCorrente="strutture"}  
  
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
              action="/Casette_Dei_Desideri/AdminStruttura/{if isset($struttura)}salvaModificata{else}salvaNuova{/if}"
              enctype="multipart/form-data">
            
            {if isset($struttura)}
              <input type="hidden" name="id" value="{$struttura->getId()}">
            {/if}


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
            {if isset($struttura) && $struttura->getFoto()->count() > 0}
              {foreach from=$struttura->getFoto() item=foto}
                {if isset($foto->base64img)}
                  <div class="preview-item">
                    <button type="button" class="remove-photo-btn">&times;</button>
                    <img src="{$foto->base64img}" alt="foto" class="img-fluid">
                    <input type="hidden" name="existing_foto_id[]" value="{$foto->getId()}">
                  </div>
                {/if}
              {/foreach}
            {/if}
          </div>



          <div class="main-content">
            <div class="form-group">
              <label for="titolo">Titolo</label>
              <input type="text" id="titolo" name="titolo" class="form-control" required
                value="{if isset($struttura)}{$struttura->getTitolo()}{/if}">
            </div>
            <div class="form-group">
              <label for="luogo">Luogo</label>
              <input type="text" id="luogo" name="luogo" class="form-control" required
                value="{if isset($struttura)}{$struttura->getLuogo()}{/if}">
            </div>
            <div class="form-group">
              <label for="descrizione">Descrizione</label>
              <textarea id="descrizione" name="descrizione" class="form-control" rows="5" 
                required>{if isset($struttura)}{$struttura->getDescrizione()}{/if}</textarea>

            </div>
          </div>


          <h3 class="mt-5 mb-4">Intervalli disponibilità</h3>
          <div id="intervalli-wrapper">
            {if isset($struttura) && $struttura->getIntervalli()|@count > 0}
              {foreach from=$struttura->getIntervalli() item=intervallo}
                <div class="intervallo row gx-3 gy-2 align-items-end p-3 mb-3 border rounded bg-light">
                  <div class="col-sm-4">
                    <label class="form-label">Inizio</label>
                    <input type="hidden" name="intervallo_id[]" value="{$intervallo->getId()}">
                    <input type="date" name="intervallo_inizio[]" class="form-control" value="{$intervallo->getDataI()|date_format:'%Y-%m-%d'}">

                  </div>
                  <div class="col-sm-4">
                    <label class="form-label">Fine</label>
                    <input type="date" name="intervallo_fine[]" class="form-control" value="{$intervallo->getDataF()|date_format:'%Y-%m-%d'}">
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label">Prezzo (€)</label>
                    <input type="number" step="0.01" name="intervallo_prezzo[]" class="form-control" value="{$intervallo->getPrezzo()}">
                  </div>
                  <div class="col-sm-1 text-end">
                    <button type="button" class="btn btn-sm btn-outline-danger remove-intervallo" title="Rimuovi questo intervallo">✖</button>
                  </div>
                </div>
              {/foreach}
            {else}
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
            {/if}
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
                    value="{if isset($struttura)}{$struttura->getM2()}{/if}">
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/ospiti.png" alt="" style="max-width: 52px;">
                <h4>Numero Ospiti<br>
                  <input type="number" name="numOspiti" class="form-control" required
                    value="{if isset($struttura)}{$struttura->getNumOspiti()}{/if}">
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/bagno.png" alt="" style="max-width: 52px;">
                <h4>Numero Bagni<br>
                  <input type="number" name="nBagni" class="form-control" required
                    value="{if isset($struttura)}{$struttura->getNBagni()}{/if}">
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/letto.png" alt="" style="max-width: 52px;">
                <h4>Numero Letti<br>
                  <input type="number" name="nLetti" class="form-control" required
                    value="{if isset($struttura)}{$struttura->getNLetti()}{/if}">
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/colazione.png" alt="" style="max-width: 52px;">
                <h4>Colazione<br>
                  <select name="colazione" class="form-control" required>
                    <option value="" disabled {if !isset($struttura)}selected{/if}>Seleziona</option>
                    <option value="1" {if isset($struttura) && $struttura->getColazione() == 1}selected{/if}>Sì</option>
                    <option value="0" {if isset($struttura) && $struttura->getColazione() == 0}selected{/if}>No</option>
                  </select>
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/wifi.png" alt="" style="max-width: 52px;">
                <h4>Wi-Fi<br>
                  <select name="wifi" class="form-control" required>
                    <option value="" disabled {if !isset($struttura)}selected{/if}>Seleziona</option>
                    <option value="1" {if isset($struttura) && $struttura->getWifi() == 1}selected{/if}>Sì</option>
                    <option value="0" {if isset($struttura) && $struttura->getWifi() == 0}selected{/if}>No</option>
                  </select>
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/balcone.png" alt="" style="max-width: 52px;">
                <h4>Balcone<br>
                  <select name="balcone" class="form-control" required>
                    <option value="" disabled {if !isset($struttura)}selected{/if}>Seleziona</option>
                    <option value="1" {if isset($struttura) && $struttura->getBalcone() == 1}selected{/if}>Sì</option>
                    <option value="0" {if isset($struttura) && $struttura->getBalcone() == 0}selected{/if}>No</option>
                  </select>
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/animali.png" alt="" style="max-width: 52px;">
                <h4>Animali<br>
                  <select name="animali" class="form-control" required>
                    <option value="" disabled {if !isset($struttura)}selected{/if}>Seleziona</option>
                    <option value="1" {if isset($struttura) && $struttura->getAnimali() == 1}selected{/if}>Sì</option>
                    <option value="0" {if isset($struttura) && $struttura->getAnimali() == 0}selected{/if}>No</option>
                  </select>
                </h4>
              </li>
              <li>
                <img src="/Casette_Dei_Desideri/public/assets/images/parcheggio.png" alt="" style="max-width: 52px;">
                <h4>Parcheggio<br>
                  <select name="parcheggio" class="form-control" required>
                    <option value="" disabled {if !isset($struttura)}selected{/if}>Seleziona</option>
                    <option value="1" {if isset($struttura) && $struttura->getParcheggio() == 1}selected{/if}>Sì</option>
                    <option value="0" {if isset($struttura) && $struttura->getParcheggio() == 0}selected{/if}>No</option>
                  </select>
                </h4>
              </li>
            </ul>
          </div>
        </div>


          <div class="text-center mt-4">
            <button type="submit" class="btn salva-btn">
              {if isset($struttura)}Salva modifiche{else}Salva struttura{/if}
            </button>
            <a href="/Casette_Dei_Desideri/AdminStruttura/lista" class="btn annulla-btn" style="margin-left:10px;">Annulla</a>
          </div>
        </form>

        {include file="partials/footer.tpl" paginaCorrente="strutture"}  
        
      </div>
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="/Casette_Dei_Desideri/public/vendor/jquery/jquery.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/isotope.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/owl-carousel.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/counter.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/custom.js"></script>
  <!-- Flatpickr JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>





  {literal}
    <script src="/Casette_Dei_Desideri/public/assets/js/admin_struttura_form.js"></script>
    <script>
      inizializzaAdminStrutturaForm();
    </script>
  {/literal}




  </body>
</html>