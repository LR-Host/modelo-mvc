<?php

/**
 * Register application modules
 */
$application->registerModules(array(
    'frontend' => array(
        'className' => 'Lrhost\Frontend\Module',
        'path' => __DIR__ . '/../apps/frontend/Module.php'
    ),
    'painel' => array(
        'className' => 'Lrhost\Painel\Module',
        'path' => __DIR__ . '/../apps/painel/Module.php'
    )
));
