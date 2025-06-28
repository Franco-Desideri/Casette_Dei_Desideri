{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar.tpl"}

<h2>Il tuo profilo</h2>

<section>
    <h3>Dati utente</h3>
    <ul>
        <li><strong>Nome:</strong> {$utente->getNome()}</li>
        <li><strong>Cognome:</strong> {$utente->getCognome()}</li>
        <li><strong>Email:</strong> {$utente->getEmail()}</li>
        {if $utente->getTell()}
            <li><strong>Telefono:</strong> {$utente->getTell()}</li>
        {/if}

    </ul>
</section>

<section>
    <h3>Le tue prenotazioni</h3>
    {if $prenotazioni|@count > 0}
        <ul class="prenotazioni" style="list-style: none; padding: 0;">
            {foreach from=$prenotazioni item=prenotazione}
                <li style="margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                    <p><strong>Struttura:</strong> {$prenotazione->getStruttura()->getTitolo()}</p>
                    <p><strong>Dal:</strong> {$prenotazione->getPeriodo()->getDataI()|date_format:"%d/%m/%Y"} <strong>al:</strong> {$prenotazione->getPeriodo()->getDataF()|date_format:"%d/%m/%Y"}</p>
                    <p><strong>Ospiti:</strong> {$prenotazione->getOspiti()}</p>
                </li>
            {/foreach}
        </ul>
    {else}
        <p>Non hai ancora effettuato prenotazioni.</p>
    {/if}
</section>

<section style="margin-top: 30px;">
    <form action="/Casette_Dei_Desideri/User/logout" method="post">
        <button type="submit" style="padding: 10px 20px; font-weight: bold; background-color: #f44336; color: white; border: none; border-radius: 5px;">
            Logout
        </button>
    </form>
</section>


{/block}
