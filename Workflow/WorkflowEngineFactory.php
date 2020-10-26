<?php

namespace MxcWorkflow\Workflow;

use MxcCommons\Interop\Container\ContainerInterface;
use MxcCommons\MxcCommons;
use MxcCommons\ServiceManager\Factory\FactoryInterface;
use MxcCommons\Toolbox\Shopware\MailTool;
use MxcCommons\Toolbox\Shopware\OrderTool;
use MxcDropship\Dropship\DropshipManager;
use MxcDropship\Jobs\SendOrders;
use MxcDropship\MxcDropship;

class WorkflowEngineFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $sendOrders = null;
        $dropshipManager = null;
        $orderTool = MxcCommons::getServices()->get(OrderTool::class);
        if (class_exists(MxcDropship::class)) {
            $services = MxcDropship::getServices();
            $sendOrders = $services->get(SendOrders::class);
            $dropshipManager = $services->get(DropshipManager::class);
        }
        $mailer = MxcCommons::getServices()->get(MailTool::class);
        return new WorkflowEngine($mailer, $orderTool, $sendOrders, $dropshipManager);
    }
}