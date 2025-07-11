<?php
namespace App\install;

use Smarty\Smarty;

class StartSmarty
{
    public static function start(): Smarty
    {
        $smarty = new Smarty();
        $smarty->setTemplateDir(__DIR__ . '/../../libs/Smarty/templates/');
        $smarty->setCompileDir(__DIR__ . '/../../libs/Smarty/templates_c/');
        $smarty->setConfigDir(__DIR__ . '/../../config/');
        $smarty->compile_check = true;
        $smarty->debugging = false;
        return $smarty;
    }
}
