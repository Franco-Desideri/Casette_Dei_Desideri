{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar.tpl"}

<h2>Benvenuto nella tua area utente</h2>

<section>
    <h3>Attrazioni disponibili</h3>
    {if $attrazioni|@count > 0}
        <ul class="attrazioni">
            {foreach from=$attrazioni item=attr}
                <li>
                    {if isset($attr->base64img)}
                        <img src="{$attr->base64img}" alt="Attrazione" width="200">
                    {/if}
                    <p>{$attr->getDescrizione()}</p>
                </li>
            {/foreach}
        </ul>
    {else}
        <p>Nessuna attrazione disponibile al momento.</p>
    {/if}
</section>

<section>
    <h3>Eventi in programma</h3>
    {if $eventi|@count > 0}
        <ul class="eventi">
            {foreach from=$eventi item=evento}
                <li>
                    {if isset($evento->base64img)}
                        <img src="{$evento->base64img}" alt="Evento" width="200">
                    {/if}
                    <h4>{$evento->getTitolo()}</h4>
                    <p>Dal {$evento->getDataInizioString('Y-m-d')} al {$evento->getDataFineString('Y-m-d')}</p>
                </li>
            {/foreach}
        </ul>
    {else}
        <p>Nessun evento programmato al momento.</p>
    {/if}
</section>

{/block}
