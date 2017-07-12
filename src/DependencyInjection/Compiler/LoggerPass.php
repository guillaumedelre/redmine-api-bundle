<?php

namespace Gdelre\RedmineApiBundle\DependencyInjection\Compiler;

use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class LoggerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('logger')) {
            throw new \RuntimeException('You must configure a logger.');
        }

        $container->findDefinition('logger')
            ->setClass(Logger::class);
    }
}
