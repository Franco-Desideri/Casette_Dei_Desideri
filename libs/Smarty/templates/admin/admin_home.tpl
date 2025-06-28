{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar_admin.tpl"}

<h2>Dashboard Amministratore</h2>

<section>
    <h3>Attrazioni disponibili</h3>

    <!-- Pulsante aggiungi -->
    <form action="/Casette_Dei_Desideri/AdminContenuti/aggiungiAttrazione" method="post" style="margin-bottom: 20px;">
        <button type="submit">Aggiungi Attrazione</button>
    </form>

    {if $attrazioni|@count > 0}
        <ul class="attrazioni">
            {foreach from=$attrazioni item=attr}
                <li style="margin-bottom: 20px;">
                    <a href="/Casette_Dei_Desideri/AdminContenuti/modificaAttrazione/{$attr->getId()}" style="text-decoration: none; color: inherit;">
                        {if isset($attr->base64img)}
                            <img src="{$attr->base64img}" alt="Attrazione" width="200">
                        {/if}
                        <p>{$attr->getDescrizione()}</p>
                    </a>
                    <form action="/Casette_Dei_Desideri/AdminContenuti/eliminaAttrazione/{$attr->getId()}" method="post" style="margin-top: 5px;">
                        <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questa attrazione?');">Elimina</button>
                    </form>
                </li>
            {/foreach}
        </ul>
    {else}
        <p>Nessuna attrazione presente.</p>
    {/if}
</section>

<section>
    <h3>Eventi programmati</h3>

    <!-- Pulsante aggiungi -->
    <form action="/Casette_Dei_Desideri/AdminContenuti/aggiungiEvento" method="post" style="margin-bottom: 20px;">
        <button type="submit">Aggiungi Evento</button>
    </form>

    {if $eventi|@count > 0}
        <ul class="eventi">
            {foreach from=$eventi item=evento}
                <li style="margin-bottom: 20px;">
                    <a href="/Casette_Dei_Desideri/AdminContenuti/modificaEvento/{$evento->getId()}" style="text-decoration: none; color: inherit;">
                        {if isset($evento->base64img)}
                            <img src="{$evento->base64img}" alt="Evento" width="200">
                        {/if}
                        <h4>{$evento->getTitolo()}</h4>
                        <p>Dal {$evento->getDataInizioString('Y-m-d')} al {$evento->getDataFineString('Y-m-d')}</p>
                    </a>
                    <form action="/Casette_Dei_Desideri/AdminContenuti/eliminaEvento/{$evento->getId()}" method="post" style="margin-top: 5px;">
                        <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo evento?');">Elimina</button>
                    </form>
                </li>
            {/foreach}
        </ul>
    {else}
        <p>Nessun evento programmato.</p>
    {/if}
</section>

{/block}
