{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar_admin.tpl"}

<h2>{if isset($struttura)}Modifica struttura{else}Aggiungi nuova struttura{/if}</h2>

<form method="post"
      action="/Casette_Dei_Desideri/AdminStruttura/{if isset($struttura)}salvaModificata{else}salvaNuova{/if}"
      enctype="multipart/form-data">

    {if isset($struttura)}
        <input type="hidden" name="id" value="{$struttura->getId()}">
    {/if}

    <label>Titolo:</label>
    <input type="text" name="titolo" required value="{if isset($struttura)}{$struttura->getTitolo()}{/if}">

    <label>Descrizione:</label>
    <textarea name="descrizione" required>{if isset($struttura)}{$struttura->getDescrizione()}{/if}</textarea>

    <label>Metri quadri:</label>
    <input type="number" name="m2" required value="{if isset($struttura)}{$struttura->getM2()}{/if}">

    <label>Numero ospiti:</label>
    <input type="number" name="numOspiti" required value="{if isset($struttura)}{$struttura->getNumOspiti()}{/if}">

    <label>Luogo:</label>
    <input type="text" name="luogo" required value="{if isset($struttura)}{$struttura->getLuogo()}{/if}">

    <label>Numero letti:</label>
    <input type="number" name="nLetti" required value="{if isset($struttura)}{$struttura->getNLetti()}{/if}">

    <label>Numero bagni:</label>
    <input type="number" name="nBagni" required value="{if isset($struttura)}{$struttura->getNBagni()}{/if}">

    <label><input type="checkbox" name="colazione" {if isset($struttura) && $struttura->getColazione()}checked{/if}> Colazione inclusa</label>
    <label><input type="checkbox" name="animali" {if isset($struttura) && $struttura->getAnimali()}checked{/if}> Animali ammessi</label>
    <label><input type="checkbox" name="parcheggio" {if isset($struttura) && $struttura->getParcheggio()}checked{/if}> Parcheggio disponibile</label>
    <label><input type="checkbox" name="wifi" {if isset($struttura) && $struttura->getWifi()}checked{/if}> Wi-Fi</label>
    <label><input type="checkbox" name="balcone" {if isset($struttura) && $struttura->getBalcone()}checked{/if}> Balcone</label>

    <hr>

    <h3>Foto struttura</h3>
    <label>Carica immagini:</label>
    <input type="file" name="foto[]" multiple accept="image/*"><br><br>

    {if isset($struttura) && $struttura->getFoto()->count() > 0}
        <p>Immagini esistenti:</p>
        <ul style="list-style: none; padding: 0;">
            {foreach from=$struttura->getFoto() item=foto}
                {if isset($foto->base64img)}
                    <li style="margin-bottom: 10px;">
                        <img src="{$foto->base64img}" alt="foto" style="max-width: 200px;">
                    </li>
                {/if}
            {/foreach}
        </ul>
    {/if}

    <hr>

    <h3>Intervalli disponibilità</h3>
    <div id="intervalli-wrapper">
        <div class="intervallo">
            <label>Inizio:</label>
            <input type="date" name="intervallo_inizio[]">
            <label>Fine:</label>
            <input type="date" name="intervallo_fine[]">
            <label>Prezzo (€):</label>
            <input type="number" step="0.01" name="intervallo_prezzo[]">
        </div>
    </div>
    <button type="button" onclick="aggiungiIntervallo()">➕ Aggiungi intervallo</button>

    <br><br>
    <button type="submit">{if isset($struttura)}Salva modifiche{else}Aggiungi struttura{/if}</button>
</form>

<script>
function aggiungiIntervallo() {
    const wrapper = document.getElementById('intervalli-wrapper');
    const div = document.createElement('div');
    div.className = 'intervallo';
    div.style.marginTop = "10px";
    div.innerHTML = `
        <label>Inizio:</label>
        <input type="date" name="intervallo_inizio[]">
        <label>Fine:</label>
        <input type="date" name="intervallo_fine[]">
        <label>Prezzo (€):</label>
        <input type="number" step="0.01" name="intervallo_prezzo[]">
    `;
    wrapper.appendChild(div);
}
</script>

{/block}
