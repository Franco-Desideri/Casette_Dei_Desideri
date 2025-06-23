<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>{$titolo_pagina|default:"Casette dei Desideri"}</title>
    <link rel="stylesheet" href="/libs/Smarty/css/style.css">
</head>
<body>

    {include file="partials/header.tpl"}

    <main>
        {block name="contenuto"}{/block}
    </main>

    {include file="partials/footer.tpl"}

</body>
</html>
