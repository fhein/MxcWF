<?php

namespace MxcWorkflow\Workflow;

use MxcCommons\EventManager\EventManagerAwareTrait;
use MxcCommons\Plugin\Service\ClassConfigAwareTrait;
use MxcCommons\Plugin\Service\DatabaseAwareTrait;
use MxcCommons\Plugin\Service\ModelManagerAwareTrait;
use MxcCommons\ServiceManager\AugmentedObject;
use MxcCommons\Toolbox\Shopware\MailTool;
use MxcCommons\Toolbox\Shopware\OrderTool;
use MxcDropship\Dropship\DropshipManager;
use MxcDropship\Jobs\SendOrders;
use DateTime;
use DateInterval;

class WorkflowEngine implements AugmentedObject
{
    use ClassConfigAwareTrait;
    use DatabaseAwareTrait;
    use EventManagerAwareTrait;
    use ModelManagerAwareTrait;

    /** @var MailTool */
    protected $mailer;

    /** @var SendOrders|null */
    protected $sendOrderJob;

    /** @var DropshipManager|null */
    protected $dropshipManager;

    /** @var OrderTool */
    protected $orderTool;

    protected $services = [];

    protected $listeners = [];

    public function __construct(MailTool $mailer, OrderTool $orderTool, ?SendOrders $sendOrderJob, ?DropshipManager $dropshipManager)
    {
        $this->mailer = $mailer;
        $this->sendOrderJob = $sendOrderJob;
        $this->dropshipManager = $dropshipManager;
        $this->orderTool = $orderTool;
    }

    public function run()
    {
        $this->attachListeners();

        $statusIds = $this->db->fetchCol('SELECT DISTINCT statusId FROM s_mxcbc_workflow_job ORDER BY statusID ASC');
        foreach ($statusIds as $statusId) {
            $orderIds = $this->orderTool->getOrderIdsByStatus($statusId);
            if (empty($orderIds)) continue;
            $eventName = 'status' . strval($statusId);
            foreach ($orderIds as $orderId) {
                $this->events->trigger($eventName, $this, ['orderID' => $orderId]);
            }
        }

        $this->detachListeners();
    }

    protected function attachListeners()
    {
        $jobs = $this->db->fetchAll('SELECT * FROM s_mxcbc_workflow_job WHERE active = 1');
        foreach ($jobs as $job) {
            $listener = $job['listener'];
            $eventName = 'status' . strval($job['statusId']);
            $module = substr($listener, 0, strpos($listener, '\\'));
            $listener = $this->getListener($module, $listener);
            $this->listeners[] = $this->events->attach($eventName, [$listener, 'run'], $job['priority']);
        }
    }

    protected function detachListeners()
    {
        foreach ($this->listeners as $callback) {
            $this->events->detach($callback);
        }
        $this->listeners = [];
    }

    protected function getListener(string $module, string $class)
    {
        $services = $this->getServices($module);
        $listener = $services->get($class);
        return $listener;
    }

    protected function getServices(string $module)
    {
        $module .= '\\' . $module;
        return $this->services[$module] ?? $this->services[$module] = call_user_func($module . '::getServices');
    }

    // returns the order age
    public function getOrderAge(array $order): DateInterval
    {
        $date = new DateTime($order['ordertime']);
        $now = new DateTime();
        $age = $date->diff($now);
        return $age->invert == 0 ? $age : new DateInterval('P0Y0DT0H0M0S');
    }

    public function sendNotificationMail(int $orderId, array $context, array $documentAttachments = [])
    {
        $this->mailer->sendNotificationMail(
            $orderId,
            $context,
            $this->classConfig['notification_address'],
            $documentAttachments
        );
    }

    public function sendStatusMail(int $orderId, int $statusId, array $documentAttachments = [])
    {
        $this->mailer->sendStatusMail($orderId, $statusId, $documentAttachments);
    }

    public function setOrderStatus(int $orderId, int $statusId)
    {
        $this->orderTool->setOrderStatus($orderId, $statusId);
    }

    public function setPaymentStatus(int $orderId, int $statusId)
    {
        $this->orderTool->setPaymentStatus($orderId, $statusId);
    }

    public function isPaypal(array $order)
    {
        return $this->orderTool->isPaypal($order['paymentID']);
    }

    public function isPrepayment(array $order) {
        return $this->orderTool->isPrepayment($order['paymentID']);
    }

    public function getOrder(int $orderId)
    {
        return $this->orderTool->getOrder($orderId);
    }
}
