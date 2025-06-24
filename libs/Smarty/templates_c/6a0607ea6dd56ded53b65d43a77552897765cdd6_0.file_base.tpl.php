<?php
/* Smarty version 5.5.1, created on 2025-06-24 02:46:19
  from 'file:layouts/base.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6859f55bcc8614_96387269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a0607ea6dd56ded53b65d43a77552897765cdd6' => 
    array (
      0 => 'layouts/base.tpl',
      1 => 1750707295,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_6859f55bcc8614_96387269 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title><?php echo (($tmp = $_smarty_tpl->getValue('titolo_pagina') ?? null)===null||$tmp==='' ? "Casette dei Desideri" ?? null : $tmp);?>
</title>
    <link rel="stylesheet" href="/libs/Smarty/css/style.css">
</head>
<body>

    <?php $_smarty_tpl->renderSubTemplate("file:partials/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <main>
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1607142756859f55bcc7769_85173720', "contenuto");
?>

    </main>

    <?php $_smarty_tpl->renderSubTemplate("file:partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

</body>
</html>
<?php }
/* {block "contenuto"} */
class Block_1607142756859f55bcc7769_85173720 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\layouts';
}
}
/* {/block "contenuto"} */
}
