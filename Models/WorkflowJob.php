<?php

namespace MxcWorkflow\Models;

use Doctrine\ORM\Mapping as ORM;
use MxcCommons\Toolbox\Models\PrimaryKeyTrait;
use MxcCommons\Toolbox\Models\TrackCreationAndUpdateTrait;
use Shopware\Components\Model\ModelEntity;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="s_mxcbc_workflow_job")
 */
class WorkflowJob extends ModelEntity  {

    use PrimaryKeyTrait;
    use TrackCreationAndUpdateTrait;

    /** @ORM\Column(type="integer", nullable=false) */
    private $statusId;

    /** @ORM\Column(type="string", nullable=false) */
    private $listener;

    /** @ORM\Column(type="integer", nullable=false) */
    private $priority;

    /** @ORM\Column(type="boolean", nullable=false) */
    private $active;

    public function getStatusId() { return $this->statusId; }
    public function setStatusId($statusId) { $this->statusId = $statusId; }

    public function getListener() { return $this->listener; }
    public function setListener($listener) { $this->listener = $listener; }

    public function getPriority() { return $this->priority; }
    public function setPriority($priority) { $this->priority = $priority; }

    public function isActive() { return $this->active; }
    public function setActive($active) { $this->active = $active; }
}
