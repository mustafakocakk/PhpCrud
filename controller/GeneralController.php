<?php

class GeneralController
{

    public $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem('view');
        $this->twig = new Twig_Environment($loader, array(
            // Uncomment the line below to cache compiled templates
            // 'cache' => __DIR__.'/../cache',
        ));

    }

}