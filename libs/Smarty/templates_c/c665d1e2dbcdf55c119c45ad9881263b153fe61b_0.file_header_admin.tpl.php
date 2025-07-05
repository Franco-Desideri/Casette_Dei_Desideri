<?php
/* Smarty version 5.5.1, created on 2025-07-02 15:29:28
  from 'file:partials/header_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68653438c2a668_14416055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c665d1e2dbcdf55c119c45ad9881263b153fe61b' => 
    array (
      0 => 'partials/header_admin.tpl',
      1 => 1751462673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar_admin.tpl' => 1,
  ),
))) {
function content_68653438c2a668_14416055 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\partials';
?>
<header class="site-header"> <div class="container"> <h1 class="site-title"> <a>Casette dei Desideri</a>
            </h1>
<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>

</header><?php }
}
