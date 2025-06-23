{extends file="layouts/base.tpl"}

{block name="contenuto"}
    <h2>Login</h2>

    {if isset($errore)}
        <div class="errore">{$errore}</div>
    {/if}

    <form method="post" action="/Casette_Dei_Desideri/User/login">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Accedi</button>
    </form>

    <p>Non hai un account? <a href="/Casette_Dei_Desideri/User/registrazione">Registrati</a></p>
{/block}
