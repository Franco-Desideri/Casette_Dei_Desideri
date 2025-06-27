{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar.tpl"}

<h2>Le nostre strutture</h2>

{if $strutture|@count > 0}
    <ul class="strutture" style="list-style: none; padding: 0;">
        {foreach from=$strutture item=struttura}
            <li style="margin-bottom: 30px; border-bottom: 1px solid #ccc; padding-bottom: 20px;">
                <img src="{$struttura->getImmagine()}" alt="Struttura" width="250" style="display: block; margin-bottom: 10px;">
                <h3>{$struttura->getNome()}</h3>
                <p>{$struttura->getDescrizione()}</p>
            </li>
        {/foreach}
    </ul>
{else}
    <p>Nessuna struttura disponibile al momento.</p>
{/if}

{/block}
