<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Login e Registrazione</title>
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/auth.css">
  
</head>
<body>
  <div class="auth-wrapper">
    <div class="auth-tabs">
      <button class="tab-btn active" data-tab="login">Login</button>
      <button class="tab-btn" data-tab="register">Registrazione</button>
    </div>

    <div class="auth-container">
      <!-- LOGIN -->
      <div id="login" class="tab-content active">
        <h2>Login</h2>
        {if isset($erroreLogin)}
          <div class="errore">{$erroreLogin}</div>
        {/if}
        <form method="post" action="/Casette_Dei_Desideri/User/login">
          <label>Email:</label>
          <input type="email" name="email" required>

          <label>Password:</label>
          <input type="password" name="password" required>

          <button type="submit">Accedi</button>
        </form>
      </div>

      <!-- REGISTRAZIONE -->
      <div id="register" class="tab-content">
        <h2>Registrazione</h2>
        {if isset($erroreReg)}
          <div class="errore">{$erroreReg}</div>
        {/if}
        <form method="post" action="/Casette_Dei_Desideri/User/registrazione">
          <label>Nome:</label>
          <input type="text" name="nome" required>

          <label>Cognome:</label>
          <input type="text" name="cognome" required>

          <label>Email:</label>
          <input type="email" name="email" required>

          <label>Password:</label>
          <input type="password" name="password" required>

          <label>Conferma Password:</label>
          <input type="password" name="conferma_password" required>

          <label>Codice Fiscale:</label>
          <input type="text" name="codicefisc" maxlength="16" required>

          <label>Sesso:</label>
          <select name="sesso" required>
            <option value="">Seleziona</option>
            <option value="M">Maschio</option>
            <option value="F">Femmina</option>
          </select>

          <label>Data di Nascita:</label>
          <input type="date" name="dataN" required>

          <label>Luogo di Nascita:</label>
          <input type="text" name="luogoN" required>

          <label>Telefono:</label>
          <input type="text" name="tell" required>

          <button type="submit">Registrati</button>
        </form>
      </div>
    </div>
  </div>

  <script src="/Casette_Dei_Desideri/public/assets/js/auth.js"></script>
</body>
</html>
