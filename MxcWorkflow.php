<?php

namespace MxcWorkflow;

use MxcCommons\Plugin\Plugin;
use MxcCommons\Plugin\Service\ServicesFactory;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\UninstallContext;

class MxcWorkflow extends Plugin {

    protected $activateClearCache = ActivateContext::CACHE_LIST_ALL;
    protected $uninstallClearCache = UninstallContext::CACHE_LIST_ALL;

    public const PLUGIN_DIR = __DIR__;

    private static $services;

    public static function getServices()
    {
        if (self::$services !== null) return self::$services;
        $factory = new ServicesFactory();
        self::$services = $factory->getServices(__DIR__);
        return self::$services;
    }
}

