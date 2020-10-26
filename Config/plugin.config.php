<?php

namespace MxcWorkflow\Config;

use MxcWorkflow\PluginListeners\WorkflowMailTemplateInstaller;
use MxcWorkflow\Workflow\WorkflowEngine;
use MxcWorkflow\Models\WorkflowJob;

return [
    'plugin_listeners'   => [
        WorkflowMailTemplateInstaller::class,
    ],
    'doctrine' => [
        'models'     => [
            WorkflowJob::class,
        ],
    ],
    'services' => [
        'magicals' => [
            WorkflowEngine::class,
        ],
    ],
];
