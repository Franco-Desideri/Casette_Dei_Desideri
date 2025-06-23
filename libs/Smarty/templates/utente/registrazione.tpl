{extends file="layouts/base.tpl"}

{block name="contenuto"}
    <h2>Registrazione</h2>

    {if isset($errore)}
        <div class="errore">{$errore}</div>
    {/if}

    <form method="post" action="/Casette_Dei_Desideri/User/registrazione">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="conferma_password">Conferma Password:</label>
        <input type="password" name="conferma_password" required>

        <label for="codicefisc">Codice Fiscale:</label>
        <input type="text" name="codicefisc" maxlength="16" required>

        <label for="sesso">Sesso:</label>
        <select name="sesso" required>
            <option value="">Seleziona</option>
            <option value="M">Maschio</option>
            <option value="F">Femmina</option>
        </select>

        <label for="dataN">Data di Nascita:</label>
        <input type="date" name="dataN" required>

        <label for="luogoN">Luogo di Nascita:</label>
        <input type="text" name="luogoN" required>

        <label for="tell">Telefono:</label>
        <input type="text" name="tell" required>

        <button type="submit">Registrati</button>
    </form>

    <p>Hai già un account? <a href="/Casette_Dei_Desideri/User/login">Accedi</a></p>
{/block}
