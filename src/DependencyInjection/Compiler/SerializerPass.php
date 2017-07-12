<?php

namespace Gdelre\RedmineApiBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Serializer\Serializer;

class SerializerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('serializer')) {
            throw new \RuntimeException('You must configure a serializer.');
        }

        $container->findDefinition('serializer')
            ->setClass(Serializer::class);
    }
}
