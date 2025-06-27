{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar_admin.tpl"}

<h2>Profilo Amministratore</h2>

<section>
    <h3>Dati amministratore</h3>
    <ul>
        <li><strong>Nome:</strong> {$admin->getNome()}</li>
        <li><strong>Cognome:</strong> {$admin->getCognome()}</li>
        <li><strong>Email:</strong> {$admin->getEmail()}</li>
        {if $admin->getTell()}
            <li><strong>Telefono:</strong> {$admin->getTell()}</li>
        {/if}
    </ul>
</section>

<section>
    <h3>Tutte le prenotazioni</h3>
    {if $prenotazioni|@count > 0}
        <ul class="prenotazioni" style="list-style: none; padding: 0;">
            {foreach from=$prenotazioni item=prenotazione}
                <li style="margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                    <p><strong>Utente:</strong> {$prenotazione->getUtente()->getNome()} {$prenotazione->getUtente()->getCognome()}</p>
                    <p><strong>Struttura:</strong> {$prenotazione->getStruttura()->getNome()}</p>
                    <p><strong>Dal:</strong> {$prenotazione->getDataInizio()} <strong>al:</strong> {$prenotazione->getDataFine()}</p>
                    <p><strong>Ospiti:</strong> {$prenotazione->getNumeroOspiti()}</p>
                </li>
            {/foreach}
        </ul>
    {else}
        <p>Nessuna prenotazione presente.</p>
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
