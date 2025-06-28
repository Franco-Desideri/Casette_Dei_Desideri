{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar_admin.tpl"}

<h2>Gestione Strutture</h2>

<a href="/Casette_Dei_Desideri/AdminStruttura/aggiungi" style="margin-bottom: 15px; display: inline-block;">
    ➕ Aggiungi nuova struttura
</a>

{if $strutture|@count > 0}
    <ul class="strutture" style="list-style: none; padding: 0;">
        {foreach from=$strutture item=struttura}
            <li style="margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                
                {if $struttura->immaginePrincipale}
                    <img src="{$struttura->immaginePrincipale}" alt="Struttura" style="max-width: 200px; display: block; margin-bottom: 10px;">
                {/if}

                <h3>{$struttura->getTitolo()}</h3>
                <p><strong>Descrizione:</strong> {$struttura->getDescrizione()}</p>

                <a href="/Casette_Dei_Desideri/AdminStruttura/modifica/{$struttura->getId()}" style="margin-right: 10px;">
                    ✏️ Modifica
                </a>

                <a href="/Casette_Dei_Desideri/AdminStruttura/elimina/{$struttura->getId()}" onclick="return confirm('Sei sicuro di voler eliminare questa struttura?');">
                    🗑️ Elimina
                </a>
            </li>
        {/foreach}
    </ul>
{else}
    <p>Nessuna struttura disponibile al momento.</p>
{/if}

{/block}
