<?php
/* Smarty version 5.5.1, created on 2025-07-09 22:19:32
  from 'file:layouts/base.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686eced47ca183_15624809',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a0607ea6dd56ded53b65d43a77552897765cdd6' => 
    array (
      0 => 'layouts/base.tpl',
      1 => 1751711045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_686eced47ca183_15624809 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title><?php echo (($tmp = $_smarty_tpl->getValue('titolo_pagina') ?? null)===null||$tmp==='' ? "Casette dei Desideri" ?? null : $tmp);?>
</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style1.css"> 
    

    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_159693111686eced47c8882_35949845', "head_extra");
?>

</head>
<body>
    
    <main> 
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_332537847686eced47c9085_42866168', "contenuto");
?>

    </main>
    <?php $_smarty_tpl->renderSubTemplate("file:partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_21384870686eced47c9c19_21684735', "scripts");
?>

</body>
</html> <?php }
/* {block "head_extra"} */
class Block_159693111686eced47c8882_35949845 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\layouts';
}
}
/* {/block "head_extra"} */
/* {block "contenuto"} */
class Block_332537847686eced47c9085_42866168 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\layouts';
}
}
/* {/block "contenuto"} */
/* {block "scripts"} */
class Block_21384870686eced47c9c19_21684735 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\layouts';
?>

    <?php
}
}
/* {/block "scripts"} */
}
