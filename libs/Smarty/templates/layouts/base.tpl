<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>{$titolo_pagina|default:"Casette dei Desideri"}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/public/assets/css/style.css"> 
    

    {block name="head_extra"}{/block}
</head>
<body>
    {include file="partials/header.tpl"}
    <main> 
        {block name="contenuto"}{/block}
    </main>
    {include file="partials/footer.tpl"}
    {block name="scripts"}{/block}
</body>
</html> 