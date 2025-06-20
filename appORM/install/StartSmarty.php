<?php
require_once __DIR__ . '/../../vendor/autoload.php';

class StartSmarty
{
    private Smarty $smarty;

    public function __construct()
    {
        $this->smarty = new \Smarty();

        // Cartelle strutturate come in Agora
        $this->smarty->setTemplateDir(__DIR__ . '/../../libs/Smarty/templates/');
        $this->smarty->setCompileDir(__DIR__ . '/../../libs/Smarty/templates_c/');
        $this->smarty->setCacheDir(__DIR__ . '/../../libs/Smarty/cache/');
        $this->smarty->setConfigDir(__DIR__ . '/../../config/');

        // Opzionale: configurazioni extra
        $this->smarty->caching = Smarty::CACHING_OFF;
        $this->smarty->compile_check = true;
        $this->smarty->debugging = false;
    }

    public function getSmarty(): Smarty
    {
        return $this->smarty;
    }
}
