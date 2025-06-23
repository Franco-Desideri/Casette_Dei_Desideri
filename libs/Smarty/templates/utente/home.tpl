{extends file="layouts/base.tpl"}

{block name="contenuto"}
    <h2>Benvenuto nella tua area utente</h2>

    <section>
        <h3>Attrazioni disponibili</h3>
        {if $attrazioni|@count > 0}
            <ul class="attrazioni">
                {foreach from=$attrazioni item=attr}
                    <li>
                        <img src="{$attr->getImmagine()}" alt="Attrazione" width="200">
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
                        <img src="{$evento->getImmagine()}" alt="Evento" width="200">
                        <h4>{$evento->getTitolo()}</h4>
                        <p>Dal {$evento->getDataInizioString()} al {$evento->getDataFineString()}</p>
                    </li>
                {/foreach}
            </ul>
        {else}
            <p>Nessun evento disponibile al momento.</p>
        {/if}
    </section>
{/block}
