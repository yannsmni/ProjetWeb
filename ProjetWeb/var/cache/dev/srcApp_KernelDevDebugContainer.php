<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerWESBXUi\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerWESBXUi/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerWESBXUi.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerWESBXUi\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerWESBXUi\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'WESBXUi',
    'container.build_id' => '81cc8517',
    'container.build_time' => 1573223247,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerWESBXUi');
