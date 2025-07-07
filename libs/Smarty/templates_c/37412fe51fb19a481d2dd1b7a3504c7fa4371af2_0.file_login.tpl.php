<?php
/* Smarty version 5.5.1, created on 2025-07-07 17:18:40
  from 'file:utente/login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686be550953922_45254556',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37412fe51fb19a481d2dd1b7a3504c7fa4371af2' => 
    array (
      0 => 'utente/login.tpl',
      1 => 1751896807,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686be550953922_45254556 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?><!DOCTYPE html>
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
        <?php if ((true && ($_smarty_tpl->hasVariable('erroreLogin') && null !== ($_smarty_tpl->getValue('erroreLogin') ?? null)))) {?>
          <div class="errore"><?php echo $_smarty_tpl->getValue('erroreLogin');?>
</div>
        <?php }?>
        <form method="post" action="/Casette_Dei_Desideri/User/login">
          <label>Email:</label>
          <input type="email" name="email" required placeholder="e-mail">

          <label>Password:</label>
          <input type="password" name="password" required placeholder="password">

          <button type="submit">Accedi</button>
        </form>
      </div>

      <!-- REGISTRAZIONE -->
      <div id="register" class="tab-content">
        <h2>Registrazione</h2>
        <?php if ((true && ($_smarty_tpl->hasVariable('erroreReg') && null !== ($_smarty_tpl->getValue('erroreReg') ?? null)))) {?>
          <div class="errore"><?php echo $_smarty_tpl->getValue('erroreReg');?>
</div>
        <?php }?>
        <form method="post" action="/Casette_Dei_Desideri/User/registrazione">
          <label>Nome:</label>
          <input type="text" name="nome" required placeholder="nome">

          <label>Cognome:</label>
          <input type="text" name="cognome" required placeholder="cognome">

          <label>Email:</label>
          <input type="email" name="email" required placeholder="e-mail">

          <label>Password:</label>
          <input type="password" name="password" required placeholder="password">

          <label>Conferma Password:</label>
          <input type="password" name="conferma_password" required placeholder="conferma password">

          <label>Codice Fiscale:</label>
          <input type="text" name="codicefisc" maxlength="16" required placeholder="codice fiscale">

          <label>Sesso:</label>
          <select name="sesso" required>
            <option value="">Seleziona</option>
            <option value="M">Maschio</option>
            <option value="F">Femmina</option>
          </select>

          <label>Data di Nascita:</label>
          <input type="date" name="dataN" required>

          <label>Luogo di Nascita:</label>
          <input type="text" name="luogoN" required placeholder="luogo di nascita">

          <label>Telefono:</label>
          <input type="text" name="tell" required placeholder="telefono">

          <button type="submit">Registrati</button>
        </form>
      </div>
    </div>
  </div>

  <?php echo '<script'; ?>
 src="/Casette_Dei_Desideri/public/assets/js/auth.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
