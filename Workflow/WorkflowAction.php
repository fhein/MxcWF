<?php

namespace MxcWorkflow\Workflow;

use MxcCommons\EventManager\EventManagerInterface;
use MxcCommons\EventManager\ListenerAggregateTrait;
use MxcCommons\Plugin\Service\ModelManagerAwareTrait;
use MxcCommons\ServiceManager\AugmentedObject;
use MxcWorkflow\Models\WorkflowJob;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\DeactivateContext;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;

class WorkflowAction implements AugmentedObject
{
    use ModelManagerAwareTrait;
    use ListenerAggregateTrait;

    protected $config = [];

    public function install(InstallContext $context)
    {
        $listener = $this->config['listener'];
        $statusId = $this->config['statusId'];
        if ($listener === null || $statusId === null) return;

        $priority = $this->config['priority'] ?? 1;

        $job = $this->getJob($statusId, $listener);
        if ($job === null) {
            $job = new WorkflowJob();
            $this->modelManager->persist($job);
        }
        $job->setStatusId($statusId);
        $job->setListener($listener);
        $job->setPriority($priority);
        $job->setActive(false);
        $this->modelManager->flush();
    }

    public function activate(ActivateContext $context)
    {
        $this->setActive(true);
    }

    public function deactivate(DeactivateContext $context)
    {
        $this->setActive(false);
    }

    protected function setActive(bool $active)
    {
        $job = $this->getJob($this->config['statusId'], $this->config['listener']);
        if ($job === null) return;
        $job->setActive($active);
        $this->modelManager->flush();
    }

    public function uninstall(UninstallContext $context)
    {
        $job = $this->getJob($this->config['statusId'], $this->config['listener']);
        if ($job !== null) {
            $this->modelManager->remove($job);
        }
        $this->modelManager->flush();
    }

    protected function getJob(int $status, string $listener)
    {
        $repo = $this->modelManager->getRepository(WorkflowJob::class);
        return $repo->findOneBy(['statusId' => $this->config['statusId'], 'listener' => $this->config['listener']]);
    }

    public function getNotificationContext(array $context, array $order = null)
    {
        $replacements = [
            '{$orderNumber}' => @$order['ordernumber'] ?? '',
        ];

        foreach ($context as $group => $value) {
            if (! is_string($value)) {
                continue;
            }
            $context[$group] = str_replace(array_keys($replacements), array_values($replacements), $context[$group]);
        }
        return $context;
    }
}