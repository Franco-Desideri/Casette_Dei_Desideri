{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar.tpl"}

<h2>Pagamento</h2>

<p>Completa il pagamento per confermare la prenotazione.</p>

<form method="post" action="/Casette_Dei_Desideri/Prenotazione/salvaDatiPagamento">
    <label>Nome del titolare:</label>
    <input type="text" name="nomeCarta" required>

    <label>Cognome del titolare:</label>
    <input type="text" name="cognomeCarta" required>

    <label>Numero carta:</label>
    <input type="text" name="numeroCarta" maxlength="19" required placeholder="1234567812345678">

    <label>Data di scadenza:</label>
    <input type="month" name="scadenza" required>

    <label>CVV:</label>
    <input type="text" name="cvv" maxlength="4" required>

    <br><br>
    <button type="submit">Conferma e paga</button>
</form>

{/block}


