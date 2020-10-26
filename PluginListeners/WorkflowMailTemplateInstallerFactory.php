<?php

namespace MxcWorkflow\PluginListeners;

use MxcCommons\Interop\Container\ContainerInterface;
use MxcCommons\MxcCommons;
use MxcCommons\Plugin\Mail\MailTemplateManager;
use MxcCommons\ServiceManager\Factory\FactoryInterface;

class WorkflowMailTemplateInstallerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mailTemplateManager = MxcCommons::getServices()->get(MailTemplateManager::class);
        return new WorkflowMailTemplateInstaller($mailTemplateManager);
    }
}