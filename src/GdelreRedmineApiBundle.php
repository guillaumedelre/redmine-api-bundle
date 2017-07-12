<?php

namespace Gdelre\RedmineApiBundle;

use Gdelre\RedmineApiBundle\DependencyInjection\Compiler\LoggerPass;
use Gdelre\RedmineApiBundle\DependencyInjection\Compiler\RedmineClientPass;
use Gdelre\RedmineApiBundle\DependencyInjection\Compiler\SerializerPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class GdelreRedmineApiBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new LoggerPass(), PassConfig::TYPE_AFTER_REMOVING, 20);
        $container->addCompilerPass(new SerializerPass(), PassConfig::TYPE_AFTER_REMOVING, 10);
        $container->addCompilerPass(new RedmineClientPass());
    }
}
