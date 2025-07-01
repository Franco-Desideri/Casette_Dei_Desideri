<?php
/* Smarty version 5.5.1, created on 2025-07-01 18:57:31
  from 'file:partials/header.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6864137bb424f8_48982245',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49e7f798453fd07fba2c1ae058073768d36006a6' => 
    array (
      0 => 'partials/header.tpl',
      1 => 1751389045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar.tpl' => 1,
  ),
))) {
function content_6864137bb424f8_48982245 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\partials';
?><link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style.css">
<header class="site-header"> <div class="container"> <h1 class="site-title"> <a>Casette dei Desideri</a>
            </h1>
<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>

</header><?php }
}
