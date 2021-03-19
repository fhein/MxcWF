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
        $services = MxcCommons::getServices();
        $mailer = $services->get(MailTool::class);
        $orderTool = $services->get(OrderTool::class);
        return new WorkflowEngine($mailer, $orderTool);
    }
}